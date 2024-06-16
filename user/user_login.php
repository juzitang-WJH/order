<?php
session_start();  //session是放在服务器端，而cookie是放在客户端
include_once("../functions/database.php"); 

@$username=$_POST["name"];
@$password=$_POST["password"];
@$checknum=$_POST["checknum"];

$sql_user="select * from user where name='$username' ";
$result=mysql_query($sql_user,$con);
$user1= mysql_fetch_assoc($result);
//用户名和密码不能为空
if($username==null){
	echo "<script>alert('请填写用户名！')</script>";
}else if($password==null){
	echo "<script>alert('请填写密码！')</script>";
}
else if($checknum==null){
	echo "<script>alert('请填写验证码！')</script>";
}
else {
    $sql="select * from user where name='$username' ";
	$rs=mysql_query($sql,$con);
	if(mysql_num_rows($rs)>0){     //如果数据库内存在相同的用户名,行数就为1
	    $str=mysqli_fetch_row($rs); //将查询到数据作为数组返回	
		$pwd=$str[2];             //密码在数组中的下标为1
 		$num=$_SESSION['checknum'];
		if($pwd==$password&&$num==$checknum){   //如果密码一致，就跳转页面
			$_SESSION['user']=$user1;
	
            header("location:main.php");
		}
		else if($pwd!=$password){
			echo "<script>alert('登录失败，密码不一致！')</script>";
		}
		else {
			echo "<script>alert('登录失败，验证码不一致！')</script>";
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
   <form action="user_login.php" method="post" class="bg-color">
   <table width="100%" style="margin-left:20px">
    <tr>
    	<td  colspan="2" align="center">
    	<p style="font-weight:bold;font-size:20px;margin-top:20px;margin-right:20px ">欢迎登录</p>
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
   <td align="right" height="60">验证码：</td>
   <td height="60"><input type="text" name="checknum" size="6"/>
		<?php
		$checknum  = "";//双引号代表字符串，单引号代表字符
		$checknum .= mt_rand(0,9);//产生一个0-9之间的随机数
		$checknum .= mt_rand(0,9);
		$checknum .= mt_rand(0,9);
		$checknum .= mt_rand(0,9);
		$_SESSION['checknum'] = $checknum;
		echo $checknum;
		?>
	</td>
</tr>
    <tr>
        <td></td>
        <td><input type="submit" value="登录" class="btn" style="border:none"> 
        <a href="user_register.php"><span style="margin-left:10px">点此注册</span></a>
        </td>
    </tr>
   </table>
   </form>
   </div>
</body>
</html>
