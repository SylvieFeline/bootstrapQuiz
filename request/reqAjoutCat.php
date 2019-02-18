<?php

// vérification présence donnée
if (isset($_POST['ajoutCategorie']) && !empty($_POST['ajoutCategorie'])){

    // récupération donnée
    $categorie = htmlspecialchars($_POST['ajoutCategorie']);

    // connection à la base de données
    include("logbdd.php"); 

    // vérification si catégorie pas déjà existante
    $verifCat = 'SELECT * FROM categorie WHERE nom_categorie LIKE ?';
    $resCat = $bdd->prepare($verifCat);
    $resCat -> execute (array($categorie));
    $nb = $resCat ->rowCount();
        if (nb >0){
            $_SESSION['messageAjoutCat'] = "cette catégorie existe déjà";
            // redirection
            header ('location: ../php/gestion.php');
        } else {

         // requete d'insertion de la nouvelle catégorie
         $reqAjout = 'INSERT INTO categorie VALUES ("","'.$categorie.'")';
         $req = $bdd->prepare($reqAjout);   
         $req = $bdd->exec($reqAjout); 

        // message de confirmation
        $_SESSION['messageAjoutCat'] = "la catégorie " .$categorie." a bien été rajoutée.";

        
        }
    }

?>