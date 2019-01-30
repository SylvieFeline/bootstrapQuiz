// openClassroom - un site web dynamique avec jquery - un formulaire avec Ajax

$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();
        $.post(
            '../request/trt_connect.php', // Un script PHP que l'on va créer juste après
            {
                // récupération des valeurs des input que l'on fait passer à trt_connect.php
                email : $("#email").val(),  
                pwd : $("#pwd").val()
            },
            function(data){
                if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")
                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }      
            },
            'text'
         );
    });
});