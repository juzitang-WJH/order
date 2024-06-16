<?php 
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $sql="select * from user where user_id='$id'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>
<script type="text/javascript">
function handle_edituser(){
    window.location="handle_edituser.php";
}
</script>
</head>
<body>
	<span class="main-title">用户详情如下：</span>
	<form action="handle_edituser.php" method="post">
	<table class="table1" border="2" width="50%">
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
	        <td width="20%" align="center" >用户电话</td>
	        <td style="padding-left: 2rem;"><input type="text" name="phone" value="<?php echo $row['phone'];?>"/></td> 
	    </tr> 
	</table>
<input class="btn" type="submit"  value="确定修改" onclick="handle_edituser()"  style="border:none" />
   </form>
</body>
</html>
