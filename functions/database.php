<?php  
error_reporting(0);
// 连接服务器
@$con = mysql_connect("localhost","root","root"); //数据库服务器主机名，可以用IP代替 ;数据库服务器用户名;数据库服务器密码 
if (!$con){
    die("Could not connect: " . mysql_error());
}

// 连接数据库
$db_selected=mysql_select_db("resturant",$con);//数据库名
if(!$db_selected){
	die("Could not connect: " . mysql_error());
}

//修改编码
mysql_query("set names utf8",$con);