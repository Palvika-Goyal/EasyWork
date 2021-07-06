<?php
include_once("connection.php");

include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$mobile=$_GET["mobile"];
$pwd=$_GET["pwd"];
$category=$_GET["category"];

$msg="Dear User for Id " .$uid."  !! Your password is " .$pwd;
$msg=SendSMS($mobile,$msg);
echo $msg;
?>