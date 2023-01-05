$(document).ready(function(){
    
    function filre(input_class,defult_value,classN){
        var input_value = $("."+input_class).val();
        if(input_value!=defult_value){    
            $("."+classN).filter(function(){
                if($(this).text().indexOf(input_value)<0) return $(this);
            }).parent().parent().hide();
        }
    }
    
    
    $(".filtres").submit(function(e){
        e.preventDefault();
        $(".cart").show();
        filre("saison_filre",'Saison',"saisons")
        filre("temp_prepa_filtr",'',"temp_preparation")
        filre("temp_cuis_filtr",'',"temp_cuis")
        filre("temp_total_filtr",'',"temp_total")
        filre("notation_filtr",'',"notation")
        filre("calories_filtr",'',"nb_calories")
    });

    
    function tri(class_N,ordre){
        var recettes=[];
        var elements = $("."+class_N+" p:nth-child(2)");
        elements.each(function( index ){
            var object={parametre:0, html:null};
            object.parametre=Number($(this).text());
            var display = $( this ).parent().parent().parent().css("display")
            var html = $("<div></div>").addClass("cart").css("display",display).append($( this ).parent().parent().parent().html());
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
            $(".recettes").html("");
            cards.forEach(element => {
                $(".recettes").append(element.html)
            })
        }
    });
               
});
     