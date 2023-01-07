<?php

class page_accueil_model extends Model{
    public function getDiaporama(){
        return $this->requete2("SELECT * FROM element_diaporama ORDER BY id_element ASC");
    }
}