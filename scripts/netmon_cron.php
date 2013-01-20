<?php
require_once '../libs/Bootstrap.php';
require_once ROOT. 'libs/MultiProcess/MultiProcessParent.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$app = new NetMon\Bootstrap(true);


$plugins = PluginQuery::create()
            ->filterByActive(true)
            ->find();

foreach($plugins as $plugin)
{
    $pluginName = $plugin->getName();
    require_once ROOT . NetMon\Config::PluginsPath . "/" . $pluginName . ".php";
    $p = new $pluginName();
    $p->Execute();
}

?>