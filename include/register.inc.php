<?
$entityManager = require_once ("../../bootstrap.php");
use validatorap\classes\User;

$userRepo = $entityManager->getRepository(User::class);


if(isset($_POST["valider"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];


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

        // // Gestion de la persistance
        $entityManager->persist($user);
        $entityManager->flush();

        echo "Utilisateur inscrit. Bienvenue $prenom $nom !";
    }


}









?>