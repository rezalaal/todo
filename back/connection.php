<?php

$servername = "3c43cb4a0e98";
$username = "root";
$password = "root";
$dbname = "fakor";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



if (!mysqli_select_db($conn, $dbname)) {
    echo "Error selecting database: " . mysqli_error($conn);
}
