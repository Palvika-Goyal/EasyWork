<?php
$uid=$_GET["uid"];
include_once("connection.php");
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
if(mysqli_num_rows($table)==1)
    echo "Not Available";
else
    echo "Availabe";
?>