<?php

$id = $_GET['id'];

// Validation 
if(empty($id)) {
    header("Location: index.php?error=You should select an item.");
    exit();
}


$pdo = new PDO('sqlite:mydatabase.db');

// Construct the INSERT statement
$sql = "DELETE FROM tasks WHERE id = :id";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':id', $id);

// Execute the statement
$result = $stmt->execute();

if(!$result) {
    header("Location: index.php?error=can not delete.");
    exit();
}

header("Location: index.php");