<?php 
    /*ɾ������*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $sql="delete from category where category_id=$id";
    mysql_query($sql,$con);
    header("location:listcategory.php");

?>
