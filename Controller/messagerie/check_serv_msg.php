<?php
    header("Content-Type: text/event-stream");
    header('Cache-Control: no-cache');
    require_once '../../Model/tchating.class.php';

    require_once '../../Model/log.class.php';
    $log = new LogActions();
    $log->checkIfSession();

    // var_dump($log);


    $myId = $_SESSION['id'];
    // var_dump($myId);
    // $myId = 6;

    $checkServId = new tchat();

    $result = $checkServId->checkLast($myId);
    if ($result == false){
        $result = [];
        echo "data:{$result}\n\n";
    }else{

        echo "data: {$result['id']}\n\n";
        flush();
    }
// var_dump(($result));
// $time = date('r');
// $hello = "salut";
// echo "data: {$_SESSION}\n\n";