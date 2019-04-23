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
    <title>Profil</title>
</head>
<body>

    <div class="container">

        <header>
            <?php include ("../include/header.php");  ?>
        </header>

            <?php include ("../include/menu.php"); ?>

        <section class="row justify-content-center">
            <div class="col-10">
                <div class="row flex-row justify-content-center">
                    <h1>Vos données personnelles :</h1>
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
                                    <p>Les champs sont pré-remplis avec vos données actuelles que vous pouvez corriger si nécessaire.<br>
                                    RAPPEL : Les chiffres et caractères spéciaux ne sont pas autorisés pour les noms et prénoms. </p>
                                    
                                    <p>Si vous voulez changer de mot de passe, celui-ci doit comporter au moins  :
                                    <ul>    
                                        <li>une minuscule </li>
                                        <li>une majuscule</li>
                                        <li>un chiffre</li>
                                        <li>un caractère spécial (# ? ! $ % & * -)</li> 
                                    </ul>
                                    Les deux saisies du mot de passe doivent être identique. <br>  Il sera enregistré crypter.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="../request/modifProfil.php" method="post">

                    <div class="form-group">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?php echo $_SESSION['pseudoMembre']; ?>" required>
                        <span id="feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" class="form-control" onblur="verifNom(this)" value="<?php echo $_SESSION['nomMembre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom : </label>
                        <input type="text" name="prenom" class="form-control" onblur="verifNom(this)" value="<?php echo $_SESSION['prenomMembre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" class="form-control" onblur="verifMail(this)" value="<?php echo $_SESSION['emailMembre']; ?>" required>
                    </div>

                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer mes modifications">
                </form>
                <div class="text-center text-primary">
                    <?php echo $_SESSION['confModifProfil']; ?>
                </div>

                <form action="../request/modifMDP.php" method="post">    
                    <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="pwd" class="form-control" onblur="verifPsw(this)"  value ="" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmation du mot de passe : </label>
                        <input type="password" name="pwd2" class="form-control" onblur="verifPsw2(this)" required>
                    </div>

                    <input class="btn btn-block btn-lg" type="submit" value="Enregistrer mon nouveau mot de passe">
                </form>
                <div class="text-center text-primary">
                    <?php echo $_SESSION['confModifMDP']; ?>
                </div>

                <input class="btn btn-block btn-blue btn-lg" type="button" value="Se désinscrire">
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