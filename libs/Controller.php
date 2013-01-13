<?php
namespace NetMon\Controllers;
require_once 'KLogger.php';
use NetMon;

class Controller
{
    function __construct()
    {
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->View = new NetMon\Views\View();
    }
}

?>
