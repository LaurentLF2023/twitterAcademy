<?php
require_once '../../Model/log.class.php';
    $log = new LogActions();

require_once '../../Model/tchating.class.php';


$activeChat = new tchat();
    
$id_from = $_SESSION['id'];
// $id_from = 6;
if(!empty($_POST['activeId'])){

    $activeId = $_POST['activeId'];
}

// $id_to   = $activeChat->displayFriends($id_from); //renvoi un tableau

// var_dump($id_to);
//il faut trouver l'id du correspondant dans la liste


if (!empty($activeId)){
    $result  = $activeChat->activeChat($id_from,$activeId);
}
if(!empty($result)){
    echo(json_encode(array(
        'result' => $result
    )));
}