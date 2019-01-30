<?php
session_start();

// vérification présence données

if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) AND
    (isset($_POST['nom']) && !empty($_POST['nom'])) AND
    (isset($_POST['prenom']) && !empty($_POST['prenom']))AND
    (isset($_POST['email']) && !empty($_POST['email']))AND
    (isset($_POST['pwd']) && !empty($_POST['pwd']))AND
    (isset($_POST['pwd2']) && !empty($_POST['pwd2']))) {

// récupération des données
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = $_POST['pwd'];
    $mdp2 = $_POST['pwd2'];

// connection à la base de données
    include("logbdd.php"); 

// vérification pseudo pas déjà présent dans la base
    // $verifPseudo = 'SELECT count(id_membre) FROM membre WHERE pseudo_membre ="'.$pseudo.'"';
    // $resPseudo = $bdd->query($verifPseudo);
    // $nbre1 = $resPseudo->fetch();
    //     if($nbre1 > 0){
    //         $message = "Ce pseudo est déjà utilisé !";
    //         $_SESSION['inscript'] = $message;
    //         // redirection vers  page inscription
    //         header ('location: ../php/inscription.php');
            
    //     } else {
    
    // vérification email pas déjà présent dans la base
        // $verifEmail = 'SELECT count(id_membre) FROM membre WHERE email_membre ="'.$email.'"';
        // $resEmail = $bdd->query($verifEmail);
        // $nbre2 = $resPseudo->fetch();
        //     if($nbre2 > 0){
        //         $message = "Ce mail est déjà utilisé !";
        //         $_SESSION['inscript'] = $message;
        //         // redirection vers  page inscription
        //         header ('location: ../php/inscription.php');
            
        //     } else {

            // requete insertion des données dans la base de données
            $requete = 'INSERT INTO membre VALUES ("","'.$pseudo.'",
            "'.$prenom.'","'.$nom.'","'.$email.'","'.$mdp.'", NOW(), 2)';

            // préparation et execution de la requete 
            $req = $bdd->prepare($requete);   
            $req = $bdd->exec($requete); 

            // message de confirmation
                $message = "Félicitation, vous êtes désormais membre. <br>";
                $message .= "Vous pouvez maintenant vous connecter pour accéder à toutes les fonctionnalités de l'application.";
                $_SESSION['inscript'] = $message;
                // redirection vers  page inscription
                header ('location: ../php/inscription.php');

            // }
        // }

} else {
    $message = "Enregistrement non effectué. <br>";
    $_SESSION['inscript'] = $message;
     // redirection vers  page inscription
    header ('location: ../php/inscription.php');
}


?>