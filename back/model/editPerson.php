<?php
//引入数据库连接文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
//接收get请求传来的数据
$user_id = $_GET['user_id'];//用户id
$role = $_GET['role'];//用户角色
//接收post传来的数据
$username = sqlString($_POST['username']);//用户名
$password = sqlString($_POST['password']);//密码
$email = sqlString($_POST['email']);//邮箱
//因为修改普通用户需要选填性别，而管理员不需要，所以当编辑管理员提交到该页面是性别不改变
$sql = "select * from `user` where id=$user_id";
$result = my_query($sql);
$sex_row = mysql_fetch_assoc($result);
$sex = isset($_POST['sex']) ? $_POST['sex'] : $sex_row['sex'];//性别
//检验数据的有效性
if(empty($username) || empty($password) || empty($email)){
    if($role == 0){
        jump('./editAdmin.php','有必填项为空！');
    }elseif ($role == 1){
        jump('./editUser.php','有必填项为空！');
    }
}
$sql = "update `user` set name='$username',password=md5('$password'),email='$email',sex='$sex' where id='$user_id'";
//var_dump($sql);
//die();
$b = my_query($sql);
if($b){
    //修改成功
    if($role == 0){
        jump('./listAdmin.php','修改成功');//修改管理员
    }else{
        jump('./listUser.php','修改成功');//修改普通用户
    }
}else{
    //修改失败
    if($role == 0){
        jump("./editAdmin.php?id=$user_id",'修改失败！');
    }else{
        jump("./editUser.php?id=$user_id",'修改失败！');
    }
}


?>