<?php
class page_accueil_view extends view{

    
    public function afficher_diaporama($diaporama){ ?>
        <div class="slider">
            <div class="diaporama">
                <?php foreach($diaporama as $element): ?>
                    <div class="slide">
                        <object data="<?php echo $element['lien_image'] ?>" width="100%" height="600px"></object>
                        <a href="<?php echo $element['lien_description'] ?>"><button> Voir plus </button></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>        
    <?php  
    }
}
?>