<?php
require_once '../libs/Bootstrap.php';

$app = new NetMon\Bootstrap(true);
require_once ROOT . 'controllers/Discovery.php';
require_once ROOT . 'libs/plugins/Icmp.php';

$discovery = new \NetMon\Controllers\Discovery("POST");
$discovery->Scan("192.168.1.1");


require_once ROOT . 'controllers/Threshold.php';

$thresholdController = new \NetMon\Controllers\Threshold("GET");
$thresholdController->DefaultView();

require_once ROOT . 'scripts/netmon_cron.php';


//    //var_dump($xml);
//
//    //nmap
//    echo "scanner: " . $xml["scanner"] . "\r\n";
//    //nmap -T4 -A -p 1-1000 -oX - 192.168.1.0/24
//    echo "args: " . $xml["args"] . "\r\n";
//    //1358472884
//    echo "start: " . $xml["start"] . "\r\n";
//    //Thu Jan 17 19:34:44 2013
//    echo "startstr: " .$xml["startstr"] . "\r\n";
//    //6.01
//    echo "version: ". $xml["version"] . "\r\n";
//    //1.04
//    echo "xmloutputversion: ". $xml["xmloutputversion"] . "\r\n";
//
//    //syn
//    echo "type: ". $xml->scaninfo["type"] . "\r\n";
//    //tcp
//    echo "protocol: ". $xml->scaninfo["protocol"] . "\r\n";
//    //1000
//    echo "numservices: " . $xml->scaninfo["numservices"] . "\r\n";
//    //1-1000
//    echo "services: ".$xml->scaninfo["services"] . "\r\n";
//    //0
//    echo "level: ".$xml->verbose["level"] . "\r\n";
//    //0
//    echo "level: ". $xml->debugging["level"] . "\r\n";
//    //1358472884
//    echo "starttime: ". $xml->host["starttime"] . "\r\n";
//    //1358472982
//    echo "endtime: ". $xml->host["endtime"] . "\r\n";
//
//
//
//    for($i = 0; $i < count($xml->host); $i++)
//    {
//        echo "\r\nhost: " . $i . "\r\n";
//        echo "state: " . $xml->host[$i]->status["state"] . "\r\n";
//        echo "reason: ". $xml->host[$i]->status["reason"] . "\r\n";
//        for($j = 0; $j < count($xml->host[$i]->address); $j++)
//        {
//            echo "\r\naddress: " . $j . "\r\n";
//            echo "addr: " .$xml->host[$i]->address[$j]["addr"] . "\r\n";
//            echo "addrtype: ". $xml->host[$i]->address[$j]["addrtype"] . "\r\n";
//        }
//        echo "hostnames: " .$xml->host[$i]->hostnames . "\r\n";
//        echo "state: ". $xml->host[$i]->ports->extraports["state"] . "\r\n";
//        echo "count: ". $xml->host[$i]->ports->extraports["count"] . "\r\n";
//        echo "reson: ". $xml->host[$i]->ports->extraports->extrareasons["reason"] . "\r\n";
//        echo "count: ". $xml->host[$i]->ports->extraports->extrareasons["count"] . "\r\n";
//
//        for($j = 0; $j < count($xml->host[$i]->ports->port); $j++)
//        {
//            echo "\r\nport: " . $j . "\r\n";
//            echo "protocol: ". $xml->host[$i]->ports->port[$j]["protocol"] . "\r\n";
//            echo "portid: ". $xml->host[$i]->ports->port[$j]["portid"] . "\r\n";
//            echo "state: ". $xml->host[$i]->ports->port[$j]->state["state"] . "\r\n";
//            echo "reason: ". $xml->host[$i]->ports->port[$j]->state["reason"] . "\r\n";
//            echo "reason_ttl: " . $xml->host[$i]->ports->port[$j]->state["reason_ttl"] . "\r\n";
//            echo "name: ". $xml->host[$i]->ports->port[$j]->service["name"] . "\r\n";
//            echo "product: ". $xml->host[$i]->ports->port[$j]->service["product"] . "\r\n";
//            echo "version: ". $xml->host[$i]->ports->port[$j]->service["version"] . "\r\n";
//            echo "method: ". $xml->host[$i]->ports->port[$j]->service["method"] . "\r\n";
//            echo "conf: ". $xml->host[$i]->ports->port[$j]->service["conf"] . "\r\n";
//            echo "cpe: ". $xml->host[$i]->ports->port[$j]->service["cpe"] . "\r\n";
//        }
//
//        for($k = 0; $k < count($xml->host[$i]->os->portused); $k++)
//        {
//            echo "\r\nportused: ". $k . "\r\n";
//            echo "state: ". $xml->host[$i]->os->portused[$k]["state"] . "\r\n";
//            echo "proto: " .$xml->host[$i]->os->portused[$k]["proto"] . "\r\n";
//            echo "portid: ". $xml->host[$i]->os->portused[$k]["portid"] . "\r\n";
//        }
//
//        echo "name: " .$xml->host[$i]->os->osmatch["name"] . "\r\n";
//        echo "accuracy: ".$xml->host[$i]->os->osmatch["accuracy"] . "\r\n";
//        
//        echo "line: ".$xml->host[$i]->os->osmatch["line"] . "\r\n";
//        echo "type: ".$xml->host[$i]->os->osmatch->osclass["type"] . "\r\n";
//        echo "vendor: ".$xml->host[$i]->os->osmatch->osclass["vendor"] . "\r\n";
//        echo "osfamily: ". $xml->host[$i]->os->osmatch->osclass["osfamily"] . "\r\n";
//        echo "osgen: ". $xml->host[$i]->os->osmatch->osclass["osgen"] . "\r\n";
//        echo "accuracy: ".$xml->host[$i]->os->osmatch->osclass["accuracy"] . "\r\n";
//        echo "cpe: ". $xml->host[$i]->os->osmatch->osclass->cpe. "\r\n";
//        
//
//        echo "seconds: ".$xml->host[$i]->uptime["seconds"] . "\r\n";
//        echo "lastboot: ".$xml->host[$i]->uptime["lastboot"] . "\r\n";
//        
//        
//        
//        echo "value: ".$xml->host[$i]->distance["value"] . "\r\n";
//        echo "index: ".$xml->host[$i]->tcpsequence["index"] . "\r\n";
//        echo "difficulty: ".$xml->host[$i]->tcpsequence["difficulty"] . "\r\n";
//        echo "values: ".$xml->host[$i]->tcpsequence["values"] . "\r\n";
//        
//        echo "class: ".$xml->host[$i]->ipidsequence["class"] . "\r\n";
//        echo "values: ".$xml->host[$i]->ipidsequence["values"] . "\r\n";
//        
//        echo "class: ".$xml->host[$i]->tcptssequence["class"] . "\r\n";
//        echo "values: ".$xml->host[$i]->tcptssequence["values"] . "\r\n";
//
//        echo "ttl: ".$xml->host[$i]->trace->hop["ttl"] . "\r\n";
//        echo "ipaddr: ".$xml->host[$i]->trace->hop["ipaddr"] . "\r\n";
//        echo "rtt: ".$xml->host[$i]->trace->hop["rtt"] . "\r\n";
//        
//        
//        echo "srtt: ". $xml->host[$i]->times["srtt"] . "\r\n";
//        echo "rttvar: ".$xml->host[$i]->times["rttvar"] . "\r\n";
//        echo "to: ". $xml->host[$i]->times["to"] . "\r\n";
   
?>
