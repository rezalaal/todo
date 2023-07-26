<?php

$id = $_POST['id'];
$task = $_POST['task'];

// Validation 
if(empty($id) || empty($task)) {
    header("Location: edit-task-form.php?id={$id}&error=You should select an item.");
    exit();
}


$pdo = new PDO('sqlite:mydatabase.db');

// Construct the INSERT statement
$sql = "UPDATE tasks  SET task = :task WHERE id = :id";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':id', $id);
$stmt->bindParam(':task', $task);

// Execute the statement
$result = $stmt->execute();

if(!$result) {
    header("Location: edit-task-form.php?id={$id}&error=can not delete.");
    exit();
}

header("Location: index.php");