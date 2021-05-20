<?
$entityManager = require_once ("../../bootstrap.php");
use validatorap\classes\User;
session_start();

$userRepo = $entityManager->getRepository(User::class);


if(isset($_POST["valider"])){
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];


    //Va rechercher dans la base de données (fais office de select avec conditions)
    $usersByRole = $userRepo->findBy(["email" => "$email", "mdp" => md5($email.$mdp)]);

    if($usersByRole){
        foreach ($usersByRole as $user) {
            if(($user->getEmailConfirmed())=="FALSE"){
                header("Location: ../login.php?error=mail");
                exit();
            }
            else{
                $_SESSION["nom"]= $user->getNom();
                $_SESSION["prenom"]=$user->getPrenom();
                $_SESSION["email"]=$email;
                $_SESSION["mdp"]=md5($email.$mdp);
                header("Location: ../index.php");
                exit();
            }
        }
    }
    else{
        header("Location: ../login.php?error=idents");
    }


}

?>