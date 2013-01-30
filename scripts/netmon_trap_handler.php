#!/usr/bin/php

<?php
	require_once '/var/www/localhost/htdocs/NetMon/libs/Bootstrap.php';

	$app = new \NetMon\Bootstrap(true);

	for($i = 0; $i < 15; $i++)
	{
		$trap[] = fgets(STDIN, 512);
	}
        
        for($i=0; $i < count($trap); $i++)
	{
		switch($i)
		{
			case 0:
				$trap['host'] = trim($trap[$i],"\n\r");
				break;
			case 1:
				$trap['packet'] = trim($trap[$i],"\n\r");
				break;
			case 2:
				$trap['uptime'] = trim($trap[$i],"\n\r");
				break;
			case 3:
				$trap['oid'] = trim($trap[$i],"\n\r");
				break;
			default:
				if($trap[$i] != "")
                                    $trap['payload'][] = trim($trap[$i],"\n\r");
				break;
		}
	}
        
        $numTraps = count($trap);
	for($i = 0; $i < $numTraps; $i++)
	{
		unset($trap[$i]);
	}

        $app->Logger->LogDebug("Trap Handler Execute");
        $app->CallbackPlugins("OnTrapReceived", $trap);
        $app->CallbackPlugins("ProcessThresholds");
?>
