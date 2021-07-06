<?php

include_once("connection.php");
$uid=$_GET["uid"];
$mobile=$_GET["mobile"];
$pwd=$_GET["pwd"];
$category=$_GET["category"];

$query="insert into users (uid,pwd,mobile,dos,category)values('$uid','$pwd','$mobile',curdate(),'$category')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
    echo "signed up as ".$category." Please Log in";
else
    echo $msg;
?>