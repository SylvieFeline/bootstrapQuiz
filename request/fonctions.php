<?php



// fonction pour affichage des quiz à valider  (statut en cours) dans option select par ordre croissant date modif
function quizAVal(){
    include("logbdd.php");
    $requete = $bdd-> query('SELECT *,DATE_FORMAT(date_modif_quiz, "%d/%m/%Y à %Hh%imin%ss") AS dateModif FROM quiz WHERE id_statutQuiz = 1 ORDER BY date_modif_quiz');
    while ($data = $requete -> fetch()){
        echo "<option value=\"".$data['id_quiz']."\" >".$data['titre_quiz']." - ".$data['dateModif']. "</option>";
	}
}

// fonction pour affichage des catégories dans option select par ordre alphabétique
function categories(){
    include("logbdd.php");
    $requete = $bdd-> query('SELECT * FROM categorie ORDER BY nom_categorie');
    while ($data = $requete -> fetch()){
        echo "<option value=\"".$data['id_categorie']."\" >".$data['nom_categorie']. "</option>";
    }
}

// fonction pour affichage des statuts des quiz dans option select
function statutQuiz(){
    include("logbdd.php");
    $requete = $bdd-> query('SELECT * FROM statutQuiz');
    while ($data = $requete -> fetch()){
        echo "<option value=\"".$data['id_statutQuiz']."\" >".$data['nom_statutQuiz']. "</option>";
    }
}


?>