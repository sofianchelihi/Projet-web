<?php 
class idee_recette_view extends view{
    public function afficher_form($ingredients){ ?>
        <div class="form">
            <form class="ingr" id="ingr" >
                <input list="ingredients" id="send" type="text" required class="form-control input_ingr" placeholder="Ingredients">
                <datalist id="ingredients">
                    <?php
                        foreach($ingredients as $ingredient){?>
                            <option value="<?php  echo $ingredient["nom_ingr"] ?>">
                          <?php
                        }
                    ?>
                </datalist>
                <button type="submit" id="add" class="btn btn-primary"> Ajouter ingredient</button>
            </form>
            <span> Les ingredients :</span>
            <ul class="list-group list-group-flush ingredients"></ul>
            <div class="btns">
                <button type="button" class="btn btn-primary send" id="send"> Chercher les recettes</button>
                <button type="button" class="btn btn-secondary cancel"> Annuler</button>
            </div>
            <?php
                $this->afficher_filtre();
            ?>     
            <div class="recettes">
                
            </div>
        </div>
     <?php    
    }
}