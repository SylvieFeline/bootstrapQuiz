<?php
session_start();

// récupération id du membre connecté
$idMembre = $_SESSION['idMembre'];

// connection à la base de données
include("logbdd.php"); 

// requete de sélection des quiz attribués au membre connecté
// $requete = 'SELECT * FROM quiz WHERE id_membre = '.$idMembre;
$requete = 'SELECT *, DATE_FORMAT(date_crea_quiz, "%d/%m/%Y à %Hh %imin %ss") AS dateCrea, DATE_FORMAT(date_modif_quiz, "%d/%m/%Y à %Hh %imin %ss") AS dateModif FROM quiz WHERE id_membre = '.$idMembre;

//execution de la requete 
$req = $bdd->query($requete);  

//récupération des données
$i=0;
while($resQuiz = $req->fetch()){
    $idQuiz[$i] = $resQuiz['id_quiz'];
    $titreQuiz[$i] = $resQuiz['titre_quiz'];
    $dateCreaQuiz[$i] = $resQuiz['dateCrea'];
    $dateModifQuiz[$i] = $resQuiz['dateModif'];
    $idCategorie[$i] = $resQuiz['id_categorie'];
    $idStatutQuiz[$i] = $resQuiz['id_statutQuiz'];
    $i++;
}

// nbre de quiz attribués au membre connecté
$nbreQuiz = $i;
$_SESSION['nbreQuiz'] = $nbreQuiz;
//echo "nbre de quiz = ".$nbreQuiz."<br>";

// requetes pour connaitre le nombre de question/quiz
for($i=0; $i<$nbreQuiz; $i++){
    $q[$i] = "SELECT id_question FROM question WHERE id_quiz =".$idQuiz[$i];
    $quest[$i] = $bdd->prepare ($q[$i]);
    $quest[$i]->execute(array($idQuiz[$i]));
    $nbreQuest[$i] = $quest[$i]->rowCount();
     echo "nbre de questions du quiz ".$idQuiz[$i]." = ". $nbreQuest[$i]."<br>";
}
// ajout des requetes categories et statuts des Quiz
include ("reqCategorie.php");
include ("reqStatutQuiz.php");

for($i=0; $i<$nbreQuiz; $i++){
    for($c=0; $c<$nbreCat; $c++){
        if($idCategorie[$i] == $idCateg[$c]){
            $nomCategorie[$i] = $nomCateg[$c];
        }
    }
}  

for($i=0; $i<$nbreQuiz; $i++){
    for($st=0; $st<$nbreStatut; $st++){
        if($idStatutQuiz[$i] == $idStaQuiz[$st]){
            $nomStatutQuiz[$i] = $nomStaQuiz[$st];
        }
    }
}  

//création de tableaux pour mémorisation des données (= panier)
$_SESSION['quiz'] = array();
$_SESSION['quiz']['idQuiz'] = array();
$_SESSION['quiz']['titreQuiz'] = array();
$_SESSION['quiz']['dateCrea'] = array();
$_SESSION['quiz']['dateModif'] = array();
$_SESSION['quiz']['idCategorie'] = array();
$_SESSION['quiz']['nomCategorie'] = array();
$_SESSION['quiz']['idStatut'] = array();
$_SESSION['quiz']['nomStatut'] = array();
$_SESSION['quiz']['nbreQuest'] = array();

// insertion des données dans les tableaux
for($i=0; $i<$nbreQuiz; $i++){
    array_push($_SESSION['quiz']['idQuiz'],$idQuiz[$i]);
    array_push($_SESSION['quiz']['titreQuiz'],$titreQuiz[$i]);
    array_push($_SESSION['quiz']['dateCrea'],$dateCreaQuiz[$i]);
    array_push($_SESSION['quiz']['dateModif'],$dateModifQuiz[$i]);
    array_push($_SESSION['quiz']['idCategorie'],$idCategorie[$i]);
    array_push($_SESSION['quiz']['nomCategorie'],$nomCategorie[$i]);
    array_push($_SESSION['quiz']['idStatut'],$idStatutQuiz[$i]);
    array_push($_SESSION['quiz']['nomStatut'],$nomStatutQuiz[$i]);
    array_push($_SESSION['quiz']['nbreQuest'],$nbreQuest[$i]);
}
var_dump($_SESSION['quiz']);



// redirection vers page affichage des quiz
   header ('location: ../php/quizMembre.php');

