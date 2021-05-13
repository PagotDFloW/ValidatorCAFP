<?
class ExtractCssErrors{

    public array $array_css;

    public function __construct($array_CS)
    {
        $this->array_css = $array_CS;
    }

    public function getArray()
    {
        return $this->array_css;
    }

    public function extract()
    {
        $ArrayCssErr = $this->array_css;
        $errors = $ArrayCssErr["cssvalidation"]["errors"];
        $warning = $ArrayCssErr["cssvalidation"]["warnings"];

        if($errors){
            $TabSize = sizeof($errors);
            
            echo "<h2>Erreurs Css <span class='badge bg-danger'>$TabSize</span></h2>";
            for ($i=0; $i< $TabSize; $i++){
                $type = $ArrayCssErr["cssvalidation"]["errors"][$i]["type"];
                $lastline = $ArrayCssErr["cssvalidation"]["errors"][$i]["line"];
                $message = $ArrayCssErr["cssvalidation"]["errors"][$i]["message"];
                $extract= $ArrayCssErr["cssvalidation"]["errors"][$i]["context"];
    
                echo "<div class='carte'><h4 class='erreur'><svg class='bi flex-shrink-0 me-2' width='24' height='24'>
                <use xlink:href='#exclamation-triangle-fill'/></svg>  $type error  in line $lastline : </h4> <p>$message  <br> $extract </p></div>";
    
            }
        }
        else {
            echo "<p> Aucune Erreurs détectées ! </p>";
        }

        if($warning){
            $WarningTabSize = sizeof($warning);
            echo "<h2>Avertissment Css <span class='badge bg-primary'>$WarningTabSize</span></h2>";

            for ($i=0; $i< $WarningTabSize; $i++){
                $type = $ArrayCssErr["cssvalidation"]["warnings"][$i]["type"];
                $lastline = $ArrayCssErr["cssvalidation"]["warnings"][$i]["line"];
                $message = $ArrayCssErr["cssvalidation"]["warnings"][$i]["message"];
                $extract= $ArrayCssErr["cssvalidation"]["warnings"][$i]["context"];
    
                echo "<div class='carte'><h4 class='info'><svg class='bi flex-shrink-0 me-2' width='24' height='24'><use xlink:href='#info-fill'/></svg>  $type warning  in line $lastline : </h4> <p>$message  <br> $extract </p></div>";
    
            }
        }
       
        else{
            "<p>Aucun avertissement à vous confier ! </p>";
        }
        
        
        
    }
}



?>