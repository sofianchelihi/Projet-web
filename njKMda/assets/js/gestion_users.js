$(document).ready(function(){
    $(".sup").click(function (e) { 
        if (confirm("Voulez vous supprimer ce utilisateur ?") != true){
            e.preventDefault();
        }       
    });           
});
     