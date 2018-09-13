<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <link rel="stylesheet" href="./style/user.css" type="text/css"/>
    <meta name="viewport" content="width=device-width;initial-scale=1">
    <link href="./js/bootstrap.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <style type="text/css">
        .pages a {
            border-color: #c9c9c9 #bdbdbd #b0b0b0;
            border-image: none;
            border-radius: 3px;
            border-style: solid;
            border-width: 1px;
            color: #666666;
            display: inline-block;
            line-height: 13px;
            margin-right: 3px;
            padding: 6px 10px;
            text-decoration: none;
            vertical-align: top;
        }


        .list{
            width: 300px;
            height: 230px;
            display: inline;
            float: left;
            margin: 30px 20px;
            box-shadow: 0 0 15px;
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
        }
        .list a{
            font-size: 22px;
            width: 300px;
            height: 160px;
            margin: 0 auto;
            line-height: 110px;
            cursor: pointer;
        }

        /*footer{*/
        /*width: 100%;*/
        /*height:60px;   !* footer的高度一定要是固定值*!*/
        /*position:absolute;*/
        /*bottom:0px;*/
        /*left:0px;*/
        /*background: #333;*/
        /*}*/

    </style>
</head>
<?php
require_once './core/MySQLDB.php';
require_once './init.php';
require_once './core/page.php';
is_login();
?>
<body>
<header>
    <nav>
        <div class="logo"><a href="../index.php" style="color: #f1f1f1;text-decoration: none">佩奇问卷网</a></div>
        <ul>
            <li><a href="../index.php">首页</a></li>
            <li><a href="create.php">创建问卷</a></li>
            <li><a href="user.php">我的问卷</a></li>
            <li><a href="./mould.php">参与调查</a></li>
            <li><a href="./logout.php">退出登录</a></li>
        </ul>
    </nav>
    <div class="clear"></div>
    <form action="user.php" method="post" class="research" style="float: right;margin-right: 80px">
        <input type="text" name="keyword" placeholder="请输入搜索的内容"/>
        <button type="submit"></button>
    </form>
</header>
<main>
    <h2 style="float: left;margin-left: 60px"><span><?php echo $_COOKIE['user_name']; ?></span>的问卷</h2>
    <a href="use-method.php" class="add">新建问卷</a>
    <div class="clear" style="width: 90%;margin: 0 auto">
        <hr/>
    </div>
    <div class="list-box" style="width: 1020px;height: 312px; margin: 0 auto;">
        <?php
        $user_id = $_COOKIE['user_id'];
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $sql = "select count(*) as sum from `survey` where title like '%$keyword%' and user_id=$user_id";
            $res = my_query($sql);
            $row = mysql_fetch_assoc($res);
            $rowCount = $row['sum'];
            $maxNum = 5;
            $rowPerPage = 6;
            $url = './user.php?';
            $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
            $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
            $offset = ($pageNum - 1) * $rowPerPage;
            $sql = "select * from `survey` where title like '%$keyword%' and user_id=$user_id order by create_time desc limit $offset,$rowPerPage";
            $result = my_query($sql);
        } else {
            $res = my_query("select * from `survey` where user_id=$user_id");
            $rows = mysql_num_rows($res);
            if ($rows == 0) {
                echo "您还没有创建问卷！！！";
            }
            $rowCount = $rows;
            $maxNum = 5;
            $rowPerPage = 6;
            $url = './user.php?';
            $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
            $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
            $offset = ($pageNum - 1) * $rowPerPage;
            $sql = "select * from `survey` where user_id=$user_id order by create_time desc limit $offset,$rowPerPage";
            $result = my_query($sql);
        }
        ?>
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <li class="list">
                <?php
                $title = $row['title'];
                if(strlen($title) > 33){
                    $title = substr($title,0,33);
                    $title = $title."...";
                }
                ?>
                <a href="showSurvey.php?survey_id=<?php echo $row['id']; ?>" class="survey-name" style="text-decoration: none" target="_blank"><?php if (isset($_POST['keyword'])){echo str_replace("$keyword","<font color='DE5246'>$keyword</font>",$title);}else{echo $title;} ?></a><br/>
                <span><?php if($row['shelves'] == 0){echo "<font color='F07A1B'>审核中</font>";}else{echo "<font color='3B7CB9'>已审核</font>";}?>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>
                <span><?php echo"<button type='button' class='btn btn-primary glyphicon glyphicon-trash' onclick='delSur({$row['id']})'></button>";?></span>
                <span><button type='button' class='btn btn-primary' onclick="window.location.href='./demo.php?id=<?php echo $row['id'];?>'">导出</button></span>
                <span><?php echo "<button type='button' class='btn btn-primary' onclick='analysis({$row['id']})'>analysis</button>";?></span>
                <div class="time"><?php echo date("Y-m-d H:i:s", $row['create_time']); ?></div>
            </li>
        <?php endwhile; ?>
    </div>
    <div class="clear"></div>
    <div class="pages" align="center"><?php echo $strPage; ?></div>
</main>
<div class="clear"></div>
<footer style="text-align: center;border-top: 1px solid #ccc;background: #3B7CB9;padding-bottom: 1px">
    <p style="color: #f1f1f1">Copyright ©E-commerce34 & CSTI34</p>
</footer>
</body>
<script type="text/javascript">
    function delSur(id) {
        if (window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange=function () {
                if(xhr.readyState == 4){
                    alert(xhr.responseText);
                    window.location.reload();
                }
            }
            xhr.open('get','delSurvey.php?id='+id);
            xhr.send(null);
        }
    }
    function analysis(id){
        window.open("./analysis.php?survey_id="+id);
    }
</script>
</html>