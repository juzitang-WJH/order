<?php 
      /*修改商品信息*/
    session_start(); 
    include_once("../functions/database.php");
    $id=$_SESSION["id"]; 
    $p_name=$_POST["name"];
    $price=$_POST["price"];
    $describe=$_POST["describe"];
    $cate=$_POST["category_id"];
    if(empty($_FILES['file']['tmp_name'])){
    	  $sql="update product set  name='$p_name',price='$price', description='$describe',category_id='$cate'  where id='$id'";
          mysql_query($sql,$con);
          echo "修改成功！";
    	
    }
    else{
    $file=$_FILES["file"];
	    $name = $file['name']; //得到文件名称
	    $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
	$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
	//判断文件类型是否被允许上传
	if(!in_array($type, $allow_type)){
		 //如果不被允许，则直接停止程序运行
	    return ;
	}
	//判断是否是通过HTTP POST上传的
	if(!is_uploaded_file($file['tmp_name'])){
			 //如果不是通过HTTP POST上传的
			  return ;
	}
	$upload_path = "../upload/image/"; //上传文件的存放路径
	$pro_image=$upload_path.$file['name'];
	//开始移动文件到相应的文件夹
	if(move_uploaded_file($file['tmp_name'],$pro_image)||$pro_image){
          $sql="update product set  name='$p_name',price='$price', icon='$pro_image',description='$describe',category_id='$cate'   where id='$id'";
          mysql_query($sql,$con);
          echo "修改成功！";
	}	
    }
?>
