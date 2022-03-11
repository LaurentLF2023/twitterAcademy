<?php  

require_once '../../Model/log.class.php';

$log = new LogActions();

if(isset($_SESSION['getId'])) {
    $id = $_SESSION['getId'];
} else {
    $id = $_SESSION['id'];
}


require_once '../../Model/user.class.php';

$user = new User();
$get_infos = $user->get_user_info($id);

// var_dump($get_infos);
// check si l'id existe
echo(json_encode(array(
    'infos' => $get_infos
)));


// tableau comme un objet, js tableau associatif. 
// loop 

// $variable pour json.info
// for in 

