<?php
include_once("connection.php");
$citizenuid=$_GET["uid"];
$query="select * from ratings where citizenuid='$citizenuid'";
$table=mysqli_query($dbCon,$query);
$ary=array();
while ($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
