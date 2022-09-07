<?php

function format_size($bytes, $dec = 2){
    $sz = "BKMGTP";
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}