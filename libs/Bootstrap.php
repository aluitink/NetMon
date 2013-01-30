<?php
namespace NetMon;
define("ROOT", dirname(__FILE__) . '/../');

require_once ROOT. 'libs/Config.php';
require_once ROOT. 'libs/KLogger.php';
require_once ROOT. 'libs/Propel/runtime/lib/Propel.php';
require_once ROOT. 'libs/plugins/PluginBase.php';

\Propel::init(ROOT . Config::PropelConfig);
\Propel::disableInstancePooling();
set_include_path(ROOT . Config::PropelModels . PATH_SEPARATOR . get_include_path());

class Bootstrap
{
    public $Logger;
    private $pluginBase;
    function __construct($scriptAccess = false)
    {
        $this->Logger = new \KLogger(Config::LogPath, Config::LogLevel);
        $this->pluginBase = new \NetMon\Plugins\PluginBase();
        if($scriptAccess)
            return;
        
        $this->RequestMethod = $_SERVER['REQUEST_METHOD'];
        
        if(isset($_GET['url']))
            $url = explode('/', rtrim($_GET['url'], '/'));
        
        $controllerName = "Index";
        if(!empty($url[0]))
            $controllerName = ucfirst($url[0]);
        
        $file = ROOT . Config::ControllersPath .'/' . $controllerName . '.php';
        if (file_exists($file))
        {
            try
            {
                $this->Logger->LogDebug("Loading Controller: " . $controllerName);
                require $file;
                $class = 'NetMon\\Controllers\\' . $controllerName;
                $controller = new $class($this->RequestMethod);
                //if arg found execute function with arg else execute function
                if (isset($url[2]))
                    $controller->{$url[1]}($url[2]);
                else if (isset($url[1]))
                    $controller->{$url[1]}();
                else
                    $controller->DefaultView();
                
                return 0;
            }
            catch (Exception $exc)
            {
                $controller->Logger->LogError("Exception!");
            }
        }
        else
        {
            $controller->Logger->LogError("Controller was not found.");
            require Config::ControllersPath. '/Error.php';
            $controller = new Controllers\Error("GET");
        }
    }

    public function LoadPlugin($pluginId)
    {
        $plugin = \PluginQuery::create()
            ->findOneByPluginid($pluginId);

        $pluginName = $plugin->getName();
        require_once ROOT . \NetMon\Config::PluginsPath . "/" . $pluginName . ".php";
        $ns = "\\NetMon\\Plugins\\";
        $class = $ns . $pluginName;
        $p = new $class();
        
        return $p;
    }
    
    public function ReadInput()
    {
        return file_get_contents('php://input');
    }
    
    public function CallbackPlugins($callback, $data = null)
    {
        $this->pluginBase->CallbackActivePlugins($callback, $data);
    }
}

?>
