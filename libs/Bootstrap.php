<?php
namespace NetMon;
require 'Config.php';
require_once 'KLogger.php';
use NetMon;
use NetMon\Controllers;

class Bootstrap
{
    function __construct()
    {
        $this->Logger = new \KLogger(NetMon\Config::LogPath, NetMon\Config::LogLevel);
        $this->Logger->LogDebug("Bootstrap");
        if(isset($_GET['url']))
        {
            $this->Logger->LogDebug("url = ". $_GET['url']);
            $url = explode('/', rtrim($_GET['url'], '/'));
            $controllerName = ucfirst($url[0]);
            $file = NetMon\Config::ControllersPath .'/' . $controllerName . '.php';
            if (file_exists($file))
            {
                $this->Logger->LogDebug("Loading Controller");
                require $file;
                $class = 'NetMon\\Controllers\\' . $controllerName;
                $controller = new $class();
                $this->Logger->LogDebug("Controller " . $class . " Loaded");
                //if arg found execute function with arg else execute function
                if (isset($url[2]))
                    $controller->{$url[1]}($url[2]);
                else if (isset($url[1]))
                    $controller->{$url[1]}();
                else
                    $controller->DefaultView();
                return 0;
            }
        }
        
        require NetMon\Config::ControllersPath. '/Error.php';
        $controller = new Controllers\Error();
        $controller->Logger->LogError("Controller was not found.");
    }

}

?>
