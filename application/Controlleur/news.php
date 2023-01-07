<?php

class news extends Controlleurs {
    public function afficher_news(){
        $this->getView("news_view");
        $this->getModel("news_model");
        $view = new news_view();
        $model_news = new news_model();
        $news = $model_news->getAll_News();
        $view->afficher_entete_haut("news.css","News");
        $view->afficher_menu();
        $view->afficher_news($news);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("news.js");
    }

    public function affiche_page_new($id_new){
        $this->getView("news_view");
        $this->getModel("news_model");
        $view = new news_view();
        $model_news = new news_model();
        $new = $model_news->get_new($id_new);
        $view->afficher_entete_haut("news_page.css",$new["titre_recette"]);
        $view->afficher_menu();
        $view->afficher_new($new);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("news.js");
    }
}