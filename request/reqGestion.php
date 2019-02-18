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

// requete pour liste quiz en ligne


  $requete2 = 'SELECT *,DATE_FORMAT(date_modif_quiz, "%d/%m/%Y à %Hh%imin%ss") AS dateModif FROM quiz WHERE id_statutQuiz = 2 ORDER BY date_modif_quiz';
  $req2 = $bdd->query($requete2);
  $n=1;
  while ($data2 = $req2-> fetch()){
      $idQuiz[$n]= $data2['id_quiz'];
      $titreQuiz[$n]= $data2['titre_quiz'];
      $dateModif[$n] = $data2['dateModif'];
      $idCateg[$n] = $data2['id_categorie'];
      $idMemb[$n] = $data2['id_membre'];
      $n++;
  }
  $nbreQel = $n;
  $_SESSION['nbreQenligne'] = $n-1;

// tableaux
  $_SESSION['listQuizEL'] = array();
  $_SESSION['listQuizEL']['id_quiz'] = array();
  $_SESSION['listQuizEL']['titre_quiz'] = array();
  $_SESSION['listQuizEL']['dateModif'] = array();
  $_SESSION['listQuizEL']['idCateg'] = array();
  $_SESSION['listQuizEL']['idMemb'] = array();
  
// insertions des données dans les tableaux
for ($n=1; $n<$nbreQel; $n++){
  array_push($_SESSION['listQuizEL']['id_quiz'],$idQuiz[$n]);
  array_push($_SESSION['listQuizEL']['titre_quiz'],$titreQuiz[$n]);
  array_push($_SESSION['listQuizEL']['dateModif'],$dateModif[$n]);
  array_push($_SESSION['listQuizEL']['idCateg'],$idCateg[$n]);
  array_push($_SESSION['listQuizEL']['idMemb'],$idMemb[$n]);
}
// redirection vers  page gestion
 header ('location: ../php/gestion.php');

?>