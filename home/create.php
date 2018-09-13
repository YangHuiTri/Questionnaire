<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>自定义问卷</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="style/create.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="script/configBase.js"></script>
		<script type="text/javascript" src="script/exam/exam.js"></script>
	</head>
<?php
require_once './init.php';
is_login();
?>
	<body>
			<div class="header-top">
			<nav class="navbar navbar-fixed-top">
				<div class="container-fluid">
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="logo" style="float: left; margin-left: 30px">
							<a href="../index.php" style="font-size: 24px;">佩奇问卷网<span class="sr-only">(current)</span></a>
						</div>
						<ul class="nav navbar-nav" style="float: right;margin-right: 30px">
							<li>
								<a href="create.php" style="font-size: 18px;">首页</a>
							</li>
							<li>
								<a href="create.php" style="font-size: 18px;">创建问卷</a>
							</li>
							<li>
								<a href="./user.php" style="font-size: 18px;">我的问卷</a>
							</li>
							<li>
								<a href="#" style="font-size: 18px;">帮助中心</a>
							</li>

						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>

		<!--主体框架开始-->
		<div class="pagebox" id="pageContentId">
			<div class="home-desktop" id="desktop_scroll">
				<div style="width:1025px; position: relative;">
					<div class="title">
                        <div class="name left" style="font-size: 18px">创建问卷&nbsp;&nbsp;<font size="2px">(题目数量不少于三个不超过十个，选择题不能超过四个选项)</font></div>
						<div class="function left">
							<!--[&nbsp;<a href="javascript:;" onclick="definedLayer('/addTeacherData.html',{},'html');">添加</a>&nbsp;]-->
						</div>
						<div class="clear"></div>
					</div>
					<div class="create-questions-content">
						<div class="exam-nav">
							<div class="exam-item">
								<h4 class="exam-item-title">常用题型<i class="icon-expand"></i></h4>
								<ul class="exam-nav-list" id="ui_sortable_exam">
									<li data-uid="1" data-tempId="drag_choice">
										<a href="javascript:;" data-checkType="1"><i class="icon-singleChoice"></i>单选题</a>
									</li>
									<li data-uid="2" data-tempId="drag_choice">
										<a href="javascript:;" data-checkType="2"><i class="icon-multipleChoice"></i>多选题</a>
									</li>
									<!--<li data-uid="3" data-tempId="drag_choice">
										<a href="javascript:;" data-checkType="1"><i class="icon-picChoice"></i>图片单选</a>
									</li>
									<li data-uid="4" data-tempId="drag_choice">
										<a href="javascript:;" data-checkType="2"><i class="icon-picsChoice"></i>图片多选</a>
									</li>-->
									<li data-uid="5" data-tempId="drag_completion">
										<a href="javascript:;" data-checkType="1"><i class="icon-gapFilling"></i>单行填空</a>
									</li>
									<li data-uid="6" data-tempId="drag_completion">
										<a href="javascript:;" data-checkType="2"><i class="icon-multiRow"></i>多行填空</a>
									</li>
									<li data-uid="7" data-tempId="drag_describe">
										<a href="javascript:;"><i class="icon-describe"></i>描述说明</a>
									</li>
								</ul>
							</div>
						</div>
						<!--出题-->
                        <?php
                        require_once './core/MySQLDB.php';
                        $sql = "select name from `type`";
                        $res = my_query($sql);
                        $i=0;
                        ?>
						<div class="create-questions">
							<div class="questions-head-title">
								<h4 class="h4-bg T_edit T-center" data-Tid="10001" id="questionTitle"><span style="font-size:18px;">调查问卷主题</span></h4></div>
							<select name="sort" id="sort">
                                <?php while($row = mysql_fetch_assoc($res)):?>
								<option value=<?php echo $row['name'];?>><?php echo $row['name'];?></option>
                                <?php endwhile;?>
							</select>
							<table class="questions-items-title">
								<tbody>
									
								</tbody>
							</table>
							<ul class="ui-questions-content-list"></ul>
							<ul class="ui-foot-all-list"></ul>
						</div>
					</div>
					<div style="height:40px; margin: 20px 0; text-align: right;">
						<button type="button" class="cotrlBtn exam-save-btn btnBlue" id="saveQuestion" style="height:40px;width: 140px; font-size:18px;">保存试题</button>
					</div>
				</div>
			</div>

			<!--选择题-->
			<script type="text/html" id="drag_choice">
				<li class="ui-module items-questions">
					<div class="theme-type">
						<div class="module-menu">
							<h4></h4>
							<div class="module-ctrl">
								<a href="javascript:void(0);" class="ui-up-btn" data-tisp="上移"><i class="icon-up"></i></a>
								<a href="javascript:void(0);" class="ui-down-btn" data-tisp="下移"><i class="icon-down"></i></a>
								<a href="javascript:void(0);" class="ui-clone-btn" data-tisp="复制"><i class="icon-clone"></i></a>
								<a href="javascript:void(0);" class="ui-del-btn" data-tisp="删除"><i class="icon-del"></i></a>
							</div>
						</div>
						<div class="ui-drag-area">
							<div class="cq-title T_edit T_plugins" data-Tid="{{itmetid}}"><span style="font-size:16px;">{{if type==1}}单选题目标题{{else if type==2}}多选题目标题{{/if}}</span></div>
						</div>
						<div class="cq-items-content">
							<ul class="cq-unset-list" data-checkType="{{type}}" data-nameStr="{{name}}">
								{{each items as itemData i}}
								<li><label class="input-check"><input type="{{if type==1}}radio{{else if type==2}}checkbox{{/if}}" name="{{name}}" value="{{itemData.value}}"></label>
									<div class="cq-answer-content T_edit T_plugins" data-Tid="{{itemData.tid}}">选项{{i+1}}</div>
								</li>
								{{/each}}
							</ul>
							<div class="cq-items-ctrl">
								<a href="javascript:void(0);" class="ui-add-item-btn" data-tisp="添加"><i class="icon-add"></i></a>
								<a href="javascript:void(0);" class="ui-batch-item-btn" data-tisp="批量添加"><i class="icon-addList"></i></a>
								<a href="javascript:void(0);" class="ui-add-answer-btn" data-tisp="添加答案解析"><i class="icon-assignment"></i></a>
							</div>
						</div>
					</div>
				</li>
			</script>
			<!--填空题-->
			<script type="text/html" id="drag_completion">
				<li class="ui-module items-questions">
					<div class="theme-type">
						<div class="module-menu">
							<h4></h4>
							<div class="module-ctrl">
								<a href="javascript:void(0);" class="ui-up-btn" data-tisp="上移"><i class="icon-up"></i></a>
								<a href="javascript:void(0);" class="ui-down-btn" data-tisp="下移"><i class="icon-down"></i></a>
								<a href="javascript:void(0);" class="ui-clone-btn" data-tisp="复制"><i class="icon-clone"></i></a>
								<a href="javascript:void(0);" class="ui-del-btn" data-tisp="删除"><i class="icon-del"></i></a>
							</div>
						</div>
						<div class="ui-drag-area">
							<div class="cq-title T_edit T_plugins" data-Tid="{{itmetid}}"><span style="font-size:16px;">{{if type==1}}填空题目标题{{else if type==2}}完形填空题目标题{{/if}}</span></div>
						</div>
						<div class="cq-items-content">
							<div class="describe-edit-content T_edit T_plugins" data-tid="{{items[0].tid}}"><span style="line-height: 1.6;12px;">这里是{{if type==1}}填空题目标题{{else if type==2}}完形填空题目标题{{/if}}</span></div>
						</div>
					</div>
				</li>
			</script>
			<!--描述题-->
			<script type="text/html" id="drag_describe">
				<li class="ui-module items-questions">
					<div class="theme-type">
						<div class="module-menu">
							<h4></h4>
							<div class="module-ctrl">
								<a href="javascript:void(0);" class="ui-up-btn" data-tisp="上移"><i class="icon-up"></i></a>
								<a href="javascript:void(0);" class="ui-down-btn" data-tisp="下移"><i class="icon-down"></i></a>
								<a href="javascript:void(0);" class="ui-clone-btn" data-tisp="复制"><i class="icon-clone"></i></a>
								<a href="javascript:void(0);" class="ui-del-btn" data-tisp="删除"><i class="icon-del"></i></a>
							</div>
						</div>
						<div class="ui-drag-area">
							<div class="cq-title T_edit T_plugins" data-Tid="{{itmetid}}"><span style="font-size:16px;">描述题目标题</span></div>
						</div>
						<div class="cq-items-content">
							<div class="describe-edit-content T_edit T_plugins" data-tid="{{items[0].tid}}"><span style="line-height: 1.6;12px;">这里是描述题内容</span></div>
						</div>
					</div>
				</li>
			</script>
			<script type="text/html" id="drag_T_edit">
				<div class="cq-into-edit">
					<div class="add-edit cq-edit-title" contenteditable="true">{{title}}</div>
				</div>
			</script>
			<script type="text/html" id="T_edit_plugins">
				<div class="edit-plug-box">
					<a href="javascript:void(0);"><i class="icon-picChoice"></i></a>
					<a href="javascript:void(0);"><i class="icon-title"></i></a>
				</div>
			</script>
			<script type="text/html" id="ui_additem_content">
				{{each items as itemData i}}
				<li><label class="input-check"><input type="{{if type==1}}radio{{else if type==2}}checkbox{{/if}}" name="{{name}}" value="{{itemData.value}}"></label>
					<div class="cq-answer-content T_edit T_plugins" data-Tid="{{itemData.tid}}">选项{{i+1+index}}</div>
				</li>
				{{/each}}
			</script>
			<script type="text/html" id="analysis_tmp">
				<textarea class="exam-textarea analysis_contx" placeholder="请在此填写答案解析"></textarea>
			</script>
			<script type="text/javascript">
				$(function() {
					exam.init();
                    var dataBase2;
                    var sort;
					$("select").dcselect();
					$('#saveQuestion').on('click', function() {
						var dataBase = {},
							questionItems = [];
						dataBase.questionTitle = $('#questionTitle').html();
						dataBase.questionExamTitle = $('#questionExamTitle').html();
						//封装所有题列表，遍历提取值analysis（答案）、题列表（数组对象）；
						$('.ui-questions-content-list').children('li').each(function(i) {
							var dataTx = {},
								qListItems = [];
							dataTx.QItemsTitle = $(this).find('.cq-title').html();
							//封装单题，遍历提取值name、value、checkCurr（选中状态）；
							$(this).find('ul.cq-unset-list').children('li').each(function(j) {
								var listItems = {};
								listItems.name = $(this).find('input').attr('name');
								listItems.value = $(this).find('input').val();
								listItems.checkCurr = $(this).find('input').prop('checked');
								qListItems.push(listItems)
							});
							dataTx.analysis = $(this).find('.analysis_contx').val() || 0;
							dataTx.qListItems = qListItems;
							questionItems.push(dataTx);
						});
						dataBase.questionItems = questionItems;
						//console.log(JSON.stringify(dataBase));
                        //alert(JSON.stringify(dataBase));

                        dataBase2 = JSON.stringify(dataBase);
                        sort = $('#sort').val();
                        //window.location.href = 'createProcess.php?info='+dataBase2+'&sort='+sort;
					});
                    $('#saveQuestion').click(function () {
                        $('#info').val(dataBase2);
                        $('#leibie').val(sort);
                        $('#form1').submit();
                        //console.log(dataBase2+sort);
                    });

				});
			</script>
		</div>
		<!--主体框架结束-->
            <form action="createProcess.php" method="post" id="form1">
                <input type="hidden" name="info" id="info">
                <input type="hidden" name="leibie" id="leibie">
            </form>
		<div class="footer text-center">
			<p>peiqi.com@2018华东交通大学理工学院</p>
			<p>电子商务&计算机科学与技术</p>
		</div>
		<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
		<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>

</html>