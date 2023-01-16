<?php

class Controlleurs{
    public function getView($viewName){
        $nomFichier = "../application/View/".$viewName.".php";
        if(file_exists($nomFichier)){
            require $nomFichier;
        }else{
            $nomFichier = "../application/View/viewNonTrouve.php";
            require $nomFichier;
        }
    }

    public function getModel($model){
        $nomFichier = "../application/Model/".$model.".php";
        if(file_exists($nomFichier)){
            require $nomFichier;
        }else{
            $nomFichier = "../application/Model/modelNonTrouve.php";
            require $nomFichier;
        }
    }


    public function check_admin_login(){
        $this->getModel("admin_model");
        $model=new admin_model();
        if(!isset($_SESSION["id_admin"]) || !isset($_SESSION["token_admin"])){
            header("Location: http://localhost/Projet_TDW/njKMda/login_admin/afficher_login_admin&message=Tu doit etre connecté");
        }else{
            if(!$model->check_admin_login($_SESSION["id_admin"],$_SESSION["token_admin"]) ){
                header("Location: http://localhost/Projet_TDW/njKMda/login_admin/afficher_login_admin&message=Tu doit etre connecté");
            }
        }
    }

    public function Methode_not_exict(){
        echo "methode not found";
    }

}