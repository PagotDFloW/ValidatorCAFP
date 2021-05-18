<?php

class Connect {

  private $nom;
  private $prenom;
  private $mail;
  private $password;

  public function __construct() {

    $this->nom = $n;
    $this->prenom = $p;
    $this->mail = $m;
    $this->password = md5($mail.$password);

  }

  public function newConnection {

  	$pdo = new PDO('mysql:dbname=validatorap_tdb;host=mysql-validatorap.alwaysdata.net', '232356', 'Florian2002*');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERMODE_EXCEPTION);

    


  }

}

 


?>