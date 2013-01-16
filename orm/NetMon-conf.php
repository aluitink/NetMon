<?php
require_once ROOT. 'libs/Config.php';
// This file generated by Propel 1.6.7 convert-conf target
// from XML runtime conf file /archive/www/localhost/htdocs/NetMon/libs/Propel/schema/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'NetMon' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => NetMon\Config::DatabaseDsn,
        'user' => NetMon\Config::DatabaseUser,
        'password' => NetMon\Config::DatabasePass,
      ),
    ),
    'default' => 'NetMon',
  ),
  'generator_version' => '1.6.7',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-NetMon-conf.php');
return $conf;