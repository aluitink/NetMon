<?php
namespace NetMon\Plugins;
require_once 'PluginBase.php';

class Snmp extends PluginBase
{
    function __construct()
    {
        parent::__construct();
        $this->pluginInfo["name"] = "Snmp";
        $this->pluginInfo["task"] = ROOT. "libs/plugins/tasks/snmp.php";
        $this->pluginInfo["active"] = true;
        $this->pluginInfo["description"] = "Snmp monitoring plugin.";
        $this->pluginInfo["requestList"][] = "OnDeviceAdd";
        $this->pluginInfo["requestList"][] = "OnTrapReceived";
        $this->pluginInfo["requestList"][] = "ProcessThresholds";
        $this->pluginInfo["requestList"][] = "RefreshDevices";
        $this->pluginSettings["autoSetSnmpCommunity"] = true;
        $this->pluginSettings["autoSetUptimeThreshold"] = true;
        $this->pluginSettings["alertOnNaN"] = true;
        
        $this->GetPlugin();
    }
    
    public function Execute()
    {
        $monitors = \MonitorQuery::create()
                ->filterByPlugin($this->plugin)
                ->find();
        
        $tasks = array();
        foreach($monitors as $monitor)
        {
            $data = $this->GetMonitorPluginMetaValue($monitor);
            $device = \DeviceQuery::create()
                        ->findOneByDeviceid($data["DeviceId"]);
            
            if(!isset($device))
                throw new \Exception("Device Not Found");
            
            $snmpProperty = \SnmpPropertyQuery::create()
                            ->findOneBySnmppropertyid($data["SnmpPropertyId"]);
            
            if(!isset($snmpProperty))
                throw new \Exception("SnmpProperty Not Found");
            
            $snmpNamespace = $snmpProperty->getSnmpNamespace();
            
            $namespace = $snmpNamespace->getName();
            $property = $snmpProperty->getName();
            
            $oid = $namespace . "::" . $property;
            
            $communityString = $this->GetDeviceSnmpCommunity($device);
            $snmpVersion = $this->GetDeviceSnmpVersion($device);
            
            $vars["monitorId"] = $monitor->getMonitorid();
            $vars["ipAddress"] = $device->getIpAddress();
            $vars["snmpProperty"] = $oid;
            $vars["snmpCommunity"] = $communityString;
            $vars["snmpVersion"] = $snmpVersion;
            $tasks[] = array("path" => $this->pluginInfo["task"],
                             "variables" => $vars);
        }
        
        $this->multiProcessParent->CreateChildren($tasks);
        $this->multiProcessParent->CheckStatus();

        $output = $this->multiProcessParent->GetOutput();
        
        foreach($output as $monitorResult)
        {
            $monitorId = $monitorResult["monitorId"];
            $result = $monitorResult["result"];
            $this->SetResultByMonitor($monitorId, $result);
        }
        
        $this->multiProcessParent->Cleanup();
    }
    
    public function ProcessThresholds()
    {   
        $thresholds = \ThresholdQuery::create()
                            ->filterByPluginid($this->plugin->getPluginid())
                            ->find();
        
        if(!isset($thresholds)) return;
        
        foreach($thresholds as $threshold)
        {
            $monitor = $threshold->getMonitor();
            $monitorId = $monitor->getMonitorId();
            $monitorValue = $this->GetResultByMonitor($monitorId);

            $greaterThan = $threshold->getGreaterThan();
            $thresholdValue = $threshold->getValue();
            
            if($this->pluginSettings["alertOnNaN"])
            {
                if($monitorValue == "NaN")
                {
                    $this->SetAlarmValue ($threshold, true);
                    continue;
                }
            }
            
            if($greaterThan)
            {
                if($monitorValue > $thresholdValue)
                    $this->SetAlarmValue ($threshold, true);
                else
                    $this->SetAlarmValue ($threshold, false);
            }
            else
            {
                if($monitorValue < $thresholdValue)
                    $this->SetAlarmValue ($threshold, true);
                else
                    $this->SetAlarmValue ($threshold, false);
            }
        }
    }

    public function RefreshDevices($devices)
    {
        if(!isset($devices))
            return;
        
        foreach($devices as $device)
        {
            if($this->TestSnmp($device))
            {
                $this->WalkDevice($device);
            }
        }
    }
    
    public function GetMonitorValue($monitorId)
    {
        return $this->FetechUpdateMeta($monitorId);
    }
    
    private function SetAlarmValue($threshold, $active)
    {
        $queryAlarm = \AlarmQuery::create()
                        ->filterByThreshold($threshold)
                        ->findOne();
        
        if(isset($queryAlarm))
        {
            $oldStatus = $queryAlarm->getActive();
            $oldAck = $queryAlarm->getAcknowledged();
            
            if($oldStatus != $active)
            {
                $queryAlarm->setActive ($active);
                $queryAlarm->setAcknowledged(false);
                $queryAlarm->setTimestamp("now");
                $queryAlarm->save();
            }
        }
        else
        {
            $alarm = new \Alarm();
            $alarm->setThreshold($threshold);
            $alarm->setTimestamp("now");
            $alarm->setActive($active);
            $alarm->setAcknowledged(false);
            $alarm->save();
        }
    }
    
    private function SetDevicePropertyThreshold($device, $property, $value, $greater)
    {
        $deviceId = $device->getDeviceid();
        $propertyId = $property->getSnmpPropertyid();
        
        $adapter = \AdapterQuery::create()
                    ->findOneByDevice($device);
        
        $data["DeviceId"] = $deviceId;
        $data["SnmpPropertyId"] = $propertyId;
        
        $monitor = $this->GetOrCreateMonitor($data, $data);
        $threshold = $this->CreateThreshold($monitor, $value, $greater);
        return $threshold;
    }
    
    private function SetDeviceSnmpCommunity($device, $snmpCommunity = "public", $snmpVersion = "2c")
    {
        $deviceId = $device->getDeviceid();
        $this->StoreUpdateMeta("SnmpVersion", $deviceId, $snmpVersion);
        return $this->StoreUpdateMeta("Community", $deviceId, $snmpCommunity);
    }
        
    private function GetDeviceSnmpCommunity($device)
    {
        $deviceId = $device->getDeviceid();
        $snmpCommunityString = $this->FetchMeta("Community", $deviceId);
        return $snmpCommunityString;
    }
    
    private function GetDeviceSnmpVersion($device)
    {
        $deviceId = $device->getDeviceid();
        $snmpVersion = $this->FetchMeta("SnmpVersion", $deviceId);
        return $snmpVersion;
    }
    
    public function WalkDevice($device)
    {
        if(!$this->TestSnmp($device))
            return false;
        
        $community = $this->GetDeviceSnmpCommunity($device);
        $version = $this->GetDeviceSnmpVersion($device);
        $ipAddress = $device->getIpaddress();
        
        $oids = array();
        $properties = array();
        
        $command = "snmpwalk -v ". $version ." -Cc -c ". $community . " " . $ipAddress;
        exec($command, $oids);
        for($i = 0; $i < count($oids); $i++)
        {
            $tmp = explode(" ", $oids[$i], 2);
            $oid = $tmp[0];

            if(strpos($oid, "::"))
            {
                $tmp = explode("::", $oid, 2);
                //**TODO**If cant split on :: then it is invalid and skip
                $namespace = $tmp[0];
                $property = $tmp[1];
                
                $properties[0][$i] = $namespace;
                $properties[1][$i] = $property;
            }
        }
        
        //Remove Duplicates
        $namespaces = array_unique($properties[0]);
        foreach($namespaces as $key => $value)
        {
            if(empty($value))
                unset($namespaces[$key]);
        }
        
        $namespaces = array_values($namespaces);

        for($j = 0; $j < count($namespaces); $j++)
        {
            $snmpNamespaceQuery = \SnmpNamespaceQuery::create()
                                    ->findOneByName($namespaces[$j]);
            
            if(isset($snmpNamespaceQuery))
                continue;
            
            $snmpNamespace = new \SnmpNamespace();
            $snmpNamespace->setName($namespaces[$j]);
            $snmpNamespace->save();
        }
        
        for($l = 0; $l < count($properties[1]); $l++)
        {
            if(!isset($properties[1][$l]))
                continue;
            
            //removes whitespace
            $property = explode(" ",$properties[1][$l], 2);
            $property = $property[0];
            
            //echo "\r\nproperty: ".$properties[0][$l] ."::".$property;
            
            $snmpNamespace = \SnmpNamespaceQuery::create()
                                ->findOneByName($properties[0][$l]);
            
            if(!isset($snmpNamespace))
                continue;

            $name = $snmpNamespace->getName();
            
            //echo "\r\nSnmpNamespace::Name = " .$name;
            
            $snmpPropertyQuery = \SnmpPropertyQuery::create()
                                    ->filterBySnmpNamespace($snmpNamespace)
                                    ->findOneByProperty($property);
            
            if(isset($snmpPropertyQuery))
                continue;
            
            echo "\r\nNew Property: ".$property;
            
            $snmpProperty = new \SnmpProperty();
            $snmpProperty->setSnmpNamespace($snmpNamespace);
            $snmpProperty->setProperty($property);
            $snmpProperty->setName($property);
            $snmpProperty->save();
        }
        
    }
    
    public function TestSnmp($device)
    {
        $community = $this->GetDeviceSnmpCommunity($device);
        $version = $this->GetDeviceSnmpVersion($device);
        $ipAddress = $device->getIpaddress();
        $property = "SNMPv2-MIB::sysUpTime.0";
        $command = "snmpget -v ".$version." -c ".$community. " " .$ipAddress. " " .$property;
        
        $output = array();
        exec($command, $output);

        if($output[0] != "")
        {
            $output = explode(" ", $output[0]);
            if(isset($output))
                return true;
            return false;
        }
        return false;
    }
    
    public function OnDeviceAdd($device = null)
    {
        if(!isset($device)) return;
        if($this->pluginSettings["autoSetSnmpCommunity"])
        {
            $this->SetDeviceSnmpCommunity($device, \NetMon\Config::DefaultSnmpCommunity, \NetMon\Config::DefaultSnmpVersion);
            
        }
        if($this->pluginSettings["autoSetUptimeThreshold"])
        {
            $sysUptime = $this->GetOrCreateUptimeProperty();
            
            $this->SetDevicePropertyThreshold($device, $sysUptime, 5000, false);
            $this->SetDevicePropertyThreshold($device, $sysUptime, 4294962295, true);
        }
    }
    
    public function OnDeviceRemove($device = null)
    {
        //remove data
    }
    
    private function GetOrCreateUptimeProperty()
    {
        $snmpPropertyQuery = \SnmpPropertyQuery::create()
                                ->findOneByName("sysUpTime.0");
            
        if(!isset($snmpPropertyQuery))
        {
            $namespace = \SnmpNamespaceQuery::create()
                            ->findOneByName("SNMPv2-MIB");
            if(!isset($namespace))
            {
                $namespace = new \SnmpNamespace();
                $namespace->setName("SNMPv2-MIB");
                $namespace->save();

                $property = new \SnmpProperty();
                $property->setSnmpNamespace($namespace);
                $property->setName("sysUpTime.0");
                $property->setProperty("sysUpTime.0");
                $property->save();
                return $property;
            }
        }
        
        return $snmpPropertyQuery;
    }
}
$snmp = new \NetMon\Plugins\Snmp();
?>
