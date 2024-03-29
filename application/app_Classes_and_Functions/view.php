<?php

class view{


    public function afficher_entete_haut($css,$title){ ?>
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="cache-control" content="no-cache" />
                <meta http-equiv="Pragma" content="no-cache" />
                <meta http-equiv="Expires" content="-1" />
                <title><?php echo $title?></title>
                <link rel="icon" href="<?php echo ROOTIMG?>logo2.svg">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="stylesheet" href="<?php echo ROOTCSS.$css?>">
                <script src="<?php echo ROOTJQUERY?>"></script>
            </head>
            <body>
    <?php
    }




    public function afficher_entete_bas($js){ ?>
                <script src="<?php echo ROOTJS.$js?>"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </body>
        </html>
    <?php
    }




    public function afficher_menu(){ ?>
        <div class="divmenu">
            <div class="contact row">
                <div class="col-6">
                    <a href = "mailto: abc@example.com">Send Email</a>
                    <a href="tel:+213785652396">0785652396</a>
                </div>
                <div class="col-6">
                    <a href="#"><img  src="<?php echo ROOTIMG?>instagram.png" alt=""></a>
                    <a href="#"><img  src="<?php echo ROOTIMG?>facebook.png" alt=""></a> 
                    <a href="#"><img  src="<?php echo ROOTIMG?>telegram.png" alt=""></a>
                    <a href="#"><img  src="<?php echo ROOTIMG?>linkedin.png" alt=""></a>
                </div>
            </div>
            <div class="row w-100 menu">
                <div class="col-2"> 
                    <object data="<?php echo ROOTIMG?>logo2.svg"></object> 
                </div>
                <div class="col-10">
                    <ul class="row"> 
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/">Page d’accueil</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/news/afficher_news">News</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/idee_recette/afficher_form_page">Idées recette</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/healthy/afficher_healthy_recettes">Healthy</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison=">Saisons</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=">Fêtes</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/nutrition/afficher_ingredients">Nutrition</a>
                        </li>
                        <li class="col text-center">
                            <a href="http://localhost/Projet_TDW/public/contact/afficher_contact">Contact</a>
                        </li>
                        <li class="login col text-center">
                            <object data="<?php echo ROOTIMG?>setting.svg" type=""></object>
                            <ul><?php
                                if(isset($_SESSION["token"]) && isset($_SESSION["id"])){?>
                                    <li><a href="http://localhost/Projet_TDW/public/user/deconnect"> Deconnect </a></li>
                                    <li><a href="http://localhost/Projet_TDW/public/user/afficher_profile"> Profil </a></li>
                                 <?php
                                }else{ ?>
                                    <li><a href="http://localhost/Projet_TDW/public/user/afficher_login_page&message="> Login </a></li>
                                <?php
                                }?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }

    public function afficher_card($info_recette,$total_info){ 
        if($info_recette['valide']){?>
        <div class="cart">
            <img src="<?php if(isset($info_recette['lien_image']))  echo $info_recette['lien_image']  ?>" class="cardImg"  alt="Error">
            <div class="cardBody">
                <h5  ><?php if(isset($info_recette['titre_recette']))  echo $info_recette['titre_recette']  ?></h5>
                <p><?php if(isset($info_recette['description']))  echo afficher_description($info_recette['description'],$total_info,100)   ?></p>
                <?php 
                if(!$total_info){ 
                    if($info_recette['id_recette']!=null){ 
                        ?>
                        <a target="_blank" href="<?php echo LIEN_RECETTES.$info_recette['id_recette'] ?>" class="voirPlus">Voir plus</a>
                        <?php 
                    }else{
                        ?>
                        <a target="_blank" href="<?php echo LIEN_NEWS.$info_recette['id_news'] ?>" class="voirPlus">Voir plus</a>
                        <?php
                    }
                }?>
                <div class="info etoils"> <?php
                    if( isset($info_recette['note']) ){
                        for($i=0;$i<10;$i++){
                            if($i<$info_recette['note']){
                            ?>
                                <b class="color">☆</b>
                            <?php  
                            }
                            else{
                            ?>
                                <b >☆</b>
                            <?php
                            }
                        }
                    }
                  ?>
                </div>
                <div class="diffic info">
                    <span>Difficulté de la recette :</span>
                    <p><?php echo $info_recette['diff_recette'] ?></p>
                    <b> sur dix</b>
                </div>
                <div class="temp_preparation info">
                    <span>Temp de préparation :</span>
                    <p><?php echo $info_recette['temp_prepa'] ?></p>
                    <b>min</b>
                </div>
                <div class="temp_repo info">
                    <span>Temp de repos :</span>
                    <p><?php echo $info_recette['temp_repo'] ?></p>
                    <b>min</b>
                </div>
                <div class="temp_cuis info">
                    <span>Temp de cuisson :</span>
                    <p><?php echo $info_recette['temp_cuis'] ?></p>
                    <b>min</b>
                </div>  
                <div class="temp_total info">
                    <span>Temp total :</span>
                    <p><?php echo $info_recette['temp_prepa']+$info_recette['temp_cuis'] ?></p>
                    <b>min</b>
                </div>
                <div class="notation info">
                    <span>Notation :</span>
                    <p><?php if(isset($info_recette['note']))  echo ceil($info_recette['note']) ?></p>
                    <b>sur dix</b>
                </div>
                <div class="nb_calories info">
                    <span>Nombre de calories :</span>
                    <p><?php if(isset($info_recette['calorie']))  echo ceil($info_recette['calorie']) ?></p>
                    <b>cal. pour 100 g</b>
                </div>
                <div class="saisons info">
                    <span>Les saisons : </span>
                    <p>
                    <?php 
                        if(isset($info_recette['saisons'])){
                            foreach($info_recette['saisons'] as $saison){
                                echo $saison." - ";
                            }
                        }
                    ?>
                    </p>
                </div>
                <div class="ingredients info">
                    <span> Les ingredients :</span>
                    <ul>
                    <?php 
                        if(isset($info_recette['ingredients'])){
                            if(count($info_recette['ingredients'])!=0){
                                foreach($info_recette['ingredients'] as $ingredient){ ?>
                                    <li><?php echo $ingredient["nom_ingr"] ." : ".$ingredient["quantite"] ?></li>
                                <?php
                                }
                            }
                        }
                    ?>
                    </ul>
                </div>
                <div class="etapes info">
                    <span> Les etapes :</span>
                    <ul>
                    <?php 
                        if(isset($info_recette['etapes'])){
                            if(count($info_recette['etapes'])!=0){
                                foreach($info_recette['etapes'] as $etap){ ?>
                                    <li><?php echo $etap ?></li>
                                <?php
                                }
                            }
                        }
                    ?>
                    </ul>
                </div>
                <a href="<?php if(  isset($info_recette['lien_video'])   ){ echo $info_recette["lien_video"]; }else{ echo "#" ;} ?>" class="btn btn-primary my-5 w-25 info" style="margin-left: 65%;">Voir video </a>
            </div>
        </div>
    <?php 
    }   
    }
 
    public function affiche_categorie($data_categorie,$total_info){ ?>
        <div class="categorie">
            <div class="categorie_content">
                <?php 
                    $i=1;
                    foreach($data_categorie as $element):
                        $this->afficher_card($element,$total_info);
                        if($i==10) break;
                        $i++;
                    endforeach; ?>
            </div>
        </div>
      <?php   
    }
    
    public function affiche_categories($info_categories,$total_info){
        foreach($info_categories as $categorie => $categorie_recettes) { ?>
            <a class="nom_categorie" target="_blank" href="<?php echo LIEN_CATEGORIES.$categorie ?>"><?php echo $categorie ?></a>
            <?php $this->affiche_categorie($categorie_recettes,$total_info) ?>
          <?php
        }
    }

    public function afficher_footer(){ ?>
        <footer class="text-center text-white" style="background-color: #f1f1f1;margin-top:35px;">
            <div class="container pt-4">
                <section class="mb-4">
                    <ul class="row" style="list-style: none;">
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/"> Page d’accueil </a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/news/afficher_news"> News </a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/idee_recette/afficher_form_page"> Idées recette</a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/healthy/afficher_healthy_recettes"> Healthy</a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison="> Saisons</a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete="> Fêtes</a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/nutrition/afficher_ingredients"> Nutrition</a></li>
                        <li class="col text-decoration-none"><a href="http://localhost/Projet_TDW/public/contact/afficher_contact"> Contact</a></li>
                    </ul>
                </section>
            </div>
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright <a class="text-dark" href="#">ESI</a>
            </div>
        </footer>
        <?php
    }


    public function afficher_filtre(){?>
        <form class="filtres" id="filtres">
            <select class="form-select saison_filre" aria-label="Default select example">
                <option selected>Saison</option>
                <option value="hiver">Hiver</option>
                <option value="printemps">Printemps</option>
                <option value="été">Eté</option>
                <option value="automne">Automne</option>
            </select>
            <input type="number" class="form-control temp_prepa_filtr" placeholder=" Temp de préparation" aria-describedby="basic-addon1">
            <input type="number" class="form-control temp_cuis_filtr" placeholder=" Temp de cuisson" aria-describedby="basic-addon1">
            <input type="number" class="form-control temp_total_filtr" placeholder=" Temp total" aria-describedby="basic-addon1">
            <input type="number" class="form-control notation_filtr" placeholder=" Notation" aria-describedby="basic-addon1" min="1" max="10">
            <input type="number" class="form-control calories_filtr" placeholder=" Nombre de calories" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-primary filre" id="filtr"> Filtrer </button>
        </form>


        <form class="tries" id="tries">
            <select class="form-select type_tri" aria-label="Default select example">
                <option selected>Trier par </option>
                <option value="temp_prepa">Temp de préparation</option>
                <option value="temp_cuis">Temp de cuisson</option>
                <option value="temp_total">Temp total</option>
                <option value="calories">Nombre de calories</option>
                <option value="notation">Notation</option>
            </select>
            <select class="form-select ordre_tri" aria-label="Default select example">
                <option selected>Par ordre</option>
                <option value="croissant">Croissant</option>
                <option value="decroissant">Decroissant</option>
            </select>
            <button type="submit" class="btn btn-primary tri"> Trier </button>
        </form>
    <?php
    }

    


}
?>