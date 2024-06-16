 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>
</head> 
<body>
	<span class="main-title">添加用户：</span>
	<form action="handle_adduser.php" method="post" >
	<table class="table1" border="1" width="50%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td width="20%" align="center" >姓名</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >密码</td>
	        <td style="padding-left: 2rem;"><input type="text" name="password" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >地址</td>
	        <td style="padding-left: 2rem;"><input type="text" name="address" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >手机号</td>
	        <td style="padding-left: 2rem;"><input type="text" name="phone" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >性别</td>
	        <td style="padding-left: 2rem;"><input type="radio" name="sex" value="男">男
            <input type="radio" name="sex" value="女">女<br></td>
	    </tr>

	</table>
    <input class="btn1" type="submit"  value="确定添加"   style="border:none;" />
   </form>
</body>
</html>
 