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

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">

                <p>Veuillez vérifier vos saisies avant de transmettre votre quiz à la validation : </p>

                <?php include ("../include/chgQuiz.php"); ?>

                    <input type="hidden" name="page" value="quiz.php">
                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer les modifications">
                </form>
                <?php echo $_SESSION['messageModifQuiz']; ?>
               

                <form action="../request/envoiQuiz.php" method="post">
                    <div class="form-group">
                        <label for="commentaire">Ajouter un  commentaire (facultatif) :</label>
                        <textarea class="form-control" name="commentaire" rows="3"></textarea>
                    </div>
                    <input class="btn btn-block btn-blue btn-lg" type="submit" value="Transmettre pour validation">
                </form>
                <?php echo $_SESSION['messageConfEnvoiQuiz']; ?>

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