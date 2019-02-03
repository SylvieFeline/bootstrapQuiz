<?php
session_start();

// connection à la base de données
include("logbdd.php"); 

// requete de sélection des catégories de quiz
$requeteStatut = 'SELECT * FROM statutQuiz';
$reqStatut = $bdd->query($requeteStatut);

//récupération des données
$st=0;
while($resStatut = $reqStatut->fetch()){
    $idStaQuiz[$st] = $resStatut['id_statutQuiz'];
    $nomStaQuiz[$st] = $resStatut['nom_statutQuiz'];
    $st++;
}
// nbre de catégorie
$nbreStatut = $st;
$_SESSION['nbreStatutQuiz'] = $nbreStatut;

// creation tableau pour mémorisation des données
$_SESSION['statutQuiz'] = array();
$_SESSION['statutQuiz']['idStatutQuiz'] = array();
$_SESSION['statutQuiz']['nomStatutQuiz'] = array();

/// insertion des données dans les tableaux
for($st=0; $st<$nbreStatut; $st++){
    array_push($_SESSION['statutQuiz']['idStatutQuiz'],$stdStaQuiz[$st]);
    array_push($_SESSION['statutQuiz']['nomStatutQuiz'],$nomStaQuiz[$st]);
}
var_dump($_SESSION['statutQuiz']);

?>