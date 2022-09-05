<?php
function request_count($request_count){
    if(isset($request_count)){
        return $request_count;
    }else{
        return 0;
    }
}