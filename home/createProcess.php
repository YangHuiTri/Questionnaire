<?php
@header("Content-Type:text/html;charset=utf-8");
require_once './core/MySQLDB.php';
require_once './init.php';
is_login();
//接收前端页面传来的json信息
$info2 = $_POST['info'];
//将json转化为数组
$info = json_decode($info2, 1);

//对问卷标题进行非空检测
$survey_title = escapeString($info['questionTitle']);
if (!empty($survey_title)) {
    $survey_title = sensitive($survey_title);
} else {
    jump('../index.php', '问卷标题不能为空');
}

$length = count($info['questionItems']);//总题目数
//总体数不能超过十题
if($length > 10 || $length < 3){
    jump('./create.php','问卷总题数不能超过十题但不能少于三题',1);
}
if($length == 0){
    jump('./create.php','不能提交空白问卷');
}
//检测题目和选项不能为空
for ($m = 0; $m <= $length - 1; $m++) {
    $question_content = escapeString($info['questionItems'][$m]['QItemsTitle']);//每道问题的题目
    if(empty($question_content)){
        jump('./create.php','问题题目不能为空',1);
    }
    //【count($info['questionItems'][$m]['qListItems']) >0】则表示是选择题而不是填空题
//    if(count($info['questionItems'][$m]['qListItems']) >0){
        $length2 = count($info['questionItems'][$m]['qListItems']);//每道题的选项数
        if($length2 > 4){
            jump('./create.php','选择题不能超过四个选项！！！',1);
        }
        //检测每道题的选项不能为空
        for ($n = 0; $n <= $length2 - 1; $n++){
            $result = escapeString($info['questionItems'][$m]['qListItems'][$n]['value']);//每个选项的值
            if(empty($result)){
                echo '选项不能为空';
                //jump('./create.php','选项不能为空',1);
            }
        }
//    }else{
//        echo "这是填空题吧";
//    }
}

//接收分类信息
$sort = escapeString($_POST['leibie']);



$res = my_query("select * from `type` where name='$sort'");
$row = mysql_fetch_assoc($res);
//从`type`表中查询id放入`survey`表中的type_id
$type_id = $row['id'];
//var_dump($type_id);
//die();
$user_id = $_COOKIE['user_id'];
$create_time = time();
//将问卷标题插入`survey`表中
my_query("insert into `survey` values(null,'$survey_title',$type_id,$user_id,'$create_time',0,0)");
//从`survey`表中查询id放入`question`表中的survey_id
$survey_id = mysql_insert_id();

//$length = count($info['questionItems']);//总题目数
for ($i = 0; $i <= $length - 1; $i++) {
    $question_content = escapeString($info['questionItems'][$i]['QItemsTitle']);//每道问题的题目
    $question_content = sensitive($question_content);

    if(count($info['questionItems'][$i]['qListItems']) >0) {
        my_query("insert into `question` values(null,'$question_content','$survey_id',0)");
        $question_id = mysql_insert_id();//获取刚插入的数据的id
        $length2 = count($info['questionItems'][$i]['qListItems']);//每道题的选项数
        for ($j = 0; $j <= $length2 - 1; $j++) {
            $result = escapeString($info['questionItems'][$i]['qListItems'][$j]['value']);//每个选项的值
            $result = sensitive($result);
            if (empty($result)) {
                jump('./create.php', '选项不能为空');
            }
            my_query("insert into `answer` values(null,'$result',0,$question_id)");
        }
    }else{
        my_query("insert into `question` values(null,'$question_content','$survey_id',1)");
        $question_id = mysql_insert_id();//获取刚插入的数据的id
        my_query("insert into `answer` values(null,'请在此作答',0,$question_id)");
    }
}
//jump('./user.php','问卷创建成功');
echo "<script>alert('问卷创建成功');window.location='./user.php'</script>";
?>