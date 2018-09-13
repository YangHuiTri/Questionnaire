<?php
//*******************修改分类***********************
require_once './init.php';
require_once '../core/MySQLDB.php';
$id = $_GET['id'];
$name = $_POST['sort'];
$b = my_query("update `type` set name='$name' where id=$id");
if($b){
    jump('./listCate.php','修改成功');
}else{
    jump('./editCate.php','修改失败');
}
?>