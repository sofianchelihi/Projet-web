<?php
class idee_recette extends Controlleurs{
    public function afficher_form_page(){
        $this->getView("idee_recette_view");
        $view = new idee_recette_view();
        $view->afficher_entete_haut("idee_recette.css","Ideé recettes");
        $view->afficher_menu();
        $this->getModel("ingredients");
        $model = new ingredients();
        $ingredients = $model->get_all_ingredients();
        $view->afficher_form($ingredients);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("idee_recette.js");
    }

    public function getRecette(){
        header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json;charset=UTF-8");
        header("Access-Control-Max-Age:3600");
        header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch,X-Auth-Token");
        header("Access-ControlAllow-Methods:POST,GET");
        $data = file_get_contents("php://input");
        $ing = json_decode($data);
        $list_ingr = json_decode(json_encode($ing), true);
        $list_ingr = $list_ingr["json"];
        $this->getModel("ingredients");
        $this->getModel("parametres");
        $parametres = new parametres();
        $model = new ingredients();
        $result_recettes = $model->getRecette($list_ingr);
        $nb_ingredient_recettes = $model->get_nb_ingredient_in_recettes();
        $id_recettes=array();
        foreach($result_recettes as $element){
            if($element["nb_ingr"]>=get_nb_ingredient($nb_ingredient_recettes,$element["id_recette"])*$parametres->getParametre("pourcentage_ingredient")){
                array_push($id_recettes,$element["id_recette"]);
            }
        }
        print_r(json_encode($model->get_recettes($id_recettes)));
    }
}