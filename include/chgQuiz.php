

<form action="../request/modifQuiz.php" method="post">

<div class="row justify-content-center align-items-center form-group">Votre quiz : &nbsp
    <input type="text" name ="titre" class="col-6" value ="<?php echo $_SESSION['titre']; ?>" >
    
</div>

<?php 
    $nbreQ = $_SESSION['nbreQuest'];
    $question = $_SESSION['questions'];

    for ($i=0; $i<$nbreQ; $i++){
        echo "<div class='border-blue'>";
            echo '<div class="form-group">';
                echo "<label class='white' for='question'> Question n°".($i+1)." : </label>";
                echo "<input type=\"text\" name=\"question".$i."\" class=\"form-control\" value=\"".$question['libelle_question'][$i]."\">";
                echo "<input type=\"hidden\" name=\"idQuestion".$i."\"  value=\"".$question['id_question'][$i]."\">";
            echo "</div>";

            $nbreCh = $question['nbre_choix'][$i];
            $idQuest = $question['id_question'][$i];
            $choix = $_SESSION['choix'][$idQuest];

            for ($a=0; $a < $nbreCh; $a++){
                if($choix['id_boleen'][$a] == 1){
                    $rep = "vrai";
                    $autre = 2;
                    $repAutre = "faux";
                }else {
                    $rep = "faux";
                    $autre = 1;
                    $repAutre = "vrai";

                }
                // echo "Choix n°".($a+1)." : ".$choix['libelle_choix'][$a]." <em> (".$rep.")</em><br>";
            
                echo '<div >';
                    echo '<label for="choix">Choix n°'.($a+1).' : </label>';
                    echo "<input type=\"text\" name=\"choix".$idQuest.$a."\" class=\"form-control\" value=\"".$choix['libelle_choix'][$a]."\">";
                    echo "<input type=\"hidden\" name=\"idChoix".$idQuest.$a."\" value=\"".$choix['id_choix'][$a]."\">";
                    echo "<select class=\"form-group\" name=\"boleen".$idQuest.$a."\" >";
                    echo    '<option value="'.$choix['id_boleen'][$a].'">'.$rep.'</option>';
                    echo    '<option value="'.$autre.'">'.$repAutre.'</option>';
                    echo '</select>';
                echo '</div> ';   
            }
        echo "</div>" ;   
    } 
?>

