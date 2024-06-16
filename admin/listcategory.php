<?php 
    include_once("../functions/database.php"); 
    $sql="select * from category order by category_id desc";
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
	<span class="main-title">分类列表</span>
	<input type="button" value="添加分类" class="btn1"  onclick="addCate()"  style="border:none"/>
	<table class="table" border="0" width="60%"  >
        <tr class="thead">
            <th width="45%">分类名称</th>
            <th width="45%">操作</th>
        </tr>
	    <tbody>
	        <?php  foreach($rows as $key=>$row):?>
	            <tr align="center">               
	                <td><?php echo $row['category_name'];?></td>        
	                <td align="center">
	                <a  onclick="delcate(<?=$row['category_id']?>)">删除</a>
	                <a  onclick="updatecate(<?=$row['category_id']?>)">修改</a>
	                </td>
	            </tr>
	        <?php endforeach;?>
	     </tbody>
       
	</table>
</body>

<script type="text/javascript">

    function addCate(){
            window.location="addcate.php";
    }
	function delcate(id){
			if(window.confirm("确认删除？")){
				window.location="handle_delcate.php?id="+id;
			}
	}
    function updatecate(id){
        window.location="editcate.php?id="+id;
    }
</script>
</html>