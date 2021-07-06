<?php
include_once("connection.php");
$workeruid=$_GET["workeruid"];

$query="update workers set total=total+'66' where uid='$workeruid'";
mysqli_query($dbCon,$query);
//mysqli_query($dbCon,$query2);
$msg=mysqli_error($dbCon);
if($msg=="")
    echo "Doone";
else
    echo $msg;
?>
