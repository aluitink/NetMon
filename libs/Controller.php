<?php
namespace NetMon\Controllers;
require_once 'KLogger.php';
require_once 'View.php';
use NetMon;

class Controller
{
    protected $RequestMethod;
    
    function __construct($method)
    {
        $this->RequestMethod = $method;
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->View = new NetMon\Views\View();
    }
}

?>
