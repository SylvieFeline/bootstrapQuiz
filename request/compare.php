<?php
session_start();

// récupération données session
$nbreQ = $_SESSION['nbreQuest'];
$question = $_SESSION['questions'];

// compteur de bonnes réponses
$bonneRep = 0;

for ($i=0; $i<$nbreQ; $i++){
    // vérification présence données
    if (isset($_POST['choix'.$i]) && !empty($_POST['choix'.$i])){

        // récupération des données
        $idQuestion[$i] = $_POST['idQuestion'.$i];
        $choixRep[$i] = $_POST['choix'.$i];       
        $choix[$i] = $_SESSION['choix'][$idQuestion[$i]];
        $nbreCh[$i] = $question['nbre_choix'][$i];

        // mémorisation des choix
        $_SESSION['reponse'][$i] = $_POST['choix'.$i];

        // comparaison avec données session
        for ($a=0; $a < $nbreCh[$i]; $a++){
            if (($choixRep[$i] == $choix[$i]['id_choix'][$a]) &&
                 ($choix[$i]['id_boleen'][$a] == 1)){
                    $bonneRep ++;
            }
        }            
    }
}
$_SESSION['nbreBonneRep'] = $bonneRep;

// redirection
header ('location: ../php/resultat.php');

?>