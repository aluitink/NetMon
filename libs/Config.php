<?php
namespace NetMon;

class Config
{
    const DatabaseDsn = "mysql:host=localhost;dbname=NetMon";
    const DatabaseUser = "netmon";
    const DatabasePass = "wYqFBT5U93pzZVAf";
    
    const PropelModels = "orm";
    const PropelConfig = "orm/NetMon-conf.php";
    const ControllersPath = "controllers";
    const TemplatesPath = "templates";
    const ModelsPath = "models";
    const LogPath = "/archive/log/website/netmon.log";
    const LogLevel = 1;
}

?>
