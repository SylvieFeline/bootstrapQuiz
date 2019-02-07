<?php //echo $_SERVER['REQUEST_URI']; ?>

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
            echo '<p class="text-center">connection </p>';
        } ?>        
    </div>
    
</div>

<div class="row col-12">
   <p class="text-center"> <?php   if(isset($_SESSION['erreurConnect'])){echo $_SESSION['erreurConnect']; } ?> </p>
</div>


    <nav class="navbar bg-white navbar-expand-md sticky-top">
        <a class="navbar-brand" href="#">
        <img src="../img/quiz_petit.png" alt="logo" style="width:60px;"> </a>
     
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span >
                <img src="../img/icone_menu_bleu.png" alt="icone menu" style="width:40px;" >
            </span>
        </button>

        <div class="collapse navbar-collapse space-bet-md" id="collapsibleNavbar">
            <ul class="navbar-nav nav-pills">
                
                    <li class="nav-item">
                        <a class="nav-link " id="accueil" href="../php/accueil.php" >Accueil</a>
                    </li>
            
                <?php  if (isset($_SESSION['pseudoMembre'])) {
                    echo '<li class="nav-item">';
                        echo '<a class="nav-link" id="prof" href="../php/profil.php">Mon profil</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                        echo '<a class="nav-link" id="creaQ" href="../php/creation.php">Créer un quiz</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                        echo '<a class="nav-link" id="quizM" href="../request/reqQuizMembre.php">Mes quiz</a>'; 
                    echo '</li>';
                }?>
                <?php if ((isset($_SESSION['pseudoMembre'])) && ($_SESSION['statutMembre'] == 1)) { 
                    echo '<li class="nav-item">';
                        echo '<a class="nav-link" id="gestion" href="../php/gestion.php">Gestion</a> '; 
                    echo '</li>';
                } ?> 
            </ul>
            <form class="form-inline" action="">
                <input class="form-control w80 mr-sm-2" type="text" placeholder="Recherche">
                <button class="btn-m btn-blue" type="submit"> <img src="../img/system-search-3.png" alt="loupe" style="width:30px;"></button>
            </form>
        </div>
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

                    Pas encore membre ?
                    <a class="btn btn-block btn-blue btn-lg" role="button" href="../php/inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</div>