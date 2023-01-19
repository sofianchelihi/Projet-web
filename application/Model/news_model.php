<?php
class news_model extends Model{
    public function getAll_News(){
        $news = $this->requete2("SELECT * FROM news ORDER BY id_news ASC");
        $news_array=array();
        foreach($news as $new){
            $recette = array();
            if($new["id_recette"]!=null){
                $recette = $this->requete1("SELECT * FROM recette WHERE id_recette =?",[$new["id_recette"]]);   
                $recette = $recette[0];            
            }else{
                $recette["id_recette"]=null;
                $recette["id_news"]=$new["id_news"];
                $recette["lien_image"]=$new["liens_image"];
                $recette["titre_recette"]=$new["titre_news"];
                $recette["description"]=$new["description"];
                $recette["diff_recette"]=0;
                $recette["temp_prepa"]=0;
                $recette["temp_repo"]=0;
                $recette["temp_cuis"]=0;
                $recette["lien_video"]=$new["lien_video"];           
            }
            $recette["saisons"]=array();
            $recette["calorie"]=0;
            $recette["note"]=0;
            $recette["etapes"]=array();
            $recette["ingredients"]=array();
            array_push($news_array,$recette);
        }
        return $news_array;
    }

    public function get_new($id_new){
        $new = $this->requete1("SELECT * FROM news WHERE id_news=? AND id_recette is null",[$id_new])[0];
        $new_info=array();
        $new_info["id_recette"]=null;
        $new_info["lien_image"]=$new["liens_image"];
        $new_info["titre_recette"]=$new["titre_news"];
        $new_info["description"]=$new["description"];
        $new_info["diff_recette"]=0;
        $new_info["temp_prepa"]=0;
        $new_info["temp_repo"]=0;
        $new_info["temp_cuis"]=0;
        $new_info["lien_video"]=$new["lien_video"]; 
        $new_info["id_news"]=$new["id_news"];
        $new_info["saisons"]=array();
        $new_info["calorie"]=0;
        $new_info["note"]=0;
        $new_info["etapes"]=array();
        $new_info["ingredients"]=array();
        return $new_info;
    }

    public function get_all_news(){
        return $this->requete2("SELECT news.id_news,news.titre_news,recette.titre_recette,recette.id_recette FROM news LEFT JOIN recette ON news.id_recette= recette.id_recette ORDER BY news.id_news;");
    }

    public function sup_news($id_new){
        return $this->requete1("DELETE FROM news WHERE id_news=?",[$id_new]);
    }


    public function ajouter_recette_news($id_recette){
        return $this->requete2("INSERT INTO news(id_recette) VALUES (".$id_recette.")");
    }

    public function ajouter_new_news($titre,$description,$nom_image){
        return $this->requete2("INSERT INTO news(titre_news,description, liens_image, lien_video) VALUES ('".$titre."','".$description."','http://localhost/Projet_TDW/public/assets/images/".$nom_image."','#')");
    }

    public function get_news_title(){
        return $this->requete2("SELECT * FROM news WHERE id_recette IS NULL");
    }

    public function search_news_by_title($titre){
       return $this->requete2("SELECT * FROM news WHERE titre_news='".$titre."'"); 
    }
}