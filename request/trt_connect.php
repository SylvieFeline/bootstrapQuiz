<?php
session_start();

// vérification présence données

if ((isset($_POST['email']) && !empty($_POST['email'])) AND
    (isset($_POST['pwd']) && !empty($_POST['pwd']))) {

// récupération des données
    $email = $_POST['email'];
    $mdp = $_POST['pwd'];

// connection à la base de données
    include("logbdd.php"); 

// vérification concordance avec base de donnée
    $reqVerif = 'SELECT * FROM membre WHERE email_membre = ? AND password_membre = ?';
  // préparation et execution de la requete 
    $reqV = $bdd->prepare($reqVerif); 
    $reqV -> execute (array($email, $mdp));  
    $userExist = $reqV -> rowCount();   
        if ($userExist === 1){
            $info = $bdd->prepare($reqVerif); 
            $info = $bdd->query($reqVerif); 
            $infoMembre = $reqV->fetch();
            $_SESSION['idMembre'] = $infoMembre['id_membre'];
            $_SESSION['nomMembre'] = $infoMembre['nom_membre'];
            $_SESSION['prenomMembre'] = $infoMembre['prenom_membre'];
            $_SESSION['pseudoMembre'] = $infoMembre['pseudo_membre'];
            // redirection vers  page d'accueil
            header ('location: ../php/accueil.php');
            
        } else {
            $message = "mail et/ou mot de passe incorrects";
        }
}

?>