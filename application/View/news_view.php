<?php
class news_view extends view{
    public function afficher_news($news){ ?>
        <div class="recettes"> <?php
            foreach($news as $new){
                $this->afficher_card($new,false);
            }
          ?>
        </div>
     <?php    
    }

    public function afficher_new($info_new){ ?>
        <div class="recettes"> <?php     
            $this->afficher_card($info_new,true); ?>
        </div>
     <?php
    }
}