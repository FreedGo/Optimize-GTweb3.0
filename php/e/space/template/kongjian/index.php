<?php
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接 

$userid=$_GET['userid'];
if(empty($userid)){
	exit;
}
//会员信息
$tmgetuserid=$userid;	//用户ID
$tmgetusername=RepPostVar($username);	//用户名
$tmgetgroupid=$groupid;	//用户组ID
$getuserid=(int)getcvar('mluserid');//当前登陆会员ID
$getusername =getcvar('mlusername');//当前登陆会员名

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


$u=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$userid'"); 
$s=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$u[username]?>的主页</title>
	
	<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="/css/wodekongjianzhuye.css">
	<link rel="stylesheet" type="text/css" href="/yecha/button.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/js/jquery.timeago.js"></script>
<script type="text/javascript" src="/js/jNotify.jquery.min.js"></script>
<script type="text/javascript" src="/js/artDialog.js"></script>
<script type="text/javascript" src="/js/iframeTools.js"></script>
<script type="text/javascript" src="/js/visuallightbox.js"></script>
<script type="text/javascript" src="/js/52img.js"></script>
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
	// 封装ajax调用,data1=userid,data2=帖子的类型12345,data3=第几次请求
	var CurrentUserid = "<?=$userid?>";
	function kongjianList(data1,data2,data3) {
		$.ajax({
			url: '/e/space/template/kongjian/zhuye.ajax.php',
			type: 'post',
			dataType: 'html',
			data: {'userid': data1,'cid':data2,'num':data3},
			beforeSend:function(){
				$('.loaderMsg').html('帖子加载中...')
			}
		})
		.done(function(msg) {
			$('.loaderMsg').remove();
			console.log("success");
			// console.log(msg);
			if (data2==5) {
				if(msg!=""){
					$('.quanzhandongtai').eq(data2).append(msg);
					$('.quanzhandongtai').eq(data2).append('<li class="loaderMsg">下拉刷新帖子↓</li>');
				} else{
					$('.quanzhandongtai').eq(data2).append('<li class="loaderMsg">到底了，没有更多的帖子了！</li>');
				}
				
			} else {
				if(msg!=""){
					$('.quanzhandongtai').eq(data2-1).append(msg);
					$('.quanzhandongtai').eq(data2-1).append('<li class="loaderMsg">下拉刷新帖子↓</li>');
				}else{
					$('.quanzhandongtai').eq(data2-1).append('<li class="loaderMsg">到底了，没有更多的帖子了！</li>');
				}
				
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
	var listType1 = 0,//主页类型
		listType2 = 1,//视频类型
		listType3 = 2,//音乐类型
		listType4 = 3,//照片类型
		listType5 = 4,//活动类型
		listType,//所有的类型
		listNum = [0,0,0,0,0],
		listNum1 = 0,//主页请求次数
		listNum2 = 0,//视频请求次数
		listNum3 = 0,//音乐请求次数
		listNum4 = 0,//图片请求次数
		listNum5 = 0;//活动请求次数
	window.onload = function () {
		for (var i = 0; i < 5; i++) {
			kongjianList(CurrentUserid,i+1,listNum[i]);
			listNum[i]++;
			console.log(listNum);
		}
		
	}

	$(function() {
		var scrollTimer=null;
		$(window).scroll(function(event) {
			console.log(scrollTimer);
			if(scrollTimer){//当定时器存在时,清除定时器，即达到替代效果，实现函数节流
				clearTimeout(scrollTimer);
			}
			if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
				//0.首先设置单次定时器
				scrollTimer = setTimeout(function(){
					//1.获取是哪个类型的帖子需要加载
					listType = $('.www360buy .hd li.on').index();
					console.log(listType);
					kongjianList(CurrentUserid,listType+1,listNum[listType]);
					listNum[listType]++;
					console.log(listNum[listType]);
					console.log(listNum);
					console.log(CurrentUserid,listType+1,listNum[listType]);
					
				},500);//定时器设置结束
				
			};//判断滚动条件结束	
			
		});//设置滚动事件结束



	});	




	$(function() {
			// 瀑布流动态加载pubu1的li···································					
						// var iList=4;
						// $('.pubu1>li:gt(3)').hide();
						// $('.pubu2>li:gt(3)').hide();
						// $('.pubu3>li:gt(3)').hide();
						// $('.pubu4>li:gt(3)').hide();
						// $('.hd li').click(function(event) {
						// 	iList=4;
						// });

						// $(window).scroll(function(event) {
						// 	if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {

						// 			for (var i = iList; i < iList+3; i++) {
						// 				$('.pubu1>li').eq(i).fadeIn(2000);
						// 			};
						// 			for (var i = iList; i < iList+3; i++) {
						// 				$('.pubu2>li').eq(i).fadeIn(2000);
						// 			};
						// 			for (var i = iList; i < iList+3; i++) {
						// 				$('.pubu3>li').eq(i).fadeIn(2000);
						// 			};
						// 			for (var i = iList; i < iList+3; i++) {
						// 				$('.pubu4>li').eq(i).fadeIn(2000);
						// 			};




						// 			iList=iList+3;

						// 	};
						// });
					
				
				// 瀑布流动态加载li···································

				// 背景图上的个人资料点击之后显示个人资料
				$('.shouye li').eq(1).click(function(event) {
					$('.jianjie ').show().siblings().hide();
				});


		});
	</script>
    <script type="text/javascript">
		$(function() {
			// 调用slide插件,必须分开写，·····························
			jQuery(".www360buy").slide({delayTime:0,
				trigger:'click'});
			// 调用slide插件·····························
			
		});
		
	</script>
</head>
<body>
<!-- ······························头部结构····································· -->
	<?
    include("header.php");
	?>	
<!-- 头部结构结束······························································ -->

<!-- ····························中间结构·································· -->
<div class="bodyWrap">
	<!-- 页头的大背景图片································· -->
    <div class="beijingdatu">
    	<div class="touxiangImg">
    		<a href="/e/space/?userid=<?=$userid?>"><img src="<?=$s[userpic]?>" alt="靓照"></a>
    	</div>
		<div class="mingzi">
			<h2><?=$u[username]?></h2>
            	<?
                if($u[ched]==1){
                	echo '<img src="/images/yirenzheng.png" height="30" width="80" alt="认证">';
                }else{
					echo '<img src="/images/weirenzheng.png" height="30" width="80" alt="认证">';
				}
				?>
			
            
		</div>
		<div class="bigMsg">
			<ul>
				<li><h2><?=$u[username]?></h2></li>
							<li><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["fbook","qzone","tsina","weixin","tqq","bdxc","tqf","tieba","douban","sqq","mail","isohu","ty","twi"],"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script></li>
				<li><span>身份：</span><i>
                		<? 
					if($u[groupid]==1){
						echo $s[putong_shenfen];//普通会员默认爱乐人
					}elseif($u[groupid]==2){
						echo $s[music_star];//音乐之星
					}elseif($u[groupid]==3){
						echo $s[teacher_type];//音乐老师
					}elseif($u[groupid]==4){
						echo "音乐教室";
					}elseif($u[groupid]==5){
						echo "乐器品牌";
					}
						?>
                </i></li>
				<li><span>等级：</span><i>
                	<?
                if($u[userfen]<=100){
                    echo "一级";
                }elseif($u[userfen]<=300){
                	 echo "二级";
                }elseif($u[userfen]<=800){
                	 echo "三级";
                }elseif($u[userfen]<=2000){
                	 echo "四级";
                }elseif($u[userfen]<=5000){
                	 echo "五级";
                }elseif($u[userfen]<=15000){
                	 echo "六级";
                }elseif($u[userfen]<=50000){
                	 echo "七级";
                }elseif($u[userfen]<=100000){
                	 echo "八级";
                }else{
					echo "八级";
				}
				?>
                </i></li>
					<?
                	if($u[groupid]==4 || $u[groupid]==5){
					?><li><span>电话：</span><i><?=$s[phone]?></i><?=$s[telephone]?><i></i></li>
					  <li><span>面积：</span><i><?=$s[measure]?></i></li>
               		<?
					}else{
					?>
					<li><span>性别：</span><i><?=$s[sex]?></i></li>
					<li><span>生日：</span><i><?=$s[chusheng]?></i></li>
                <?
					}
				?>
				<li><span>地区：</span><i><?=$s[address]?> <?=$s[address1]?> <?=$s[address2]?></i></li>
				

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
    <!-- 页头的大背景图片结束································· -->
    <!-- 个人空间的身体部分································· -->
	<div class="gerenBody clearfix">
		<!-- 左侧部分······································ -->
		<div class="gerenLeft">
			<div class="guanzhuBox">
				<div class="guanzhuWrap">
					<div class="guanzhuliang"><span>关注量：</span><i><?=$s[feednum]?></i></div>
					<div class="fensishu">
						<span>粉丝数：</span><i><?=$s[follownum]?></i>
					</div>
				</div>
				<div class="sixinWrap clearfix">
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
                <?=$follow?>
					<a href="/e/member/msg/AddMsg/?username=<?=$u[username]?>" class="button blue small sixinBtn">私信</a>
				</div>
			</div>
			<!-- 广告 -->
			<div class="AdPosition">
				<a href="javascript:;"><img src="" alt=""></a>
			</div>
			<!-- 他的粉丝 -->
			<div class="tadefensi">
				<h2><?=$me?>的粉丝<span>(<?=$s[feednum]?>)</span></h2>
				<ul class="clearfix">
<?
$sql=$empire->query("select feeduserid,userid,userpic from {$dbtbpre}enewsmemberadd where feeduserid like '%33::::::%' order by userid desc limit 12"); 
while($g=$empire->fetch($sql)) 
{ 
	$k=$empire->fetch1("select username from {$dbtbpre}enewsmember where userid='$g[userid]'"); 
?>
	<li><a href="/e/space/?userid=<?=$g[userid]?>">
		<img src="<?=$g[userpic]?>">
		<h3><?=$k[username]?></h3>
	</a></li>
<?
} 
?>					
                        
						
				</ul>
				<a class="moreBtn" href="javascript:;"></a>
			</div>
			<!-- 他的关注 -->
			<div class="tadefensi tadeguanzhu">
				<h2><?=$me?>的关注<span>(<?=$s[follownum]?>)</span></h2>
				<ul class="clearfix">
					<?php
//关注的人
$i=0;
$total=$feedusernum;
if ($total>8){
	$total=8;
}
if ($total==0){
	echo '<div class="nogz">暂时还没有关注的人</div>';
}
while($i<$total){
	$gz=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$feeduserid[$i]' limit 1");
	$gzxx=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$feeduserid[$i]' limit 1");
	$gzxxpic=$gzxx['userpic']?$gzxx['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	echo '<li><a href="/e/space/?userid='.$feeduserid[$i].'"><img src="'.$gzxxpic.'"><h3>'.$gz[username].'</h3></a></li>';

	$i++;
}
				?>

				</ul>
				<a class="moreBtn" href="javascript:;"></a>
			</div>
			<!-- 最近来访 -->
			<div class="tadefensi zuijinlaifang">
				<h2><?=$me?>的访客<span></span></h2>
				<ul class="clearfix">
<?php
$jl=$empire->fetch1("select zuijin from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
$jluserid=explode("::::::",$jl['zuijin']);
$i=0;
$jlnum=count($jluserid)-1;
if ($jlnum>=8){
	$jlnum=8;
} 
elseif ($jlnum=='0')
	{
	echo '<div class="nogz">暂时还没有访客记录</div>';
} 
while($i<$jlnum)
{
	$jluser=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$jluserid[$i]' limit 1");
	$jluserxx=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$jluserid[$i]' limit 1");
	$jluserpic=$jluser['userpic']?$jluser['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	?>
<li><a href="/e/space/?userid=<?=$jluserid[$i]?>"><img src="<?=$jluserpic?>" alt=""><h3><?=$jluserxx[username]?></h3></a></li>
	<?
	$i++; 
}
?>				</ul>
				<a class="moreBtn" href="javascript:;"></a>
			</div>

		</div>
		<!-- 左侧部分结束······································ -->
		<!-- 右侧部分······································ -->
		<div class="gerenRight">
			<!-- 调用slide插件····························· -->
				<div class="www360buy" style="margin:0 auto">
		<div class="hd">
			<ul class="clearfix">
				<li>主页</li>
				<li>视频</li>
				<li>音乐</li>
				<li>照片</li>
				<li>简介</li>
				<li>活动</li>
			</ul>
		</div>
		<div class="bd">
				<!-- 主页 -->
				<ul class="quanzhandongtai pubu1">
					<!-- 分享Js代码 -->
					<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
						$(function() {
										for (var i = 0; i < 5; i++) {
											$('.timeRight ol').children('li').eq(10+11*i).click(function(event) {
											$(this).parents('.timeRight').children('.bdsharebuttonbox').stop(true).slideDown();
											event.stopPropagation();
											$(window).click(function(event) {
												$('.timeRight .bdsharebuttonbox').stop(true).slideUp();
											});
										});
									};

					


											
						});

						</script>
					<!-- 分享的js代码结束 -->
				</ul>
				<!-- 视频 -->
				<ul class="quanzhandongtai pubu2">

				</ul>
				<!-- 音乐 -->
				<ul class="quanzhandongtai pubu3">

				</ul>
				<!-- 图片 -->
				<ul class="quanzhandongtai pubu4">

				</ul>
				<!-- 简介 -->
				<ul class="jianjie ">
					<li><h4>个人资料</h4></li>
					<li><span>用户名：</span><i><?=$u[username]?></i></li>
<?
if($u[groupid]==3){
?>
					<li><span>性别：</span><i><?=$s[sex]?></i></li>
                    <li><span>生日：</span><i><?=$s[chusheng]?></i></li>
<?
}else{
?>
					<li><span>电话：</span><i><?=$s[phone]?></i></li>
					<li><span>面积：</span><i><?=$s[measure]?></i></li>
<?
}
?>				
					<li><span>身份：</span><i>
						<?
                	if($u[groupid]==1){
						echo $s[putong_shenfen];//普通会员默认爱乐人
					}elseif($u[groupid]==2){
						echo $s[music_star];    //音乐之星
					}elseif($u[groupid]==3){
						echo $s[teacher_type];  //音乐老师
					}elseif($u[groupid]==4){
						echo "音乐教室";      //音乐老师
					}
						?>
                    </i></li>
					
					<li><span>所在城市：</span><i><?=$s[address]?> </i></li>
					<li><span>地址：</span><i><?=$s[address1]?> <?=$s[address2]?></i></li>
					<li><span><?
                    	if($u[groupid]==3){
							echo "老师介绍";
						}else{
							echo "教室介绍";
						}
					?>：</span><i><?=$s[saytext]?></i></li>

				</ul>
				<!-- 活动 -->
				<ul class="lh ">
					
				</ul>
		</div>
	</div>

	
	<!-- 调用slide插件····························· -->




		</div>
		<!-- 右侧部分结束······································ -->
	</div>
	<!-- 个人空间的身体部分结束································· -->

</div>




<!-- ····························中间结构结束·································· -->	




    


<?
    include("footer.php");
?>	
</body>
</html>