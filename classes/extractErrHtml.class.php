<?php

class ExtractHtmlErrors{

    public array $array_html;

    public function __construct($array_HT)
    {
        $this->array_html = $array_HT;
    }

    public function getArray()
    {
        return $this->array_html;
    }

    public function extract()
    {
        $ArrayErr = $this->array_html;
        $TabSize = sizeof($ArrayErr["messages"]);
        echo "<h2>Erreurs & Avertissement HTML  <span class='badge bg-danger'>$TabSize</span></h2>";
        for ($i=0; $i< $TabSize; $i++){
            $type = $ArrayErr["messages"][$i]["type"];
            $lastline = $ArrayErr["messages"][$i]["lastLine"];
            $message = $ArrayErr["messages"][$i]["message"];
            $extract= htmlentities($ArrayErr["messages"][$i]["extract"]);


            if($type== "info"){
                echo "<div class='carte'><h4 class='info'><svg class='bi flex-shrink-0 me-2' width='24' height='24'><use xlink:href='#info-fill'/></svg>  $type : </h4><p>$message <br> ligne : $lastline <br> </p></div>";

            }
            else{
                echo "<div class='carte'><h4 class='erreur'><svg class='bi flex-shrink-0 me-2' width='24' height='24'>
                  <use xlink:href='#exclamation-triangle-fill'/></svg>  $type : </h4><p>$message <br> ligne : $lastline <br> $extract </p></div>";

            }
        }
        
    }
}



?>