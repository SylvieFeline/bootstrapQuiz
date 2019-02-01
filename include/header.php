
<div class="row ">

    <div class="col-2 "> </div>

    <div class="col-8" id="logo">
        <img class="img-fluid" src="../img/quiz.png" alt="logo quiz" >
    </div>

    <div class=" col-2 icone" id="connexion">
        <?php if(isset($_SESSION['pseudoMembre'])){
            echo "<a href='../request/deconnection.php'><img class='img-fluid' src='../img/logout.png' alt='icone déconnection'></a>";
            echo '<p class="text-center">'. $_SESSION["pseudoMembre"].' </p>';
        } else { 
            echo '<img class="img-fluid" src="../img/person-icone.png" alt="icone personnage" data-toggle="modal" data-target="#connectModal">';          
        } ?>        
    </div>
    
</div>

<!-- <div class="row col-12">
   <p class="text-center"> <?php  // if(isset($_SESSION['erreurConnect'])){echo $_SESSION['erreurConnect']; } ?> </p>
</div> -->


    <nav class="nav nav-pills flex-row bg-white">
      <a class="nav-link" href="../php/accueil.php">Accueil</a>
      <a class="nav-link" href="../php/inscription.php">Inscription</a>
      <?php  if (isset($_SESSION['pseudoMembre'])) {
        echo '<a class="nav-link" href="../php/creation.php">Créer un quiz</a>'; }?>
      <?php if ((isset($_SESSION['pseudoMembre'])) && ($_SESSION['pseudoMembre'] == "admin")) { 
        echo '<a class="nav-link" href="#">Gestion</a> ';} ?>  
    </nav>


<!-- ---------------------MODAL  CONNECTION ----------------------- -->

<div class="container">
    <div class="modal" id="connectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Connection</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email : </label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="pwd" class="form-control" id="pwd"  required>
                        </div>
                        <input class="btn btn-block btn-lg" type="submit" value="Connexion">
                    </form>
                    <?php   include ("../request/trt_connect.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>