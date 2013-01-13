<?php
namespace NetMon\Views;
require_once 'KLogger.php';
require 'Template.php';
use NetMon;

class View
{
    function __construct()
    {
        $this->Template = new NetMon\Template("pageBase.html");
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->Logger->LogDebug("View Base");
    }
    
    public function Render($name)
    {
        $this->Logger->LogDebug("Render(" . $name . ");");
        ob_start();
        require 'views/' . $name . '.php';
        $output = ob_get_clean();
        $this->Template->Set("pageView", $output);
        $this->Template->Show();
    }
}
?>
