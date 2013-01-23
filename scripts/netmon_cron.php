<?php
require_once '../libs/Bootstrap.php';
require_once ROOT. 'libs/MultiProcess/MultiProcessParent.php';

$app = new NetMon\Bootstrap(true);
$plugins = \PluginQuery::create()
            ->filterByActive(true)
            ->find();

foreach($plugins as $plugin)
{
    $thresholds = \ThresholdQuery::create()
                    ->filterByPluginid($plugin->getPluginid())
                    ->find();
    
    $pluginName = $plugin->getName();
    require_once ROOT . NetMon\Config::PluginsPath . "/" . $pluginName . ".php";
    $ns = "\\NetMon\\Plugins\\";
    $class = $ns . $pluginName;
    $p = new $class();
    $p->Execute();
    $p->ProcessThresholds($thresholds);
}



?>