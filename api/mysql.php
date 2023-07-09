<?php

// CRUD = 
// Create , INSERT INTO todo ('title) VALUES('do homework')
// Read, SELECT  id,title FROM todo
// Update, UPDATE todo SET title='do my homeworks' WHERE id=1
// Delete , DELETE FROM todo WHERE id=1

// connection 

$mysql = new mysqli('localhost', 'root', '');

if($mysql->connect_errno != 0) {
    echo  "Connection error";
    exit();
}

// Select database
$mysql->select_db("todo");

$result = $mysql->query("SELECT * FROM tasks");

$rows = $result->fetch_all();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode([
    'status' => True,
    'message' => 'successfull',
    'tasks' => $rows
]);
