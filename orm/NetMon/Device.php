<?php
require_once ROOT . 'libs/plugins/PluginBase.php';

class Device extends BaseDevice
{
    private $pluginBase;

    function __construct()
    {
        $this->pluginBase = new \NetMon\Plugins\PluginBase();
    }
    public function postInsert(\PropelPDO $con = NULL)
    {
        $this->pluginBase->CallbackActivePlugins("OnDeviceAdd", $this);
    }
    public function postUpdate(\PropelPDO $con = NULL)
    {
        $this->pluginBase->CallbackActivePlugins("OnDeviceUpdate", $this);
    }
    
}
