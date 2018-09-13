<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>创建问卷</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="style/use-method.css" rel="stylesheet">
	</head>
<?php
require_once './init.php';
is_login();
?>
	<body>
			<div class="header-top">
			<nav class="navbar navbar-fixed-top" style="height: 70px;padding-top: 15px;">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="../index.php" target="_self"></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="../index.php" target="_self" style="font-size: 24px;">佩奇问卷网<span class="sr-only">(current)</span></a>
							</li>
							<li>
								<a href="create.php" target="_self" style="font-size: 18px;">创建问卷</a>
							</li>
							<li>
								<a href="./user.php?user_id=<?php echo $_COOKIE['user_id'];?>" style="font-size: 18px;">我的问卷</a>
							</li>
							<li>
								<a href="./mould.php" style="font-size: 18px;">参与调查</a>
							</li>
						</ul>

						<div class="nav navbar-nav" style="float: right;margin-right: 20px;font-size: 16px;margin-top: 10px">
                            <div style="display: inline-block">欢迎您：<span><a href="./user.php"><?php echo $_COOKIE['user_name'];?></a></span></div>
								<div class="log-out" style="display: inline-block;margin-left: 20px"><a href="./logout.php">注销</a></div>
						</div>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>


		<div class="content" style="padding-top: 70px">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6 content-left text-center">
						<div class="">
							<img src="image/icon1.jpg" />
							<h2>创建空白问卷</h2>
							<h3>从一份空白问卷开始创建</h3>
							<a class="btn btn-default" href="create.php" target="_self" role="button">创建问卷</a>
						</div>
						
					</div>
					<div class="col-lg-6 content-right text-center">
						<div class="">
							<img src="image/icon2.jpg" />
							<h2>浏览问卷</h2>
							<h3>填写佩奇问卷提供的专业问卷</h3>
							<a class="btn btn-default" target="_blank" href="mould.php" role="button">问卷中心</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="recommend">
			<div class="container-fluid">
				<div class="page-header">
					<h2>为您推荐</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">

				</div>
				<div class="col-lg-4 .col-md-offset-2">
					<ol>
						<li><a href="mould/view.html">大学生消费观调查问卷</a></li>
						<li><a href="mould/work.html">大学生就业意向调查问卷</a></li>
						<li><a href="mould/work.html">大学生网购调查问卷</a></li>
						<li><a href="mould/view.html">大学生心理健康问卷调查</a></li>
						<li><a href="mould/work.html">社区环境问卷调查</a></li>
						<li><a href="mould/work.html">校园文化建设问卷调查</a></li>
					</ol>
				</div>
				<div class="col-lg-4">
					<ol>
						<li><a href="mould/view.html">大学生心理健康问卷调查</a></li>
						<li><a href="mould/work.html">社区环境问卷调查</a></li>
						<li><a href="mould/work.html">校园文化建设问卷调查</a></li>
						<li><a href="mould/view.html">大学生消费观调查问卷</a></li>
						<li><a href="mould/work.html">大学生就业意向调查问卷</a></li>
						<li><a href="mould/work.html">大学生网购调查问卷</a></li>
					</ol>
				</div>
			</div>
		</div>
		
		<div class="footer text-center">
			<p style="color: #cccccc">Copyright ©E-commerce34 & CSTI34</p>
		</div>
		<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
		<script src="js/jquery.min.js"></script>
		<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>

</html>