<?php
    session_start(); 
    include_once("../functions/database.php"); 
    $user=$_SESSION['user'];
    $sql="select * from category";
    $result=mysqli_query($sql,$con);
    $rows="";
    while ($row=mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }

    $query="select * from product";
    $arry=mysqli_query($query,$con);
    $searches="";
    while ($search=mysqli_fetch_assoc($arry)) {
        $searches[]=$search;
    }
    
    $list1="select category_id from category limit 1 ";
    $show1=mysqli_query($list1,$con);
    $result1=mysqli_fetch_assoc($show1);
    $list2="select * from product where category_id='".$result1['category_id']."'";
    $result2=mysqli_query($list2,$con);
    $showes="";
    while ($show=mysqli_fetch_assoc($result2)) {
        $showes[]=$show;
    }

?>
<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="../js/jquery.fly.min.js"></script>
    <script type="text/javascript" src="../ajax/Ajax.js"></script>
    <script type="text/javascript" src="../ajax/Json.js"></script>
    <script type="text/javascript" src="../js/json2.js"></script>
    <script type="text/javascript" src="../js/cookie.js"></script>
     <script type="text/javascript" src="../js/script.js"></script>

</head>
<body>

<div class="content">
    <div class="content_left">
        <div class="content_left_header">
            <span class="content_title">线上订餐系统</span>
        </div>
        <div class="content_leftCon">
            <div class="left_icon" style="margin-bottom: 3rem;"></div>
            <?php  foreach($rows as $key=>$row):?>
            <button class="content_button">
            <div class="content_list">
                <span class="category_index" style="display: none;"><?php echo $row['category_id']?></span>
                <span class="list_name"><?php echo $row['category_name']?></span>
            </div>
            </button>
            <?php endforeach;?>
        </div>
    </div>
    <div class="content_center">
        <div class="content_center_header">
              <span class="right_about">欢迎您，<?echo $user['name'];?></span>
        </div>
        <div class="content_center_content">
            <div class="center_notice">
                <span class="notice_content">公告：周一到周五送餐时间(9:30-13:30,17:00-20:30,预订单一小时内送达) 送餐电话:123456789</span>
            </div>
            <div class="menu_list1">
               <!-- 展示第一个类别的商品信息 -->
                <?php foreach($showes as $key=>$show):?>
                <div class="menu_list1_content each-<?=$show['id']?> first_view" id="<?php echo $show['id'];?>">
                    <div class="menu_list1_content_img"><img src="<?=$show['icon']?>"/></div>
                    <p class="menu_list1_name"><?php echo $show['name'];?></p>
                    <p class="menu_list1_description"><?php echo $show['description'];?></p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price"><?php echo $show['price'];?></span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <?php  endforeach;?>
                <!-- 每个类别对应的商品信息 -->
                <?php foreach($searches as $key=>$search):?>
                <div class="menu_list1_content each-<?=$search['id']?>" id="<?php echo $search['id'];?>" style="display: none;">
                    <div class="menu_list1_content_img"><img src="<?=$search['icon']?>"/></div>
                    <p class="menu_list1_name"><?php echo $search['name'];?></p>
                    <p class="menu_list1_description"><?php echo $search['description'];?></p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price"><?php echo $search['price'];?></span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <?php  endforeach;?>
                
            </div>
        </div>
    </div>
    <div class="content_right">
        <div class="content_right_header">   
            <a class="right_details" href="user_message.php">我的资料</a>
            <a class="order_details" href="user_order.php">我的订单</a>
            <a class="logout" href="user_loginout.php">退出登录</a>
        </div>
        <div class="content_right_content">
            <div class="right_header">
                <span class="header_content">购物车</span>
                <button class="header_submit"><span class="header_submit_txt">[清空]</span></button>
            </div>
            <div class="shopcar_list">
                <div class="shopcar_empty">
                    <div class="shopcar_empty_img"></div>
                    <p class="shopcar_empty_txt">购物车空空如也</p>
                </div>
                <div class="shopcar_notempty" style="display: none;">
                </div>
            </div>
            <div class="right_content">
                <div class="amount">
                    <div class="img_box"></div>
                    <div class="empty_txt">购物车为空</div>
                    <div class="notempty_txt" style="display: none;">
                        <span class="total">总计： ￥</span>
                        <span class="total_price">0</span>
                        <button class="calculate" onclick="confirm()">结算</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--点击结算按钮弹出对话框 -->
<div class="alert">
    <img id="close" src="../img/icon_close.png">
    <img id="logo" src="../img/favicon.ico">
    <p class="alert_txt">是否确认付款？</p>
    <button class="makeorder" onclick="makeorder()">确定</button>
    <button class="cancel" onclick="cancel()">取消</button>
</div>

<script type="text/javascript">
//window.onload()方法用于加载完页面后，执行function中的多个函数
window.onload=function(){
    var data,list;
    var Arrays=new Array();
    
    var empty_txt=document.getElementsByClassName("empty_txt")[0];
    var notempty_txt=document.getElementsByClassName("notempty_txt")[0];
    var shopcar_empty=document.getElementsByClassName("shopcar_empty")[0];
    var shopcar_notempty=document.getElementsByClassName("shopcar_notempty")[0];

    var content_list=document.getElementsByClassName("content_list");
    //设置菜品菜单的背景颜色和文字颜色
    for(var i=0;i<content_list.length;i++){
        //默认选中分类第一个，设置的背景和文字颜色
        content_list[0].style.backgroundColor="#F63440";
        content_list[0].style.color="white";
        //单击其他分类，触发onclick事件
        content_list[i].onclick=function(){
            for(var j=0;j<content_list.length;j++){
                content_list[j].style.backgroundColor="#FAFAFA";
                content_list[j].style.color="black";
            }
            this.style.backgroundColor="#F63440";
            this.style.color="white";
        }
    }

    //点击菜品分类，根据分类的id，用ajax数据交互向服务器端发出post请求，参数会传到后台 ，请示成功后调用sucess_function()函数
    $(".content_list").click(function(){
        $(".first_view").remove();
        var thisID=$(this).children(".category_index").html();
        data={id:thisID};
        post_ajax("../user/handle_menu.php", data, sucess_function);                   
        
    });


    var offset = $('.img_box').offset(); //offset设置或返回被选元素相对于文档的偏移坐标
    //清空购物车的数据 
    $(".header_submit").click(function(){
        Arrays=[];
        $(".shopcar_onelist").remove();
        $(".total_price").html("0");
        empty_txt.style.display="block";
        notempty_txt.style.display="none";
        shopcar_empty.style.display="block";
        shopcar_notempty.style.display="none";

    });
   //点击加入购物车之后，菜品信息存放的坐标位置
    $(document).on('click','.menu_list1_addshopcar',function(event){
        var thisItem = $(this);  
        var flyer = thisItem.clone();  //生成被选元素的副本
        flyer.fly({  
            start: {  
                left: event.pageX,  
                top: event.pageY  
            },  
            end: {  
                left: offset.left + 10,  
                top: offset.top + 10,  
                width: 0, 
                height: 0  
            },  
            onEnd: function () {  
                $('.img_box').css({  
                    /*background: 'red' */ 
                });  
                setTimeout(function () {  
                    $('.img_box').css({  
                        /*background: 'blue'*/  
                    });  
                }, 200);  
                this.destory();  
            }  
        });  
    });  
    
    //显示加入购物车的商品信息，进行相对应的加和减
    $(document).on('click','.menu_list1_addshopcar',function(){
        empty_txt.style.display="none";
        notempty_txt.style.display="block";
        shopcar_empty.style.display="none";
        shopcar_notempty.style.display="block";

      //parent:父元素; children:子元素
        var thisID=$(this).parent(".menu_list1_content").attr("id");
        var itemname  = $(this).parent(".menu_list1_content").children(".menu_list1_name").html();
        var itemprice = $(this).parent(".menu_list1_content").children(".menu_list1_price").html();
       //判断商品id是否在arrays数组中
         if(include(Arrays,thisID))
        {
            var price    = $('#each-'+thisID).children(".onelist_price").html();
            var quantity = $('#each-'+thisID).children(".num").html();
            quantity = parseInt(quantity)+parseInt(1);     
            var total = parseFloat(itemprice)*parseFloat(quantity);
            $('#each-'+thisID).children(".onelist_price").html(total);
            $('#each-'+thisID).children(".num").html(quantity);          
            var prev_charges = $('.total_price').html();
            prev_charges = parseFloat(prev_charges)-parseFloat(price);
            
            prev_charges = parseFloat(prev_charges)+parseFloat(total);
            $('.total_price').html(prev_charges);    
        }
        else
        { 
            //push在数组末尾添加 一个或者多个元素
            Arrays.push(thisID);
            var prev_charges = $('.total_price').html();
          //parseFloat()解析字符串，返回一个浮点数
            prev_charges = parseFloat(prev_charges)+parseFloat(itemprice);//parseFloat()解析字符串，返回一个浮点数           
            $('.total_price').html(prev_charges);
          //append在被选元素结尾插入指定内容，就是将商品信息插入到shopcar_notempty的末尾位置
            $('.shopcar_notempty').append('<div class="shopcar_onelist" id="each-'+thisID+'" name="'+thisID+'"><span class="onelist_name">'+itemname+'</span><button class="minus">-</button><span class="num">1</span><button class="plus">+</button><span style="font-size: 14px;color: #F63440;line-height: 3.5rem;vertical-align: top;margin-left: 1rem;">￥</span><span class="onelist_price">'+itemprice+'</span></div>');           
        }
    });
    //点击“+”，增加购物车里菜品的数量
    $(document).on('click','.plus',function(){
        var thisID=$(this).parent(".shopcar_onelist").attr("id");
        var txt=$('#'+thisID).children(".num").html();
        txt=parseInt(txt)+parseInt(1);
        $('#'+thisID).children(".num").html(txt);
        var list=$("."+thisID).children(".menu_list1_price").html();
        var price=$('#'+thisID).children(".onelist_price").html();
        price=parseFloat(price)+parseFloat(list);
        $('#'+thisID).children(".onelist_price").html(price);

        var prev_charges = $('.total_price').html();
        prev_charges = parseFloat(prev_charges)+parseFloat(list);
        $('.total_price').html(prev_charges);
    });
   
    //点击“-”，减少购物车里菜品的数量   
    $(document).on('click','.minus',function(){
        var thisID=$(this).parent(".shopcar_onelist").attr("id");
        var id=$("."+thisID).attr("id");
        var index=$.inArray( id, Arrays );
        //'#thisID'是jquery的id选择器，'.thisID'是jquery的class选择器,分别通过指定的id和class属性来寻找元素
        var txt=$('#'+thisID).children(".num").html();
        var list=$("."+thisID).children(".menu_list1_price").html();
        var price=$('#'+thisID).children(".onelist_price").html();  
        if(txt!=1){
            txt=parseInt(txt)-parseInt(1);
        }
        else if(txt==1){
            $(this).parent(".shopcar_onelist").remove();
            //splice从数组中移除元素
            Arrays.splice(index,1);
            txt=0;
        }
        $('#'+thisID).children(".num").html(txt);

        var total = parseFloat(txt)*parseFloat(list);
        $('#'+thisID).children(".onelist_price").html(total);
        var prev_charges = $('.total_price').html();
        prev_charges = parseFloat(prev_charges)-parseFloat(price);
            
        prev_charges = parseFloat(prev_charges)+parseFloat(total);
        $('.total_price').html(prev_charges);

    });

}


    function include(arr, obj) {
        for(var i=0; i<arr.length; i++) {
            if (arr[i] == obj) return true;
        }
    }
    //用json解析数据
    function sucess_function(ret){
    	/*alert(ret);*/
        ret=JSON.parse(ret);//json.parse将数据转换为JavaScript对象
        $(".menu_list1_content").css('display','none');
        for(var i=0;i<getJsonLength(ret);i++){
            $("#"+ret[i].id).css('display','inline-block');
            
        }
        
    }
    //点击结算按钮
    function confirm(){
    	 //getElementsByClassName获取指定类名的元素，就是获取类名为alert中的所有元素
        var alert=document.getElementsByClassName("alert")[0];
        alert.style.display="block";
   	  //getElementById返回指定ID的元素，获取id是close的元素，如果点击它，就会被隐藏
        var alert_close = document.getElementById("close");
        alert_close.onclick = function () {
            alert.style.display = "none";
        }
    }
    //取消付款
    function cancel(){
        var alert=document.getElementsByClassName("alert")[0];
        alert.style.display="none";
    }
    //点击确认付款后，跳转到add_mess.php界面，用cookie来保存所有菜品的信息
    function makeorder(){ 
        var shopcar_onelist=document.getElementsByClassName("shopcar_onelist");
        window.location="add_mess.php?length="+shopcar_onelist.length;
        var id=[];
        for (var i = 0; i < shopcar_onelist.length; i++) {
            id[i]=shopcar_onelist[i].getAttribute('name');
        }
        var onelist_name=document.getElementsByClassName("onelist_name");
        var num=document.getElementsByClassName("num");
        var onelist_price=document.getElementsByClassName("onelist_price");
        var total_price=document.getElementsByClassName("total_price")[0];
        for(var i=0;i<shopcar_onelist.length;i++){
              // innerHTML就是设置或返回表格行开始和结束标签之间的网页数据---
            var order={"pro_id":id[i],"pro_name":onelist_name[i].innerHTML,"quantity":num[i].innerHTML,"price":onelist_price[i].innerHTML,"amount":total_price.innerHTML};
            setCookie("pro_id["+i+"]",id[i], 0);
            setCookie("pro_name["+i+"]",onelist_name[i].innerHTML, 0);
            setCookie("quantity["+i+"]",num[i].innerHTML, 0);
            setCookie("price["+i+"]",onelist_price[i].innerHTML, 0);
            setCookie("amount["+i+"]",total_price.innerHTML, 0);
        }/*
        var length=shopcar_onelist.length;
        list={len:length};
        post_ajax("order.php",list,false);*/
    }
</script>
</body>
</html>
