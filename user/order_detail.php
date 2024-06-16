<?php 
    session_start();
    include_once("../functions/database.php");
    $user=$_SESSION['user']; 
    $id=$_GET['id'];
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
<link rel=stylesheet href="../css/message.css"/>
<link rel=stylesheet href="../css/header.css"/>
</head> 
<body>
  <div class="header" style="height: 5rem;line-height: 5rem;">
    <div class="left_header">
        <span class="content_title">中餐厅订餐系统</span>
    </div>
    <div class="right_menu">
        <span class="user">欢迎您，<?echo $user['name'];?></span>
        <a class="details" href="main.php">首页</a>
        <a class="logout" href="user_loginout.php">退出登录</a>
    </div>
  </div>
	<table class="table1" border="0" width="80%" > 
        <tr class="thead">
            <th width="10%">订单编号</th>
            <th width="10%">商品名称</th>
            <th width="10%">下单数量</th>
            <th width="10%">商品总价</th>
            <th width="15%">商品图标</th>
            <th width="15%">下单时间</th>
                
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
	            <tr align="center">               
	                <td><?php echo $row['order_id'];?></td> 
		            <td><?php echo $row['product_name'];?></td>
		            <td><?php echo $row['product_quantity'];?></td>
		            <td><?php echo $row['product_price'];?></td>
		            <td><div><img style="width: 5rem;height:5rem;"src="<?=$row['product_icon']?>"/></div></td>
		            <td><?php echo $row['create_time'];?></td>
	            </tr>
	        <?php endforeach;?>
	     </tbody>

      <tr> 
            <td ><span class="total">订单总金额：<?php echo $row['total_price'];?></span></td> 
      </tr> 
      <tr> 
             <td> <button class="btn1" style="margin-left: 3rem;display: inline-block; border:none;" onclick="back()">返回</button></td>
      </tr>
	 </table>
   
</body>
<script type="text/javascript">
function back(){
	window.location="user_order.php";
}
</script>
</html>