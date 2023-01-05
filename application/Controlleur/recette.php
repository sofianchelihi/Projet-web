<?php
class recette extends Controlleurs{
    public function affiche_page_recette($id_recette){
        $this->getView("recette_view");
        $this->getModel("recette_model");
        $view = new recette_view();
        $model = new recette_model();
        $recette_info = $model->getRecetteInfo($id_recette);
        $view->afficher_entete_haut("recette.css",$recette_info["titre_recette"]);
        $view->afficher_menu();
        $view->afficher_recette($recette_info);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("recette.js");



        
    }
}
?>