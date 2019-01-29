<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inscription</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

        <section class="row justify-content-center ">
            <div class="col-10">

                <h1>Inscription</h1>

                <form action="" method="post">

                    <div class="form-group">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom : </label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="pwd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmation du mot de passe : </label>
                        <input type="password" name="pwd2" class="form-control" required>
                    </div>
                    <input class="btn btn-block btn-lg" type="submit" value="s'inscrire">

                </form>

                <?php include("../request/trt_inscript.php") ?>

            </div>
        </section>

        <footer>
            <?php include ("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>