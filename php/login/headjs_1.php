<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
//模型
$tgetmid=(int)$_GET['mid'];

//关注
$feeduserid=explode("::::::",$follow['feeduserid']);

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
	/*******普通会员*******/
	$m2=$empire->fetch1("select putong_shenfen from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$putong_shenfen=$m2['putong_shenfen'];
	/*******音乐之星*******/
	$m1=$empire->fetch1("select music_star from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$music_star=$m1['music_star'];
	/*******音乐老师*******/
	$m3=$empire->fetch1("select teacher_type from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$teacher_type=$m3['teacher_type'];
	/*******音乐教室*******/
	$m4=$empire->fetch1("select jiaoshi from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$jiaoshi=$m4['jiaoshi'];
	/***************************/
	$m5=$empire->fetch1("select userid from {$dbtbpre}enewsmemberadd where userid='$myuserid' limit 1");
  	$userid=$m5['userid'];
	
	//模型
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
$wznum=0;

?>
document.write("<li><a href=\"/e/zhiyin/ListInfo.php?mid=10\">个人中心</a></li><li>丨</li><li><a href=\"/e/space/?userid=<?=$userid?>\">主页</a></li><li>丨</li><li id=\"loginBtn\"><a href=\"/e/member/doaction.php?enews=exit&ecmsfrom=9\" onclick=\"return confirm(\'确认要退出?\');\">退出</a></li>");
<?
}
else
{
?>
document.write("<li><a href=\"/e/member/register/\">注册</a></li><li>丨</li><li id=\"loginBtn\"><a href=\"javascript:;\" target=\"_self\" >登录</a></li>");
<?
}
?>