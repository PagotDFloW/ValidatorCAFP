<?php
# www/classes/User.php

namespace validatorap\classes;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="users")
*/

class User
{
    /**
    * @ORM\id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $idUser;

    /**
    * @ORM\Column(type="string")
    */
    protected $nom;

    /**
    * @ORM\Column(type="string")
    */
    protected $prenom;

    /**
    * @ORM\Column(type="string")
    */
    protected $email;

    /**
    * @ORM\Column(type="string")
    */
    protected $emailConfirmed;

    /**
    * @ORM\Column(type="string")
    */
    protected $mdp;

    public function getIdUser()
    {
        return $this->idUser;
    }
     
    public function setidUser($idUser)
    {
        $this->idUser = $idUser;
    }
     
    public function getNom()
    {
        return $this->nom;
    }
     
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
     
    public function getPrenom()
    {
        return $this->prenom;
    }
     
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
     
    public function getEmail()
    {
        return $this->email;
    }
     
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmailConfirmed()
    {
        return $this->emailConfirmed;
    }
     
    public function setEmailConfirmed($emailConfirmed)
    {
        $this->emailConfirmed = $emailConfirmed;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
     
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
}

?>