<?php
require_once '../../Model/log.class.php';
$log = new LogActions();

require_once '../../Model/tchating.class.php';


$convs = new tchat();

$id_from = $_SESSION['id'];
// $id_from = 1;
$last_conv = $convs->displayFriends($id_from);
//  var_dump($last_conv);
echo(json_encode(array(
    'last_conv' => $last_conv
)));
