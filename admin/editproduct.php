<?php 
    session_start(); 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $_SESSION['id']=$id;
    $sql="select * from product where id='$id'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);
    
    $a=mysql_query("select * from  category");
    $cate="";
    while($b=mysql_fetch_assoc($a)){
        $cate[]=$b;
    }

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>

</head>
<body>
	<span class="main-title">商品详情如下：</span>
	<form action="handle_editproduct.php" method="post" enctype="multipart/form-data">
	<table class="table1" border="1" width="80%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td width="20%" align="center" >商品名称</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >商品单价</td>
	        <td style="padding-left: 2rem;"><input type="text" name="price" value="<?php echo $row['price'];?>"/></td>
	    </tr>
	      <tr>
	        <td width="20%" align="center" >商品描述</td>
	        <td style="padding-left: 2rem;"><input type="text" name="describe" value="<?php echo $row['description'];?>"/></td>
	    </tr>
	      <tr>
	        <td width="20%" align="center" >商品图像</td>
	        <td style="padding-left: 2rem;">
	            <img style="margin:12px;width: 5rem;height: 5rem;" src="<?=$row['icon'];?>"/>
	            <input type="file" name="file" />
	        </td>
	    </tr>
	      <tr>
	        <td width="20%" align="center" >所属类目</td>
	        <td style="padding-left: 2rem;">
	          <select  name="category_id"  style="width:100px;">
					<?php foreach($cate as $key=>$b):?>
		                <option value="<?php echo $b['category_id']?>" 
		                <?php echo ($row['category_id']==$b['category_id'])?"selected":"";?>>
		                    <?php echo $b['category_name'];?>
		                </option>
		            <?php endforeach;?>
			   </select>
	        </td>
	    </tr>

	</table>
<input class="btn1" type="submit"  value="确定修改"   style="border:none" />
   </form>
</body>
</html>
