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

    public function getDiaporama(){
        return $this->requete2("SELECT * FROM element_diaporama ORDER BY id_element");
    }

    public function changeDiaporamaPhoto($id_element,$lien_image){
        $this->requete1("UPDATE element_diaporama SET lien_image='".$lien_image."' WHERE id_element=?",[$id_element]);
    }

    public function changeDiaporamaDescr($id_element,$lien){
        $this->requete1("UPDATE element_diaporama SET lien_description='".$lien."' WHERE id_element=?",[$id_element]);
    }
}