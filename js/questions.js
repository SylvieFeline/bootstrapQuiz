//  envoi du nombre de choix sélectionné avec AJAX :

var afficheChoix = document.getElementById('afficheChoix');
var nbreChoix = document.getElementById("nbreChoix");

nbreChoix.addEventListener("change", function(){
    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function(){
        if (Request.readyState === 4){
            afficheChoix.innerHTML = Request.responseText;
        }
    };

    Request.open('GET', '../php/choix.php?nbre='+ nbreChoix.value + '', true);

    Request.send();

});