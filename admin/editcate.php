<?php 
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $sql="select * from category where category_id='$id'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>

</head>
<body>
	<span class="main-title">分类详情如下：</span>
	<form action="handle_editcate.php" method="post">
	<table class="table1" border="2" width="50%">
	    <tr>
	        <td width="20%" align="center" >类目</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value="<?php echo $row['category_name'];?>"/></td>
	    </tr>

	</table>
<input class="btn" type="submit"  value="确定修改"   style="border:none" />
   </form>
</body>
</html>
