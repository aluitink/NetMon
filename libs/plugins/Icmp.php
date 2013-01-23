<?php
namespace NetMon\Plugins;
require_once 'PluginBase.php';

class Icmp extends PluginBase
{
    function __construct()
    {
        parent::__construct();
        $this->pluginInfo["name"] = "Icmp";
        $this->pluginInfo["task"] = ROOT. "libs/plugins/tasks/icmp.php";
        $this->pluginInfo["active"] = true;
        $this->pluginInfo["description"] = "Icmp monitoring plugin.";
        $this->pluginInfo["requestList"][] = "OnDeviceAdd";
        $this->pluginInfo["requestList"][] = "OnDeviceChange";
        $this->pluginInfo["requestList"][] = "OnDeviceRemove";
        $this->pluginInfo["requestList"][] = "OnAdapterAdd";
        $this->pluginInfo["requestList"][] = "OnAdapterChange";
        $this->pluginInfo["requestList"][] = "OnAdapterRemove";
        $this->pluginInfo["requestList"][] = "OnBeforeUpdateAlarms";
        
        $this->pluginSettings["lossAmount"] = 30;
        $this->pluginSettings["autoAdd"] = true;
        $this->pluginSettings["enableThrottle"] = true;
        $this->pluginSettings["threadTimeLimit"] = 10;
        $this->pluginSettings["threadBatch"] = 10;
        $this->pluginSettings["throttlePause"] = 5;
        
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
            $adapter = $monitor->getAdapter();
            $vars["monitorId"] = $monitor->getMonitorid();
            $vars["count"] = 10;
            $vars["interval"] = .2;
            $vars["timeout"] = .2;
            $vars["ip"] = $adapter->getIpAddress();
            $tasks[] = array("path" => $this->pluginInfo["task"],
                             "variables" => $vars);
        }
        
        $this->multiProcessParent->CreateChildren($tasks);
        $this->multiProcessParent->CheckStatus();

        $output = $this->multiProcessParent->GetOutput();
        
        foreach($output as $monitorResult)
        {
            $monitorId = $monitorResult["monitorId"];
            $percentLost = $monitorResult["percentLost"];
            $this->StoreUpdateMeta($monitorId, $percentLost);
        }
        
        $this->multiProcessParent->Cleanup();
    }
    
    public function ProcessThresholds($thresholds = null)
    {
        if(!isset($thresholds)) return;
        
        foreach($thresholds as $threshold)
        {
            $monitor = $threshold->getMonitor();
            $monitorId = $monitor->getMonitorId();
            $monitorValue = $this->FetechUpdateMeta($monitorId);

            $greaterThan = $threshold->getGreaterThan();
            $thresholdValue = $threshold->getValue();
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
