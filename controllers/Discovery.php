<?php
namespace NetMon\Controllers;
require_once ROOT.'libs/Controller.php';
require_once ROOT.'libs/interfaces/IController.php';

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
    
    public function Scan($address = null)
    {
        if(!isset($address))
            $address = $_POST["network"];
        
        switch($this->RequestMethod)
        {
            case "POST":
                $target = $address;
                $command = "nmap -T4 -A -p 1-1000 -oX - " . $target ;//. " < echo \"" . \NetMon\Config::RootPassword . "\"";

                $xmlData = shell_exec($command);               
                $xmlObject = simplexml_load_string($xmlData);
                $this->FindDevices($xmlObject);
                break;
            case "GET":
                echo "invalidrequest";
                break;
        }
    }
    
    protected function DeviceExists($ipAddress)
    {
        $device = \DeviceQuery::create()
                    ->findByIpaddress($ipAddress);
        return ($device->count() > 0);
    }
    
    protected function FindDevices($xml)
    {
        if(count($xml->host) > 0)
        {
            foreach($xml->host as $host)
            {
                if($this->DeviceExists($host->trace->hop["ipaddr"]))
                    continue;

                $device = new \Device();
                $device->setIpaddress($host->trace->hop["ipaddr"]);
                $device->setHostname($host->trace->hop["ipaddr"]);
                $device->setModified(true);
                $device->setDateadded("now");
                $device->save();
                
                if($host->status["state"] == "up")
                {
                    $adapter = new \Adapter();
                    $adapter->setName($host->trace->hop["ipaddr"]);
                    $adapter->setModified(true);
                    foreach ($host->address as $address)
                    {
                        if($address["addrtype"] == "ipv4")
                            $adapter->setIpaddress($address["addr"]);
                        if($address["addrtype"] == "mac")
                            $adapter->setMacaddress ($address["addr"]);
                    }
                    
                    foreach ($host->ports->port as $port)
                    {
                        $portStatus = new \PortStatus();
                        $portStatus->setAdapter($adapter);
                        $portStatus->setProtocol($port["protocol"]);
                        
                        $portStatus->setPort($port["portid"]);
                        $portStatus->setState(($port->state["state"] == "open"));
                        
                        $portStatus->setName($port->service["name"]);
                        $portStatus->setProduct($port->service["product"]);
                        $portStatus->setVersion($port->service["version"]);
                        $portStatus->save();
                    }
                    $adapter->setDevice($device);
                    $adapter->save();
                }
            }  
        }
    }
}

?>