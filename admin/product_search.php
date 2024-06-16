<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/product.css">
</head> 
<body>
	
<?php 
    include_once("../functions/database.php"); 
    $name=$_POST['name']; 
    $sql_p="select * from product,category  where product.category_id=category.category_id&&category.category_name like '%$name%'";
    $result=mysql_query($sql_p,$con);
    if(mysql_num_rows($result)>=1){  /* 获取select结果集的行数，如果行数大于等于1，则输出商品信息，否则提示错误 */
    $rows ="";
?>
   <span class="main-title">商品列表</span>
	<table class="table" border="0" width="95%"  cellpadding="0"> <!-- cellspacing="0"表格间隙为0 -->
        <tr class="thead">
            <th width="15%">商品名称</th>
            <th width="15%">商品单价</th>
            <th width="20%">商品描述</th>
            <th width="15%">商品图像</th>
            <th width="15%">所属类目</th>
            <th width="15%">操作</th>     
        </tr>
<?php 
    while($row = mysql_fetch_assoc($result)){
?>
      	 <tr align="center">               
	                <td><?php echo $row['name'];?></td>
	                <td><?php echo $row['price'];?></td>
	                <td style="overflow: hidden;white-space: nowrap;text-overflow:ellipsis;"><?php echo $row['description'];?></td>
	                <td><img style="width: 5rem;height:5rem;" src="<?=$row['icon'];?>"/></td>
	                <td>
	                <?php 
	                     $id=$row['category_id'];
	                     $sql_set="select * from category where category_id='$id'";
                         $result_set=mysql_query($sql_set,$con);
	                     $a=mysql_fetch_assoc($result_set);
	                     echo $a['category_name'];
	                ?>
	                </td>           
	                <td align="center">
		                <a  onclick="delproduct(<?php echo $row['id'];?>)">删除</a>
		                <a  onclick="editproduct(<?=$row['id']?>)">修改</a>
	                </td>
	            </tr>
	<?php 
	}
	?>
	 </table>
    <?php  	
    }
    else{
    	echo " 不存在该分类，查询不到数据！";

    }  
?>
	 
</body>

<script type="text/javascript">
	function delproduct(id){
			if(window.confirm("确认删除？")){
				window.location="handle_delproduct.php?id="+id;
			}
	}
    function editproduct(id){
        window.location="editproduct.php?id="+id;
    }
</script>
</html>