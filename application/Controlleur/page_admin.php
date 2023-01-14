<?php
class page_admin extends Controlleurs{
    public function afficher_page_admin(){
        $this->getView('page_admin_view');
        $view = new page_admin_view();
        $view->afficher_entete_haut("page_admin.css","Page D’accueil Admin");
        $view->afficher_entete_bas("");
    }
}