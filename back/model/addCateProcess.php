<?php
require_once './init.php';
require_once '../core/MySQLDB.php';

$sort = $_POST['sort'];
$b = my_query("insert into `type` values (null,'$sort')");
if($b){
    jump('./listCate.php','添加成功');
}else{
    jump('./editCate.php','添加失败');
}


?>