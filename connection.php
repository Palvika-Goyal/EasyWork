<?php
//$dbCon=mysqli_connect("localhost","root","bce","newproject");
mysqli_connect("localhost","root","bce","newproject");
$msg=mysqli_connect_error();
if($msg=="")
    echo "Balle Balle";
else
    echo $msg;
?>