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

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">

                    <?php
                    echo "<div> Voici les réponses au quiz <h1 class='font'>".$_SESSION['titreQuiz']."</h1> proposé par <em class='white'>' ".$_SESSION['pseudoCreateur']."'</em></div>" ; 
                    $nbreQ = $_SESSION['nbreQuest'];
                    $question = $_SESSION['questions'];

                    for ($i=0; $i<$nbreQ; $i++){
                        echo "<div class='border-blue pad-b'>";
                            echo '<div class="blue">';
                                echo " ".($i+1)." - ";
                                echo " ".$question['libelle_question'][$i]."<br>";
                            echo "</div>";

                            $nbreCh = $question['nbre_choix'][$i];
                            $idQuest = $question['id_question'][$i];
                            $choix = $_SESSION['choix'][$idQuest];
                            echo '<ul>';
                                for ($a=0; $a < $nbreCh; $a++){ 
                                    if (($choix['id_boleen'][$a] == 1) && ($choix['id_choix'][$a] == $_SESSION['reponse'][$i])){
                                        echo '<li class="form-check-label bRep" ><span class="ch">'.$choix['libelle_choix'][$a]."</span></li>"; 
                                    } else if ($choix['id_boleen'][$a] == 1){
                                        echo '<li class="form-check-label bRep" >'.$choix['libelle_choix'][$a]."</li>";                          
                                    } else if ($choix['id_choix'][$a] == $_SESSION['reponse'][$i] ) {
                                        echo '<li class="form-check-label mRep" ><span class="ch">'.$choix['libelle_choix'][$a]."</span></li>"; 
                                    } else {
                                        echo '<li class="form-check-label" >'.$choix['libelle_choix'][$a]."</li>";   
                                    }
                                }
                            echo "</ul>";
                        echo "</div>" ;   

                    }
            echo '</div>';
            echo '<div class="col-md-10 text-center"';
                    echo "<div class='blue'> ";
                        echo '<h3 class="font2">Nombre de bonne(s) réponse(s) = '.$_SESSION['nbreBonneRep'].'/'.$nbreQ.'</h3>';
                    echo "</div>";
                    ?>
                <div class="offset-md-8">
                   <a class='white' href="../request/reqQuizEnLigne.php"><button class=' btn btn-blue float-right'>  Faire un autre quiz </button></a>
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