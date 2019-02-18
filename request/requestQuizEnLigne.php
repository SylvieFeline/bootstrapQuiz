<?php
// session_start();

//connection à la base de donnée
// include("logbdd.php");

// requete pour les différentes catégories
include('reqCategorie.php');

// requete pour liste quiz en ligne en fonction catégories
for($c=0; $c<$nbreCat; $c++){
    $idCateg[$c] = $c+1;
    $_SESSION['idCateg'][$c] = $idCateg[$c] ;
    $requete2[$c] = 'SELECT *,DATE_FORMAT(date_modif_quiz, "%d/%m/%Y à %Hh%imin%ss") AS dateModif FROM quiz WHERE id_categorie ='.$idCateg[$c].' AND id_statutQuiz = 2 ORDER BY date_modif_quiz';
    $req2[$c] = $bdd->query($requete2[$c]);
    $n=1;
    while ($data2[$c] = $req2[$c] -> fetch()){
        $idQuiz[$c][$n]= $data2[$c]['id_quiz'];
        $titreQuiz[$c][$n]= $data2[$c]['titre_quiz'];
        $dateModif[$c][$n] = $data2[$c]['dateModif'];
        $idCateg[$c][$n] = $data2[$c]['id_categorie'];
        $idMemb[$c][$n] = $data2[$c]['id_membre'];
        $n++;
    }
    $nbreQel[$c] = $n;
    $_SESSION['nbreQenligne'][$c] = $n-1;
}
// tableaux
for($c=0; $c<$nbreCat; $c++){
    $_SESSION['listQuiz'][$c] = array();
    $_SESSION['listQuiz'][$c]['id_quiz'] = array();
    $_SESSION['listQuiz'][$c]['titre_quiz'] = array();
    $_SESSION['listQuiz'][$c]['dateModif'] = array();
    $_SESSION['listQuiz'][$c]['idCateg'] = array();
    $_SESSION['listQuiz'][$c]['idMemb'] = array();
    $_SESSION['listQuiz'][$c]['pseudoMemb'] = array();

    // requete pour pseudo du membre  et  insertions des données dans les tableaux
    for ($n=1; $n<$nbreQel[$c]; $n++){
        $reqPseudo[$n] = 'SELECT pseudo_membre FROM membre WHERE id_membre ='.$idMemb[$c][$n];
        $resPseudo[$n] = $bdd->query($reqPseudo[$n]);
        $pseudo[$n] = $resPseudo[$n] -> fetch();
        $pseudoMemb[$n] = $pseudo[$n]['pseudo_membre'];

        array_push($_SESSION['listQuiz'][$c]['id_quiz'],$idQuiz[$c][$n]);
        array_push($_SESSION['listQuiz'][$c]['titre_quiz'],$titreQuiz[$c][$n]);
        array_push($_SESSION['listQuiz'][$c]['dateModif'],$dateModif[$c][$n]);
        array_push($_SESSION['listQuiz'][$c]['idCateg'],$idCateg[$c][$n]);
        array_push($_SESSION['listQuiz'][$c]['idMemb'],$idMemb[$c][$n]);
        array_push($_SESSION['listQuiz'][$c]['pseudoMemb'],$pseudoMemb[$n]);
    }
}
for($c=0; $c<$nbreCat; $c++){
 var_dump($_SESSION['listQuiz'][$c]);
}

?>