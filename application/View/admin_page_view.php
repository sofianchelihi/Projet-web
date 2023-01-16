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
            <a href="#" style="background-image: url(<?php echo ROOTIMG.'users.png';?>);">
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
                <input type="text" list="recettes" class="form-control" name="recette">
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
            <form action="" method="post">

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
}