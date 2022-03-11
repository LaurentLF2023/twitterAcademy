<?php 
    require_once "../Model/log.class.php";
    $log = new LogActions();
    $log->checkIfSession();
    require_once "../Controller/profile/check_who_profile.php";
    require_once "header.php"; 
    require_once "nav.php";
?>

<div class="col-6 px-0 bg-light">
    <div class="card card-perso rounded-0" id="profile-card"></div>
    <?php 
            if (isset($_GET['p'])) {
                if ($_GET['p'] != $_SESSION['id']) {
                    
                } else {
                    echo '<button class="btn btn-primary m-auto" data-target="account-edit" id="edit-btn" onclick="myModal(this)">Éditer le profil</button>';
                }
            } else {
                echo '<button class="btn btn-primary m-auto" data-target="account-edit" id="edit-btn" onclick="myModal(this)">Éditer le profil</button>';
            }
        ?>

    <div id="tweets">
        <!-- Affichage des tweet -->
    </div>
</div>

<script src="../script/profile/profile.js"></script>
<script src="../script/tweet/createTweetEl.js"></script>
<script src="../script/tweet/tweetFetch.js"></script>
<script src="../script/tweet/profilTweets.js"></script>
<script src="../script/profile/updateProfil.js"></script>
<script src="../script/profile/modal.js"></script>

<?php require_once "footer.php";
