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
<?=$spacegg?>
<div class="bodyWrap clearfix">
	<!-- 左边二级导航列···················································· -->
	<div class="leftWrap jiaoshiRight">
		<div class="login_Hou">
				<a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>"><div class="touxiang"><img src="<?=$userpic?>"></div></a>
				<div class="uesrID"><?=$username?>
               		<?
                	if($renzheng==1){
						echo "<i class='iconfont hongse'>&#xe657;</i>";
					}
					?>
                </div>
                <div class="qianyue"><?=$jiaoshi?></div>
				<div class="shenfen1"><em>类型：</em><span><? 
					if($groupid==1){
						echo $putong_shenfen;//普通会员默认爱乐人
					}elseif($groupid==2){
						echo $music_star;//音乐之星
					}elseif($groupid==3){
						echo $teacher_type;//音乐老师
					}elseif($groupid==4){
						echo "音乐教室";
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
                }elseif($userfen<=100000){
                	 echo "八级";
                }
				?>
                </span></div>
				
				<div class="guanzhu clearfix">
					<div class="inguanzhu"><em>关注</em><span><?=$feedusernum?></span></div>
					<div class="fensi"><em>粉丝</em><span><?=$fsnum?></span></div>
				</div>
				

			</div>



	</div>
	<!-- 左边二级导航列结束················································ -->

	<!-- 中间内容部分······················································ -->
	<div class="rightWrap jiaoshiLeft clearfix">
		<div class="rightBan">
			<div class="mianbaoNav">
				<!--<span><a href="javascript:;">首页</a></span><span>></span><span><a href="javascript:;">海选</a></span><span>></span><span><a href="javascript:;">两岸大师班</a></span><span>></span><span><a href="javascript:;">赛事详情</a></span>-->
			</div>
			
			<div class="saishiMsg ">
				<img class="jiaoshiImg"> src="<?=$userpic?>">
				<div class="inMsg">
					<ul>
						<li class="jiaoshiming"><span class="jiacu " ><?=$username?></span>
                    <?
                	if($renzheng==1){
						echo "<i class='iconfont hongse'>&#xe657;</i>";
					}
					?>
                        
                        </li>
						<li><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i></li>
						<li><span>服务(80)</span><span>环境(80)</span>
						<span>教学质量(100)</span>
						<span>总体评价(100)</span></li>
						<li><span>电话：</span><span><?=$phone?></span><span><?=$mycall?></span></li>
						<li><span>地址：</span><i><?=$address?><?=$address1?><?=$address2?><?=$addres?></i></li>
						<li><span>圈号：</span><span><?=$userid?></span>
						<span>圈主：</span>
						<span><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$userid?>" class="jiacu"><?=$fuzeren?></a></span></li>
					</ul>
				</div>
				<div class="canyu">
					<ul>
						<li class="baomingrenshu">
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
                        <a href="/e/member/msg/AddMsg/?username=<?=$username?>" class="button blue small orange">提问</a>
						<li class="clearfix">
                        <a href="javascript:;"><i class="iconfont">&#xe647;</i><span>收藏</span></a>
                        <span>分享：</span><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- 第一.全站动态部分············································· -->
			<div class="rightMiddle qzdtList">
				




			<!-- 内容··························· -->
				<div class="qzdtContent">

					<!-- 第一，当前海选部分····························· -->

					<div class="yinyuemingren">
						<!-- 分类行····································· -->
						<div class="fenlei borTop">
							<ul class="clearfix fenleiFuck">
								<li class="current"><a href="javascript:;">推荐视频</a><span></span></li>
								<li><a href="javascript:;">课程中心</a><span></span></li>
								<li><a href="javascript:;">琴房租赁</a><span></span></li>
								<li><a href="javascript:;">音乐老师</a><span></span></li>
								<li><a href="javascript:;">介绍评论</a><span></span></li>
								<li><a href="javascript:;">活动公告</a><span></span></li>
								
								

							</ul>
						</div>
						<!-- 分类行结束································· -->
						<!-- 排序行····································· -->
						
						<!-- 列表内容区域······························· -->
						<div class="liebiao">


							<!-- 推荐视频 -->
							<ul class="liebiaoFuck liebiaoShow current jiaoshiVideo clearfix">
								<li>
									
									<a href="javascript:;">
										<i class="iconfont">&#xe63b;</i>
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>莫扎特独奏曲</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span>点击:</span><em>1234</em>

										<a href="javascript:;"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>

										<div class="bdsharebuttonbox po2"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
										<span class="po3">分享</span>
									</div>
									
									
								</li>
								<li>
									
									<a href="javascript:;">
										<i class="iconfont">&#xe63b;</i>
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>莫扎特独奏曲</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span>点击:</span><em>1234</em>

										<a href="javascript:;"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>

										<div class="bdsharebuttonbox po2"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
										<span class="po3">分享</span>
									</div>
									
									
								</li>
								<li>
									
									<a href="javascript:;">
										<i class="iconfont">&#xe63b;</i>
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>莫扎特独奏曲</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span>点击:</span><em>1234</em>

										<a href="javascript:;"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>

										<div class="bdsharebuttonbox po2"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
										<span class="po3">分享</span>
									</div>
									
									
								</li>
								<li>
									
									<a href="javascript:;">
										<i class="iconfont">&#xe63b;</i>
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>莫扎特独奏曲</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span>点击:</span><em>1234</em>

										<a href="javascript:;"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>

										<div class="bdsharebuttonbox po2"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
										<span class="po3">分享</span>
									</div>
									
									
								</li>
								<li>
									
									<a href="javascript:;">
										<i class="iconfont">&#xe63b;</i>
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>莫扎特独奏曲</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span>点击:</span><em>1234</em>

										<a href="javascript:;"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>

										<div class="bdsharebuttonbox po2"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
										<span class="po3">分享</span>
									</div>
									
									
								</li>
								
								
								
							</ul>
							<!-- 课程中心 -->
							<ul class="liebiaoFuck liebiaoShow  jiaoshiVideo clearfix">
								<li>
									
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>提琴指法</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span class="hongse">¥:1234</span><del>¥:1234</del>
									</div>
									
									
								</li>
								<li>
									
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>提琴指法</span>
										</div>
									</a>
									<div class="guanzhu xingming clearfix">
										<span class="hongse">¥:1234</span><del>¥:1234</del>
									</div>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>提琴指法</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span class="hongse">¥:1234</span><del>¥:1234</del>
									</div>
								</li>
								<li>
									
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>提琴指法</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span class="hongse">¥:1234</span><del>¥:1234</del>
									</div>
								</li>
								<li>
									
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming biaoti">

											<span>提琴指法</span>
										</div>
									</a>
									
									<div class="guanzhu xingming clearfix">
										<span class="hongse">¥:1234</span><del>¥:1234</del>
									</div>
								</li>
							</ul>
							<!-- 琴房租赁 -->
							<ul class="liebiaoFuck liebiaoShow jiaoshiVideo clearfix">
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">XXXX琴房</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>价格：</span><span class="hongse">¥1000元</span>
									</div>

									<div class="guanzhu xingming clearfix">
										<a href="javascript:;"><i class="iconfont ">&#xe647;</i><span >收藏</span></a>
									</div>
									<span class="dianjichakan"><a href="">我要租</a></span>
								</li>
							
							</ul>
							<!-- 音乐老师 -->
							<ul class="liebiaoFuck liebiaoShow jiaoshiVideo clearfix">
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">赵钱孙李</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>身份：</span><span>键盘老师</span>
									</div>
									
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">赵钱孙李</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>身份：</span><span>键盘老师</span>
									</div>
									
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">赵钱孙李</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>身份：</span><span>键盘老师</span>
									</div>
									
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">赵钱孙李</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>身份：</span><span>键盘老师</span>
									</div>
									
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<strong class="noname1">赵钱孙李</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>身份：</span><span>键盘老师</span>
									</div>
									
								</li>
							</ul>
							<!-- 介绍评论 -->
							<ul class="liebiaoFuck liebiaoShow clearfix">
								<div class="jiaoshijieshao">
									

								</div>
								<div class="jiaoshipinglun">
								</div>
							</ul>

							<!-- 活动公告 -->
							<ul class="liebiaoFuck liebiaoShow notice clearfix">
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
								<li class="clearfix">
									<a href="javascript:;">
										<span class="iconfont hongse">&#xe65e;</span>春节放假一个月
										
									</a>
										<span>2016-1-6 12:00</span>
								</li>
							</ul>
						</div>
						<!-- 列表内容区域结束··························· -->
					</div>
					<!-- 当前海选部分结束······························ -->

					<!-- 第二，历史回顾部分···························· -->
					<div class="xinyuezhixing">
						<div class="fenlei">
							<ul class="clearfix fenleiCa">
								<li class="current"><a href="javascript:;">全部</a><span></span></li>
								<li><a href="javascript:;">中华好琴声</a><span></span></li>
								<li><a href="javascript:;">城市音乐会</a><span></span></li>
								<li><a href="javascript:;">两岸大师班</a><span></span></li>
							</ul>
						</div>
						
						<div class="liebiao">
							<ul class="liebiaoCa liebiaoShow current clearfix">
							<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>	
							</ul>
							<ul class="liebiaoCa liebiaoShow clearfix">
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
							</ul>
							<ul class="liebiaoCa liebiaoShow clearfix">
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
							</ul>
							<ul class="liebiaoCa liebiaoShow clearfix">
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
								<li>
									<a href="javascript:;">
										<img src="/images/230230.jpg"alt="">
										<div class="xingming">

											<span>活动名称：</span><strong>金猴贺岁新春之星海选</strong>
										</div>
									</a>
									<div class="shenfen xingming">
										<span>活动时间：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<div class="guanzhu xingming clearfix">
										<span>活动地点：</span><strong>金猴贺岁新春之星海选</strong>
									</div>
									<span class="dianjichakan"><a href="">点击查看</a></span>
								</li>
							</ul>
						</div>
					</div>
					<!-- 第二，音乐之星部分结束························ -->
				</div>
			<!-- 内容··························· -->
			</div>
		<!-- 全站动态内容部分结束······························ -->
	</div>
	<!-- 中间内容部分结束·················································· -->
</div>
<?php
include("footer.temp.php");
?>