<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$data =  json_decode(file_get_contents('php://input'), true);

$mysql = new mysqli('localhost', 'root', '');
if($mysql->connect_errno != 0) {
    echo json_encode([
        'status' => False,
        'message' => 'Connection Error!',
    ]);
}
// Select database
$mysql->select_db("todo");

$query = "
    SELECT * FROM `users` WHERE username='".$data['username']."'
    and 
    password=SHA1('".$data['password']."');
";

$result = $mysql->query($query);

$row = $result->fetch_row();
// create random string for token 

if ($row == null) {
    echo json_encode([
        'status' => False,
        'message' => 'user not found',
    ]);
    exit();
    die();
}
$token = rand(0, 999999999999999);

$query = "UPDATE `users` SET token = '".$token."' WHERE id = '".$row[0]."'";

$result = $mysql->query($query);


echo json_encode([
    'status' => True,
    'message' => 'successfull',
    'token' => $token
]);