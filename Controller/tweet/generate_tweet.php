<?php
require_once "../../Model/log.class.php";
$log = new LogActions();

require_once "../../Model/tweet.class.php";
$tweet = new tweet();

$reslttweet = $tweet->searchTweets();
$Retweets = $tweet->searchReTweets();
$profilpic = $tweet->profilPicarr();
$results = array_merge($reslttweet, $Retweets);
usort($results, function($a,$b) {
    return strtotime($b["creation_date"]) - strtotime($a["creation_date"]);
});


echo(json_encode(array(
    'results' => $results
)));

