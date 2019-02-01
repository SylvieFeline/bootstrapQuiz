<?php
session_start();

// récupération des données de la session :
$idMembre = $_SESSION['idMembre'];
$idQuiz = $_SESSION['idQuiz'];
$nbreQ = $_SESSION['nbreQuest'];
$question = $_SESSION['questions'];

//connection à la base de donnée
include("logbdd.php");

// vérification présence données , récupération  et requetes de mises à jour
if (isset($_POST['titre']) && !empty($_POST['titre'])){
    $titre = htmlspecialchars($_POST['titre']);

    $reqMajTitre = 'UPDATE quiz SET titre_quiz = "'.$titre.'" WHERE id_quiz = '.$idQuiz;
    $reqMaj = $bdd->prepare($reqMajTitre);   
    $reqMaj = $bdd->exec($reqMajTitre); 
    
    for ($i=0; $i<$nbreQ; $i++){
        if (isset($_POST['question'.$i]) && !empty($_POST['question'.$i])){
            $question[$i] = htmlspecialchars($_POST['question'.$i]);

            $reqMajQuest[$i] = 'UPDATE question SET libelle_question = "'.$question[$i].'" WHERE id_question =';

            $nbreCh = $question['nbre_choix'][$i];
            $idQuest = $question['id_question'][$i];
            $choix = $_SESSION['choix'][$idQuest];

            for ($a=0; $a < $nbreCh; $a++){
                if((isset($_POST['choix'.$a]) && !empty($_POST['choix'.$a])) AND
                    (isset($_POST['boleen'.$a]) && !empty($_POST['boleen'.$a]))){
                     $choix[$a]= htmlspecialchars($_POST['choix'.$i]);
                     $boleen[$a] = htmlspecialchars($_POST['boleen'.$a]);                        

                }

            }
        }
    }
}




