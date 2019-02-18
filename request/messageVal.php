<?php
session_start();

// données session sur le membre a contacté  et le quiz
 $pseudoMemb =  $_SESSION['pseudoMembQuizAval'];
 $prenomMemb =  $_SESSION['prenomMembQuizAval'] ;
 $nomMemb =  $_SESSION['nomMembQuizAval'] ;
 $emailMemb =  $_SESSION['emailMembQuizAval'];
 $titreQuiz = $_SESSION['titreQuizAval'];
// vérification présence donnée
if (isset($_POST['messageVal']) && !empty($_POST['messageVal'])){

    // récupération données
    $messageVal = $_POST['messageVal'];
    $messageVal2 = $_POST['messageVal2'];

    if ($messageVal == 1){
        $messageVal = "Votre quiz a été validé et est maintenant visible en ligne.";
    } else if ($messageVal == 2) {
        $messageVal = "Votre quiz comporte des erreurs qu'il est nécessaire de corriger.";
    } else if($messageVal == 3 ){
        $messageVal = "Désolé, mais votre quiz n'est pas accepté.";
    }

    if ($messageVal2 == "Préciser les corrections à apporter ou justifier le refus"){
        $messageVal2 = "";
    }

    // envoi mail d'information au membre
    //$to = $emailMemb;
    $to = 'dcl.sylvieg@18pixel.fr'; // pour les essais
    $object = "Votre quiz soumis à validation";
    
    $message = "l'équique de Quiz vous informe que votre quiz <strong>".$titreQuiz."</strong> a passé l'étape de validation <br>";
    $message.= $messageVal."<br>".$messageVal2."<br>";
    $message.= "l'équipe de Quiz vous remercie pour votre participation.";
    
    $headers = "From: contact@quiz.fr " ."\r\n";
    $headers .= 'Repply-To : dcl.sylvieg@18pixel.fr'."\r\n";
    $headers .= 'MIME-Version: 1.0' ."\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    mail($to, $object, $message, $headers);


    // message de confirmation d'envoi
    $_SESSION['messageConfirmEnvoiMailMemb'] = "Votre message a été transmis au membre auteur";

    // redirection vers  page d'affichage du quiz
    header ('location: ../php/valQuiz.php');
}

?>