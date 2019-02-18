// ------------ div modales des catégories ---------------

// récupération du nbre de catégorie
var nbreCat = document.getElementById('nbCat').value;

var categ = [];
var qCat = [];
var close = [];
var ouv = [];

var i = 1;
for (i=1; i<=nbreCat; i++){
    categ[i] = document.getElementById('categ'+i);
    qCat[i] = document.getElementById('qCat'+i);
    close[i] = document.getElementById('close'+i);
    ouv[i] = document.getElementById('ouv'+i);

    // fonction au clic sur icone oeil d'une catégorie : apparition/disparition liste de quiz
    var j=i;    
    (function(j){
        categ[i].addEventListener("click", function(){  
           if (qCat[j].style.display == 'none'){
               qCat[j].style.display = 'block';
               ouv[j].src = "../img/cancel.png";
           } else {
               qCat[j].style.display = 'none';
               ouv[j].src = "";
           }
        },false);
    })(i);

    // -------------------- SELECTION QUIZ ------------------------------

    // récupération du nbre de quiz / catégorie
    var nbreQuiz = document.getElementById('nbQ'+i).value;
   
    var quiz = [];
    var idQ = [];

    for (n=0; n<nbreQuiz; n++){
        quiz[n] = document.getElementById('quiz'+i+n);
        idQ[n] = document.getElementById('idQ'+i+n);
        console.log(quiz[n]);

        // fonction au clic sur div quiz : récupération de l'id du quiz
        var j=i;
        var m=n;
        var idQuiz;
        
            (function(j,m){
                quiz[n].addEventListener("click", function(){  
                    idQuiz =  document.getElementById('idQ'+j+m).value;
                    // envoi de l'id du quiz dans l'url
                    document.location.href="../request/reqJouer.php?idquiz="+idQuiz;
                },false);
            })(i,n);
        


    }

}