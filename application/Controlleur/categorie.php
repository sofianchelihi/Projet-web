<?php
class categorie extends Controlleurs{
    public function __construct(){}

    public function affiche_page_categorie($categorie){
        $this->getView("categorie_view");
        $this->getModel("recette_model");
        $view = new categorie_view();
        $model = new recette_model();
        $recettes = $model->getRecette_par_caregorie($categorie);
        $view->afficher_entete_haut("categorie.css",$categorie);
        $view->afficher_menu();
        $view->afficher_filtre();
        $view->afficher_recettes($recettes,false);  
        $view->afficher_footer(); 
        $view->afficher_entete_bas("categorie.js");
    }
}
?>