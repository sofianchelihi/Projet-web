<?php
class controlleurNotFond extends Controlleurs{
    public function __construct(){
        echo 'controlleur non trouver';
        $this->getView('viewNonTrouve','hello');
    }

    public function Not_Found(){
        echo "controler not found";
    }
}