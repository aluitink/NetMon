<?php
    define("ROOT",getcwd());
    
    require 'libs/Bootstrap.php';
    require 'libs/Controller.php';
    require 'libs/View.php';
    use NetMon as NetMon;
    $app = new NetMon\Bootstrap();
?>