<?php

$name = "Reza";

$message = match($name) {
    "Reza" => "Hello Reza",
    "Ahmad" => "Hi Ahmad",
    "Hassan" => "Hassan",
    default => $name
};

echo $message;