<?php
require_once ROOT . 'libs/plugins/PluginBase.php';


/**
 * Skeleton subclass for representing a row from the 'Adapter' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.NetMon
 */
class Adapter extends BaseAdapter
{
    private $pluginBase;

    function __construct()
    {
        $this->pluginBase = new \NetMon\Plugins\PluginBase();
    }
    public function postInsert(\PropelPDO $con = NULL)
    {
        $this->pluginBase->CallbackActivePlugins("OnAdapterAdd", $this);
    }
    public function postUpdate(\PropelPDO $con = NULL)
    {
        $this->pluginBase->CallbackActivePlugins("OnAdapterUpdate", $this);
    }
    
}
