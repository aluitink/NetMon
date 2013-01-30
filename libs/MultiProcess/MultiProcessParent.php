<?php
namespace NetMon\MultiProcess;
require_once ROOT . 'libs/Config.php';
require_once ROOT . 'libs/Propel/runtime/lib/Propel.php';

class MultiProcessParent
{
    public $BatchIdentifier;
    function __construct()
    {
        $this->BatchIdentifier = $this->CreateBatchIdentifier();
    }

    /**
    * Add a process to the database and start it
    *
    * @param array $processes
    */
    public function CreateChildren($processes = array())
    {
        $j = 0;
        for($i = 0; $i < count($processes); $i++)
        {
            //check if file exists
            if(file_exists($processes[$i]['path']))
            {                    
                $variables = base64_encode(json_encode($processes[$i]['variables']));

                $multiThreadCache = new \MultiThreadCache();
                $multiThreadCache->setBatchIdentifier($this->BatchIdentifier);
                $multiThreadCache->setVariables($variables);
                $multiThreadCache->setStatus(false);
                $multiThreadCache->setTimelimit(\NetMon\Config::MultiProcessThreadTimeLimit);
                $multiThreadCache->save();
                $id = $multiThreadCache->getMultiThreadCacheid();
                exec("nohup /usr/bin/php -f " . $processes[$i]['path'] . " id=" . $id ." > /dev/null 2>&1 &");
                $j++;
            }
            else
            {
                throw new Exception("Path does not exist");
            }

            if(\NetMon\Config::MultiProcessThrottled == 1)
            {
                if($j == \NetMon\Config::MultiProcessThreadsPerBatch)
                {
                    usleep(\NetMon\Config::MultiProcessThrottlePause * 1000000);
                    $j = 0;
                }
            }
        }
    }

    /**
    * Create BatchIdentifier
    *
    * @param array $length
    */
    public function CreateBatchIdentifier($length=10)
    {
        $envelope = '';
        $possible = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        for($i=1;$i<$length;$i++):
                $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
                $envelope .= $char;
        endfor;

        /**
        * Check to make sure this envelope doesn't already exist
        * The probability of this happening is essentially zero
        */
        $multiProcessCache = \MultiThreadCacheQuery::create()
                ->filterByBatchIdentifier($envelope)
                ->findOne();

        if(isset($multiProcessCache))
        {
            return $this->CreateBatchIdentifier($length);
        }

        return $envelope;
    }

    /**
    * Check the status of our multi-process
    *
    * @param int $sleep
    * @return boolian
    */
    public function CheckStatus($sleep = 100000)
    {
        $cur = 0;
        while( $cur < \NetMon\Config::MultiProcessThreadTimeLimit)
        {
            //echo $envelope;
            // wait for 100000 microseconds, or .1 seconds by default
            usleep($sleep);

            //usleep is microseconds, and we need to convert it to seconds
            $cur += ($sleep/1000000);

            if($this->ReturnStatus($this->BatchIdentifier))
                return true;
        }
        /**
        * If process is still running after timeout return false
        */
        return false;
    }

    /**
    * Check to see if there are any uncompleted processes
    * Return true if we're done, false if we're still processing
    *
    * @return boolian
    */
    public function ReturnStatus()
    {
        $multiThreadCache = \MultiThreadCacheQuery::create()
                            ->filterByStatus(false)
                            ->filterByBatchidentifier($this->BatchIdentifier)
                            ->find();

        if($multiThreadCache->count() > 0)
            return false;
        return true;
    }

    /**
    * Returns output from the children
    *
    * @return array
    */
    public function GetOutput()
    {
        $multiThreadCache = \MultiThreadCacheQuery::create()
                            ->filterByBatchidentifier($this->BatchIdentifier)
                            ->find();
        $output = array();
        foreach($multiThreadCache as $task)
        {
            $output[] = json_decode(base64_decode($task->getOutput()), true);
        }
        return $output;
    }


    /**
    * Manually destroy everything
    */
    function Cleanup()
    {
        $multiThreadCache = \MultiThreadCacheQuery::create()
                            ->filterByBatchidentifier($this->BatchIdentifier)
                            ->delete();
    }

    /**
    * Check if the process is still running !
    *
    * @param int $pid
    * @return boolen
    */
    public function IsRunning($pid)
    {
       exec("ps $pid", $processState);

       return(count($processState) >= 2);
    }

    /**
    * Kill Application pid
    *
    * @param int $pid
    * @return boolen
    */
    public function Kill($pid)
    {
        if($this->IsRunning($pid) && $pid != "")
        {
            exec("kill -KILL $pid 2>&1 | test");
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>