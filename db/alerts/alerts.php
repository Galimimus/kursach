<?php
//function for checking $err for value and alerting $msg if $err is false
function alert_error($err, $msg){
    if(!$err){
        echo "<script>alert('$msg')</script>";
    }
}
?>