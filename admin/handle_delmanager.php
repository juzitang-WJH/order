<?php 
    /*ɾ������Ա*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $sql="delete from admin where id=$id";
    mysql_query($sql,$con);
    header("location:listmanager.php");

?>
