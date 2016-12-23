<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//位置
$url="$spacename &gt; 首页";
include("header.temp.php");
$registertime=eReturnMemberRegtime($ur['registertime'],"Y-m-d H:i:s");
//oicq
if($addur['oicq'])
{
	$addur['oicq']="<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=".$addur['oicq']."&amp;Site=".$public_r['sitename']."&amp;Menu=yes' target='_blank'><img src='http://wpa.qq.com/pa?p=1:".$addur['oicq'].":4'  border='0' alt='QQ' />".$addur['oicq']."</a>";
}
//简介
$usersay=$addur['saytext']?$addur['saytext']:'暂无简介';
$usersay=RepFieldtextNbsp(stripSlashes($usersay));
?>
<div class="bodyWrap">
        <div class="gerenBody clearfix">
		<!-- 左侧部分······································ -->
		<div class="gerenLeft">
			<div class="guanzhuBox">
				<div class="guanzhuWrap">
					<div class="guanzhuliang"><span>关注量：</span><i><?=$feednum?></i></div>
					<div class="fensishu">
						<span>粉丝数：</span><i><?=$follownum?></i>
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
					<!--<a href="javascript" class="guanzhuBtn">关注</a>-->

					<a href="/e/member/msg/AddMsg/?username=<?=$username?>" class="button blue small ">私信</a>
				</div>
			</div>
			<!-- 广告 -->
			<div class="AdPosition">
				<a href="javascript:;"><img src="" alt=""></a>
			</div>
            
			<!-- 他的粉丝 -->
			<div class="tadefensi">
				<h2><?=$me?>的粉丝<span>(<?=$fsnum?>)</span></h2>
				<ul class="clearfix">
					 <?php
$flsql=$empire->query("select feeduserid,userid from {$dbtbpre}enewsmemberadd order by userid"); 
$fansnum=0;
while($b=$empire->fetch($flsql))
{	
	$fansid=explode("::::::",$b['feeduserid']);
	$i=1;
	if ($i<=16){
		if (in_array($userid,$fansid)){
		$fans=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$b[userid]' limit 1");
		$fansxx=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$b[userid]' limit 1");
		$fanspic=$fans['userpic']?$fans['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
		echo '<li><a href="/e/space/?userid='.$b[userid].'"><img src="'.$fanspic.'"><h3>'.$fansxx[username].'</h3></a></li>';
		$i++;
		$fansnum=1;
		}
	} else {
	exit();	
	}
}
	if ($fansnum==0){
		echo '<div class="nogz">暂时还没有'.$me.'的Fans</div>';
		}
?>

                    	
					
				</ul>
				<a class="moreBtn" href="javascript:;"></a>
			</div>
			<!-- 他的关注 -->
			<div class="tadefensi tadeguanzhu">
				<h2><?=$me?>的关注<span>(<?=$feedusernum?>)</span></h2>
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
?>

				</ul>
				<a class="moreBtn" href="javascript:;"></a>
			</div>

		</div>
        
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
				<!--<li>活动</li>-->
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
<?
$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' order by a.id  desc limit 20" );
while($r=$empire->fetch($sql))
{	
?>
					<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="<?=$r['titleurl']?>"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li class="bigsize"><a title="转载量" href="javascript:;"><i class="iconfont">&#xe623;</i></a></li>
										<li>34</li>
										<li class="bigsize"><a title="加入收藏" href="javascript:;"><i class="iconfont">&#xe647;</i></a></li>
										<li></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
<?
}
?>
				</ul>
				<!-- 视频 -->
				<ul class="quanzhandongtai pubu2">
					<?
$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where classid=11 and a.userid='$userid' order by a.id  desc limit 20" );
while($r=$empire->fetch($sql))
{	
?>
					<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="javascript:;"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li class="bigsize"><a title="转载量" href="javascript:;"><i class="iconfont">&#xe623;</i></a></li>
										<li>34</li>
										<li class="bigsize"><a title="加入收藏" href="javascript:;"><i class="iconfont">&#xe647;</i></a></li>
										<li></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
<?
}
?>
				</ul>
				<!-- 音乐 -->
				<ul class="quanzhandongtai pubu3">
					<?
$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where classid=13 and a.userid='$userid' order by a.id  desc limit 20" );
while($r=$empire->fetch($sql))
{	
?>
					<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="javascript:;"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li class="bigsize"><a title="转载量" href="javascript:;"><i class="iconfont">&#xe623;</i></a></li>
										<li>34</li>
										<li class="bigsize"><a title="加入收藏" href="javascript:;"><i class="iconfont">&#xe647;</i></a></li>
										<li></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
<?
}
?>
				</ul>
				<!-- 图片 -->
				<ul class="quanzhandongtai pubu4">
					<?
$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where classid=12 and a.userid='$userid' order by a.id  desc limit 20" );
while($r=$empire->fetch($sql))
{	
?>
					<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="javascript:;"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li class="bigsize"><a title="转载量" href="javascript:;"><i class="iconfont">&#xe623;</i></a></li>
										<li>34</li>
										<li class="bigsize"><a title="加入收藏" href="javascript:;"><i class="iconfont">&#xe647;</i></a></li>
										<li></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
<?
}
?>
				</ul>
				<!-- 简介 -->
				<ul class="jianjie ">
					<li><h4>个人资料</h4></li>
					<li><span>用户名：</span><i><?=$username?></i></li>
					<li><span>性别：</span><i><?=$sex?></i></li>
					<!--<li><span>手机号：</span><i><?=$phone?></i></li>-->
					<!--<li><span>邮箱：</span><i><?=$email?></i></li>-->
					<li><span>身份：</span><i>
						<?
                	if($groupid==1){
						echo $putong_shenfen;//普通会员默认爱乐人
					}elseif($groupid==2){
						echo $music_star;    //音乐之星
					}elseif($groupid==3){
						echo $teacher_type;  //音乐老师
					}elseif($groupid==4){
						echo "音乐教室";      //音乐老师
					}
						?>
                    </i></li>
					<li><span>生日：</span><i><?=$chusheng?></i></li>
					<li><span>所在城市：</span><i><?=$address?></i></li>
					<li><span>地址：</span><i><?=$address2?></i></li>
					<li><span>自我介绍：</span><i><?=$saytext?></i></li>

				</ul>
				<!-- 活动 -->
				<!--<ul class="lh ">
						
                        <?
$friend_sql="select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_ecms_shop c on a.userid=c.userid where a.classid=78 and a.hai_id=c.id and c.id='$r[id]' order by a.id DESC";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{   
?>
<li>
						  <div class="p-img ld">
						  	<a href="#"><img src="images/2.5.jpg"></a>
						  </div>
						  <div class="p-name"><a href="#">音乐之星海选</a></div>
						  <div class="p-price">活动时间：<strong>2016-01-18</strong></div>
						</li>
<?
}
?> 
                        
				</ul>-->
		</div>
	</div>

	
	<!-- 调用slide插件····························· -->




		</div>
        </div>
        </div>
<?php
include("footer.temp.php");
?>