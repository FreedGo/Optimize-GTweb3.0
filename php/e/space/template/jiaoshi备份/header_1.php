<div id="tongji"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256607007'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1256607007%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div>
<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
<!-- <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script language="javascript" src="/js/language.js"></script> -->
<div class="headerWrap">
	<!-- 顶部结构······················································ -->
		<div class="head clearfix">
        <div class="huanying">
        	<script>
document.write('<script src="<?=$public_r['newsurl']?>e/member/login/headjs.php?t='+Math.random()+'"><'+'/script>');
</script>
</div>

			<div class="h1">
            
				<a href="<?=$public_r['newsurl']?>">
					<h1>好琴声</h1>
				</a>
			</div>
			<div class="fanti">

				<a href="javascript:zh_tran('s');" class="zh_click jianti" id="zh_click_s">简体</a>
<a href="javascript:zh_tran('t');" class="zh_click fanti1" id="zh_click_t">繁體</a>

			</div>
			<div class="erWeiMa">
				<!-- <div class="erWeiMaImg">
					<img src="<?=$public_r['newsurl']?>images/foot_app.jpg" alt="">
				</div>
				<h2>扫一扫下载APP</h2> -->
				<a class="fatieBtn2" id="fatieBtn2" href="/e/fatie/ListInfo.php?mid=10"></a>
			</div>
			<div class="denglu clearfix">
            

            
				<div class="dengLeft">
					<ul class="clearfix">
<script>
document.write('<script src="<?=$public_r['newsurl']?>e/member/login/headjs_1.php?t='+Math.random()+'"><'+'/script>');
</script>

					</ul>
				</div>
				<div class="dengRight">
						<script src="/d/js/acmsd/thea42.js"></script>
				</div>
			</div>
		</div>
	<!-- 顶部结构结束······················································ -->

	<!-- 导航结构···························································· -->
		<div class="navwrap">
			<div class="nav">
				<ul class="clearfix">
					<li><a href="<?=$public_r['newsurl']?>guangchang">音乐广场</a></li>
					<li><a href="<?=$public_r['newsurl']?>news">音乐资讯</a></li>
					<li><a href="<?=$public_r['newsurl']?>haixuan">网络海选</a></li>
					<!--<li><a href="<?=$public_r['newsurl']?>mingren">音乐名人</a></li>-->
					<li><a href="<?=$public_r['newsurl']?>laoshi">音乐老师</a></li>
					<li><a href="<?=$public_r['newsurl']?>jiaoshi">琴行教室</a></li>
                    <li><a href="<?=$public_r['newsurl']?>pinpai">乐器品牌</a></li>
					<li><a href="<?=$public_r['newsurl']?>zhibo">直播课堂</a></li>
					<li><a href="<?=$public_r['newsurl']?>yuepu">乐谱中心</a></li>
					<!--<li><a href="<?=$public_r['newsurl']?>yuepu">音乐乐谱</a></li>-->
					<!--<li><a href="<?=$public_r['newsurl']?>baike">音乐百科</a></li>-->
					<!--<li><a href="<?=$public_r['newsurl']?>diantai">音乐电台</a></li>-->
					<li><a href="<?=$public_r['newsurl']?>bbs">声粉论坛</a></li>
				</ul>
		  </div>
  </div>
	<!-- 导航结构···························································· -->
	</div>

	<!-- 登录结构 -->
		<div class="loginQian">
			<i class="close iconfont">&#xe631;</i>
			<h3>登录好琴声</h3>
			<form name=login method=post action=\"/e/member/doaction.php\">
<input type=hidden name=enews value=login>
<input type=hidden name=ecmsfrom value=9>
				<ul>
					<li class="loginName">
						<label for="username">用户名：</label>
						<input type="username" id="username" name="username" placeholder="请输入用户名" required>
					</li>
					<li class="loginWord">
						<label for="password">密　码：</label>
						<input type="password" id="password" name="password" placeholder="请输入密码" required>
						
					</li>
					<li class="yanzhengma">
						<label for="yanzheng">验证码：</label>
						<input type="text" id="yanzheng" required placeholder="请输入验证码">
						<img src="images/yanzhengma.gif"  alt="">
					</li>
					<li class="loginRadio" id="loginRadio1">
						<input type="radio" id="jizhuwo">
						<label for="onlyYou">记住账号</label>
					</li>

					<li class="loginSub"><input type="submit" id="submit" name="Submit" value=""><label for="submit">登　录</label></li>
				</ul>
			</form>
			<div class="register">
				<span>没有账号?</span>
				<a href="<?=$public_r['newsurl']?>e/member/register/">立即注册</a>
				<a class="forget" href="<?=$public_r['newsurl']?>e/member/register/">忘记密码？</a>
			</div>
			
		</div>	
		<div class="loginDown"></div>
	<!-- 主页点击登陆···························································· -->
	<script type="text/javascript">
		$(document).ready(function() {
			
		
			$('#loginBtn').eq(0).click(function(event) {
				$('.loginQian').stop(true).fadeIn('400');
				$('.loginDown').stop(true).fadeIn('400');
			});
			$('.close').click(function(event) {
				$('.loginQian').stop(true).fadeOut('400');
				$('.loginDown').stop(true).fadeOut('400');
			});

			

		});

	</script>