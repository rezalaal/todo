<?php
include 'connection.php';

$id = $uri[3];

$result = mysqli_query($conn, "DELETE FROM  `tasks` WHERE id='".$id."';");

if($result) {
    echo "deleted";
}else{
    echo "Can not delete";
}