<?php
namespace NetMon\Controllers;
require_once ROOT.'/libs/interfaces/IController.php';

use NetMon\Interfaces as Interfaces;

class Discovery extends Controller implements Interfaces\IController
{
    function __construct($method)
    {
        parent::__construct($method);
    }

    public function DefaultView()
    {
        $this->View->Render("discovery/index");
    }
    
    
    private function run_in_background($Command, $Priority = 0)
    {
        if($Priority)
            $PID = shell_exec("nohup nice -n $Priority $Command > /dev/null & echo $!");
        else
            $PID = shell_exec("nohup $Command > /dev/null & echo $!");
        return($PID);
    }
    
    private function is_process_running($PID)
    {
        exec("ps $PID", $ProcessState);
        return(count($ProcessState) >= 2);
    }
    
    function XML2Array ( $xml ) 
    { 
        $array = simplexml_load_string ( $xml ); 
        $newArray = array ( ) ; 
        $array = ( array ) $array ; 
        foreach ( $array as $key => $value ) 
        { 
            $value = ( array ) $value ; 
            $newArray [ $key] = $value [ 0 ] ; 
        } 
        $newArray = array_map("trim", $newArray); 
      return $newArray ; 
    } 
    
    public function Scan()
    {
        switch($this->RequestMethod)
        {
            case "POST":
                if(!isset($_POST["network"]))
                    throw new \Exception('POST[network] missing');
                
                $target = $_POST["network"];
                $command = "nmap -T4 -A -p 1-1000 -oX - " . $target ;//. " < echo \"" . \NetMon\Config::RootPassword . "\"";
                //echo $command;
                //$CopyTaskPid = shell_exec($command);
                //var_dump($CopyTaskPid);
                $test = file_get_contents("test.xml");
                $xml = simplexml_load_string($test);
                
                //var_dump($xml);
                
                echo $xml["scanner"] . "<br>";
                echo $xml["args"] . "<br>";
                echo $xml["start"] . "<br>";
                echo $xml["startstr"] . "<br>";
                echo $xml["version"] . "<br>";
                echo $xml["xmloutputversion"] . "<br>";
                
                echo $xml->scaninfo["type"] . "<br>";
                echo $xml->scaninfo["protocol"] . "<br>";
                echo $xml->scaninfo["numservices"] . "<br>";
                echo $xml->scaninfo["services"] . "<br>";
                
                echo $xml->verbose["level"] . "<br>";
                
                echo $xml->debugging["level"] . "<br>";
                
                echo $xml->host["starttime"] . "<br>";
                echo $xml->host["endtime"] . "<br>";
                
                
                echo $xml->status["state"] . "<br>";
                echo $xml->status["reason"] . "<br>";
                
                echo $xml->address["addr"] . "<br>";
                echo $xml->address["addrtype"] . "<br>";
                
                var_dump($xml->hostnames) . "<br>";
                
                var_dump($xml);
                
                echo $xml->ports->extraports["state"] . "<br>";
                echo $xml->ports->extraports["count"] . "<br>";
                echo $xml->ports->extraports->extrareason["reason"] . "<br>";
                echo $xml->ports->extraports->extrareason["count"] . "<br>";
                
                for($i = 0; $i < count($xml->port); $i++)
                {
                    echo $xml->port[$i]["protocol"] . "<br>";
                    echo $xml->port[$i]["portid"] . "<br>";
                    echo $xml->port[$i]->state["state"] . "<br>";
                    echo $xml->port[$i]->state["reason"] . "<br>";
                    echo $xml->port[$i]->state["reason_ttl"] . "<br>";
                    echo $xml->port[$i]->service["name"] . "<br>";
                    echo $xml->port[$i]->service["product"] . "<br>";
                    echo $xml->port[$i]->service["version"] . "<br>";
                    echo $xml->port[$i]->service["method"] . "<br>";
                    echo $xml->port[$i]->service["conf"] . "<br>";
                    echo $xml->port[$i]->service["cpe"] . "<br>";
                }
                
                echo $xml->times["srtt"] . "<br>";
                echo $xml->times["rttvar"] . "<br>";
                echo $xml->times["to"] . "<br>";
                
                echo $xml->runstats->finished["time"] . "<br>";
                echo $xml->runstats->finished["timestr"] . "<br>";
                echo $xml->runstats->finished["elapsed"] . "<br>";
                echo $xml->runstats->finished["summary"] . "<br>";
                echo $xml->runstats->finished["exit"] . "<br>";
                
                echo $xml->hosts["up"] . "<br>";
                echo $xml->hosts["down"] . "<br>";
                echo $xml->hosts["total"] . "<br>";
                
                break;
            case "GET":
                echo "invalidrequest";
                break;
        }
        
    }
}

?>