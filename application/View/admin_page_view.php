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
            <a href="#" style="background-image: url(<?php echo ROOTIMG.'nutrition.webp';?>);">
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
}