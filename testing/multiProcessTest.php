<?php
require_once '../libs/Bootstrap.php';
require_once ROOT. 'libs/plugins/Icmp.php';

echo "bootstrap";
$app = new NetMon\Bootstrap(true);

echo "ICMP";
$icmp = new Icmp();

echo "Device";
$device = new Device();
$device->setActive(1);
$device->setHostname("TestDevice");
$device->setIpaddress("192.168.1.1");
$device->save();

$adapter1 = new Adapter();
$adapter1->setDevice($device);
$adapter1->setName("Ethernet 0/0");
$adapter1->setIpaddress("192.168.1.1");
$adapter1->setNetmask("255.255.255.0");
$adapter1->save();

$adapter2 = new Adapter();
$adapter2->setDevice($device);
$adapter2->setName("Ethernet 0/0");
$adapter2->setIpaddress("192.168.1.50");
$adapter2->setNetmask("255.255.255.0");
$adapter2->save();

$adapter3 = new Adapter();
$adapter3->setDevice($device);
$adapter3->setName("Ethernet 0/0");
$adapter3->setIpaddress("192.168.1.20");
$adapter3->setNetmask("255.255.255.0");
$adapter3->save();

$adapter4 = new Adapter();
$adapter4->setDevice($device);
$adapter4->setName("Ethernet 0/0");
$adapter4->setIpaddress("192.168.1.203");
$adapter4->setNetmask("255.255.255.0");
$adapter4->save();

$monitor1 = new Monitor();
$monitor1->setAdapter($adapter1);
$monitor1->setDevice($device);
$monitor1->setPlugin($icmp->plugin);
$monitor1->save();

$monitor2 = new Monitor();
$monitor2->setAdapter($adapter2);
$monitor2->setDevice($device);
$monitor2->setPlugin($icmp->plugin);
$monitor2->save();

$monitor3 = new Monitor();
$monitor3->setAdapter($adapter3);
$monitor3->setDevice($device);
$monitor3->setPlugin($icmp->plugin);
$monitor3->save();

$monitor4 = new Monitor();
$monitor4->setAdapter($adapter4);
$monitor4->setDevice($device);
$monitor4->setPlugin($icmp->plugin);
$monitor4->save();

?>
