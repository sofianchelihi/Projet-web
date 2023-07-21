$(document).ready(function(){
    $(".sup").click(function (e) { 
        if (confirm("Voulez vous supprimer cet recette ?") != true){
            e.preventDefault();
        }       
    }); 
    
    

    function filre(input_class,defult_value,classN){
        var input_value = $("."+input_class).val();
        if(input_value!=defult_value){    
            $("."+classN).filter(function(){
                if($(this).text().indexOf(input_value)<0) return $(this);
            }).parent().parent().removeClass("d-flex").hide();
        }
    }
    
    
    $(".filtres").submit(function(e){
        e.preventDefault();
        $(".list-group-item").addClass("d-flex").show();
        filre("saison_filre",'Saison',"saisons")
        filre("temp_prepa_filtr",'',"temp_preparation")
        filre("temp_cuis_filtr",'',"temp_cuis")
        filre("temp_total_filtr",'',"temp_total")
        filre("notation_filtr",'',"notation")
        filre("calories_filtr",'',"nb_calories")
    });

    
    function tri(class_N,ordre){
        var recettes=[];
        var elements = $("."+class_N);
        elements.each(function( index ){
            var object={parametre:0, html:null};
            object.parametre=Number($(this).text());
            var display = $( this ).parent().parent().css("display")
            var classes= $(this).parent().parent().attr("class")
            var html = $("<li></li>").addClass("cart").css("display",display).attr("class",classes).append($( this ).parent().parent().html());
            object.html=html;
            recettes.push(object);
        });

        recettes.sort(function(a,b){
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
        return recettes
    }

    
    $(".tries").submit(function(e){
        e.preventDefault();
        var ordre = $(".ordre_tri").val()
        if(ordre =='Par ordre') ordre = "croissant"
        var cards=[];
        switch($(".type_tri").val()){
            case "temp_prepa":
                cards = tri("temp_preparation",ordre)
                break;
            case "temp_cuis":
                cards = tri("temp_cuis",ordre)
                break;
            case "temp_total":
                cards = tri("temp_total",ordre)
                break;
            case "calories":
                cards = tri("nb_calories",ordre)
                break;

            case "notation":
                cards = tri("notation",ordre)
                break;
            default:
                break;
        }


        if(cards.length!=0){
            $(".list-group").html("");
            cards.forEach(element => {
                $(".list-group").append(element.html)
            })
            $(".sup").click(function (e) { 
                if (confirm("Voulez vous supprimer cet recette ?") != true){
                    e.preventDefault();
                }       
            });
        }
    });
});