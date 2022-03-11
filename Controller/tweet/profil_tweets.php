
<?php
require_once "../../Model/log.class.php";
$log = new LogActions();

if(!empty($_SESSION['getId'])) {
    $id = $_SESSION['getId'];
} else {
    $id = $_SESSION['id'];
}

require_once "../../Model/tweet.class.php";
$tweet = new tweet();
// var_dump($id);
$reslttweet = $tweet->searchTweets($id);
// var_dump($reslttweet);
$Retweets = $tweet->searchReTweets($id);
$results = array_merge($reslttweet, $Retweets);
// var_dump($results);
usort($results, function($a,$b) {
    return strtotime($b["creation_date"]) - strtotime($a["creation_date"]);
});


unset($_SESSION['getId']);
echo(json_encode(array(
    'results' => $results
)));