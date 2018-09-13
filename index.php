<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width,initial-scale=0"/>-->
    <meta name="viewport" content="width=device-width;initial-scale=1">
    <link href="./home/js/bootstrap.css" rel="stylesheet">
    <script src="./home/js/jquery.min.js"></script>
    <script src="./home/js/bootstrap.min.js"></script>
    <title></title>
    <link rel="stylesheet" href="home/style/index_style.css" type="text/css"/>
</head>
<body>
<!--start header-->
    <header>
        <nav>
            <div class="logo">佩奇问卷网</div>
            <div class="menu">
                <li><a href="#">关于我们</a></li>
                <li><a href="#">帮助中心</a></li>
                <?php
                require_once './home/init.php';
                require_once './home/core/MySQLDB.php';
                if(isset($_COOKIE['role'])){
                    if($_COOKIE['role'] == 0){        //管理员用户登录调到后台
                        jump('./back/index.php');
                    }
                }
                if(isset($_COOKIE['user_name'])){    //登录后显示登录名
                    echo "<a href='home/user.php' style='text-decoration: none;margin-left: 10px'><font color='#FFF'>" ."欢迎您，".$_COOKIE['user_name']."</font></a>";
                }else{
                    echo "<li><a href='home/login.php'>登录</a></li>";
                    echo "<li><a href='home/register.php'>注册</a></li>";
                }
                ?>
            </div>
        </nav>
        <div class="header-main">
            <h1><img src="home/image/slogan_en.png" alt=""/></h1>
            <p>佩奇问卷是一款在线表单制作工具，同时也是强大的客户信息处理和关系管理系统。
                <br/>她可以帮助你轻松完成信息收集与整理，实现客户挖掘与消息推送，并开展持续营销。</p>
            <a onclick="checkLogin()" class="button">免费使用</a>
            <p>使用佩奇网，你可以</p>
            <span class="span">&gt</span>
        </div>
    </header>
<!--start header-->
    <main>
        <div class="section-1">
            <h2>丰富实用的应用场景</h2>
            <div class="classify">
                <ul>
                    <li>
                        <span class="classify-1 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">消费者调研 市场调研 产品调查</div>
                    </li>
                    <li>
                        <span class="classify-2 classify-box"></span>
                        <h6 class="classify-title">满意度调查</h6>
                        <div class="summary">服务调查 教学质量 物业后勤</div>
                    </li>
                    <li>
                        <span class="classify-3 classify-box"></span>
                        <h6 class="classify-title">报名登记表</h6>
                        <div class="summary">活动报名 人员登记 加盟申请</div>
                    </li>
                </ul>
            </div>
            <div class="classify">
                <ul>
                    <li>
                        <span class="classify-4 classify-box"></span>
                        <h6 class="classify-title">考试测评</h6>
                        <div class="summary">学生考试 员工测评 民意测评</div>
                    </li>
                    <li>
                        <span class="classify-5 classify-box"></span>
                        <h6 class="classify-title">投票评选</h6>
                        <div class="summary">才艺比赛 优秀员工 最佳人气</div>
                    </li>
                    <li>
                        <span class="classify-6 classify-box"></span>
                        <h6 class="classify-title">学术调研</h6>
                        <div class="summary">毕业论文 学术课题 教学调查</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section-2">
           <div class="right"><img src="home/image/section1.png" alt=""/></div>
            <div class="left section-text" style="margin-left: 300px">
                <h3>快速轻松创建问卷</h3>
                <ul>
                    <li>27种题型涵盖各种问卷设计需求</li>
                    <li>200000+精品模板供引用</li>
                    <li>逻辑设置可以设置题目间的逻辑关系</li>
                    <li>快速导入已有问卷</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
        </div>
        <div class="clear"></div>
        <div class="section-3">
            <div class="right section-text" style="margin-right: 250px">
                <h3>多种渠道分享</h3>
                <ul>
                    <li>不限答卷收集数量</li>
                    <li>发红包、引导关注等强大的微信匹配功能</li>
                    <li>28种免费的精美主题供选用</li>
                    <li>支持百万级用户同时在线答题</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
            <div class="left">
                <img src="home/image/section2.png" alt=""/>
            </div>
        </div>
        <div class="section-4">
            <div class="right"><img src="home/image/section3.png" alt=""/></div>
            <div class="left section-text" style="margin-left: 300px">
                <h3>实时的分析图表</h3>
                <ul>
                    <li>直接生成各种精美报表</li>
                    <li>问卷数据永久保存和免费下载</li>
                    <li> 数据可直接导入SPSS进行分析</li>
                    <li>交叉分析和数据筛选</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
        </div>
        <div class="clear"></div>
        <?php
        $sql = "select * from `survey`";
        $res2 = my_query($sql);
        $rows = mysql_num_rows($res2);
        if($rows > 8){
            $offset = mt_rand(1,$rows)-9;
            if($offset < 0){
                $offset = 0;
            }
            $sql = "select * from `survey` limit $offset,8";
        }else{
            $sql = "select * from `survey`";
        }
        $res = my_query($sql);
        $i = 1;
        $rows = mysql_num_rows($res);
        ?>
        <div class="section-5" style="background: #5A789C">
            <h3 style="color: #fff">丰富精美de案例</h3>
            <ul>
                <?php while($row = mysql_fetch_assoc($res)):?>
                <li class="box box-<?php if($i%2==0){echo "right";}else{echo "left";}?> box-<?php echo $i++;?>">
                    <h4><a href="home/showSurvey.php?survey_id=<?php echo $row['id'];?>" target="_blank"><?php echo $row['title'];?></a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam
                        at cupiditate dolores eius, eos, eveniet libero nam non
                        nulla officiis optio pariatur quisquam suscipit tempora ullam vero
                        voluptas voluptatum.</p>
                </li>
                <?php endwhile;?>
                <?php if($rows%2==1):?>
                <li class="box box-right box-2">
                    <h4><a href="home/mould/meal.html" target="_blank">订餐服务满意度调查问卷</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam
                        at cupiditate dolores eius, eos, eveniet libero nam non
                        nulla officiis optio pariatur quisquam suscipit tempora ullam vero
                        voluptas voluptatum.</p>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </main>
    <div class="clear"></div>
    <footer>
        <ul>
            <li><h2 style="color: #FFFFFF ">佩奇问卷——信息收集与分析</h2></li>
            <li><a onclick="checkLogin()" class="button">立即使用</a></li>
        </ul>
        <p style="color: #3c3c3c">Copyright ©E-commerce34 & CSTI34</p>
    </footer>
</body>
<script>
    function checkLogin(){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4){
                if(xhr.responseText == "您还未登录，登录后使用"){
                    alert(xhr.responseText);
                    window.location='home/login.php';
                }else{
                    window.location='home/use-method.php';
                }
            }
        }
        xhr.open('get','./home/check.php?num=4');
        xhr.send(null);
    }
</script>
</html>