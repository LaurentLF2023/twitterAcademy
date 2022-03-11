<?php
    require_once '../../Model/log.class.php';

    $log = new LogActions();

    $display_name = $_POST['display_name'];
    $about = $_POST['about'];
    $id_user = $_SESSION['id'];

    require_once '../../Model/user.class.php';

    $user = new User();
    $update = $user->updateUser($display_name, $about, $id_user);

    if($update) {
        echo(json_encode(array(
            'success' => 1
        )));
    } else{
        echo(json_encode(array(
            'success' => 0
        )));
    }
    
