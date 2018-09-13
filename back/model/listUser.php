<?php
header("Content-Type:text/html;charset=utf-8");
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$sql = "select * from `user` where role=1";
$res = my_query($sql);
$rows = mysql_num_rows($res);
//引入视图文件
require_once '../view/listUser.html';
?>

