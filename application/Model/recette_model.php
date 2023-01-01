<?php
class recette_model extends Model{
    public function getRecette(){

    }
    public function getRecette_par_caregorie($categorie){
        $tab = array($categorie);
        return $this->requete1("SELECT recette.* FROM recette INNER JOIN categorie  ON recette.categorie = categorie.id_categorie  AND categorie.nom_categorie=?",$tab);
    }

    public function getCategories(){
        return $this->requete2("SELECT DISTINCT nom_categorie,lien_categorie FROM categorie ;");
    }
}