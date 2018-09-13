<?php
header ( "Content-type: text/html; charset=UTF-8" ); 
require_once 'jpgraph/jpgraph.php';    
require_once 'jpgraph/jpgraph_bar.php';
$conn = mysql_connect("localhost","root","root") or die("连接服务器失败");
mysql_select_db("php");
mysql_query("set names utf8");

$id = $_GET['id'];
$num_id = $_GET['num_id'];

//$array = array('第一题','第二题','第三题','第四题','第五题','第六题','第七题','第八题','第九题','第十题');


$sql = "select * from answer where question_id='$id'";
$result = mysql_query($sql,$conn);
$rowCount = mysql_num_rows($result);
$data = array();
$datas = array();
$arr = array('A','B','C','D','E');
$i = 0;
while ($row=mysql_fetch_array($result)) {
$data[] = $row["times"];
$datas[] = $arr[$i++];
}

$graph = new Graph(400, 300);     //设置画布大小
$graph->SetScale('textlin');     //设置坐标刻度类型
$graph->SetShadow();    //设置画布阴影

$graph->img->SetMargin(40, 30, 20, 40);    //设置统计图边距

$barplot = new BarPlot($data);    //实例化BarPlat对象

$graph->Add($barplot);

$title = "";
$barplot->value->Show();
$b = $graph->title->Set(iconv("UTF-8","GB2312//IGNORE",$title));     //设置统计图标题
$graph->xaxis->title->Set(iconv("utf-8","gb2312","options"));     //设置X轴名称
$graph->xaxis->SetTickLabels($datas);
$graph->yaxis->title->Set(iconv("utf-8","gb2312",'times'));     //设置y轴名称
$graph->title->SetFont(FF_SIMSUN, FS_BOLD);     //设置标题字体,简体中文，黑体字，
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD);    //设置X轴字体
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);    //设置Y轴字体


$graph->Stroke();     //输出图像
?>