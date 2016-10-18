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
	<link rel="stylesheet" type="text/css" href="[!--news.url--]css/tupianneiye3.css">
	<link rel="stylesheet" type="text/css" href="[!--news.url--]e/haitou/new-login-reg/css/style.css">
    <script type="text/javascript" src="[!--news.url--]js/jquery-1.11.3.min.js"></script>
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
</head>
<body>

<!-- ······························头部结构····································· -->
	[!--temp.tou--]
<!-- 头部结构结束·························································· -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">

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
							</div>
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
	</div>
	<!-- 中间内容部分结束·················································· -->
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
<!-- 底部结构开始································································ -->
<div class="footerWrap">
	<div class="footBian">
		<div class="footNavWrap clearfix">
			<div class="footNav clearfix">
				<dl>
					<dd><a href="[!--news.url--]guangchang">音乐广场</a></dd>
				</dl>
				<dl>
					<dd><a href="[!--news.url--]news">音乐资讯</a></dd>
					<dt><a href="[!--news.url--]news/yinyue">音乐新闻</a></dt>
					<dt><a href="[!--news.url--]news/yueqi">音乐资讯</a></dt>
					<dt><a href="[!--news.url--]news/huodong">音乐活动</a></dt>
				</dl>
				<!--<dl>
					<dd><a href="[!--news.url--]mingren">音乐名人</a></dd>
					<dt><a href="[!--news.url--]mingren">名人名家</a></dt>
					<dt><a href="[!--news.url--]mingren">音乐之星</a></dt>

				</dl>-->
				<dl>
					<dd><a href="[!--news.url--]haixuan">各地海选</a></dd>
					<dt><a href="[!--news.url--]haixuan">中华好琴声</a></dt>
					<dt><a href="[!--news.url--]haixuan">城市音乐会</a></dt>
					<dt><a href="[!--news.url--]haixuan">两岸大师班</a></dt>
				</dl>
				<dl>
					<dd><a href="[!--news.url--]laoshi">音乐老师</a></dd>
					<dt><a href="[!--news.url--]laoshi">键盘老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">吉他老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">弦乐老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">管乐老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">民乐老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">电声老师</a></dt>
					<dt><a href="[!--news.url--]laoshi">民乐老师</a></dt>

				</dl>
				<dl>
					<dd><a href="[!--news.url--]jiaoshi">音乐教室</a></dd>
				</dl>
				<!--<dl>
					<dd><a href="[!--news.url--]">音乐乐团</a></dd>
					<dt><a href="[!--news.url--]">管乐</a></dt>
					<dt><a href="[!--news.url--]">弦乐</a></dt>
					<dt><a href="[!--news.url--]">交响乐</a></dt>
					<dt><a href="[!--news.url--]">民乐</a></dt>
					<dt><a href="[!--news.url--]">合唱</a></dt>
				</dl>-->

				<dl>
					<dd><a href="[!--news.url--]zhibo">直播课堂</a></dd>

				</dl>
				<dl>
					<dd><a href="[!--news.url--]yuepu">音乐乐谱</a></dd>
					<dt><a href="[!--news.url--]">钢琴</a></dt>
					<dt><a href="[!--news.url--]">提琴</a></dt>
					<dt><a href="[!--news.url--]">吉他</a></dt>
				</dl>

				<!--<dl>
					<dd><a href="[!--news.url--]">音乐百科</a></dd>

				</dl>
				<dl>
					<dd><a href="[!--news.url--]">音乐电台</a></dd>

				</dl>-->
				<dl>
					<dd><a href="[!--news.url--]bbs">声粉论坛</a></dd>
					<dt><a href="[!--news.url--]">乐迷互动</a></dt>
					<dt><a href="[!--news.url--]">学习交流</a></dt>
					<dt><a href="[!--news.url--]">乐器维修</a></dt>
					<dt><a href="[!--news.url--]">网站建议</a></dt>
				</dl>

				<dl>
					<dd><a>网站服务</a></dd>
					<dt><a href="[!--news.url--]t/guanggao/html/index-ad.html">广告服务</a></dt>
					<dt><a href="[!--news.url--]">联系我们</a></dt>
					<dt><a href="[!--news.url--]">关于我们</a></dt>
					<dt><a href="[!--news.url--]">CEO专栏</a></dt>
					<dt><a href="[!--news.url--]">版权声明</a></dt>

				</dl>
			</div>
			<div class="footCode clearfix">
				<div class="firstCode">
					<a href="javascript:;">
						<img src="[!--news.url--]images/foot_weixin.jpg" alt="">
						<h3>扫一扫关注微信</h3>
					</a>
				</div>
				<div class="secondCode">
					<a href="javascript:;">
						<img src="[!--news.url--]images/foot_app.png" alt="">
						<h3>扫一扫下载APP</h3>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footBtm clearfix">
			<div class="h1">
				<a href="javascript:;">
					<h1>好琴声</h1>
				</a>
			</div>
			<div class="lianxi">
				<div class="footTil">
					<span>好琴声</span>
					<i>0 2 1 - 6 7 7 0 3 9 5 6</i>
<!--					<p class="zhanzhang"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256607007'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1256607007%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>-->
				</div>
				<div class="footcon">
					<p>Copyright © 2015 greattone.net All rights reserved. 好琴声版权所有 沪ICP备09050100号</p>
					<p>公司总部地址：上海市金山区枫泾镇枫湾路531号科创小镇二楼 24小时服务热线：15216849061 合作QQ：14679828 , 2691608001 </p>
					<p>台湾公司地址：新竹市四維路80號  電話：03-528-5680 E-mail：chengyun0423@franzsandner.com</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 底部结构开始································································ -->
<!-- 底部结构开始································································ -->
</body>
</html>