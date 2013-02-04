<?php
require_once '/var/www/localhost/htdocs/NetMon/libs/Bootstrap.php';
require_once ROOT . 'libs/MultiProcess/MultiProcessChild.php';

$app = new NetMon\Bootstrap(true);
$child = new MultiProcessChild($argv);

ini_set("max_execution_time",$child->GetThreadTimeLimit());

$vars = $child->GetVariables();

$command = "snmpget -v ".$vars['snmpVersion']." -c ".$vars['snmpCommunity']. " " .$vars['ipAddress']. " " .$vars['snmpProperty'];


$output = array();
exec($command, $output);

$ret = array();

$ret['monitorId'] = $vars["monitorId"];
$ret['snmpProperty'] = $vars['snmpProperty'];

if($output[0] != "")
{
	$output = split(" ", $output[0]);
	$ret['result'] = (int)$output[1];
}
else
{
	$ret['result'] = "NaN";
}

$child->SetProcessComplete($ret);
?>
