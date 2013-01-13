<?php
namespace NetMon\Controllers;
require_once 'KLogger.php';
use NetMon;
use NetMon\Views as V;

class Controller
{
    function __construct()
    {
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->View = new V\View();
        $this->Logger->LogDebug("Controller Base");
    }
}

?>
