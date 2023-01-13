$(document).ready(function(){
    
    function getSeason(month) {
        if (3 <= month &&  month<= 5){
            return 'printemps';
        }
    
        if (6 <= month && month <= 8){
            return 'été';
        }
    
        if (9 <= month && month <= 11){
            return 'automne';
        }
        return 'hiver';
    }


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
                    Data = JSON.parse(Data);
                    if(Data.length!=0){
                        Data.forEach(element =>{
                            let saisons='';
                            element['saisons'].forEach(saison=>{
                                saisons += saison + " - "
                            })
                            var saison_div = "<div class='saisons info'><span>Les saisons : </span><p>"+ saisons +"</p></div>"                    
                            var cart="<div class='cart'><img src='"+element['lien_image'] +"' class='cardImg'  alt='Error'><div class='cardBody'><h5>"+ element['titre_recette']+"</h5><p>"+ element['description'].slice(0,100)+"..."+"</p><a target='_blank' href='"+"http://localhost/Projet_TDW/public/recette/affiche_page_recette&id_recette="+ element['id_recette'] +"' class='voirPlus'>Voir plus</a><div class='diffic info'><span>Difficulté de la recette :</span><p>"+element['diff_recette'] +"</p><b> sur dix</b></div><div class='temp_preparation info'><span>Temp de préparation :</span><p>"+ element["temp_prepa"]+"</p> <b>min</b></div><div class='temp_repo info'><span>Temp de repos :</span><p>"+element["temp_repo"]+"</p><b>min</b></div><div class='temp_cuis info'><span>Temp de cuisson :</span><p>"+element['temp_cuis']+"</p><b>min</b></div><div class='temp_total info'><span>Temp total :</span><p>"+(Number(element['temp_prepa']) + Number(element['temp_cuis'])) +"</p><b>min</b></div><div class='notation info'><span>Notation :</span><p>"+element['note']+"</p><b>sur dix</b></div><div class='nb_calories info'><span>Nombre de calories :</span><p>"+element['calorie']+"</p><b>cal. pour 100 g</b></div>"+saison_div+"</div></div>"
                            $(".recettes").append(cart)
                        });  
                        var recettes=[];
                        var elements = $(".saisons p:nth-child(2)");
                        elements.each(function( index ){
                            var object={saisons:'',note:0 , html:null};
                            object.saisons=$(this).text();
                            var note = Number($(this).parent().parent().find(".notation p").text())
                            var html = $("<div></div>").addClass("cart").append($( this ).parent().parent().parent().html());
                            object.html=html;
                            object.note=note;
                            recettes.push(object);
                        });
                        var date = new Date();
                        var month = date.getMonth();
                        var saison = getSeason(month);
                            recettes.sort(function(a,b){
                            if(a.saisons.indexOf(saison)>=0 && b.saisons.indexOf(saison)<0) return -1
                            else if(b.saisons.indexOf(saison)>=0 && a.saisons.indexOf(saison)<0) return 1
                            else {
                                if(a.note>b.note) return -1
                                else if(a.note<b.note) return 1
                                return 0 
                            }
                        });
                        if(recettes.length!=0){
                            $(".filtres").animate({display: 'flex'});
                            $(".tries").animate({display: 'flex'});
                            $(".recettes").html("");
                            recettes.forEach(element => {
                                $(".recettes").append(element.html)
                            })
                        }
                    }
                }   
            });  
        }    
    });
    
    $(".cancel").click(function(){
        $(".input_ingr").val("")
        $(".ingredients").html("")
        liste_ingr=[];
    });

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

     