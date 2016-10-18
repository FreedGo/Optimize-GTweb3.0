<?php
	$code=$_GET['code'];
	if(!empty($code)){
		$user_info_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx0e7332e9adc4fffc&secret=cf05dfd82133829601b248ac6807488e&code='.$code.'&grant_type=authorization_code';
		$user_info = json_decode(file_get_contents($user_info_url));

$openid = $user_info->openid;
}
require_once "../weixin/jssdk.php";
$jssdk = new JSSDK("wx61344f87c60e6c9c", "0a00f48e715df119e22583b2c4ec9a43");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
	<meta charset="UTF-8">
	<title>[!--hai_name--] - 好琴声</title>
	<base target=_blank>
	<meta property="og:title"              content="[!--hai_name--]参加[!--hai_division--]比赛" />
	<meta property="og:image" content="[!--hai_photo--]"/>
	<meta property="og:description" content="参赛者：[!--hai_name--];赛区：[!--hai_division--];分组：[!--hai_grouping--];目前票数：<?php
	                        $id=$_GET['id'];
	$tou=$empire->fetch1("select tou_num from phome_ecms_photo where id='$id'");
	        echo $tou[tou_num];
	                        ?>票"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/haixuan.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/tupianneiye3.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]e/haitou/new-login-reg/css/style.css">
	<style type="text/css">
		.w3cFocusIn .bd li{width: 980px;}
		.w3cFocusIn .bd li img {max-width: 900px;}
	</style>
    <script type="text/javascript" src="[!--news.url--]js/jquery-1.11.3.min.js"></script>
	<script language="javascript" src="/js/language.js"></script>
	<script type="text/javascript" src="[!--news.url--]js/jquery.SuperSlide.2.1.1.js"></script>
    <!-----获取父页链接---->
	<?php
	$id=$_GET['id'];
	$too=$empire->fetch1("select hai_id,id from phome_ecms_photo where id='$id'");
		$url=$empire->fetch1("select titleurl from phome_ecms_shop where id='$too[hai_id]'");
	?>
	<script type="text/javascript">
		var actid;
		var fatherUrl='<?=$url[titleurl]?>#userId<?=$too[id]?>';
	</script>
	<style type="text/css">
		a.player_control_bar_logo{
		display:none !important;
	}
  	</style>
  	<script type="text/javascript" src="[!--news.url--]e/haitou/new-login-reg/js/common.js" ></script>
  	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        var ua = navigator.userAgent.toLowerCase();
        if(ua.match(/MicroMessenger/i)=="micromessenger") {
            // 匹配是微信浏览器再去验证微信权限
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
                var strTiele="[!--hai_name--]参加[!--hai_division--]比赛";
                var strDesc="选手姓名：[!--hai_name--];赛区：[!--hai_division--];目前票数：<?php $id=$_GET['id'];$tou=$empire->fetch1("select tou_num from phome_ecms_photo where id='$id'");echo $tou[tou_num];?>票";
                // var strLink="URL";
                var strImgUrl="[!--hai_photo--]";
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
    <script type="text/javascript" src="[!--news.url--]e/extend/lgyPl/api.js"></script>
</head>
<body>

<!-- ······························头部结构····································· -->
	[!--temp.tou--]
<!-- 头部结构结束·························································· -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">
	<!-- 左边二级导航列···················································· -->
	<div class="leftWrap">
		<ol>
			<li class=" current">
				<a href="http://www.franzsandner.com/">
					<img src="[!--news.url--]images/adLeft.jpg" alt="">
				</a>
			</li>
			<li >
				<a href="http://www.august-foerster.de/">
					<img src="[!--news.url--]images/adLeft2.jpg" alt="">
				</a>
			</li>
			<li>
				<a href="https://falanshande.tmall.com/">
					<img src="[!--news.url--]images/adLeft3.jpg" alt="">
				</a>
			</li>
			<li>
				<a href="http://www.oblanc.com.tw/">
					<img src="[!--news.url--]images/adLeft4.jpg" alt="">
				</a>
			</li>
		</ol>
	</div>
	<!-- 左边二级导航列结束················································ -->
<?php
	$classid=$_GET['classid'];
	if($classid==112){
	?>
	<!-- 中间内容部分······················································ -->
	<div class="rightWrap clearfix">
		<div class="rightBan">
			<div class="mianbaoNav gg">
				<span><a href="[!--news.url--]">首页</a></span><span>></span><span><a href="[!--news.url--]haixuan">海选</a></span><span>></span><span><a href="javascript:;">赛事详情</a></span>			
			</div>
	  		<div class="saishiHead">
				<h2>[!--hai_petition--]</h2>
			</div>
			<div class="zuozhexinxi">
				<ul class="clearfix" style="border-bottom: #cb7047 solid 1px">
					<li><span>品牌名称：</span><span>[!--hai_name--]</span></li>
<!--					<li><span>上传时间：</span><span><?=$name?></span></li>
-->					<!--<li><span>赛区：</span><span>[!--hai_division--]</span></li>-->
					<li><span>注册国家：</span><span>[!--hai_address--]</span></li>
                    <li><span>观看数量：</span><span class="hongse"><script src=[!--news.url--]e/public/ViewClick/?classid=[!--classid--]&id=[!--id--]&addclick=1></script>次</span></li>
					<li><span>目前票数：</span><span class="hongse">
                    	<?php
                        $id=$_GET['id'];
						$tou=$empire->fetch1("select tou_num from phome_ecms_photo where id='$id'");
						        echo $tou[tou_num];
                        ?>
                    票</span></li>
                    <div class="audition-member-share">
						<!-- JiaThis Button BEGIN -->
                        <div class="jiathis_style_32x32">
                            <a class="jiathis_button_weixin"></a>
                            <a class="jiathis_button_tsina"></a>
                            <a class="jiathis_button_qzone"></a>
                            <a class="jiathis_button_tqq"></a>
                            <a class="jiathis_button_fb"></a>
                            <a href="http://www.jiathis.com/share?uid=2111445" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
                            <a class="jiathis_counter_style"></a>
                        </div>
                        <script type="text/javascript" >
                            var jiathis_config={
                                data_track_clickback:true,
//                                        summary:"摘要",//摘要
//                                        title:"标题",//标题
                                pic:"<?= $userpic ?>",//图片
                                //	url:"url",//url
                                shortUrl:false,
                                hideMore:false
                            }
                        </script>
                        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2111445" charset="utf-8"></script>
                        <!-- JiaThis Button END -->
					</div>
				</ul>
			</div>
			<div class="saishiMsg saishiVideo pic-toupiao clearfix">
				<!-- 此处插入视频 ·························································-->
				<div class="w3cFocus">
					<div class="w3cFocusIn" >
								<div class="bd">
									<ul>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
									</ul>
								</div>
								<div class="hd">
									<ul>
			                        	[!--morepic--]
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
									</ul>
								</div>
							</div>
							<a class="prev"  target="_self"></a>
							<a class="next"  target="_self"></a>
					</div>
					<script type="text/javascript">
			                         // 向服务器请求图片
						$(function() {
							$.ajax({
								url: '/guangchang/photo.php',
								type: 'post',
								dataType: 'html',
								data: {'id_photo' : '[!--id--]'},
							})
							.done(function(msg) {
								console.log("success");
								console.log({'id_photo' : '[!--id--]'})
								console.log(msg);
								$('.bd ul').empty().append(msg);
								$('.hd ul').empty().append(msg);
			                                        jQuery(".w3cFocus").slide({ mainCell:".bd ul", effect:"leftLoop", delayTime:300, autoPlay:true });
							})
							.fail(function() {
								console.log("error");
							}).always(function() {
			                        window.onload=function(){
			                           $('.bd li').css('top',$('.bd ul').height()*0.5);
			                           }
			                       
							});
						});
					</script>	
			  <!-- 此处插入视频 ·························································-->

				<!--投票提示框开始·············································-->
                <!--pc提示弹框-->
                <div class="toupiao-pop toupiao-web">
                    <i class="toupiao-close close-web"></i>
                    <div class="ad-img" id="ad-img-web">
                        <!-- 这里面是广告 -->
                        <script type="text/javascript">
                            var Xsrc = 67+parseInt(Math.random()*3);
                            document.write('<script src='+'http://www.greattone.net/d/js/acmsd/thea'+Xsrc+'.js'+'>'+'<'+'/script>');
                        </script>
                    </div>
                    <div class="toupiao-pop-msg clearfix" >
                        <div class="in-pop-msg f-l-l">
                            <span class="pop-suc-fail">投票成功!</span>
                            <span class="pop-dec">总计<i class="pop-dec-num"></i>票，</span>
                            <span class="pop-list">排名第<i class="pop-list-num"></i>名！</span>
                        </div>
                    </div>
                </div>
                <!--H5提示弹框-->
                <div class="toupiao-pop toupiao-h5">
                    <i class="close close-h5"></i>
                    <div class="ad-img">
                        <!-- 这里面也是广告 -->
                        <script type="text/javascript">
                            var Xsrc = 67+parseInt(Math.random()*3);
                            document.write('<script src='+'http://www.greattone.net/d/js/acmsd/thea'+Xsrc+'.js'+'>'+'<'+'/script>');
                        </script>
                    </div>
                    <div class="toupiao-pop-msg" >
                        <span class="pop-dec">总计<i class="pop-dec-num"></i>票，</span>
                        <span class="pop-list">排名第<i class="pop-list-num"></i>名！</span>
                        <span class="pop-suc-fail">投票成功!</span>
                    </div>
                </div>
                <!--投票提示框结束·············································-->
            </div>
			<div class="toupiao"  style="margin-top:0;">
                <script type="text/javascript" src="/js/toupiao-img.js"></script>
                <?php
                	$r=$empire->fetch1("select hai_id from phome_ecms_photo where id=$navinfor[id]");
                $r=$empire->fetch1("select * from phome_ecms_shop where id=$r[hai_id]");
                $time = time();
                $dang=date("Y-m-d",$time);
                if($dang > $r[huodong_2]){

                $follow='<a target="_self" class="button blue ">投票结束</a>';
                }else{
                $follow='<a onclick="follow('.$navinfor[id].')" target="_self" class="button blue " id="follow'.$navinfor[id].'">点击投票</a>';
                }
                ?>
                <?=$follow?>
            </div>

            <div class="hai-con">[!--smalltext--]</div>
            <div class="video-ad" style="width: 960px;height: 90px; margin:10px 0;">
                    <script src="http://www.greattone.net/d/js/acmsd/thea65.js"></script>
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
								<li class="current"><a href="javascript:;">评论</a><span></span></li>
							</ul>
						</div>
						<!-- 分类行结束································· -->
						<!-- 排序行····································· -->

						<!-- 列表内容区域······························· -->
						<div class="liebiao">
								<!-- 此处插入畅言······················· -->
								<div class="pl-520am" data-id="[!--id--]" data-classid="[!--classid--]"></div>
								<!-- 此处插入畅言······················ -->
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
	<?
	}else{
	?>
	<!-- 中间内容部分······················································ -->
	<div class="rightWrap clearfix">
		<div class="rightBan">
			<div class="mianbaoNav gg">
				<span><a href="[!--news.url--]">首页</a></span><span>></span><span><a href="[!--news.url--]haixuan">海选</a></span><span>></span><span><a href="javascript:;">赛事详情</a></span>
			</div>
	  		<div class="saishiHead">
				<h2>[!--hai_petition--]</h2>
			</div>
			<div class="zuozhexinxi">
				<ul class="clearfix" style="border-bottom: #cb7047 solid 1px">
					<!-- 头像框 -->
                    <div class="zhuozhe-img f-l-l">
                        <?
                            $id=$_GET['id'];
                            $haipic=$empire->fetch1("select userid from phome_ecms_photo where id=$id");
                            $poto=$empire->fetch1("select userpic from phome_enewsmemberadd where userid=$haipic[userid]");
                        ?>
                        <a class="f-l-l" href="/e/space/?userid=<?=$haipic[userid]?>">
                            <img src="<?=$poto[userpic]?>" alt="">
                        </a>
                        <div class="zuozhe-msg f-l-l">
                            <h2 class="zuozhe-name">[!--hai_name--]</h2>
                            <h2 class="zuozhe-price">
                            	<?php
                					$poto=$empire->fetch1("select userfen from phome_enewsmember where userid=$haipic[userid]");
                                	if($r[userfen]<=100){
                                        echo "一级";
                                    }elseif($r[userfen]<=300){
                                    	 echo "二级";
                                    }elseif($r[userfen]<=800){
                                    	 echo "三级";
                                    }elseif($r[userfen]<=2000){
                                    	 echo "四级";
                                    }elseif($r[userfen]<=5000){
                                    	 echo "五级";
                                    }elseif($r[userfen]<=15000){
                                    	 echo "六级";
                                    }elseif($r[userfen]<=50000){
                                    	 echo "七级";
                                    }elseif($r[userfen]>100000){
                                    	 echo "八级";
                                    }else{
                    					echo "八级";
                    				}
                                ?>
                            </h2>
                        </div>
                    </div>
					<!-- <li><span>选手姓名：</span><span>[!--hai_name--]</span></li> -->
<!--					<li><span>上传时间：</span><span><?=$name?></span></li>
-->					<li><span>赛区：</span><span>[!--hai_division--]</span></li>
					<li><span>分组：</span><span>[!--hai_grouping--]</span></li>
                    <li><span>观看数量：</span><span class="hongse"><script src=[!--news.url--]e/public/ViewClick/?classid=[!--classid--]&id=[!--id--]&addclick=1></script>次</span></li>
					<li><span>目前票数：</span><span class="hongse">
                    	<?php
                        $id=$_GET['id'];
						$tou=$empire->fetch1("select tou_num from phome_ecms_photo where id='$id'");
						        echo $tou[tou_num];
                        ?>
                    票</span></li>
                    <div class="audition-member-share">
						<!-- JiaThis Button BEGIN -->
                        <div class="jiathis_style_32x32">
                            <a class="jiathis_button_weixin"></a>
                            <a class="jiathis_button_tsina"></a>
                            <a class="jiathis_button_qzone"></a>
                            <a class="jiathis_button_tqq"></a>
                            <a class="jiathis_button_fb"></a>
                            <a href="http://www.jiathis.com/share?uid=2111445" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
                            <a class="jiathis_counter_style"></a>
                        </div>
                        <script type="text/javascript" >
                            var jiathis_config={
                                data_track_clickback:true,
//                                        summary:"摘要",//摘要
//                                        title:"标题",//标题
                                pic:"<?= $userpic ?>",//图片
                                //	url:"url",//url
                                shortUrl:false,
                                hideMore:false
                            }
                        </script>
                        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2111445" charset="utf-8"></script>
                        <!-- JiaThis Button END -->
					</div>
				</ul>
			</div>
			<div class="saishiMsg saishiVideo pic-toupiao clearfix">
				<!-- 此处插入视频 ·························································-->
				<div class="w3cFocus">
					<div class="w3cFocusIn" >
								<div class="bd">
									<ul>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
										<li ><a target="_blank" href="javascript:;"><img src="/images/logo.png" /></a></li>
									</ul>
								</div>
								<div class="hd">
									<ul>
			                        	[!--morepic--]
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
										<li><img src="/images/logo.png" /></li>
									</ul>
								</div>
							</div>
							<a class="prev"  target="_self"></a>
							<a class="next"  target="_self"></a>
					</div>
					<script type="text/javascript">
			                         // 向服务器请求图片
						$(function() {
							$.ajax({
								url: '/guangchang/photo.php',
								type: 'post',
								dataType: 'html',
								data: {'id_photo' : '[!--id--]'},
							})
							.done(function(msg) {
								console.log("success");
								console.log({'id_photo' : '[!--id--]'})
								console.log(msg);
								$('.bd ul').empty().append(msg);
								$('.hd ul').empty().append(msg);
			                                        jQuery(".w3cFocus").slide({ mainCell:".bd ul", effect:"leftLoop", delayTime:300, autoPlay:true });
							})
							.fail(function() {
								console.log("error");
							}).always(function() {
			                        window.onload=function(){
			                           $('.bd li').css('top',$('.bd ul').height()*0.5);
			                           }

							});
						});
					</script>

			  <!-- 此处插入视频 ·························································-->
				<!--投票提示框开始·············································-->
                <!--pc提示弹框-->
                <div class="toupiao-pop toupiao-web">
                    <i class="toupiao-close close-web"></i>
                    <div class="ad-img" id="ad-img-web">
                        <!-- 这里面是广告 -->
                        <script type="text/javascript">
                            var Xsrc = 67+parseInt(Math.random()*3);
                            document.write('<script src='+'http://www.greattone.net/d/js/acmsd/thea'+Xsrc+'.js'+'>'+'<'+'/script>');
                        </script>
                    </div>
                    <div class="toupiao-pop-msg clearfix" >
                        <div class="in-pop-msg f-l-l">
                            <span class="pop-suc-fail">投票成功!</span>
                            <span class="pop-dec">总计<i class="pop-dec-num"></i>票，</span>
                            <span class="pop-list">排名第<i class="pop-list-num"></i>名！</span>
                        </div>
                    </div>
                </div>
                <!--H5提示弹框-->
                <div class="toupiao-pop toupiao-h5">
                    <i class="close close-h5"></i>
                    <div class="ad-img">
                        <!-- 这里面也是广告 -->
                        <script type="text/javascript">
                            var Xsrc = 67+parseInt(Math.random()*3);
                            document.write('<script src='+'http://www.greattone.net/d/js/acmsd/thea'+Xsrc+'.js'+'>'+'<'+'/script>');
                        </script>
                    </div>
                    <div class="toupiao-pop-msg" >
                        <span class="pop-dec">总计<i class="pop-dec-num"></i>票，</span>
                        <span class="pop-list">排名第<i class="pop-list-num"></i>名！</span>
                        <span class="pop-suc-fail">投票成功!</span>
                    </div>
                </div>
                <!--投票提示框结束·············································-->
            </div>
			<div class="toupiao"  style="margin-top:0;">
                <script type="text/javascript" src="/js/toupiao-img.js"></script>
                <?php
                	$r=$empire->fetch1("select hai_id from phome_ecms_photo where id=$navinfor[id]");
                $r=$empire->fetch1("select * from phome_ecms_shop where id=$r[hai_id]");
                $time = time();
                $dang=date("Y-m-d",$time);
                if($dang > $r[huodong_2]){

                $follow='<a target="_self" class="button blue ">投票结束</a>';
                }else{
                $follow='<a onclick="follow('.$navinfor[id].')" target="_self" class="button blue " id="follow'.$navinfor[id].'">点击投票</a>';
                }
                ?>
                <?=$follow?>
            </div>
            <div class="hai-con">[!--smalltext--]</div>
            <div class="video-ad" style="width: 960px;height: 90px; margin:10px 0;">
                    <script src="http://www.greattone.net/d/js/acmsd/thea65.js"></script>
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
								<li class="current"><a href="javascript:;">评论</a><span></span></li>
							</ul>
						</div>
						<!-- 分类行结束································· -->
						<!-- 排序行····································· -->

						<!-- 列表内容区域······························· -->
						<div class="liebiao">
								<!-- 此处插入畅言······················· -->
								<div class="pl-520am" data-id="[!--id--]" data-classid="[!--classid--]"></div>
								<!-- 此处插入畅言······················ -->
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
	<?
	}
?>
	<!-- 手机端新版注册登录界面开始 -->
	<div class="new-lgn-reg img-reg">
		<div class="login-container">
			<h3 class="otherLoginHead">使用其他账号登录好琴声</h3>
			<div class="otherLogin clearfix">
				<script >
					var getUserid2 = 0;//档移动设备访问时，获取openid给此变量赋值
					//微信登录
					$(function(){
						var GetUrl = encodeURIComponent(window.location.href);//获取当前页面URL，并编码
						//向微信授权登陆接口发送消息
						$('.weixinLogin').attr('href','https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx0e7332e9adc4fffc&redirect_uri='+GetUrl+'&response_type=code&scope=snsapi_userinfo#wechat_redirect');
						var Getcode = '<?=$openid?>';
						if (Getcode != '0'){getUserid2 = Getcode};//把获取到的从code值当作了openid，未做完
					})
					//
				</script>
				<a href="" class="qqLogin f-l-l" target="_self">QQ登录</a>
				<a  class="weixinLogin f-l-l" target="_self">微信登录</a>
				<script>
					// facebook登录
					function statusChangeCallback(response) {
						console.log('statusChangeCallback');
						console.log(response);
						if (response.status === 'connected') {
							testAPI();
							//当status为connected时，即可给getUserid2赋值
							var uid = response.authResponse.userID;
							var accessToken = response.authResponse.accessToken;
							getUserid2 = uid;
						} else if (response.status === 'not_authorized') {
							// The person is logged into Facebook, but not your app.
							//                        document.getElementById('status').innerHTML = 'Please log ' +
							//                                'into this app.';
						} else {
							// The person is not logged into Facebook, so we're not sure if
							// they are logged into this app or not.
							//                        document.getElementById('status').innerHTML = 'Please log ' +
							//                                'into Facebook.';
						}
					}

					// This function is called when someone finishes with the Login
					// Button.  See the onlogin handler attached to it in the sample
					// code below.
					function checkLoginState() {
						FB.getLoginStatus(function(response) {
							statusChangeCallback(response);
						});
					}

					window.fbAsyncInit = function() {
						FB.init({
							appId      : 147509055691991,
							cookie     : true,  // enable cookies to allow the server to access
												// the session
							xfbml      : true,  // parse social plugins on this page
							version    : 'v2.5' // use graph api version 2.5
						});

						FB.getLoginStatus(function(response) {
							statusChangeCallback(response);
						});

					};

					// Load the SDK asynchronously
					(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/sdk.js";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));

					// Here we run a very simple test of the Graph API after login is
					// successful.  See statusChangeCallback() for when this call is made.
					function testAPI() {
						console.log('Welcome!  Fetching your information.... ');
						FB.api('/me', function(response) {
							console.log(response);
							console.log('Successful login for: ' + response.name);
							document.getElementById('status').innerHTML =
									'Thanks for logging in, ' + response.name + '!';
						});
					}

				</script>
				<a class="facebookLogin f-l-l" target="_self">FB登入
					<fb:login-button class="FBsdkLogin"  scope="public_profile,email" onlogin="checkLoginState();">
					</fb:login-button>
				</a>
			</div>
			<div class="haoIdLogin">
				<h1 class="haoIdLoginLogo" >登录好琴声</h1>
				<h2 >登录好琴声来投票</h2>
				<!-- <form action="" id="loginForm"> -->
				<div class="newName clearfix">
					<span class="newComMsg f-l-l">账号：</span>
					<input type="text" name="username" class="newusername f-l-l" placeholder="用户名" autocomplete="off"/>
				</div>
				<div class="newPass clearfix">
					<span class="newComMsg f-l-l">密码：</span>
					<input type="password" name="password" class="newpassword f-l-l" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
				</div>
				<button class="newsubmit" type="submit">登 陆</button>
				<!-- </form> -->
				<a>
					<span  class="go-register register-tis">还没有账号？去注册</span>
				</a>
				<div class="tipMsg">
					<p>账号或者密码错误，请重新输入！</p>
				</div>
			</div>
		</div>
		<div class="register-container ">
			<h1>注册好琴声会员</h1>
			<form action="" id="registerForm">
				<div class="clearfix" style="margin-top: 20px">
					<div class="center-warp clearfix">
						<span class="newComMsg f-l-l">地区：</span>
						<select name="" id="" class="newcelltype f-l-l">
							<option value="+86" title="中国">大陆</option>
							<option value="+886" title="台湾">台湾</option>
							<option value="+852" title="香港">香港</option>
							<option value="+853" title="澳门">澳门</option>
							<option value="+65" title="新加坡">新加坡</option>
							<option value="+1" title="美国">美国</option>
						</select>
						<input type="text" class="cellTypeNum celltype f-l-l" placeholder="选择国家或地区" value="+86" required readOnly="true">
					</div>
				</div>
				<div class="clearfix">
					<span class="newComMsg f-l-l">手机号：</span>
					<input type="text" class="phone_number" required placeholder="输入手机号码" id="photo" onkeyup='this.value=this.value.replace(/\D/gi,"")' />
				</div>
				<div class="clearfix">
					<span class="newComMsg f-l-l">用户名：</span>
					<input type="text" class="yonghuming"  placeholder="输入用户名" maxlength="20" oncontextmenu="return false" onpaste="return false" required />
				</div>

				<div class="clearfix">
					<span class="newComMsg f-l-l">密码：</span>
					<input type="password" name="password" class="password" placeholder="输入密码" maxlength="20" oncontextmenu="return false" onpaste="return false" required />
				</div>
				<div class="clearfix">
					<span class="newComMsg f-l-l">验证码：</span>
					<input type="text" class="newYanCode yanzheng  f-l-l" placeholder="输入验证码" required >
				</div>
				<div class="clearfix getRegCode-warp">
					<div class="center-warp">

						<span class="getRegCode yanzheng-pre f-l-l">获取验证码</span>
						<p class="yifasong f-l-l" style="height: 24px;line-height: 24px;width: 300px;text-align: center;"></p>
					</div>
				</div>

				<button id="newsubmit" type="submit" >注 册</button>
			</form>
			<a >
				<button type="button" class="register-tis go-login">已经有账号？去登录</button>
			</a>

		</div>
	</div>
</div>
<!-- ····························中间结构结束·································· -->
<!-- 底部结构开始································································ -->
[!--temp.wei--]
<!-- 底部结构开始································································ -->
</body>
</html>