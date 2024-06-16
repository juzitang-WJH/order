<?php 
    include_once("../functions/database.php"); 
    $id=$_GET['id'];
    $status=$_GET['status'];
    $sql="select * from  order_detail where order_id='$id'";
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

	<table class="table1" border="0" width="100%" > 
        <tr class="thead">
            <th width="6%">订单编号</th>
            <th width="6%">商品编号</th> 
            <th width="10%">商品名称</th>
            <th width="15%">下单数量</th>
            <th width="10%">商品单价</th>
            <th width="15%">商品图标</th>
            <th width="15%">下单时间</th>
                
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
	            <tr align="center">               
	                <td><?php echo $row['order_id'];?></td> 
                    <td><?php echo $row['product_id'];?></td> 
		            <td><?php echo $row['product_name'];?></td>
		            <td><?php echo $row['product_quantity'];?></td>
		            <td><?php echo $row['product_price'];?></td>
		            <td><div><img style="width: 4rem;height:4rem;"src="<?=$row['product_icon']?>"/></div></td>
		            <td><?php echo $row['create_time'];?></td>
	            </tr>
	        <?php endforeach;?>
	     </tbody>

       <?php if($status==0){?>
      <tr> 
            <td ><span class="total">订单总金额：<?php echo $row['total_price'];?></span></td> 
      </tr> 
      <tr> 
           <td><span class="total"><button class="btn1" style="border:none;"  onclick="order_finish(<?=$row['order_id']?>)">完成订单</button> </span> </td>
      </tr>
       <tr> 
            <td><span class="total"></span></td>
        </tr>  
       <?php }?>
       <?php if($status==1){?>
        <tr> 
            <td><span class="total">订单总金额：<?php echo $row['total_price'];?></span></td>    
        </tr>
        <tr> 
            <td><span class="total">该订单已完成  </span></td>
        </tr>
         <tr> 
            <td><span class="total"></span></td>
        </tr>
       <?php }?>
   	 </table>
</body>

<script type="text/javascript">
function order_finish(val){
    window.location="handle_orderfinish.php?id="+val;
}
</script>
</html>