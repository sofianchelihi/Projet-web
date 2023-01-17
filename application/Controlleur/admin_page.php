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
}