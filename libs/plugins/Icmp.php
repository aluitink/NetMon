<?php
require_once 'PluginBase.php';

class Icmp extends PluginBase
{
    function __construct()
    {
        parent::__construct();
        $this->pluginInfo["name"] = "Icmp";
        $this->pluginInfo["task"] = ROOT. "libs/plugins/tasks/icmp.php";
        $this->pluginInfo["active"] = false;
        $this->pluginInfo["description"] = "Icmp monitoring plugin.";
        $this->pluginInfo["requestList"][] = "_onDeviceAdd";
        $this->pluginInfo["requestList"][] = "_onDeviceChange";
        $this->pluginInfo["requestList"][] = "_onDeviceRemove";
        $this->pluginInfo["requestList"][] = "_onAdapterAdd";
        $this->pluginInfo["requestList"][] = "_onAdapterChange";
        $this->pluginInfo["requestList"][] = "_onAdapterRemove";
        $this->pluginInfo["requestList"][] = "_onBeforeUpdateAlarms";
        
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
        $monitors = MonitorQuery::create()
                ->filterByPlugin($this->plugin)
                ->find();
        $tasks = array();
        foreach($monitors as $monitor)
        {
            $adapter = $monitor->getAdapter();

            $vars["monitorId"] = $monitor->getMonitorid();
            $vars["count"] = 10;
            $vars["interval"] = 1;
            $vars["timeout"] = .2;
            $vars["ip"] = $adapter->getIpAddress();

            $tasks[] = array("path" => $this->pluginInfo["task"],
                             "variables" => $vars);
        }

        $this->multiProcessParent->CreateChildren($tasks);
        $this->multiProcessParent->CheckStatus();

        $output = $this->multiProcessParent->GetOutput();
        $this->multiProcessParent->Cleanup();
    }
}
$icmp = new Icmp();
?>
