<?php
//**************************导出整张问卷******************************
header("Content-Type:text/html;charset=utf-8");
require_once './init.php';
require_once './core/MySQLDB.php';
is_login();
$id = $_GET['id'];   //获取问卷id
$sql = "select * from `survey` where id=$id";
$res = my_query($sql);
$row = mysql_fetch_assoc($res);
$title = $row['title'];    //问卷标题
//$name = $_COOKIE['user_name'];  //获取用户名
$file_name = $title."_".date("YmdHi",time());
$str = '';
$str = "\t".$title."\r\n"."@";
$sql = "select * from `question` where survey_id=$id";
$res2 = my_query($sql);
$i = 1;
$arr = array('A','B','C','D');
while($row2 = mysql_fetch_assoc($res2)){          //遍历问卷题目
    $str .= $i++."、".$row2['content']."\r\n"."@";
    $question_id = $row2['id'];
    $sql = "select * from `answer` where question_id=$question_id";
    $res3 = my_query($sql);
    $j=0;
    while($row3 = mysql_fetch_assoc($res3)){      //遍历每道题目的选项
        $str .= "\t".$arr[$j++]."、".$row3['result']."\r\n"."@";
    }
}
$file1 = "问卷_".$file_name.".txt";
//$file2 = iconv('utf-8','gbk//TRANSLIT',$file1);         //这句话可要可不要了

//file_put_contents($file,$str);
//echo "导出成功\r\n文件保存在目录wenjuan下，文件名为：$file1";


$id = explode('@',$str);
header("Content-type:application/octet-stream");
header("Accept-Ranges:bytes");
header("Content-Disposition:attachment;filename=".$file1);
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Pragma:public");
echo implode("",$id);




?>