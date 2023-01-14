<?php
class user_model extends Model{
    public function get_user(){
        return $this->requete2("SELECT * FROM utilisateur WHERE utilisateur.email_user='".$_POST['email']."' AND utilisateur.password='".$_POST["password"]."'");
    }

    public function get_info_user($id_user){
        return $this->requete2("SELECT * FROM utilisateur WHERE utilisateur.id_user=".$id_user)[0];
    }

    public function set_token($id_user,$token){
        return $this->requete2("UPDATE utilisateur SET token='".$token."' WHERE utilisateur.id_user=".$id_user);
    }

    public function inscription(){
        return $this->requete2("INSERT INTO utilisateur(nom_user,prenom_user,email_user,date_de_naissance,sexe,password,valide,token) VALUES ('".$_POST["name"]."','".$_POST["prenom"]."','".$_POST["email"]."','".$_POST["data_naissance"]."','".$_POST["sexe"]."','".$_POST["password"]."',false,'')");
    }

    public function get_email(){
        $compte = $this->requete2("SELECT * FROM utilisateur WHERE utilisateur.email_user='".$_POST['email']."'");
        if(count($compte)==0) return false;
        return true;
    }

    public function check_login($id,$token){
        $compte = $this->requete2("SELECT * FROM utilisateur WHERE utilisateur.id_user=".$id." AND utilisateur.token='".$token."'");
        if(count($compte)==0) return false;
        return true;
    }

    public function get_user_note($id_user,$id_recette){
        return $this->requete2("SELECT * FROM noter WHERE id_user=".$id_user." AND id_recette=".$id_recette);
    }

    public function update_note($note,$id_user,$id_recette){
        return $this->requete2("UPDATE noter SET note=".$note."  WHERE id_user=".$id_user." AND id_recette=".$id_recette);
    }

    public function set_note($note,$id_user,$id_recette){
        return $this->requete2("INSERT INTO noter(id_recette,id_user,note) VALUES (".$id_recette.",".$id_user.",".$note.")");
    }

    public function ajouter_au_fav($id_user,$id_recette){
        return $this->requete2("INSERT INTO prefere(id_recette,id_user) VALUES (".$id_recette.",".$id_user.")");
    }

    public function supprimer_de_fav($id_user,$id_recette){
        return $this->requete2("DELETE FROM prefere WHERE id_recette=".$id_recette." AND id_user=".$id_user);
    }


    public function check_fav($id_user,$id_recette){
        $prefere =  $this->requete2("SELECT * FROM prefere WHERE id_user=".$id_user." AND id_recette=".$id_recette);
        if(count($prefere)==0) return false;
        return true;
    }

    public function get_recette_preferer($id_user){
        return $this->requete1("SELECT recette.* FROM prefere INNER JOIN recette ON prefere.id_recette=recette.id_recette AND prefere.id_user=?",[$id_user]);
    }

    public function get_notations($id_user){
        return $this->requete1('SELECT recette.titre_recette,noter.note FROM noter INNER JOIN recette ON noter.id_recette=recette.id_recette AND noter.id_user=?',[$id_user]);
    }
}