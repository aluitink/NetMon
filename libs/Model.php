<?php
namespace NetMon\Models;
require_once 'KLogger.php';
use NetMon;

class Model
{
    function __construct()
    {
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->Logger->LogDebug("Model Base");
    }
}
?>
