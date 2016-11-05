<?php
require_once 'classes/AutenticaUsers.php';
$user = filter_input(INPUT_GET, 'user',FILTER_DEFAULT);
$pass = filter_input(INPUT_GET, 'pass',FILTER_DEFAULT);
$_token = filter_input(INPUT_GET, '_token',FILTER_DEFAULT);


//SE FOR USAR O METHOD POST
// $user = filter_input(INPUT_POST, 'user',FILTER_DEFAULT);
// $pass = filter_input(INPUT_POST, 'pass',FILTER_DEFAULT);
//$_token = filter_input(INPUT_POST, '_token',FILTER_DEFAULT);


$users = new AutenticaUsers($user, $pass, $_token);




// if($user == "TAFFAREL" and  $pass == 123):
//     echo json_encode(["status" => true, "msg"=>"Usuário logado com sucesso !"]);
// else:
//     echo json_encode(["status" => false, "msg"=>"Usuário não cadastrado !"]);
// endif;
