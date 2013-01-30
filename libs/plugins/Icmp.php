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
        $this->pluginInfo["requestList"][] = "ProcessThresholds";
        $this->pluginInfo["requestList"][] = "OnDeviceAdd";
        $this->pluginInfo["requestList"][] = "OnDeviceChange";
        $this->pluginInfo["requestList"][] = "OnDeviceRemove";
        $this->pluginInfo["requestList"][] = "OnAdapterAdd";
        $this->pluginInfo["requestList"][] = "OnAdapterChange";
        $this->pluginInfo["requestList"][] = "OnAdapterRemove";
        $this->pluginInfo["requestList"][] = "OnBeforeUpdateAlarms";
        
        $this->pluginSettings["defaultLoss"] = 30;
        $this->pluginSettings["defaultGreaterThan"] = true;
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
            $pluginMeta = $monitor->getPluginmeta();
            $adapterId = $pluginMeta->getValue();
            $adapter = \AdapterQuery::create()
                        ->findOneByAdapterid($adapterId);
            
            if(!isset($adapter))
                throw new \Exception("Adapater Not Found");
            
            $vars["monitorId"] = $monitor->getMonitorid();
            $vars["count"] = 10;
            $vars["interval"] = .2;
            $vars["timeout"] = 1;
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
            $this->SetResultByMonitor($monitorId, $percentLost);
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
            $alarm = $this->GetOrCreateAlarm($threshold);
            
            
            $monitorValue = $this->GetResultByMonitor($monitorId);

            $oldStatus = $alarm->getActive();
            $oldAck = $alarm->getAcknowledged();
            
            $greaterThan = $threshold->getGreaterThan();
            $thresholdValue = $threshold->getValue();
            if($greaterThan)
            {
                if($monitorValue > $thresholdValue)
                {
                    if(!$oldStatus)
                        $this->UpdateAlarm($alarm, true, false);
                }
                else
                {
                    if($oldStatus)
                        $this->UpdateAlarm($alarm, false, false);
                }
            }
            else
            {
                if($monitorValue < $thresholdValue)
                {
                    if(!$oldStatus)
                        $this->UpdateAlarm($alarm, true, false);
                }
                else
                {
                    if($oldStatus)
                        $this->UpdateAlarm ($alarm, false, false);
                }
                    
            }
        }
    }

    private function SetAdapterThreshold($adapter, $value, $greater)
    {
        $adapterId = $adapter->getAdapterid();
        $monitor = $this->GetOrCreateMonitor($adapterId, $adapterId);
        $threshold = $this->CreateOrUpdateThreshold($monitor, $value, $greater);
        return $threshold;
    }
    
    public function OnAdapterAdd($adapter = null)
    {
        if(!isset($adapter)) return;
        if($this->pluginSettings["autoAdd"])
        {
            $this->SetAdapterThreshold($adapter, 
                    $this->pluginSettings["defaultLoss"], 
                    $this->pluginSettings["defaultGreaterThan"]);
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
