<?php
    require_once '../Model/log.class.php';
    $log = new LogActions();
    $_SESSION['hash'] = $_GET['hash'];
    // var_dump($_SESSION['hash']);
    $log->checkIfSession();
    require_once 'header.php';
    require_once 'nav.php';

    ?>
    <main class="col-6 bg-light mx-0 p-0">
        <div class="bg-white border-bottom py-5 px-3">
                <div class="mainHeader mb-3">
                    <h2>Recherche</h2>
                    <!-- <?php var_dump($_SESSION['hash']); ?> -->
                </div>
                <hr>
        </div>

        <div id="tweets">
            <!-- <my-tweet username="Didier" displayname="Super" content="<my-tweet username='Hello' displayname='super'></my-tweet>"></my-tweet> -->

        </div>
    </main>

    <script src="../script/tweet/createTweetEl.js"></script>
    <script src="../script/tweet/tweetFetch.js"></script>
    <script src="../script/recherche/rechercheTweets.js"></script>


<?php
    require_once "footer.php";