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

    public function Methode_not_exict(){
        echo "methode not found";
    }

}