<?php
header("Content-Type:text/html;charset=utf-8");
//引入数据路连接文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "select * from `user` where id='$user_id'";
    $res = my_query($sql);
    $row = mysql_fetch_assoc($res);
}

//载入视图文件
require_once '../view/editUser.html';

?>