<?php 
    session_start();
    include_once("../functions/database.php");
    $user=$_SESSION['user'];  
    $length=$_SESSION['length'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $name=$_POST['name'];
    $sql="UPDATE user SET phone='$phone',address='$address',name='$name' where user_id='".$_SESSION['user']['user_id']."'";
    mysql_query($sql,$con);
    $_SESSION['user']['phone']=$_POST['phone'];
    $_SESSION['user']['address']=$_POST['address'];
    $_SESSION['user']['name']=$_POST['name']; 

?>
<script type="text/javascript">
alert("�˶Ը������ϳɹ���");
window.location="order.php";
</script>