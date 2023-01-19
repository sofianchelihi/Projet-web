<?php
class admin_page_view extends view_admin{
    public function afficher_page_admin(){?>
        <a href="http://localhost/Projet_TDW/njKMda/login_admin/deconnect" class="btn btn-primary deconnect">Deconnecter</a>      
        <div class="categories">
            <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_news" style="background-image: url(<?php echo ROOTIMG.'news.jpg';?>);">
                News
            </a>
            <a href="#" style="background-image: url(<?php echo ROOTIMG.'recettes.jpg';?>);">
                Recettes
            </a>
            <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users" style="background-image: url(<?php echo ROOTIMG.'users.png';?>);">
                Utilisateurs
            </a>
            <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_ingredients" style="background-image: url(<?php echo ROOTIMG.'nutrition.webp';?>);">
                Nutrition
            </a>
            <a href="#" style="background-image: url(<?php echo ROOTIMG.'setings.webp';?>);">
                Paramètres
            </a>
        </div>
      <?php
    }

    public function afficher_gestion_news($news){?>
        <div class="recette">
            <form action="http://localhost/Projet_TDW/njKMda/admin_page/add_new_recette" method="post">
                <input type="text" list="recettes" class="form-control" name="recette" required placeholder="Titre recette">
                <datalist id="recettes">
                    <?php
                        require '../application/Controlleur/recette.php';
                        $recettes_not_news = new recette();
                        $recettes=$recettes_not_news->get_recettes_not_news();
                        foreach($recettes as $recette){?>
                            <option value="<?php  echo $recette["id_recette"]."-".$recette["titre_recette"] ?>">
                          <?php
                        }
                    ?>
                </datalist>
                <button type="submit" class="btn btn-primary"> Ajouter recette</button>
            </form>
            <form action="http://localhost/Projet_TDW/njKMda/admin_page/add_new_news" method="post" enctype="multipart/form-data" >
                <input type="file" name="image_news" class="form-control" required accept="image/*" placeholder="Image news">
                <input type="text" class="form-control" name="titre_news" required placeholder="Titre">
                <textarea name="para_news" class="form-control" required placeholder="Description"></textarea>
                <button type="submit" class="btn btn-primary"> Ajouter new</button>
            </form>
        </div>
        <ol class="list-group list-group-numbered px-4 my-5">
            <?php
                foreach($news as $new){
                    if($new['titre_recette']!=null){ ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Recette</div>
                                <?php echo $new['titre_recette'] ?>
                            </div>
                            <span>
                                <a target="_blank" href="<?php echo LIEN_RECETTES.$new['id_recette'] ?>" class="btn btn-primary me-2 mt-1"> Voir plus </a>
                                <a href="http://localhost/Projet_TDW/njKMda/admin_page/sup_news&id_new=<?php echo $new['id_news'] ?>" class="btn btn-warning me-2 mt-1"> Supprimer </a>
                            </span>
                        </li>
                      <?php 
                    }else{?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">News</div>
                                <?php echo $new['titre_news'] ?>
                            </div>
                            <span>
                                <a target="_blank" href="<?php echo LIEN_NEWS.$new['id_news'] ?>" class="btn btn-primary me-2 mt-1"> Voir plus </a>
                                <a href="http://localhost/Projet_TDW/njKMda/admin_page/sup_news&id_new=<?php echo $new['id_news'] ?>" class="btn btn-warning me-2 mt-1"> Supprimer </a>
                            </span>
                        </li>
                      <?php
                    }
                }
            ?>
        </ol><?php
    }

    public function afficher_gestion_users($users){?>
        <form class="filtre_tri" action="http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users" method="post">
            <label class="lt">Filtrer par :</label>
            <div class="filtres">
                <select class="form-select" name="sexe">
                    <option selected value="">Pas de choix</option>
                    <option value="m">Male</option>
                    <option value="f">Femelle</option>
                </select>
                <input type="text" class="form-control" placeholder=" Nom" name="nom">
                <input type="text" class="form-control" placeholder=" Prenom" name="prenom">
                <input type="date" class="form-control" placeholder=" Date de naissance" name="date_de_naissance">
                <select class="form-select" name="valide">
                    <option selected value="">Pas de choix</option>
                    <option value="true">Valide</option>
                    <option value="false">Non valide</option>
                </select>
            </div>
            <label class="lt">Trier par :</label>
            <div class="tries">
                <select class="form-select" name="tri_par">
                    <option selected value="">Pas de choix</option>
                    <option value="nom_user">Nom</option>
                    <option value="prenom_user">Prenom</option>
                    <option value="date_de_naissance">Date de naissance</option>
                    <option value="sexe">Sexe</option>
                    <option value="valide">Validité</option>
                </select>
                <select class="form-select" name="tri_ordre">
                    <option selected value="ASC">Croissant</option>
                    <option value="DESC">Decroissant</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer et trier</button>
        </form>

        <ol class="list-group list-group-numbered px-4 my-5"><?php 
            foreach($users as $user){?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo $user["nom_user"]." ".$user["prenom_user"]?></div>
                        <?php echo $user["email_user"] ?>
                    </div>
                    <span>
                        <a target="_blank" href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_profile_user&id_user=<?php echo $user["id_user"]?>&token=<?php echo $user["token"]?>" class="btn btn-primary me-2 mt-1"> Voir profile </a><?php
                            if($user["valide"]){?>
                                <a href="http://localhost/Projet_TDW/njKMda/admin_page/invalider_user&id_user=<?php echo $user["id_user"]?>" class="btn btn-danger me-2 mt-1"> Invalider </a><?php
                            }else{?>
                                <a href="http://localhost/Projet_TDW/njKMda/admin_page/valider_user&id_user=<?php echo $user["id_user"]?>" class="btn btn-success me-2 mt-1"> Valider </a><?php
                            }
                        ?>
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/supprimer_user&id_user=<?php echo $user["id_user"]?>" class="btn btn-warning me-2 mt-1 sup"> Supprimer </a>
                    </span>
                </li>
              <?php 
            }
        ?></ol>
      <?php
    }

    public function afficher_gestion_ingredients($ingredients){?>
        <a href="http://localhost/Projet_TDW/njKMda/admin_page/page_ajouter_ingr" class="btn btn-primary ajouter"> Ajouter ingredients</a>
        <form class="filtres">
            <select class="form-select healthy_filtre">
                <option selected>Type</option>
                <option value="Healthy">Healthy</option>
                <option value="Not healthy">Not healthy</option>
            </select>
            <input type="number" class="form-control calorie_filtre" placeholder=" Nombre de calories">
            <input type="text" class="form-control nom_filtre" placeholder=" Nom ingredient">
            <button type="submit" class="btn btn-primary filre"> Filtrer </button>
        </form>


        <form class="tries">
            <select class="form-select tri">
                <option selected>Trier par </option>
                <option value="calorie">Nombre de calories</option>
            </select>
            <select class="form-select ordre">
                <option selected>Par ordre</option>
                <option value="croissant">Croissant</option>
                <option value="decroissant">Decroissant</option>
            </select>
            <button type="submit" class="btn btn-primary tri"> Trier </button>
        </form>

        <ol class="list-group list-group-numbered px-4 my-5"><?php 
            foreach($ingredients as $ingredient){?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold nom_ingr"><?php 
                            if($ingredient["healthy"]){
                                echo $ingredient["nom_ingr"]."<p class='healthy health'>Healthy </p>";
                            }else{
                                echo $ingredient["nom_ingr"]."<p class='not_healthy health'>Not healthy </p>";
                            }
                        ?></div>
                        <?php echo "<p class='calorie'>".$ingredient["calories"]."  <b>cal. pour cent g</b></p>" ?>
                    </div>
                    <span>
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/page_modifier_ingr&id_ingr=<?php echo $ingredient["id_ingr"]?>" class="btn btn-primary me-2 mt-1"> Modifier </a>
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/supprimer_ingr&id_ingr=<?php echo $ingredient["id_ingr"] ?>" class="btn btn-warning me-2 mt-1 sup"> Supprimer </a>
                    </span>
                </li>
              <?php 
            }
        ?></ol><?php
    }


    public function modifier_ingredient($info_ingr){
        $info_ingr=$info_ingr[0];?>
        <form class="row mx-4 my-5" action="http://localhost/Projet_TDW/njKMda/admin_page/modifier_ingr&id_ingr=<?php echo $info_ingr["id_ingr"] ?>" method="post">
            <div class="col-4 my-4">
                <label for="nom_ingr">Nom ingredient</label>
                <input class="form-control" type="text" name="nom_ingr" id="nom_ingr" value="<?php echo $info_ingr["nom_ingr"]?>">
            </div>

            <div class="col-2 my-4">
                <label for="calories">Nombre de calories</label>
                <input class="form-control" type="number" name="calories" id="calories" value="<?php echo $info_ingr["calories"]?>">
            </div>

            <div class="col-2 my-4">
                <label for="healthy">Healthy</label>
                <select class="form-select" id="healthy" name="healthy">
                    <option <?php if($info_ingr["healthy"]) {?> selected <?php }?> value="true">Healthy</option>
                    <option <?php if(!$info_ingr["healthy"]) {?> selected <?php }?> value="false">Not healthy</option>
                </select>
            </div>

            <div class="col-2 my-4">
                <label for="glucide">Glucide</label>
                <input class="form-control" type="number" name="glucide" id="glucide" value="<?php echo ceil( $info_ingr["glucide"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="lipide">Lipide</label>
                <input class="form-control" type="number" name="lipide" id="lipide" value="<?php echo ceil( $info_ingr["lipide"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="minéraux">Minéraux</label>
                <input class="form-control" type="number" name="minéraux" id="minéraux" value="<?php echo ceil( $info_ingr["minéraux"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminA">Vitamin A</label>
                <input class="form-control" type="number" name="vitaminA" id="vitaminA" value="<?php echo ceil( $info_ingr["vitaminA"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminB">Vitamin B</label>
                <input class="form-control" type="number" name="vitaminB" id="vitaminB" value="<?php echo ceil( $info_ingr["vitaminB"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminC">Vitamin C</label>
                <input class="form-control" type="number" name="vitaminC" id="vitaminC" value="<?php echo ceil( $info_ingr["vitaminC"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminD">Vitamin D</label>
                <input class="form-control" type="number" name="vitaminD" id="vitaminD" value="<?php echo ceil( $info_ingr["vitaminD"])?>">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminE">Vitamin E</label>
                <input class="form-control" type="number" name="vitaminE" id="vitaminE" value="<?php echo ceil( $info_ingr["vitaminE"])?>">
            </div>

            <p style="color: black;font-size:20px;font-weight:500;padding-left:25px;" class="my-5">les saisons</p>

            <div class="col-3 my-3">
                <label for="hiver">Hiver</label>
                <input <?php if( in_array("hiver",$info_ingr["saisons"]) ) {?> checked <?php }?>  class="form-check-input mt-1 mx-2" type="checkbox" id="hiver" name="hiver" value="1" >
            </div>

            <div class="col-3 my-3">
                <label for="printemps">Printemps</label>
                <input <?php if( in_array("printemps",$info_ingr["saisons"]) ) {?> checked <?php }?>  class="form-check-input mt-1 mx-2" type="checkbox" id="printemps" name="printemps" value="2" >
            </div>

            <div class="col-3 my-3">
                <label for="été">Eté</label>
                <input <?php if( in_array("été",$info_ingr["saisons"]) ) {?> checked <?php }?>  class="form-check-input mt-1 mx-2" type="checkbox" id="été" name="été" value="3" >
            </div>

            <div class="col-3 my-3">
                <label for="automne">Automne</label>
                <input <?php if( in_array("automne",$info_ingr["saisons"]) ) {?> checked <?php }?>  class="form-check-input mt-1 mx-2" type="checkbox" id="automne" name="automne" value="4">
            </div>

            <button type="submit" class="btn btn-primary my-5 w-25" style="margin-left: 60%;"> Envoyer </button>  
        </form>
      <?php
    }


    public function ajouter_ingredient(){?>
        <form class="row mx-4 my-5" action="http://localhost/Projet_TDW/njKMda/admin_page/ajouter_ingr" method="post">
            <div class="col-4 my-4">
                <label for="nom_ingr">Nom ingredient</label>
                <input required class="form-control" type="text" name="nom_ingr" id="nom_ingr">
            </div>

            <div class="col-2 my-4">
                <label for="calories">Nombre de calories</label>
                <input required  class="form-control" type="number" name="calories" id="calories">
            </div>

            <div class="col-2 my-4">
                <label for="healthy">Healthy</label>
                <select required class="form-select" id="healthy" name="healthy">
                    <option selected value="true">Healthy</option>
                    <option  value="false">Not healthy</option>
                </select>
            </div>

            <div class="col-2 my-4">
                <label for="glucide">Glucide</label>
                <input required  class="form-control" type="number" name="glucide" id="glucide">
            </div>

            <div class="col-2 my-4">
                <label for="lipide">Lipide</label>
                <input required  class="form-control" type="number" name="lipide" id="lipide">
            </div>

            <div class="col-2 my-4">
                <label for="minéraux">Minéraux</label>
                <input required  class="form-control" type="number" name="minéraux" id="minéraux">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminA">Vitamin A</label>
                <input required  class="form-control" type="number" name="vitaminA" id="vitaminA">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminB">Vitamin B</label>
                <input required  class="form-control" type="number" name="vitaminB" id="vitaminB" >
            </div>

            <div class="col-2 my-4">
                <label for="vitaminC">Vitamin C</label>
                <input required  class="form-control" type="number" name="vitaminC" id="vitaminC">
            </div>

            <div class="col-2 my-4">
                <label for="vitaminD">Vitamin D</label>
                <input required  class="form-control" type="number" name="vitaminD" id="vitaminD" >
            </div>

            <div class="col-2 my-4">
                <label for="vitaminE">Vitamin E</label>
                <input required  class="form-control" type="number" name="vitaminE" id="vitaminE">
            </div>

            <p style="color: black;font-size:20px;font-weight:500;padding-left:25px;" class="my-5">les saisons</p>

            <div class="col-3 my-3">
                <label for="hiver">Hiver</label>
                <input class="form-check-input mt-1 mx-2" type="checkbox" id="hiver" name="hiver" value="1" >
            </div>

            <div class="col-3 my-3">
                <label for="printemps">Printemps</label>
                <input class="form-check-input mt-1 mx-2" type="checkbox" id="printemps" name="printemps" value="2" >
            </div>

            <div class="col-3 my-3">
                <label for="été">Eté</label>
                <input class="form-check-input mt-1 mx-2" type="checkbox" id="été" name="été" value="3" >
            </div>

            <div class="col-3 my-3">
                <label for="automne">Automne</label>
                <input class="form-check-input mt-1 mx-2" type="checkbox" id="automne" name="automne" value="4">
            </div>

            <button type="submit" class="btn btn-primary my-5 w-25" style="margin-left: 60%;"> Envoyer </button>  
        </form>
      <?php
    }


}