<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
eCheckCloseMods('member');//关闭模块
$myuserid=(int)getcvar('mluserid');
$mhavelogin=0;
if($myuserid)
{
	include("../../class/db_sql.php");
	include("../../member/class/user.php");
	include("../../data/dbcache/MemberLevel.php");
	$link=db_connect();
	$empire=new mysqlquery();
	$mhavelogin=1;
	//数据
	$myusername=RepPostVar(getcvar('mlusername'));
	$myrnd=RepPostVar(getcvar('mlrnd'));
	$r=$empire->fetch1("select ".eReturnSelectMemberF('userid,username,groupid,userfen,money,userdate,havemsg,checked')." from ".eReturnMemberTable()." where ".egetmf('userid')."='$myuserid' and ".egetmf('rnd')."='$myrnd' limit 1");
	$m=$empire->fetch1("select userpic from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$userpic=$m['userpic']?$m['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	//未读消息
	$noreadnum=$empire->num("select * from {$dbtbpre}enewsqmsg where to_username='$myusername' and haveread='0' and from_username!=''");
	if ($noreadnum==0){
    $noread="";
    $noreadclass="";
  } else {
    $noread="<em>".$noreadnum."</em>";
    $noreadclass="class=have";
  }
	//系统消息
	$xtnoreadnum=$empire->num("select * from {$dbtbpre}enewsqmsg where to_username='$myusername' and haveread='0' and from_username =''");
	if ($xtnoreadnum==0){
    $xtnoread=""; //未读的系统消息
	$allnoread=""; //总未读消息
    $allnoreadclass="";
  } else {
	$allnoread="<em>".$xtnoreadnum."</em>";
    $xtnoread="<span>".$xtnoreadnum."</span>";
    $allnoreadclass="class=have";
  }
    //其他
	if(empty($r[userid])||$r[checked]==0)
	{
		EmptyEcmsCookie();
		$mhavelogin=0;
	}
	//会员等级
	if(empty($r[groupid]))
	{$groupid=eReturnMemberDefGroupid();}
	else
	{$groupid=$r[groupid];}
	$groupname=$level_r[$groupid]['groupname'];
	//点数
	$userfen=$r[userfen];
	//余额
	$money=$r[money];
	//天数
	$userdate=0;
	if($r[userdate])
	{
		$userdate=$r[userdate]-time();
		if($userdate<=0)
		{$userdate=0;}
		else
		{$userdate=round($userdate/(24*3600));}
	}
	//是否有短消息
	$havemsg="";
	if($r[havemsg])
	{
		$havemsg="class='have'";
	}
	
	//$myusername=$r[username];
	db_close();
	$empire=null;
}
if($mhavelogin==1)
{
?>
<ul class="hyin">                	<li class="myhome"><a href="http://www.52img.cn/e/space/?userid=<?=$myuserid?>"></a>                    	<ul>                        	<li><a href="http://www.52img.cn/e/space/?userid=<?=$myuserid?>">我的首页</a></li>                            <li><a href="#">为我推荐</a></li>                        </ul>                    </li>                    <li class="mymail"><a href="http://www.52img.cn/e/member/msg/" title="查看我的私信" <?=$noreadclass?>><?=$noread?></a></li>                    <li class="mymsg"><a href="#" <?=$allnoreadclass?>><?=$allnoread?></a>                    	<ul>                        	<li><a href="#">我的粉丝</a></li>                            <li><a href="#">推荐我的</a></li>                            <li><a href="#">给我的评论</a></li>                            
<li><a href="#">给我的留言</a></li>                            <li><a href="#">给我的回复</a></li>                            <li><?=$xtnoread?><a href="/e/member/msg/?notice=0">系统通知</a></li>                            <li><a href="#">站点公告</a></li>                        </ul>                    </li>                    <li class="myfav"><a href="http://www.52img.cn/e/member/fava/" title="进入我的收藏夹"></a></li>                    <li class="fabu"><a href="#"></a>                    	<ul>                        	<li><a href="/e/DoInfo/ChangeClass.php?mid=10">发布模板</a></li>                            <li><a href="#">发布图片素材</a></li>                            <li><a href="#">发布代码</a></li>                            <li><a href="#">发布工具</a></li>                        </ul>                    </li>                    <li class="myavator"><a href="http://www.52img.cn/e/space/?userid=<?=$myuserid?>"><img src="<?=$userpic?>" width="24" height="24"></a>                    	<ul>                        	<li class="username"><a href="http://www.52img.cn/e/member/my/"><?=$myusername?></a></li>                            <li><a href="#" class="mygz">我关注的人</a></li>                            <li><a href="#" class="myup">我上传的</a></li>                            <li><a href="#" class="mytj">我推荐的</a></li>                            <li><a href="#" class="mypl">我评论的</a></li>                            <li><a href="#" class="zjlf">最近来访</a></li>                            <li><a href="/e/member/EditInfo/" class="shezhi">帐号设置</a></li>                            <li><a href="/e/member/doaction.php?enews=exit" onclick="return confirm('确认要退出?');" class="myout">退出</a></li>                        </ul>                    </li></ul>
<?
}
else
{
?>
<a href="javascript:login()">登陆</a> | <a href="http://www.52img.cn/register/">注册</a>
<?
}
?>