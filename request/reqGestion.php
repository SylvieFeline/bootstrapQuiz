<?php
session_start();

//connection à la base de donnée
include("logbdd.php");

// requete pour liste quiz à valider
$requete = 'SELECT *,DATE_FORMAT(date_modif_quiz, "%d/%m/%Y à %Hh%imin%ss") AS dateModif FROM quiz WHERE id_statutQuiz = 1 ORDER BY date_modif_quiz';
$req = $bdd->query($requete);
$q=1;
while ($data = $req -> fetch()){
  $idQuiz[$q]= $data['id_quiz'];
  $titreQuiz[$q]= $data['titre_quiz'];
  $dateModif[$q] = $data['dateModif'];
  // echo $idQuiz[$q]."<br>";
  // echo $titreQuiz[$q]."<br>";
  // echo $dateModif[$q]."<br>";
  $q++;
}
$nbreQ = $q;
$_SESSION['nbreQval'] = $nbreQ -1;

// tableaux
$_SESSION['valQuiz'] = array();
$_SESSION['valQuiz']['id_quiz'] = array();
$_SESSION['valQuiz']['titre_quiz'] = array();
$_SESSION['valQuiz']['dateModif'] = array();

// insertion
for ($q=1; $q<$nbreQ; $q++){
    array_push($_SESSION['valQuiz']['id_quiz'],$idQuiz[$q]);
    array_push($_SESSION['valQuiz']['titre_quiz'],$titreQuiz[$q]);
    array_push($_SESSION['valQuiz']['dateModif'],$dateModif[$q]);
}
// var_dump($_SESSION['valQuiz']);

// redirection vers  page gestion
 header ('location: ../php/gestion.php');

?>