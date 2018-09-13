<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="style/login_style.css"/>
    <script type="text/javascript">
        //登录时输入用户名即刻验证用户是否存在
        function check2() {
            var name = document.getElementById('username').value;
            name = encodeURIComponent(name);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.responseText != 'OK' && xhr.responseText != '') {
                        alert(xhr.responseText);
                    }
                }
            }
            xhr.open('get', './check.php?name=' + name + '&num=2');
            xhr.send(null);
        }

        //输入验证码之后验证验证码是否正确，错误则弹窗
        function check() {
            var code = document.getElementById('code').value;
            code = encodeURIComponent(code);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText != "验证码输入正确" && xhr.responseText != '') {
                        alert(xhr.responseText);
                        //document.getElementById('span').innerHTML = xhr.responseText;
                    }
                }
            }
            xhr.open("get", './check.php?checkcode=' + code + '&num=3');
            xhr.send(null);
        }
    </script>
</head>
<?php
//require_once './init.php';
//if(!empty($_COOKIE['user_id'])){
//    jump('./index.php');
//}
//?>
<body>
<div class="container">
    <nav>
        <div class="logo" style="float: left"><a href="../index.php">佩奇问卷网</a></div>
        <ul style="float: right;margin:20px 30px 0 0">
            <li><a href="../index.php">首页</a></li>
            <li><a href="">帮助中心</a></li>
            <li><a href="">关于我们</a></li>
            <li><a href="">联系我们</a></li>
        </ul>
    </nav>
    <div class="clear" style="clear: both"></div>
    <div class="login-box">
        <form action="loginProcess.php" method="post" class="login login-by-user">
            <input class="input" id="username" onblur="check2()" name="username" type="text" placeholder="用户名"/>
            <input class="input" name="password" type="password" placeholder="密码"/>
            <input class="dock input" id="code" name="checkcode" onblur="check()" type="text" placeholder="验证码(不区分大小写)"/>
            <span><img src="./core/checkcode.php" onclick="this.src='./core/checkcode.php?aa='+Math.random()" style="height: 40px;width: 100px"/></span>
            <br/>
            <div class="check">
                <input type="checkbox" name="checkbox"/>下次自动登录
            </div>
            <a href="#" class="forget">忘记密码</a>
            <button type="submit">登录</button>
        </form>
        <p>还没账号？<a href="register.php" style="color: #f1f1f1">立即注册</a></p>
    </div>
</div>

</body>
</html>