<?php
require_once "header.php";
?>

<!-- A METTRE DANS inscription 2 :
username (en gras, sera unique)
display_name (nom qui commence par @)
telephone
password 
password confirmé
about (biopic)
theme 
banner
profile_pic
METTRE TT CEUX QUI PEUVENT PAS ETRE NULL. ON LES MET PAS, on le mettra que sur le compte après
-->
<body>
<div class="card bg-light" style="width: 36rem;">
  <img src="../assets/pic_inscript2.png" class="card-img-top" alt="...">
    <div class="card-body">
        <div>
            <h5 class="card-title mt-2 text-center" id="card-title">INSCRIPTION</h5><hr>
            <p class="card-text">Remplis ces champs afin de terminer ton inscription à la Tweet Academy.</p>
        </div>
                <form id="register" action="../Controller/inscription/inscription_step2.php" method='POST'>
                    <!--mettre un titre ici -->
                    <input class="form-control mb-4" type="text" name="username" placeholder="Nom d'utilisateur">
                    <label for="form-control">Pseudo que vous souhaitez vous attribuer</label>
                    <input class="form-control mb-4" type="text" name="display_name" placeholder="Pseudo affiché">
                    <input class="form-control mb-2" type="password" id="password" name="password" placeholder="Mot de passe">
                    <input type="checkbox" class="pwd" data-target="#password"> Afficher le mot de passe
                    <input class="form-control mb-2 mt-4" type="password" id="password2" name="password2" placeholder="Mot de passe">
                    <input type="checkbox" class="pwd" data-target="#password2"> Afficher le mot de passe
                    <br>
                    <div class="container d-flex justify-content-center">
                        <input type="submit" class="btn btn-violet w-50 my-5" value="Go !">
                    </div>
                </form>
    </div>

    <script src="../script/form/showpwd.js"></script>
    <script src="../script/form/validation_class.js"></script>
    <script src="../script/inscription/inscriptionStep2.js"></script>


</body>
</html>