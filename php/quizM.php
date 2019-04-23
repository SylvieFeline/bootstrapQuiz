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

                <p>Vous pouvez apporter des modifications à votre quiz  et y <a href="#ajoutQuest">ajouter des questions</a> </p>

                <?php include ("../include/chgQuiz.php"); ?>

                    <input type="hidden" name="page" value="quizM.php">
                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer les modifications">
                </form>
                <div class="col-10 brep"> 
                    <?php echo $_SESSION['messageModifQuiz']; ?>
                </div>
            </div>
            <div id="ajoutQuest" class="col-10">

                <p> Ajouter des questions :</p>
              
                <?php  include ("../include/ajoutQuestion.php");   ?>
                    <input type="hidden" name="page" value="request/trt_quizM2.php">
                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer">
                </form>
                <div class="col-10 mrep"> 
                    <?php echo $_SESSION['messageModifStatut'] ?>
                </div>

            </div>
            <div class="col-10">
                <form action="../request/envoiQuizM.php" method="post">
                    <div class="form-group">
                        <label for="commentaire">Ajouter un  commentaire (facultatif) :</label>
                        <textarea class="form-control" name="commentaire" rows="3"></textarea>
                    </div>
                    <input class="btn btn-block btn-blue btn-lg" type="submit" value="Transmettre pour validation">
                </form>
                <div class="col-10 brep"> 
                    <?php echo $_SESSION['messageConfEnvoiQuizM']; ?>
                </div>
            </div>
        </section>

        <footer>
            <?php include ("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/questions.js"></script>$idQuiz
</body>
</html>