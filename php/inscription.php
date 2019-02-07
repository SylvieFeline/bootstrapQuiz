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
    <title>Inscription</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

        <section class="row justify-content-center ">
            <div class="col-10">
                <div class="row flex-row justify-content-center">
                    <h1>Inscription</h1>
                    <img data-toggle='modal' data-target= '#infoModal' src="../img/bubble_interrogation.png" alt="renseignement complémentaire" style="width: 30px; height: 30px;">
                </div>

                <div class="container">
                    <div class="modal" id="infoModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Consignes :</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>Les chiffres et caractères spéciaux ne sont pas autorisés pour les noms et prénoms. </li>
                                        <li>Votre mot de passe doit comporter au moins une minuscule, une majuscule, un chiffre et un caractère spécial (# ? ! $ % & * -).</li>
                                        <li>Les deux saisies du mot de passe doivent être identique (il sera enregistré crypter)</li>
                                        <li>Tous les champs doivent être complétés pour pouvoir valider votre inscription.</li>
                                        <li>Vous devez accepter l'enregistrement de vos données. Pour plus d'information a ce sujet, vous pouvez consulter les mentions légales (en bas de page).</li>
                                        <li>Vous aurez la possibilité de modifier vos données sur la page 'mon profil' à tout moment.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="../request/trt_inscript.php" method="post" >

                    <div class="form-group">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" class="form-control" id="pseudo"  required>
                        <span id="feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" class="form-control" onblur="verifNom(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom : </label>
                        <input type="text" name="prenom" class="form-control" onblur="verifNom(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" class="form-control" onblur="verifMail(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="pwd" class="form-control" onblur="verifPsw(this)" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmation du mot de passe : </label>
                        <input type="password" name="pwd2" class="form-control" onblur="verifPsw2(this)" required>
                    </div>

                    <div class="form-check" >
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="accord" value="ok" required> 
                            J'accepte l'enregistrement de mes données.
                        </label>
                    </div>  

                    <input class="btn btn-block btn-lg" type="submit" value="Je m'inscris">

                </form>
                <div class="text-center text-primary">
                    <?php echo $_SESSION['inscript']; ?>
                </div>
            </div>
        </section>

        <footer>
            <?php include ("../include/footer.php");  ?>
        </footer>

    </div>

    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/inscript.js"></script>
</body>
</html>