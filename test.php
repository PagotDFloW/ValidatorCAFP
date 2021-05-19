<?php
 /**$url = 'https://getbootstrap.com/';
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
 var_dump($array_link);**/

$url = 'http://alptpl.alwaysdata.net/';
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


?>