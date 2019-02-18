<?php
session_start();

// vérification présence donnée
if (isset($_POST['quizVal']) && !empty($_POST['quizVal'])){

    // récupération donnée
    $idQuiz = $_POST['quizVal'];
    $_SESSION['idQuizAval'] = $idQuiz;
    //connection à la base de donnée
    include("logbdd.php");

    // requete données du quiz (titre, id du membre) 
    // (par défaut, à ce stade, id catégorie = 1  et id statut quiz = 1)
    $reqQuiz = 'SELECT * FROM quiz WHERE id_quiz ='.$idQuiz;
    $resQuiz = $bdd->query($reqQuiz);
    $dataQuiz = $resQuiz->fetch();

    // récupération des données
    $_SESSION['titreQuizAval'] = $dataQuiz['titre_quiz'];
    $idMemb = $dataQuiz['id_membre'];
    $_SESSION['idMembreQuizAval'] = $dataQuiz['id_membre'];
    
    // requetes questions et choix associés  du quiz
   include('requestQuiz.php');
    
    var_dump($_SESSION['titreQuizAval']);
    var_dump($_SESSION['idMembreQuizAval']);

    // requete pour les différentes catégories
    include('reqCategorie.php');

    // requete pour info du membre
    $reqMemb = 'SELECT * FROM membre WHERE id_membre ='.$idMemb;
    $resMemb = $bdd->query($reqMemb);
    $dataMemb = $resMemb-> fetch();

    // récupération des données
    $_SESSION['pseudoMembQuizAval'] = $dataMemb['pseudo_membre'];
    $_SESSION['prenomMembQuizAval'] = $dataMemb['prenom_membre'];
    $_SESSION['nomMembQuizAval'] = $dataMemb['nom_membre'];
    $_SESSION['emailMembQuizAval'] = $dataMemb['email_membre'];

    var_dump($_SESSION['pseudoMembQuizAval']);
    var_dump($_SESSION['prenomMembQuizAval']);
    var_dump($_SESSION['nomMembQuizAval']);
    var_dump($_SESSION['emailMembQuizAval']);

   // redirection vers  page d'affichage du quiz
   header ('location: ../php/valQuiz.php');

} else {

    $_SESSION['erreurQuiz'] = "Erreur, aucun quiz sélectionné.";
    // redirection vers  page gestion
    header ('location: ../php/gestion.php');
}



?>