<?php 
    include_once("../functions/database.php"); 
    
    $sql="select * from product order by id desc  ";
    $result=mysql_query($sql,$con);
    $rows ="";
    while($row = mysql_fetch_assoc($result)){
        $rows[] = $row;   
    }

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/product.css">
</head> 
<body>
	<span class="main-title">商品列表</span>
	<form action="product_search.php" method="post">
         <input type="text"   placeholder="请输入品类名" name="name" > 
         <input type="submit" value="搜索">
    </form>
	<table class="table" border="0" width="100%"  cellpadding="0"> <!-- cellspacing="0"表格间隙为0 -->
        <tr class="thead">
            <th width="15%">商品名称</th>
            <th width="15%">商品单价</th>
            <th width="20%">商品描述</th>
            <th width="15%">商品图像</th>
            <th width="15%">所属类目</th>
            <th width="15%">操作</th>
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
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
	        <?php endforeach;?>
	     </tbody>
       
	</table>
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