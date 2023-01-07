<?php

function afficher_description($description,$total,$lenght){
    if($total){
        return $description;
    }else{
        return substr($description,0,$lenght)."...";
    }
}

function AddRecetteInfo($recettes,$notations,$saisons,$estimation_calories){
    for($i=0 ; $i<count($recettes) ;$i++){ 
        foreach($estimation_calories as $calorie){
            if($recettes[$i]["id_recette"]==$calorie["id_recette"]){
                $recettes[$i]["calorie"]=$calorie["calories"];
                break;
            }
        }
        foreach($notations as $note){
            if($recettes[$i]["id_recette"]==$note["id_recette"]){
                $recettes[$i]["note"]=$note["note"];
                break;
            }
            else{
                $recettes[$i]["note"]=0;
            }
        }
        $recette_saison=array();
        foreach($saisons as $saison){
            if($recettes[$i]["id_recette"]==$saison["id_recette"]){
                array_push($recette_saison,$saison["nom_saison"]);
            }
        }
        $recettes[$i]["saisons"]=$recette_saison;
        $recettes[$i]["etapes"]=array();
        $recettes[$i]["ingredients"]=array();  
    }

    return $recettes;
}

function get_nb_ingredient($recettes,$id_recette){
    foreach($recettes as $recette){
        if($recette["id_recette"]==$id_recette) return $recette["nb_ingr"];
    }
}




