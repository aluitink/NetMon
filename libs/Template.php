<?php
namespace NetMon;
require_once 'Config.php';
use NetMon;
class Template
{
    public $TemplateContent;
    private $tags = array();

    function __construct($template)
    {
        $this->TemplateContent = file_get_contents(NetMon\Config::TemplatesPath . "/" . $template);
    }

    public function Set($tagName, $value)
    {
        $this->tags[$tagName] = $value;
    }

    public function Get()
    {
        foreach($this->tags as $tagName => $value)
        {
            $tagToReplace = "@{".$tagName."}";
            $this->TemplateContent = str_replace($tagToReplace, $value, $this->TemplateContent);            
        }
        return $this->TemplateContent;
    }

    public function Show()
    {
        echo $this->Get();
    }
    
    public static function ReadTemplateFile($template)
    {
        return file_get_contents(NetMon\Config::TemplatesPath . "/" . $template);
    }
}

?>