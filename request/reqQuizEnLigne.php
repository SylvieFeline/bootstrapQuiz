<?php
session_start();

//connection à la base de donnée
include("logbdd.php");

// requete pour liste quiz en ligne en fct categories
include('requestQuizEnLigne.php');

// redirection
header ('location: ../php/accueil.php');

?>