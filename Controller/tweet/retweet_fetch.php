<?php

require_once "../../Model/log.class.php";
$log = new LogActions();

require_once "../../Model/tweet.class.php";
$tweet = new tweet();
$submit_array = json_decode($_POST['submit'], true);

$id = $submit_array['id'];



// var_dump($_POST);
$request = MyDatabase::$db->prepare("SELECT retweet.id, user.id as 'UserId', display_name, username, tweet.creation_date, tweet.content as 'content', path FROM retweet INNER JOIN tweet ON retweet.id_tweet = tweet.id INNER JOIN user ON tweet.id_user = user.id LEFT JOIN collection ON tweet.id_collection = collection.id LEFT JOIN asset_collection ON collection.id = asset_collection.id_collection LEFT JOIN asset ON asset_collection.id_asset = asset.id WHERE retweet.id = :idretweet");
$request->execute(array(
    "idretweet" => $id
));
$result = $request->fetch();
// var_dump($result);

echo(json_encode(array(
    "hello" => $result
)));