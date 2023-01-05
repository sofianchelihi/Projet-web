<?php
class page_accueil extends Controlleurs{
    public function __construct(){}

    public function afficher_page_accueil(){

        $this->getView('page_accueil_view');
        $this->getModel("page_accueil_model");
        $this->getModel("recette_model");

        $view = new page_accueil_view();
        $model = new page_accueil_model();
        $view->afficher_entete_haut("view.css","Page d’accueil");
        $diaporama=$model->getDiaporama();
        $view->afficher_diaporama($diaporama);  
        $view->afficher_menu();
        $this->affiche_categories();
        $view->afficher_footer();
        $view->afficher_entete_bas("view.js");
    }

    public function affiche_categories(){
        $recette_model = new recette_model();
        $get_all_categories = $recette_model->getCategories();
        $info_categories=array();
        foreach($get_all_categories as $element){
            $info_categories[$element['nom_categorie']] = $recette_model->getRecette_par_caregorie($element['nom_categorie']);
        }
        $view = new page_accueil_view();
        $view->affiche_categories($info_categories,false);
    }
}