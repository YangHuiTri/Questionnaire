<?php
//*********************导出问卷调查分析*****************************
header("Content-Type:text/html;charset=utf-8");
require_once './core/MySQLDB.php';
require_once './init.php';
$id = $_GET['id'];
$sql = "select * from `survey` where id=$id";
$res= my_query($sql);
$row = mysql_fetch_assoc($res);
$title = $row['title'];
$hit_times = $row['hit_times'];
$str = "\t$title\r\n@";
$str .= "参与人数：".$hit_times."\r\n@";
$arr = array('A','B','C','D');
$j = 1;
$sql = "select * from `question` where survey_id=$id";
$res2 = my_query($sql);
while ($row2 = mysql_fetch_assoc($res2)){
    $str .= "第".$j++."题".":".$row2['content']."\r\n@";
    $question_id = $row2['id'];
    $sql = "select * from `answer` where question_id=$question_id";
    $res3 = my_query($sql);
    $i = 0;
    while($row3 = mysql_fetch_assoc($res3)){
        $str .= "\t选项".$arr[$i++].":".$row3['result']."\t------被选了".$row3['times']."次\r\n@";
    }
}
$file_name2 = "分析_".$row['title'].".txt";
//$file_name = iconv('utf-8','gbk//TRANSLIT',$file_name2);  //转换字符编码，保存文件名不再乱码

//file_put_contents($file,$str);
//echo "导出成功\r\n文件保存在目录analysis下，文件名为：$file_name2";

$id = explode('@',$str);
header("Content-type:application/octet-stream");
header("Accept-Ranges:bytes");
header("Content-Disposition:attachment;filename=".$file_name2);
header("Expires: 0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Pragma:public");
echo implode("",$id);
?>