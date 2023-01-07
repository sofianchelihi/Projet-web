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
}