<?php
require_once './init.php';
require_once './core/MySQLDB.php';
require_once './core/page.php';
is_login();
$res = my_query("select * from `type`");

if(isset($_GET['type_id'])){
    $type_id = $_GET['type_id'];
    $res2 = my_query("select * from `survey` where type_id=$type_id and shelves=1");
    $rowCount = mysql_num_rows($res2);
    $maxNum = 5;
    $rowPerPage = 6;
    $url = "./mould.php?type_id=$type_id&";
    $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $offset = ($pageNum - 1) * $rowPerPage;
    $sql = "select * from `survey` where type_id=$type_id and shelves=1 order by create_time desc limit $offset,$rowPerPage";
    $result = my_query($sql);
}elseif(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $res2 = my_query("select * from `survey` where title like '%$keyword%' and shelves=1");
    $rowCount = mysql_num_rows($res2);
    $maxNum = 5;
    $rowPerPage = 6;
    $url = "./mould.php?keyword=$keyword&";
    $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $offset = ($pageNum - 1) * $rowPerPage;
    $sql = "select * from `survey` where title like '%$keyword%' and shelves=1 order by create_time desc limit $offset,$rowPerPage";
    $result = my_query($sql);
}else{
    $res2 = my_query("select * from `survey` where shelves=1");
    $rowCount = mysql_num_rows($res2);
    $maxNum = 5;
    $rowPerPage = 6;
    $url = './mould.php?';
    $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $offset = ($pageNum - 1) * $rowPerPage;
    $sql = "select * from `survey` where shelves=1 order by create_time desc limit $offset,$rowPerPage";
    $result = my_query($sql);
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <title>问卷模板</title>
    <link rel="stylesheet" type="text/css" href="style/mould.css"/>
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
        button {
            width: 80px;
            padding:8px;
            background-color: #428bca;
            color: #fff;
            border-radius: 10px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid transparent;
            font-weight: 800;
            font-size:100%
        }

        .time{
            height: 40px;
            line-height: 20px;
            margin-top: 100px;
        }

    </style>
</head>
<body>
<!--   start   header -->
<header class="main_header">

    <a href="../index.php"><div class="logo" style="font-size: 22px">佩琪问卷网</div></a>
    <div class="login">
        <ul>

            <li><a href="../index.php">首页</a></li>
            <li><a href="user.php">我的问卷</a></li>
            <li><a href="#">帮助中心</a></li>
            <li><a href="#">关于我们</a></li>
        </ul>
    </div>

    <div class="search">
        <form action="mould.php" method="get">
            <input type="text" id="txtInput" name="keyword" class="txtInput" placeholder="请输入要搜索的内容"><button type="submit">搜&nbsp;索</button>
        </form>
    </div>
</header>

<div class="clear"></div>


<!--   start   问卷分类 -->
<div class="nav">
    <ul>
        <?php while($row = mysql_fetch_assoc($res)):?>
        <li><a href="./mould.php?type_id=<?php echo $row['id'];?>&" style="text-decoration: none"><?php echo $row['name'];?></a></li>
        <?php endwhile;?>
    </ul>
</div>
<!-- end 问卷分类-->
<div class="clear"></div>
<?php
//if(isset($_GET['type_id'])){
//    $type_id = $_GET['type_id'];
//    $res2 = my_query("select * from `survey` where type_id=$type_id");
//    $rowCount = mysql_num_rows($res2);
//    $maxNum = 5;
//    $rowPerPage = 6;
//    $url = "./mould.php?type_id=$type_id&";
//    $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
//    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
//    $offset = ($pageNum - 1) * $rowPerPage;
//    $sql = "select * from `survey` limit $offset,$rowPerPage";
//    $result = my_query($sql);
//}else{
//    $res2 = my_query("select * from `survey`");
//    $rowCount = mysql_num_rows($res2);
//    $maxNum = 5;
//    $rowPerPage = 6;
//    $url = './mould.php?';
//    $strPage = page($rowCount, $maxNum, $rowPerPage, $url);
//    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
//    $offset = ($pageNum - 1) * $rowPerPage;
//    $sql = "select * from `survey` limit $offset,$rowPerPage";
//    $result = my_query($sql);
//}
//?>
<!--   start   content -->
<div class="content">
    <div class="container">
        <ul class="block">
            <?php while ($row2 = mysql_fetch_assoc($result)):?>
                <?php
                $title = $row2['title'];
                $user_id = $row2['user_id'];
                $res3 = my_query("select * from `user` where id=$user_id");
                $row3 = mysql_fetch_assoc($res3);
                if(strlen($title) > 33){
                    $title = substr($title,0,33);
                    $title = $title."...";
                }
                ?>
            <li class="box"><a href="./showSurvey.php?survey_id=<?php echo $row2['id'];?>" class="survey-name" style="text-decoration: none" target="_blank"><h2><?php if (isset($_GET['keyword'])){echo str_replace("$keyword","<font color='#20b2aa'>$keyword</font>",$title);}else{echo $title;} ?></h2></a>
<!--                <p>-->
<!--                --><?php //$survey_id = $row2['id'];
//                    $res3 = my_query("select * from `question` where survey_id=$survey_id");
////                    var_dump($res3);
////                    die();
//
//                    for($i=0;$i<2;$i++){
//                        $row3 = mysql_fetch_assoc($res3);
//                        echo substr($row3['content'],0,41)."<br>";
//                        echo "<br>";
//                    }
//                ?>
<!--                </p>-->
                <span>创建人：<?php echo $row3['name'];?></span>
                <div class="time"><?php echo date("H:i, jS F Y",$row2['create_time']);?></div>
            </li>
            <?php endwhile;?>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="pages" align="center"><?php echo $strPage; ?></div>
</div>

<div class="clear"></div>

<footer style="border-top: 1px solid #CCCCCC;">
    <p style="color: #cccccc">Copyright ©E-commerce34 & CSTI34</p>
</footer>
</body>
</html>