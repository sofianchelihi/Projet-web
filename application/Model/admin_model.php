<?php
class admin_model extends Model{
    public  function get_admin(){
        return $this->requete2("SELECT * FROM admin WHERE admin.email_admin='".$_POST['email']."' AND admin.password='".$_POST["password"]."'");
    }
    public function set_token($id_admin,$token){
        return $this->requete2("UPDATE admin SET token='".$token."' WHERE admin.id_admin=".$id_admin);
    }

    public function check_admin_login($id_admin,$token_admin){
        $compte = $this->requete2("SELECT * FROM admin WHERE admin.id_admin=".$id_admin." AND admin.token='".$token_admin."'");
        if(count($compte)==0) return false;
        return true;
    }

    public function valider_user($id_user){
        return $this->requete1("UPDATE utilisateur SET valide=true WHERE id_user=?",[$id_user]);
    }

    public function invalider_user($id_user){
        return $this->requete1("UPDATE utilisateur SET valide=false WHERE id_user=?",[$id_user]);
    }

    public function supprimer_user($id_user){
        $this->requete1("DELETE FROM noter WHERE id_user=?",[$id_user]);
        $this->requete1("",[$id_user]);
        $this->requete1("",[$id_user]);
        $this->requete1("",[$id_user]);
        $this->requete1("",[$id_user]);
    }
}