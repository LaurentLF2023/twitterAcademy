<?php
require_once '../../Model/log.class.php';
    $log = new LogActions();

require_once '../../Model/user.class.php';

if(isset($_POST['email'],$_POST['password'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    $user = new User;
    $emailCheck = $user->do_email_exists($email);

    if($emailCheck){
        $checkHash = $user->connexion($email,$password);

        if($checkHash){
        $log->logIn($checkHash);
            // $_SESSION['id'] = $checkHash;
            echo(json_encode(array(
                'connexion' => 'success'
            )));
        }else{
            echo(json_encode(array(
                'connexion' => 'failed'
            )));
        }
    }else{
        echo(json_encode(array(
            'emailMatch' => '0'
        )));
    }
}