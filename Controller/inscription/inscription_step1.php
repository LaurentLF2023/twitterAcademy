<?php
require_once '../../Model/log.class.php';
    $log = new LogActions();

require_once '../../Model/user.class.php';

if(isset($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['birthdate'])){
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
         
    $userChecks = new User();
    $emailCheck = $userChecks->do_email_exists($email);
    if($emailCheck == false) {
        $ageCheck = $userChecks->checkAge($birthdate);
        if($ageCheck) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['birthdate'] = $birthdate;
            echo(json_encode(array(
                "sucess" => "1"
            )));
        } else {
            echo(json_encode(array(
                "age" => "0"
            )));

        }
    } else {
        echo(json_encode(array(
            "email" => "0"
        )));
    }
}