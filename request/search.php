<?php 

    // auto-completion à partie table BDD

    // connection à la base de donnée
        include("logbdd.php");

    // requete

    $term = $_GET['term'];

$requete = $bdd->prepare('SELECT titre_quiz FROM quiz WHERE titre_quiz LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));

$array = array(); // on créé le tableau

while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
    array_push($array, $donnee['titre_quiz']); // et on ajoute celles-ci à notre tableau
}



// auto-complétion à partir d'un fichier txt :

//    $data = unserialize(file_get_contents('towns.txt')); // Récupération de la liste complète des villes
//    $dataLen = count($data);    

//    sort($data); // On trie les données dans l'ordre alphabétique

//    $results = array(); // Le tableau où seront stockés les résultats de la recherche

    // La boucle ci-dessous parcourt tout le tableau $data, jusqu'à un maximum de 10 résultats

//    for ($i = 0 ; $i < $dataLen && count($results) < 10 ; $i++) {
//        if (stripos($data[$i], $_GET['s']) === 0) { // Si la valeur commence par les mêmes caractères que la recherche
//           array_push($results, $data[$i]); // On ajoute alors le résultat à la liste à retourner
//       }
//    }

//    echo implode('|', $results); // Et on affiche les résultats séparés par une barre verticale |

    ?>