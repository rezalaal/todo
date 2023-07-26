<?php

$task = $_POST['task'];

// Validation 
if(empty($task)) {
    header("Location: index.php?error=Require task.");
    exit();
}


$pdo = new PDO('sqlite:mydatabase.db');

// Construct the INSERT statement
$sql = "INSERT INTO tasks (id, task) VALUES (null, :task)";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':task', $task);

// Execute the statement
$result = $stmt->execute();

if(!$result) {
    header("Location: index.php?error=add new task failed.");
    exit();
}

header("Location: index.php");