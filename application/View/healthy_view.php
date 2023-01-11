<?php
class healthy_view extends view{
    public function afficher_healthy_recettes($info_recettes){
        ?>
            <div class="recettes">
                <?php
                    foreach($info_recettes as $recette):
                        $this->afficher_card($recette,false);
                    endforeach;
                ?>
            </div>
        <?php
    }
}