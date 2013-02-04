<?php
namespace NetMon;

class Config
{
    const DatabaseDsn = "mysql:host=localhost;dbname=NetMon";
    const DatabaseUser = "netmon";
    const DatabasePass = "wYqFBT5U93pzZVAf";
    
    const DefaultSnmpCommunity = "habathcx";
    const DefaultSnmpVersion = "2c";
    const DefaultUptimeOid = "sysUpTime.0";
    
    
    const PropelModels = "orm";
    const PropelConfig = "orm/NetMon-conf.php";
    
    const MultiProcessThreadTimeLimit = 20;
    const MultiProcessThrottled = 1;
    const MultiProcessThreadsPerBatch = 10;
    const MultiProcessThrottlePause = 5;
    
    const ControllersPath = "controllers";
    const TemplatesPath = "templates";
    const PluginsPath = "libs/plugins";
    
    const NmapPath = "/usr/bin/nmap";
    const RootPassword = "Romance252";
    const LogPath = "/archive/log/website/netmon.log";
    const LogLevel = 1;
}

?>