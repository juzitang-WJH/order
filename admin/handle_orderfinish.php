<?php 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $sql="update orderlist set order_status='1' where order_id='$id'";
    $result=mysql_query($sql,$con);
    echo '该订单已完成！';
?>