
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style/bootstrap-admin.css">
<link rel="stylesheet" href="css/product.css">
</head> 
<body>
<?php 
    include_once("../functions/database.php"); 
    $name=$_POST['name'];
    $sql="select * from  orderlist where user_name like '%$name%' ";
    $result=mysql_query($sql,$con);
    if(mysql_num_rows($result)>=1){ 
    $rows ="";
  
?>
	<span class="main-title">订单列表</span>
	<table class="table" border="0" width="100%" > 
        <tr class="thead">
                <th width="10%">订单编号</th>
                <th width="10%">用户昵称</th>
                <th width="10%">用户手机</th>
                <th width="15%">用户地址</th>
                <th width="8%">订单总金额</th>
                <th width="10%">订单状态</th> 
                <th width="15%">下单时间</th>
                <th width="10%">操作</th>
        </tr>
<?php 
    while($row = mysql_fetch_assoc($result)){
?>

	            <tr align="center">               
	                 <td><?php echo $row['order_id'];?></td> 
                     <td><?php echo $row['user_name'];?></td>
                     <td><?php echo $row['user_phone'];?></td>
                     <td><?php echo $row['user_address'];?></td>
                     <td><?php echo $row['total_price'];?></td>
                     <td><?php echo $row['order_status']==1?"已接":"未接";?></td>
                     <td><?php echo $row['create_time'];?></td>    
	                 <td align="center">
		                <a  onclick="orderDetail(<?=$row['order_id']?>,<?=$row['order_status']?>)">查看详情</a>
	                 </td>
	            </tr>
	<?php 
	}
	?>
	</table>
	   <?php  	
       }
    else{
    	echo " 不存在该用户，查询不到数据！";

    }
    ?>  
</body>

<script type="text/javascript">
function orderDetail(id,status){
    window.location="order_detail.php?id="+id+"&status="+status;
}
</script>
</html>