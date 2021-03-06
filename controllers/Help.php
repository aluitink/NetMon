<?php
namespace NetMon\Controllers;
require_once ROOT.'/libs/interfaces/IController.php';
use NetMon\Interfaces as Interfaces;

class Help extends Controller implements Interfaces\IController
{
    function __construct($method)
    {
        parent::__construct($method);
    }

    public function DefaultView()
    {
        $this->View->Render("help/index");
    }
    
    public function test()
    {
        $this->View->Render("help/test");
    }
    
    
}

?>
