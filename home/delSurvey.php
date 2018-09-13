<?php
//*****************删除问卷*******************
header("Content-Type:text/html;charset=utf-8");
require_once './core/MySQLDB.php';
require_once './init.php';
is_login();

$id = $_GET['id'];
$sql = "select * from `question` where survey_id=$id";
$res = my_query($sql);
while ($row = mysql_fetch_assoc($res)) {
    $question_id = $row['id'];
    my_query("delete from `answer` where question_id=$question_id");
}
my_query("delete from `question` where survey_id=$id");
$d = my_query("delete from `survey` where id=$id");
if ($d) {
    echo "删除成功";
} else
    echo "删除失败";
?>