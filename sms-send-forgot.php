<?php
include_once("SMS_OK_sms.php");
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$row=mysqli_fetch_array($table);
if($row)
{
    $pwd=$row["pwd"];
    $mobile=$row["mobile"];
    $msg="Dear Customer! Your password for Mps.com is".$pwd;
    $msg=SendSMS($mobile,$msg);
    echo "Message sent";
}
else
    echo "Please Check your details";

?>