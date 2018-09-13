<?php
header("Content-Type:text/html;charset=utf-8");
require_once 'init.php';
require_once '../core/MySQLDB.php';
is_login();
$name = $_COOKIE['user_name'];
$sql = "select uid from `user` where name='$name' and role=0";
$res = my_query($sql);
$row = mysql_fetch_assoc($res);
$uid = $row['uid'];
require_once '../view/addAdmin.html';
?>