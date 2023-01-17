<?php
class user extends Controlleurs{
    public function afficher_login_page($message){
        $this->getView("user_view");
        $view = new user_view();
        $view->afficher_entete_haut("user.css","Login");
        $view->afficher_menu();
        $view->afficher_login_page($message);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }

    public function deconnect(){
        $this->getModel("user_model");
        $model = new user_model();
        if(isset($_SESSION["id"]) && isset($_SESSION["token"])){
            $model->set_token($_SESSION["id"],md5($_SESSION["id"].md5(date("Y-m-d h:i:s"))));
           // session_destroy();
           unset($_SESSION["id"]);
           unset($_SESSION["token"]);
        }
        header("Location: http://localhost/Projet_TDW/public/");
    }

    public function login(){
        $this->getModel("user_model");
        $model = new user_model();
        if(isset($_POST["email"]) && isset($_POST["password"])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $user = $model->get_user();
                if(count($user)>0){
                    if($user[0]["valide"]){  
                        $_SESSION["token"]=md5($user[0]["password"].md5(date("Y-m-d h:i:s")));
                        $_SESSION["id"]=$user[0]["id_user"];
                        $model->set_token($_SESSION["id"],$_SESSION["token"]);
                        header("Location: http://localhost/Projet_TDW/public/");
                    }else{
                        header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=Votre compte n'est pas encore validé");
                    }
                }else{
                    header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=Information incorrects");
                }
            }else{
                header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=Email invalide");
            }
        }
    }

    public function afficher_inscription($message){
        $this->getView("user_view");
        $view = new user_view();
        $view->afficher_entete_haut("register.css","Inscription");
        $view->afficher_menu();
        $view->afficher_inscription_page($message);
        $view->afficher_footer(); 
        $view->afficher_entete_bas("");
    }

    public function inscription(){
        $this->getModel("user_model");
        $model = new user_model();
        if(isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe']) && isset($_POST['data_naissance']) && isset($_POST['password']) && isset($_POST['conf_password'])){
           if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && ( $_POST['password'] == $_POST['conf_password'] ) ){
                if(!$model->get_email()){
                    $model->inscription();
                    header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=");
                }else{
                    header("Location: http://localhost/Projet_TDW/public/user/afficher_inscription&message=Email exist deja");
                }
           }else{
                header("Location: http://localhost/Projet_TDW/public/user/afficher_inscription&message=Email invalide ou configuration mot de passe incorrect");
           }
        }
    }

    public function afficher_profile(){
        $this->getModel("user_model");
        $model = new user_model();
        if(isset($_SESSION['id'])  && isset($_SESSION['token'])){
            if($model->check_login($_SESSION['id'],$_SESSION['token'])){
                $this->getView("user_view");
                $view = new user_view();
                $recettes = $model->get_recette_preferer($_SESSION['id']);
                $notations = $model->get_notations($_SESSION['id']);
                $user_info = $model->get_info_user($_SESSION['id']);
                $view->afficher_entete_haut("profile.css",$user_info['nom_user']." ".$user_info['prenom_user']);
                $view->afficher_menu();
                $view->afficher_profile($recettes,$notations,$user_info);
                $view->afficher_footer(); 
                $view->afficher_entete_bas("user.js");
            }else{
                header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=");
            }
        }else{
            header("Location: http://localhost/Projet_TDW/public/user/afficher_login_page&message=");
        }
    }

    public function ajouter_au_fav($id_recette){
        $this->getModel("user_model");
        $model_user = new user_model();
        if(isset($_SESSION['id']) && isset($_SESSION['token'])){
            if($model_user->check_login($_SESSION['id'],$_SESSION['token'])){
               $model_user->ajouter_au_fav($_SESSION['id'],$id_recette);
            }
        }
        header("Location: ".LIEN_RECETTES.$id_recette);
    }


    public function supprimer_de_fav($id_recette){
        $this->getModel("user_model");
        $model_user = new user_model();
        if(isset($_SESSION['id']) && isset($_SESSION['token'])){
            if($model_user->check_login($_SESSION['id'],$_SESSION['token'])){
               $model_user->supprimer_de_fav($_SESSION['id'],$id_recette);
            }
        }
        header("Location: ".LIEN_RECETTES.$id_recette);
    }

    public function check_fav($id_recette,$id_user){
        $this->getModel("user_model");
        $model_user = new user_model();
        return $model_user->check_fav($id_user,$id_recette);
    }
}