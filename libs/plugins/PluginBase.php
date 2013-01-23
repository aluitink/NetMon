<?php
namespace NetMon\Plugins;
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
        $this->multiProcessParent = new \NetMon\MultiProcess\MultiProcessParent();
    }
    
    protected function GetPlugin()
    {
        $this->plugin = \PluginQuery::create()
                ->filterByName($this->pluginInfo["name"])
                ->findOne();
        if(!isset($this->plugin))
        {
            $this->plugin = new \Plugin();
            $this->SavePlugin();
        }
        
        $settings = $this->plugin->getPluginPluginSettings();
        
        foreach($settings as $setting)
        {
            $key = $setting->getKey();
            $this->pluginSettings[$key] = $setting->getValue();
        }
        
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
            $pluginSetting = new \PluginSetting();
            $pluginSetting->setKey($key);
            $pluginSetting->setValue($setting);
            $this->plugin->addPluginPluginSetting($pluginSetting);
        }
        $this->plugin->save();
    }
    
    public function FetechUpdateMeta($key)
    {
        $encodedKey = md5(json_encode($key));
        $meta = \PluginMetaQuery::create()
                ->filterByPlugin($this->plugin)
                ->findOneByKey($encodedKey);
        if(isset($meta))
            return json_decode($meta->getValue(), true);
        return null;
    }
    
    public function StoreUpdateMeta($key, $value)
    {
        $encodedKey = md5(json_encode($key));
        $value = json_encode($value);
        $pluginQuery = \PluginMetaQuery::create()
                    ->filterByPlugin($this->plugin)
                    ->findOneByKey($encodedKey);
        
        //if found update
        if(isset($pluginQuery))
        {
            $pluginQuery->setValue($value);    
            $pluginQuery->save();
            return $pluginQuery;
        }
        
        $meta = new \PluginMeta();
        $meta->setPlugin($this->plugin);
        $meta->setKey($encodedKey);
        $meta->setValue($value);
        $meta->save();
        
        return $meta;
    }
    
    public function CallbackActivePlugins($callback, $data = null)
    {
        $plugins = \PluginQuery::create()
            ->filterByActive(true)
            ->find();

        foreach($plugins as $plugin)
        {
            $pluginName = $plugin->getName();
            require_once ROOT . \NetMon\Config::PluginsPath . "/" . $pluginName . ".php";
            $pluginClass = "\\NetMon\\Plugins\\" . $pluginName;
            $p = new $pluginClass();
            if($data == null)
                $p->$callback();
            else
                $p->$callback($data);
        }
    }
}
