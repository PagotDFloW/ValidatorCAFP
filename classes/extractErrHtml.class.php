<?php

class ExtractHtmlErrors{

    public array $array_html;
    public string $url;

    public function __construct($array_HT,$URL)
    {
        $this->array_html = $array_HT;
        $this->url = $URL;
    }

    public function getArray()
    {
        return $this->array_html;
    }

    public function extract()
    {
        $ArrayErr = $this->array_html;
        if($ArrayErr["messages"]){

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
        else{
            echo "<div class='carte'><h4 class='success'>  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>  Aucunes Erreurs n'ont été détectées sur cette page </div>";
        }
        
    }

    public function validLink()
    {
        $url = $this->url;
        $pattern = '#(?:src|href|path|xmlns(?::xsl)?)\s*=\s*(?:"|\')\s*(.+)?\s*(?:"|\')#Ui';
        $subject = file_get_contents($url);
        preg_match_all($pattern, $subject, $matches, PREG_PATTERN_ORDER);
        $i=0;
        foreach($matches[1] as $match){
        $parsing= parse_url($match);
        if($parsing["scheme"]){
            $ch = curl_init($match);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_NOBODY, true);
                if (curl_exec($ch) === false) {
                    echo "<div class='carte'><h4 class='erreur'><svg class='bi flex-shrink-0 me-2' width='24' height='24'>
                    <use xlink:href='#exclamation-triangle-fill'/></svg> Lien invalide : $match</h4><p> Pour la raison suivante : <strong>".curl_error($ch)."</strong></p></div>";
                    $i++;
                }
                else
                {
                    continue;
                }
            curl_close($ch);
        }


        else{
            if($parsing["path"]){
                $url.="/";
            }
            $ch = curl_init($url.$match);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_NOBODY, true);
                if (curl_exec($ch) === false) {
                    echo "<div class='carte'><h4 class='erreur'><svg class='bi flex-shrink-0 me-2' width='24' height='24'>
                    <use xlink:href='#exclamation-triangle-fill'/></svg> Lien invalide :". $url.$match."</h4><p> Pour la raison suivante : <strong>".curl_error($ch)."</strong></p></div>";
                }
                else
                {
                    continue;
                }
            curl_close($ch);
        }

        }
        if($i==0){
            echo "<div class='carte'><h4 class='success'>  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>  Aucun problème de lien n'a été détecté sur cette page </div>";
        
        }
    }
}



?>