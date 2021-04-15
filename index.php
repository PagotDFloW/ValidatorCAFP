<?php
include_once "test.php";
$w3c = new W3cValidate("http://www.hashbangcode.com");
echo $w3c->getValidation();
 
$w3c = new W3cValidate("http://www.amazon.co.uk");
echo $w3c->getValidation();

?>