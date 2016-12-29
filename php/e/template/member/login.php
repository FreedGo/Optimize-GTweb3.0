<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员登录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;会员登录";
require(ECMS_PATH.'e/template/incfile/header_1.php');
?>

  <!--<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form1" method="post" action="../doaction.php">
    <input type=hidden name=ecmsfrom value="<?=ehtmlspecialchars($_GET['from'])?>">
    <input type=hidden name=enews value=login>
	<input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
    <tr class="header"> 
      <td height="25" colspan="2"><div align="center">会员登录<?=$tobind?' (绑定账号)':''?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="23%" height="25">用户名：</td>
      <td width="77%" height="25"><input name="username" type="text" id="username" size="30">
	  	<?php
		if($public_r['regacttype']==1)
		{
		?>
        &nbsp;&nbsp;<a href="../register/regsend.php" target="_blank">帐号未激活？</a>
		<?php
		}
		?>
		</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">密码：</td>
      <td height="25"><input name="password" type="password" id="password" size="30">
        &nbsp;&nbsp;<a href="../GetPassword/" target="_blank">忘记密码？</a></td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td height="25">保存时间：</td>
      <td height="25">
	  <input name=lifetime type=radio value=0 checked>
        不保存
	    <input type=radio name=lifetime value=3600>
        一小时 
        <input type=radio name=lifetime value=86400>
        一天 
        <input type=radio name=lifetime value=2592000>
        一个月
<input type=radio name=lifetime value=315360000>
        永久 </td>
    </tr>
    <?php
	if($public_r['loginkey_ok'])
	{
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">验证码：</td>
      <td height="25"><input name="key" type="text" id="key" size="6">
        <img src="../../ShowKey/?v=login"></td>
    </tr>
    <?php
	}	
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value=" 登 录 ">&nbsp;&nbsp;&nbsp; <input type="button" name="button" value="马上注册" onclick="parent.location.href='../register/<?=$tobind?'?tobind=1':''?>';"></td>
    </tr>
	</form>
  </table>-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script language="javascript" src="/js/language.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
	<style type="text/css">
	.bodyWrap{
	width: 100%;
	height:600px;
	margin: 0 auto;
	overflow: hidden;
	zoom: 1; 
	position: relative;
	background-color: #fef5d8;
	background-size:cover;
}
	.dengluWrap{
		width:1200px;
		height:600px;
		position: relative;
		margin:0 auto;
		background-color: #FCF9E7;
	}
	.dengluBg{
		position: absolute;
		top:0;
		right: 0;
		height:600px;
		width:700px;
	}
/*·····································登录样式··································*/
.login_Qian{
    
    position:absolute;
    left: 70px;
    top:100px;
	background-color: #fff;
    z-index: 500;
    border-radius: 5px;
    padding:10px 50px 10px 50px;
    box-shadow:0 0 15px 0 rgba(170, 170, 170, 0.5);
	display:block!important;

}
.loginName,.loginWord,.yanzhengma{
	border:#E9E9E9 solid 1px;
	width: 306px;
	height: 44px;
	border-radius: 3px;
	padding-left: 5px;
	margin-bottom: 10px;
	position: relative;
}
.loginName input,.loginWord input{
	height: 42px;
	width: 244px;
	border-radius: 3px;
	outline:none;
}
.loginName label,.loginWord label,.yanzhengma label{
	font-size: 14px;
	color: #333;
	line-height: 44px;
}
.login_Qian h3{
	height: 46px;
	line-height: 46px;
	font-size: 16px;
	font-weight: bold;
	color:#cb7047;
}
.yanzhengma>img{
	position: absolute;
	height: 43px;
	width: 120px;
	right: 1px;
	top: 1px;
}
.yanzhengma>input{
	width: 125px;
	height: 43px;
	outline: none;
}
.loginRadio input{
	height: 16px;
	width: 16px;
	margin-right: 5px;
	vertical-align: middle;
}
.loginRadio{
	font-size: 14px;
	line-height: 24px;
	margin-bottom: 10px;
}
.loginSub{
	width: 313px;
	margin-bottom: 10px;
	position: relative;

}
.loginSub input{
	height: 36px;
	width: 313px;
	border-radius: 5px;
	
	font-size: 14px;
	background-color: #cb7047;
}
.loginSub label{
	position: absolute;
	top: 9px;
	left: 142px;
	font-size: 14px;
	color: #fff;
}
.register{
	height: 30px;
}
.register a{
	color: #3498f0;
}
.register a.forget{
	float: right;
}
.hezuodenglu{
	border-top: #ccc solid 1px;
}
.dengluwangzhan ul li{
	float: left;
	height: 64px;
	width: 76px;
	position: relative;
}
.dengluwangzhan{
	margin-bottom: 30px;
}
.dengluwangzhan ul li a{
	display: inline-block;
	height: 64px;
	width: 64px;
	position: absolute;
	left: 7px;
	background-image: url(/images/hezuowangzhan.png);
	margin: 0 auto;
	background-repeat: no-repeat;
}
.dengluwangzhan ul li a h4{
	position: absolute;
	bottom: 0px;
	width: 64px;
	text-align: center;
}
.qq a{
	background-position: center -140px;
}
.xinlang a{
	background-position: center 0;
}
.tengxun a{
	background-position:center  -70px ;
}
.weixin a{
	background-position:center -280px ;
}
.loginDown{
	width: 100%;
    height: 100%;
    background: #000;
    background-color: rgba(0,0,0,0.5);
    position: fixed;
    left: 0;
    top: 0;
    z-index: 400;
    display: none;
}
	</style>
</head>
<body>
	<!-- ······························头部结构····································· -->

	
<!-- 头部结构结束······························································ -->

<!-- ····························中间结构·································· -->
<div class="bodyWrap">
	<div class="dengluWrap">
		<img class="dengluBg" src="/images/dengluBg.jpg"  alt="">
	
    	<!-- 登录结构 -->
		<div class="login_Qian">
			
			<h3>登录好琴声</h3>
			<form name=login method=post action="/e/member/doaction.php">
<input type=hidden name=enews value=login>
<input type=hidden name=ecmsfrom value="/e/zhiyin/ListInfo.php?mid=10">
				<ul>
					<li class="loginName">
						<label for="username">用户名：</label>
						<input type="username" id="username" name="username" placeholder="请输入用户名"  required>
						
					</li>
					<li class="loginWord">
						<label for="password">密　码：</label>
						<input type="password" id="password" name="password" placeholder="请输入密码" required>
						
					</li>
					<!--<li class="yanzhengma">
						<label for="yanzheng">验证码：</label>
						<input type="text" id="yanzheng" required placeholder="请输入验证码">
						<img src="/images/yanzhengma.gif"  alt="">
					</li>-->
					<li class="loginRadio" id="loginRadio1">
						<input type="radio" id="jizhuwo">
						<label for="onlyYou">记住账号</label>
					</li>

					<li class="loginSub"><input type="submit" id="submit" value=""><label for="submit">登　录</label></li>
				</ul>
				
			</form>
			<div class="register">
				<span>没有账号?</span>
				<a href="/e/member/register/ChangeRegister.php">立即注册</a>
				<a class="forget" href="/e/member/register/ChangeRegister.php">忘记密码？</a>
			</div>
			
		</div>
	</div>

</div>




<!-- ····························中间结构结束·································· -->	
<!-- 底部结构开始································································ -->
	

<!-- 底部结构开始································································ -->




    



</body>
</html>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>