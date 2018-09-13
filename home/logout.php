<?php
//引入相关文件
//此处也要验证是否登录
require_once './init.php';
is_login();
//清除cookie
foreach ($_COOKIE as $key=>$value){
    setcookie("$key","",time()-1,'/');
}
//setcookie('user_name','',time()-1,'/');

jump('../index.php');
?>