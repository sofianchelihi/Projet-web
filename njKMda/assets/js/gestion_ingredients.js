$(document).ready(function(){
    $(".sup").click(function (e) { 
        if (confirm("Voulez vous supprimer ce ingredients ?") != true){
            e.preventDefault();
        }       
    }); 
    
    
    function filre(input_class,defult_value,classN){
        var input_value = $("."+input_class).val();
        if(input_value!=defult_value){ 
            console.log()  
            $("."+classN).filter(function(){
                if($(this).text().indexOf(input_value)<0) return $(this);
            }).parent().parent().removeClass("d-flex").hide();
        }
    }
    
    
    $(".filtres").submit(function(e){
        e.preventDefault();
        $(".list-group-item").addClass("d-flex").show();
        filre("nom_filtre",'',"nom_ingr")
        filre("calorie_filtre",'',"calorie")
        filre("healthy_filtre",'Type',"nom_ingr")
    });


    function tri(class_N,ordre){
        var ingredients=[];
        var elements = $("."+class_N);
        elements.each(function( index ){
            var object={parametre:0, html:null};
            object.parametre=Number($(this).text().replace("cal. pour cent g",""));
            var display = $(this).parent().parent().css("display")
            var classes= $(this).parent().parent().attr("class")
            var html = $("<li></li>").addClass("cart").css("display",display).attr("class",classes).append($( this ).parent().parent().html());
            object.html=html;
            ingredients.push(object);
        });

        ingredients.sort(function(a,b){
            if(a.parametre > b.parametre) {
                if(ordre=="croissant") return 1;
                else return -1;
            }
            if(a.parametre < b.parametre){
                if(ordre=="croissant") return -1;
                else return 1;
            }
            return 0;
        });
        return ingredients
    }

    
    $(".tries").submit(function(e){
        e.preventDefault();
        var ordre = $(".ordre").val()
        if(ordre =='Par ordre') ordre = "croissant"
        var cards=[];
        var ordre_by = $(".tri").val()
        if(ordre_by=="calorie"){
            cards = tri("calorie",ordre)
            if(cards.length!=0){
                $(".list-group").html("");
                cards.forEach(element => {
                    $(".list-group").append(element.html)
                })
                $(".sup").click(function (e) { 
                    if (confirm("Voulez vous supprimer ce ingredients ?") != true){
                        e.preventDefault();
                    }       
                }); 
            }
        }
    
    });
});
     