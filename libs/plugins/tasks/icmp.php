<?php
require_once '../libs/Bootstrap.php';
require_once ROOT . 'libs/MultiProcess/MultiProcessChild.php';

$app = new NetMon\Bootstrap(true);
$child = new MultiProcessChild($argv);

ini_set("max_execution_time",$child->GetThreadTimeLimit());

$vars = $child->GetVariables();

$command = "ping -c " . $vars["count"] . " -i " . $vars["interval"] . " -W ". $vars["timeout"] ." " . $vars["ip"] . " | grep packets | cut -d \" \" -f 4";


exec($command, $pingsReturned);
$percentReturned = (($pingsReturned[0] / $vars["count"]) * 100);
$percentLoss = (100 - $percentReturned);

$ret = array();
$ret["monitorId"] = $vars["monitorId"];
$ret['loss'] = $percentLoss;
$ret["command"] = $command;
$child->SetProcessComplete($ret);

?>
