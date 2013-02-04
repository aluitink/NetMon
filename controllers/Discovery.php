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
    
    public function SnmpScan($ipAddress, $snmpVersion, $walkPoint = null, $community = null)
    {
        $oids = array();
        $properties = array();
        
        $command = "snmpwalk -v ". $snmpVersion ." -Cc -c ". $community . " " . $ipAddress . " " . $walkPoint;
        exec($command, $oids);
        for($i = 0; $i < count($oids); $i++)
        {
            $tmp = explode(" ", $oids[$i], 2);
            $oid = $tmp[0];

            if(strpos($oid, "::"))
            {
                $tmp = explode("::", $oid, 2);
                //**TODO**If cant split on :: then it is invalid and skip
                $namespace = $tmp[0];
                $property = $tmp[1];
                
                $properties[0][$i] = $namespace;
                $properties[1][$i] = $property;
            }
        }
        
        //Remove Duplicates
        $namespaces = array_unique($properties[0]);
        foreach($namespaces as $key => $value)
        {
            if(empty($value))
                unset($namespaces[$key]);
        }
        
        $namespaces = array_values($namespaces);

        for($j = 0; $j < count($namespaces); $j++)
        {
            $snmpNamespaceQuery = \SnmpNamespaceQuery::create()
                                    ->findOneByName($namespaces[$j]);
            
            if(isset($snmpNamespaceQuery))
                continue;
            
            $snmpNamespace = new \SnmpNamespace();
            $snmpNamespace->setName($namespaces[$j]);
            $snmpNamespace->save();
        }
        
        for($l = 0; $l < count($properties[1]); $l++)
        {
            if(!isset($properties[1][$l]))
                continue;
            
            //removes whitespace
            $property = explode(" ",$properties[1][$l], 2);
            $property = $property[0];
            
            //echo "\r\nproperty: ".$properties[0][$l] ."::".$property;
            
            $snmpNamespace = \SnmpNamespaceQuery::create()
                                ->findOneByName($properties[0][$l]);
            
            if(!isset($snmpNamespace))
                continue;

            $name = $snmpNamespace->getName();
            
            //echo "\r\nSnmpNamespace::Name = " .$name;
            
            $snmpPropertyQuery = \SnmpPropertyQuery::create()
                                    ->filterBySnmpNamespace($snmpNamespace)
                                    ->findOneByProperty($property);
            
            if(isset($snmpPropertyQuery))
                continue;
            
            echo "\r\nNew Property: ".$property;
            
            $snmpProperty = new \SnmpProperty();
            $snmpProperty->setSnmpNamespace($snmpNamespace);
            $snmpProperty->setProperty($property);
            $snmpProperty->setName($property);
            $snmpProperty->save();
        }
    }
    
    
    protected function FindDevices($xml)
    {
        if(count($xml->host) > 0)
        {
            foreach($xml->host as $host)
            {
                $deviceQuery = \DeviceQuery::create()
                    ->findByIpaddress($host->address["addr"]);
        
                if($deviceQuery->count() > 0)
                    continue;

                $device = new \Device();
                
                if(is_array($host->hostnames))
                {
                    foreach ($host->hostnames as $hostname)
                    {
                        if($hostname["type"] == "PRT")
                        {
                            $device->setHostname($hostname["name"]);
                            break;
                        }
                    }
                }
                else if(isset($host->hostnames->hostname))
                {
                    if($host->hostnames->hostname["type"] == "PTR")
                    {
                        $device->setHostname($host->hostnames->hostname["name"]);
                    }
                }
                else
                {
                    $device->setHostname($host->address["addr"]);
                }
                
                if($host->address["addrtype"] == "ipv4")
                {
                    $device->setIpaddress($host->address["addr"]);
                }

                $device->setModified(true);
                $device->setActive(true);
                $device->setDateadded("now");
                $device->save();
                
                if($host->status["state"] == "up")
                {
                    $adapter = new \Adapter();
                    
                    if($host->address["addrtype"] == "ipv4")
                        $adapter->setIpaddress($host->address["addr"]);
                    if($host->address["addrtype"] == "mac")
                        $adapter->setMacaddress ($host->address["addr"]);
                    
                    $adapter->setName($host->address["addr"]);
                    $adapter->setModified(true);
                    
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