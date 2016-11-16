<?php
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接 

$id=$_GET['id'];

//$userid=$_GET['userid'];
$b=$empire->fetch1("select * from phome_zjk_kebiao_tear where id='$id'");

$empire=null; //注消操作类变量 
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>租赁修改</title>
	<link rel="stylesheet" type="text/css" href="http://www.greattone.net//css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="/css/xin_gerenzhongxin.css">
	<link rel="stylesheet" type="text/css" href="/e/data/html/kebiao/lib/lq.datetimepick.css"/>
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script src='/e/data/html/kebiao/lib/selectUi.js' type='text/javascript'></script>
	<script src='/e/data/html/kebiao/lib/lq.datetimepick.js' type='text/javascript'></script>
	<script src="/e/data/html/kebiao/lib/kebiao.js"></script>
	<script type="text/javascript">
		$(function() {
			var fa = $(window.parent.document.getElementById("rent-edi-trigger")),
				fb = $('#rent-page-sub');
				fb.click(function(event) {
//					fa.trigger('click');
//					$('.addKecheng').submit();
//					alert('修改成功');

					parent.location.reload();
				});
		});
	</script>
	<!--		日期控件依赖-->
	<link rel="stylesheet" type="text/css" href="/e/data/html/kebiao/lib/lq.datetimepick.css"/>
	<script src='/e/data/html/kebiao/lib/selectUi.js' type='text/javascript'></script>
	<script src='/e/data/html/kebiao/lib/lq.datetimepick.js' type='text/javascript'></script>
	<script src="/e/data/html/kebiao/lib/kebiao.js"></script>
	<script type="text/javascript">
		$(function () {
			$("#datetimepicker1").on("click",function(e){
				e.stopPropagation();
				$(this).lqdatetimepicker({
					css : 'datetime-hour'
				});
			});
			$("#datetimepicker2").on("click",function(e){
				e.stopPropagation();
				$(this).lqdatetimepicker({
					css : 'datetime-hour'
				});
			});
			$("#datetimepicker3").on("click",function(e){
				e.stopPropagation();
				$(this).lqdatetimepicker({
					css : 'datetime-day',
					dateType : 'D',
					selectback : function(){
					}
				});
			});
		});
		/*字数限制100个*/
		$(function () {
			$("#textInput").on("input propertychange", function() {
				var $this = $(this),
					_val = $this.val(),
					count = "";
				if (_val.length > 100) {
					$this.val(_val.substring(0, 100));
				}
				count = 100 - $this.val().length;
				$("#text-count").text(count);
			});
		});
	</script>
	<!--end日期控件依赖-->
</head>
<body>
<div class="www360buy">
	<div class="bd fabukecheng xiugaikebiao">
		<form id="ediLesson" class="addKecheng" name="add" method="POST" enctype="multipart/form-data" action="/e/kebiao/update.kebiao.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'15');">
			<input type="hidden" name="id" value="<?=$b[id]?>">
			<li class="clearfix">
				<span>课程名称：</span>
				<input required type="text" class="addKeTitle" name="couname" placeholder="最多12个字" maxlength="12" value="<?=$b[couname]?>">
				<i class="comTips"></i>
			</li>
			<li class="clearfix">
				<span>上课地点：</span>
				<input required type="text" class="addKeAddress" name="location" placeholder="最多12个字" maxlength="12" value="<?=$b[location]?>">
				<i class="comTips"></i>
			</li>
			<li class="clearfix">
				<span>上课日期：</span>
				<input required type="text" name="classtime" id="datetimepicker3" class="form-control" value="<?=$b[classtime]?>"/>
				<i class="comTips"></i>
			</li>
			<li class="clearfix">
				<span>开始时间：</span>
				<input required type="text" name="starttime" id="datetimepicker1" class="form-control" value="<?=$b[starttime]?>"/>
				<i class="comTips"></i>
			</li>
			<li class="clearfix">
				<span>结束时间：</span>
				<input required type="text" name="stoptime" id="datetimepicker2" class="form-control"  value="<?=$b[stoptime]?>"/>
				<i class="comTips"></i>
			</li>
			<!--<li class="clearfix">
				<span>重复周数：</span>
				<select class="kebiao-select repeat-weeks" name="repeat" >
					<option value="1">1周</option>
					<option value="2">2周</option>
					<option value="3">3周</option>
					<option value="4">4周</option>
					<option value="5">5周</option>
					<option value="6">6周</option>
					<option value="7">7周</option>
					<option value="8">8周</option>
					<option value="9">9周</option>
					<option value="10">10周</option>
				</select>
			</li>-->
			<li class="clearfix">
				<span>上课学生：</span>
				<input type="text" class="all-stus" required max-length="24" name="stuname" placeholder="请输入学生姓名" value="<?=$b[stuname]?>">
				<i class="comTips"></i>
				<!--								<select class="kebiao-select all-stus" name="" >-->
				<!--									<option value="张三">张三</option>-->
				<!--								</select>-->
			</li>
			</li>
			<li class="clearfix">
				<span>备注：</span>
				<textarea class="kebiao-beizhu" name="remarks" id="textInput" cols="30" rows="10" placeholder="最多100个字"><?=$b[remarks]?></textarea>
				<i class="comTips"></i>
			</li>
			<li class="clearfix">
			<li><span></span><input class="zongse" id="rent-page-sub" type="submit"></li>
			</li>
		</form>
	</div>
</div>
				
</body>
</html>