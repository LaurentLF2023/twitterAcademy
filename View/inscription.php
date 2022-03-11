<?php
    require_once("header.php")
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-7">
            <div class="card m-4">
                <div class="card-body m-3">
                    <div>
                        <h5 class="card-title" id="card-title">INSCRIS-TOI SUR LA TWEET ACADEMY</h5>
                        <p class="card-text">Créé ton compte et accède au plus grand réseau de tweets au monde ! Au monde de la W@C, bien sûr.</p>
                    </div>

                    <form class="subscribe_form" method='POST'>
                        <div class="subscribe">
                            <input class="form-control w-50"type="text" name="lastname" id="lastname"  placeholder="Nom"    >
                        </div>
                        <br>
                        <div class="subscribe">
                            <input class="form-control w-50" type="text" name="firstname" id="firstname" placeholder="Prénom">
                        </div>
                        <br>
                        <div class="subscribe">
                            <input class="form-control w-50" type="email" name="email" id="email" placeholder="Email">
                        </div>
                        <br>
                        <div class="subscribe">
                            <label for="birthdate">Date de naissance :</label>   
                            <input class="form-control w-50" type="date" name="birthdate" id="birthdate">
                        </div>
                        <br>
                        <div>
                            <input class="btn btn-violet text-white" type="submit" value="JE M'INSCRIS">
                        </div>
                        <br>
                    </form>
    
                    <div class="card-body rounded bg-light">
                        <h5 class="card-title">CONNEXION</h5>
                        <p class="card-text">Tu as déjà un compte Tweet? Connecte toi.</p>
                        <a href="connexion.php" class="btn btn-violet text-white">JE ME CONNECTE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 our-image">
        </div>
    </div>
</div>

<script src="../script/form/validation_class.js"></script>
<script src="../script/inscription/inscriptionStep1.js"></script>

</body>