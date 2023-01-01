<?php
class Model{

    private function connect(){
        return new PDO("mysql:hostname=".HOSTNAME.";dbname=".DATABASENAME,USERNAME,PASSWORD);
    }

    private function deconnect(){
        return NULL;
    }


    public function requete1($requete,$data){
        $con = $this->connect();
        $requete = $con->prepare($requete);
        $index = 1;
        foreach($data as $parametre){
            $requete->bindParam($index,$parametre);
            $index ++;
        }
        $requete->execute();
        $requete = $requete->fetchAll(PDO::FETCH_ASSOC);
        $con = $this->deconnect();
        if(is_array($requete)){
            return $requete;
        }else{
            return true;
        }
    }

    public function requete2($requete){
        $con = $this->connect();
        $requete = $con->prepare($requete);
        $requete->execute();
        $requete = $requete->fetchAll(PDO::FETCH_ASSOC);
        $con = $this->deconnect();
        if(is_array($requete)){
            return $requete;
        }else{
            return true;
        }
    }
}
