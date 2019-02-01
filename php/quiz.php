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
    <title>Quiz</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

        <section class="row justify-content-center">
            <div class="col-10">

                <p>Veuillez vérifier vos saisies avant de le transmettre à la validation : </p>

                <form action="../request/modifQuiz.php" method="post">

                    <div class="row justify-content-center align-items-center form-group">Récapitulatif de votre quiz :
                        <input type="text" name ="titre" value ="<?php echo $_SESSION['titre']; ?>" >
                        
                    </div>

                    <?php 
                        $nbreQ = $_SESSION['nbreQuest'];
                        $question = $_SESSION['questions'];

                        for ($i=0; $i<$nbreQ; $i++){
                            echo "<div class='border-blue'>";
                                echo '<div class="form-group">';
                                    echo "<label class='white' for='question'> Question n°".($i+1)." : </label>";
                                    echo "<input type=\"text\" name=\"question".$i."\" class=\"form-control\" value=\"".$question['libelle_question'][$i]."\">";
                                    echo "<input type=\"hidden\" name=\"idQuestion".$i."\"  value=\"".$question['id_question'][$i]."\">";
                                echo "</div>";

                                $nbreCh = $question['nbre_choix'][$i];
                                $idQuest = $question['id_question'][$i];
                                $choix = $_SESSION['choix'][$idQuest];

                                for ($a=0; $a < $nbreCh; $a++){
                                    if($choix['id_boleen'][$a] == 1){
                                        $rep = "vrai";
                                        $autre = 2;
                                        $repAutre = "faux";
                                    }else {
                                        $rep = "faux";
                                        $autre = 1;
                                        $repAutre = "vrai";

                                    }
                                    // echo "Choix n°".($a+1)." : ".$choix['libelle_choix'][$a]." <em> (".$rep.")</em><br>";
                                
                                    echo '<div >';
                                        echo '<label for="choix">Choix n°'.($a+1).' : </label>';
                                        echo "<input type=\"text\" name=\"choix".$idQuest.$a."\" class=\"form-control\" value=\"".$choix['libelle_choix'][$a]."\">";
                                        echo "<input type=\"hidden\" name=\"idChoix".$idQuest.$a."\" value=\"".$choix['id_choix'][$a]."\">";
                                        echo "<select class=\"form-group\" name=\"boleen".$idQuest.$a."\" >";
                                        echo    '<option value="'.$choix['id_boleen'][$a].'">'.$rep.'</option>';
                                        echo    '<option value="'.$autre.'">'.$repAutre.'</option>';
                                        echo '</select>';
                                    echo '</div> ';   
                                }
                            echo "</div>" ;   
                        } 
                    ?>

                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer les modifications">
                </form>
                        <?php echo $_SESSION['messageModifQuiz']; ?>

                <form action="../request/envoiQuiz.php" method="post">
                    <div class="form-group">
                        <label for="commentaire">Ajouter un  commentaire :</label>
                        <textarea class="form-control" name="commentaire" rows="3"></textarea>
                    </div>
                    <input class="btn btn-block btn-blue btn-lg" type="sumit" value="Transmettre pour validation">
                </form>
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