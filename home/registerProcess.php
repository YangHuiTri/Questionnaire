<?php
header("Content-Type:text/html;charset=utf-8");
require_once './init.php';
require_once './core/MySQLDB.php';
//接收注册信息
$username = escapeString($_POST['username']);
$password = escapeString($_POST['password']);
$password2 = escapeString($_POST['password2']);
//查询数据库中是否有重名的用户
$sql = "select * from `user` where name='$username'";
$res = my_query($sql);
$row = mysql_num_rows($res);
if($row >= 1){
    jump('./register.php','用户名已存在，请重新填写！');
}
//数据有效性完整性检测，非法全部跳回注册页面
if(empty($username)){
    jump('./register.php','用户名不能为空');
}
if(empty($password) || empty($password2)){
    jump('./register.php','密码不能为空');
}
if($password2 != $password){
    jump('./register.php','密码不一致，请重新填写');
}
if(!isset($_POST['check'])){
    jump('./register.php','请阅读《用户协议》');
}
//添加用户到数据库
$sql = "insert into `user` values (null,'$username',md5('$password'),1,'$username@sohu.com',1,3,0)";
//var_dump($sql);
//die();
$result = my_query($sql);
if($result){
    //jump('./login.php','注册成功，请登录！');
    echo "<script>alert('注册成功，请登录！');window.location='./login.php'</script>";
}
?>