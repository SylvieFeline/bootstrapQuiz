
<div class="row ">

    <div class="col-2 icone" id="menu">
        <img class="img-fluid" src="../img/menu.png" alt="icone menu" >
    </div>

    <div class="col-8" id="logo">
        <img class="img-fluid" src="../img/quiz.png" alt="logo quiz" >
    </div>

    <div class=" col-2 icone" id="connexion">
    <?php if(isset($_SESSION['pseudoMembre'])){
            echo "<a href='../request/deconnection.php'><img class='img-fluid' src='../img/logout.png' alt='icone déconnection'></a>";
            echo '<p class="text-center">'. $_SESSION["pseudoMembre"].' </p>';
        } else { 
        echo '<img class="img-fluid" src="../img/person-icone.png" alt="icone personnage" data-toggle="modal" data-target="#myModal">';
        } ?>
         
    </div>
    
</div>
<div class="row ">

</div>

<div class="container">
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Connection</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="../request/trt_connect.php" method="post">
                        <div class="form-group">
                            <label for="email">Email : </label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="pwd" class="form-control" onblur="verifPsw(this)" required>
                        </div>
                        <input class="btn btn-block btn-lg" type="submit" value="Connexion">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>