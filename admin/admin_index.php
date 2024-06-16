<?php 
    session_start();
    include_once("../functions/database.php"); 
    $name=$_SESSION['name'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/admin_index.css" type="text/css">
    <script type="text/javascript" src="script/backstage.js"></script>
    <script type="text/javascript" src="script/jquery-1.8.3.js"></script>
</head>
<script>
</script>
<body>
<!--后台主界面 -->
<div class="header">
    <span class="header_title">中餐厅订餐系统</span>
    <div class="header_a">
        <span class="welcome">欢迎您,<?php echo $name;?></span>
        <a class="logout" href="logout.php">退出登录</a>
    </div>
</div>
<div class="content">
   <!--左侧列表-->
    <div class="menu">
        <ul class="mList">
            <li>
                <div class="menu-item-title" onclick="show('menu1','change1')"><span  id="change1" class="ico-close"></span>
                    <span class="menu-item-name">商品管理</span>
                </div>
                <dl id="menu1" style="display:none;">
                    <dd><a href="addproduct.php" target="mainFrame">添加商品</a></dd>
                    <dd><a href="listproduct.php" target="mainFrame">商品列表</a></dd>
                </dl>
            </li>
     <li>
                <div class="menu-item-title" onclick="show('menu2','change2')"><span  id="change2" class="ico-close"></span>
                    <span class="menu-item-name">分类管理</span>
                </div>
                <dl id="menu2" style="display:none;">
                    <dd><a href="addcate.php" target="mainFrame">添加分类</a></dd>
                    <dd><a href="listcategory.php" target="mainFrame">分类列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu3','change3')"><span  id="change3" class="ico-close"></span>
                    <span class="menu-item-name">订单管理</span>
                </div>
                <dl id="menu3" style="display:none;">
                    <dd><a href="listorder.php" target="mainFrame">订单列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu4','change4')"><span  id="change4" class="ico-close"></span>
                    <span class="menu-item-name">用户管理</span>
                </div>
                <dl id="menu4" style="display:none;">
                    <dd><a href="adduser.php" target="mainFrame">添加用户</a></dd>
                    <dd><a href="listuser.php" target="mainFrame">用户列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu5','change5')"><span  id="change5" class="ico-close"></span>
                    <span class="menu-item-name">管理员管理</span>
                </div>
                <dl id="menu5" style="display:none;">
                    <dd><a href="addmanager.php" target="mainFrame">添加管理员</a></dd>
                    <dd><a href="listmanager.php" target="mainFrame">管理员列表</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="right">
        <!--右侧内容-->
        <div class="cont">
            <!-- 嵌套网页框架开始 -->
            <iframe src="admin-right.php"  frameborder="0" name="mainFrame" width="100%" height="100%" scrolling="yes">           
            </iframe>
            <!-- 嵌套网页结束 -->
        </div>
    </div>
</div>