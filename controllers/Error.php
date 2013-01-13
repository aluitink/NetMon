<?php
namespace NetMon\Controllers;
require_once ROOT.'/libs/interfaces/IController.php';
use NetMon\Interfaces as Interfaces;

class Error extends Controller implements Interfaces\IController
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function DefaultView()
    {
        $this->View->Render("error/index");
    }
}

?>