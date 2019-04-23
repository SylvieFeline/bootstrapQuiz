<?php
session_start();

// récupération des données de la session :
$idMembre = $_SESSION['idMembre'];
$prenomMembre = $_SESSION['prenomMembre'];
$nomMembre = $_SESSION['nomMembre'];
$emailMembre = $_SESSION['emailMembre'];
$idQuiz = $_SESSION['idQuiz'];
$titre = $_SESSION['titre'];

// récupération de l'éventuel commentaire
if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])){
    $comment = $_POST['commentaire'];
} else {
    $comment = "aucun commentaire laissé.";
}

// envoi d'un mail pour informer de la création d'un quiz
$to = 'dcl.sylvieg@18pixel.fr';
$object = "soumission d'un quiz pour validation";

$message = $prenomMembre.' '.$nomMembre. ' a apporter des modifications à son quiz n° '.$idQuiz.' "<strong>'.$titre.'</strong>" et le soumet à la validation. <br>';
$message.= 'commentaire(s) du membre '.$idMembre.' : '.$comment;
$message.='<br> Pour contacter le membre : '.$emailMembre;

$headers = 'From:'. " ".$emailMembre."\r\n";
$headers .= 'Repply-To : sylvieg18@orange.fr'."\r\n";
$headers .= 'MIME-Version: 1.0' ."\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
mail($to, $object, $message, $headers);

// message de confirmation d'envoi
$_SESSION['messageConfEnvoiQuizM'] = "Votre quiz a été transmis pour validation. <br>
 Vous serez informer par mail quand celui-ci aura été validé. <br>
 En attendant, vous pouvez suivre son statut sur votre page 'Mes quiz'. <br>
 L'équipe de QUIZ vous remercie pour votre participation.";

// redirection 
header ('location: ../php/quizM.php');

?>