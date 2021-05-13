<?php
include ("./classes/validationurl.class.php");


function AffichValidate($url){
$getUrl = new ValidationUrl("$url");

echo $getUrl;
echo "<br>==================================Examination HTML Errors========================<br>";
$ArrayErr = $getUrl->GetHtmlErrors();
$TabSize = sizeof($ArrayErr["messages"]);
echo $TabSize." erreurs rapportées";
for ($i=0; $i<= $TabSize; $i++){
    $type = $ArrayErr["messages"][$i]["type"];
    $lastline = $ArrayErr["messages"][$i]["lastLine"];
    $message = $ArrayErr["messages"][$i]["message"];
    $extract= $ArrayErr["messages"][$i]["extract"];

    echo "<h4>$type : </h4> <p>$message <br> ligne : $lastline <br> </p>";

}
echo"<br>===================================CSS ERRORS=================================<br>";
$ArrayCssErr = $getUrl->GetCssErrors();
$TabSize = sizeof($ArrayCssErr["cssvalidation"]["errors"]);
echo $ArrayErr["cssvalidation"]["uri"];
echo $TabSize." erreurs rapportées";
for ($i=0; $i<= $TabSize; $i++){
    $type = $ArrayCssErr["cssvalidation"]["errors"][$i]["type"];
    $lastline = $ArrayCssErr["cssvalidation"]["errors"][$i]["line"];
    $message = $ArrayCssErr["cssvalidation"]["errors"][$i]["message"];
    $extract= $ArrayCssErr["cssvalidation"]["errors"][$i]["context"];

    echo "<div class='AffichErreurs'><h4><svg class='bi flex-shrink-0 me-2' width='24' height='24'>
    <use xlink:href='#exclamation-triangle-fill'/></svg>$type error  in line $lastline : </h4> <p>$message  <br> $extract </p></div>";

}

}
?>