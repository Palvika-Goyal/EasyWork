<?php

include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$result=mysqli_query($dbCon,$query);
while($row=mysqli_fetch_array($result))
{
    echo $row['pwd'];
}
?>