<?php
require_once ROOT . 'libs/Config.php';
require_once ROOT . NetMon\Config::DataAccessModelsPath . '/User.php';
echo "test1";

$user = new User();
$user->Name = "Andy";
$user->Password = "Pass";
$user->save();

var_dump($user);

?>