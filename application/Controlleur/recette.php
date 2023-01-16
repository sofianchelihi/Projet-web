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

    public function noter_recette($id_recette){
        $this->getModel("user_model");
        $model_user = new user_model();
        if(isset($_SESSION['id']) && isset($_SESSION['token'])){
            if($model_user->check_login($_SESSION['id'],$_SESSION['token']) && $_POST["note"]){
                $user_recette_note = $model_user->get_user_note($_SESSION['id'],$id_recette);
                if(count($user_recette_note)>0){
                    $model_user->update_note($_POST["note"],$_SESSION['id'],$id_recette);
                }else{
                    $model_user->set_note($_POST["note"],$_SESSION['id'],$id_recette);
                }
            }
        }
        header("Location: ".LIEN_RECETTES.$id_recette);
    }

    public function get_recettes_not_news(){
        $this->getModel("recette_model");
        $model=new recette_model();
        return $model->get_recettes_not_news();
    }
}
?>