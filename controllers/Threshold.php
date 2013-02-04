<?php
namespace NetMon\Controllers;
require_once ROOT.'libs/Controller.php';
require_once ROOT.'libs/interfaces/IController.php';

use NetMon\Interfaces as Interfaces;

class Threshold extends Controller implements Interfaces\IController
{
    function __construct($method)
    {
        parent::__construct($method);
    }
    
    public function DefaultView()
    {

    }
}

?>