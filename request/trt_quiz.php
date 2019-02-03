<?php
session_start();

// récupération des données de la session :
$idMembre = $_SESSION['idMembre'];
$idQuiz = $_SESSION['idQuiz'];

//connection à la base de donnée
include("logbdd.php");

// requete pour connaitre le nombre de questions contenu dans le quiz :
$quest1 = 'SELECT * FROM question WHERE id_quiz = ?';
$resQuest = $bdd->prepare($quest1);
$resQuest -> execute (array($idQuiz));
$nbreQuest = $resQuest->rowCount();

// mémorisation du nbre de question
$_SESSION['nbreQuest'] = $nbreQuest;
// var_dump($nbreQuest);

// récupération du libellé des questions et de leur id
$quest2 = 'SELECT * FROM question WHERE id_quiz ='.$idQuiz;
$resQuestions = $bdd->query($quest2);
$i=1;
while ($question = $resQuestions->fetch()){
    $id[$i]= $question['id_question'] ;
    $libelle[$i]= $question['libelle_question'];
    // echo "id question = ".$id[$i]."<br>";
    // echo "libelle question = ".$libelle[$i]."<br>";
    $i++;
}

// requete pour choix des différentes questions
for ($i=1; $i <= $nbreQuest; $i++){
    $reqChoix[$i] = 'SELECT * FROM choix WHERE id_question ='.$id[$i];
    $req[$i] = $bdd->query($reqChoix[$i]);   
    $a=1;
    while($choix = $req[$i]->fetch()){
        $idChoix[$i][$a]= $choix['id_choix'];
        $libChoix[$i][$a]= $choix['libelle_choix'];
        $idBol[$i][$a]= $choix['id_boleen']; 
        // echo "id choix = ".$idChoix[$i][$a]."<br>";
        // echo "libelle choix = ".$libChoix[$i][$a]."<br>";
        // echo "boleen = ".$idBol[$i][$a]."<br>";
        $a++;
    }
}   

// récupération du nombre de choix selon questions
for ($i=1; $i <= $nbreQuest; $i++){
    $ch[$i] = 'SELECT * FROM choix WHERE id_question = ?';
    $resCh[$i] = $bdd->prepare($ch[$i]);
    $resCh[$i]->execute (array($id[$i]));
    $nbreCh[$i] = $resCh[$i]->rowCount();
    // echo "nbre choix = ".$nbreCh[$i]."<br>";
}


//création de tableaux pour mémorisation des données (= panier)
$_SESSION['questions'] = array();
$_SESSION['questions']['id_question']= array();
$_SESSION['questions']['libelle_question']= array();
$_SESSION['questions']['nbre_choix']= array();

// insertion des données dans les tableaux
for ($i=1; $i <= $nbreQuest; $i++){
    array_push($_SESSION['questions']['id_question'],$id[$i]);
    array_push($_SESSION['questions']['libelle_question'],$libelle[$i]);
    array_push($_SESSION['questions']['nbre_choix'],$nbreCh[$i]);

    $_SESSION['choix'][$id[$i]]['id_choix'] = array();
    $_SESSION['choix'][$id[$i]]['libelle_choix'] = array();
    $_SESSION['choix'][$id[$i]]['id_boleen'] = array();

    for ($a=1; $a <= $nbreCh[$i];$a++){
        array_push($_SESSION['choix'][$id[$i]]['id_choix'],$idChoix[$i][$a]);
        array_push($_SESSION['choix'][$id[$i]]['libelle_choix'],$libChoix[$i][$a]);
        array_push($_SESSION['choix'][$id[$i]]['id_boleen'],$idBol[$i][$a]); 
    }
    // var_dump($_SESSION['choix'][$id[$i]]);
   
}
// var_dump($_SESSION['questions']);
// var_dump($_SESSION['choix']);

// redirection vers  page d'affichage du quiz
 header ('location: ../php/quiz.php');

?>