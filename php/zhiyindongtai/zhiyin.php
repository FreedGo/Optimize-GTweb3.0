<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
	$groupid  =getcvar('mlgroupid');
	if($groupid==5 || $groupid==4){
	$userid   =getcvar('mluserid');
	$pinpai=$empire->fetch1("select * from phome_zjk_pinpai_qianyue where userid=$userid and shopzhuang='已付款' order by id desc limit 1");

		if(!empty($pinpai[userid])){
			function diffBetweenTwoDays ($day1, $day2)
			{
			  $second1 = strtotime($day1);
			  $second2 = strtotime($day2);
				
			  if ($second1 < $second2) {
				$tmp = $second2;
				$second2 = $second1;
				$second1 = $tmp;
			  }
			  return ($second1 - $second2) / 86400;
			}
			$day1 = date('Y-m-d',time());
			$day2 = $pinpai[ddtime];
			$diff = diffBetweenTwoDays($day1, $day2);
				if($pinpai[shengyu]>0){
					if($pinpai[shengyu]>$diff){
				$shengyu=$pinpai[shengyu]-$diff;
				$empire->query("UPDATE phome_zjk_pinpai_qianyue SET shengyu = '$shengyu' WHERE userid=$userid and shopzhuang='已付款' order by id desc limit 1");
				}else{
					$empire->query("UPDATE phome_zjk_pinpai_qianyue SET shengyu = '0' WHERE userid=$userid and shopzhuang='已付款' order by id desc limit 1");
				}
			}
		}
		if($pinpai[shengyu]<=0 || empty($pinpai[shengyu])){
		$empire->query("UPDATE phome_enewsmember SET cked = '0' WHERE userid=$userid limit 1");
	}
	}
?>
<?php
$public_diyr['pagetitle']='知音动态';
require(ECMS_PATH.'e/template/incfile/header.php');
//重置知音提醒状态
$userid   =getcvar('mluserid');
	$zhi=$empire->fetch1("select ti_zhiyin from {$dbtbpre}enewsmember where userid=$userid"); 
	if($zhi[ti_zhiyin]!=0){
		$empire->query("UPDATE {$dbtbpre}enewsmember SET ti_zhiyin = 0 WHERE userid=$userid");
	}
?>
			<div class="yinyueguangchang">
				<!-- 标题················· -->
				<div class="yinyueHead clearfix">
					<h3>知音动态</h3>
                    <span class="more"><a href="/e/fatie/ListInfo.php?mid=10">发帖</a></span>
				</div>
				<!-- 标题················· -->
				<!-- 音乐广场内容·············································· -->
				<script src="/js/jquery.SuperSlide.2.1.1.js"></script>
				<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
				<div class="slideTxtBox">
					<div class="hd">
						<ul><li>全部</li><li>视频</li><li>音乐</li><li>图片</li></ul>
					</div>
					<div class="bd">
						<ul class="quanzhandongtai">
	                    <!--全部-->
							<?
							//获取我的关注
							$feeduserid=$empire->fetch1("select feeduserid from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
							$feeduser_result=explode("::::::",$feeduserid['feeduserid']);
							$guanzhu=array();

								if($feeduser_result && !empty($feeduser_result)){
								unset($feeduser_result[count($feeduser_result)-1]);
								foreach($feeduser_result as $key=>$val){
									$sql="SELECT feeduserid FROM {$dbtbpre}enewsmemberadd WHERE userid=".$val;
									$result=$empire->fetch1($sql);
									if(!empty($result)){
										$friend_userid=explode("::::::",$result['feeduserid']);
										if(!empty($friend_userid)){
											unset($friend_userid[count($friend_userid)-1]);
											if(!empty($friend_userid)){
												 foreach($friend_userid as $k=>$v){
												    if($v==$tmgetuserid){
														array_push($guanzhu,$val);
														/*print_r($guanzhu);*/
													}
												 }
											}
										}
									}
								}
							}
								$whe=join(",",$guanzhu);
								if(empty($guanzhu)){
									echo "无关注好友或无动态";
									exit;
								}else{
									$friend_sql="select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid  WHERE c.userid IN ($whe) and classid in(11,12,13) order by a.id desc";
									$list=$empire->query($friend_sql);
									while($r=$empire->fetch($list))
									{
									?>
				                    <li class="clearfix" id="userImg<?=$r[id]?>">
							  <script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>

								<!-- list左侧，包含头像姓名······················ -->
									<div class="listLeft">
										<a href="javascript:;">
							                <a href="/e/space/?userid=<?=$r['userid']?>"><img src="<?=$r['userpic']?>" /></a>
							                <h3><?=$r['username']?></h3>
							                <!--等级-->
							                <span class="dengji">
							                    <?php
							                if($r[userfen]<=100){
							                    echo "一级";
							                }elseif($r[userfen]<=300){
							                     echo "二级";
							                }elseif($r[userfen]<=800){
							                     echo "三级";
							                }elseif($r[userfen]<=2000){
							                     echo "四级";
							                }elseif($r[userfen]<=5000){
							                     echo "五级";
							                }elseif($r[userfen]<=15000){
							                     echo "六级";
							                }elseif($r[userfen]<=50000){
							                     echo "七级";
							                }elseif($r[userfen]>=100000){
							                     echo "八级";
							                }else{
												echo "八级";
											}
							            ?>
							                </span><br />
							                <!--身份-->
							                <span class="shenfen">
							                <?
							                    if($r['groupid']==1){
													echo $putong_shenfen;//普通会员默认爱乐人
												}elseif($r['groupid']==2){
													echo $music_star;    //音乐之星
												}elseif($r['groupid']==3){
													echo $teacher_type;  //音乐老师
												}elseif($r['groupid']==4){
													echo "音乐教室";      //音乐老师
												}
											?>
							                </span>			</a>			</div>
								    <!-- list左侧结束，包含头像姓名·················· -->
										<!-- list右侧，内容区域·························· -->
										<div class="listRight">
											<script type="text/javascript">
												$(function() {
													var iclassid = '<?=$r[classid]?>';
													if (iclassid=='12') {//只有等于12的时候才是图片贴
														var imgUserMsg="<?=$r[id]?>";
														$.ajax({
															url: '/guangchang/index.photo.php',
															type: 'post',
															dataType: 'text',
															data: {'tit_id': imgUserMsg},
														})
														.done(function(msg) {
															console.log(msg);
															var UserImgInfo=msg;
															var userSelect="userImg"+imgUserMsg;
															// $('userSelect').children('chatu a').append('msg');
															$('#'+userSelect).find('.chatu a').empty().append(msg);
														})
														.fail(function() {
															console.log("error");
														});
													}
												});
										</script>
										<h3><a href="<?=$r['titleurl']?>"><?=$r['title']?></a></h3>
										<p><?=$r['smalltext']?></p>
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
												<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
												<li><?=$r['plnum']?></li>
											</ol>
										</div>
										</div>
										</div>
									</li>

									<?
									}
									?>
									<?
								}
							?>

						</ul>
						<ul class="quanzhandongtai">
                    	<!--视频--->
							<?
								$whe=join(",",$guanzhu);
								if(empty($guanzhu)){
									echo "无关注好友或无动态";
								}else{
									$friend_sql="select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid  WHERE c.userid IN ($whe) and a.classid=11 order by a.id desc limit 50";
									$list=$empire->query($friend_sql);
										while($r=$empire->fetch($list))
										{
										?>
										    <li class="clearfix">
											<!-- list左侧，包含头像姓名······················ -->
												<div class="listLeft">
													<a href="javascript:;">
														<img src="<?=$r['userpic']?>">
														<h3><?=$r['username']?></h3>
										                <!--等级-->
										                <span class="dengji">
										                    <?php
											                if($r[userfen]<=100){
											                    echo "一级";
											                }elseif($r[userfen]<=300){
											                     echo "二级";
											                }elseif($r[userfen]<=800){
											                     echo "三级";
											                }elseif($r[userfen]<=2000){
											                     echo "四级";
											                }elseif($r[userfen]<=5000){
											                     echo "五级";
											                }elseif($r[userfen]<=15000){
											                     echo "六级";
											                }elseif($r[userfen]<=50000){
											                     echo "七级";
											                }elseif($r[userfen]>=100000){
											                     echo "八级";
											                }else{
																echo "八级";
															}
										                    ?>
										                </span><br />
										                <!--身份-->
										                <span class="shenfen">
										                <?
										                    if($r['groupid']==1){
																echo $putong_shenfen;//普通会员默认爱乐人
															}elseif($r['groupid']==2){
																echo $music_star;    //音乐之星
															}elseif($r['groupid']==3){
																echo $teacher_type;  //音乐老师
															}elseif($r['groupid']==4){
																echo "音乐教室";      //音乐老师
															}
														?>
										                </span>
													</a>
												</div>
												<!-- list左侧结束，包含头像姓名·················· -->
												<!-- list右侧，内容区域·························· -->
												<div class="listRight">
													<h3><?=$r['title']?></h3>
													<p><?=$r['smalltext']?></p>
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
																<li><?=$r[onclick]?></li>
																<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
																<li><?=$r['plnum']?></li>
															</ol>
														</div>
													</div>
												</div>
											</li>
										<?
										}
									?>
									<?
								}
							?>
						</ul>
						<ul class="quanzhandongtai">
                    	<!--音乐-->
	                        <?
								$whe=join(",",$guanzhu);
								if(empty($guanzhu)){
										echo "无关注好友或无动态";
										exit;
									}
								$friend_sql="select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid  WHERE c.userid IN ($whe) and a.classid=13 order by a.id desc limit 50";
								$list=$empire->query($friend_sql);
								while($r=$empire->fetch($list))
								{
									?>
										<li class="clearfix">
										<!-- list左侧，包含头像姓名······················ -->
											<div class="listLeft">
												<a href="javascript:;">
												<img src="<?=$r['userpic']?>">
												<h3><?=$r['username']?></h3>
								                <!--等级-->
								                <span class="dengji">
								                    <?php
								                if($r[userfen]<=100){
								                    echo "一级";
								                }elseif($r[userfen]<=300){
								                     echo "二级";
								                }elseif($r[userfen]<=800){
								                     echo "三级";
								                }elseif($r[userfen]<=2000){
								                     echo "四级";
								                }elseif($r[userfen]<=5000){
								                     echo "五级";
								                }elseif($r[userfen]<=15000){
								                     echo "六级";
								                }elseif($r[userfen]<=50000){
								                     echo "七级";
								                }elseif($r[userfen]>=100000){
								                     echo "八级";
								                }
								            ?>
								                </span><br />
								                <!--身份-->
								                <span class="shenfen">
								                <?
								                    if($r['groupid']==1){
														echo $putong_shenfen;//普通会员默认爱乐人
													}elseif($r['groupid']==2){
														echo $music_star;    //音乐之星
													}elseif($r['groupid']==3){
														echo $teacher_type;  //音乐老师
													}elseif($r['groupid']==4){
														echo "音乐教室";      //音乐老师
													}
												?>
								                </span>
											</a>
											</div>
											<!-- list左侧结束，包含头像姓名·················· -->
											<!-- list右侧，内容区域·························· -->
											<div class="listRight">
												<h3><?=$r['title']?></h3>
												<p><?=$r['smalltext']?></p>
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
														<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
														<li><?=$r['plnum']?></li>
													</ol>
												</div>
												</div>
											</div>
										</li>
								    <?
								}
							?>
						</ul>
						<ul class="quanzhandongtai">
                    	    <!--图片-->
	                        <?
							$whe=join(",",$guanzhu);
							if(empty($guanzhu)){
									echo "无关注好友或无动态";
									exit;
								}
							$friend_sql="select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid  WHERE c.userid IN ($whe) and a.classid=12 order by a.id desc limit 50";
							$list=$empire->query($friend_sql);
							while($r=$empire->fetch($list))
							{
								?>
									<li class="clearfix" id="userImg<?=$r[id]?>0">
									<!-- list左侧，包含头像姓名······················ -->
										<div class="listLeft">
											<a href="javascript:;">
												<img src="<?=$r['userpic']?>">
												<h3><?=$r['username']?></h3>
								                <!--等级-->
								                <span class="dengji">
								                    <?php
								                if($r[userfen]<=100){
								                    echo "一级";
								                }elseif($r[userfen]<=300){
								                     echo "二级";
								                }elseif($r[userfen]<=800){
								                     echo "三级";
								                }elseif($r[userfen]<=2000){
								                     echo "四级";
								                }elseif($r[userfen]<=5000){
								                     echo "五级";
								                }elseif($r[userfen]<=15000){
								                     echo "六级";
								                }elseif($r[userfen]<=50000){
								                     echo "七级";
								                }elseif($r[userfen]>=100000){
								                     echo "八级";
								                }
								            ?>
								                </span><br />
								                <!--身份-->
								                <span class="shenfen">
								                <?
								                    if($r['groupid']==1){
														echo $putong_shenfen;//普通会员默认爱乐人
													}elseif($r['groupid']==2){
														echo $music_star;    //音乐之星
													}elseif($r['groupid']==3){
														echo $teacher_type;  //音乐老师
													}elseif($r['groupid']==4){
														echo "音乐教室";      //音乐老师
													}
												?>
								                </span>
											</a>
										</div>
										<!-- list左侧结束，包含头像姓名·················· -->
										<!-- list右侧，内容区域·························· -->
										<div class="listRight">
											<script type="text/javascript">
													$(function() {
														var iclassid = '<?=$r[classid]?>';
														if (iclassid=='12') {//只有等于12的时候才是图片贴
															var imgUserMsg="<?=$r[id]?>";

															$.ajax({
																url: '/guangchang/index.photo.php',
																type: 'post',
																dataType: 'text',
																data: {'tit_id': imgUserMsg},
															})
															.done(function(msg) {
																console.log(msg);
																var UserImgInfo=msg;
																var userSelect="userImg"+imgUserMsg+"0";

																// $('userSelect').children('chatu a').append('msg');
																$('#'+userSelect).find('.chatu a').empty().append(msg);
															})
															.fail(function() {
																console.log("error");
															});
														}
													});

										</script>
											<h3><?=$r['title']?></h3>
											<p><?=$r['smalltext']?></p>
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
														<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
														<li><?=$r['plnum']?></li>
													</ol>
												</div>
											</div>
										</div>
									</li>
						        <?
							}
							?>
						</ul>
					</div>
				</div>
				<!-- 音乐广场内容············································ -->
			</div>
			<?php
			require(ECMS_PATH.'e/template/incfile/footer.php');
			?>