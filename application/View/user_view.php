<?php
class user_view extends view{
    public function afficher_login_page($message){?>
        <?php 
            if($message!="") echo "<div class='alert alert-danger mt-5 mb-5 w-50 mx-auto' role='alert'>".$message."</div>";
        ?>
        <div class="title">Login Page</div>
        <form id="form" method="POST" action="http://localhost/Projet_TDW/public/user/login">
            <div class="forme">
                <label> Username</label>
                <input type="text" name="email" id="email" required ><br>
                <label> Password</label>
                <input type="password" name="password" id="password" required><br>
                <button type="submit" id="send"> Sign in</button>
                <a class="inscription" href="http://localhost/Projet_TDW/public/user/afficher_inscription&message=">Inscription</a>
            </div>
        </form>
        <script>
            setTimeout(() => {
                $(".alert").hide();
            },3000);
        </script>
     <?php    
    }

    public function afficher_inscription_page($message){
        if($message!="") echo "<div class='alert alert-danger mt-5 mb-5 w-50 mx-auto' role='alert'>".$message."</div>";?>
        <div class="title">Registration Page</div>
        <form style="display: flex;flex-wrap:wrap;min-height:450px;" class="w-50 mx-auto"  action="http://localhost/Projet_TDW/public/user/inscription" method="post">
            <div class="col-5 me-5 mt-3">
                <label for="name">Nom</label>
                <input class="form-control" required type="text" id="name" name="name">
            </div>
            <div class="col-5 ms-3 mt-3">
                <label for="prenom" >Prenom</label>
                <input class="form-control" required type="text" name="prenom" id="prenom">
            </div>
            <div class="col-11 mt-3">
                <label for="email" >Email</label>
                <input class="form-control" required type="email" name="email" id="email">
            </div>
            <div class="col-5 me-5 mt-3">
                <label for="sexe" >Sexe</label>
                <select class="form-select" required id="sexe" name="sexe">
                    <option selected>Choissir le sexe</option>
                    <option value="m">Male</option>
                    <option value="f">Femelle</option>
                </select>
            </div>
            <div class="col-5 ms-3 mt-3">
                <label for="data_naissance" >Date de naissance</label>
                <input class="form-control" required type="date" name="data_naissance" id="data_naissance">
            </div>
            <div class="col-11 mt-3">
                <label for="password" >Mot de passe</label>
                <input class="form-control" required type="password" name="password" id="password">
            </div>
            <div class="col-11 mt-3">
                <label for="conf_password" >Confirmation de mot de passe</label>
                <input class="form-control" required type="password" name="conf_password" id="conf_password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary me-5 my-3 " style="float: right;">Envoyer </button>
            </div>
        </form>
        <script>
            setTimeout(() => {
                $(".alert").hide();
            },3000);
        </script>
      <?php
    }


    public function afficher_profile($recettes,$notations,$info_user){?>
        <div class="info_profile">
            <object data="<?php echo ROOTIMG?>logo2.svg"></object> 
            <div>
                <label>Nome et premon   :<?php echo " ".$info_user["nom_user"]." ".$info_user["prenom_user"]?></label>
                <label>Email    :<?php echo "  ".$info_user["email_user"]?></label>
                <label>Date de naissance    :<?php echo " ".$info_user["date_de_naissance"]?></label>
            </div>
        </div>
        <div class="titres">
            <label>Les recettes préféres :</label>
            <label>Les notations :</label>
        </div>
        <div class="note_prefere">
            <div class="recettes">
                <?php
                    foreach($recettes as $recette):
                        $this->afficher_card($recette,false);
                    endforeach;
                ?>
            </div>
            <div class="notations">
                <ol class="list-group list-group-numbered"><?php
                    foreach($notations as $notation){?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?php echo $notation["titre_recette"]?></div>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?php echo $notation["note"]?></span>
                        </li>
                      <?php 
                    }
                ?></ol>
            </div>
        </div>
      <?php
    }
}