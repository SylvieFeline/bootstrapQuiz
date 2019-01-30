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
            <?php include ("../include/header.php");  ?>
        </header>

        <section class="row justify-content-center">
            <div class="col-10">
                <h1> Création d'un quiz</h1>

                <p> Maintenant, ajouter les questions et leurs choix de réponses  à votre quiz :</p>
                
                <?php echo $_SESSION['titre'] ?>

                <form action="../request/trt_questions.php" method="post">

                    <div class="form-group">
                        <label for="question">Libellé de la question : </label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer">
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