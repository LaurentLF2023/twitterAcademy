<?php
require_once "../../Model/log.class.php";
$log = new LogActions();

require_once "../../Model/tweet.class.php";
$tweet = new tweet();

// var_dump($_SESSION['hash']);
// var_dump("hello");

if(isset($_SESSION['hash'])) {
    $tag = "%#" .$_SESSION['hash'];
}
// var_dump($tag);


$results = $tweet->searchByHashtag($tag);


// var_dump($results);
echo(json_encode(array(
    'results' => $results
)));