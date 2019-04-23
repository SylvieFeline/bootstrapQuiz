<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title> validation Quiz</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">

            <h4>Voici le quiz a valider sélectionné :</h4>

           <?php echo "<h3> '".$_SESSION['titreQuizAval']."' proposé par " .$_SESSION['pseudoMembQuizAval']."</h3>";

            $nbreQ = $_SESSION['nbreQuest'];
            $question = $_SESSION['questions'];

            for ($i=0; $i<$nbreQ; $i++){
                echo "<div class='border-blue'>";
                    echo "<label class='blue'>Question n°".($i+1)." : </label> ".$question['libelle_question'][$i]."<br>";

                $nbreCh = $question['nbre_choix'][$i];
                $idQuest = $question['id_question'][$i];
                $choix = $_SESSION['choix'][$idQuest];

                for ($a=0; $a < $nbreCh; $a++){
                    if($choix['id_boleen'][$a] == 1){
                        $rep = "vrai";
                    } else {
                        $rep = "faux";
                    }

                    echo '<span class="blue">Choix n°'.($a+1).' : </span> '.$choix['libelle_choix'][$a]." (".$rep.")<br>";
                }
                echo '</div> ';
            }
            ?>
            </div>

            <div class="col-10">

                <p><h4>Changer le quiz de catégorie : </h4>
                <em>(par défaut, les quiz sont en catégorie 'culture générale')</em></p>
                
                <form action="../request/modifCat.php" method="post">
                    <select name="choixCategorie"  class="form-control" required>
                    <option checked>Choisir une catégorie</option>
                    <?php  
                    $nbreCat = $_SESSION['nbreCategorie'];
                        for($c=0; $c<$nbreCat ; $c++){
                        echo "<option value=\"".$_SESSION['categorie']['idCategorie'][$c]."\" >".$_SESSION['categorie']['nomCategorie'][$c]." </option>";}  ?> 
                    </select>
                    <input class="btn btn-block btn-lg" type="submit" value="Attribuer le quiz à cette catégorie">
                </form>
                <?php echo $_SESSION['messageConfirmModifCat'];  ?>

                <p>Pas de catégorie appropriée ?</p>

                <form action="../request/reqAjoutCat2.php" method="post">
                    <div class="form-group">
                        <label for="ajoutCategorie">Ajouter une catégorie : </label>
                        <input type="text" name="ajoutCategorie" class="form-control" required>
                    </div>
                    <input class="btn btn-block btn-lg" type="submit" value="Créer cette nouvelle catégorie">
                </form>
                <?php echo $_SESSION['messageAjoutCat'];  ?>

                <h4>Valider le quiz :</h4>

                <form action="../request/reqStatutEnLigne.php" method="post">
                    <input class="btn btn-block btn-lg" type="submit" value="Mettre le quiz au statut 'enligne'">
                </form>
                <?php echo $_SESSION['messageConfirmModifStatut'];  ?>

                <h4>Informer le membre :</h4>

                <form action="../request/messageVal.php" method="post">
                    <select class="form-control" name="messageVal" >
                        <option checked>Choisir un message type</option>
                        <option value="1">Votre quiz a été validé et est maintenant visible en ligne.</option>
                        <option value="2">Votre quiz comporte des erreurs qu'il est nécessaire de corriger.</option>
                        <option value="3">Désolé, mais votre quiz n'est pas accepté.</option>
                    </select>
                    <textarea class="form-control" name="messageVal2" rows="3" >Préciser les corrections à apporter ou justifier le refus</textarea>
                    <input class="btn btn-block btn-lg" type="submit" value="Envoyer le message au membre">
                </form>
                <?php echo $_SESSION['messageConfirmEnvoiMailMemb'];  ?>

            </div>
        </section>

        <footer>
            <?php include ("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>