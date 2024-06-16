<?php
   /*添加管理员信息*/
    include_once("../functions/database.php"); 
    $name=$_POST["name"];
    $password=$_POST["password"];
    if($name==''||$password==''){
    	echo "添加失败，信息不能为空！";
    }
    else{
     $sql="insert into admin values(null,'$name','$password') ";
     mysql_query($sql,$con);
     echo "添加成功！";
    }
 
?>