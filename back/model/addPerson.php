<?php
//*****************该页面用于处理添加管理员或者普通用户*********************
header("Content-Type:text/html;charset=utf-8");
//加载数据库文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
//接收数据，防止脚本攻击
$role = $_GET['role'];
$username = escapeString($_POST['username']);
$password = escapeString($_POST['password']);
$email = escapeString(isset($_POST['email']) ? $_POST['email'] : $username.'@sohu.com');
//对数据进行检测
if(empty($username) || empty($password) || empty($email)){
    if($role == 0){
        jump('./addAdmin.php','有必填项为空，2秒后跳回');
    }else{
        jump('./addUser.php','有必填项为空,2秒后跳回');
    }
}
$sql = "insert into `user` values(null,'$username',md5('$password'),$role,'$email',1,3,0)";
$b = my_query($sql);
if($b){
    if($role == 0){
        jump('./listAdmin.php','添加管理员成功',1);
    }else{
        jump('./listUser.php','添加用户成功',1);
    }
}else{
    if($role == 0){
        jump('./addAdmin.php','添加失败，请重试',1);
    }else{
        jump('./addUser.php','添加失败，请重试',1);
    }
}
?>