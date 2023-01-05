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

    public function afficher_filtre(){?>
        <form class="filtres">
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
            <input type="number" class="form-control notation_filtr" placeholder=" Notation" aria-describedby="basic-addon1">
            <input type="number" class="form-control calories_filtr" placeholder=" Nombre de calories" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-primary filre"> Filtrer </button>
        </form>


        <form class="tries">
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