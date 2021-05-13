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
        $url = file_get_contents($this->url); // Ont récupere tout le code xhtml de la page.
        preg_match_all('`<a href="([^>]+)">[^<]+</a>`',$url,$liens); // Ont recherche tout les liens présent sur la page.
        $count = count($liens[1]); // Nombre de liens trouvé
        $array_Link=[];

        foreach($liens[1] as $lien){
            array_push($array_Link,$lien);
        }
        return $array_Link;

    }
}




?>