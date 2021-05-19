<?php

class ValidationUrl {
    private $url;

    public function __construct($URL){
        $this->url = $URL;
    }


    public function getUrl(){
        return $this->url;
    }

    public function GetHtmlErrors()
    {
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
            )
          );
        $context = stream_context_create($options);

        $htmlUrl = "https://validator.w3.org/nu/?doc=".$this->url."&out=json";
        $W3C = file_get_contents($htmlUrl,false,$context);
        $resJson = json_decode($W3C,TRUE);

        return $resJson;
    }

    public function GetCssErrors()
    {
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
            )
        );
        $context = stream_context_create($options);

        $url = "https://jigsaw.w3.org/css-validator/validator?uri=".$this->url."&profile=css3&output=json";
        $file = file_get_contents($url, false, $context);
        $tabJay = json_decode($file,TRUE);

        return $tabJay;

    }


    


}











?>