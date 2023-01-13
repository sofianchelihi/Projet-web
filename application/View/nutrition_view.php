<?php
class nutrition_view extends view{
    public function afficher_all_ingredients($ingredients){?>
        <div class="recettes"><?php
            foreach($ingredients as $ingredient){
                $this->afficher_ingredient($ingredient);
            }
        ?></div>
     <?php
    }


    public function afficher_ingredient($ingredient){?>
        <div class="cart">
            <h4 class="titre"><?php echo ucfirst( $ingredient["nom_ingr"]) ?></h4>
            <?php
                if($ingredient["healthy"]==true) echo "<h5 class='healthy'>Healthy</h5>";
                else echo "<h5 class='not_healthy'>Not Healthy</h5>";
            ?>
            <div>
                <span>Nombre de calorie :</span>
                <p><?php echo $ingredient["calories"] ." <b>cal. pour 100 g</b>"?></p>
            </div>
            <span>Informations nutritionnelles :</span><br>
            <ul>
                <li><?php echo "Glucide : ". $ingredient["glucide"] ." <b>g</b>" ?></li>
                <li><?php echo "Lipide : ". $ingredient["lipide"] ." <b>g</b>" ?></li>
                <li><?php echo "Minéraux : ". $ingredient["minéraux"] ." <b>g</b>" ?></li>
                <li><?php echo "Vitamin A : ". $ingredient["vitaminA"] ." <b>g</b>"  ?></li>
                <li><?php echo "Vitamin B : ". $ingredient["vitaminB"] ." <b>g</b>" ?></li>
                <li><?php echo "Vitamin C : ". $ingredient["vitaminC"] ." <b>g</b>" ?></li>
                <li><?php echo "Vitamin D : ". $ingredient["vitaminD"]  ." <b>g</b>" ?></li>
                <li><?php echo "Vitamin E : ". $ingredient["vitaminE"] ." <b>g</b>" ?></li>
            </ul>
            <span>Les saisons :</span><br>
            <p><?php
                foreach($ingredient["saisons"] as $saison){
                    echo $saison." - ";
                }
            ?></p>
        </div>
      <?php
    }
}