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
    <title>Créer un Quiz</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");   ?>
        </header>

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">
                <h1 > Création d'un quiz</h1>

                     
                <h2>Votre quiz : <?php echo $_SESSION['titre'] ?></h2>
               

                <p> Maintenant, ajouter les questions et leurs choix de réponses  à votre quiz, 
                en précisant s'il s'agit de la bonne réponse ou pas :</p>
            

               <?php  include ("../include/ajoutQuestion.php");   ?>
                    
                    <input type="hidden" name="page" value="php/quizM.php">
                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer">
                </form>
                
                    <p> Si vous n'avez plus de questions à ajouter à votre quiz, 
                        vérifiez celui-ci en cliquant sur le bouton ci-dessous :
                    </p>
                    <a class="btn btn-block btn-blue btn-lg" role="button" href="../request/trt_quiz.php">Voir le quiz fini</a>


            </div>
        </section>

        <footer>
            <?php include ("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/questions.js"></script>
</body>
</html>