<?php
class ingredients extends Model{
    public function getRecette($ingredients){
        $requete = "SELECT id_recette,COUNT(id_recette) nb_ingr FROM recette_ingredient INNER JOIN ingredient ON recette_ingredient.id_ingr=ingredient.id_ingr AND ( ";
        foreach($ingredients as $ingr){
           $requete .=" ingredient.nom_ingr LIKE '".$ingr."' OR ";    
        }
        $requete=substr($requete, 0,strlen($requete)-3).") GROUP BY id_recette;"; 
        return $this->requete2($requete);
    }



    public function get_all_ingredients(){
        return $this->requete2("SELECT * FROM ingredient");
    }


    public function get_nb_ingredient_in_recettes(){ 
        return $this->requete2("SELECT id_recette,COUNT(id_recette) nb_ingr FROM recette_ingredient GROUP BY id_recette");     
    }

    public function get_recettes($recettes_ids){
        if(count($recettes_ids)!=0){
            $requete = "SELECT * FROM recette WHERE ";
            foreach($recettes_ids as $recette){
            $requete .=" id_recette = '".$recette."' OR ";    
            }
            $requete=substr($requete, 0,strlen($requete)-3); 
            $recettes=  $this->requete2($requete);
            $estimations_calories = $this->requete2("SELECT recette_ingredient.id_recette, AVG(calories) calories FROM ingredient INNER JOIN recette_ingredient ON ingredient.id_ingr = recette_ingredient.id_ingr GROUP BY id_recette");
            $notations = $this->requete2("SELECT id_recette,AVG(note) note FROM noter GROUP BY id_recette");       
            $saisons=$this->requete2("SELECT * FROM recette_saison INNER JOIN saison ON recette_saison.id_saison = saison.id_saison;");
            return AddRecetteInfo($recettes,$notations,$saisons,$estimations_calories);
        }else{
            return array();
        }
    }


    public function get_recettes_with_healthy_ingredients(){
        // LE SEUIL POUR NB DES INGREDIENTS HEALTHY POUR QUI LA RECETTE DEVIENT HEALTHY 
        require "../application/Model/parametres.php";
        $parametres = new parametres();
        $nb_healthy = $this->requete2('SELECT id_recette,COUNT(id_recette) nb_healthy FROM recette_ingredient INNER JOIN ingredient ON recette_ingredient.id_ingr=ingredient.id_ingr WHERE ingredient.healthy=true GROUP BY id_recette');
        $nb_ingr = $this->get_nb_ingredient_in_recettes();
        $id_recettes=array();
        foreach($nb_healthy as $healthy){
            if($healthy["nb_healthy"]>=get_nb_ingredient($nb_ingr,$healthy["id_recette"])*$parametres->getParametre("pourcentage_nb_ingr_healthy")){
                array_push($id_recettes,$healthy["id_recette"]);
            }
        }
        function filtre($var){
            $parametres = new parametres();
            $seuil=$parametres->getParametre("nb_calories_healthy");
            if($var["calorie"]<=$seuil) return $var;
        }
        $recettes = $this->get_recettes($id_recettes);
        return array_filter($recettes,"filtre");
    }

    public function get_recette_with_ingredients_of_saisons($saison){
        if($saison!=''){
            $saison_id = $this->requete1("SELECT id_saison FROM `saison` WHERE nom_saison=?",[$saison])[0]["id_saison"];
            $recettes =$this->requete1("SELECT recette.*,COUNT(recette.id_recette) nb_ingr_saison FROM ingredient_saison INNER JOIN ingredient ON ingredient_saison.id_ingr = ingredient.id_ingr INNER JOIN recette_ingredient ON recette_ingredient.id_ingr=ingredient.id_ingr  INNER JOIN recette ON recette.id_recette=recette_ingredient.id_recette WHERE ingredient_saison.id_saison=? GROUP BY recette.id_recette;",[$saison_id]);
            $nb_ingr = $this->get_nb_ingredient_in_recettes();
            $recettes_of_saison=array();
            foreach($recettes as $recette){
                if($recette["nb_ingr_saison"]==get_nb_ingredient($nb_ingr,$recette["id_recette"])) array_push($recettes_of_saison,$recette);
            }
            return $recettes_of_saison;
        }else{
            return $this->requete2('SELECT *FROM recette');
        }
    }


    public function get_ingredients(){
        $ingredients = $this->requete2("SELECT ingredient.*,info_nutr.* FROM ingredient INNER JOIN ingr_info_nutr ON ingredient.id_ingr = ingr_info_nutr.id_ingr INNER JOIN info_nutr ON ingr_info_nutr.id_info = info_nutr.id_info");
        $saisons = $this->requete2("SELECT * FROM ingredient_saison INNER JOIN saison ON ingredient_saison.id_saison = saison.id_saison ORDER BY ingredient_saison.id_ingr");
        return AddIngredientsInfo($ingredients,$saisons);
    }

    public function get_ingredient($id_ingr){
        $ingredients = $this->requete1("SELECT ingredient.*,info_nutr.* FROM ingredient INNER JOIN ingr_info_nutr ON ingredient.id_ingr = ingr_info_nutr.id_ingr INNER JOIN info_nutr ON ingr_info_nutr.id_info = info_nutr.id_info WHERE ingredient.id_ingr=?",[$id_ingr]);
        $saisons = $this->requete2("SELECT * FROM ingredient_saison INNER JOIN saison ON ingredient_saison.id_saison = saison.id_saison ORDER BY ingredient_saison.id_ingr");
        return AddIngredientsInfo($ingredients,$saisons);
    }


    public function sup_ingr($id_ingr){
        $this->requete1("DELETE FROM ingredient_saison WHERE id_ingr=?",[$id_ingr]);
        $this->requete1("DELETE FROM ingr_info_nutr WHERE id_ingr=?",[$id_ingr]);
        $this->requete1("DELETE FROM recette_ingredient WHERE id_ingr=?",[$id_ingr]);
        $this->requete1("DELETE FROM ingredient WHERE id_ingr=?",[$id_ingr]);
    }

    public function modifier_ingr($id_ingr){
        $this->requete1("UPDATE ingredient SET nom_ingr='".$_POST["nom_ingr"]."',healthy=".$_POST["healthy"].",calories=".$_POST["calories"]." WHERE id_ingr=?",[$id_ingr]);
        $this->requete1("UPDATE info_nutr SET glucide=".$_POST["glucide"].",lipide=".$_POST["lipide"].",minéraux=".$_POST["minéraux"].",vitaminA=".$_POST["vitaminA"].",vitaminB=".$_POST["vitaminB"].",vitaminC=".$_POST["vitaminC"].",vitaminD=".$_POST["vitaminD"].",vitaminE=".$_POST["vitaminE"]." WHERE id_info=?",[$id_ingr]);
        $this->requete1("DELETE FROM ingredient_saison WHERE id_ingr=?",[$id_ingr]);
        if(isset($_POST["hiver"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$id_ingr.",".$_POST["hiver"].")");
        }
        if(isset( $_POST["printemps"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$id_ingr.",".$_POST["printemps"].")");
        }
        if(isset($_POST["été"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$id_ingr.",".$_POST["été"].")");
        }
        if(isset($_POST["automne"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$id_ingr.",".$_POST["automne"].")");
        }
    }

    public function ajouter_ingr(){
        $this->requete2("INSERT INTO ingredient(nom_ingr,healthy,calories) VALUES ('".$_POST["nom_ingr"]."',".$_POST["healthy"].",".$_POST["calories"].");");
        $new_id_ingr=$this->requete2("SELECT  id_ingr FROM ingredient ORDER BY id_ingr DESC")[0]["id_ingr"];
        $this->requete2("INSERT INTO `info_nutr`(`glucide`, `lipide`, `minéraux`, `vitaminA`, `vitaminB`, `vitaminC`, `vitaminD`, `vitaminE`) VALUES (".$_POST["glucide"].",".$_POST["lipide"].",".$_POST["minéraux"].",".$_POST["vitaminA"].",".$_POST["vitaminB"].",".$_POST["vitaminC"].",".$_POST["vitaminD"].",".$_POST["vitaminE"].")");
        $new_id_info_nutr = $this->requete2("SELECT id_info FROM info_nutr ORDER BY id_info DESC")[0]["id_info"];
        $this->requete2("INSERT INTO ingr_info_nutr(id_info,id_ingr) VALUES (".$new_id_info_nutr.",".$new_id_ingr.")");
        if(isset($_POST["hiver"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$new_id_ingr.",".$_POST["hiver"].")");
        }
        if(isset( $_POST["printemps"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$new_id_ingr.",".$_POST["printemps"].")");
        }
        if(isset($_POST["été"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$new_id_ingr.",".$_POST["été"].")");
        }
        if(isset($_POST["automne"])){
            $this->requete2("INSERT INTO ingredient_saison(id_ingr,id_saison) VALUES (".$new_id_ingr.",".$_POST["automne"].")");
        }
    }
}