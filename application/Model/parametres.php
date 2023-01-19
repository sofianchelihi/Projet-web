<?php
class parametres extends Model{
    public function getParametre($id_parametre){
        return $this->requete2("SELECT *FROM parametre_site WHERE id_parametre='".$id_parametre."'")[0]["valeur"];
    }

    public function setParametre($id_parametre,$valeur){
        $this->requete2("UPDATE parametre_site SET valeur=".$valeur." WHERE id_parametre='".$id_parametre."'");
    }

    public function getAll_parametres(){
        return $this->requete2("SELECT * FROM parametre_site");
    }
}