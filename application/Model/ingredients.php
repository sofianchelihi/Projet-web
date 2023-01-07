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


    public function get_nb_ingredient_in_recettes(){ 
        return $this->requete2("SELECT id_recette,COUNT(id_recette) nb_ingr FROM recette_ingredient GROUP BY id_recette");     
    }

    public function get_recettes($recettes){
        $requete = "SELECT * FROM recette WHERE ";
        foreach($recettes as $recette){
           $requete .=" id_recette = '".$recette."' OR ";    
        }
        $requete=substr($requete, 0,strlen($requete)-3); 
        return $this->requete2($requete);
    }
}