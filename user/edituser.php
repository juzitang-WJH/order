<?php 
    session_start(); 
    include_once("../functions/database.php"); 
    $user=$_SESSION['user'];
    $sql="select * from user where user_id='".$user['user_id']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="../css/message.css"/>
<link rel=stylesheet href="../css/header.css"/>
<script type="text/javascript">
function handle_edituser(){
    window.location="handle_edituser.php";
}
</script>
</head>
  <body>
    <div class="header" style="height: 5rem;line-height: 5rem;">
    <div class="left_header">
        <span class="content_title">中餐厅订餐系统</span>
    </div>
    <div class="right_menu">
        <span class="user">欢迎您，<?echo $user['name'];?></span>
        <a class="details" href="">我的资料</a>
        <a class="logout" href="user_loginout.php">退出登录</a>
    </div>
  </div>
 <div class="content" style="margin-left: 2rem;margin-top: 1rem;">
  <form action="handle_edituser.php" method="post">
   <span class="main-title">我的资料</span>
	<table class="table" border="1" width="50%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td width="20%" align="center" >用户姓名</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >用户密码</td>
	        <td style="padding-left: 2rem;"><input type="text" name="password" value="<?php echo $row['password'];?>"/></td> 
	    </tr> 
	    <tr>
	        <td width="20%" align="center" >用户性别</td>
	        <td style="padding-left: 2rem;"><input type="text" name="sex" value="<?php echo $row['sex'];?>"/></td> 
	    </tr> 
	    <tr>
	        <td width="20%" align="center" >用户地址</td>
	        <td style="padding-left: 2rem;"><input type="text" name="address" value="<?php echo $row['address'];?>"/></td> 
	    </tr> 
	    <tr>
	        <td width="20%" align="center" >用户地址</td>
	        <td style="padding-left: 2rem;"><input type="text" name="phone" value="<?php echo $row['phone'];?>"/></td> 
	    </tr> 
	</table>
   <input class="btn" type="submit"  value="确定修改"  style="border:none" />
   <button class="btn1" style="margin-left: 2rem;display: inline-block; border:none;" onclick="back()">返回上一页</button>
   </form>
   </div>

<script type="text/javascript"> 
function back(){
    window.location="user_message.php";
}
</script>
</body>
</html>
