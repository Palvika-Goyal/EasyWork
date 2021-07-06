<?php
include_once("connection.php");
$custuid=$_GET["uid"];
$query="select * from requirements where custuid='$custuid'";
$table=mysqli_query($dbCon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
    
}
echo json_encode($ary);
?>