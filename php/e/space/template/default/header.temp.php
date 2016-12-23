<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//--------------- 界面参数 ---------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid=$userid limit 1");
$userpic=$addr['userpic']?$addr['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
$teacher_type=$addr['teacher_type'];
$putong_shenfen=$addr['putong_shenfen'];
$music_star=$addr['music_star'];
$jiaoshi=$addr['jiaoshi'];
$aihao=$addr['aihao'];
$renzheng=$addr['renzheng'];
$sex=$addr['sex'];
$chusheng=$addr['chusheng'];
$address=$addr['address'];
$address1=$addr['address1'];
$address2=$addr['address2'];
$phone=$addr['phone'];
$saytext=$addr['saytext'];
$follownum=$addr['follownum'];
$feednum=$addr['feednum'];
//---------------------------------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid=$userid limit 1");
$userfen=$addr['userfen'];
$groupid=$addr['groupid'];
$userid=$addr['userid'];
$email=$addr['email'];
$cked=$addr['cked'];
//公告
$spacegg='';
if($addur['spacegg'])
{
	$spacegg=$addur['spacegg'];
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
//我还是他还是她
	if ($getuserid==$userid){
		$me="我";
	} else{
		if ($addur[sex]=="男"){
			$me="他";
		} elseif ($addur[sex]=="女"){
			$me="她";
		} else {
			$me="Ta";	
		}
	}
//我的幸运物
	$xingyun=$follow[xingyun]?$follow[xingyun]:"";
?>
<div id="tongji"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256607007'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1256607007%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$spacename?></title>
<meta name="keywords" content="<?=$spacename?>" />
<meta name="description" content="<?=$spacename?>" />


<link href="/yecha/Common.css" rel="stylesheet" type="text/css" />
<link href="/yecha/hycenter.css" rel="stylesheet" type="text/css" />
<link href="/yecha/button.css" rel="stylesheet" type="text/css" />
<link href="/yecha/user/visuallightbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.timeago.js"></script>
<script type="text/javascript" src="/js/jNotify.jquery.min.js"></script>
<script type="text/javascript" src="/js/artDialog.js"></script>
<script type="text/javascript" src="/js/iframeTools.js"></script>
<script type="text/javascript" src="/js/visuallightbox.js"></script>
<script type="text/javascript" src="/js/52img.js"></script>

<script type="text/javascript">
jQuery(document).ready(
function(){window.Lightbox = new jQuery().visualLightbox({autoPlay:false,borderSize:12,classNames:'lightbox',closeLocation:'top',descSliding:true,enableRightClick:false,enableSlideshow:true,prefix:'vlb1',resizeSpeed:7,slideTime:4,startZoom:true});
var a=jQuery;a("#feedlist .lightbox").mouseenter(function(){var b=a("div.vlb_zoom",this);if(!b.length){b=a('<div class="vlb_zoom" style="position:absolute">').hide().appendTo(this);a("img:first",b).detach()}b.fadeIn("fast")}).mouseleave(function(){a("div",this).fadeOut("fast")})
});
</script>

<style>
body{ background:<?=$bgcolor?> url(<?=$Diybg?>) <?=$Bgalign?> top <?=$repeatBg?><?=$lockbg?>;<?=$bgsize?>}
.xingyun{position:absolute; top:0; left:50%; width:500px; height:242px; background:url(<?=$xingyun?>) right bottom no-repeat; z-index:5;}
</style>

<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="/css/wodekongjianzhuye.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
	<script type="text/javascript">
		$(function() {
			// 调用slide插件,必须分开写，插件真蛋疼·····························
			jQuery(".www360buy").slide({delayTime:0,
				trigger:'click'});
			// 调用slide插件·····························
			
		});
		
	</script>
	<script type="text/javascript">
		$(function() {
			// 瀑布流动态加载pubu1的li···································
				
					
						var iList=4;
						$('.pubu1>li:gt(3)').hide();
						$('.pubu2>li:gt(3)').hide();
						$('.pubu3>li:gt(3)').hide();
						$('.pubu4>li:gt(3)').hide();
						$('.hd li').click(function(event) {
							iList=4;
						});

						$(window).scroll(function(event) {
							if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {

									for (var i = iList; i < iList+3; i++) {
										$('.pubu1>li').eq(i).fadeIn(2000);
									};
									for (var i = iList; i < iList+3; i++) {
										$('.pubu2>li').eq(i).fadeIn(2000);
									};
									for (var i = iList; i < iList+3; i++) {
										$('.pubu3>li').eq(i).fadeIn(2000);
									};
									for (var i = iList; i < iList+3; i++) {
										$('.pubu4>li').eq(i).fadeIn(2000);
									};




									iList=iList+3;

							};
						});
					
				
				// 瀑布流动态加载li···································

				// 背景图上的个人资料点击之后显示个人资料
				$('.shouye li').eq(1).click(function(event) {
					$('.jianjie ').show().siblings().hide();
				});


		});
	</script>
</head>
<body>
<div class="headerWrap">
	<!-- 顶部结构······················································ -->
		<div class="head clearfix">
			<div class="h1">
				<a href="<?=$public_r['newsurl']?>">
					<h1>好琴声</h1>
				</a>
			</div>
			<div class="fanti">
				<a href="javascript:;">繁体</a>
			</div>
			<div class="erWeiMa">
				<div class="erWeiMaImg">
					<img src="/images/foot_app.jpg" alt="">
				</div>
				<h2>扫一扫下载APP</h2>
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
					<a href="javascript:;">
						<img src="/images/ad1.jpg" height="70" width="150" alt="">
					</a>
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
					<li><a href="<?=$public_r['newsurl']?>mingren">音乐名人</a></li>
					<li><a href="<?=$public_r['newsurl']?>laoshi">音乐老师</a></li>
					<li><a href="<?=$public_r['newsurl']?>jiaoshi">琴行教室</a></li>
                    <li><a href="<?=$public_r['newsurl']?>pinpai">音乐品牌</a></li>
					<li><a href="<?=$public_r['newsurl']?>/e/action/ListInfo/?classid=96">在线教育</a></li>
					<li><a href="<?=$public_r['newsurl']?>yuepu">乐谱中心</a></li>
					<li><a href="<?=$public_r['newsurl']?>haixuan">各地海选</a></li>
					<!--<li><a href="<?=$public_r['newsurl']?>yuepu">音乐乐谱</a></li>-->
					<!--<li><a href="<?=$public_r['newsurl']?>baike">音乐百科</a></li>-->
					<!--<li><a href="<?=$public_r['newsurl']?>diantai">音乐电台</a></li>-->
					<li><a href="<?=$public_r['newsurl']?>bbs">声粉论坛</a></li>

				</ul>
			</div>
		</div>
	<!-- 导航结构···························································· -->
	</div>
<!-- 头部结构结束······························································ -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap">
<div class="beijingdatu">
    	<div class="touxiangImg">
    		<img src="<?=$userpic?>" alt="靓照">
    	</div>
		<div class="mingzi">
			<h2><?=$username?></h2>
            	<?
                	if($cked==1){
						echo "<img src='/images/yirenzheng.png'>";
					}else{
						echo "<img src='/images/weirenzheng.png'>";
						}
				?>
				
                
				
		</div>
		<div class="bigMsg">
			<ul>
				<li><h2><?=$username?></h2></li>
						<li><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["fbook","qzone","tsina","weixin","tqq","bdxc","tqf","tieba","douban","sqq","mail","isohu","ty","twi"],"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script></li>
				<li><span>身份：</span><i>
						<? 
					if($groupid==1){
						echo $putong_shenfen;//普通会员默认爱乐人
					}elseif($groupid==2){
						echo $music_star;//音乐之星
					}elseif($groupid==3){
						echo $teacher_type;//音乐老师
					}elseif($groupid==4){
						echo "音乐教室";
					}
				?>
                </i></li>
				<li><span>等级：<?=$user[userfen]?></span><i>
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
                }elseif($userfen<=100000){
                	 echo "八级";
                }
				?>
                </i></li>
				<li><span>性别：</span><i><?=$sex?></i></li>
				<li><span>生日：</span><i><?=$chusheng?></i></li>
				<li><span>地区：</span><i><?=$address?><?=$address1?><?=$address2?></i></li>
				

			</ul>
			<div class="fabiaode clearfix">
				<div><span class="fashipin"></span><i>发表了
					<?php
                       $count=mysql_query("select count(*) from phome_ecms_photo where classid='11' and userid='$userid'");
                        while($tmp=mysql_fetch_row($count)){
                        	print $tmp[0];
                        }
                    ?>
                    个视频</i></div>
				<div><span class="fatupian"></span><i>发表了
                	<?php
                       $count=mysql_query("select count(*) from phome_ecms_photo where classid='12' and userid='$userid'");
                        while($tmp=mysql_fetch_row($count)){
                        	print $tmp[0];
                        }
                    ?>
                张图片</i></div>
				
			</div>
		</div>
		<div class="shouye">
			<ul class="clearfix">
				<li><a href="<?=$public_r['newsurl']?>">回到首页</a></li>
				<li><a href="javascript:;">个人资料</a></li>
			</ul>
		</div>

    </div>
</div>   


<!-- 头部结构结束······························································ -->

<!-- ····························中间结构·································· -->
<!--
    	<div class="hytopmenu yh f14">
        	<div class="hymenu">
        	<span><?=$me?>的:</span>
        	<ul>
        		<li><a href="<?=$spaceurl?>">主页</a></li>
                <?=$dhmenu?>
                <li><a href="/e/space/fans.php?userid=<?=$userid?>">粉丝</a></li>
                <li><a href="/e/space/gbook.php?userid=<?=$userid?>">留言</a></li>
        	</ul>
            </div>
        </div>
        <div class="hy_avator">
        	<div class="avator_bg">
        	<img src="<?=$userpic?>" />
            </div>
            <div class="my_left">
            	<ul>
                    	<li><a href="javascript:void()" onclick="follow(<?=$userid?>)">关注<br /><strong><?=$feedusernum?></strong></a></li>
                        <li><a href="/e/space/fans.php?userid=<?=$userid?>">粉丝<br /><strong><?=$fsnum?></strong></a></li>
                        <li><a href="/e/space/list.php?userid=<?=$userid?>&mid=10">文章<br /><strong><?=$wznum?></strong></a></li>
                        <div class="clearfix"></div>
                </ul>
                <div class="renzheng clearfix"><span class="button green small">好琴声—<?=$tmgetgroupname?></span></div>
            </div>
        </div>
        <div class="hyhead">
        	<div class="fl w230"></div>
            <div class="fl hyxx">
            	<h3><a href="<?=$spaceurl?>" class="yh"><?=$spacename?></a></h3>
                <span class="hyurl"><a href="<?=$spaceurl?>"><?=$spaceurl?></a><br /><?=$addur[juzhu]?> | <?=$addur[job]?> | <?=$addur[sex]?></span>
                <span class="rzxx"><?=$addur[renzheng]?></span>
                <div class="hyhudong">
                <?php				
                        	if ($getuserid!=$userid){
								$f=$empire->fetch1("select feeduserid from {$dbtbpre}enewsmemberadd where userid='$getuserid'");
								$fduserid=explode("::::::",$f['feeduserid']);
								if (in_array($userid,$fduserid)){
								$follow='<a href="javascript:void()" onclick="follow('.$userid.')" class="button blue small orange" id="follow'.$userid.'" title="取消关注">取消关注</a>';
								} else{
								$follow='<a href="javascript:void()" onclick="follow('.$userid.')" class="button blue small" id="follow'.$userid.'">关注</a>';	
								}
								
								} else {
								$follow='<a href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
							}
				?>
                <?=$follow?><a href="/e/member/msg/AddMsg/?enews=AddMsg&username=<?=$username?>" target="_blank" class="button gray small ml10">发站内信</a></div>
            </div>
            <div class="fr hygg yh">
<?=$spacegg?>
				<?php
                if ($getuserid==$userid){
					echo '<a href="/e/member/mspace/SetSpace.php" class="editgg">修改公告</a>';
					}
				?>
				<div class="hyggxx">公告牌</div>
            </div>
        </div>
-->