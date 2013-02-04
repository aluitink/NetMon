<?php
namespace NetMon\Plugins;
require_once ROOT . 'libs/MultiProcess/MultiProcessParent.php';

class PluginBase
{
    public $pluginInfo;
    public $pluginSettings;
    protected $plugin;
    protected $multiProcessParent;
    
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
        $this->StoreUpdatePluginSettings();
    }
   
    protected function StoreUpdatePluginSettings()
    {
        foreach($this->pluginSettings as $key => $setting)
        {
            $pluginSettingQuery = \PluginSettingQuery::create()
                                ->findOneByKey($key);
            
            if(isset($pluginSettingQuery))
            {
                $pluginSettingQuery->setValue($setting);
                $pluginSettingQuery->save();
                continue;
            }
            else
            {
                $pluginSetting = new \PluginSetting();
                $pluginSetting->setKey($key);
                $pluginSetting->setValue($setting);
                $this->plugin->addPluginPluginSetting($pluginSetting);
            }
        }
        $this->plugin->save();
    }
    
    protected function GetOrCreateAlarm($threshold)
    {
        $alarmQuery = \AlarmQuery::create()
                        ->filterByThreshold($threshold)
                        ->findOne();
        
        if(!isset($alarmQuery))
        {
            $alarm = new \Alarm();
            $alarm->setTimestamp("now");
            $alarm->setThreshold($threshold);
            $alarm->save();
            return $alarm;
        }
        return $alarmQuery;
    }
    
    protected function UpdateAlarm($alarm, $active, $ack)
    {
        $alarm->setTimestamp("now");
        $alarm->setActive($active);
        $alarm->setAcknowledged($ack);
        $alarm->save();
        return $alarm;
    }
    
    protected function GetOrCreateMonitor($key, $value)
    {
        $pluginMeta = $this->StoreUpdateMeta("Monitor", $key, $value);
        $monitorQuery = \MonitorQuery::create()
                        ->filterByPlugin($this->plugin)
                        ->filterByPluginMeta($pluginMeta)
                        ->findOne();
        
        if(!isset($monitorQuery))
        {
            $monitor = new \Monitor();
            $monitor->setPlugin($this->plugin);
            $monitor->setPluginMeta($pluginMeta);
            $monitor->save();
            return $monitor;
        }
        return $monitorQuery;
    }
    
    protected function GetMonitorPluginMetaValue($monitor)
    {
        $pluginMeta = $monitor->getPluginmeta();
        if(isset($pluginMeta))
            return json_decode($pluginMeta->getValue(), true);
        return null;
    }
    
    protected function CreateThreshold($monitor, $value, $greater)
    {
        $threshold = new \Threshold();
        $threshold->setPlugin($this->plugin);
        $threshold->setMonitor($monitor);
        $threshold->setValue($value);
        $threshold->setGreaterthan($greater);
        $threshold->save();
        return $threshold;
    }
    
    protected function CreateOrUpdateThreshold($monitor, $value, $greater)
    {
        $thresholdQuery = \ThresholdQuery::create()
                            ->filterByPlugin($this->plugin)
                            ->filterByMonitor($monitor)
                            ->findOne();
        
        if(!isset($thresholdQuery))
        {
            return $this->CreateThreshold($monitor, $value, $greater);
        }
        else
        {
            $thresholdQuery->setValue($value);
            $thresholdQuery->setGreaterthan($greater);
            $thresholdQuery->save();
            return $thresholdQuery;
        }
    }
    
    public function GetResultByMonitor($monitorId)
    {
        return $this->FetchMeta("Result", $monitorId);
    }
    
    protected function SetResultByMonitor($monitorId, $value)
    {
        $this->StoreUpdateMeta("Result", $monitorId, $value);
    }
    
    public function FetchMeta($envelope, $key = null)
    {
        if(isset($key))
        {
            $encodedKey = md5(json_encode($key));
            $meta = \PluginMetaQuery::create()
                ->filterByPlugin($this->plugin)
                ->filterByEnvelope($envelope)
                ->filterByKey($encodedKey)
                ->findOne();
            
            if(isset($meta))
                return json_decode($meta->getValue(), true);
        }
        else
        {
            $meta = \PluginMetaQuery::create()
                ->filterByPlugin($this->plugin)
                ->filterByEnvelope($envelope)
                ->find();
            return $meta;
        }
    }
    
    public function StoreUpdateMeta($envelope, $key, $value)
    {
        $encodedKey = md5(json_encode($key));
        $value = json_encode($value);
        
        $pluginMetaQuery = \PluginMetaQuery::create()
                            ->filterByPlugin($this->plugin)
                            ->filterByEnvelope($envelope)
                            ->findOneByKey($encodedKey);
        
        if(isset($pluginMetaQuery))
        {
            $pluginMetaQuery->setValue($value);
            $pluginMetaQuery->save();
            return $pluginMetaQuery;
        }
        
        $meta = new \PluginMeta();
        $meta->setPlugin($this->plugin);
        $meta->setEnvelope($envelope);
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
            $requests = json_decode($plugin->getRequests(), true);
            if(!in_array($callback, $requests))
                continue;
            
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
