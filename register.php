<?php

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];

// Validation 
if(empty($username) || empty($password) || empty($confirmPassword)) {
    header("Location: register-form.php?error=All fields required.");
    exit();
}

if($password !== $confirmPassword) {
    header("Location: register-form.php?error=password not equal to confirm.");
    exit();
}

// TODO: check if user exists

$pdo = new PDO('sqlite:mydatabase.db');

// Construct the INSERT statement
$sql = "INSERT INTO users (id, username, password) VALUES (null, :username, :password)";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Execute the statement
$result = $stmt->execute();

if(!$result) {
    header("Location: register-form.php?error=registration failed.");
    exit();
}

header("Location: index.php");