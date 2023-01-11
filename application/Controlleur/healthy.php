<?php
class healthy extends Controlleurs{
    public function afficher_healthy_recettes(){
        $this->getView("healthy_view");
        $view = new healthy_view();
        $this->getModel("ingredients");
        $model = new ingredients();
        $recettes = $model->get_recettes_with_healthy_ingredients();
        $view->afficher_entete_haut("healthy.css","Healthy");
        $view->afficher_menu();
        $view->afficher_healthy_recettes($recettes);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }
}