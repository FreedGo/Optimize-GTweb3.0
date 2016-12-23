<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//公告
$spacegg='';
if($addur['spacegg'])
{
	$spacegg='<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#96C8F1">
  <tr>
    <td background="template/default/images/bg_title_sider.gif"><b>公告</b></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            '.$addur['spacegg'].'
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<br>';
}
//导航菜单
$dhmenu='';
$modsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
while($modr=$empire->fetch($modsql))
{
	$dhmenu.="<td width=70 height=24 onmouseover='ChangeMenuBg(this,mod".$modr[mid].")' onmouseout='ChangeMenuBg2(this,mod".$modr[mid].")' align='center' onclick=\"self.location.href='list.php?userid=$userid&mid=$modr[mid]';\"><font color='#FFFFFF' id='mod".$modr[mid]."'><strong>".$modr[qmname]."</strong></font></td>";
}
//导航菜单
$wznum=0; //文章总数
$dhmenu='';
$modsql=$empire->query("select mid,qmname,tbname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
while($modr=$empire->fetch($modsql))
{
	$num=$empire->num("select id from {$dbtbpre}ecms_$modr[tbname] where userid='$userid'");
	$wznum=$wznum+$num;
	$dhmenu.='<li><a href="/e/space/list.php?userid='.$userid.'&mid='.$modr[mid].'">'.$modr[qmname].'</a></li>';
}
//会员信息
$tmgetuserid=$userid;	//用户ID
$tmgetusername=RepPostVar($username);	//用户名
$tmgetgroupid=$groupid;	//用户组ID
$getuserid=(int)getcvar('mluserid');//当前登陆会员ID
$getusername =getcvar('mlusername');//当前登陆会员名
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}
$follow=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid=$userid");
$feeduserid=explode("::::::",$follow['feeduserid']);
$Diybg=$follow['Diybg']?$follow['Diybg']:$public_r[newsurl].'yecha/blogbg.jpg';
if ($follow['lockBgImg']){
	$lockbg=" fixed";
}
if ($follow['bgsize']){
	$bgsize="background-size:100% 100%;";
}
$bgcolor=$follow['bgcolor']?$follow['bgcolor']:'#b7e3c1';
$Bgalign=$follow['Bgalign']?$follow['Bgalign']:'center';
$repeatBg=$follow['repeatBg']?$follow['repeatBg']:'repeat';
$feedusernum=count($feeduserid)-1; //该会员的关注数
$fsnum=0; //该会员的粉丝数
$fl=$empire->query("select feeduserid from {$dbtbpre}enewsmemberadd order by userid"); 
while($n=$empire->fetch($fl))
{
	$flid=explode("::::::",$n['feeduserid']);
	if (in_array($userid,$flid)){
		$fsnum=$fsnum+1;
	}
}
//增加会员访问记录
if ($getuserid && $getuserid<>$userid){
	$r=$empire->fetch1("select zuijin from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
	if (empty($r['zuijin'])){
		$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$getuserid::::::' where userid='$userid'");
		} else {
		$zuijin=explode("::::::",$r['zuijin']);
		if (in_array($getuserid,$zuijin))
    	{
			$newzuijin=$getuserid."::::::".str_replace($getuserid."::::::","",$r['zuijin']);
			$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$newzuijin' where userid='$userid'");
    	} else{
			$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$getuserid::::::$r[zuijin]' where userid='$userid'");
		}
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$spacename?> - Powered by EmpireCMS</title>
<meta content="<?=$spacename?>" name="keywords" />
<meta content="<?=$spacename?>" name="description" />
<link href="template/default/images/style.css" rel="stylesheet" type="text/css" />
<script>
function ChangeMenuBg(doobj,dofont){
	doobj.style.cursor="hand";
	doobj.style.background='url(template/default/images/nav_a_bg3.gif)';
	dofont.style.color='#000000';
}
function ChangeMenuBg2(doobj,dofont){
	doobj.style.background='';
	dofont.style.color='#ffffff';
}
</script>
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
<link rel="stylesheet" type="text/css" href="/css/haixuan.css">
<!-- <link href="/yecha/Common.css" rel="stylesheet" type="text/css" /> -->
<link href="/yecha/hycenter.css" rel="stylesheet" type="text/css" />
<link href="/yecha/button.css" rel="stylesheet" type="text/css" />
<link href="/yecha/user/visuallightbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.timeago.js"></script>
<script type="text/javascript" src="/js/52img.js"></script> 
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/js/xin_haixuan.js" ></script>
<script type="text/javascript" src="/js/area.js"></script>
<script>
		// 百度分享代码	·········································
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		// 百度分享代码	·········································
		</script>
		<script type="text/javascript">
				$(function() {
					$('.liebiaoFuck:gt(0)').hide();


				});


		</script>

</head>
<body topmargin="0">
<div class="headerWrap">
	<!-- 顶部结构······················································ -->
		<div class="head clearfix">
			<div class="h1">
				<a href="<?=$public_r[newsurl]?>">
					<h1>好琴声</h1>
				</a>
			</div>
			<div class="fanti">
				<a href="javascript:;">繁体</a>
			</div>
			<div class="erWeiMa">
				<div class="erWeiMaImg">
					<img src="<?=$public_r[newsurl]?>images/foot_app.jpg" alt="">
				</div>
				<h2>扫一扫下载APP</h2>
			</div>
			<div class="denglu clearfix">
				<div class="dengLeft">
					<ul class="clearfix">
						<li><a href="<?=$public_r[newsurl]?>e/zhiyin/ListInfo.php?mid=10">个人中心</a></li>
						<li>丨</li>
						<li id="loginBtn"><a href="javascript:;">登录</a></li>
						<li>丨</li>

<li><a href="<?=$public_r[newsurl]?>e/member/register/">注册</a></li>
					</ul>
				</div>
				<div class="dengRight">
					<a href="javascript:;">
						<img src="<?=$public_r[newsurl]?>images/ad1.jpg" height="70" width="150" alt="">
					</a>
				</div>
			</div>
		</div>
	<!-- 顶部结构结束······················································ -->

	<!-- 导航结构···························································· -->
		<div class="navwrap">
			<div class="nav">
				<ul class="clearfix">
					<li><a href="<?=$public_r[newsurl]?>guangchang">音乐广场</a></li>
					<li><a href="<?=$public_r[newsurl]?>news">音乐资讯</a></li>
					<li><a href="<?=$public_r[newsurl]?>mingren">音乐名人</a></li>
					<li><a href="<?=$public_r[newsurl]?>laoshi">音乐老师</a></li>
					<li><a href="<?=$public_r[newsurl]?>jiaoshi">音乐教室</a></li>
					<li><a href="<?=$public_r[newsurl]?>yuetuan">音乐乐团</a></li>
					<li><a href="<?=$public_r[newsurl]?>haixuan">音乐海选</a></li>
					<li><a href="<?=$public_r[newsurl]?>yuepu">音乐乐谱</a></li>
					<li><a href="<?=$public_r[newsurl]?>baike">音乐百科</a></li>
					<li><a href="<?=$public_r[newsurl]?>diantai">音乐电台</a></li>
					<li><a href="<?=$public_r[newsurl]?>bbs">声粉论坛</a></li>
					
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
				<a href="<?=$public_r[newsurl]?>e/member/register/">立即注册</a>
				<a class="forget" href="<?=$public_r[newsurl]?>e/member/register/">忘记密码？</a>
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