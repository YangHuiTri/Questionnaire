<?php
header("Content-Type:text/html;charset=utf-8");
//加载数据库文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$sql = "select * from `user` where role=0";
$res = my_query($sql);
$name = $_COOKIE['user_name'];
$sql2 = "select uid from `user` where name='$name' and role=0";
$res2 = my_query($sql2);
$row2 = mysql_fetch_assoc($res2);
$uid = $row2['uid'];
//加载视图文件
require_once '../view/listAdmin.html';
?>