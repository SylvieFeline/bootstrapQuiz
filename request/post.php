<?php

// connection à la base de données
include("logbdd.php"); 


if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    $peudo = mysql_real_escape_string(htmlentities($_POST['pseudo']));
    // requete sql
    $query = $connect->query("SELECT * FROM membre WHERE pseudo_membre='$peudo'");
    $rows = $query->rowCount();
    if ($rows == 1){
        echo "Ce pseudo n'est pas disponible";
    } else {
        echo "Disponible";
    }
}

?>