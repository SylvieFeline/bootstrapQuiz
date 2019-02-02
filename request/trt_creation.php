<?php
session_start();

// vérification présence données

if (isset($_POST['titre']) && !empty($_POST['titre'])) {

// récupération des données
    $titre = htmlspecialchars($_POST['titre']);
    $idMembre = $_SESSION['idMembre'];

// connection à la base de données
    include("logbdd.php"); 

// requete insertion des données dans la base de données
    $requete = 'INSERT INTO quiz VALUES ("","'.$titre.'",NOW(),NOW(),1,1,"'.$idMembre.'")';

// préparation et execution de la requete 
    $req = $bdd->prepare($requete);   
    $req = $bdd->exec($requete); 

// récupération de l'id du quiz
    $idQuiz =  $bdd->lastInsertId();

// stockage des données dans la session
    $_SESSION['idQuiz'] = $idQuiz;
    $_SESSION['titre'] = $titre;

    $_SESSION['messageCreation'] = "Données enregistrées.";

// redirection vers page création questions
    header ('location: ../php/questions.php');

} else {
    $_SESSION['messageCreation'] = "Erreur, aucune donnée enregistrée.";

    // redirection vers page création questions
    header ('location: ../php/questions.php');
}