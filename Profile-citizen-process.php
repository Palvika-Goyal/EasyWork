<?php
include_once("connection.php");

$btn=$_POST["btn"];
if($btn=="Save")
    doSave($dbCon);
else
    doUpdate($dbCon);


function doSave($dbCon)
{
    
       $uid=$_POST["txtUid"];

    $name=$_POST["txtName"];
    $contact=$_POST["txtMob"];
    $address=$_POST["txtAdd"];
    $city=$_POST["txtCity"];
    $stat=$_POST["state"];
    $email=$_POST["email"];
    $orgName=$_FILES["profilePic"]["name"];
    $tmpName=$_FILES["profilePic"]["tmp_name"];
    
    $query="insert into citizens values('$uid','$name','$contact','$address','$city','$stat','$orgName','$email')";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgName);
        echo "<h2>Data Saved</h2>";
    }
    else
        echo $msg;
}
function doUpdate($dbCon)
{
        $uid=$_POST["txtUid"];

    $name=$_POST["txtName"];
    $contact=$_POST["txtMob"];
    $address=$_POST["txtAdd"];
    $city=$_POST["txtCity"];
    $stat=$_POST["state"];
    $email=$_POST["email"];
    $hdn=$_POST["hdn"];
    
    $orgName=$_FILES["profilePic"]["name"];
    $tmpName=$_FILES["profilePic"]["tmp_name"];
    if($orgName=="")
    {
        $fileName=$hdn;
    }
    else
    {
        $fileName=$orgName;
        move_uploaded_file($tmpName,"uploads/".$orgName);
    }
$query="update citizens set name='$name',contact='$contact',address='$address',city='$city',stat='$stat',pic='$fileName',email='$email' where uid='$uid'";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
        echo "Updated";
    else
        echo $msg;
    

}
?>