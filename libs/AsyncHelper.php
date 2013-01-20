<?php
namespace NetMon;

require_once 'HttpRequest.php';

class AsyncHelper
{
    public function __construct()
    {
        
    }
    
    public static function JobStartAsync($request, $payload = NULL, $port = 80, $conn_timeout = 30, $rw_timeout = 86400)
    {
        set_time_limit(0);
        $httpRequest = new HttpRequest();

        $response = null;
        if($payload == NULL)
        {
            $response = $httpRequest->Get($request);
        }
        else
        {
            if(is_object($payload))
            {
                $payload = json_encode($payload);
                
            }
            
            $response = $httpRequest->Post($request, $payload);
        }
        
        return $response;
    }

    // returns false if HTTP disconnect (EOF), or a string (could be empty string) if still connected
    public static function JobPollAsync(&$fp) 
    {
        if ($fp === false) return false;

        if (feof($fp)) {
            fclose($fp);
            $fp = false;
            return false;
        }
        $response = stream_get_contents($fp, 8192);

        if(!empty($response))
            return $response;
        return false;
    }
}
?>
