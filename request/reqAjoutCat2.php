<?php

// ajout de la catégorie dans la base de donnée
include ('reqAjoutCat.php');

// actualisation du tableau $_SESSION['categorie']
include ('reqCategorie.php');

// redirection vers page de validation des quiz
header ('location: ../php/valQuiz.php');

?>