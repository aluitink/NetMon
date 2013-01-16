<?php
namespace NetMon;
require 'Config.php';
require_once 'KLogger.php';
require_once ROOT. '/libs/Propel/runtime/lib/Propel.php';

class Bootstrap
{
    function __construct()
    {
        $this->Logger = new \KLogger(Config::LogPath, Config::LogLevel);
        $this->Logger->LogDebug("Bootstrap");

        \Propel::init(Config::PropelConfig);
        set_include_path(ROOT . Config::PropelModels . PATH_SEPARATOR . get_include_path());
        
        
        if(isset($_GET['url']))
            $url = explode('/', rtrim($_GET['url'], '/'));
        
        $controllerName = "Index";
        if(!empty($url[0]))
            $controllerName = ucfirst($url[0]);
        $file = Config::ControllersPath .'/' . $controllerName . '.php';
        if (file_exists($file))
        {
            $this->Logger->LogDebug("Loading Controller: " . $controllerName);
            require $file;
            $class = 'NetMon\\Controllers\\' . $controllerName;
            $controller = new $class();
            //if arg found execute function with arg else execute function
            if (isset($url[2]))
                $controller->{$url[1]}($url[2]);
            else if (isset($url[1]))
                $controller->{$url[1]}();
            else
                $controller->DefaultView();
            return 0;
        }
        
        require Config::ControllersPath. '/Error.php';
        $controller = new Controllers\Error();
        $controller->Logger->LogError("Controller was not found.");
    }

}

?>
