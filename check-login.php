<?php

$username = $_POST['username'];
$password = $_POST['password'];


// Validation 
if(empty($username) || empty($password) ) {
    header("Location: register-form.php?error=All fields required.");
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

$result = $stmt->fetch();

if($result == false) {
    header("Location: login-form.php?error=Invalid username or password.");
    exit();
}


$verify = password_verify($password, $result['password']);

if(!$verify) {
    header("Location: login-form.php?error=Invalid username or password.");
    exit();
}
// session
@session_start();
$_SESSION['isLogin'] =  true;
$_SESSION['user'] = $username;

header("Location: index.php");