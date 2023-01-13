<?php
class nutrition extends Controlleurs{
    public function afficher_ingredients(){
        $this->getView("nutrition_view");
        $view = new nutrition_view();
        $this->getModel("ingredients");
        $model = new ingredients();
        $ingredients = $model->get_ingredients();
        $view->afficher_entete_haut("nutrition.css","Nutrition");
        $view->afficher_menu();
        $view->afficher_all_ingredients($ingredients);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }
}