<?php
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$id = isset($_GET['id']) ? $_GET['id'] : '';

//加载视图文件
require_once '../view/editCate.html';
?>