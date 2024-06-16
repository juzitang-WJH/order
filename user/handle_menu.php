<?php
    session_start();
    include_once("../functions/database.php"); 
    $id = json_decode($_POST['id'],true); //��json��ʽ���ַ������н��벢ת��ΪPHP����
  
    $query2="select * from product where category_id='$id'";
    $arry2=mysql_query($query2,$con);
    $searches="";
    while ($search=mysql_fetch_assoc($arry2)) {
        $searches[]=$search;
    }

    $json = json_encode((object)$searches,JSON_FORCE_OBJECT);
    print_r($json);
?>