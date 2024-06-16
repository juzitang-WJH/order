<?php 
    include_once("../functions/database.php"); 
    $sql="select * from  orderlist order by order_id desc";
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
	<span class="main-title">订单列表</span>
	<form action="order_search.php" method="post">
         <input type="text"   placeholder="请输入用户名" name="name" > 
         <input type="submit" value="搜索">
    </form>

	<table class="table" border="0" width="100%" > <!-- cellspacing="0"表格间隙为0 -->
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
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
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
	        <?php endforeach;?>
	     </tbody>
       
	</table>
</body>

<script type="text/javascript">
function orderDetail(id,status){
    window.location="order_detail.php?id="+id+"&status="+status;
}
</script>
</html>