<?php
class App_admin{
    private $controlleur='page_admin';
    private $function='afficher_page_admin';
    private $parametres= array();
  
    private function getUrl(){
        $url = $_GET['url'] ?? 'page_admin/afficher_page_admin';
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
        $nomFichier = "../application/Controlleur/".ucfirst( $url[0]).".php";
        if(file_exists($nomFichier)){
            require $nomFichier;
            $this->controlleur=ucfirst( $url[0]);
            $this->function = $url[1] ?? 'afficher_page_admin';
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