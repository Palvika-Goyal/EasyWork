<?php
session_start();

include_once("connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$query="select * from users where uid='$uid'and pwd='$pwd' and status='1'";
$table=mysqli_query($dbCon,$query);
 if($uid=="Admin" && $pwd=="admin")
    {
        echo "Admin";
    }
else if(mysqli_num_rows($table))
{
$result=mysqli_query($dbCon,$query);
    while($row=mysqli_fetch_array($result))
    {
         $_SESSION["activeuser"]=$uid;
        echo $row['category'];      
    }
}
    else
    echo "Invalid UserName or Password";
    
?>