<?php
class view_admin{
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
                <script src="<?php echo ROOTJQUERY?>"></script>
            </head>
            <body>
    <?php
    }


    public function afficher_entete_bas($js){ ?>
                <script src="<?php echo ROOTJS.$js?>"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            </body>
        </html>
    <?php
    }

    public function afficher_menu(){ ?>
        <div class="row w-100 menu">
            <div class="col-2"> 
                <object data="<?php echo ROOTIMG?>logo2.svg"></object> 
            </div>
            <div class="col-10">
                <ul class="row"> 
                    <li class="col text-center">
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_recette">Gestion des recettes</a>
                    </li>
                    <li class="col text-center">
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_news">Gestion des News</a>
                    </li>
                    <li class="col text-center">
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_page_gestion_users">La gestion des utilisateurs</a>
                    </li>
                    <li class="col text-center">
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_gestion_ingredients">Gestion de la nutrition</a>
                    </li>
                    <li class="col text-center">
                        <a href="http://localhost/Projet_TDW/njKMda/admin_page/afficher_parametres">Paramètres</a>
                    </li>
                    <li class="col text-center">
                        <a class="btn btn-primary" href="http://localhost/Projet_TDW/njKMda/login_admin/deconnect">Deconnecter</a>
                    </li>
                </ul>
            </div>
        </div>
      <?php
    }

    public function afficher_filtre(){?>
        <form class="filtres d-flex my-4" id="filtres">
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
            <input type="number" class="form-control notation_filtr" placeholder=" Notation" aria-describedby="basic-addon1" min="1" max="10">
            <input type="number" class="form-control calories_filtr" placeholder=" Nombre de calories" aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-primary filre" id="filtr"> Filtrer </button>
        </form>


        <form class="tries d-flex my-4" id="tries">
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