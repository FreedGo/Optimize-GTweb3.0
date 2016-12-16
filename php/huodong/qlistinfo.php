<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query = "select * from phome_ecms_shop where " . $yhadd . "userid='$user[userid]' and ismember=1" . $add . " and classid=76 order by newstime desc limit $offset,$line";
$sql = $empire->query($query);
//返回头条和推荐级别名称
$ftnr = ReturnFirsttitleNameList(0, 0);
$ftnamer = $ftnr['ftr'];
$ignamer = $ftnr['igr'];

$public_diyr['pagetitle'] = '音乐活动 — 好琴声';
$url = "<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid" . $addecmscheck . "'>管理信息</a>&nbsp;(" . $mr[qmname] . ")";
require(ECMS_PATH . 'e/template/incfile/header.php');
?>
	<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
	<script type="text/javascript" src="/js/adress.js"></script>
	<script type="text/javascript">
		$(function () {
			// 发布活动中的 点击查看报名人数的js
			$('.chakanrenshu').click(function (event) {
				$('.renshuMsg').fadeOut('fast');
				$(this).parent('.huodongListRight').siblings('.renshuMsg').fadeIn('fast');
			});
			$('.shutUp').click(function (event) {
				$('.renshuMsg').fadeOut('fast')
			});
			// 发布活动中的 点击查看报名人数的js
			//点击编辑总结
			$('.huodong-sum').on('click', function (event) {
				$(this).parent('.huodongListRight').siblings('.huodong-sum-wrap').show();
			});
			$('.shutUp').on('click', function (event) {
				$('.huodong-sum-wrap').hide();
				$('.loginDown').hide();
			});
		});
	</script>
	<script type="text/javascript">
		function openWindow() {
			var oldValue = {Name: $("#Name").val(), Age: $("#Age").val()};
			var result   = popModal("main1.html", 300, 200, oldValue);
			if (result != null && typeof (result) != "undefined") {
				$("#Name").val(result.Name);
				$("#Age").val(result.Age);
			}
		}
		//输入参数: 路径,宽度,高度,参数(可选)
		function popModal(url, width, height, parameter) {
			var feature = 'dialogWidth=' + width + 'px'
				+ ';dialogHeight=' + height + 'px'
				+ ';dialogTop=' + (screen.height - height) / 2 + 'px'
				+ ';dialogLeft=' + (screen.width - width) / 2 + 'px'
				+ ';help:no;resizable:no;status=no;scroll:no';
			if (typeof(parameter) == "undefined")
				return window.showModalDialog(url, feature);
			else
				return window.showModalDialog(url, parameter, feature);
		}
		//=====================================================================
		//功能说明: 弹出一个窗口
		//输入参数: 路径,窗口名称,宽度,高度
		function pop(helpurl, windowName, width, height) {
			var feature = 'width=' + width
				+ ',height=' + height
				+ ',top=' + (screen.height - height) / 2
				+ ',left=' + (screen.width - width) / 2
				+ ',toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no';
			window.open(huodong - xiugai.html, windowName, feature);
		}
	</script>
	<div class="singleMiddle">
		<!-- 老师管理 -->
		<div class="laoshiguanli">
			<div class="www360buy" style="margin:0 auto">
				<div class="hd">
					<ul>
						<li>已审核活动</li>
						<li>发布活动</li>
						<li>待审核活动</li>
					</ul>
				</div>
				<div class="bd">
					<!-- 已审核的活动列表 -->
					<ul class="huodongList">
						<?
						while ($r = $empire->fetch($sql)) {
							//状态
							$st = '';
							if ($r[istop])//置顶
							{
								$st .= "<font color=red>[顶" . $r[istop] . "]</font>";
							}
							if ($r[isgood])//推荐
							{
								$st .= "<font color=red>[" . $ignamer[$r[isgood] - 1] . "]</font>";
							}
							if ($r[firsttitle])//头条
							{
								$st .= "<font color=red>[" . $ftnamer[$r[firsttitle] - 1] . "]</font>";
							}
							//时间
							$newstime = date("Y-m-d", $r[newstime]);
							$oldtitle = $r[title];
							$r[title] = stripSlashes(sub($r[title], 0, 50, false));
							$r[title] = DoTitleFont($r[titlefont], $r[title]);
							if ($indexchecked == 0) {
								$checked = '<div class="nocheck"></div>';
								$titleurl = 'AddInfo.php?enews=MEditInfo&classid=' . $r[classid] . '&id=' . $r[id] . '&mid=' . $mid . $addecmscheck;//链接
							} else {
								$checked = '<div class="checked"></div>';
								$titleurl = sys_ReturnBqTitleLink($r);//链接
							}
							$plnum = $r[plnum];//评论个数
							//标题图片
							$showtitlepic = "";
							if ($r[titlepic]) {
								$showtitlepic = "<a href='" . $r[titlepic] . "' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";
							}
							//栏目
							$classname = $class_r[$r[classid]][classname];
							$classurl = sys_ReturnBqClassname($r, 9);
							$bclassid = $class_r[$r[classid]][bclassid];
							$br['classid'] = $bclassid;
							$bclassurl = sys_ReturnBqClassname($br, 9);
							$bclassname = $class_r[$bclassid][classname];
							?>
							<li>
								<a href="<?= $titleurl ?>">
									<img src="<?= $r[titlepic] ?>">
								</a>
								<div class="huodongListRight">
									<h2><a href="<?= $titleurl ?>"><?= $r[title] ?></a></h2>
									<p><span>时间：</span><span><?= $r[huodong_1] ?>~<?= $r[huodong_2] ?></span></p>
									<p>
										<span>地点：</span><span><?= $r[ke_province] ?><?= $r[ke_city] ?><?= $r[ke_area] ?><?= $r[dizhi] ?></span>
									</p>
									<p><span>发布人：</span><span><?= $r[faname] ?></span></p>
									<p class="neirongjianjie"><span>内容简介：</span><?= $r[intro] ?></p>

									<!-- 查看报名人数按钮 -->
									<div class="huodongBtn huodong-sum  ">总结</div>
									<div class="huodongBtn huodong-look chakanrenshu ">
										查看
									</div>
									<!--<div class="huodongBtn huodong-editor"><a href="/e/data/html/huodong/huodong-xiugai.html" target="_top">修改</a></div>-->

									<div class="huodongBtn huodong-del">
										<a href="ecms.php?enews=MDelInfo&classid=<?= $r[classid] ?>&id=<?= $r[id] ?>&mid=<?= $mid ?><?= $addecmscheck ?>" onclick="return confirm('确认要删除?');">删除</a>
									</div>
									<!-- 查看报名人数按钮结束 -->

								</div>
								<!-- 活动总结 -->
								<div class="huodong-sum-wrap">
									<i class="shutUp">×</i>
									<form method="POST" enctype="multipart/form-data" action="huodong.zongjie.php">
										<input type="hidden" name="titleid" value="<?= $r[id] ?>"/>
										<h2 class="huodong-sum-head">活动总结</h2>
										<h3 class="huodong-sum-title">当前活动：<?= $r[title] ?></h2>
											<p class="huodong-sum-intro">填写活动总结</p>
<!--											<textarea class="huodong-sum-edi" name="newstext_1">--><?//= $r[newstext_1] ?><!--</textarea>-->
											<script id="UEditor<?= $r[id] ?>" class="huodong-sum-edi" type="text/plain" name="newstext_1"><?= $r[newstext_1] ?></script>
											<script type=text/javascript>
												UE.getEditor("UEditor<?= $r[id] ?>", {
													initialFrameHeight: 300, initialFrameWidth: "100%",
													Ext               : '{"classid":"31","filepass":"1453873531"}'
												})
											</script>
											<input class="huodong-sum-sub" type="submit" value="提交"/>
									</form>
								</div>
								<!-- 报名人数列表 -->
								<div class="renshuMsg">
									<i class="iconfont shutUp">&#xe62e;</i>
									<span class="baomingNum">当前已有<b>
									<?php
									$count = mysql_query("select count(*) from phome_ecms_photo where '$r[id]'=hai_id");
									while ($tmp = mysql_fetch_row($count)) {
										print $tmp[0];
									}
									?>
                                    </b>人报名<a href="http://www.greattone.net/e/zjk/excel/huodong?uid=<?= $userid ?>&amp;id=<?= $r[id] ?>">导出</a></span>
									<div class="inrenshuMsg">
										<ul>
											<!----查看报名----->
											<?
											$friend = "select * from phome_ecms_photo where classid=78 and '$r[id]'=hai_id";
											$list = $empire->query($friend);
											while ($kk = $empire->fetch($list)) {
												$cha = $empire->fetch1("select * from {$dbtbpre}enewsmemberadd a left join {$dbtbpre}ecms_shop b on a.userid=b.userid WHERE a.userid in($kk[userid]) order by a.userid desc");
												?>
												<li class="clearfix">
													<a href="/e/space/?userid=<?= $cha['userid'] ?>"><img src="<?= $cha['userpic'] ?>">&nbsp;&nbsp;&nbsp;<?= $kk['username'] ?>
													</a>
													<span class="phoneName"><?= $kk['hai_name'] ?></span>
													<span class="phoneNum"><?= $kk['hai_phone'] ?></span>
													<span class="sixin"><a class="aa" href="/e/member/msg/AddMsg/?username=<?= $kk['username'] ?>">私信</a></span>
												</li>
												<?
											}
											?>
										</ul>
									</div>
								</div>
								<!-- 报名人数列表结束 -->

							</li>
							<?
						}
						?>
					</ul>
					<!-- 编辑发布活动 -->
					<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'18');">
						<input type=hidden value=MAddInfo name=enews> <input type=hidden value=76 name=classid>
						<input name=id type=hidden id="id" value=>
						<input name=mid type=hidden id="mid" value=18>
						<!----返回地址---->
						<input type="hidden" name="ecmsfrom" value="/e/huodong/ListInfo.php?mid=10/">
						<ul class="lh dengdai fabukecheng">
							<li><span>活动名称：</span><input required type="text" name="title"></li>
							<li>
								<span>活动地点：</span>
								<!-- <div class="info1">
									<div>
									<select id="s_province" name="ke_province"></select>
									<select id="s_city" name="ke_city" ></select>
									<select id="s_county" name="ke_area"></select>
								<script type="text/javascript">_init_area();</script>
									</div>
								</div>
								<script type="text/javascript">
								var Gid  = document.getElementById ;
								var showArea = function(){
									Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
									Gid('s_city').value + " - 县/区" +
									Gid('s_county').value + "</h3>"
															}
								Gid('s_county').setAttribute('onchange','showArea()');
								</script> -->
								<div id="sjld" class="clearix">
									<div class="m_zlxg" id="shenfen">
										<p title="">选择省份</p>
										<div class="m_zlxg2 m_zlxg1">
											<ul>
												<li class="aa a1">北京</li>
												<li class="ss s1">上海</li>
												<li class="tt t1">天津</li>
												<li class="bb a8">重庆</li>
												<li class="tt t2">四川</li>
												<li class="aa a4">贵州</li>
												<li class="tt t3">云南</li>
												<li class="tt t4">西藏</li>
												<li class="hh hh1">河南</li>
												<li class="hh h4">湖北</li>
												<li class="hh h3">湖南</li>
												<li class="bb a5">广东</li>
												<li class="bb a6">广西</li>
												<li class="ll s8">陕西</li>
												<li class="bb a7">甘肃</li>
												<li class="ll s5">青海</li>
												<li class="ll s6">宁夏</li>
												<li class="zz t5">新疆</li>
												<li class="hh h2">河北</li>
												<li class="ss s3">山西</li>
												<li class="ss s4">内蒙古</li>
												<li class="ii h5">江苏</li>
												<li class="zz t6">浙江</li>
												<li class="aa a2">安徽</li>
												<li class="aa a3">福建</li>
												<li class="ii h8">江西</li>
												<li class="ss s2">山东</li>
												<li class="ll s7">辽宁</li>
												<li class="ii h7">吉林</li>
												<li class="ii h6">黑龙江</li>
												<li class="jj h9">海南</li>
												<li class="zz t7">台湾</li>
												<li class="zz t8">香港</li>
												<li class="yy t9">澳门</li>
											</ul>
										</div>
									</div>
									<div class="m_zlxg" id="chengshi">
										<p title="">选择城市</p>
										<div class="m_zlxg2">
											<ul></ul>
										</div>
									</div>
									<div class="m_zlxg" id="quyu">
										<p title="">选择区域</p>
										<div class="m_zlxg2">
											<ul></ul>
										</div>
									</div>
									<input id="sfdq_num" type="hidden" value=""/>
									<input id="csdq_num" type="hidden" value=""/>
									<input id="sfdq_tj" type="hidden" value="" name="ke_province"/>
									<input id="csdq_tj" type="hidden" value="" name="ke_city"/>
									<input id="qydq_tj" type="hidden" value="" name="ke_area"/>
								</div>
								<script type="text/javascript">
									$(function () {
										$("#sjld").sjld("#shenfen", "#chengshi", "#quyu");
									});
								</script>
							</li>
							<li><span>详细地址：</span><input required type="text" name="dizhi"></li>
							<li>
								<span>活动日期：</span>
								<div class="demo4">
									<ul class="inline" id="demo5">
										<input id="start" name="huodong_1" class="laydate-icon" required>
										到：<input id="end" name="huodong_2" class="laydate-icon" required>
									</ul>
								</div>
								<script type="text/javascript">
									!function () {
										laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
										laydate({elem: ''});//绑定元素
									}();

									//日期范围限制
									var start = {
										elem   : '#start',
										format : 'YYYY-MM-DD',
										min    : laydate.now(), //设定最小日期为当前日期
										max    : '2099-06-16', //最大日期
										istime : true,
										istoday: false,
										choose : function (datas) {
											end.min   = datas; //开始日选好后，重置结束日的最小日期
											end.start = datas //将结束日的初始值设定为开始日
										}
									};

									var end = {
										elem   : '#end',
										format : 'YYYY-MM-DD',
										min    : laydate.now(),
										max    : '2099-06-16',
										istime : true,
										istoday: false,
										choose : function (datas) {
											start.max = datas; //结束日选好后，充值开始日的最大日期
										}
									};
									laydate(start);
									laydate(end);

									// //自定义日期格式
									// laydate({
									//     elem: '#demo',
									//     format: 'YYYY年MM月DD日',
									//     festival: true, //显示节日
									//     choose: function(datas){ //选择日期完毕的回调
									//         alert('得到：'+datas);

									//     }
									// });

									// //日期范围限定在昨天到明天
									// laydate({
									//     elem: '#hello3',
									//     min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
									//     max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
									// });

									// 	$(document).ready(function() {
									// 		$('.btn').click(function(event) {
									// 			var z=$('#jiancha1').val();
									// 			console.log(z);
									// 		});


									// 	});
								</script>
							</li>
							<li><span>发布人：</span><input required name="faname" type="text"></li>
							<li><span>活动人数：</span><input required name="pmaxnum" type="text"></li>
							<li>
								<span>活动简介：</span><textarea name="intro" maxlength="100" class="kechengjieshao"></textarea>
							</li>
							<li><span>封面图：</span>
								<!-- <input type="file" name="titlepicfile"> -->
								<script id="upload_ue" name="content" type="text/plain"></script>
								<input type="hidden" id="picture" name="titlepic" value="">
								<div class="imgPre" style="float: left;width:200px;border-radius: 3px;overflow: hidden; ">
									<img id="preview" src="" alt=""></div>
								<a class="datepicker lookBtn2" style="float: left;margin-left: 20px;cursor: pointer;" onclick="upImage()">上传图片</a>
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
											for (var a in arg) {
												imgs += arg[a].src + ',';
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
							</li>
							<li><span>收费类型：</span>
								<label>
									<input name="money_type" type="radio" id="radio" value="人民币" checked="checked"/>
									人民币
									<input type="radio" name="money_type" id="radio" value="新台币"/>
								</label>
								新台币
							</li>
							<li><span>活动金额：</span><input required name="price" type="text"></li>
							<li>
								<span>赛事详情：</span>
								<!-- 预留的div 不要删  在内部插 -->
								<div class="saishixiangqing">
									<div style='background-color:#D0D0D0'>
										<!-- <script type="text/javascript" src="/e/extend/UE/ueditor.config.js"></script>
										<script type="text/javascript" src="/e/extend/UE/ueditor.all.js"></script> -->
										<script id="UEditor" type="text/plain" name="newstext"></script>
										<script type=text/javascript>
											UE.getEditor("UEditor", {
												initialFrameHeight: 300, initialFrameWidth: "100%",
												Ext               : '{"classid":"31","filepass":"1453873531"}'
											})
										</script>
									</div>
								</div>
								<!-- 预留的div -->
							</li>
							<li></li>
							<li><span></span><input class="zongse" type="submit"></li>
							<li></li>
						</ul>
					</form>
					<!-- 待审核的活动列表 -->
					<ul class="huodongList">
						<?
						//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
						$query = "select * from phome_ecms_shop_check where " . $yhadd . "userid='$user[userid]' and ismember=1" . $add . " and classid=76 order by newstime desc limit $offset,$line";
						$sql = $empire->query($query);
						//返回头条和推荐级别名称
						$ftnr = ReturnFirsttitleNameList(0, 0);
						$ftnamer = $ftnr['ftr'];
						$ignamer = $ftnr['igr'];

						while ($r = $empire->fetch($sql)) {
							//状态
							$st = '';
							if ($r[istop])//置顶
							{
								$st .= "<font color=red>[顶" . $r[istop] . "]</font>";
							}
							if ($r[isgood])//推荐
							{
								$st .= "<font color=red>[" . $ignamer[$r[isgood] - 1] . "]</font>";
							}
							if ($r[firsttitle])//头条
							{
								$st .= "<font color=red>[" . $ftnamer[$r[firsttitle] - 1] . "]</font>";
							}
							//时间
							$newstime = date("Y-m-d", $r[newstime]);
							$oldtitle = $r[title];
							$r[title] = stripSlashes(sub($r[title], 0, 50, false));
							$r[title] = DoTitleFont($r[titlefont], $r[title]);
							if ($indexchecked == 0) {
								$checked = '<div class="nocheck"></div>';
								$titleurl = 'AddInfo.php?enews=MEditInfo&classid=' . $r[classid] . '&id=' . $r[id] . '&mid=' . $mid . $addecmscheck;//链接
							} else {
								$checked = '<div class="checked"></div>';
								$titleurl = sys_ReturnBqTitleLink($r);//链接
							}
							$plnum = $r[plnum];//评论个数
							//标题图片
							$showtitlepic = "";
							if ($r[titlepic]) {
								$showtitlepic = "<a href='" . $r[titlepic] . "' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";
							}
							//栏目
							$classname = $class_r[$r[classid]][classname];
							$classurl = sys_ReturnBqClassname($r, 9);
							$bclassid = $class_r[$r[classid]][bclassid];
							$br['classid'] = $bclassid;
							$bclassurl = sys_ReturnBqClassname($br, 9);
							$bclassname = $class_r[$bclassid][classname];
							?>

							<li>
								<img src="<?= $r[titlepic] ?>">
								<div class="huodongListRight">
									<h2><?= $r[title] ?></h2>
									<p><span>时间：</span><span><?= $r[huodong_1] ?>~<?= $r[huodong_2] ?></span></p>
									<p>
										<span>地点：</span><span><?= $r[ke_province] ?><?= $r[ke_city] ?><?= $r[ke_area] ?><?= $r[dizhi] ?></span>
									</p>
									<p><span>发布人：</span><span><?= $r[faname] ?></span></p>
									<p class="neirongjianjie"><span>内容简介：</span><?= $r[intro] ?></p>

									<!-- 查看报名人数按钮 -->
									<div class="chakanrenshu">待审核</div>
									<!-- 查看报名人数按钮结束 -->
								</div>
							</li>
							<?
						}
						?>
					</ul>
				</div>
			</div>
			<!-- 调用slide的js语句 -->
			<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
			<script type="text/javascript">jQuery(".www360buy").slide({delayTime: 0});</script>
			<!-- 调用slide的js语句结束 -->
		</div>
		<!-- 知音动态区域·················································· -->
	</div>

<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>