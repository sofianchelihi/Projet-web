<?php

class view{


    public function afficher_entete_haut($css,$title){ ?>
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="cache-control" content="no-cache" />
                <meta http-equiv="Pragma" content="no-cache" />
                <meta http-equiv="Expires" content="-1" />
                <title><?php echo $title?></title>
                <link rel="icon" href="<?php echo ROOTIMG?>logo2.svg">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                <link rel="stylesheet" href="<?php echo ROOTCSS.$css?>">
            </head>
            <body>
    <?php
    }




    public function afficher_entete_bas(){ ?>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </body>
        </html>
    <?php
    }




    public function afficher_menu(){ ?>
        <div class="divmenu">
            <div class="contact row">
                <div class="col-6">
                    <a href = "mailto: abc@example.com">Send Email</a>
                    <a href="tel:+213785652396">0785652396</a>
                </div>
                <div class="col-6">
                    <a href="#"><img  src="<?php echo ROOTIMG?>instagram.png" alt=""></a>
                    <a href="#"><img  src="<?php echo ROOTIMG?>facebook.png" alt=""></a> 
                    <a href="#"><img  src="<?php echo ROOTIMG?>telegram.png" alt=""></a>
                    <a href="#"><img  src="<?php echo ROOTIMG?>linkedin.png" alt=""></a>
                </div>
            </div>
            <div class="row w-100 menu">
                <div class="col-3"> 
                    <object data="<?php echo ROOTIMG?>logo2.svg"></object> 
                </div>
                <div class="col-8">
                    <ul class="row"> 
                        <li class="col text-center">
                            <a href="#">Page d’accueil</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">News</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Idées recette</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Healthy</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Saisons</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Fêtes</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Nutrition</a>
                        </li>
                        <li class="col text-center">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }

    public function afficher_card($info_recette){ ?>
        <div class="card" style="width: 8.5%;height:500px">
            <img src="<?php echo $info_recette['lien_image']  ?>" class="card-img-top cardImg" alt="Error">
            <div class="card-body">
                <h5 class="card-title" ><?php echo $info_recette['titre_recette']  ?></h5>
                <p><?php echo substr($info_recette['description'],0,100)."..."  ?></p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    <?php    
    }
 
    public function affiche_categorie($data_categorie){ ?>
        <div class="categorie">
            <div class="categorie_content">
                <?php 
                    $i=1;
                    foreach($data_categorie as $element):
                        $this->afficher_card($element);
                        if($i==10) break;
                        $i++;
                    endforeach; ?>
            </div>
        </div>
    <?php   
    }
    
    public function affiche_categories($info_categories,$liens){
        foreach($info_categories as $categorie => $categorie_recettes) { ?>
            <a class="nom_categorie" href="<?php echo $liens[$categorie] ?>"><?php echo $categorie ?></a>
            <?php $this->affiche_categorie($categorie_recettes) ?>
          <?php
        }
    }

    public function afficher_footer(){ ?>
        <footer class="text-center text-white" style="background-color: #f1f1f1;margin-top:35px">
            <div class="container pt-4">
                <section class="mb-4">
                    <ul class="row" style="list-style: none;">
                        <li class="col text-decoration-none"><a href="#"> Page d’accueil </a></li>
                        <li class="col text-decoration-none"><a href="#"> News </a></li>
                        <li class="col text-decoration-none"><a href="#"> Idées recette</a></li>
                        <li class="col text-decoration-none"><a href="#"> Healthy</a></li>
                        <li class="col text-decoration-none"><a href="#"> Saisons</a></li>
                        <li class="col text-decoration-none"><a href="#"> Fêtes</a></li>
                        <li class="col text-decoration-none"><a href="#"> Nutrition</a></li>
                        <li class="col text-decoration-none"><a href="#"> Contact</a></li>
                    </ul>
                </section>
            </div>
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright <a class="text-dark" href="#">ESI</a>
            </div>
        </footer>
        <?php
    }





}
?>