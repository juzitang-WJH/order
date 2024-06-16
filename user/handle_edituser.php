<?php 
    /*�޸��û�������Ϣ*/
    session_start(); 
    include_once("../functions/database.php"); 
    $user=$_SESSION['user'];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $sex=$_POST["sex"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $sql="update user set name='$name',password='$password',sex='$sex',phone='$phone',address='$address' where user_id='".$user['user_id']."'";
    mysql_query($sql,$con);
 
    $sql1="UPDATE orderlist set user_name='$name',user_phone='$phone',user_address='$address' where user_id='".$user['user_id']."'";
    mysql_query($sql1,$con);
    if(mysql_errno($con)!==0){
        die(mysql_error($con));
    }
     header("location:user_message.php");
 
?>
