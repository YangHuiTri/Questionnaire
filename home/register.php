<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="style/register_style.css" type="text/css"/>
    <script type="text/javascript">
        //利用ajax去验证用户名是否已经存在
        function checkname() {
            var nm = document.getElementById('username').value;
            nm = encodeURIComponent(nm);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText != "OK") {
                        alert(xhr.responseText);
                        //document.getElementById('span').innerHTML = xhr.responseText;
                    }
                }
            }
            xhr.open("get", './check.php?name=' + nm + '&num=1');
            xhr.send(null);
        }

        // window.onload=function () {
        //     document.getElementById('btn').onclick=function () {
        //         var fm = document.getElementsByTagName('form')[0];
        //         fm.onsubmit = function (evt) {
        //             var fd = new FormData(fm);
        //             var xhr = new XMLHttpRequest();
        //             xhr.onreadystatechange=function () {
        //                 if(xhr.readyState == 4){
        //                     alert(xhr.responseText);
        //                 }
        //             }
        //             xhr.open('post','check.php');
        //             xhr.send(fd);
        //             evt.preventDefault();
        //         }
        //     }
        // }

        // window.onload = function () {
        //     document.getElementById('username').onblur = function () {
        //         var username = document.getElementById('username').value;
        //         var xhr = new XMLHttpRequest();
        //         xhr.onreadystatechange = function () {
        //             if (xhr.readyState == 4) {
        //                 // document.getElementById('a').innerHTML = xhr.responseText;
        //                 alert(xhr.responseText);
        //             }
        //             xhr.open('post', './registerProcess.php');
        //             xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        //             var info = "username=" + username;
        //             xhr.send(username);
        //         }
        //     }
        // }
        function checkPwd(){
            var pwd1 = document.getElementById('password').value;
            var pwd2 = document.getElementById('password2').value;
            if(pwd1.length < 6 || pwd2.length < 6){
                alert("密码过于简短，请重新输入！");
                return false;
            }else if(pwd1 !== pwd2){
                alert("两次密码输入不一致！");
                return false;
            }else{
                return true;
            }
        }

    </script>
</head>
<body>
<div class="container">
    <nav>
        <div class="logo" style="float: left"><a href="../index.php">佩奇问卷网</a></div>
        <ul style="float: right;margin:20px 30px 0 0">
            <li><a href="">首页</a></li>
            <li><a href="">帮助中心</a></li>
            <li><a href="">关于我们</a></li>
            <li><a href="">联系我们</a></li>
        </ul>
    </nav>
    <div class="clear" style="clear: both"></div>
    <div class="login-box">
        <form action="registerProcess.php" method="post" onsubmit="return checkPwd()">
            <input id="username" class="input" type="text" name="username" onblur="checkname()" placeholder="请输入用户名"/>
            <input id="password" class="input" type="password" name="password" onblur="f2()" placeholder="请设置登录密码"/>
            <input id="password2" class="input" type="password" name="password2" onblur="f3()" placeholder="请再次输入登录密码"/>
            <div class="check">
                <input id="check" class="check" type="checkbox" name="check"/>您已阅读并遵守 <a href="#">《用户协议》</a>
            </div>
            <button type="submit" id="btn" class="btn">注册</button>
        </form>
        <!--<div class="alert alert-danger" id="span" role="alert"></div>-->
    </div>
</div>
</body>
</html>