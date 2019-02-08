<?php session_start(); 

 $nbreQ = $_SESSION['nbreQval'];
    
?>

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

                    <h1>Gestion des quiz</h1>

                    <form action="../request/valQuiz.php" method="post">
                        <div class="form-group">
                            <label for="quiz ">Liste des quiz à valider : </label>
                            <select class="form-group custom-select" name="quizVal" required >
                                <option checked>Choisir un quiz à valider</option>
                                <?php  
                                for($q=0; $q<$nbreQ ; $q++){
                                echo "<option value=\"".$_SESSION['valQuiz']['id_quiz'][$q]."\" >".$_SESSION['valQuiz']['titre_quiz'][$q]." du ".$_SESSION['valQuiz']['dateModif'][$q]. "</option>";}  ?>   
                            </select>
                        </div>
                        <input class="btn btn-block btn-lg" type="submit" value="Voir le quiz sélectionné">
                    </form>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="ajoutCategorie">Ajouter une catégorie : </label>
                            <input type="text" name="ajoutCategorie" class="form-control" required>
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