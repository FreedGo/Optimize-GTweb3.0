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
					},
					events: [
						{
							title: 'All Day Event',
							start: '2016-10-01'
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
							<li class="clearfix"><span>琴房名称：</span><input required type="text" name="title"></li>
							<li class="clearfix"><span>联系电话：</span><input required type="text" name="pbrand"></li>
							<li class="clearfix"><span>琴房价格：</span><input required type="text" name="price" placeholder="元/天"></li>
							<li class="clearfix"><span>人数上限：</span><input required type="text" name="pmaxnum"></li>
	                        <li class="clearfix">
								<span>上传图片：</span>
								<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
	                            <script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
	                            <!--<input type="file" name="titlepicfile" size="45">-->
	                            <script id="upload_ue" name="content" type="text/plain">

							    </script>
							    <input type="hidden" id="picture" name="titlepic" value="">
								<div class="imgPre" style="float: left;width:200px;border-radius: 3px;overflow: hidden; "><img id="preview" src="" alt=""></div>
								<a  class="datepicker lookBtn2" style="float: left;margin-left: 20px;cursor: pointer;" onclick="upImage()">上传图片</a>
								<script type="text/javascript">
									var _editor = UE.getEditor('upload_ue');
					                _editor.ready(function () {
					                     //设置编辑器不可用
					                    //_editor.setDisabled();  这个地方要注意 一定要屏蔽
					                    //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
					                    _editor.hide();

					                    //侦听图片上传
					                    _editor.addListener('beforeinsertimage', function (t, arg) {

					                        //将地址赋值给相应的input,只去第一张图片的路径

					                        var imgs;
					                        for(var a in arg){
					                            imgs +=arg[a].src+',';
					                        }

					                         $("#picture").attr("value", arg[0].src);
					                        //图片预览
					                         $("#preview").attr("src", arg[0].src);
					                    })

					                 });
					                //弹出图片上传的对话框
					                function upImage() {
					                     var myImage = _editor.getDialog("insertimage");
					                     myImage.open();
					                }
								</script>
							</li>
							<li class="clearfix">
								<span>琴房描述：</span>
								<!-- 预留的地div -->
								<div style='background-color:#D0D0D0' class="qinmiao">
									<!--<script type="text/javascript" src="/e/extend/UE/ueditor.config.js"></script>
									<script type="text/javascript" src="/e/extend/UE/ueditor.all.js"></script>-->
									<script id="UEditor" type="text/plain" name="newstext"></script>
									<script type=text/javascript>
											UE.getEditor("UEditor",{initialFrameHeight:300,initialFrameWidth:"100%",Ext:'{"classid":"59","filepass":"1453772598"}'})
									</script>
							</div>
								<!-- 预留的地div -->
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