<?php
require_once '../../Model/log.class.php';
$log = new LogActions();

$id_user = $_SESSION['id'];

require_once '../../Model/user.class.php';

$user = new User();
$profilPic = $user->updateProfilPic($id_user, $_FILES['profilPic']);
var_dump($profilPic);

