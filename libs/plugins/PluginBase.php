<?php
require_once ROOT . 'libs/MultiProcess/MultiProcessParent.php';

class PluginBase
{
    public $pluginInfo;
    public $pluginSettings;
    public $plugin;
    public $multiProcessParent;
    
    function __construct()
    {
        $this->pluginInfo["requestList"][] = "Execute";
        $this->multiProcessParent = new MultiProcessParent();
    }
    
    protected function GetPlugin()
    {
        $this->plugin = PluginQuery::create()
                ->filterByName($this->pluginInfo["name"])
                ->findOne();
        if(!isset($this->plugin))
        {
            $this->plugin = new Plugin();
            $this->SavePlugin();
        }
        
        $this->pluginSettings = $this->plugin->getPluginPluginSettings();
        
        $this->pluginInfo["name"] = $this->plugin->getName();
        $this->pluginInfo["description"] = $this->plugin->getDescription();
        $this->pluginInfo["requestList"] = json_decode($this->plugin->getRequests(), true);
        return $this->plugin;
    }
        
    protected function SavePlugin()
    {
        $this->plugin->setActive($this->pluginInfo["active"]);
        $this->plugin->setName($this->pluginInfo["name"]);
        $this->plugin->setDescription($this->pluginInfo["description"]);
        if(isset($this->pluginInfo["requestList"]))
            $this->plugin->setRequests(json_encode($this->pluginInfo["requestList"]));
        
        $this->plugin->save();
        $this->SavePluginSettings();
    }
   
    protected function SavePluginSettings()
    {
        foreach($this->pluginSettings as $key => $setting)
        {
            $pluginSetting = new PluginSetting();
            $pluginSetting->setKey($key);
            $pluginSetting->setValue($setting);
            $this->plugin->addPluginPluginSetting($pluginSetting);
        }
        $this->plugin->save();
    }
}
