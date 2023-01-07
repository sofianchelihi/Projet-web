$(document).ready(function(){
    var liste_ingr = new Array();
    $(".ingr").submit(function(e){ 
        e.preventDefault();
        var ingredient = $(".input_ingr").val();
        liste_ingr.push(ingredient.trim());
        var list_item = $("<li></li>").addClass("list-group-item").text(ingredient);
        $(".ingredients").append(list_item);
        $(".input_ingr").val("")
    });



    $(".send").click(function(e) { 
        var json = Object.assign({}, liste_ingr);
        if(liste_ingr.length>0){
            $.ajax({
                url:"http://localhost/Projet_TDW/public/idee_recette/getRecette",
                type:'POST',
                dataType:'text',
                data:JSON.stringify({
                    json
                }),
                success:(Data)=>{ 
                    $(".recettes").html("");
                    Data = JSON.parse(Data)
                    Data.forEach(element => {
                        var cart="<div class='cart'><img src='"+element['lien_image'] +"' class='cardImg'  alt='Error'><div class='cardBody'><h5>"+ element['titre_recette']+"</h5><p>"+ element['description'].slice(0,100)+"..."+"</p><a href='"+"http://localhost/Projet_TDW/public/recette/affiche_page_recette&id_recette="+ element['id_recette'] +"' class='voirPlus'>Voir plus</a></div></div>"
                        $(".recettes").append(cart)
                    });
                    var cart="<div class='cart'><img src='"+ +"' class='cardImg'  alt='Error'><div class='cardBody'><h5>"+ +"</h5><p>"+ +"</p><a href='"+ +"' class='voirPlus'>Voir plus</a></div></div>"
                              
                },   
            });  
        }    
    });
    
    $(".cancel").click(function(){
        $(".input_ingr").val("")
        $(".ingredients").html("")
        liste_ingr=[];
    });
});
     