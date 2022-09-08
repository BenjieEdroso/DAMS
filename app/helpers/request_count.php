<?php
function request_count($request_count){
    if(isset($request_count)){
        return $request_count;
    }else{
        $request_count = 0;
        return $request_count;
    }
}