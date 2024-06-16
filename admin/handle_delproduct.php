<?php 
  /*ɾ����Ʒ*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $sql="delete from product where id='$id'";
    mysql_query($sql,$con);
    header("location:listproduct.php");

?>
