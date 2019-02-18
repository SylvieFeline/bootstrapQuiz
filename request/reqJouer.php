<?php
session_start();

// récupération de l'id du quiz sélectionné
$idQuiz = $_GET['idquiz'];
// echo $idQuiz; 

//connection à la base de donnée
include("logbdd.php");

// requete titre du quiz
$req1 = 'SELECT * FROM quiz WHERE id_quiz ='.$idQuiz;
$res1 = $bdd->query($req1);
$data1 = $res1->fetch();

$_SESSION['titreQuiz'] = $data1['titre_quiz'];
$idMemb = $data1['id_membre'];

// requete pseudo du créateur du quiz
$req2 = 'SELECT * FROM membre WHERE id_membre ='.$idMemb;
$res2 = $bdd->query($req2);
$data2 = $res2->fetch();

$_SESSION['pseudoCreateur'] = $data2['pseudo_membre'];

// requete questions du quiz
include('requestQuiz.php');

// redirection
header ('location: ../php/jouer.php');

?>