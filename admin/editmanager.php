<?php 
    session_start();
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $sql="select * from admin where id='$id'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>
<script type="text/javascript">
function handle_editManager(){
    window.location="handle_editmanager.php";
}
</script>
</head>
<body>
	<span class="main-title">管理员详情如下：</span>
	<form action="handle_editmanager.php" method="post">
	<table class="table1" border="1" width="50%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td width="20%" align="center" >管理员姓名</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value="<?php echo $row['admin_name'];?>"/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >管理员密码</td>
	        <td style="padding-left: 2rem;"><input type="text" name="password" value="<?php echo $row['admin_password'];?>"/></td> 
	    </tr> 
	</table>
	<input class="btn1" type="submit"  value="确定修改" onclick="handle_editManager()"  style="border:none" />
	</form>
</body>
</html>

 
 
 