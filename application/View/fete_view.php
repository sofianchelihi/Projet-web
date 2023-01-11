<?php
class fete_view extends view{
    public function afficher_recette_de_fete($info_recettes){ ?>
       <div class="recettes">
            <?php
                foreach($info_recettes as $recette):
                    $this->afficher_card($recette,false);
                endforeach;
            ?>
       </div>
     <?php
    }

    public function afficher_filtre(){?>
        <div class="col-12 d-flex justify-content-center row mt-5 mb-2">
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=Achoura" class="col-1 ms-1"><button type="button" class="btn btn-outline-primary col-12">Achoura</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=Mouloud" class="col-1 ms-1"><button type="button" class="btn btn-outline-secondary col-12">Mouloud</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=Aïd el-Fitr" class="col-2 ms-1"><button type="button" class="btn btn-outline-success col-12">Aïd el-Fitr</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=Aïd el-Adha" class="col-2 ms-1"><button type="button" class="btn btn-outline-danger col-12">Aïd el-Adha</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=ramadan" class="col-1 ms-1"><button type="button" class="btn btn-outline-primary col-12">Ramadan</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=mariage" class="col-1 ms-1"><button type="button" class="btn btn-outline-secondary col-12">Mariage</button></a>
            <a href="http://localhost/Projet_TDW/public/fete/afficher_recette_de_fete&fete=circoncision" class="col-1 ms-1"><button type="button" class="btn btn-outline-success col-12">Circoncision</button></a>
        </div>
      <?php
    }
}