<?php

require_once "../../Model/tweet.class.php";
require_once "../../Model/log.class.php";
$log = new LogActions();

$id = $_SESSION['id'];
// $text_content = "Vivement le WE!";

$message = $_POST["message"];

// inserer la collection si il y a des images
// recupéré l'id de la collection rentré et le stocker
// stocker le path dans les assets 
// recupéré l'id des assets rentré et le stocker dans un tableau
// utiliser le tableaux pour rentrer les assets collection

$crea_tweet = new tweet();
$collectionId = null;
if($_FILES['image']['name'][0] != "" ) {
    $collectionId = $crea_tweet->addCollection();
    $assetsId = $crea_tweet->imageTreatment($_FILES['image'], $collectionId);
    // var_dump($assetsId);
    $asset_collection = $crea_tweet->addImagesCollection($assetsId,$collectionId);
}
$tweet_post = $crea_tweet->crea_tweet($id, $message, $collectionId);
$id_tweet = MyDatabase::$db->lastInsertId();
$hashtag_post = $crea_tweet->InsertHashtag($id_tweet, $message);






// ensuite, coder = if tweet post est "vrai", j'encode en json "ça s'est bien passé"*
if($tweet_post) {
    if(!$hashtag_post) {
        echo(json_encode(array(
            'hashtag' => '0'
        )));
    } else {
        echo(json_encode(array(
            'success'=>'1', 
        )));
    }
} else {
    echo(json_encode(array(
        'success'=>'0',
        
    )));
    
}
// si c'est faux, return message d'erreur