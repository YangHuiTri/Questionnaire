<?php
require_once './init.php';
require_once '../core/MySQLDB.php';
is_login();
$res = my_query("select * from `type`");

//加载视图文件
require_once '../view/listCate.html';
?>