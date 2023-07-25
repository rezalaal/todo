<?php
@session_start();

$username = $_POST['username'];
$password = $_POST['password'];


// Validation 
if(empty($username) || empty($password) ) {
    header("Location: register-form.php?error=All fields required.");
    exit();
}


$pdo = new PDO('sqlite:mydatabase.db');

// Construct the INSERT statement
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the actual values to the named placeholders
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Execute the statement
$stmt->execute();

$result = $stmt->fetch();

if($result == false) {
    header("Location: login-form.php?error=Invalid username or password.");
    exit();
}

// session

$_SESSION['isLogin'] =  true;

header("Location: index.php");