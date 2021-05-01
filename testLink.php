<?php
echo "<h1>Allez on essaie des trucs</h1>";


$url = file_get_contents('http://alptpl.alwaysdata.net'); // Ont récupere tout le code xhtml de la page.
preg_match_all('`<a href="([^>]+)">[^<]+</a>`',$url,$liens); // Ont recherche tout les liens présent sur la page.
$count = count($liens[1]); // Nombre de liens trouvé
 
echo '<strong>Nous avons trouvé '.$count.' liens</strong><br />';
foreach($liens[1] as $lien){
    echo $lien.'<br />';
}
// include_once "test.php";
// $w3c = new W3cValidate("http://www.hashbangcode.com");
// echo $w3c->getValidation();
 
// $w3c = new W3cValidate("http://www.amazon.co.uk");
// echo $w3c->getValidation();

?>