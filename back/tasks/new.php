<?php
include 'connection.php';

$task = $uri[3];

$result = mysqli_query($conn, "INSERT INTO `tasks` SET title='".$task."';");

if($result) {
    echo "Saved";
}else{
    echo "Can not save";
}