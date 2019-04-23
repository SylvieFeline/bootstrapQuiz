

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
                <a class="nav-link " id="accueil" href="../request/reqQuizEnLigne.php" >Quiz</a>
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
                echo '<a class="nav-link" id="gestion" href="../request/reqGestion.php">Gestion</a> '; 
            echo '</li>';
        } ?> 
    </ul>
    <form class="form-inline" action="">
        <input class="form-control w80 mr-sm-2" id="search"  type="text" autocomplete="off" placeholder="Recherche">
        <div id="results"></div>
        <button class="btn-m btn-blue" type="submit"> <img src="../img/system-search-3.png" alt="loupe" style="width:30px;"></button>
    </form>
</div>
</nav>

