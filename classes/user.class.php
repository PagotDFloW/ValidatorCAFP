<?php

class User
{
  
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


  public function addUser(){

    $pdo = new PDO('mysql:dbname=validatorap_tdb;host=mysql-validatorap.alwaysdata.net', '232356', 'Florian2002*');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERMODE_EXCEPTION);

    if (empty($this->nom)||empty($this->prenom)||empty($this->mail)||empty($this->password)){

      echo "Certains champs sont vides, veuillez les remplir";
    }

    else {

      $req = $pdo->query ("INSERT INTO users (idUser, nom , prenom, email, mdp) VALUES (NULL,'".$this->nom."','".$this->prenom."','".$this->mail."','".$this->password."')");

    }

    $result = mysql_query($query);
    if ($result){

      echo "Inscription reussie";

    }

    else {

      echo "Echec de l'inscription";
    }
  }



}