<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

require_once '../../Model/tchating.class.php';


// if(isset($_POST['search'])){
//     $search = htmlspecialchars($_POST['search'].'%');

// }
// $id = $_SESSION['id'];

// $arrayChat = $tchatting->displayFriends($id);

// echo (json_encode(array(
//         'arrayChat' => $arrayChat
//     )));
    // var_dump($_POST);
    if(isset($_POST['message'])){
        $message = htmlspecialchars($_POST['message']);
        // var_dump($message);
        
        $id_from = '6';
        $id_to = '5';
        
        $chatting = new tchat();
        // var_dump($chatting);
        $sendmsg = $chatting->sendMessage($id_from,$id_to,$message);
        echo(json_encode(array(
           'sendMsg' => $sendmsg
       )));
    }

    
