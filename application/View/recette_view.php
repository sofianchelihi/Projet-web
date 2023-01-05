<?php
class recette_view extends view{
    public function afficher_recette($recette_info){ ?>
        <div class="recette"><?php
            $this->afficher_card($recette_info,true); ?>
        </div>
     <?php
    }
}