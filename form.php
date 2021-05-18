<?php

include("user.php");

$u = new User ($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"]);

$u->addUser();


?>