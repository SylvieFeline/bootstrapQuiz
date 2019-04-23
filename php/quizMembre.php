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
    <title> Mes Quiz</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">
                <h1>Mes Quiz</h1>

                <?php  
                    $nbreQuiz = $_SESSION['nbreQuiz'];

                    if ($nbreQuiz > 0){
                        $quiz = $_SESSION['quiz'];

                        for($i=0; $i<$nbreQuiz; $i++){
                            echo "<div class='border-blue '>";
                                echo "<div class='row form-group marg '><div class='col-md-4 '>Quiz : </div><div class=' col-md-8 text-center white'>".$quiz['titreQuiz'][$i]."</div></div>";
                                echo "<div class='row form-group marg bg-bl'><div class='col-md-4 '>Créé le : </div><div class='col-md-8 text-center black'>".$quiz['dateCrea'][$i]."</div></div>";
                                echo "<div class='row form-group marg bg-bl'><div class='col-md-4 '>Dernière modification du : </div><div class='col-md-8 text-center black'>".$quiz['dateModif'][$i]."</div></div>";
                                echo "<div class='row form-group marg bg-bl'><div class='col-md-4 '>Contient : </div><div class='col-md-8 text-center black'>".$quiz['nbreQuest'][$i]." questions.</div></div>";
                                echo "<div class='row form-group marg bg-bl'><div class='col-md-4 '>Classé dans la catégorie : </div><div class='col-md-8 text-center black'>".$quiz['nomCategorie'][$i]."</div></div>";
                                echo "<div class='row form-group marg bg-bl'><div class='col-md-4 '>Statut actuel du quiz : </div><div class='col-md-8 text-center black'>".$quiz['nomStatut'][$i]."</div></div>";
                                echo "<form action='../request/trt_quizM.php' method='post'>";
                                echo "<input type=\"hidden\" name='idQ' value=\"".$quiz['idQuiz'][$i]."\" >";
                                echo "<input class='btn btn-block btn-blue btn-lg' type='submit'  value='Voir le quiz'>";
                                echo "</form>";
                            echo "</div>";

                        }

                    } else {
                        echo "Vous n'avez encore créé aucun quiz.";
                    }
                ?>

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