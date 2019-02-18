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
    <title>Accueil</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include("../include/header.php");  ?>
        </header>

        <section class="row">
            <div class="offset-1 col-10">
            <?php echo "Bienvenue ".$_SESSION['prenomMembre']." ".$_SESSION['nomMembre']; ?>
            
           <?php 
           $nbreCat = $_SESSION['nbreCategorie'];
           echo '<input type="hidden" id="nbCat" value="'.$nbreCat.'">';
           // echo "<br> nbre catégorie = ".$nbreCat;
           // var_dump($_SESSION['categorie']);
           for($c=0; $c<$nbreCat; $c++){
               // echo "nbre de quiz/catégorie = ".$_SESSION['nbreQenligne'][$c];
               // echo '<br> id categorie = '.$_SESSION['idCateg'][$c];
               // var_dump($_SESSION['listQuiz'][$c]);
            }
            ?>

           

            <?php
            for($c=0; $c<$nbreCat; $c++){
                echo "<div class='categ' id='categ".$_SESSION['categorie']['idCategorie'][$c]."'> Catégorie : ".$_SESSION['categorie']['nomCategorie'][$c];
                    echo '<button type="button" class="close" id="close'.$_SESSION['categorie']['idCategorie'][$c].'" > <img id="ouv'.$_SESSION['categorie']['idCategorie'][$c].'" src=""  style="width:30px;" ></button>';  
                    echo "<div class='listQ' id='qCat".$_SESSION['categorie']['idCategorie'][$c]."' > ";
                    
                    $nbreQel[$c] = $_SESSION['nbreQenligne'][$c];
                    echo '<input type="hidden" id="nbQ'.$_SESSION['categorie']['idCategorie'][$c].'" value="'.$nbreQel[$c].'">';
                    $listQuiz = $_SESSION['listQuiz'][$c];
                        for ($n=0; $n<$nbreQel[$c]; $n++){
                        echo "<div  id='quiz".$_SESSION['categorie']['idCategorie'][$c].$n."' > Quiz : <span class='font-weight-bold'>".$listQuiz['titre_quiz'][$n]."</span>  proposé par <em>'".$listQuiz['pseudoMemb'][$n]."'</em></div>";
                        echo "<input type='hidden' id='idQ".$_SESSION['categorie']['idCategorie'][$c].$n."' value='".$listQuiz['id_quiz'][$n]."' >";   
                        }
                    echo "</div>";    
                echo "</div>";
            }

           
            ?>

            </div>


        </section>
      

        <footer>
            <?php include("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/accueil.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>