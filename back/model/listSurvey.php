<?php
header("Content-Type:text/html;charset=utf-8");
//加载数据库文件
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$sql = "select t.name, s.id, s.title, s.shelves from `type` as t join `survey` as s on t.id=s.type_id order by id ASC ";
$res = my_query($sql);

$res2 = my_query("select * from `survey` where shelves=1");
$rows2 = mysql_num_rows($res2); //已上架的问卷数
$res3 = my_query("select * from `survey` where shelves=0");
$rows3 = mysql_num_rows($res3);  //未上架的问卷数
$res4 = my_query("select * from `survey`");
$rows4 = mysql_num_rows($res4);

require_once '../view/listSurvey.html';
?>