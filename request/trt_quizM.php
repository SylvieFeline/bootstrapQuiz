<?php 
session_start();

// récupération donnée
$idQuiz = $_POST['idQ'];

//connection à la base de donnée
include("logbdd.php");

// requete titre du quiz  
$reqQuiz = 'SELECT * FROM quiz WHERE id_quiz ='.$idQuiz;
$resQuiz = $bdd->query($reqQuiz);
$dataQuiz = $resQuiz->fetch();

// récupération des données
$_SESSION['titre'] = $dataQuiz['titre_quiz'];
$_SESSION['idQuiz'] = $idQuiz;

// requetes des donnees du quiz (questions et choix associés)
include ('requestQuiz.php');


// redirection vers  page d'affichage du quiz
 header ('location: ../php/quizM.php');

?>