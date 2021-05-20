<?php

<<<<<<< HEAD

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

=======
>>>>>>> fe8ad0273fe5588c90d3cada649705fd699249d3
$entityManager = require_once ("../../bootstrap.php");
use validatorap\classes\User;

$userRepo = $entityManager->getRepository(User::class);


if(isset($_POST["valider"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $entreprise = $_POST["entreprise"];
    $ville = $_POST["ville"];


    //Va rechercher dans la base de données (fais office de select avec conditions)
    $usersByRole = $userRepo->findBy(["nom" => "$nom", "prenom" => "$prenom", "email" => "$email", "mdp" => md5($email.$mdp)]);

    if($usersByRole){
        foreach ($usersByRole as $user) {
            echo "Utilisateur déjà inscrit dans la base de données";
        }
    }
    else{

        //insert dans la bdd
        $user = new User();
        $user->setNom("$nom");
        $user->setPrenom("$prenom");
        $user->setEmail("$email");
        $user->setEmailConfirmed("FALSE");
        $user->setMdp(md5($email.$mdp));
        $user->setEntreprise("$entreprise");
        $user->setVille("$ville");

        // // Gestion de la persistance
        $entityManager->persist($user);
        $entityManager->flush();

        echo "Utilisateur inscrit. Bienvenue $prenom $nom !";
<<<<<<< HEAD


        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = Off (Producton) - 1 = Messages client - 2 = Messages client et serveur
        $mail->Host = "smtp-validatorap.alwaysdata.net"; //Hote SMTP (Cloudfordream : mail.votredomaine.tld ou webmail.votredomaine.tld ou encore IP de l'hébergement)
        $mail->Port = 587; //Port SMTP
        $mail->SMTPSecure = 'tls'; //Encryption : tls
        $mail->SMTPAuth = true; //SMTP requiere une authentification true ou false
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        ); //Options de la connexion SMTP
        $mail->Username = "validatorap@alwaysdata.net"; //Identifiant SMTP (Email complète sur votre hébergement Cloudfordream (exemple@votredomaine.tld))
        $mail->Password = "Florian2002*"; //Mot de passe SMTP (Mot de passe de la boîte mail Cloudfordream)
        $mail->setFrom('validatorap@alwaysdata.net
        ', 'ValidatorAP'); //Votre email (exemple@votredomaine.tld) - Votre nom
        $mail->addAddress($email, $prenom." ".$nom); //Email du destinataire - Nom du destinataire
        $mail->Subject = 'ValidatorAP - Inscription'; //Sujet du mail
        $mail->msgHTML(file_get_contents("confirmMail.html")); //Contenu de votre email, vous pouvez aussi appeler un template externe avec "file_get_contents"
        $mail->AltBody = 'HTML messaging not supported';

        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message envoyé !";
        }
=======
>>>>>>> fe8ad0273fe5588c90d3cada649705fd699249d3
    }


}

<<<<<<< HEAD
?>
=======
?>
>>>>>>> fe8ad0273fe5588c90d3cada649705fd699249d3
