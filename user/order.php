<?php
    include_once("../functions/database.php"); 
    session_start();
    $length=$_SESSION['length'];
  
    $time=date("Y-m-d H:i:s");
    /*$order = json_decode($_POST['orderli'],true); */ 
    $pro_id=$_COOKIE['pro_id'];
    $pro_name=$_COOKIE['pro_name'];
    $quantity=$_COOKIE['quantity'];
    $price=$_COOKIE['price'];
    $amount=$_COOKIE['amount'];
    $user=$_SESSION['user'];
    /*$length = json_decode($_POST['len'],true);*/
    //���cookie���������
    for($i=0;$i<sizeof($pro_id);$i++) {
        setcookie("pro_id["+$i+"]", "", time() - 3600);
        setcookie("pro_name["+$i+"]","", time() - 3600);
        setcookie("quantity["+$i+"]","", time() - 3600);
        setcookie("price["+$i+"]","", time() - 3600);
        setcookie("amount["+$i+"]","", time() - 3600);
    }
  

    $sql="INSERT INTO orderlist(order_id, user_id, user_name, user_phone, user_address,  order_status, create_time, total_price) VALUES(null,'".$user['user_id']."','".$user['name']."','".$user['phone']."','".$user['address']."','0',now(),'".$amount[0]."')";
    mysql_query($sql,$con);
    if(mysql_errno($con)!==0){
        die(mysql_error($con));
    }

    $query=mysql_query("select order_id from orderlist where create_time=now()",$con);
    $order_id= mysql_fetch_assoc($query);
    for($i=0;$i<$length;$i++) {
        $result1=mysql_query("select icon from product where id='".$pro_id[$i]."'",$con);
        $icon= mysql_fetch_assoc($result1);
        $row="INSERT INTO order_detail(id,order_id, product_id, product_name, product_price, product_quantity, total_price, product_icon, create_time)
         VALUES(null,'".$order_id['order_id']."','".$pro_id[$i]."','".$pro_name[$i]."','".$price[$i]."','".$quantity[$i]."','".$amount[0]."','".$icon['icon']."',now())";
        mysql_query($row,$con);
        if(mysql_errno($con)!==0){
            die(mysql_error($con));
        }
    }

    $result=mysql_query("select * from order_detail where create_time=now()",$con);
    $searches ="";
    while($search = mysql_fetch_assoc($result)){
        $searches[] = $search;
    }
?>
<script type="text/javascript">
window.location="orderlist.php?orderid=<?php echo $order_id['order_id'];?>";
</script>