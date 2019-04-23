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
    $_SESSION['titre'] = $titre;

    $reqMajTitre = "UPDATE quiz SET titre_quiz = '".$titre."', date_modif_quiz = NOW() WHERE id_quiz =".$idQuiz;
    $reqMajT = $bdd->prepare($reqMajTitre);   
    $reqMajT = $bdd->exec($reqMajTitre); 
    
    for ($i=0; $i<$nbreQ; $i++){
        if (isset($_POST['question'.$i]) && !empty($_POST['question'.$i])){
            $question[$i] = htmlspecialchars($_POST['question'.$i]);
            $idQuestion[$i] = ($_POST['idQuestion'.$i]);
                //echo $question[$i]."<br>";
            $reqMajQuest[$i] = "UPDATE question SET libelle_question = '".$question[$i]."' WHERE id_question =".$idQuestion[$i];
            $reqMajQ[$i] = $bdd->prepare($reqMajQuest[$i]);   
            $reqMajQ[$i] = $bdd->exec($reqMajQuest[$i]); 
                 
            $nbreCh = $question['nbre_choix'][$i];
            $idQuest = $question['id_question'][$i];
                //echo "id question : ".$idQuest."<br>";

            for ($a=0; $a < $nbreCh; $a++){
                if((isset($_POST['choix'.$idQuest.$a]) && !empty($_POST['choix'.$idQuest.$a])) AND
                    (isset($_POST['boleen'.$idQuest.$a]) && !empty($_POST['boleen'.$idQuest.$a]))){
                    $libChoix[$a]= htmlspecialchars($_POST['choix'.$idQuest.$a]);
                    $idChoix[$a]= ($_POST['idChoix'.$idQuest.$a]);
                    $boleen[$a] = htmlspecialchars($_POST['boleen'.$idQuest.$a]); 
                      // echo $libChoix[$a]." id ".$idChoix[$a]."<br>";
                    $reqMajChoix[$a] = "UPDATE choix SET libelle_choix = '".$libChoix[$a]."' WHERE id_choix =".$idChoix[$a];
                    $reqMajC[$a] = $bdd->prepare($reqMajChoix[$a]);   
                    $reqMajC[$a] = $bdd->exec($reqMajChoix[$a]); 

                }

            }
        }
    }
    $_SESSION['messageModifQuiz'] = "Vos modifications ont été enregistrées.";
} else {
    $_SESSION['messageModifQuiz'] = "Une erreur est survenue et vos modifications n'ont pas été enregistrées.";
}

// redirection vers page quiz.php ou quizM.php
 header ('location: ../php/'.$_POST["page"]);


