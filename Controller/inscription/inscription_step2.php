<?php
require_once '../../Model/log.class.php';
    $log = new LogActions();

require_once '../../Model/user.class.php';
if(isset($_POST['username'], $_POST['display_name'], $_POST['password'], $_POST['password2'])) {
    $username = htmlspecialchars($_POST['username']);
    $display_name = htmlspecialchars($_POST['display_name']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $email = $_SESSION['email'];
    $birthdate = $_SESSION['birthdate'];

    // echo $username;
    // echo $display_name;
    // echo $password;
    // echo $password2;

    $sign_in = new User();
    $check_similar_pwd = $sign_in->check_similar_pass($password, $password2);
    $check_user_exist = $sign_in->do_user_exists($username);
    if($check_user_exist) {
        echo(json_encode(array(
            'newUser' => 'exist'
        )));
    } else {
        if($check_similar_pwd) {
            $insert_into_bdd = $sign_in->add_user_to_db($display_name, $username, $email, $password, $birthdate, $firstname, $lastname);
            if($insert_into_bdd) {
                $log->destroyyy();
                echo(json_encode(array(
                    'newUser' => 'success' // get_info
                )));
            } else {
                echo(json_encode(array(
                    'newUser' => 'failed'
                )));
            }
        } else {
            echo(json_encode(array(
                'pwdMatch' => 'no'
            )));
        }
    }
}
     
