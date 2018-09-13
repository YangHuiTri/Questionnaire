<?php
header("Content-Type:text/html;charset=utf-8");
//导入数据库文件
require_once './core/MySQLDB.php';
require_once './init.php';
@session_start();
//接收登录信息
$username = sqlString($_POST['username']);
$password = sqlString($_POST['password']);
$checkcode = strtolower($_POST['checkcode']);
//非空检测
if(empty($username)){
    jump('./login.php','用户名不能为空');
}
if(empty($password)){
    jump('./login.php','请输入密码');
}
if($_SESSION['checkcode'] != $checkcode){
    jump('./login.php','验证码输入错误，请重新输入');
}
//去数据库查询用户记录
$sql = "select * from `user` where name='$username' and password=md5('$password')";
$res = my_query($sql);
if(mysql_num_rows($res) === 1){
    $row = mysql_fetch_assoc($res);
    $_SESSION['user_id']=$row['id'];
    $_SESSION['user_name']=$row['name'];
    if(!empty($_POST['checkbox'])){
        setcookie('user_id',$row['id'],time()+3600*24*30,'/');
        setcookie('user_name',$row['name'],time()+3600*24*30,'/');
    }else{
        setcookie('user_id',$row['id'],time()+3600*24,'/');
        setcookie('user_name',$row['name'],time()+3600*24,'/');
    }
    if($row['role'] == 0){
        setcookie('role',$row['role'],time()+3600*24*30,'/');
        jump('../back/index.php');
    }else{
        setcookie('role',1,time()+3600*24*30,'/');
        jump('./user.php');
    }
}else{
    jump('./login.php','登录失败，请重新登录');
}
?>