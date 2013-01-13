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
    }
    
    public function Render($name)
    {
        $this->Logger->LogDebug("View->Render(" . $name . ");");
        ob_start();
        require 'views/' . $name . '.php';
        $view = ob_get_clean();
        
        //Read nav html into $nav
        $nav = NetMon\Template::ReadTemplateFile("nav.html");
        
        //Open header template set tag to nav
        $headerTemplate = new NetMon\Template("header.html");
        $headerTemplate->Set("pageNav", $nav);
        //return header text
        $header = $headerTemplate->Get();
        $sidebar = NetMon\Template::ReadTemplateFile("sidebar.html");
        $footer = NetMon\Template::ReadTemplateFile("footer.html");
        
        $this->Template->Set("pageHeader", $header);
        $this->Template->Set("pageMenu", $nav);
        $this->Template->Set("pageSidebar", $sidebar);
        $this->Template->Set("pageView", $view);
        $this->Template->Set("pageFooter", $footer);
        $this->Template->Show();
    }
}
?>
