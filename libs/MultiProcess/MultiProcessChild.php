<?php

class MultiProcessChild
{
        public $multiThreadCache;
        /**
	* Construct our child
	* The child will pass the header arguments to this class
	* We then get the timelimit, envelope, and stored variables
	*/
	public function __construct($args)
	{
            proc_nice(10);
            for($i=1;$i<count($args);$i++)
            {
                $request = explode('=',$args[$i]);
                $request[$request[0]] = $request[1];
            }

            
            $id = (int)$request['id'];

            if(!isset($id))
                throw new Exception("id={} is missing");
            
            $this->multiThreadCache = MultiThreadCacheQuery::create()
                                ->filterByMultithreadcacheid($id)
                                ->findOne();

            if(!isset($this->multiThreadCache))
                throw new Exception("Thread not found.");
            
            $this->multiThreadCache->setPid(getmypid());
            $this->multiThreadCache->save();
	}
	
        public function GetThreadTimeLimit()
        {
            return $this->multiThreadCache->getTimelimit();
        }
        
	/**
	* Returns our variables that were stored in the cache database
	*
	* @return unknown
	*/
	public function GetVariables()
	{
            return json_decode(base64_decode($this->multiThreadCache->getVariables()), true);
	}
	/**
	* When we're done, set the process complete add any output we want to send to the parent
	* We also set the actual PID so that the parent can verify it is destroyed
	* Then we kill the process using exit()
	*/
	public function SetProcessComplete($output)
	{
            $data = null;
            if(is_string($output))
                $data = $output;
            else
                $data = base64_encode(json_encode($output));
            $this->multiThreadCache->setOutput($data);
            $this->multiThreadCache->setStatus(true);
            $this->multiThreadCache->save();
	}
}
?>
