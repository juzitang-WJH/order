<?php 
    /*修改用户信息*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_SESSION['id'];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $sex=$_POST["sex"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $sql="update user set name='$name',password='$password',sex='$sex',phone='$phone',address='$address' where user_id='$id'";
    mysql_query($sql,$con);
    echo "修改成功！";
?>
