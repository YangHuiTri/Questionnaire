<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<meta name="viewport" content="width=device-width;initial-scale=1">
<link href="./js/bootstrap.css" rel="stylesheet">
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<?php
require_once './model/init.php';
if(!isset($_COOKIE['user_name'])){
    jump('../home/login.php','您还未登录，请先登录！');
}
if($_COOKIE['role'] != 0){
    jump('../home/index.php','您不是管理员，无法访问');
}
?>
<body>
    <div class="head">
            <h3 class="head_text fr" style="float: none">佩奇问卷网后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您,<?php @session_start(); echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : $_SESSION['user_name'];?></b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="icon icon_i">首页</a><span></span><a href="javascript:history.go(-1)" class="icon icon_j">后退</a><span></span><a href="javascript:history.go(1)" class="icon icon_t">前进</a><span></span><a href="javascript:void(0)" onclick="history.go(0)" class="icon icon_n">刷新</a><span></span><a href="../home/logout.php" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="view/main.html" frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
<!--                    <li>-->
<!--                        <h3><span onclick="show('menu1','change1')" id="change1" style="cursor: pointer">+</span>模板管理</h3>-->
<!--                        <dl id="menu1" style="display:none;">-->
<!--                        	<dd><a href="view/addMould.html" target="mainFrame">添加模板</a></dd>-->
<!--                            <dd><a href="view/listMould.html" target="mainFrame">模板列表</a></dd>-->
<!--                        </dl>-->
<!--                    </li>-->
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2" style="cursor: pointer">+</span>分类管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="./model/addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="./model/listCate.php" target="mainFrame">分类列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu4','change4')" id="change4" style="cursor: pointer">+</span>用户管理</h3>
                        <dl id="menu4" style="display:none;">
                        	<dd><a href="./model/addUser.php" target="mainFrame">添加用户</a></dd>
                            <dd><a href="./model/listUser.php?role=1" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu5','change5')" id="change5" style="cursor: pointer">+</span>管理员管理</h3>
                        <dl id="menu5" style="display:none;">
                        	<dd><a href="./model/addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="./model/listAdmin.php?role=0" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    
                         <li>
                        <h3><span onclick="show('menu6','change6')" id="change6" style="cursor: pointer">+</span>问卷管理</h3>
                        <dl id="menu6" style="display:none;">
                            <dd><a href="./model/listSurvey.php" target="mainFrame">问卷列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>