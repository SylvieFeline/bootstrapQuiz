<?php 
session_start();

// récupération donnée
$idQuiz = $_SESSION['idQuiz'];

//connection à la base de donnée
include("logbdd.php");

// requete modif statut du quiz (-> en cours) suite modif
$reqMajStatut = "UPDATE quiz SET id_statutQuiz = '1' WHERE id_quiz =".$idQuiz;
$bdd->prepare($reqMajStatut);
$bdd->exec($reqMajStatut);

// message d'information
$_SESSION['messageModifStatut'] = "Suite à votre modification, votre quiz ".$_SESSION['titre']   ." n'a plus le statut 'en ligne'. <br>
Afin d'en informer l'équipe de Quiz, n'oubliez pas de transmettre votre quiz à la validation en cliquant sur le bouton ci-dessous.";


// requetes des donnees du quiz (questions et choix associés)
include ('requestQuiz.php');


// redirection vers  page d'affichage du quiz
 header ('location: ../php/quizM.php');

?>