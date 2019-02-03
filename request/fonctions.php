<?php

// date au format français
// function dateFr($dateUS){
//     list($annee, $mois, $jour) = split('[-.]',$dateUS);
//     $dateFR=$jour."/".$mois."/".$annee;
//     return $dateFR;
// }

function dateFr($dateUS){
    list($annee, $mois, $jour, $h, $min, $s) = split('[-:.]',$dateUS);
    $dateFR=$jour."/".$mois."/".$annee." à ".$h."h ".$min."min ".$s.'s';
    return $dateFR;
}

?>