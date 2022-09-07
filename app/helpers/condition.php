<?php 
    function _if($condition, $between, $else = null){
        if($condition){
            echo $between;
        }else{
            echo $else;
        }
    }
?>