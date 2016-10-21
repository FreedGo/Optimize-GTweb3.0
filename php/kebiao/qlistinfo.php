<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select * from phome_ecms_shop where ".$yhadd."userid='$user[userid]' and ismember=1".$add." and classid=59 order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];

$public_diyr['pagetitle']='琴房租赁 — 好琴声';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
	<div class="singleMiddle">
		<!--	课表依赖-->
		<link href='/e/data/html/kebiao/lib/fullcalendar.min.css' rel='stylesheet' />
		<script src='/e/data/html/kebiao/lib/moment.min.js'></script>
		<script src='/e/data/html/kebiao/lib/fullcalendar.min.js'></script>
		<script src="/e/data/html/kebiao/lib/zh-cn.js"></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					theme: false,
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					buttonText:{

						today: '转到今日',
						month: '月视图',
						week: '周视图',
						day: '日视图'
					},
//			defaultDate: '2016-09-12',
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					//月视图下日历格子宽度和高度的比例
					aspectRatio: 1.35,
					//月视图的显示模式，fixed：固定显示6周高；liquid：高度随周数变化；variable: 高度固定
					weekMode: 'liquid',
					//初始化时的默认视图，month、agendaWeek、agendaDay
					defaultView: 'month',
					//agenda视图下是否显示all-day
					allDaySlot: true,
					//agenda视图下all-day的显示文本
					allDayText: '全天',
					//agenda视图下两个相邻时间之间的间隔
					slotMinutes: 30,
					//区分工作时间
					businessHours: true,
					//非all-day时，如果没有指定结束时间，默认执行120分钟
					defaultEventMinutes: 120,
					//设置为true时，如果数据过多超过日历格子显示的高度时，多出去的数据不会将格子挤开，而是显示为 +...more ，点击后才会完整显示所有的数据
					firstDay:0,
					eventLimit: true,
					dayClick: function(date, allDay, jsEvent, view) {
						//单击日历中的某一天时
						console.log(date);
						console.log(allDay);
						console.log(jsEvent);
						console.log(view);
					},
					eventClick: function(calEvent, jsEvent, view) {
						//日历中的某一日程（事件）时，触发此操作
						console.log(calEvent);
						console.log(jsEvent);
						console.log(view);
						$('.itemCon1').empty().html(calEvent.title);//标题
						$('.itemCon2').empty().html(calEvent.title);//地址
						$('.itemCon3').empty().html(calEvent.start._i);//开始
						$('.itemCon4').empty().html(calEvent.end._i);//结束
						$('.itemCon5').empty().html(calEvent.student);//学生
						$('.itemCon6').empty().html(calEvent.status);//课程状态
						$('.itemCon7').empty().html(calEvent.mark);//备注

						$('.single-kecheng').show();


					},
					events: [
						{
							id:'id',                      //标示id，可选
							title: 'All Day Event',       //标题，必选
							start: '2016-10-01 12:00:00', //开始，必选
							end:'2016-10-01 14:00:00',    //结束，必选
							addres:'博特琴行钢琴室',       //上课地点，必选
							student:'张三',               //上课学生，必选
							status:'未开始',              //课程状态，必选
							mark:'复习最多100字',          //备注，必选
							allDay:false,                 //是否全天事件，用于请假，必选
							backgroundColor:'#f00',       //背景色，用于辨识事件状态，可选
							borderColor:'#ff0',           //边框色，可选
							textColor:'#fff'              //文字颜色，可选
						},
						{
							title: 'Long Event',
							start: '2016-10-07',
							end: '2016-10-10'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: '2016-10-09T16:00:00'
						},
						{
							id: 999,
							title: 'Repeating Event',
							start: '2016-10-16T16:00:00'
						},
						{
							title: 'Conference',
							start: '2016-10-11',
							end: '2016-10-13'
						},
						{
							title: 'Meeting',
							start: '2016-10-12T10:30:00',
							end: '2016-10-12T12:30:00'
						},
						{
							title: 'Lunch',
							start: '2016-10-12T12:00:00'
						},
						{
							title: 'Meeting',
							start: '2016-10-12T14:30:00'
						},
						{
							title: 'Happy Hour',
							start: '2016-10-12T17:30:00'
						},
						{
							title: 'Dinner',
							start: '2016-10-12T20:00:00'
						},
						{
							title: 'Birthday Party',
							start: '2016-10-13T07:00:00'
						},
						{
							title: 'Click for Google',
							url: 'http://google.com/',
							start: '2016-10-28'
						}
					],

				});

			});

		</script>
		<!--end   课表依赖-->
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
		<div class="laoshiguanli">
			<div class="www360buy" style="margin:0 auto">
			<div class="hd">
				<ul>
					<li id="rent-edi-trigger">我的课表</li>
					<li>新增课程</li>
					<li class="rent-edi-menu">课程修改</li>
				</ul>
			</div>
			<div class="bd">
					<!-- 我的课表 -->
					<ul class="neibulaoshi">
						<div id='calendar'></div>
						<div class="single-kecheng">
							<i class="shutUp">×</i>
							<div class="single-ke-con">
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">课程名称：</h4>
									<p class="ke-item-con itemCon1">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">上课地点：</h4>
									<p class="ke-item-con itemCon2">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">开始时间：</h4>
									<p class="ke-item-con itemCon3">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">结束时间：</h4>
									<p class="ke-item-con itemCon4">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">上课学生：</h4>
									<p class="ke-item-con itemCon5">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">课程状态：</h4>
									<p class="ke-item-con itemCon6">XXXXXXXXXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<h4 class="ke-itme-tips">课程备注：</h4>
									<p class="ke-item-con itemCon7">XXXXXXXXXXXXXXXXXX
										XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
										XXXXX</p>
								</div>
								<div class="single-ke-item clearfix">
									<button class="single-ke-btn edi-kecheng">修改课程</button>
									<button class="single-ke-btn del-kecheng">删除课程</button>
								</div>
							</div>
						</div>
					</ul>
					<!--end 我的课表 -->
	                <!-- 发布租赁 -->
					<ul class="lh dengdai fabukecheng">
						<form class="addKecheng" name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'15');">
							<input type=hidden value=MAddInfo name=enews> <input type=hidden value=59 name=classid>
							<input name=id type=hidden id="id" value=>
							<input name=mid type=hidden id="mid" value=15>
							<!----返回地址---->
							<style>
								.addKecheng>li{margin-bottom: 20px;}
							</style>
							<input type="hidden" name="ecmsfrom" value="/e/zulin/ListInfo.php?mid=10">
							<li class="clearfix"><span>课程名称：</span><input required type="text" name="title" placeholder="最多12个字"></li>
							<li class="clearfix"><span>上课地点：</span><input required type="text" name="pbrand" placeholder="最多12个字"></li>
							<li class="clearfix"><span>上课日期：</span><input required type="text" name="datepicker" id="datetimepicker3" class="form-control" /></li>
							<li class="clearfix"><span>开始时间：</span><input required type="text" name="datepicker" id="datetimepicker1" class="form-control" /></li>
							<li class="clearfix"><span>结束时间：</span><input required type="text" name="datepicker" id="datetimepicker2" class="form-control" /></li>
							<li class="clearfix">
								<span>重复周数：</span>
								<select class="kebiao-select repeat-weeks" name="" >
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
							</li>
							<li class="clearfix">
								<span>上课学生：</span>
								<select class="kebiao-select all-stus" name="" >
									<option value="张三">张三</option>
								</select>
							</li>
							</li>
							<li class="clearfix">
								<span>课程状态：</span>
								<select class="kebiao-select all-stus" name="" >
									<option value="张三">张三</option>
								</select>
							</li>
							<li class="clearfix">
								<span>备注：</span>
								<textarea class="kebiao-beizhu" name="" id="textInput" cols="30" rows="10" placeholder="最多100个字"></textarea>
							</li>
							<li class="clearfix">
								<li><span></span><input class="zongse" type="submit"></li>
							</li>
						</form>
					</ul>
					<ul class="lh fabukecheng rent-edi-wrap">
					</ul>
			</div>
		</div>
		<!-- 调用slide的js语句 -->
		<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
		<script type="text/javascript">jQuery(".www360buy").slide({delayTime:0,trigger:'click' });</script>
		<!-- 调用slide的js语句结束 -->
		<script type="text/javascript">
			$(function() {//点击弹出琴房租赁修改页面
				var fa = $('.rent-set-sei-btn'),
					fb = $('.rent-edi-wrap'),
					fc = $('.rent-edi-menu'),
					fd,
					fe = fa.siblings('.rent-userid').val(),
					ff = fa.siblings('.rent-classid').val(),
					fg = $('.hd li');
					// fh = $('#rent-page-insert').contents().find('#rent-page-sub');
					fa.on('click', function(event) {
						fc.trigger('click');
						fg.removeClass('on');
						fd=$(this).siblings('.rent-id').val(),
						fb.empty().append('<iframe id="rent-page-insert" name="rent-page-insert" src="/e/data/html/zulin/rent-eid-page.php?id='+fd+'" frameborder="0"  style="width:724px;min-height:960px;"></iframe>').show();
					});
					// fh.on('click', function(event) {
					// 	alert(1);
					// });
			});
		</script>
		</div>
		<!-- 知音动态区域·················································· -->
	</div>
<div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>