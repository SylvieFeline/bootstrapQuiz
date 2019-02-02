<?php
session_start();

// récupération id du membre
$idMembre = $_SESSION['idMembre'];

// vérification présence données
if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) AND
    (isset($_POST['nom']) && !empty($_POST['nom'])) AND
    (isset($_POST['prenom']) && !empty($_POST['prenom']))AND
    (isset($_POST['email']) && !empty($_POST['email']))) {

        // récupération des données
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);

        // connection à la base de données
        include("logbdd.php"); 

        // vérification si pseudo pas déjà présent dans la base hors mis celui du membre connecté
        $verifPseudo = 'SELECT * FROM membre WHERE id_membre !='.$idMembre.' AND  pseudo_membre = ?';
        $resPseudo = $bdd->prepare($verifPseudo);
        $resPseudo -> execute (array($pseudo));
        $nbre1 = $resPseudo->rowCount();
            if($nbre1 != 0){               
                $_SESSION['confModifProfil'] = "Ce pseudo est déjà utilisé !";;
                // redirection vers  page profil
                header ('location: ../php/profil.php');
                
            } else {
        
        // vérification si email pas déjà présent dans la base hors mis celui du membre connecté
            $verifEmail = 'SELECT * FROM membre WHERE id_membre !='.$idMembre.' AND email_membre = ?';
            $resEmail = $bdd->prepare($verifEmail);
            $resEmail -> execute (array($email));
            $nbre2 = $resEmail->rowCount();
                if($nbre2 != 0){
                    $_SESSION['confModifProfil'] = "Ce mail est déjà utilisé !";
                    // redirection vers  page profil
                    header ('location: ../php/profil.php');
                
                } else {
                    
                    // requete de mise à jour des données
                    $reqMajProfil = "UPDATE membre SET nom_membre = '".$nom."',  prenom_membre = '".$prenom."', pseudo_membre = '".$pseudo."', email_membre = '".$email."' WHERE id_membre = ".$idMembre;

                    // préparation et execution de la requete 
                    $reqMajP = $bdd->prepare($reqMajProfil);   
                    $reqMajP = $bdd->exec($reqMajProfil); 

                    // message de confirmation
                    $_SESSION['confModifProfil'] = "vos données ont bien été modifiées";

                    // changement des données de la session
                    $_SESSION['nomMembre'] = $nom;
                    $_SESSION['prenomMembre'] = $prenom;
                    $_SESSION['pseudoMembre'] = $pseudo;
                    $_SESSION['emailMembre'] = $email;

                    //redirection vers page profil
                     header ('location: ../php/profil.php');
                }
            }

    } else {
        $_SESSION['confModifProfil'] = "Une erreur est survenue et vos données n'ont pas été modifiées.";
        //redirection vers page profil
        header ('location: ../php/profil.php');
    }

?>