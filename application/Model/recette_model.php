<?php
class recette_model extends Model{
    public function getRecetteInfo($id_recette){
        $recette =  $this->requete1("SELECT * FROM recette WHERE id_recette=?",[$id_recette]);
        $recette=$recette[0];
        $recette["saisons"]=$this->getSaisonRecette($id_recette);
        $recette["calorie"]=$this->getCaloriesRecette($id_recette);
        $recette["note"]=$this->getNotationRecette($id_recette);
        $recette["etapes"]=$this->getEtapesRecette($id_recette);
        $recette["ingredients"]=$this->getIngredientsRecette($id_recette);
        return $recette;
    }

    public function getSaisonRecette($id_recette){
        $saisons=$this->requete1("SELECT * FROM recette_saison INNER JOIN saison ON recette_saison.id_saison = saison.id_saison AND id_recette=?",[$id_recette]);
        $saisons_array = array();
        foreach($saisons as $saison){
            array_push($saisons_array,$saison['nom_saison']);
        }
        return $saisons_array;
    }

    public function getCaloriesRecette($id_recette){
        $estimation_calories = $this->requete1("SELECT AVG(calories) calories FROM ingredient INNER JOIN recette_ingredient  ON ingredient.id_ingr = recette_ingredient.id_ingr AND recette_ingredient.id_recette=?",[$id_recette]);
        return $estimation_calories[0]["calories"];
    }

    public function getEtapesRecette($id_recette){
        $etapes = $this->requete1("SELECT * FROM etape WHERE id_recette =? ORDER BY ordre ASC",[$id_recette]);
        $etapes_array=array();
        foreach($etapes as $etape){
            array_push($etapes_array,$etape["description"]);
        }
        return $etapes_array;
    }

    public function getIngredientsRecette($id_recette){
        $ingredients = $this->requete1("SELECT * FROM ingredient INNER JOIN recette_ingredient  ON ingredient.id_ingr = recette_ingredient.id_ingr AND recette_ingredient.id_recette=?",[$id_recette]);
        $ingredient_array=array();
        foreach($ingredients as $ingredient){
            $ingredient_info=array();
            $ingredient_info["nom_ingr"]=$ingredient['nom_ingr'];
            $ingredient_info["quantite"]=$ingredient['quantite'];
            array_push($ingredient_array,$ingredient_info);
        }
        return $ingredient_array;
    }

    public function getNotationRecette($id_recette){
        $notations = $this->requete1("SELECT AVG(note) note FROM noter WHERE id_recette=?",[$id_recette]);
        return $notations[0]['note'];
    }

    public function getRecette_par_caregorie($categorie){
        $recettes = $this->requete1("SELECT recette.* FROM recette INNER JOIN categorie  ON recette.categorie = categorie.id_categorie  AND categorie.nom_categorie=?",[$categorie]);
        $estimations_calories = $this->requete2("SELECT recette_ingredient.id_recette, AVG(calories) calories FROM ingredient INNER JOIN recette_ingredient ON ingredient.id_ingr = recette_ingredient.id_ingr GROUP BY id_recette");
        $notations = $this->requete2("SELECT id_recette,AVG(note) note FROM noter GROUP BY id_recette");
        $saisons=$this->requete2("SELECT * FROM recette_saison INNER JOIN saison ON recette_saison.id_saison = saison.id_saison;");  
        return AddRecetteInfo($recettes,$notations,$saisons,$estimations_calories);
    }

    public function getCategories(){
        return $this->requete2("SELECT DISTINCT nom_categorie FROM categorie;");
    }

    public function get_recette_par_fete($fete){
        if($fete!=''){
            return $this->requete1('SELECT recette.* FROM fetes INNER JOIN recette_fetes ON fetes.id_fete = recette_fetes.id_fete INNER JOIN recette ON recette_fetes.id_recette=recette.id_recette WHERE fetes.nom_fete=? ORDER BY fetes.id_fete ASC',[$fete]);
        }else{
            return $this->requete2("SELECT * FROM recette");
        }
    }

    public function get_recettes_not_news(){
        return $this->requete2("SELECT recette.id_recette,recette.titre_recette FROM recette LEFT JOIN news ON recette.id_recette = news.id_recette WHERE id_news IS NULL;");
    }

    public function get_all_recettes(){
        return $this->requete2("SELECT * FROM recette");
    }

    public function search_recette_by_title($title){
        return $this->requete2("SELECT * FROM recette WHERE titre_recette='".$title."'");
    }
}