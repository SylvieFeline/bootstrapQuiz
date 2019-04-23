<?php //echo $_SERVER['REQUEST_URI']; ?>

<div class="row ">

    <div class="col-2 icone "> 
    <?php if(isset($_SESSION['pseudoMembre'])){
         echo '<img class="img-fluid " src="../img/person-icone.png" alt="icone personnage" style="width:150px" >';
         echo '<p class="text-center ">'. $_SESSION["pseudoMembre"].' </p>';
    }?>
    </div>

    <div class="col-8 pad" id="logo">
        <img class="img-fluid" src="../img/quiz.png" alt="logo quiz" >
    </div>

    <div class=" col-2 icone" id="connexion">
        <?php if(isset($_SESSION['pseudoMembre'])){
            echo "<a href='../request/deconnection.php'><img class='img-fluid' src='../img/logout.png' alt='icone déconnection' style='width:150px'></a>";
            echo '<p class="d-none d-md-block text-center">déconnection </p>';
        } else { 
            echo '<img class="img-fluid marg-md" src="../img/login.png" alt="icone connection" data-toggle="modal" data-target="#connectModal">';          
            echo '<p class="d-none d-md-block text-center">connection </p>';
        } ?>        
    </div>
    
</div>


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