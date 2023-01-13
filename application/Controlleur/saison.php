<?php 
class saison extends Controlleurs{

    public function afficher_recette_of_saison($saison){
        $this->getView("saison_view");
        $view = new saison_view();
        $this->getModel("ingredients");
        $model = new ingredients();
        $recettes = $model->get_recette_with_ingredients_of_saisons($saison);
        $titre = $saison;
        if($titre=='') $titre = "Saisons";
        $view->afficher_entete_haut("saison.css",$titre);
        $view->afficher_menu();
        $view->afficher_filtre();
        $view->afficher_recette_of_saison($recettes);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }
}