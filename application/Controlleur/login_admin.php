<?php
class login_admin extends Controlleurs{
    public function afficher_login_admin($message){
        $this->getView("login_admin_view");
        $view = new login_admin_view();
        $this->getModel("admin_model");
        $model = new admin_model();
        $view->afficher_entete_haut("login_admin.css",'Login Admin');
        $view->afficher_login_page($message);
        $view->afficher_entete_bas("");
    }

    public function deconnect(){
        $this->getModel("admin_model");
        $model = new admin_model();
        if(isset($_SESSION["id_admin"]) && isset($_SESSION["token_admin"])){
            $model->set_token($_SESSION["id_admin"],md5($_SESSION["id_admin"].md5(date("Y-m-d h:i:s"))));
            session_destroy();
        }
        header("Location: http://localhost/Projet_TDW/njKMda/");
    }

    public function login(){
        $this->getModel("admin_model");
        $model = new admin_model();
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $admin = $model->get_admin();
            if(count($admin)>0){       
                $_SESSION["token_admin"]=md5($admin[0]["password"].md5(date("Y-m-d h:i:s")));
                $_SESSION["id_admin"]=$admin[0]["id_admin"];
                $model->set_token($_SESSION["id_admin"],$_SESSION["token_admin"]);
                header("Location: http://localhost/Projet_TDW/njKMda/admin_page/afficher_admin_page");
            }else{
                header("Location: http://localhost/Projet_TDW/njKMda/login_admin/afficher_login_admin&message=Information incorrects");
            }
        }
    }
}