<?php
class saison_view extends view{


    public function afficher_filtre(){ ?>
        <div class="col-12 d-flex justify-content-center row mt-5 mb-2">
            <a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison=hiver" class="col-2 ms-1"><button type="button" class="btn btn-outline-primary col-12">Hiver</button></a>
            <a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison=printemps" class="col-2 ms-1"><button type="button" class="btn btn-outline-secondary col-12">Printemps</button></a>
            <a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison=été" class="col-2 ms-1"><button type="button" class="btn btn-outline-success col-12">Eté</button></a>
            <a href="http://localhost/Projet_TDW/public/saison/afficher_recette_of_saison&saison=automne" class="col-2 ms-1"><button type="button" class="btn btn-outline-danger col-12">Automne</button></a>
        </div>
      <?php
    }


    public function afficher_recette_of_saison($info_recettes){ ?>
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