<?php
class admin_page extends Controlleurs{
    public function afficher_admin_page(){
        $this->check_admin_login();
        $this->getView('admin_page_view');
        $view=new admin_page_view();
        $view->afficher_entete_haut("admin_page.css","Page Admin");
        $view->afficher_page_admin();
        $view->afficher_entete_bas('');
    }

    public function afficher_gestion_news(){
        $this->check_admin_login();
        $this->getView('admin_page_view');
        $this->getModel("news_model");
        $view=new admin_page_view();
        $model=new news_model();
        $news=$model->get_all_news();
        $view->afficher_entete_haut("gestion_news.css","Gestion des News");
        $view->afficher_menu();
        $view->afficher_gestion_news($news);
        $view->afficher_entete_bas('');
    }

    public function sup_news($id_new){
        $this->check_admin_login();
        $this->getModel("news_model");
        $model = new news_model();
        $model->sup_news($id_new);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_news");
    }

    public function add_new_recette(){
        $this->check_admin_login();
        $this->getModel("news_model");
        $model = new news_model();
        if(isset($_POST["recette"])){
            $recette_info=explode("-",trim($_POST["recette"]));
            $model->ajouter_recette_news(intval($recette_info[0]));
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_news");
    }

    public function add_new_news(){
        $this->check_admin_login();
        $this->getModel("news_model");
        $model = new news_model();
        if(isset($_POST['titre_news']) && isset($_POST["para_news"])){
            move_uploaded_file($_FILES['image_news']['tmp_name'],"../public/assets/images/".$_FILES['image_news']['name']);
            $model->ajouter_new_news($_POST['titre_news'],$_POST["para_news"],$_FILES['image_news']['name']);
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_news");
    }

    public function afficher_page_gestion_users(){
        $this->check_admin_login();
        $this->getModel("user_model");
        $this->getView('admin_page_view');
        $model=new user_model();
        $view= new admin_page_view();
        $users=$model->get_users_filtre_tri();
        $view->afficher_entete_haut("gestion_users.css","Gestion des utilisateurs");
        $view->afficher_menu();
        $view->afficher_gestion_users($users);
        $view->afficher_entete_bas('gestion_users.js');
    }

    public function afficher_profile_user($id_user,$token){
        $this->check_admin_login();
        $_SESSION['id']=$id_user;
        $_SESSION['token']=$token;
        header("Location: http://localhost/Projet_TDW/public/user/afficher_profile");
    }

    public function valider_user($id_user){
        $this->check_admin_login();
        $model= new admin_model();
        $model->valider_user($id_user);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users");
    }

    public function invalider_user($id_user){
        $this->check_admin_login();
        $model= new admin_model();
        $model->invalider_user($id_user);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users");
    }

    public function supprimer_user($id_user){
        $this->check_admin_login();
        $model= new admin_model();
        $model->supprimer_user($id_user);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users");
    }

    public function afficher_gestion_ingredients(){
        $this->getView('admin_page_view');
        $this->getModel("ingredients");
        $this->check_admin_login();
        $view=new admin_page_view();
        $model = new ingredients();
        $ingredients= $model->get_all_ingredients();
        $view->afficher_entete_haut("gestion_ingredients.css","Gestion de la nutrition");
        $view->afficher_menu();
        $view->afficher_gestion_ingredients($ingredients);
        $view->afficher_entete_bas('gestion_ingredients.js');
    } 

    public function supprimer_ingr($id_ingr){
        $this->check_admin_login();
        $this->getModel("ingredients");
        $model = new ingredients();
        $model->sup_ingr($id_ingr);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_ingredients");
    }

    public function page_modifier_ingr($id_ingr){
        $this->check_admin_login();
        $this->getModel("ingredients");
        $model = new ingredients();
        $ingredient = $model->get_ingredient($id_ingr);
        $this->getView('admin_page_view');
        $view=new admin_page_view();
        $view->afficher_entete_haut("modifier_ingr.css",$ingredient[0]['nom_ingr']);
        $view->afficher_menu();
        $view->modifier_ingredient($ingredient);
        $view->afficher_entete_bas('');
    }

    public function modifier_ingr($id_ingr){
        $this->check_admin_login();
        $this->getModel("ingredients");
        $model = new ingredients();
        if(count($_POST)>=12){
            $model->modifier_ingr($id_ingr);
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_ingredients");
    }

    public function page_ajouter_ingr(){
        $this->check_admin_login();
        $this->getModel("ingredients");
        $model = new ingredients();
        $this->getView('admin_page_view');
        $view=new admin_page_view();
        $view->afficher_entete_haut("modifier_ingr.css","Rajouter ingrédients");
        $view->afficher_menu();
        $view->ajouter_ingredient();
        $view->afficher_entete_bas('');
    }

    public function ajouter_ingr(){
        $this->check_admin_login();
        $this->getModel("ingredients");
        $model = new ingredients();
        if(count($_POST)>=12){
            $model->ajouter_ingr();
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_ingredients");
    }

    public function afficher_parametres(){
        $this->check_admin_login();
        $this->getView('admin_page_view');
        $this->getModel("parametres");
        $view=new admin_page_view();
        $model = new parametres();
        $parametres= $model->getAll_parametres();
        $diaporama = $model->getDiaporama();
        $view->afficher_entete_haut("parametres.css","Parametres");
        $view->afficher_menu();
        $view->setDiaporama($diaporama);
        $view->afficher_parametres($parametres);
        $view->afficher_entete_bas('');
    } 


    public function changeDiaporama(){
        $this->check_admin_login();
        $this->getModel("parametres");
        $this->getModel("recette_model");
        $this->getModel("news_model");
        $model = new parametres();
        $model_recette = new recette_model();
        $model_news = new news_model();
        for($index=1 ; $index<=5 ; $index++){
            if($_FILES["lien_image" .$index]["name"]!=''){
                move_uploaded_file($_FILES["lien_image" .$index]['tmp_name'],"../public/assets/images/".$_FILES["lien_image" .$index]['name']);
                $model->changeDiaporamaPhoto($index,"http://localhost/Projet_TDW/public/assets/images/".$_FILES["lien_image" .$index]['name']);
            }
            if($_POST["lien_description" .$index]!=''){
                $r= $model_recette->search_recette_by_title($_POST["lien_description" .$index]);
                if(count($r)!=0){
                    $model->changeDiaporamaDescr($index,LIEN_RECETTES.$r[0]["id_recette"]);
                }else{
                    $n =$model_news->search_news_by_title($_POST["lien_description" .$index]);
                    if(count($n)!=0){
                        $model->changeDiaporamaDescr($index,LIEN_NEWS.$n[0]["id_news"]);
                    }
                }
                
            }
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_parametres");
    }

    public function setParametres(){
        $this->check_admin_login();
        $this->getModel("parametres");
        $model = new parametres();
        if(isset($_POST["nb_calories_healthy"]) && isset($_POST["pourcentage_ingredient"]) && isset($_POST["pourcentage_nb_ingr_healthy"]) ){
            if( is_float( floatval($_POST["pourcentage_ingredient"]) ) ){
                if(floatval($_POST["pourcentage_ingredient"])>0 && floatval($_POST["pourcentage_ingredient"])<=1){
                    $model->setParametre("pourcentage_ingredient",floatval($_POST["pourcentage_ingredient"]));
                }

            }

            if( is_float( floatval($_POST["pourcentage_nb_ingr_healthy"]) ) ){
                if(floatval($_POST["pourcentage_nb_ingr_healthy"])>0 && floatval($_POST["pourcentage_nb_ingr_healthy"])<=1){
                    $model->setParametre("pourcentage_nb_ingr_healthy",floatval($_POST["pourcentage_nb_ingr_healthy"]));
                }

            }

            if( is_integer( intval($_POST["nb_calories_healthy"]) ) ){         
                $model->setParametre("nb_calories_healthy",intval($_POST["nb_calories_healthy"]));
            }
        }
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_parametres");
    }

    public function afficher_gestion_recette(){
        $this->check_admin_login();
        $this->getView('admin_page_view');
        $this->getModel("ingredients");
        $this->getModel("recette_model");
        $view=new admin_page_view();
        $model = new ingredients();
        $model_recette = new recette_model();
        $recettes = $model_recette->get_all_recettes();
        $ids_recettes = array();
        foreach($recettes as $recette){
            array_push($ids_recettes,$recette["id_recette"]);
        }
        $recettes_info = $model->get_recettes($ids_recettes);
        $view->afficher_entete_haut("gestion_recette.css","Gestion des recettes");
        $view->afficher_menu();
        $view->afficher_filtre();
        $view->afficher_gestion_recettes($recettes_info);
        $view->afficher_entete_bas('gestion_recette.js');
    }

    public function modifier_recette_page($id_recettte){
        
    }

    public function supprimer_recette($id_recettte){

    }

    public function ajouter_recette_page(){

    }

    public function invalider_recette($id_recettte){
        $this->check_admin_login();
        $this->getModel("recette_model");
        $model = new recette_model();
        $model->invalider_recette($id_recettte);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_recette");
    }

    public function valider_recette($id_recettte){
        $this->check_admin_login();
        $this->getModel("recette_model");
        $model = new recette_model();
        $model->valider_recette($id_recettte);
        header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_recette");
    }
}