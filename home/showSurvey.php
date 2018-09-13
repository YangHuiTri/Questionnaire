<?php
header("Content-Type:text/html;charset=utf-8");
require_once './core/MySQLDB.php';
require_once './init.php';
is_login();
if(isset($_GET['survey_id'])){
    //接收问卷id
    $id = $_GET['survey_id'];
    $res = my_query("select * from `survey` where id=$id");
    $rows = mysql_num_rows($res);
    if($rows == 0){
        die("该问卷不存在，请通过正确方式点击问卷标题进行访问");
    }
}else{
    die("请点击问卷标题进行访问");
}


//var_dump($id);
//die();
//$sql = "select s.title, q.content, a.result from `survey` as s join `question` as q on s.id=q.survey_id ";
//$sql .= "join `answer` as a on q.id=a.question_id ";
//$sql .= "where s.id=$id";
//查询问卷标题
$res = my_query("select * from `survey` where id=$id");
$row = mysql_fetch_assoc($res);
$survey_title = $row['title'];
$sql = "select * from `question` where survey_id=$id";
$res = my_query($sql);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/showSurvey.css">
    <title>Title</title>
</head>
<body>
<div style="position:absolute;z-index:-1;width:100%;height:100%;">
</div>
<form action="analysis.php?survey_id=<?php echo $id;?>" method="post">
    <div id="content">
        <h2><?php echo $survey_title; ?></h2>
        <span style="text-align: center;display: block; font-size: 15px;"><b>请认真填写调查问卷，不要随便，这对我很重要☺☺☺</b></span>
        <div style="border-bottom:1px dashed #ccc;"></div>
        <div id="menu">
            <div>
            <?php
            $i = 1;
            $j = 0;
            $k = 0;
            $l = 0;
            $arr_q = array('first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth');
            $arr_a = array('one','two','three','four','five','six','seven','eight','nine','ten');
            while ($row = mysql_fetch_assoc($res)): ?>
                <h4><?php echo "*&nbsp;".$i++.".&nbsp;&nbsp;";?><input type="text" style="width:600px;border: 0;font-size: medium;font-weight: bold" readonly="readonly" name="<?php echo $arr_q[$l++];?>" value="<?php echo $row['content']; ?>"></h4>
            <div id=<?php echo $arr_a[$j++];?>>
                <?php
                    $question_id = $row['id'];
                    $ans_res = my_query("select * from `answer` where question_id=$question_id");
                    while ($ans_row = mysql_fetch_assoc($ans_res)) {
                        $ans_rows = mysql_num_rows($ans_res);
                        if($ans_rows == 1){
                            echo "<textarea cols='40' rows='5' name={$arr_a[$k]} value={$ans_row['result']} style='resize:none'>{$ans_row['result']}</textarea><br>";
                        }else{
                            //通过循环遍历出每道题的选项
                            echo "<input type='radio' name={$arr_a[$k]} value={$ans_row['result']} style='width:16px;height:16px'/>" . $ans_row['result'] . "<br>";
                        }
                    }
                    $k++;
                ?>
            </div>
                <div style="width:835px; border:1px solid #f5f5f5;"></div>
            <?php endwhile; ?>
            </div>
            <input class="item_submit" type="submit" name="submit" value="提交">
        </div>
    </div>
</form>
</body>
</html>


