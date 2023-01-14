<?php
class recette_view extends view{
    public function afficher_recette($recette_info){ ?>
        <div class="recette"><?php
            $this->afficher_card($recette_info,true); ?>
        </div><?php 
        if(isset($_SESSION['id']) && isset($_SESSION['token'])){ ?>
            <form class="row col-7 mx-auto" action="http://localhost/Projet_TDW/public/recette/noter_recette&id_recette=<?php echo $recette_info['id_recette']?>" method="post">
                <input name="note" required type="number" min="1" max="10" class="form-control mx-2 border border-primary" style="width: 53%!important;"> 
                <button type="submit" class="btn btn-primary col-2 me-2">Noter</button> 
                <?php  
                    require '../application/Controlleur/user.php';
                    $user = new user();
                    if($user->check_fav($recette_info['id_recette'],$_SESSION['id'])){?>
                        <a href="http://localhost/Projet_TDW/public/user/supprimer_de_fav&id_recette=<?php echo $recette_info['id_recette']?>" class="btn btn-warning col-2">Supprimer de favori</a><?php
                    }else{?>
                        <a href="http://localhost/Projet_TDW/public/user/ajouter_au_fav&id_recette=<?php echo $recette_info['id_recette']?>" class="btn btn-primary col-2">Ajouter au favori</a><?php  
                    }
                ?>
            </form>
         <?php
        }
    }
}