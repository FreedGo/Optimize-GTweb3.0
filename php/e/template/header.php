<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//--------------- 界面参数 ---------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
$userpic=$addr['userpic']?$addr['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
$teacher_type=$addr['teacher_type'];
$putong_shenfen=$addr['putong_shenfen'];
$music_star=$addr['music_star'];
$jiaoshi=$addr['jiaoshi'];
$aihao=$addr['aihao'];
//---------------------------------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$user[userid]' limit 1");
$userfen=$addr['userfen'];
$groupid=$addr['groupid'];
$userid=$addr['userid'];
$money=$addr['money'];
$cked=$addr['cked'];
$sign=$addr['sign'];
$userdate=$addr['userdate'];

$ti_zhiyin=$addr['ti_zhiyin'];
$ti_guanzhu=$addr['ti_guanzhu'];
$ti_duanxin=$addr['ti_duanxin'];
$ti_zhiyinfeed=$addr['ti_zhiyinfeed'];
$ti_yqlaoshi=$addr['ti_yqlaoshi'];
$ti_yqjiaoshi=$addr['ti_yqjiaoshi'];
$ti_yqxuesheng=$addr['ti_yqxuesheng'];
$ti_qanum=$addr['ti_qanum'];

//-------------教室签约剩余天数-------------
	if($userdate)
	{
		$userda=$userdate-time();
		if($userda<=0)
		{
			OutTimeZGroup($userid,$zgroupid);
			if($zgroupid)
			{
				$groupid=$zgroupid;
				$zgroupid=0;
			}
			$userda=0;
		}
		else
		{
			$userda=round($userda/(24*3600));
		}
	}


$quan=$empire->fetch1("select cked from phome_enewsmember where userid=$userid limit 1");
					

//-------------验证是否完善资料--------------
$ws=$empire->fetch1("select groupid from {$dbtbpre}enewsmember where userid='$userid'");
$ber=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if($ws['groupid']==1){
		if(!empty($ber[sex]) && !empty($ber[aihao]) && !empty($ber[putong_shenfen]) && !empty($ber[chusheng]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[sex]) || empty($ber[aihao]) || empty($ber[putong_shenfen]) || empty($ber[chusheng]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==2){
		if(!empty($ber[sex]) && !empty($ber[aihao]) && !empty($ber[music_star]) && !empty($ber[chusheng]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[sex]) || empty($ber[aihao]) || empty($ber[music_star]) || empty($ber[chusheng]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==3){
		if( !empty($ber[aihao]) && !empty($ber[teacher_type]) && !empty($ber[chusheng]) && !empty($ber[biye]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[addres])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[aihao]) || empty($ber[teacher_type]) || empty($ber[chusheng]) || empty($ber[biye]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[addres])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==4){
		if(!empty($ber[fuzeren]) && !empty($ber[telephone]) && !empty($ber[measure]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[fuzeren]) || empty($ber[telephone]) || empty($ber[measure]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}



//--------------- 界面参数 ---------------
$Diybg=$addr['Diybg']?$addr['Diybg']:$public_r[newsurl].'yecha/blogbg.jpg';
if ($addr['lockBgImg']){
	$lockbg=" fixed";
}
if ($addr['bgsize']){
	$bgsize="background-size:100% 100%;";
}
$bgcolor=$addr['bgcolor']?$addr['bgcolor']:'#b7e3c1';
$Bgalign=$addr['Bgalign']?$addr['Bgalign']:'center';
$repeatBg=$addr['repeatBg']?$addr['repeatBg']:'repeat';
$selffile=eReturnSelfPage(0);
if(stristr($selffile,'/member/msg'))
	{
        $znxx=' class=selected';
	}
    elseif(stristr($selffile,'e/DoInfo'))
    {
		$wdtg=' class=selected';
    }
	elseif(stristr($selffile,'e/ShopSys'))
    {
		$wdshop=' class=selected';
    }
    elseif(stristr($selffile,'member/fava'))
    {
		$wdsc=' class=selected';
    }
    elseif(stristr($selffile,'member/mspace/'))
    {
		$wdkj=' class=selected';
    }
    elseif(stristr($selffile,'e/member/friend'))
    {
		$wdhy=' class=selected';
    }
    elseif(stristr($selffile,'e/member/my'))
    {
		$wdjf=' class=selected';
    }
    else
    {
		$grzx=' class=selected';
    }
//网页标题
$thispagetitle=$public_diyr['pagetitle']?$public_diyr['pagetitle']:'会员中心';
//会员信息
$tmgetuserid=(int)getcvar('mluserid');	//用户ID
$tmgetusername=RepPostVar(getcvar('mlusername'));	//用户名
$tmgetgroupid=(int)getcvar('mlgroupid');	//用户组ID
$tmgetgroupname='游客';
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

//模型
$tgetmid=(int)$_GET['mid'];

//关注
$follow=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
$feeduserid=explode("::::::",$follow['feeduserid']);
$feedusernum=count($feeduserid)-1; //该会员的关注数
$fsnum=0; //该会员的粉丝数
$fl=$empire->query("select feeduserid from {$dbtbpre}enewsmemberadd order by userid"); 
while($n=$empire->fetch($fl))
{
	$flid=explode("::::::",$n['feeduserid']);
	if (in_array($tmgetuserid,$flid)){
		$fsnum=$fsnum+1;
	}
}

$wznum=0; //文章总数
$modsql=$empire->query("select mid,qmname,tbname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
while($modr=$empire->fetch($modsql))
{
	$num=$empire->num("select id from {$dbtbpre}ecms_$modr[tbname] where userid='$tmgetuserid'");
	$wznum=$wznum+$num;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$thispagetitle?></title>
<meta name="keywords" content=" [!--pagekey--] " />
<meta name="description" content=" [!--pagedes--]" />
<link href="/yecha/Common.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="/css/xin_gerenzhongxin.css">
	<link rel="stylesheet" type="text/css" href="/css/laydate.css">
    <link rel="stylesheet" type="text/css" href="/css/xin_qa.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/laydate.js"></script>
	<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript" src="/js/jquery.timeago.js"></script>
	<script type="text/javascript" src="/js/jNotify.jquery.min.js"></script>
	<script type="text/javascript" src="/js/artDialog.js"></script>
	<script type="text/javascript" src="/js/iframeTools.js"></script>
	<script type="text/javascript" src="/js/visuallightbox.js"></script>
<!--	<script type="text/javascript" src="/js/52img.js"></script>
-->	
	<link rel="stylesheet" type="text/css" href="/css/wanshanziliao.css">
	<script type="text/javascript" src="/js/cropbox.js"></script>
	<script type="text/javascript" src="/js/laydate.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/tongxunlu.css">
	<script type="text/javascript" src="/js/sort.js"></script>
	<script type="text/javascript" src="/js/jquery.charfirst.pinyin.js"></script>
<!--    <script class="resources library" src="/js/area.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="/js/diyUpload.js"></script>
	<script type="text/javascript" src="/js/webuploader.html5only.min.js"></script>
	<script language="javascript" src="/js/language.js"></script> <!---简繁体切换-->
<!--<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>-->
	<script type="text/javascript">
		$(function() {
			// 让暂时不显示的通讯录全部隐藏
			// 点击切换通讯录类别
			var iTong;
			$('.header span').click(function(event) {

				$(this).addClass('selected').siblings('span').removeClass('selected');
				iTong=$(this).index();
//				console.log(iTong);

				// 控制最上面那行字母的显示与隐藏
				if (iTong>0) {
					$('.initials').fadeOut('normal');
				} else{
					$('.initials').fadeIn('normal');
				};
				// 控制通讯录列表的显示与隐藏
				$('.biaoji').eq(iTong).addClass('sort_box').siblings('').removeClass('sort_box');
				$('.biaoji').eq(iTong).children('.xiaoBiaoji').addClass('sort_list').parent('.biaoji').siblings('.biaoji').children('.xiaoBiaoji').removeClass('sort_list');
				// 每次点击都调用插件函数
				// 每次点击都调用插件函数结束
			});
		});
	</script>
	<script type="text/javascript">
		// 判断textarea还可以输入多少字符
		String.prototype.getBytes = function() {     
		    var cArr = this.match(/[^\x00-\xff]/ig);     
		    return this.length + (cArr == null ? 0 : cArr.length);     
		}  
		function textLimitCheck(thisArea, maxLength){  
		    var len = thisArea.value.getBytes();  
		    if (len > maxLength)  
		    {  
		        alert(maxLength + ' 个字限制. \r超出的将自动去除.');  
		        var tempStr = "";  
		        var areaStr = thisArea.value.split("");  
		        var tempLen = 0;  
		        for(var i=0,j=areaStr.length;i<j;i++){  
		            tempLen += areaStr[i].getBytes();  
		            if(tempLen<=maxLength){  
		                tempStr += areaStr[i];  
		            }                 
		        }             
		        thisArea.value = tempStr  
		        thisArea.focus();  
		        }  
		        /*回写span的值，当前填写文字的数量*/  
		        messageCount.innerText = thisArea.value.length;  
		    }  
		// 判断textarea还可以输入多少字符结束
		$(function() {
			// 点击视频音乐图片切换发帖面板
			var iVideo;
			$('.fatie1:gt(0)').hide();
			$('.fenfa li').click(function(event) {
				iVideo=$(this).index();
				$(this).addClass('on').siblings('li').removeClass('on');
				$('.fatie1').eq(iVideo).stop(true).fadeIn('fast').siblings('.fatie1').hide();
			});
			// 点击视频音乐图片切换发帖面板
			// 下方瀑布流显示
			//首先判断是那个$('.quanzhandongtai')没有隐藏
			var  iList=4;
				for (var i = 0; i < 3; i++) {
					$('.quanzhandongtai').eq(i).children('li:gt(3)').hide();
				};
						$(window).scroll(function(event) {
							if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
									// 得到尾隐藏的ul的index值
									for (var x = 0; x < 4; x++) {
									if ($('.quanzhandongtai').eq(x).is(':hidden')) {} else{
										for (var y = iList; y < iList+1; y++) {
											console.log(y);
										$('.quanzhandongtai').eq(x).children('li').eq(y).show();
									};
									iList=iList+1;
									};
								};
							};
						});
						// 下方瀑布流显示结束···································
			});	
		</script>
</head>
<body>
<!-- ······························头部结构····································· -->
<!-- 头部结构结束······························································ -->
<?
require(ECMS_PATH.'e/template/incfile/header_1.php');
?>
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">
	<!-- 左侧菜单························································· -->
	<div class="singleLeft">
		<div class="menuA">
			<ul>
				<?php
				if($groupid==1){//普通会员列表
				?>
					<li><i class="iconfont">&#xe676;</i><a href="<?=$public_r['newsurl']?>e/zhiyin/ListInfo.php?mid=10">知音动态</a>
						<?php
							if($ti_zhiyin!=0){
							echo "<b class='codeMsg'>$ti_zhiyin</b>";
							}
						?>
					</li>
					<li><i class="iconfont">&#xe65e;</i><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=10">我的发帖</a></li>
					<li><i class="iconfont">&#xe652;</i><a href="<?=$public_r['newsurl']?>e/member/msg">我的消息</a>
						<?php
							if($ti_duanxin!=0){
							echo "<b class='codeMsg'>$ti_duanxin</b>";
							}
						?>
					</li>
					<li><i class="iconfont">&#xe65c;</i><a href="<?=$public_r['newsurl']?>e/member/friend/">通讯录</a>
						<?php
							if($ti_guanzhu!=0 || $ti_zhiyinfeed!=0){
								$num=$ti_guanzhu+$ti_zhiyinfeed;
							echo "<b class='codeMsg'>$num</b>";
							}
						?>
						</li>
					<li><i class="iconfont">&#xe65d;</i><a href="<?=$public_r['newsurl']?>e/member/cp">个人资料</a></li>
				<?
				}elseif($groupid==2){//音乐名人列表
				?>
					<li><i class="iconfont">&#xe676;</i><a href="<?=$public_r['newsurl']?>e/zhiyin/ListInfo.php?mid=10">知音动态</a>
						<?php
						if($ti_zhiyin!=0){
							echo "<b class='codeMsg'>$ti_zhiyin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65e;</i><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=10">我的发帖</a></li>
					<li><i class="iconfont">&#xe652;</i><a href="<?=$public_r['newsurl']?>e/member/msg">我的消息</a>
						<?php
						if($ti_duanxin!=0){
							echo "<b class='codeMsg'>$ti_duanxin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65c;</i><a href="<?=$public_r['newsurl']?>e/member/friend/">通讯录</a>
						<?php
						if($ti_guanzhu!=0 || $ti_zhiyinfeed!=0){
							$num=$ti_guanzhu+$ti_zhiyinfeed;
							echo "<b class='codeMsg'>$num</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65d;</i><a href="<?=$public_r['newsurl']?>e/member/cp">个人资料</a></li>
				<?
				}elseif($groupid==3){//音乐老师列表
				?>
					<li><i class="iconfont">&#xe676;</i><a href="<?=$public_r['newsurl']?>e/zhiyin/ListInfo.php?mid=10">知音动态</a>
						<?php
						if($ti_zhiyin!=0){
							echo "<b class='codeMsg'>$ti_zhiyin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65e;</i><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=10">我的发帖</a></li>
					<li><i class="iconfont">&#xe652;</i><a href="<?=$public_r['newsurl']?>e/member/msg">我的消息</a>
						<?php
						if($ti_duanxin!=0){
							echo "<b class='codeMsg'>$ti_duanxin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65c;</i><a href="<?=$public_r['newsurl']?>e/member/friend/">通讯录</a>
						<?php
						if($ti_guanzhu!=0 || $ti_zhiyinfeed!=0){
							$num=$ti_guanzhu+$ti_zhiyinfeed;
							echo "<b class='codeMsg'>$num</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe66f;</i><a href="<?=$public_r['newsurl']?>e/member/xuesheng/">学生管理</a></li>
					<li><i class="iconfont">&#xe65d;</i><a href="<?=$public_r['newsurl']?>e/member/cp">个人资料</a></li>
				<?
				}elseif($groupid==4){//琴行教师列表
				?>
					<li><i class="iconfont">&#xe676;</i><a href="<?=$public_r['newsurl']?>e/zhiyin/ListInfo.php?mid=10">知音动态</a>
						<?php
						if($ti_zhiyin!=0){
							echo "<b class='codeMsg'>$ti_zhiyin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65e;</i><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=10">我的发帖</a></li>
					<li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的主页</a></li>
					<li><i class="iconfont">&#xe65c;</i><a href="<?=$public_r['newsurl']?>e/member/friend/">通讯录</a>
						<?php
						if($ti_guanzhu!=0 || $ti_zhiyinfeed!=0){
							$num=$ti_guanzhu+$ti_zhiyinfeed;
							echo "<b class='codeMsg'>$num</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe652;</i><a href="<?=$public_r['newsurl']?>e/member/msg">我的消息</a>
						<?php
						if($ti_duanxin!=0){
							echo "<b class='codeMsg'>$ti_duanxin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe66b;</i><a href="<?=$public_r['newsurl']?>e/member/laoshi/">老师管理</a>
						<?php if($ti_yqlaoshi!=0){echo "<b class='codeMsg'>$ti_yqlaoshi</b>";}?>
					</li>
					<li><i class="iconfont">&#xe66f;</i><a href="<?=$public_r['newsurl']?>e/member/xuesheng/">学生管理</a></li>
					<li><i class="iconfont">&#xe677;</i><a href="<?=$public_r['newsurl']?>e/member/tuijian/">推荐管理</a></li>
					<li><i class="iconfont">&#xe667;</i><a href="<?=$public_r['newsurl']?>e/kecheng/ListInfo.php?mid=10">课程管理</a></li>
					<li><i class="iconfont">&#xe671;</i><a href="<?=$public_r['newsurl']?>e/zulin/ListInfo.php?mid=10">琴房租赁</a></li>
				<?
				}elseif($groupid==5){//乐器品牌列表
				?>
					<li><i class="iconfont">&#xe676;</i><a href="<?=$public_r['newsurl']?>e/zhiyin/ListInfo.php?mid=10">知音动态</a>
						<?php
						if($ti_zhiyin!=0){
							echo "<b class='codeMsg'>$ti_zhiyin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65e;</i><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=10">我的发帖</a></li>
					<li><i class="iconfont">&#xe652;</i><a href="<?=$public_r['newsurl']?>e/member/msg">我的消息</a>
						<?php
						if($ti_duanxin!=0){
							echo "<b class='codeMsg'>$ti_duanxin</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe65c;</i><a href="<?=$public_r['newsurl']?>e/member/friend/">通讯录</a>
						<?php
						if($ti_guanzhu!=0 || $ti_zhiyinfeed!=0){
							$num=$ti_guanzhu+$ti_zhiyinfeed;
							echo "<b class='codeMsg'>$num</b>";
						}
						?>
					</li>
					<li><i class="iconfont">&#xe66f;</i><a href="<?=$public_r['newsurl']?>e/member/xuesheng/">学生管理</a></li>
					<li><i class="iconfont">&#xe65d;</i><a href="<?=$public_r['newsurl']?>e/member/cp">品牌资料</a></li>
				<?
				}
				?>
			</ul>
		</div>
		<div class="menuB">
			<ul>
            	<?php
				if($groupid==1){//普通会员列表
				?>
                    <li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的空间</a></li>
                    <li><i class="iconfont">&#xe661;</i><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">我的账户</a></li>
					<li><i class="iconfont">&#xe663;</i><a href="<?=$public_r['newsurl']?>e/QAtj/ListInfo.php?mid=10">问答中心</a><?php if($ti_qanum!=0){echo "<b class='codeMsg'>$ti_qanum</b>";}?></li>	
                    <li><i class="iconfont">&#xe66b;</i><a href="<?=$public_r['newsurl']?>e/member/xuesheng_shen/">我的老师</a><?php if($ti_yqlaoshi!=0){echo "<b class='codeMsg'>$ti_yqlaoshi</b>";}?></li>
                    <li><i class="iconfont">&#xe660;</i><a href="<?=$public_r['newsurl']?>e/member/laosho_lao/">我的教室</a></li>
				<?
				}elseif($groupid==2){//音乐名人列表
				?>
                    <li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的空间</a></li>
                    <li><i class="iconfont">&#xe661;</i><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">我的账户</a></li>
					<li><i class="iconfont">&#xe663;</i><a href="<?=$public_r['newsurl']?>e/QAtj/ListInfo.php?mid=10">问答中心</a><?php if($ti_qanum!=0){echo "<b class='codeMsg'>$ti_qanum</b>";}?></li>
                    <li><i class="iconfont">&#xe66b;</i><a href="<?=$public_r['newsurl']?>e/member/xuesheng_shen/">我的老师</a><?php if($ti_yqlaoshi!=0){echo "<b class='codeMsg'>$ti_yqlaoshi</b>";}?></li>	
                    <li><i class="iconfont">&#xe660;</i><a href="<?=$public_r['newsurl']?>e/member/laosho_lao/">我的教室</a></li>
				<?
				}elseif($groupid==3){//音乐老师列表
				?>
                    <li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的主页</a></li>
					<li><i class="iconfont">&#xe677;</i><a href="<?=$public_r['newsurl']?>e/member/tuijian/">推荐管理</a></li>
					<li><i class="iconfont">&#xe663;</i><a href="<?=$public_r['newsurl']?>e/QAtj/ListInfo.php?mid=10">问答中心</a>
						<?php if($ti_qanum!=0){echo "<b class='codeMsg'>$ti_qanum</b>";}?>
					</li>
					<li><i class="iconfont">&#xe667;</i><a href="<?=$public_r['newsurl']?>e/kecheng/ListInfo.php?mid=10">课程管理</a></li>
					<li><i class="iconfont">&#xe671;</i><a href="<?=$public_r['newsurl']?>e/huodong/ListInfo.php?mid=10/">我的活动</a></li>
					<li><i class="iconfont">&#xe660;</i><a href="<?=$public_r['newsurl']?>e/member/laosho_lao/">我的教室</a></li>
                    <li><i class="iconfont">&#xe660;</i><a href="<?=$public_r['newsurl']?>e/kebiao/ListInfo.php?mid=10/">我的课表</a></li>
					<li><i class="iconfont">&#xe661;</i><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">我的账户</a></li>
					<li><i class="iconfont">&#xe669;</i><a href="<?=$public_r['newsurl']?>e/gonggao/ListInfo.php?mid=10/">我的动态</a></li>
					<li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/zhibo/ListInfo.php?mid=10">直播管理</a></li>
<!--					<li><i class="iconfont">&#xe669;</i><a href="--><?//=$public_r['newsurl']?><!--e/gonggao/ListInfo.php?mid=10/">内部公告</a></li>-->
				<?
				}elseif($groupid==4){//音乐教室列表
				?>
					<li><i class="iconfont">&#xe65d;</i><a href="<?=$public_r['newsurl']?>e/member/cp">琴行资料</a></li>
                    <li><i class="iconfont">&#xe661;</i><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">我的账户</a></li>
                    <li><i class="iconfont pinpai pin_icon_1"></i><a href="<?=$public_r['newsurl']?>e/qinhang/qianyue/ListInfo.php?mid=10">琴行签约</a></li>
					<li><i class="iconfont">&#xe663;</i><a href="<?=$public_r['newsurl']?>e/QAtj/ListInfo.php?mid=10">问答中心</a><?php if($ti_qanum!=0){echo "<b class='codeMsg'>$ti_qanum</b>";}?></li>
					<li><i class="iconfont">&#xe671;</i><a href="<?=$public_r['newsurl']?>e/huodong/ListInfo.php?mid=10/">琴行活动</a></li>
					<li><i class="iconfont">&#xe669;</i><a href="<?=$public_r['newsurl']?>e/gonggao/ListInfo.php?mid=10/">琴行动态</a></li>
                    <li><i class="iconfont">&#xe669;</i><a href="<?=$public_r['newsurl']?>e/shop/ListInfo.php?mid=10/">在线商城</a></li>
					<li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/zhibo/ListInfo.php?mid=10">直播管理</a></li>

				<?
				}elseif($groupid==5){//音乐品牌列表
				?>
                    <li><i class="iconfont">&#xe661;</i><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">我的账户</a></li>
                    <li><i class="iconfont">&#xe675;</i><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的主页</a></li>
                    <li><i class="iconfont pinpai pin_icon_1"></i><a href="<?=$public_r['newsurl']?>e/pinpai/qianyue/ListInfo.php?mid=10">品牌签约</a></li>
                    <li><i class="iconfont pinpai pin_icon_2"></i><a href="<?=$public_r['newsurl']?>e/pinpai/jieshao/ListInfo.php?mid=10">品牌介绍</a></li>
                    <li><i class="iconfont pinpai pin_icon_3"></i><a href="<?=$public_r['newsurl']?>e/pinpai/chanpin/ListInfo.php?mid=10">产品中心</a></li>
                    <li><i class="iconfont pinpai pin_icon_4"></i><a href="<?=$public_r['newsurl']?>e/pinpai/news/ListInfo.php?mid=10">公司动态</a></li>
                    <li><i class="iconfont pinpai pin_icon_5"></i><a href="<?=$public_r['newsurl']?>e/pinpai/xiaoshou/ListInfo.php?mid=10">销售渠道</a></li>
                    <li><i class="iconfont pinpai pin_icon_6"></i><a href="<?=$public_r['newsurl']?>e/pinpai/liuyan/ListInfo.php?mid=10">留言板</a></li>
                    <li><i class="iconfont pinpai pin_icon_7"></i><a href="<?=$public_r['newsurl']?>e/pinpai/lianxi/ListInfo.php?mid=10">联系我们</a></li>
				<?
				}
				?>
	            
				
              <!--<li><i class="iconfont">&#xe64d;</i><a href="<?=$public_r['newsurl']?>e/member/fava/">我的收藏</a></li>-->
                
			</ul>
</div>
	</div>
	<!-- 左侧菜单完成····················································· -->
	<!-- 中间结构························································· -->

    <div class="hyright">

    
	<!-- 中间结构完成····················································· -->
	<!-- 右侧展示························································· -->
	<div class="singleRight">
		<!-- 登录区域··············································· -->
		<div class="login">
			
			<!-- 登录后············································· -->
			<div class="login_Hou">
				<div class="touxiang"><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>"><img src="<?=$userpic?>"></a></div>
				<div class="uesrID">
					<span class="new-user-name"><?=$tmgetusername?></span>
                				<?php
                             	if($cked==1){
                                ?>          
                           <a class="user-renzheng" href="javascript:;" title="好琴声认证"><i class='iconfont newRenZheng '></i></a>
                              
                             <?php
                                }
                                ?>
                </div>
				<div class="shenfen"><em>身份：</em><span><? 
					if($groupid==1){
						echo $putong_shenfen;//普通会员默认爱乐人
					}elseif($groupid==2){
						echo $music_star;//音乐之星
					}elseif($groupid==3){
						echo $teacher_type;//音乐老师
					}elseif($groupid==4){
						echo "音乐教室";
					}elseif($groupid==5){
						echo "乐器品牌";
					}
				?></span></div>
				<div class="dengji"><em>等级：</em><span>				
				<?
                if($userfen<=100){
                    echo "一级";
                }elseif($userfen<=300){
                	 echo "二级";
                }elseif($userfen<=800){
                	 echo "三级";
                }elseif($userfen<=2000){
                	 echo "四级";
                }elseif($userfen<=5000){
                	 echo "五级";
                }elseif($userfen<=15000){
                	 echo "六级";
                }elseif($userfen<=50000){
                	 echo "七级";
                }elseif($userfen>=100000){
                	 echo "八级";
                }else{
					echo "八级";
				}
				?></span><a href="javascript:;">[积分规则]</a></div>
				<div class="jingyanzhi clearfix">
                	<?
                    	if($groupid!=4){
					?>
					<em>爱好乐器：</em><span><?=$aihao?></span>
					<?	
						}
					?>
                
                </div>
				<div class="guanzhu clearfix">
                 <?
                $s=$empire->fetch1("select follownum,feednum from {$dbtbpre}enewsmemberadd where userid='$userid'"); 
				?>
					<div class="inguanzhu"><em>关注</em><span><?=$s[feednum]?></span></div>
					<div class="fensi"><em>粉丝</em><span><?=$s[follownum]?></span></div>

				</div>
			</div>
			<div class="fatiezi">
					<ul class="clearfix">
						<li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>">我的空间</a></li>
                        <li><a href="<?=$public_r['newsurl']?>">返回首页</a></li>
					</ul>
				</div>
			<div class="search">
			<form action="/e/search/index.php" method="post" name="searchform" id="searchform">
					<input type="hidden" name="show" value="title" />
					<input type="hidden" name="tempid" value="1" />					
					<input type="search" name="keyboard" placeholder="钢琴 吉他 萨克斯">
					<input class="center_sosuo" type="submit" />
			</form>
				<i class="iconfont">&#xe658;</i>
			</div>
		</div>
		<!-- 登录区域结束··············································· -->
		<!-- 右侧帖子展示··············································· -->
		<div class="chaxuntiezi">
			<h2>最新视频</h2>
			<div class="recommond">
				<!--<span>换一批</span>-->

				<dl>
                
					<!--<dd>个人热门贴</dd>-->
                    
<?
$friend_one="select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where classid=11 order by a.id DESC limit 10";
$list_one=$empire->query($friend_one);
while($bb=$empire->fetch($list_one))
{		   	
?>
<dt>
      				<img src="<?=$bb['titlepic']?>">
					<a href="<?=$bb[titleurl]?>"><?=$bb[title]?></a>
                    
				<span><a href="/e/space/?userid=<?=$bb[userid]?>"><?=$bb['username']?></a></span>
                    
					<span><?=$bb['newspath']?></span>
                    </dt>
<?
}
?>
			<a href="<?=$public_r['newsurl']?>/guangchang">查看更多帖子</a>
				</dl>
		</div>
		<!-- 右侧帖子展示··············································· -->
	</div>
	<!-- 右侧展示完成····················································· -->
<!-- 中间区域结束···························································· -->
</div>
<!-- ····························中间结构结束·································· -->

<!-- 底部结构开始································································ -->

<!-- 底部结构开始································································ -->

</div>
</body>
</html>