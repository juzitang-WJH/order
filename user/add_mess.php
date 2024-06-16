<?php 
    session_start();
    include_once("../functions/database.php"); 
    $length=$_GET['length'];
    $_SESSION['length']=$length;
    $user=$_SESSION['user'];  
    $sql="select * from user where user_id='".$user['user_id']."'";
    $result=mysql_query($sql,$con);
    $row = mysql_fetch_assoc($result);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet href="../css/user.css">
    <link rel=stylesheet href="../css/message.css"/>
    <link rel="stylesheet" type="text/css" href="../css/header.css">
 
</head>
<body>
<div class="header" style="height: 5rem;line-height: 5rem;">
        <div class="left_header">
            <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left: 1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
            <span class="content_title">中餐厅订餐系统</span>
        </div>
        <div class="right_menu">
            <span class="user">欢迎您，<?echo $user['name'];?></span>
            <a class="details" href="user_message.php">我的资料</a>
            <a class="logout" href="user_loginout.php">退出登录</a>
        </div>
    </div>
<span class="main-title">请核对用户信息</span>
<span id="main-tip" style="display: none;">用户名为空</span>
<div>
    <form action="handle_addmess.php" id="info" method="post" enctype="multipart/form-data">
    <table class="table1" border="1" width="50%" cellspacing="0" cellpadding="0">
        <tr>
            <td align="right"><span class="td-txt">姓名</span></td>
           <td><input type="text" width="100%"   name="name" value="<?php echo $row['name'];?>"/></td>
        </tr> 
        <tr>
            <td align="right" width="20%"><span class="td-txt">手机号</span></td>
            <td><input type="text" width="100%" id="cname" name="phone" value="<?php echo $row['phone'];?>"/></td>
        </tr>
        <tr>
            <td align="right"><span class="td-txt">地址</span></td>
            <td><input type="text" name="address" value="<?php echo $row['address'];?>"/></td>
        </tr> 
 

    </table>
    <input class="btn1"  type="submit"  value="提交"/>
    </form>
</div>
<script type="text/javascript">
 
function isValid(){ 
    if($("input[name='cname']").val().length<=0){ 
        $("#main-tip").html('手机号不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='address']").val().length<=0){ 
        $("#main-tip").html('地址不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='name']").val().length<=0){ 
        $("#main-tip").html('性别不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }

</script>
</body>
</html>

