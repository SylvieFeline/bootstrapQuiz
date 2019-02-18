// barre de navigation
var accueil = document.getElementById('accueil');
var profil = document.getElementById('prof');
var creaQ = document.getElementById('creaQ');
var quizM = document.getElementById('quizM');
var gestion = document.getElementById('gestion');

var pageEnCours = document.location.href;
console.log(pageEnCours);

var urlAccueil1 = "http://localhost/sites/bootstrapQuiz/php/accueil.php";
var urlAccueil2 = "http://localhost/sites/bootstrapQuiz/php/jouer.php";
var urlAccueil3 = "http://localhost/sites/bootstrapQuiz/php/resultat.php";
var urlProfil1 = "http://localhost/sites/bootstrapQuiz/php/profil.php";
var urlCreaQ1 = "http://localhost/sites/bootstrapQuiz/php/creation.php";
var urlCreaQ2 = "http://localhost/sites/bootstrapQuiz/php/questions.php";
var urlCreaQ3 = "http://localhost/sites/bootstrapQuiz/php/quiz.php";
var urlQuizM1 = "http://localhost/sites/bootstrapQuiz/php/quizMembre.php";
var urlGestion1 = "http://localhost/sites/bootstrapQuiz/php/gestion.php";
var urlGestion2 = "http://localhost/sites/bootstrapQuiz/php/valQuiz.php";

if ((pageEnCours == urlAccueil1) || (pageEnCours == urlAccueil2) ||(pageEnCours == urlAccueil3)) {
    accueil.classList.add ("active");
}
if (pageEnCours == urlProfil1){
    profil.classList.add ("active");
}
if ((pageEnCours == urlCreaQ1) || (pageEnCours == urlCreaQ2) || (pageEnCours == urlCreaQ3)){
    creaQ.classList.add ("active");
}
if (pageEnCours == urlQuizM1){
    quizM.classList.add ("active");
}
if ((pageEnCours == urlGestion1) || (pageEnCours == urlGestion2)) {
    gestion.classList.add ("active");
}
