<?php
session_start(); 
include_once("../functions/database.php"); 

@$username=$_POST["name"];
@$password=$_POST["password"];
@$checknum=$_POST["checknum"];
//用户名和密码不能为空
if($username==null){
	echo "<script>alert('请填写用户名！')</script>";
}else if($password==null){
	echo "<script>alert('请填写密码！')</script>";
}
else {
    $sql="select * from admin where admin_name='$username' ";
	$rs=mysql_query($sql,$con);
	if(mysql_num_rows($rs)>0){     //如果数据库内存在相同的用户名,行数就为1
	    $str=mysql_fetch_row($rs); //将查询到数据作为数组返回	
		$pwd=$str[2];             //密码在数组中的下标为1
		if($pwd==$password){   //如果密码一致，就跳转页面
			$_SESSION['name']=$username;
            header("location:admin_index.php");
			//echo "<script>alert('登录失败，密码不一致！')</script>";
		}
		else{
			echo "<script>alert('登录失败，密码不一致！')</script>";
		}
	}
	else {
		echo "<script>alert('用户名不存在，请先注册！')</script>";
	}
	
}
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/login.css" type="text/css"> 
</head>
<body>
   <div class="bg-img"></div> 
   <div class="position"> 
   <form action="admin_login.php" method="post" class="bg-color">
   <table width="100%" style="margin-left:20px">
    <tr>
    	<td  colspan="2" align="center">
    	<p style="font-weight:bold;font-size:20px;margin-top:20px;margin-right:40px ">后台登录</p>
    	</td>
    </tr>
    <tr>
    	<td align="right" height="60">用户名：</td>
    	<td height="60"><input type="text" name="name"><br></td>
    </tr>
    <tr>
        <td align="right"> 密  码：</td>
        <td><input type="password" name="password"><br></td>
    </tr>
   <tr> 
</tr>
    <tr>
        <td></td>
        <td height="60"><input type="submit" value="登录" class="btn" style="border:none"> 
        
        </td>
    </tr>
   </table>
   </form>
   </div>
</body>
</html>