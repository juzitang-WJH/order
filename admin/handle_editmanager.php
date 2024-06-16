<?php 
      /*修改管理员信息*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_SESSION['id'];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $sql="update admin set admin_name='$name',admin_password='$password' where id='$id'";
    mysql_query($sql,$con);
    echo "修改成功！";
?>
