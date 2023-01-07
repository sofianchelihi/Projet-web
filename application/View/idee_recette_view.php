<?php 
class idee_recette_view extends view{
    public function afficher_form(){ ?>
        <div class="form">
            <form class="ingr" >
                <input type="text" required class="form-control input_ingr" placeholder="Ingredients">
                <button type="submit" class="btn btn-primary"> Ajouter ingredient</button>
            </form>
            <span> Les ingredients :</span>
            <ul class="list-group list-group-flush ingredients"></ul>
            <div class="btns">
                <button type="button" class="btn btn-primary send"> Chercher les recettes</button>
                <button type="button" class="btn btn-secondary cancel"> Annuler</button>
            </div>
            <div class="recettes">
                
            </div>
        </div>
     <?php    
    }
}