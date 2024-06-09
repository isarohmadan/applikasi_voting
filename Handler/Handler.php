<?php 

function customError($errno, $errstr) {
    if ($errno) {
        return [false,"$errstr",$errno];
    }
}
function customSuccess($code,$message){
        return [true,$message,$code];
}
?>