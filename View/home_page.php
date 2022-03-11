<?php
    require_once '../Model/log.class.php';
    $log = new LogActions();
    $log->checkIfSession();
    require_once 'header.php';
    require_once 'nav.php';
    ?>
    <main class ="col-6 bg-light mx-0 p-0">
        <div class="bg-white border-bottom py-5 px-3">
            <div class="mainHeader mb-3">
                <h2>Home</h2>
            </div>
            <hr>
            <form method="post" id="form" enctype="multipart/form-data">
                <div class="input-group">
                    <textarea class="form-control w-100 mb-2 pb-5 border-0" placeholder="Your tweet" name="message" onkeyup="countChars(this);" id="textAreaTweet" maxlength="280"></textarea>
                    <div class="possibilities d-flex">
                        <i class=" btn btn-violet bi bi-images" id="myFileInput" data-name="hiddenFileInput" data-toggle="tooltip" data-placement="bottom" title="Choisissez une image"></i>
                        <input type="file" class="form-control" id="hiddenFileInput" name='image[]' multiple hidden>
                        <div id="charNum" class="mx-2 d-flex align-items-end">0/280</div>
                    </div>
                </div>    
                <div id="fichier-container" class="my-2 d-flex"></div>
                <br>
                <input class="btn btn-violet float-end pt-2" id="submit" type="submit" value="Submit" >
            </form>
        </div>
        <div id="tweets">
            <!-- <my-tweet username="Didier" displayname="Super" content="Salut, ceci est mon tweet"></my-tweet> -->
        </div>

    </main>


    <script src="../script/form/validation_class.js"></script>
    <script src="../script/tweet/tweet.js"></script>
    <script src="../script/tweet/add_tweet.js"></script>
    <script src="../script/tweet/createTweetEl.js"></script>
    <script src="../script/tweet/tweetFetch.js"></script>
    <script src="../script/tweet/generateTweet.js"></script>

<?php
    require_once "footer.php";