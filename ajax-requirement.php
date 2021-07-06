<?php
include_once("connection.php");

$custuid=$_GET["uid"];
$category=$_GET["category"];
$problem=$_GET["problem"];
$location=$_GET["location"];
$city=$_GET["city"];
$query="insert into requirements(custuid,category,problem,location,city,dop) values ('$custuid','$category','$problem','$location','$city',curdate())";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
    echo "successful";
}
else
    echo $msg;
?>