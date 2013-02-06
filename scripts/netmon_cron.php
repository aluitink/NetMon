#!/usr/bin/php
<?php
require_once '/var/www/localhost/htdocs/NetMon/libs/Bootstrap.php';

$app = new NetMon\Bootstrap(true);
$app->Logger->LogDebug("Cron Execute");

$app->ExecutePlugins();
$app->RefreshDevices();
?>