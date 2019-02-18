<?php
session_start();


// vérification présence donnée
if (isset($_POST['listQuiz']) && !empty($_POST['listQuiz'])){

    // récupération donnée
    $idQuiz = $_POST['listQuiz'];

    // titre du quiz
    $nbreQel = $_SESSION['nbreQenligne'];
    for($n=0; $n<$nbreQel ; $n++){
        if($idQuiz == $_SESSION['listQuiz']['id_quiz'][$n]){ 
            $titreQuiz = $_SESSION['listQuiz']['titre_quiz'][$n];
        }
    }
    //connection à la base de donnée
    include("logbdd.php");

    // requete de modif statut du quiz (3 = archivé)
    $reqMajSatut = "UPDATE quiz SET id_statutQuiz = 3 WHERE id_quiz =".$idQuiz;
    $bdd->prepare($reqMajStatut);
    $bdd->exec($reqMajStatut);

    // message de confirmation
    $_SESSION['messageConfirmArchiveQuiz'] = "le quiz ".$titreQuiz." a bien été archivé. ";

    // redirection
    header ('location: ../php/gestion.php');

}

?>