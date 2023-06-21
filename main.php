<?php

$number = 21;

function isEven($number) {
    $re = $number % 2;

    if ($re == 0) {
        return True;
    }else{
        return False;
    }
}

if(isEven($number)) {
    echo "This number is Even";
}
