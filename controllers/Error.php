<?php
namespace NetMon\Controllers;
require_once ROOT.'/libs/interfaces/IController.php';
use NetMon\Interfaces as Interfaces;

class Error extends Controller implements Interfaces\IController
{
    function __construct($method)
    {
        parent::__construct($method);
    }
    
    public function DefaultView()
    {
        $this->View->Render("error/index");
    }
}

?>