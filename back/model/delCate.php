<?php
//**************删除分类**************
require_once '../core/MySQLDB.php';
require_once './init.php';
is_login();
$id = $_GET['id'];
$res = my_query("select * from `survey` where type_id=$id");
$row = mysql_fetch_assoc($res);
$survey_id = $row['id'];
if(empty($survey_id)){
    $q = my_query("delete from `type` where id=$id");
    if($q){
        jump('./listCate.php','删除成功');
    }else{
        jump('./listCate.php','删除失败');
    }
}


$res2 = my_query("select * from `question` where survey_id=$survey_id");
$row2 = mysql_fetch_assoc($res2);
$question_id = $row2['id'];



$a = my_query("delete from `answer` where question_id=$question_id");
if ($a) {
    $b = my_query("delete from `question` where survey_id=$survey_id");
    if ($b) {
        $c = my_query("delete from `survey` where type_id=$id");
        if ($c) {
            $d = my_query("delete from `type` where id=$id");
            if ($d) {
                jump('./listCate.php', '删除成功');
            } else {
                jump('./listCate.php', '删除失败');
            }
        } else {
            jump('./listCate.php', '删除失败');
        }
    } else {
        jump('./listCate.php', '删除失败');
    }
} else {
    jump('./listCate.php', '删除失败');
}


?>