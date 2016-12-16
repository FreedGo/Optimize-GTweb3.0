<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>[!--pagetitle--] — 好琴声</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/haixuan.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/xin_haixuan-phone.css">
	<script type="text/javascript" src="[!--news.url--]js/jquery-1.11.3.min.js"></script>
	<script language="javascript" src="/js/language.js"></script>
	<script type="text/javascript" src="[!--news.url--]js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript">var actid;  </script>
	<script type="text/javascript" src="[!--news.url--]js/xin_haixuan.js"></script>
	<style type="text/css">
		a.player_control_bar_logo {
			display: none !important;
		}
	</style>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		var ua = navigator.userAgent.toLowerCase();
		if (ua.match(/MicroMessenger/i) == "micromessenger") {
			// 匹配是微信浏览器再去验证微信权限
			// 微信相关分享，1.0获取url发给后台并获取相应其他参数
			var AppID,
			    TimeStamp,
			    NonceStr,
			    Signature,
			    getUrl = location.href.split('#')[0];
			$.ajax({
				url     : '/e/weixin/jssdkone.php',
				type    : 'post',
				dataType: 'json',
				data    : {'urlone': getUrl},
				async   : false,
				timeout : 1000,

			})
				.done(function (msg) {
					console.log("success");
					AppID     = msg.a;
					TimeStamp = msg.b;
					NonceStr  = msg.c;
					Signature = msg.d;
				})
				.fail(function () {
					console.log("error");
				})
				.always(function () {
					console.log("complete");
				});
			// 2.微信权限验证
			wx.config({
				debug    : false,
				appId    : AppID,
				timestamp: TimeStamp,
				nonceStr : NonceStr,
				signature: Signature,
				jsApiList: ['onMenuShareTimeline', "onMenuShareAppMessage", "onMenuShareQQ", "onMenuShareQZone",]
			});
			wx.ready(function () {
				// 3 判断当前版本是否支持指定 JS 接口，支持批量判断
				wx.checkJsApi({
					jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', "onMenuShareQQ", "onMenuShareQZone", "hideMenuItems"],

				});
				var strTiele  = "[!--title--]_[!--class.name--]_[!--bclass.name--]_好琴声";
				var strDesc   = "活动时间：[!--huodong_1--][!--huodong_2--];地址:[!--dizhi--]";
				// var strLink="URL";
				var strImgUrl = "[!--titlepic--]";
				//分享朋友圈
				wx.onMenuShareTimeline({
					title : strTiele, // 分享标题
					desc  : strDesc,//分享描述
					// link : strLink, // 分享链接
					imgUrl: strImgUrl,// 分享图标

				});

				//分享给微信好友
				wx.onMenuShareAppMessage({
					title : strTiele, // 分享标题
					desc  : strDesc,//分享描述
					// link : strLink, // 分享链接
					imgUrl: strImgUrl,// 分享图标
				});

				//分享到QQ
				wx.onMenuShareQQ({
					title : strTiele, // 分享标题
					desc  : strDesc,//分享描述
					// link : strLink, // 分享链接
					imgUrl: strImgUrl,// 分享图标
				});

				//分享到QQ空间
				wx.onMenuShareQZone({
					title : strTiele, // 分享标题
					desc  : strDesc,//分享描述
					// link : strLink, // 分享链接
					imgUrl: strImgUrl,// 分享图标
				});
			});
		}
	</script>
	<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
	<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva_Compatible.js"></script>
</head>
<body>
[!--temp.tou--]
<!-- ······························头部结构····································· -->
<!-- 视频弹出框······················································ -->
<!-- 这里插视频 -->
<div class="shipinDown"></div>
<!-- 视频弹出框结束······················································ -->
<!-- 头部结构结束·························································· -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">
	<!-- 左边二级导航列···················································· -->
	<div class="leftWrap">
		<ol>
			<li><a href="http://www.franzsandner.com/"><img src="[!--news.url--]images/adLeft1.jpg" alt=""></a></li>
			<li><a href="http://www.august-foerster.de/"><img src="[!--news.url--]images/adLeft2.jpg" alt=""></a></li>
			<li><a href="https://falanshande.tmall.com/"><img src="[!--news.url--]images/adLeft3.jpg" alt=""></a></li>
			<li><a href="javascript:;"><img src="[!--news.url--]images/adLeft4.jpg" alt=""></a></li>
		</ol>
	</div>
	<!-- 左边二级导航列结束················································ -->
	<!-- 中间内容部分······················································ -->
	<div class="rightWrap clearfix">
		<!-- 报名框 -->
		<div class="baomingMsg">
			<form name="add" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'20');">
				<input type=hidden value=MAddInfo name=enews> <input type=hidden value=78 name=classid>
				<input name=id type=hidden id="id" value=>
				<input name=mid type=hidden id="mid" value=20>
				<!----返回地址---->
				<input type="hidden" name="ecmsfrom" value="/e/ShopSys/address/ListAddress.php">
				<ul>
					<div class="baomingTitle">
						<h2>活动报名表1</h2>
						<p>请务必填写真实信息</p>
						<input type="hidden" name="bao_type" value="4">
						<input type="hidden" name="title" value="[!--title--]">
						<input type="hidden" name="hai_id" value="<%=date%>">
					</div>
					<table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
						<tr>
							<td width='16%' height=25 bgcolor='ffffff'>姓名：</td>
							<td bgcolor='ffffff'>
								<input name="hai_name" type="text" id="hai_name" required></td>
						</tr>
						<tr>
							<td width='16%' height=25 bgcolor='ffffff'>电话:</td>
							<td bgcolor='ffffff'>
								<input name="hai_phone" type="text" id="hai_phone" required>
							</td>
						</tr>
						<tr>
							<td width='16%' height=25 bgcolor='ffffff'>费用:</td>
							<td bgcolor='ffffff'>
								<span class="baomingfei">[!--price--]元</span></td>
						</tr>
						<input type="hidden" name="hai_id" id="hai_id" value="[!--id--]">
						<input type="hidden" name="hai_cost" value="[!--price--]">
					</table>
					<li>
						<label></label><input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
					</li>
				</ul>
			</form>

		</div>
		<!-- 报名框结束 -->
		<div class="rightBan">
			<div class="mianbaoNav">
				<span><a href="[!--news.url--]">首页</a></span><span>></span><span>
                <a href="[!--news.url--]haixuan">海选</a></span>
			</div>
			<div class="saishiMsg haixuanContent clearfix">
				<img src="[!--titlepic--]">
				<div class="inMsg haixuanMsg">
					<div class="saishiHead">
						<h2>[!--title--]</h2>
					</div>
					<ul>
						<!-- <li><p class="haixuanjianjie">简介简介</p></li> -->
						<li><span>地址：</span><i class="hudongdizhi">[!--dizhi--]</i></li>
						<li><span>活动时间：</span><i>[!--huodong_1--]到[!--huodong_2--]</i></li>
						<li><span>发布人：</span><i><a href="/e/space/?userid=[!--userid--]">[!--username--]</a></i></li>
						<li><span>参加人数：</span><i>[!--pmaxnum--]人</i></li>
						<li><span>活动费用：</span><i>[!--price--]&nbsp;&nbsp;[!--money_type--]</i></li>
						<li><span class="tips-h5">温馨提示：请前往PC页面报名并支付！</span></li>
					</ul>
				</div>
				<div class="canyu">
					<ul>
						<li class="baomingrenshu"><span class="haixuanBtn2">已有<em>
                            <?php
                            $count = mysql_query("select count(*) from phome_ecms_photo where $navinfor[id]=hai_id");
                            while ($tmp = mysql_fetch_row($count)) {
	                            print $tmp[0];
                            }
                            ?>
							<?php
							$time = time();
							$dang = date("Y-m-d", $time);
							if ($dang >= $navinfor[huodong_2]) {
								?>
								<a class="haixuanBtn jieshuBtn">报名结束</a>
								<?
							} else {
								?>
								<a href="http://www.greattone.net/e/template/incfile/huodong/?id=[!--id--]&classid=[!--classid--]" class="baomingBtn haixuanBtn">我要报名</a>
								<?
							}
							?>
                        </em>人报名参加</span>
						</li>
						<li class="clearfix">
							<!--<a href="[!--news.url--]e/member/fava/add/?classid=[!--classid--]&amp;id=[!--id--]"><i class="iconfont">&#xe647;</i><span>收藏</span></a>-->
							<span>分享：</span><!-- JiaThis Button BEGIN -->
							<div class="jiathis_style_32x32" style="float: right;">
								<a class="jiathis_button_weixin"></a>
								<a class="jiathis_button_tsina"></a>
								<a class="jiathis_button_qzone"></a>
								<a class="jiathis_button_tqq"></a>
								<a class="jiathis_button_fb"></a>
								<a href="http://www.jiathis.com/share?uid=2111445" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
								<script>
									var jiathis_config = {
										// url: "http://www.yourdomain.com",
										title  : "[!--title--]_[!--class.name--]_[!--bclass.name--]_好琴声",
										summary: "[!--smalltext--]",
										pic    : "[!--titlepic--]",
										img_url: "[!--titlepic--]"
									}
								</script>
							</div>
							<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2111445" charset="utf-8"></script>
							<!-- JiaThis Button END -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- 第一.全站动态部分············································· -->
		<div class="rightMiddle qzdtList">
			<!-- 内容··························· -->
			<div class="qzdtContent">
				<!-- 第一，当前海选部分····························· -->
				<div class="yinyuemingren">
					<!-- 分类行····································· -->
					<div class="fenlei borTop">
						<ul class="clearfix fenleiFuck">
							<li class="current"><a href="javascript:;" target="_self">活动介绍</a><span></span></li>
							<li><a target="_self" href="javascript:;">活动评论</a><span></span></li>
							<li><a href="javascript:;" target="_self">活动总结</a><span></span></li>
						</ul>
					</div>
					<!-- 分类行结束································· -->
					<!-- 排序行····································· -->

					<!-- 列表内容区域······························· -->
					<div class="liebiao">
						<!---介绍-->
						<ul class="liebiaoFuck liebiaoShow current daDiv clearfix">
							<div class="jieshao">
								[!--newstext--]
							</div>
						</ul>
						<!--评论-->
						<ul class="liebiaoFuck liebiaoShow daDiv clearfix">
							<div class="pinglun">
								[!--temp.chang--]
							</div>
						</ul>
						<!--总结-->
						<ul class="liebiaoFuck liebiaoShow daDiv clearfix">
							<div class="zongjie">
								[!--newstext_1--]
							</div>
						</ul>

					</div>
					<!-- 列表内容区域结束··························· -->
				</div>
				<!-- 当前海选部分结束······························ -->
			</div>
			<!-- 内容··························· -->
		</div>
		<!-- 全站动态内容部分结束······························ -->
	</div>
	<!-- 中间内容部分结束·················································· -->
</div>
<!-- ····························中间结构结束·································· -->
<!-- 底部结构开始································································ -->
[!--temp.wei--]
<!-- 底部结构开始································································ -->
</body>
</html>