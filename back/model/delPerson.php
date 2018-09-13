<?php
header("Content-Type:text/html;charset=utf-8");
//引入数据库文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$role = $_GET['role'];
$user_id = $_GET['id'];
$sql = "delete from `user` where id=$user_id";
$b = my_query($sql);
if($b){
    if($role == 0){
        jump('./listAdmin.php','删除成功',1);
    }else{
        jump('./listUser.php','删除成功！',1);
    }
}else{
    if($role == 0){
        jump('./listAdmin.php','发生未知错误，删除失败',1);
    }else{
        jump('./listUser.php','发生未知错误，删除失败',1);
    }
}

?>