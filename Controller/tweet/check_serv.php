<?php
    header("Content-Type: text/event-stream");
    header('Cache-Control: no-cache');

    require_once '../../Model/tweet.class.php';

    $checkSerId = new tweet();
    $result = $checkSerId->lastTweetId();
    // var_dump($result);

$time = date('r');
$hello = "salut";
echo "data: {$result['id']}\n\n";
flush();