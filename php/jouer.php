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
            <?php include("../include/header.php");  ?>
        </header>

        <section class="row justify-content-center">
            <div class="col-10">

            <?php echo "<div> Voici le quiz <h1 class='font'>".$_SESSION['titreQuiz']."</h1> proposé par <em class='white'>'".$_SESSION['pseudoCreateur']."'</em></div>" ; ?>

                <form action ="../request/compare.php" method="post">

                    <?php
                    $nbreQ = $_SESSION['nbreQuest'];
                    $question = $_SESSION['questions'];

                    for ($i=0; $i<$nbreQ; $i++){
                        echo "<div class='border-blue pad-b'>";
                            echo '<div class="blue">';
                                echo " ".($i+1)." - ";
                                echo " ".$question['libelle_question'][$i]."<br>";
                                echo "<input type=\"hidden\" name=\"idQuestion".$i."\"  value=\"".$question['id_question'][$i]."\">";
                            echo "</div>";

                            $nbreCh = $question['nbre_choix'][$i];
                            $idQuest = $question['id_question'][$i];
                            $choix = $_SESSION['choix'][$idQuest];

                            for ($a=0; $a < $nbreCh; $a++){
                                echo '<div class="offset-1 form-check">';
                                    echo '<label class="form-check-label" for="radio1">';
                                    echo "<input type=\"radio\" name=\"choix".$i."\" class=\"form-check-input\" value=\"".$choix['id_choix'][$a]."\" required>";
                                    echo $choix['libelle_choix'][$a]."</label>";
                                echo "</div>";
                          
                            }
                        echo "</div>" ;   

                    }

                    ?>
                    <input class="btn btn-block btn-lg" type="submit" value="Soumettre">
                </form>

            </div> 
        </section>

        <footer>
            <?php include("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>