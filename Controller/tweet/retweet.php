<?php

require_once "../../Model/tweet.class.php";
require_once "../../Model/log.class.php";
$log = new LogActions();

$id_user = $_SESSION['id'];
// $text_content = "Vivement le WE!";

$id_tweet = $_POST["id_tweet"];

$retweet = new tweet();
$retweet_post = $retweet->reTweet($id_tweet, $id_user);


if($retweet_post) {

    echo(json_encode(array(
        'result' => '1'
    )));
} else {
    
    echo(json_encode(array(
        'result' => '0'
    )));
}