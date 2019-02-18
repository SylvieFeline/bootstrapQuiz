<?php
session_start();

// récupération des données de la session :
$idMembre = $_SESSION['idMembre'];
$idQuiz = $_SESSION['idQuiz'];

//connection à la base de donnée
include("logbdd.php");

// requetes des donnees du quiz (questions et choix associés)
include ('requestQuiz.php');

// redirection vers  page d'affichage du quiz
 header ('location: ../php/quiz.php');

?>