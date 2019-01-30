// ------------- vérification du formulaire -----------------------

// changement couleur de fond si saisie incorrect
function surligne(champ, erreur) {
    if(erreur){
       champ.style.backgroundColor = "#fba";
       champ.style.color = "#712727";
     } else {
       champ.style.backgroundColor = "";
       champ.style.color = "";
     }
 }

// vérification si pseudo pas déjà dans base de donnée (avec AJAX
// $(document).ready(function(){
//     $('#pseudo').keyup(function(){
//         var pseudo = $('#pseudo').val();
//         pseudo = $.trim(pseudo);
//         if (pseudo!= ""){
//             $.post('../request/post.php',{pseudo:pseudo},function(data){
//                 $('#feedback').text(data);
//             });
//         } else {
//             $('#feedback').text("veuillez saisir un pseudo");
//         }
//     });
// });
    

// nom ou prénom sans chiffre ou  caractères spéciaux
function verifNom(champ){
    for(var i = 0; i < champ.value.length; i++){
        var lettre = champ.value[i];
        var regex = /^[a-zA-Z ]*$/;
        if(!regex.test(champ.value)){    
            surligne(champ, true);
            return true;
        } else {
            surligne(champ, false);
            return false;  
        }
    }  ;
};
// verification email
function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value)){
     surligne(champ, true);
     return false;
    } else {
     surligne(champ, false);
     return true;
    }
 } ;  


// verification mot de passe
// contient majuscule, minuscule, chiffre, et caractères spéciaux
var psw;
function verifPsw(champ){
    psw = champ.value;
    for(var i = 0; i < champ.value.length; i++){
        var lettre = champ.value[i];
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)/;
        if(!reg.test(champ.value)){    
            surligne(champ, true);
        } else {
            surligne(champ, false);  
        }
    }  ;
    return psw;
};
// les 2 mots de passe sont identiques
function verifPsw2(champ){     
        if(champ.value != psw){  
            champ.value = "";
            champ.placeholder = "mot différent";  
            surligne(champ, true); 
        } else {
            surligne(champ, false);    
        }
};
