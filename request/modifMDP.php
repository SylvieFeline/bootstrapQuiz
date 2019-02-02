<?php
session_start();

// récupération id du membre
$idMembre = $_SESSION['idMembre'];

// vérification présence données
if ((isset($_POST['pwd']) && !empty($_POST['pwd']))AND
   (isset($_POST['pwd2']) && !empty($_POST['pwd2']))) {
   
    // récupération des données
    $mdp = $_POST['pwd'];
    $mdp2 = $_POST['pwd2'];
    // hachage du mot de passe
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    // seconde vérification concordance des 2 mots de passe
    if ($mdp != $mdp2) {
        $_SESSION['confModifMDP'] = "Les 2 mots de passe sont différents !";
        // redirection vers  page profil
        header ('location: ../php/profil.php');

    } else {

         // connection à la base de données
         include("logbdd.php"); 

         // requete de modification  des données
         $reqMajMDP = "UPDATE membre SET password_membre = '".$mdpHash."' WHERE id_membre = ".$idMembre;

         // préparation et execution de la requete 
         $reqMajM = $bdd->prepare($reqMajMDP);   
         $reqMajM = $bdd->exec($reqMajMDP); 
    }     

} else {
    $_SESSION['confModifMDP'] = "Une erreur est survenue et votre mot de passe n'a pas été modifié.";
    // redirection vers  page profil
    header ('location: ../php/profil.php');
}