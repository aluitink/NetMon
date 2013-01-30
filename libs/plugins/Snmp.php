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
        $this->pluginSettings["autoScanNewDevices"] = true;
        
        $this->GetPlugin();
    }
    
    public function Execute()
    {
//        $monitors = \MonitorQuery::create()
//                ->filterByPlugin($this->plugin)
//                ->find();
//        $tasks = array();
//        foreach($monitors as $monitor)
//        {
//            $adapter = $monitor->getAdapter();
//            $vars["monitorId"] = $monitor->getMonitorid();
//            $vars["count"] = 10;
//            $vars["interval"] = .2;
//            $vars["timeout"] = 1;
//            $vars["ip"] = $adapter->getIpAddress();
//            $tasks[] = array("path" => $this->pluginInfo["task"],
//                             "variables" => $vars);
//        }
//        
//        $this->multiProcessParent->CreateChildren($tasks);
//        $this->multiProcessParent->CheckStatus();
//
//        $output = $this->multiProcessParent->GetOutput();
//        
//        foreach($output as $monitorResult)
//        {
//            $monitorId = $monitorResult["monitorId"];
//            $percentLost = $monitorResult["percentLost"];
//            $this->StoreUpdateMeta($monitorId, $percentLost);
//        }
//        
//        $this->multiProcessParent->Cleanup();
    }
    
    public function ProcessThresholds()
    {
//        if(!isset($thresholds)) return;
//        
//        $thresholds = \ThresholdQuery::create()
//                            ->filterByPluginid($this->plugin->getPluginid())
//                            ->find();
//        
//        foreach($thresholds as $threshold)
//        {
//            $monitor = $threshold->getMonitor();
//            $monitorId = $monitor->getMonitorId();
//            $monitorValue = $this->FetechUpdateMeta($monitorId);
//
//            $greaterThan = $threshold->getGreaterThan();
//            $thresholdValue = $threshold->getValue();
//            if($greaterThan)
//            {
//                if($monitorValue > $thresholdValue)
//                    $this->SetAlarmValue ($threshold, true);
//                else
//                    $this->SetAlarmValue ($threshold, false);
//            }
//            else
//            {
//                if($monitorValue < $thresholdValue)
//                    $this->SetAlarmValue ($threshold, true);
//                else
//                    $this->SetAlarmValue ($threshold, false);
//            }
//        }
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
    
    public function OnAdapterAdd($adapter = null)
    {
        if(!isset($adapter)) return;
        if($this->pluginSettings["autoAdd"])
        {   
            $monitor = new \Monitor();
            $monitor->setPlugin($this->plugin);
            $monitor->setAdapter($adapter);
            $monitor->save();
        }
    }
    
    public function OnAdapterUpdate($adapter = null)
    {
        
    }
    
    public function OnDeviceAdd($device = null)
    {
        
    }
    
    public function OnDeviceUpdate($device = null)
    {
        
    }
    
    public function OnDeviceRemove($device = null)
    {
        
    }
    
}
$icmp = new \NetMon\Plugins\Icmp();
?>
