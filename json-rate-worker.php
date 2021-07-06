<?php
include_once("connection.php");
$workeruid=$_GET["username"];
$rating=$_GET["rating"];
$rid=$_GET["rid"];
    $query1="update workers set total=total+'$rating',count=count+'1' where uid='$workeruid'";
$query2="delete from ratings where workeruid='$workeruid' and rid='$rid' ";
mysqli_query($dbCon,$query1);
mysqli_query($dbCon,$query2);
$msg=mysqli_error($dbCon);
if($msg=="")
    echo "ok";
else
    echo $msg;
?>