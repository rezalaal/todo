<?php


// echo $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

# /department/request/data
# explode
$uri = explode("/", $uri);

if($uri[1] == "tasks") {
    include './tasks/tasks.php';
}else{
    echo "Error 404 page not found";
}