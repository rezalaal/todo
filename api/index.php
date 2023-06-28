<?php

// add the Access-Control-Allow-Origin header to the server's response.
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');

echo json_encode([
    'status' => true,
    'message' => 'This is a test',
]);