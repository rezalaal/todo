<?php

if($uri[2] == "new") {
    // add new task
    include 'new.php';
}else if($uri[2] == "update"){
    // update a task
}else if($uri[2] == "remove"){
    // delete a task
    include 'remove.php';
}else{
    // read 
}