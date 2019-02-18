<?php
session_start();

// donnée session : id du quiz à valider
$idQuiz = $_SESSION['idQuizAval'] ;

// id du statut en ligne = 2

//connection à la base de donnée
include("logbdd.php");  

// requete de mise à jour
 $reqMajStatut = "UPDATE quiz SET id_statutQuiz = '2' WHERE id_quiz =".$idQuiz;
 $bdd->prepare($reqMajStatut);
 $bdd->exec($reqMajStatut);

 // message de confirmation
 $_SESSION['messageConfirmModifStatut'] = "le quiz ".$_SESSION['titreQuizAval']   ." a bien été mis dans le statut 'en ligne'. ";

 // redirection
  header ('location: ../php/valQuiz.php');

?>