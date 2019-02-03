<?php
session_start();
// $mdpAdmin = 'admin18_QUIZ';
// vérification présence données

if ((isset($_POST['email']) && !empty($_POST['email'])) AND
    (isset($_POST['pwd']) && !empty($_POST['pwd']))) {

// récupération des données
    $email = $_POST['email'];
    $mdp = $_POST['pwd'];

// connection à la base de données
    include("logbdd.php"); 

// vérification concordance avec base de donnée
    $reqVerif = 'SELECT * FROM membre WHERE email_membre = ?';
  
    // préparation et execution de la requete 
    $reqV = $bdd->prepare($reqVerif);   
    $reqV -> execute (array($email)); 
    $userExist = $reqV -> rowCount();  
     
        if ($userExist === 1){
            $info = $bdd->prepare($reqVerif); 
            $info = $bdd->query($reqVerif); 
            $infoMembre = $reqV->fetch();
            
            // vérification mot de passe valide
            $mdpHash = $infoMembre['password_membre'];
            if (password_verify($mdp,$mdpHash)) {
            
                // si ok, on souvegarde les données du membre dans la session
                $_SESSION['idMembre'] = $infoMembre['id_membre'];
                $_SESSION['nomMembre'] = $infoMembre['nom_membre'];
                $_SESSION['prenomMembre'] = $infoMembre['prenom_membre'];
                $_SESSION['pseudoMembre'] = $infoMembre['pseudo_membre'];
                $_SESSION['emailMembre'] = $infoMembre['email_membre'];
                $_SESSION['statutMembre'] = $infoMembre['id_statutMembre'];
            
                // redirection vers  page d'accueil
                header ('location: ../php/accueil.php');
            
        } else {
            echo "connection impossible, mail et/ou mot de passe incorrects";
        }   
    }
}

?>