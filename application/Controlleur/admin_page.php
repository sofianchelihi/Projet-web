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
}