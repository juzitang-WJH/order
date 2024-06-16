<?php
   /*修改分类 信息*/
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_SESSION['id'];
    $name=$_POST["name"];
    $sql="update category set category_name='$name' where category_id='$id'";
    mysql_query($sql,$con);
    echo "修改成功";
?>