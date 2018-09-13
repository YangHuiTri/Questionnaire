<?php
header("Content-Type:text/html;charset=utf-8");
require_once './init.php';
is_login();
//加载视图文件
require_once '../view/addUser.html';
?>