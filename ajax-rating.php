<?php
include_once("connection.php");
$workeruid=$_GET["workeruid"];
$citizenuid=$_GET["citizenuid"];
$query="insert into ratings(citizenuid,workeruid) values ('$citizenuid','$workeruid')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);

if($msg=="")
    echo "successful";
else
    echo $msg;
?>