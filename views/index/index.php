<?php
    $template = new NetMon\Template("index/index.html");
    
    $device = new Device();
    
    $device->setHostname("Andy-PC");
    $device->setIpAddress("127.0.0.1");
    $device->setActive(true);
    $device->setModified(false);
    
    $device->save();
    
    $template->Show();
?>