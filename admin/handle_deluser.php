<?php 
    /*ɾ���û�*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $sql="delete from user where user_id='$id'";
    mysql_query($sql,$con);
    header("location:listuser.php");

?>
