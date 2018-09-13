<?php
require_once './core/MySQLDB.php';
require_once './init.php';
//echo "<pre>";
//var_dump($_POST);
//var_dump($_GET);
//echo "<hr>";
//接收表单信息
//var_dump(isset($_POST['submit']));
//die();
$survey_id = $_GET['survey_id'];//接收问卷的id
$sql ="select * from `survey` where id=$survey_id";
$ans = my_query($sql);
$ans_row = mysql_fetch_assoc($ans);
$b = $ans_row['shelves'];
if($b == 0){
    //echo "<script>alert('该问卷正在审核中，暂未发布，无法提交');window.location='./user.php'</script>";
    jump('user.php','该问卷正在审核中，暂未发布，无法提交');
}
$res = my_query("select * from `question` where survey_id=$survey_id");
$rows = mysql_num_rows($res);//提交问卷的题目的个数
if(isset($_POST['submit'])){      //通过填写问卷提交之后进入
    $info = $_POST;
    //$arr_q = array('first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth');
    $arr_a = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');
//判断是否有题目没有有选项未勾选
    for ($i = 0; $i < $rows; $i++) {
        if (empty($info[escapeString($arr_a[$i])])) {
            jump("./showSurvey.php?survey_id=$survey_id", '有选项未选择', 1);
        }
    }
    $i = 0;
    $j = 0;
    $k = 0;
    $p = 0;
    $array = array();
    $array2 = array();
    $array3 = array();
    $array4 = array();

    while ($row = mysql_fetch_assoc($res)) {
        $res2 = my_query("select * from `answer` where question_id={$row['id']}");
        $rows1 = mysql_num_rows($res2);
        if($rows1 > 1){
//            $question_id = $row['id'];
//            $res2 = my_query("select * from `answer` where question_id=$question_id");
            //array用来存放每道题的第一个选项，即选项A
            $row2 = mysql_fetch_assoc($res2);
            $array[$i++] = $row2['result'];
            //array2用来存放每道题的第二个选项，即选项B
            $row2 = mysql_fetch_assoc($res2);
            $array2[$j++] = $row2['result'];
            //array3用来存放每道题的第三个选项，即选项C
            $row2 = mysql_fetch_assoc($res2);
            $array3[$k++] = $row2['result'];
            //arra4用来存放每道题的第四个选项，即选项D
            $row2 = mysql_fetch_assoc($res2);
            $array4[$p++] = $row2['result'];
        }
    }

    $flag = array();//针对只选A
    $flag2 = array();//针对只选B
    $flag3 = array();//针对只选C
    $flag4 = array();//针对只选D
    $res3 = my_query("select * from `question` where survey_id=$survey_id");
    $z=0;
    while ($row33 = mysql_fetch_assoc($res3)){
        if($row33['sort_num'] == 0){
            //每道题如果选择的是A则在数组$flag中存放一个数字1,其他的选项则存放0,
            //最后在数组中不存在0则表示全部选了A
            //B、C、D选项同理
            if ($info[$arr_a[$z]] == $array[$z]) {
                $flag[$z] = 1;
            } else {
                $flag[$z] = 0;
            }

            if ($info[$arr_a[$z]] == $array2[$z]) {
                $flag2[$z] = 1;
            } else {
                $flag2[$z] = 0;
            }

            if ($info[$arr_a[$z]] == $array3[$z]) {
                $flag3[$z] = 1;
            } else {
                $flag3[$z] = 0;
            }

            if ($info[$arr_a[$z]] == $array4[$z]) {
                $flag4[$z] = 1;
            } else {
                $flag4[$z] = 0;
            }
            $z++;
        }

    }

    if (!in_array('0', $flag)) {
        jump("./showSurvey.php?survey_id=$survey_id", '不能全部选A');
    }

    if (!in_array('0', $flag2)) {
        jump("./showSurvey.php?survey_id=$survey_id", '不能全部选B');
    }

    if (!in_array('0', $flag3)) {
        jump("./showSurvey.php?survey_id=$survey_id", '不能全部选C');
    }

    if (!in_array('0', $flag4)) {
        jump("./showSurvey.php?survey_id=$survey_id", '不能全部选D');
    }

//测试将填空题的答案存入数据库
//    $res4 = my_query("select * from `question` where survey_id=$survey_id");
//    $t = 1;
//    while($row5 = mysql_fetch_assoc($res4)){
//
//        $ans_result = escapeString($info[$arr_a[$t]]);
//        $question_id = $row5['id'];
//        $res5 = my_query("select * from `answer` where question_id=$question_id");
//        $rows5 = mysql_num_rows($res5);
//        if($rows5 == 1){
//            var_dump($question_id);
//            var_dump($ans_result);
//            //die();
//            //my_query("insert into `answer` values(null,'$ans_result',0,$question_id)");
//        }
//        $t++;
//    }
//提交的已经填写好的问卷如果合法则对该问卷的点击量即字段hit_times加1
    my_query("update `survey` set hit_times=hit_times+1 where id=$survey_id");
//选择的答案在数据库中`answer`表times进行加1操作
    for ($i = 0; $i < $rows; $i++) {
        $ans_result = escapeString($info[$arr_a[$i]]);
        my_query("update `answer` set times=times+1 where result='$ans_result'");
    }
    echo "<script>alert('提交成功，谢谢参与');window.location='./mould.php'</script>";

/*
 * 这段代码不再需要，填写问卷的用户不需要查看问卷分析
 * 填完问卷后执行相应的检测及操作之后直接跳转回首页
 * */
//    $res = my_query("select * from `survey` where id=$survey_id");
//    $row = mysql_fetch_assoc($res);
//    $hit_times = $row['hit_times'];
//    echo "参与人数：".$hit_times;
//    echo "&nbsp;&nbsp;&nbsp;&nbsp;<button onclick='daochu($survey_id)'>导出分析结果</button>";
//    echo "<hr style='border-color: #2e6da4'>";
//
//    $result = my_query("select * from `question` where survey_id=$survey_id");
//    $a = 1;
//    //遍历显示题目和答案
//    while($row3 = mysql_fetch_assoc($result)){
//        echo "<font color='gray' style='font-weight: bold'>第{$a}题：{$row3['content']}</font><br>";
//        $question_id = $row3['id'];
//        $result2 = my_query("select * from `answer` where question_id=$question_id");
//        while($row4 = mysql_fetch_assoc($result2)){
//            echo "&nbsp;&nbsp;&nbsp;&nbsp;选项：<font color='gray' style='font-weight: bold'>{$row4['result']}</font>&nbsp;&nbsp;被选了：<font color='gray' style='font-weight: bold'>{$row4['times']}</font>&nbsp;&nbsp;次<br>";
//        }
//        echo "<hr style='border-color: #2e6da4'>";
//        $a++;
//    }
}else{                         //管理员从后台直接查看问卷分析或者创建者直接查看问卷分析
    $res = my_query("select * from `survey` where id=$survey_id");
    $row = mysql_fetch_assoc($res);
    $hit_times = $row['hit_times'];
    echo "<br>参与人数：<span class='badge'>".$hit_times."</span>";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-info' onclick='daochu($survey_id)'>导出分析结果</button>";
    echo "<hr noshade style='border-color: #2e6da4'>";

    $result = my_query("select * from `question` where survey_id=$survey_id");
    $a = 1;
    $j = 1;
    $k = 1;
    $p = 1;
    while($row3 = mysql_fetch_assoc($result)){
        echo "<font color='2e6da4' style='font-weight: bold'>第{$a}题：{$row3['content']}</font>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' class='btn btn-info' value='图表分析' onclick='reP{$j}()'> 
	            <img src='./core/jpgraph/demo3.php?id={$row3['id']}&num_id={$p}' width='300px' id='oImg{$k}' style='display:none'><br/>";
        $question_id = $row3['id'];
        $result2 = my_query("select * from `answer` where question_id=$question_id");
        while($row4 = mysql_fetch_assoc($result2)){
            echo "&nbsp;&nbsp;&nbsp;&nbsp;选项：<font color='2e6da4' style='font-weight: bold'>{$row4['result']}</font>&nbsp;&nbsp;被选了：<font color='2e6da4' style='font-weight: bold'>{$row4['times']}</font>&nbsp;&nbsp;次<br>";
        }
        echo "<hr noshade style='border-color: #2e6da4'>";
        $a++;
        $j++;
        $k++;
        $p++;
    }
}
?>
<html>
<meta name="viewport" content="width=device-width;initial-scale=1">
<link href="./js/bootstrap.css" rel="stylesheet">
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
    function daochu(id){
        // var xhr = new XMLHttpRequest();
        // xhr.onreadystatechange=function () {
        //     if(xhr.readyState == 4){
        //         alert(xhr.responseText);
        //     }
        // }
        // xhr.open('get','./demo2.php?id='+id);
        // xhr.send(null);
        window.location.href='./demo2.php?id='+id;
    }

    function reP1(){
        var div = document.getElementById('oImg1');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP2(){
        var div = document.getElementById('oImg2');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP3(){
        var div = document.getElementById('oImg3');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP4(){
        var div = document.getElementById('oImg4');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP5(){
        var div = document.getElementById('oImg5');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP6(){
        var div = document.getElementById('oImg6');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP7(){
        var div = document.getElementById('oImg7');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP8(){
        var div = document.getElementById('oImg8');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP9(){
        var div = document.getElementById('oImg9');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
    function reP10(){
        var div = document.getElementById('oImg10');
        if(div.style.display == "none"){
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
</script>
</html>