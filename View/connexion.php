<?php
    require_once("header.php")
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card m-4">
                    <div class="card-body m-3">
                        <div>
                            <h5 class="card-title" id="card-title">CONNECTE-TOI SUR LA TWEET ACADEMY</h5>
                        </div>
                        <form class="sign_up_form" action="../Controller/connexion/connect_step.php" method='POST'>
                            <br>
                            <div class="sign_up">
                                <input class="form-control w-50" type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <br>
                            <input class="form-control w-50 mb-2" type="password" id="password" name="password" placeholder="Mot de passe">
                            <input type="checkbox" class="pwd" data-target="#password"> Afficher le mot de passe
                            <div>
                                <input class="btn btn-violet text-white mt-4" type="submit" value="JE ME CONNECTE">    
                            </div>
                            <div>
                                <a href="inscription.php" class="btn btn-violet text-white mt-4">INSCRIPTION</a>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../script/connexion/connexion.js"></script>
    <script src="../script/form/validation_class.js"></script>
    <script src="../../script/form/showpwd.js"></script>
</body>
