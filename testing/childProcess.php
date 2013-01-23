<?php
require_once '../libs/Bootstrap.php';
$app = new NetMon\Bootstrap(true);

$object = json_decode($app->ReadInput());

echo var_dump($object);

?>
