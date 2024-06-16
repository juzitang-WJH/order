<?php
   /*添加商品信息*/
    include_once("../functions/database.php");
    $p_name= $_POST['name'];
    $price=$_POST['price'];
    $describe=$_POST['describe'];
    $category_id=$_POST['cateid'];

    if($p_name==''||$price==''||$describe==''||empty($_FILES['file']['tmp_name'])||$category_id=='')
	{
		  echo "发布商品失败，信息不能为空!";
	}
	else{
	        $file = $_FILES['file'];//得到传输的文件
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
			//开始移动文件到相应的文件夹，tmp_name获取的文件不包含文件扩展名
			if(move_uploaded_file($file['tmp_name'],$pro_image)||$pro_image){
				$sql="INSERT INTO product values(null,'$p_name','$price','$pro_image','$describe','$category_id')";
				mysql_query($sql,$con);
				echo '发布商品成功！';
			}else{
				 echo "发布商品失败,找不到文件存放路径!";
			}
	}
 
?>