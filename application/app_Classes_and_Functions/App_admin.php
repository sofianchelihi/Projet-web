<?php
class App_admin{
    private $controlleur='login_admin';
    private $function='afficher_login_admin';
    private $parametres= array();
  
    private function getUrl(){
        $url = $_GET['url'] ?? 'login_admin/afficher_login_admin';
        $url = explode("/",trim( $url ));
        return $url;
    }

    private function getParametre(){
        $parametres  = array_slice($_GET,1);
        $this->parametres = array_values($parametres);
    }
    public function getControlleur(){
        $url = $this->getUrl();
        $this->getParametre();

        //here
        if($url[0]=="login_admin" && $url[1]=="afficher_login_admin" && count($this->parametres)==0) array_push($this->parametres,"");
        //here

        $nomFichier = "../application/Controlleur/".ucfirst( $url[0]).".php";
        if(file_exists($nomFichier)){
            require $nomFichier;
            $this->controlleur=ucfirst( $url[0]);
            $this->function = $url[1] ?? 'afficher_login_admin';
        }else{
            $nomFichier = "../application/Controlleur/controlleurNotFond.php";
            require $nomFichier;
            $this->controlleur='controlleurNotFond';
            $this->function='Not_Found';
        }
        $controlleur = new $this->controlleur;
        if(method_exists($controlleur,$this->function)){
            call_user_func_array([$controlleur,$this->function],$this->parametres);
        }
        else{
            call_user_func_array([$controlleur,'Methode_not_exict'],[]);
        }
    }
}