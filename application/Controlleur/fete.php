<?php
class fete extends Controlleurs{
    public function afficher_recette_de_fete($fete){
        $this->getView("fete_view");
        $view = new fete_view();
        $this->getModel("recette_model");
        $model = new recette_model();
        $recettes = $model->get_recette_par_fete($fete);
        $titre = $fete;
        if($titre=='') $titre = "Fetes";
        $view->afficher_entete_haut("fete.css",$titre);
        $view->afficher_menu();
        $view->afficher_filtre();
        $view->afficher_recette_de_fete($recettes);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }
}