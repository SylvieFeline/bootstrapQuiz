<?php 
session_start();
     if(isset($_GET['nbre'])) { 
         $nbreChoix = $_GET['nbre'] ;
         $_SESSION['nbreChoix']  = $nbreChoix; 
        for ($x=1; $x<= $nbreChoix; $x++ ){;
        echo '<div class="form-group">';
        echo   '<label for="choix">Libellé du choix '.$x.' : </label>';
        echo   '<input type="text" name="choix'.$x.'" class="form-control" required>';
        echo   '<select class="form-group" name="boleen'.$x.'" id="bol'.$x.'">';
        echo       '<option value="1">vrai</option>';
        echo       '<option value="2">faux</option>';
        echo   '</select>';
        echo '</div> ';
        }
    } 
          
?>