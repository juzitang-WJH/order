<?php 
    include_once("../functions/database.php"); 
    $sql="select * from admin order by id desc";
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
<link rel=stylesheet href="css/product.css"/>
<script type="text/javascript">
function delmanager(id){
	if(window.confirm("确认删除？")){
		window.location="handle_delmanager.php?id="+id;
	}
}
function updatemanager(id){
window.location="editmanager.php?id="+id;
}
</script>
</head>
<body>
    <span class="main-title">管理员列表</span>
	<table class="table" border="0" width="60%"  >
        <tr class="thead">
            <th width="30%">管理员姓名</th>
            <th width="30%">管理员密码</th>
            <th width="30%">操作</th>
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
	            <tr align="center">               
	                <td><?php echo $row['admin_name'];?></td> 
	                <td><?php echo $row['admin_password'];?></td>       
	                <td align="center">
	                <a  onclick="delmanager(<?=$row['id']?>)">删除</a>
	                <a  onclick="updatemanager(<?=$row['id']?>)">修改</a>
	                </td>
	            </tr>
	        <?php endforeach;?>
	     </tbody>
    </table> 

</body>
</html>