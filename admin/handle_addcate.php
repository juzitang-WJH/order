<?php
   /*添加分类信息*/
    include_once("../functions/database.php"); 
    $name=$_POST["name"];
    if($name==''){
    	echo "添加失败，信息不能为空！";
    }
    else{
     $sql="insert into category values(null,'$name') ";
     mysql_query($sql,$con);
     echo "添加成功！";
    }
 
?>