<?php

class RecupLink{

    private $url;

    public function __construct($URL)
    {
        $this->url=$URL;
    }
    
    public function getURL()
    {
        return $this->url;
    }

    public function getLink()
    {
        $url = $this->url;
        $pattern = '#(?:src|<a href|path|xmlns(?::xsl)?)\s*=\s*(?:"|\')\s*(.+)?\s*(?:"|\')#Ui';
        $subject = file_get_contents($url);
        preg_match_all($pattern, $subject, $matches, PREG_PATTERN_ORDER);
        $array_link=[];
        foreach($matches[1] as $match){
            if( ((substr($match,0,8)=="https://")) || ((substr($match,0,7))=="http://") ){
                continue;
            }
            if( ((substr($match,-4))==".php") || ((substr($match,-1))=="/") || ((substr($match,-4))==".html")) {
                array_push($array_link,$match);
            }
            
        }
        return $array_link;

    }
}




?>