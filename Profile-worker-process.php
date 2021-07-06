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

    $email=$_POST["txtEmail"];
    $wname=$_POST["txtName"];
    $cnumber=$_POST["txtMob"];
    $firmshop=$_POST["txtFirm"];
    $address=$_POST["txtAdd"];
    $city=$_POST["txtCity"];
    $stat=$_POST["state"];
    $category=$_POST["cat"];
    $spl=$_POST["txtSpc"];
    $exp=$_POST["experience"];
    $otherinfo=$_POST["txtInfo"];
     $hdn=$_POST["hdn"];
    $hdn2=$_POST["hdn2"];
    
    $orgName=$_FILES["aadharPic"]["name"];
    $tmpName=$_FILES["aadharPic"]["tmp_name"];
    $orgName2=$_FILES["profilePic"]["name"];
    $tmpName2=$_FILES["profilePic"]["tmp_name"];
    
    $query="insert into workers values('$uid','$email','$wname','$cnumber','$firmshop','$city','$address','$stat','$category','$spl','$exp','$otherinfo','$orgName','$orgName2','0','0')";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgName);
        move_uploaded_file($tmpName2,"uploads/".$orgName2);
        echo "<h2>Data Saved</h2>";
    }
    else
        echo $msg;
}
function doUpdate($dbCon)
{
    
    
     $uid=$_POST["txtUid"];

    $email=$_POST["txtEmail"];
    $wname=$_POST["txtName"];
    $cnumber=$_POST["txtMob"];
    $firmshop=$_POST["txtFirm"];
    $address=$_POST["txtAdd"];
    $city=$_POST["txtCity"];
    $stat=$_POST["state"];
    $category=$_POST["cat"];
    $spl=$_POST["txtSpc"];
    $exp=$_POST["experience"];
    $otherinfo=$_POST["txtInfo"];
    
     $hdn=$_POST["hdn"];
    $hdn2=$_POST["hdn2"];
    
    $orgName=$_FILES["aadharPic"]["name"];
    $tmpName=$_FILES["aadharPic"]["tmp_name"];
    $orgName2=$_FILES["profilePic"]["name"];
    $tmpName2=$_FILES["profilePic"]["tmp_name"];
    
    if($orgName=="")
    {
        $fileName=$hdn;
    }
    else
    {
        $fileName=$orgName;
        move_uploaded_file($tmpName,"uploads/".$orgName);
    }
    if($orgName2=="")
    {
        $fileName2=$hdn2;
    }
    else
    {
        $fileName2=$orgName2;
        move_uploaded_file($tmpName2,"uploads/".$orgName2);
    }
$query="update workers set email='$email',wname='$wname',cnumber='$cnumber',firmshop='$firmshop',address='$address',city='$city',stat='$stat',category='$category',spl='$spl',exp='$exp',otherinfo='$otherinfo',ppic='$fileName',apic='$fileName2' where uid='$uid'";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
        echo "Updated";
    else
        echo $msg;
    

}
?>