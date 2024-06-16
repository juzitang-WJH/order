<?php
  /*添加用户信息*/
    include_once("../functions/database.php"); 
  @  $name=$_POST["name"];
  @  $password=$_POST["password"];
  @  $sex=$_POST["sex"];
  @  $phone=$_POST["phone"];
  @  $address=$_POST["address"];
    if($name==''||$password==''||$sex==''||$phone==''||$address==''){
    	echo "添加失败，信息不能为空！";
    }
    else{
     $sql="insert into user values(null,'$name','$password','$sex','$phone','$address') ";
     mysql_query($sql,$con);
     echo "添加成功！";
    }
 
?>