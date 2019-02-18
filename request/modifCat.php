<?php 
session_start();

// récupération données session : id du quiz à valider qu'on veut changer de catégorie
$idQuiz = $_SESSION['idQuizAval'] ;

// vérification présence données
if (isset($_POST['choixCategorie']) && !empty($_POST['choixCategorie'])){
    // id de la nouvelle catégorie du quiz   
   $idCateg = $_POST['choixCategorie'];

    // nom de cette catégorie
    $nbreCat = $_SESSION['nbreCategorie'];
    for($c=0; $c<$nbreCat ; $c++){
        if($idCateg == $_SESSION['categorie']['idCategorie'][$c]){
            $titreCateg = $_SESSION['categorie']['nomCategorie'][$c];
        }
    }
   //connection à la base de donnée
    include("logbdd.php");  

   // requete de mise à jour
    $reqMajCat = "UPDATE quiz SET id_categorie = '".$idCateg."' WHERE id_quiz =".$idQuiz;
    $bdd->prepare($reqMajCat);
    $bdd->exec($reqMajCat);

    // message de confirmation
    $_SESSION['messageConfirmModifCat'] = "le quiz ".$_SESSION['titreQuizAval']." a bien été mis dans la catégorie ".$titreCateg;

    // redirection
    header ('location: ../php/valQuiz.php');

}

?>