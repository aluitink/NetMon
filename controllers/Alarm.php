<?php
namespace NetMon\Controllers;
require_once ROOT.'libs/Controller.php';
require_once ROOT.'libs/interfaces/IController.php';
require_once ROOT. 'libs/Bootstrap.php';
use NetMon\Interfaces as Interfaces;

class Alarm extends Controller implements Interfaces\IController
{
    function __construct($method)
    {
        parent::__construct($method);
    }
    
    public function DefaultView()
    {
        $this->View->Render("alarm/index");
    }
    
    public function Alarms()
    {
        switch($this->RequestMethod)
        {
            case "GET":
                $this->getAlarms();
                break;
            case "POST":
                echo "invalidrequest";
                break;
        }
    }
    
    public function Acknowledge()
    {
        switch($this->RequestMethod)
        {
            case "GET":
                
                
                
                break;
            case "POST":
                if($_POST["ack"])
                {
                    foreach($_POST["alarms"] as $alarmId)
                    {
                        $alarm = \AlarmQuery::create()
                                    ->findOneByAlarmid($alarmId);
                        $alarm->setAcknowledged(true);
                        $alarm->save();
                    }
                    
                }
                break;
        }
    }
    
    private function getAlarms()
    {
        $app = new \NetMon\Bootstrap(true);

        //http://datatables.net/usage/server-side

        $alarmSet = \AlarmQuery::create()
                    ->filterByAcknowledged(0)
                    ->find();

        $alarms = array();
        $j = 0;
        foreach($alarmSet as $alarm)
        {
            $threshold = $alarm->getThreshold();
            
            $plugin = $threshold->getPlugin();
            $pluginId = $plugin->getPluginid();
            $realPlugin = $app->LoadPlugin($pluginId);
            
            $monitor = $threshold->getMonitor();
            $pluginMeta = $monitor->getPluginmeta();
            $data = json_decode($pluginMeta->getValue(), true);
            
            $adapter = null;
            
            if(isset($data["AdapterId"]))
            {
                $adapter = \AdapterQuery::create()
                        ->findOneByAdapterid($data["AdapterId"]);
            }
            else if(isset($data["DeviceId"]))
            {
                $adapter = \AdapterQuery::create()
                         ->findOneByDeviceid($data["DeviceId"]);
            }
            
            $device = $adapter->getDevice();
            
            $monitorId = $monitor->getMonitorid();
            $monitorValue = $realPlugin->GetResultByMonitor($monitorId);
            $alarmActive = $alarm->getActive();

            $alarms[$j]['id'] = $alarm->getAlarmid();
            $alarms[$j][0] = $device->getHostname();
            $alarms[$j][1] = $adapter->getIpAddress();
            $alarms[$j][2] = $adapter->getName();
            $alarms[$j][3] = $alarm->getTimestamp("h:i:s m-d-y");
            $alarms[$j][4] = $plugin->getName();
            $alarms[$j][5] = $threshold->getValue();
            $alarms[$j][6] = $monitorValue;


            if($alarmActive == 1)
            {
                    //$this->stateChangeFlag = 1;
                    $alarms[$j][7] = "<div class =\"critical\">CRITICAL</div>";
            }
            else
            {
                    $alarms[$j][7] = "<div class =\"info\">INFO</div>";
            }
            $j++;
        }


        $sOutput = '{';
        //$sOutput .= '"sEcho": '. intval($_GET['sEcho']) .', ';
        $sOutput .= '"iTotalRecords": '.$j.', ';
        $sOutput .= '"iTotalDisplayRecords": 10, ';
        $sOutput .= '"aaData": [ ';



        for($i = 0; $i < count($alarms); $i++)
        {
                $sOutput .= "[";
                $sOutput .= '"'.addslashes($alarms[$i]['id']).'",';
                $sOutput .= '"'.addslashes($alarms[$i][0]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][1]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][2]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][3]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][4]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][5]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][6]).'",';
                $sOutput .= '"'.addslashes($alarms[$i][7]).'"';
                $sOutput .= "],";	
        }

        if(count($alarms) < 10)
        {
                for($i = 0; $i < (10 - count($alarms)); $i++)
                {
                        $sOutput .= "[";
                        $sOutput .= '"'.$i.':blank",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - ",';
                        $sOutput .= '" - "';
                        $sOutput .= "],";	
                }
        }

        $sOutput = substr_replace( $sOutput, "", -1 );
        $sOutput .= '] }';


        echo $sOutput;
    }
}

?>