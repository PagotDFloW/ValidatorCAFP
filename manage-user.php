<?php
# manage-user.php

$entityManager = require_once ("../bootstrap.php");
// require_once("./classes/User.php");


use validatorap\classes\User;


$userRepo = $entityManager->getRepository(User::class);


// Instanciation de l'utilisateur

// $user = new User();
// $user->setNom("Edward");
// $user->setPrenom("Newgate");
// $user->setEmail("edward@free.fr");
// $user->setEmailConfirmed("FALSE");
// $user->setMdp(md5("Florian2002"));

// // Gestion de la persistance
// $entityManager->persist($user);
// $entityManager->flush();

// // Vérification du résultats
// echo "Identifiant de l'utilisateur créé : ", $user->getIdUser(), "\n";
// echo "Wsh ", $user->getNom(), " ", $user->getPrenom();

$usersByRole = $userRepo->findBy(["nom" => "Edward"]);
echo "Recherche..... <br>";

if($usersByRole){
    foreach ($usersByRole as $user) {
        echo $user->getNom(), " ", $user->getPrenom(), " était déjà présent dans la base de données";
    }
}
else{
    echo "utilisateur non trouvé dans la bdd.";
}


?>