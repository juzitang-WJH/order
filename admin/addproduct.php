<?php
    include_once("../functions/database.php"); 

     $result=mysql_query("select * from  category");
     $rows="";
     while($row=mysql_fetch_assoc($result)){
        $rows[]=$row;
    }
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href="css/product.css"/>
</head>
<body>
	<span class="main-title">添加商品</span>
	<form action="handle_addproduct.php" method="post" enctype="multipart/form-data">
	<table class="table1" border="1" width="50%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td width="20%" align="center" >商品名称</td>
	        <td style="padding-left: 2rem;"><input type="text" name="name" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >商品分类</td>
	        <td style="padding-left: 2rem;">
	           <select  name="cateid" size="1" style="width:100px;"> 
					<?php foreach($rows as $key=>$row):?>
		                <option value="<?=$row['category_id']?>">
		                    <?php echo $row['category_name'];?>
		                </option>
		            <?php endforeach;?>
			  </select>
	        </td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >商品价格</td>
	        <td style="padding-left: 2rem;"><input type="text" name="price" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >商品描述</td>
	        <td style="padding-left: 2rem;"><input type="text" name="describe" value=""/></td>
	    </tr>
	    <tr>
	        <td width="20%" align="center" >商品图像</td>
	        <td style="padding-left: 2rem;">
	          <input type="file" name="file" /> <!-- php默认的图片大小不能超过2M -->
	        </td>
	    </tr>
	</table>
    <input class="btn1" type="submit"  value="发布商品"  style="border:none;" />
   </form>
</body>
</html>
 