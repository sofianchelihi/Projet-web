<?php
class categorie_view extends view{
    public function __construct(){}

    public function afficher_recettes($recettes,$total_info){ 
        ?>
        <div class="recettes">
        <?php
        foreach($recettes as $recette):
            $this->afficher_card($recette,$total_info);
        endforeach;
        ?>
        </div>
        <?php
    }

}
?>