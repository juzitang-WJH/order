<?php 
    include_once("../functions/database.php"); 
    $sql="select * from user order by user_id desc";
    $result=mysql_query($sql,$con);
    $rows = "";
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
	<span class="main-title">用户列表</span>
	<table class="table" border="0" width="95%"  cellpadding="0"  > <!-- cellspacing="0"表格间隙为0 -->
        <tr class="thead">
            <th width="15%">用户姓名</th>
            <th width="15%">密码</th>
            <th width="15%">用户手机号</th>
            <th width="15%">用户地址</th>
            <th width="15%">用户性别</th>
            <th width="15%">操作</th>
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
	            <tr align="center">               
	                <td><?php echo $row['name'];?></td>
	                <td><?php echo $row['password'];?></td>
	                <td><?php echo $row['phone'];?></td>
	                <td><?php echo $row['address'];?></td>
	                <td><?php echo $row['sex'];?></td>           
	                <td align="center">
	                <a  onclick="deluser(<?=$row['user_id']?>)">删除</a>
	                <a  onclick="detail(<?=$row['user_id']?>)">修改</a>
	                </td>
	            </tr>
	        <?php endforeach;?>
	     </tbody>
       
	</table>
</body>

<script type="text/javascript">

	function addUser(){
		window.location="addUser.php";	
	}
	function deluser(userid){
			if(window.confirm("确认删除？")){
				window.location="handle_deluser.php?id="+userid;
			}
	}
    function detail(userid){
        window.location="edituser.php?id="+userid;
    }
</script>
</html>