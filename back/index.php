<?php

include 'connection.php';

$task = $_GET['task'];

$sql = "INSERT INTO tasks SET title='". $task . "'";
$result = $mysqli->query($sql);