<?php
$userid   =getcvar('mluserid');
?>
<?php
require_once "../weixin/jssdk.php";
$jssdk = new JSSDK("wx61344f87c60e6c9c", "0a00f48e715df119e22583b2c4ec9a43");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>[!--pagetitle--] — 好琴声</title>
	<meta property="og:image" content="[!--titlepic--]"/>
	<meta property="og:description" content="[!--pagetitle--] — 好琴声"/>
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/xin_base.css">

	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/haixuan.css">
	<link rel="stylesheet" type="text/css" href="http://171.11.231.70:2000/upload/css/upload.css" />
	<script type="text/javascript" src="[!--news.url--]js/jquery-1.11.3.min.js"></script>
	<script language="javascript" src="/js/language.js"></script>
	<script type="text/javascript" src="[!--news.url--]js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript">
		var actid = '[!--id--]';
		console.log(actid);
		var actClassid = '[!--classid--]';
		console.log(actClassid);
	</script>
	<script type="text/javascript" >
		$(function() {
			// 点击分类显示不同分类里面的老师
			var ifenlei;
			$('.fenleiFuck li').click(function (event) {

				ifenlei = $(this).index();

				$(this).addClass('current').siblings('li').removeClass('current');
				$('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
			})
		})
	</script>
	<script type="text/javascript" src="[!--news.url--]js/area.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		var TimeStamp,
		    NonceStr,
		    Signature;
		wx.config({
			debug: false,
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: '<?php echo $signPackage["timestamp"];?>',
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: ['onMenuShareTimeline',"onMenuShareAppMessage","onMenuShareQQ","onMenuShareQZone",]
		});
		wx.ready(function() {
			// 1 判断当前版本是否支持指定 JS 接口，支持批量判断
			wx.checkJsApi({
				jsApiList : ['onMenuShareTimeline','onMenuShareAppMessage',"onMenuShareQQ","onMenuShareQZone","hideMenuItems"],

			});
			var strTiele="[!--pagetitle--] — 好琴声";
			var strDesc="地址：[!--dizhi--];活动时间：[!--huodong_1--]到[!--huodong_2--];发布人：[!--username--];参加人数：[!--pmaxnum--]人;活动费用：[!--price--]元";
			// var strLink="URL";
			var strImgUrl="[!--titlepic--]";
			//分享朋友圈
			wx.onMenuShareTimeline({
				title : strTiele, // 分享标题
				desc : strDesc,//分享描述
				// link : strLink, // 分享链接
				imgUrl: strImgUrl,// 分享图标

			});

			//分享给微信好友
			wx.onMenuShareAppMessage({
				title : strTiele, // 分享标题
				desc : strDesc,//分享描述
				// link : strLink, // 分享链接
				imgUrl: strImgUrl,// 分享图标
			});

			//分享到QQ
			wx.onMenuShareQQ({
				title : strTiele, // 分享标题
				desc : strDesc,//分享描述
				// link : strLink, // 分享链接
				imgUrl: strImgUrl,// 分享图标
			});

			//分享到QQ空间
			wx.onMenuShareQZone({
				title : strTiele, // 分享标题
				desc : strDesc,//分享描述
				// link : strLink, // 分享链接
				imgUrl: strImgUrl,// 分享图标
			});
		});
	</script>
	<style type="text/css">
		a.player_control_bar_logo{
			display:none !important;
		}
	</style>
	<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
	<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva_Compatible.js"></script>
	<?php
	$classid=$_GET['classid'];
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.baomingBtn').click(function(event) {
				var OnlineId = '<?=$userid?>',//获取登录ID
				    typeHai = '<?=$classid?>';//获取栏目ID，若值为112，则为乐器品牌报名
				console.log(typeHai);
				if (OnlineId == "") {
					//若没有登录，获取id为空，弹出登录框
					$('#loginBtn').trigger('click');
				} else if( typeHai == '112' ){
					//若值为112，则为乐器品牌报名,跳品牌的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/pinpai/?id='+actid+'&classid='+actClassid;
				} else if( typeHai == '33' ){
					//若值为33，则为精灵的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/jingling/?id='+actid+'&classid='+actClassid;
				} else if( typeHai == '34' ){
					//若值为34，则好琴师的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/qinshi/?id='+actid+'&classid='+actClassid;
				} else if( typeHai == '110' ){
					//若值为110，则为琴行报名,跳琴行的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/qinhang/?id='+actid+'&classid='+actClassid;
				} else if( typeHai == '120' ){
					//若值为120，则为其它报名,跳琴行的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/qita/?id='+actid+'&classid='+actClassid;
				} else  {
					//若值为其他，则为正常报名,跳正常的报名链接
					window.location.href = 'http://www.greattone.net/e/template/incfile/haixuan/?id='+actid+'&classid='+actClassid;
				}
			});
		});
	</script>
</head>
<body>
[!--temp.tou--]
<!-- ······························头部结构····································· -->
<!-- 视频弹出框······················································ -->
<!-- 这里插视频 -->
</div>
<div class="shipinDown"></div>
<!-- 视频弹出框结束······················································ -->
<!-- 头部结构结束·························································· -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">
	<!-- 左边二级导航列···················································· -->
	<div class="leftWrap">
		<ol>
			<li><a href="http://www.franzsandner.com/"><img src="[!--news.url--]images/adLeft.jpg" alt=""></a></li>
			<li><a href="http://www.august-foerster.de/"><img src="[!--news.url--]images/adLeft2.jpg" alt=""></a></li>
			<li><a href="https://falanshande.tmall.com/"><img src="[!--news.url--]images/adLeft3.jpg" alt=""></a></li>
			<li><a href="http://www.oblanc.com.tw/"><img src="[!--news.url--]images/adLeft4.jpg" alt=""></a></li>
		</ol>
	</div>
	<!-- 左边二级导航列结束················································ -->
	<!-- 中间内容部分······················································ -->
	<div class="rightWrap clearfix">
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
						<!--<li><span>发布人：</span><i>[!--username--]</i></li>-->
						<li><span>参加人数：</span><i>[!--pmaxnum--]人</i></li>
						<li><span>活动费用：</span><i>[!--price--]&nbsp;&nbsp;[!--bitype--]</i></i></li>
					</ul>
				</div>
				<div class="canyu">
					<ul>
						<li class="baomingrenshu"><span class="haixuanBtn2">已有<em>
                            <?php
                            if($navinfor[id]==378){
	                            echo 675;
                            }else{
	                            $count=mysql_query("select count(*) from phome_ecms_photo where $navinfor[id]=hai_id");
	                            while($tmp=mysql_fetch_row($count)){
		                            print $tmp[0];
	                            }
                            }
                            ?>
									<?php
									$time = time();
									$dang=date("Y-m-d",$time);
									if($dang > $navinfor[huodong_2]){
										?>
										<a class="haixuanBtn jieshuBtn">报名结束</a>
										<?
									}elseif($navinfor[huodong_1]>$dang){
										?>
										<a class="haixuanBtn jieshuBtn" >报名还未开始</a>
										<?
									}else{
										?>
										<a class="baomingBtn haixuanBtn" >我要报名</a>
										<?
									}
									?>
                        </em>人报名参加</span>
						</li>
						<li class="clearfix">
							<!--<a href="[!--news.url--]e/member/fava/add/?classid=[!--classid--]&amp;id=[!--id--]"><i class="iconfont">&#xe647;</i><span>收藏</span></a>-->
							<span>分享：</span>
							<div class="jiathis_style_32x32" style="float:left">
								<a class="jiathis_button_weixin"></a>
								<a class="jiathis_button_tsina"></a>
								<a class="jiathis_button_qzone"></a>
								<a class="jiathis_button_tqq"></a>
								<a class="jiathis_button_fb"></a>
								<!--<a href="http://www.jiathis.com/share?uid=2111445" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>-->
								<!--<a class="jiathis_counter_style"></a>-->
								<script >
									var jiathis_config = {
										// url: "http://www.yourdomain.com",
										title: "[!--pagetitle--] — 好琴声",
										summary:"[!--guanjian--]",
										pic:"[!--titlepic--]",
										img_url:"[!--titlepic--]"
									}
								</script>
								<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2111445" charset="utf-8"></script>
							</div>
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

				<div class="yinyuemingren hai-star">
					<!-- 分类行····································· -->
					<div class="fenlei borTop">
						<ul class="clearfix fenleiFuck">
							<li class="current"><a href="javascript:;">参赛选手</a><span></span></li>
							<li><a href="javascript:;">活动介绍</a><span></span></li>
							<li><a href="javascript:;">活动评论</a><span></span></li>
							<li><a href="javascript:;">活动总结</a><span></span></li>


						</ul>
					</div>
					<!-- 分类行结束································· -->
					<!-- 排序行····································· -->

					<!-- 列表内容区域······························· -->
					<div class="liebiao">
						<script type="text/javascript" src="/js/hai-list-new-paixu.js"></script>
						<ul class="liebiaoFuck liebiaoShow current clearfix">
							<div class="hai-list-type paixu">
								<span>筛选:</span>
								<dl class="paixufangfa clearfix">
									<dt class="pinpaiSelect on  select1">全部</dt>
									<!--<dt class="pinpaiSelect select2">钢琴</dt>-->
									<!--<dt class="pinpaiSelect select3">提琴</dt>-->
									<!--<dt class="pinpaiSelect select4">吉他</dt>-->
									<!--<dt class="pinpaiSelect select5">其它</dt>-->
								</dl>
								<div class="search star-search">
									<input type="search" class="searchSelect" placeholder="请输入内容" required>
									<i class="iconfont searchSub ">&#xe658;</i>
								</div>
							</div>

							<ol class="liebiaoShow-con on  liebiaoShow-con1">
								<!--原海选的php调用-->
								<?php $num=1?>
								[e:loop={"select * from phome_ecms_photo where hai_id='$navinfor[id]' order by tou_num desc",10,24,0}]
								<?php
								$userr=sys_ShowMemberInfo($bqr[userid],'');
								?>
								<li id="userId<?=$bqr[id]?>">
									<a href="<?=$bqsr['titleurl']?>">
										<?php
										if($bqr[classid]==73){
											echo "<i class='iconfont'>&#xe63b;</i>";
										}
										?>
										<img src="<?=$bqr[hai_photo]?>">
									</a>
									<div class="xingming">
									</div>
									<div class="shenfen xingming">
										<span>参赛者：</span><em><a href="[!--news.url--]e/space/?userid=<?=$bqr[userid]?>"><?=$bqr[hai_name]?>
												<div class="touxiangWrap">
													<img src="<?=$userr[userpic]?>">
													<h3>
														<?
														if($userr[groupid]==1){
															echo $userr[putong_shenfen];//普通会员默认爱乐人
														}elseif($userr[groupid]==2){
															echo $userr[music_star];//音乐之星
														}elseif($userr[groupid]==3){
															echo $userr[teacher_type];//音乐老师
														}elseif($userr[groupid]==4){
															echo "音乐教室";
														}elseif($userr[groupid]==5){
															echo "乐器品牌";
														}
														?>
													</h3><!-- 身份 -->
													<h4>
														<?php
														if($userr[userfen]<=100){
															echo "一级";
														}elseif($userr[userfen]<=300){
															echo "二级";
														}elseif($userr[userfen]<=800){
															echo "三级";
														}elseif($userr[userfen]<=2000){
															echo "四级";
														}elseif($userr[userfen]<=5000){
															echo "五级";
														}elseif($userr[userfen]<=15000){
															echo "六级";
														}elseif($userr[userfen]<=50000){
															echo "七级";
														}elseif($userr[userfen]<=100000){
															echo "八级";
														}else{
															echo "八级";
														}
														?>
													</h4><!-- 等级 -->
												</div>
											</a></em>
									</div>
									<div class=" xingming clearfix">
										<span >播放次数</span><em>：
											<?=$bqr[onclick]?>
										</em>
									</div>
									<div class="depiao xingming">
				                    <span>得票数：<i>
				                      <?=$bqr[tou_num]?>
						                    票</i></span>
									</div>
									<div class="xingming paiming">
										当前排名：第
										<?php
										echo $num++;
										?>名
									</div>
									<div class="xingming paiming">
										<!--占位-->
									</div>
									<span class="dianjichakan ">
			                      <a href="<?=$bqsr['titleurl']?>">投票</a>
			                  </span>
									[!--info.vote--]
								</li>
								[/e:loop]
							</ol>
							<ol class="liebiaoShow-con liebiaoShow-con2">
							</ol>
							<ol class="liebiaoShow-con liebiaoShow-con3">

							</ol>
							<ol class="liebiaoShow-con liebiaoShow-con4">

							</ol>
							<ol class="liebiaoShow-con liebiaoShow-con5">

							</ol>
							<!--这个是搜索内容用的-->
							<ol class="liebiaoShow-con liebiaoShow-con6">

							</ol>
							<!-- 加载动画 -->
							<div class="loaders">
								<div class="loader">
									<div class="loader-inner line-scale">
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
									</div>
								</div>
							</div>

						</ul>

						<!---------介绍--------->
						<ul class="liebiaoFuck liebiaoShow daDiv clearfix">
							<div class="jieshao">
								[!--newstext--]
							</div>
						</ul>
						<!---------评论--------->
						<ul class="liebiaoFuck liebiaoShow daDiv clearfix">
							<div class="pinglun">
								[!--temp.chang--]
							</div>
						</ul>
						<!---------总结--------->
						<ul class="liebiaoFuck liebiaoShow daDiv clearfix">
							<div class="zongjie">
								<!-----总结视频GG----->
								[e:loop={"select zong_video from phome_ecms_shop where id='$navinfor[id]' order by id desc limit 1",10,24,0}]
								<?php
								if(!empty($bqr[zong_video])){
									//视频出来啦
									?>
									<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
									<script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva_Compatible.js"></script>
									<div style="width:960px;height:540px;margin:0 auto;" id="ivaLive"></div>
									<script>
										var ivaInstance=new Iva('ivaLive',{
											appkey:'4yh_rdnre',
											video:'<?=$bqr[zong_video]?>',
											skinSelect: 2,
											autoplay:true,
											right_hand:false,
											memory: false

										});
									</script>
									<?
								}
								?>

								[/e:loop]
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