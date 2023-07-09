<?php

header('Access-Control-Allow-Origin: *');

echo json_encode([
    'status' => true,
    'message' => 'This is a test',
]);