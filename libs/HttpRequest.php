<?php
namespace NetMon;

class HttpRequest
{
    protected $url;

    protected $method;    

    protected $headers;

    protected $data = "";

    public function __construct(){}
    
    public function SetHeaders($headers)
    {
        if(is_array($headers))
        {
            $this->headers = $headers;
            return true;
        }
        return false;
    }

    public function Get($request)
    {
        $this->url         = $request;
        $this->method      = "GET";
        return $this->Send();
    }

    public function Put($request, $payload)
    {
        $this->url         = $request;
        $this->method      = "PUT";
        $this->data        = $payload;

        return $this->Send();   

    }

    public function Post($request, $payload)
    {
        $this->url         = $request;
        $this->method      = "POST";
        $this->data        = $payload;

        return $this->Send();
    }

    public function Delete($request)
    {
        $this->url         = $request;
        $this->method      = "DELETE";
        return $this->Send();
    }

    protected function Send()
    {

        $params = 
                array('http'   => array
                (
                 'method'     => $this->method,
                 'content'    => $this->data
                ));

        $length = strlen($this->data);
        $contentHeaders[] = "Content-Length: " . $length;
        $contentHeaders[] = "Content-Type: " . "application/json";
        $headers = "";
        if (!empty($contentHeaders) && is_array($contentHeaders))
        {
            foreach ($contentHeaders as $header)
            {
                $headers .= $header."\n";
            }
        }

        $params['http']['header'] = $headers;

        $context    = stream_context_create($params);

        $fp = fopen($this->url, 'r', false, $context);
        
        if (!$fp)
        {
            throw new Exception("Problem with ".$this->url);
        }
        
        return $fp;
    }
}
?>