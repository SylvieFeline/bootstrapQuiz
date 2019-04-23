<?php
session_start();

// vérification présence données

if (isset($_POST['question']) && !empty($_POST['question'])) {

// récupération des données
    $question = htmlspecialchars($_POST['question']);

    $nbreChoix = $_SESSION['nbreChoix'];
    for ($i=1; $i<=$nbreChoix; $i++){
        $choix[$i] = $_POST['choix'.$i];
        $idBoleen[$i] = $_POST['boleen'.$i];
    }

    $idMembre = $_SESSION['idMembre'];
    $titre = $_SESSION['titre'];
    $idQuiz = $_SESSION['idQuiz'];

// connection à la base de données
    include("logbdd.php"); 

// requete de changement date modif du quiz
    $reqModif = "UPDATE quiz SET date_modif_quiz = NOW() WHERE id_quiz =".$idQuiz;
    $reqM = $bdd->prepare($reqModif);   
    $reqM = $bdd->exec($reqModif);

// requete insertion du libellé de la question dans la base de données
    $requete0 = 'INSERT INTO question VALUES ("","'.$question.'","'.$idQuiz.'")';

// préparation et execution de la requete 
    $req0 = $bdd->prepare($requete0);   
    $req0 = $bdd->exec($requete0); 

// récupération de l'id de la question
    $idQuestion =  $bdd->lastInsertId();

// requêtes d'insertion des choix 
    for ($i=1; $i <= $nbreChoix; $i++){
        $requete[$i] = 'INSERT INTO choix VALUES ("","'.$choix[$i].'","'.$idQuestion.'","'.$idBoleen[$i].'")';

        // préparation et execution des requêtes 
        $req[$i] = $bdd->prepare($requete[$i]); 
        $req[$i] = $bdd->exec($requete[$i]); 
    }

    // echo "nbre choix = ".$_SESSION['nbreChoix']."<br>";
    // echo "id quiz = ".$_SESSION['idQuiz']."<br>";
    // echo "id question = ".$idQuestion."<br>";

    // for ($i=1; $i <= $nbreChoix; $i++){
    //     echo "choix = ".$choix[$i]."<br>";
    //     echo "boléen = ".$idBoleen[$i]."<br>";
    // }

// redirection vers page création questions ou quizM.php
  header ('location: ../'.$_POST['page']);


}