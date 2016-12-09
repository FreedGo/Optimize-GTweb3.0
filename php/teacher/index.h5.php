<?php
	$userid=$_GET['userid'];
	if(empty($userid) || $userid==0){
		echo '<meta http-equiv="refresh" content="5;url=http://www.greattone.net"> ';
		exit;
	}
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件
require('../../../class/db_sql.php'); //引入数据库操作文件
$link=db_connect(); //连接MYSQL
$empire=new mysqlquery(); //声明数据库操作类
	$r = $empire->fetch1("select a.cked,a.groupid,a.userid,a.username,b.userpic,a.userfen,b.follownum,b.saytext,b.address,b.address1 from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid where a.userid=$userid limit 1");
    $num=$empire->num("select id from {$dbtbpre}ecms_photo where userid=$userid");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Title</title>
	<link rel="stylesheet" href="/css/xin_base.css">
	<style>
		.f-l-l{
			float: left;
		}
		.f-l-r{
			float: right;
		}
		.main-bg{
			height: 200px;
			width: 100%;
		}
		.main-bg>img{
			height: 200px;
			width: auto;
		}

		.list-item{
			height:40px;
			font: 14px/40px 微软雅黑;
			border-bottom:#fef9e9 solid 1px;
		}
		.member-head{
			position: relative;
			border:none;
		}
		.userpic{
			width:80px;
			height:80px;
			border-radius: 50%;
			overflow: hidden;
			border:#fff solid 2px;
			position: absolute;
			top:-40px;
		}
		.info-lists{
			padding: 0 15px;
		}
		.username{
			padding-left: 100px;
		}
		.username span{
			font-size: 16px;
			float: left;
			margin-right:10px;
			height: 40px;
		}
		.member-tips-tiem{
			width:33%;
			float: left;
			text-align: center;
			display: inline-block;
		}
		.member-intro{
			padding: 15px 0;
			height: auto;
			line-height: 24px;
			border:none;
		}
		.fix-btn{
			position: fixed;
			bottom:0;
			width: 100%;
			background-color: #f8f8f8;
			border-top:#ddd solid 1px;
		}
		.btn-warp{
			width:90%;
			margin:5px auto;

		}
		.list-item-dec{
			width: 80px;
			display: inline-block;
			color: #8c8c8c;
		}
		.btn-item{
			width: 47%;
			border:#ddd solid 1px;
			text-align: center;
			height: 40px;
			line-height: 40px;
			background-color: #fef9e9;
			color: #cb7047;
			font-size: 16px;
			border-radius: 4px;
		}
		.member-intro{
			padding-bottom: 55px;
			text-indent: 2em;
		}
		.username>span>img{
			margin-top: 5px;
		}
	</style>
	<script src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript">
		var ua = navigator.userAgent.toLowerCase();
		if(ua.match(/MicroMessenger/i)=="micromessenger") {
			// 匹配是微信浏览器再去验证微信权限
			var AppID,
			    TimeStamp,
			    NonceStr,
			    Signature,
			    getUrl = location.href.split('#')[0];
			$.ajax({
				url: '/e/weixin/jssdkone.php',
				type: 'post',
				dataType: 'json',
				data: {'urlone':getUrl},
				async: false,
				timeout:1000,

			}).done(function(msg) {
				console.log("success");
				AppID = msg.a;
				TimeStamp = msg.b;
				NonceStr = msg.c;
				Signature = msg.d;
			})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			wx.config({
				debug: false,
				appId: AppID,
				timestamp: TimeStamp,
				nonceStr: NonceStr,
				signature: Signature,
				jsApiList: ['onMenuShareTimeline',"onMenuShareAppMessage","onMenuShareQQ","onMenuShareQZone",]
			});
			wx.ready(function() {
				// 1 判断当前版本是否支持指定 JS 接口，支持批量判断
				wx.checkJsApi({
					jsApiList : ['onMenuShareTimeline','onMenuShareAppMessage',"onMenuShareQQ","onMenuShareQZone","hideMenuItems"],
				});
				var strTiele="<?=$r[username]?>老师的主页 - 好琴声",
					strDesc="好琴声入驻著名音乐老师<?=$r[username]?>老师",
					strImgUrl="<?=$r[userpic]?>";
					if (strImgUrl.substring(0,3) !== 'http'){
						strImgUrl = 'http://www.greattone.net/'+strImgUrl;
					}

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
		}
	</script>
</head>
<body>
	<div class="main-body">
		<div class="main-bg">
			<img src="http://www.greattone.net/images/kongjian_bg.jpg" alt="背景">
		</div>
		<div class="main-info">
			<ul class="info-lists">
				<li class="list-item member-head clearfix">
					<div class="userpic">
						<img src="<?=$r[userpic]?>" alt="<?=$r[username]?>">
					</div>
					<div class="f-l-l username">
						<span><?=$r[username]?></span>
                        <?php
                        	if($r[cked]==1){
								$imgo="http://www.greattone.net/images/yirenzheng.png";
							}else{
								$imgo="http://www.greattone.net/images/weirenzheng.png";
							}
						?>
                        <span><img src="<?=$imgo?>" alt="<?=$r[username]?>"></span>
					</div>
				</li>
				<li class="list-item member-tips clearfix">
					<span class="member-tips-tiem f-l-l">等级:
                    				<?
                                    if ($r[userfen] <= 100) {
                                        echo "一级";
                                    } elseif ($r[userfen] <= 300) {
                                        echo "二级";
                                    } elseif ($r[userfen] <= 800) {
                                        echo "三级";
                                    } elseif ($r[userfen] <= 2000) {
                                        echo "四级";
                                    } elseif ($r[userfen] <= 5000) {
                                        echo "五级";
                                    } elseif ($r[userfen] <= 15000) {
                                        echo "六级";
                                    } elseif ($r[userfen] <= 50000) {
                                        echo "七级";
                                    } elseif ($r[userfen] >= 100000) {
                                        echo "八级";
                                    }else{
										echo "八级";
									}
                                    ?>
                    </span>
					<span class="member-tips-tiem f-l-l">粉丝数:<?= $r[follownum] ?></span>
					<span class="member-tips-tiem f-l-l">发帖:<?=$num?></span>
				</li>
				<li class="list-item clearfix">
					<span class="list-item-dec f-l-l">老师类型:</span>
					<span class="list-item-val f-l-l">
                    	<?php
						if(empty($r[teacher_type])){
							echo "音乐老师";
						}else{
							echo $r[teacher_type];
						}
						?>
                    </span>
				</li>
				<li class="list-item clearfix">
					<span class="list-item-dec f-l-l">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址:</span>
					<span class="list-item-val f-l-l"><?=$r[address]?> <?=$r[address1]?></span>
				</li>
				<li class="list-item member-intro clearfix">
					<?=$r[saytext]?>
				</li>
			</ul>
		</div>
		<div class="fix-btn">
			<div class="btn-warp clearfix">
				<a class="btn-item f-l-l" id="followBtn" href="http://a.app.qq.com/o/simple.jsp?pkgname=com.greattone.greattone" >关注</a>
				<a class="btn-item f-l-r" id="askBtn" href="http://a.app.qq.com/o/simple.jsp?pkgname=com.greattone.greattone" >提问</a>
			</div>
		</div>
	</div>
</body>
</html>
