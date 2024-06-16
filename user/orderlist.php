<?php
    session_start();
    $user=$_SESSION['user'];
    
    include_once("../functions/database.php"); 
    $result=mysql_query("select * from order_detail where order_id={$_GET['orderid']}",$con);
    $searches = "";
    while($search = mysql_fetch_assoc($result)){
        $searches[] = $search;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet href="../css/header.css">
    <link rel=stylesheet href="../css/user.css">
</head>
<body>
    <div class="header">
        <div class="left_header">
            <span class="content_title">中餐厅订餐系统</span>
        </div>
        <div class="right_menu">
            <span class="user">欢迎您，<?=$user['name']?></span>
   
            <a class="logout" href="user_loginout.php">退出登录</a>
        </div>
    </div>
    <div class="content">
        <span class="main-title" style="border: none;font-size: 18px;">您已成功提交订单，请耐心等待商家配送</span>
        <span class="main-title" style="font-size: 16px;color: #F63440;">您的订单的如下：</span>
        <table class="table" style="margin-left: 1rem;">
        <thead>
            <tr>
                <th width="6%">订单编号</th>
                <th width="6%">商品编号</th> 
                <th width="10%">商品名称</th>
                <th width="15%">下单数量</th>
                <th width="10%">商品总价</th>
                <th width="15%">商品图标</th>
                <th width="15%">下单时间</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($searches as $key=>$search):?>
            <tr align="center">
                <td><?php echo $search['order_id'];?></td> 
                <td><?php echo $search['product_id'];?></td> 
                <td><?php echo $search['product_name'];?></td>
                <td><?php echo $search['product_quantity'];?></td>
                <td><?php echo $search['product_price'];?></td>
                <td><div><img style="width: 5rem;height:5rem;" src="<?=$search['product_icon']?>"/></div></td>
                <td><?php echo $search['create_time'];?></td>
            </tr>
            <?php  endforeach;?> 
        </tbody>
        </table>
        <span class="main-title user_order" style="display: inline-block;margin-bottom: 2rem;margin-left: 2rem;margin-top: 2rem;"><span>用户：<?php echo $user['name'];?></span><span>手机号：<?php echo $user['phone'];?></span><span>地址：<?php echo $user['address'];?></span><span class="order_amount">订单总金额：<?php echo $search['total_price'];?></span></span>
        <button class="back" onclick="back()" style="margin-bottom: 2rem;">返回首页</button>
    </div>
    <script type="text/javascript">
		function back(){
			window.location="main.php";
		}
	</script>
</body>
</html>