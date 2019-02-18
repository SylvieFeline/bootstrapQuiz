<?php
//session_start();

// connection à la base de données
//include("logbdd.php"); 

// requete de sélection des catégories de quiz
$requeteCat = 'SELECT * FROM categorie';
$reqCat = $bdd->query($requeteCat);

//récupération des données
$c=0;
while($resCat = $reqCat->fetch()){
    $idCateg[$c] = $resCat['id_categorie'];
    $nomCateg[$c] = $resCat['nom_categorie'];
    $c++;
}
// nbre de catégorie
$nbreCat = $c;
$_SESSION['nbreCategorie'] = $nbreCat;

// creation tableau pour mémorisation des données
$_SESSION['categorie'] = array();
$_SESSION['categorie']['idCategorie'] = array();
$_SESSION['categorie']['nomCategorie'] = array();

/// insertion des données dans les tableaux
for($c=0; $c<$nbreCat; $c++){
    array_push($_SESSION['categorie']['idCategorie'],$idCateg[$c]);
    array_push($_SESSION['categorie']['nomCategorie'],$nomCateg[$c]);
}
var_dump($_SESSION['categorie']);

?>