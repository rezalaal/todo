<?php

$data = json_decode(file_get_contents('php://input'), true);
// add the Access-Control-Allow-Origin header to the server's response.
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
http_response_code(200);
header('Content-Type: application/json');

echo json_encode([
    'status' => true,
    'message' => rand($data['min'], $data['max'])
]);