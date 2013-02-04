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
    
    public function OnDeviceAdd($device = null)
    {
        if(!isset($device)) return;
        if($this->pluginSettings["autoSetSnmpCommunity"])
        {
            $this->SetDeviceSnmpCommunity($device, \NetMon\Config::DefaultSnmpCommunity, \NetMon\Config::DefaultSnmpVersion);
        }
        if($this->pluginSettings["autoSetUptimeThreshold"])
        {
            $snmpPropertyQuery = \SnmpPropertyQuery::create()
                                    ->findOneByName(\NetMon\Config::DefaultUptimeOid);
            
            if(!isset($snmpPropertyQuery))
                return;
            
            $this->SetDevicePropertyThreshold($device, $snmpPropertyQuery, 5000, false);
            $this->SetDevicePropertyThreshold($device, $snmpPropertyQuery, 4294962295, true);
        }
    }

    public function OnDeviceRemove($device = null)
    {
        //remove data
    }
    
}
$snmp = new \NetMon\Plugins\Snmp();
?>
