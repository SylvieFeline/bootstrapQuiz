<?php

// vérification présence données

if (isset($_POST['pseudo']) AND
    isset($_POST['nom']) AND
    isset($_POST['prenom']) AND
    isset($_POST['email']) AND
    isset($_POST['pwd']) AND
    isset($_POST['pwd2'])) {

// récupération des données
    $pseudo = $_POST['pseudo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['pwd'];
    $mdp2 = $_POST['pwd2'];

// connection à la base de données
    include("logbdd.php"); 

// requete insertion des données dans la base de données
$requete = 'INSERT INTO membre VALUES ("","'.$pseudo.'",
"'.$prenom.'","'.$nom.'","'.$email.'","'.$mdp.'", NOW(), "2")';

// préparation et execution de la requete 
 $req = $bdd->prepare($requete);   
 $req = $bdd->exec($requete); 

// message de confirmation
    $message = "Félicitation, vous êtes désormais membre. <br>";
    $message .= "Vous pouvez maintenant vous connecter pour accéder à toutes les fonctionnalités de l'application.";
    
} else {
    $message = "Enregistrement non effectué. <br>";
}


?>