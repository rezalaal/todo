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



$pdo = new PDO('sqlite:mydatabase.db');


// Construct the INSERT statement
$sql = "SELECT * FROM users WHERE username = :username";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':username', $username);

// Execute the statement
$stmt->execute();

$user = $stmt->fetch();

if($user) {
    header("Location: register-form.php?error=change username. username resolved.");
    exit();
}

// Construct the INSERT statement
$sql = "INSERT INTO users (id, username, password) VALUES (null, :username, :password)";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', password_hash($password, null));

// Execute the statement
$result = $stmt->execute();

if(!$result) {
    header("Location: register-form.php?error=registration failed.");
    exit();
}

header("Location: index.php");