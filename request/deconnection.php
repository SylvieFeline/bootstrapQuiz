<?php
session_start();
session_unset();
session_destroy();
header ('location: ../php/accueil.php');
exit();
?>