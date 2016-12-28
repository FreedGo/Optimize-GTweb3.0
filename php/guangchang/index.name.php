<?php
require("../e/class/connect.php");
require("../e/class/db_sql.php");
$link = db_connect();
$empire = new mysqlquery();
header("Content-type: text/html; charset=utf-8");

$titid = $_POST['leixing'];
$name = $_POST['neirong'];
if ($titid == 0) {
	//全部
	$frie_sql = "select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where c.username like '%$name%' or a.title like '%$name%' order by a.id DESC";
	$list = $empire->query($frie_sql);
	while ($r = $empire->fetch($list)) {
		if ($r[classid] == 11) {//视频
			?>
			<li class="clearfix dongtaiLi">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>
				            <?php
				            if ($r[userfen] <= 100) {
					            echo "一级";
				            } elseif ($r[userfen] <= 300) {
					            echo "二级";
				            } elseif ($r[userfen] <= 800) {
					            echo "三级";
				            } elseif ($r[userfen] <= 2000) {
					            echo "四级";
				            } elseif ($r[userfen] <= 5000) {
					            echo "五级";
				            } elseif ($r[userfen] <= 15000) {
					            echo "六级";
				            } elseif ($r[userfen] <= 50000) {
					            echo "七级";
				            } elseif ($r[userfen] > 100000) {
					            echo "八级";
				            } else {
					            echo "八级";
				            }
				            ?>
				        </span>
						</p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">
					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">
							<img src="<?= $r[titlepic] ?>">
							<i class="iconfont">&#xe63b;</i>
						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $r[newstime]) ?></span>
					</div>
				</div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		} elseif ($r[classid] == 12) {//图片
			?>
			<li class="clearfix" id="userImg<?= $r[id] ?>">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<input type="hidden" name="titid" class="tit_id" value="<?= $r[id] ?>"/>
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>
				            <?php
				            if ($r[userfen] <= 100) {
					            echo "一级";
				            } elseif ($r[userfen] <= 300) {
					            echo "二级";
				            } elseif ($r[userfen] <= 800) {
					            echo "三级";
				            } elseif ($r[userfen] <= 2000) {
					            echo "四级";
				            } elseif ($r[userfen] <= 5000) {
					            echo "五级";
				            } elseif ($r[userfen] <= 15000) {
					            echo "六级";
				            } elseif ($r[userfen] <= 50000) {
					            echo "七级";
				            } elseif ($r[userfen] > 100000) {
					            echo "八级";
				            }
				            ?>

				        </span>
						</p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">
					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">
							<?php
							$b = $empire->fetch1("select morepic from {$dbtbpre}ecms_photo_data_1 where id='$r[id]'");
							$flid1 = explode("\r\n", $b['morepic']);
							$length = count($flid1);
							$flid_1 = explode("::::::", $flid1[0]);
							$flid_2 = explode("::::::", $flid1[1]);
							$flid_3 = explode("::::::", $flid1[2]);
							$flid_4 = explode("::::::", $flid1[3]);
							if ($length == 1) {
								echo "<img src='$flid_1[0]'>";
							} elseif ($length == 2) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
							} elseif ($length == 3) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
								echo "<img src='$flid_3[0]'>";
							} elseif ($length >= 4) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
								echo "<img src='$flid_3[0]'>";
								echo "<img src='$flid_4[0]'>";
							}
							//echo "<span class='zongshu'>总".$length."张照片</span>";

							?>

						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $r[newstime]) ?></span>
					</div>
				</div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		} elseif ($r[classid] == 13) {//音乐
			?>
			<li class="clearfix">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>
			                 <?php
				             if ($r[userfen] <= 100) {
					             echo "一级";
				             } elseif ($r[userfen] <= 300) {
					             echo "二级";
				             } elseif ($r[userfen] <= 800) {
					             echo "三级";
				             } elseif ($r[userfen] <= 2000) {
					             echo "四级";
				             } elseif ($r[userfen] <= 5000) {
					             echo "五级";
				             } elseif ($r[userfen] <= 15000) {
					             echo "六级";
				             } elseif ($r[userfen] <= 50000) {
					             echo "七级";
				             } elseif ($r[userfen] > 100000) {
					             echo "八级";
				             }
				             ?>
			                </span>
						</p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">
					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">
							<img src="<?= $r[titlepic] ?>">
							<i class="iconfont">&#xe63e;</i>
						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $bqr[newstime]) ?></span>
					</div>
				</div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		}
	}
} elseif ($titid == 1) {//会员名
	$frie_sql = "select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where c.username like '%$name%' order by a.id DESC";
	$list = $empire->query($frie_sql);
	while ($r = $empire->fetch($list)) {
		if ($r[classid] == 11) {//视频
			?>
			<li class="clearfix dongtaiLi">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>
				            <?php
				            if ($r[userfen] <= 100) {
					            echo "一级";
				            } elseif ($r[userfen] <= 300) {
					            echo "二级";
				            } elseif ($r[userfen] <= 800) {
					            echo "三级";
				            } elseif ($r[userfen] <= 2000) {
					            echo "四级";
				            } elseif ($r[userfen] <= 5000) {
					            echo "五级";
				            } elseif ($r[userfen] <= 15000) {
					            echo "六级";
				            } elseif ($r[userfen] <= 50000) {
					            echo "七级";
				            } elseif ($r[userfen] > 100000) {
					            echo "八级";
				            }
				            ?>
				        </span>
						</p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">
					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">
							<img src="<?= $r[titlepic] ?>">
							<i class="iconfont">&#xe63b;</i>
						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $r[newstime]) ?></span>
					</div>
				</div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		} elseif ($r[classid] == 12) {//图片
			?>
			<li class="clearfix" id="userImg<?= $r[id] ?>">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<input type="hidden" name="titid" class="tit_id" value="<?= $r[id] ?>"/>
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>

            <?php
            if ($r[userfen] <= 100) {
	            echo "一级";
            } elseif ($r[userfen] <= 300) {
	            echo "二级";
            } elseif ($r[userfen] <= 800) {
	            echo "三级";
            } elseif ($r[userfen] <= 2000) {
	            echo "四级";
            } elseif ($r[userfen] <= 5000) {
	            echo "五级";
            } elseif ($r[userfen] <= 15000) {
	            echo "六级";
            } elseif ($r[userfen] <= 50000) {
	            echo "七级";
            } elseif ($r[userfen] > 100000) {
	            echo "八级";
            }
            ?>
            
        </span></p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">

					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">
							<?php

							$b = $empire->fetch1("select morepic from {$dbtbpre}ecms_photo_data_1 where id='$r[id]'");

							$flid1 = explode("\r\n", $b['morepic']);
							$length = count($flid1);

							$flid_1 = explode("::::::", $flid1[0]);
							$flid_2 = explode("::::::", $flid1[1]);
							$flid_3 = explode("::::::", $flid1[2]);
							$flid_4 = explode("::::::", $flid1[3]);


							if ($length == 1) {
								echo "<img src='$flid_1[0]'>";
							} elseif ($length == 2) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
							} elseif ($length == 3) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
								echo "<img src='$flid_3[0]'>";
							} elseif ($length >= 4) {
								echo "<img src='$flid_1[0]'>";
								echo "<img src='$flid_2[0]'>";
								echo "<img src='$flid_3[0]'>";
								echo "<img src='$flid_4[0]'>";
							}
							//echo "<span class='zongshu'>总".$length."张照片</span>";

							?>

						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $r[newstime]) ?></span>
					</div>
				</div>
				</div></div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		} elseif ($r[classid] == 13) {//音乐
			?>
			<li class="clearfix">
				<?= $userinfo ?>
				<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
				<!-- list左侧，包含头像姓名······················ -->
				<div class="listLeft">
					<a href="/e/space/?userid=<?= $r[userid] ?>">
						<img src="<?= $r[userpic] ?>">
						<h3><?= $r[username] ?></h3>
						<p class="fromCity">
							<em><?= $r[address] ?></em>
							<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
						<p>
						<p><em>
								<?
								if ($r[groupid] == 1) {
									echo $r[putong_shenfen];//普通会员默认爱乐人
								} elseif ($r[groupid] == 2) {
									echo $r[music_star];//音乐之星
								} elseif ($r[groupid] == 3) {
									echo $r[teacher_type];//音乐老师
								} elseif ($r[groupid] == 4) {
									echo "音乐教室";
								}
								?>
							</em>
							<span>

           		 <?php
	             if ($r[userfen] <= 100) {
		             echo "一级";
	             } elseif ($r[userfen] <= 300) {
		             echo "二级";
	             } elseif ($r[userfen] <= 800) {
		             echo "三级";
	             } elseif ($r[userfen] <= 2000) {
		             echo "四级";
	             } elseif ($r[userfen] <= 5000) {
		             echo "五级";
	             } elseif ($r[userfen] <= 15000) {
		             echo "六级";
	             } elseif ($r[userfen] <= 50000) {
		             echo "七级";
	             } elseif ($r[userfen] > 100000) {
		             echo "八级";
	             }
	             ?>
        </span></p>
					</a>
				</div>
				<!-- list右侧，内容区域·························· -->
				<div class="listRight">
					<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
					<p><?= $r[smalltext] ?></p>
					<div class="chatu">
						<a href="<?= $r['titleurl'] ?>">


							<img src="<?= $r[titlepic] ?>">
							<i class="iconfont">&#xe63e;</i>
						</a>
					</div>
					<div class="time clearfix">
						<span><?= date('Y-m-d', $bqr[newstime]) ?></span>
					</div>
				</div>
				<!-- list右侧，内容区域结束······················ -->
			</li>
			<?
		}

	}

} elseif ($titid == 2) {//视频
	$frie_sql = "select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where a.classid=11 and a.title like '%$name%'  order by a.id DESC";
	$list = $empire->query($frie_sql);
	while ($r = $empire->fetch($list)) {
		?>
		<li class="clearfix dongtaiLi">
			<?= $userinfo ?>
			<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
			<!-- list左侧，包含头像姓名······················ -->
			<div class="listLeft">
				<a href="/e/space/?userid=<?= $r[userid] ?>">
					<img src="<?= $r[userpic] ?>">
					<h3><?= $r[username] ?></h3>
					<p class="fromCity">
						<em><?= $r[address] ?></em>
						<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
					<p>
					<p><em>
							<?
							if ($r[groupid] == 1) {
								echo $r[putong_shenfen];//普通会员默认爱乐人
							} elseif ($r[groupid] == 2) {
								echo $r[music_star];//音乐之星
							} elseif ($r[groupid] == 3) {
								echo $r[teacher_type];//音乐老师
							} elseif ($r[groupid] == 4) {
								echo "音乐教室";
							}
							?>
						</em>
						<span>

            <?php
            if ($r[userfen] <= 100) {
	            echo "一级";
            } elseif ($r[userfen] <= 300) {
	            echo "二级";
            } elseif ($r[userfen] <= 800) {
	            echo "三级";
            } elseif ($r[userfen] <= 2000) {
	            echo "四级";
            } elseif ($r[userfen] <= 5000) {
	            echo "五级";
            } elseif ($r[userfen] <= 15000) {
	            echo "六级";
            } elseif ($r[userfen] <= 50000) {
	            echo "七级";
            } elseif ($r[userfen] > 100000) {
	            echo "八级";
            }
            ?>
        </span></p>
				</a>
			</div>
			<!-- list右侧，内容区域·························· -->
			<div class="listRight">
				<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
				<p><?= $r[smalltext] ?></p>
				<div class="chatu">
					<a href="<?= $r['titleurl'] ?>">
						<img src="<?= $r[titlepic] ?>">
						<i class="iconfont">&#xe63b;</i>
					</a>
				</div>
				<div class="time clearfix">
					<span><?= date('Y-m-d', $r[newstime]) ?></span>
				</div>
			</div>
			<!-- list右侧，内容区域结束······················ -->
		</li>
		<?
	}

} elseif ($titid == 3) {//音乐
	$frie_sql = "select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where a.classid=13 and a.title like '%$name%'  order by a.id DESC";
	$list = $empire->query($frie_sql);
	while ($r = $empire->fetch($list)) {
		?>
		<li class="clearfix">
			<?= $userinfo ?>
			<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
			<!-- list左侧，包含头像姓名······················ -->
			<div class="listLeft">
				<a href="/e/space/?userid=<?= $r[userid] ?>">
					<img src="<?= $r[userpic] ?>">
					<h3><?= $r[username] ?></h3>
					<p class="fromCity">
						<em><?= $r[address] ?></em>
						<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
					<p>
					<p><em>
							<?
							if ($r[groupid] == 1) {
								echo $r[putong_shenfen];//普通会员默认爱乐人
							} elseif ($r[groupid] == 2) {
								echo $r[music_star];//音乐之星
							} elseif ($r[groupid] == 3) {
								echo $r[teacher_type];//音乐老师
							} elseif ($r[groupid] == 4) {
								echo "音乐教室";
							}
							?>
						</em>
						<span>
           		 <?php
	             if ($r[userfen] <= 100) {
		             echo "一级";
	             } elseif ($r[userfen] <= 300) {
		             echo "二级";
	             } elseif ($r[userfen] <= 800) {
		             echo "三级";
	             } elseif ($r[userfen] <= 2000) {
		             echo "四级";
	             } elseif ($r[userfen] <= 5000) {
		             echo "五级";
	             } elseif ($r[userfen] <= 15000) {
		             echo "六级";
	             } elseif ($r[userfen] <= 50000) {
		             echo "七级";
	             } elseif ($r[userfen] > 100000) {
		             echo "八级";
	             }
	             ?>
        </span></p>
				</a>
			</div>
			<!-- list右侧，内容区域·························· -->
			<div class="listRight">
				<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
				<p><?= $r[smalltext] ?></p>
				<div class="chatu">
					<a href="<?= $r['titleurl'] ?>">


						<img src="<?= $r[titlepic] ?>">
						<i class="iconfont">&#xe63e;</i>
					</a>
				</div>
				<div class="time clearfix">
					<span><?= date('Y-m-d', $bqr[newstime]) ?></span>
				</div>
			</div>
			<!-- list右侧，内容区域结束······················ -->
		</li>
		<?
	}
} elseif ($titid == 4) {//图片
	$frie_sql = "select * from phome_ecms_photo a left join phome_enewsmemberadd b on a.userid=b.userid left join phome_enewsmember c on a.userid=c.userid where a.classid=12 and a.title like '%$name%' order by a.id DESC";
	$list = $empire->query($frie_sql);
	while ($r = $empire->fetch($list)) {
		?>
		<li class="clearfix" id="userImg<?= $r[id] ?>">
			<?= $userinfo ?>
			<script>$(function () {isFeed('<?=$r[userid]?>')})</script>
			<!-- list左侧，包含头像姓名······················ -->
			<div class="listLeft">
				<a href="/e/space/?userid=<?= $r[userid] ?>">
					<img src="<?= $r[userpic] ?>">
					<input type="hidden" name="titid" class="tit_id" value="<?= $r[id] ?>"/>
					<h3><?= $r[username] ?></h3>
					<p class="fromCity">
						<em><?= $r[address] ?></em>
						<span class="guanzhu<?= $r[userid] ?>" onclick="GuanZhu('<?= $r[userid] ?>')">关注</span>
					<p>
					<p><em>
							<?
							if ($r[groupid] == 1) {
								echo $r[putong_shenfen];//普通会员默认爱乐人
							} elseif ($r[groupid] == 2) {
								echo $r[music_star];//音乐之星
							} elseif ($r[groupid] == 3) {
								echo $r[teacher_type];//音乐老师
							} elseif ($r[groupid] == 4) {
								echo "音乐教室";
							}
							?>
						</em>
						<span>
            <?php
            if ($r[userfen] <= 100) {
	            echo "一级";
            } elseif ($r[userfen] <= 300) {
	            echo "二级";
            } elseif ($r[userfen] <= 800) {
	            echo "三级";
            } elseif ($r[userfen] <= 2000) {
	            echo "四级";
            } elseif ($r[userfen] <= 5000) {
	            echo "五级";
            } elseif ($r[userfen] <= 15000) {
	            echo "六级";
            } elseif ($r[userfen] <= 50000) {
	            echo "七级";
            } elseif ($r[userfen] > 100000) {
	            echo "八级";
            }
            ?>
            
        </span></p>
				</a>
			</div>
			<!-- list右侧，内容区域·························· -->
			<div class="listRight">
				<a href="<?= $r['titleurl'] ?>"><h3><?= $r[title] ?></h3></a>
				<p><?= $r[smalltext] ?></p>
				<div class="chatu">
					<a href="<?= $r['titleurl'] ?>">
						<?php

						$b = $empire->fetch1("select morepic from {$dbtbpre}ecms_photo_data_1 where id='$r[id]'");

						$flid1 = explode("\r\n", $b['morepic']);
						$length = count($flid1);

						$flid_1 = explode("::::::", $flid1[0]);
						$flid_2 = explode("::::::", $flid1[1]);
						$flid_3 = explode("::::::", $flid1[2]);
						$flid_4 = explode("::::::", $flid1[3]);


						if ($length == 1) {
							echo "<img src='$flid_1[0]'>";
						} elseif ($length == 2) {
							echo "<img src='$flid_1[0]'>";
							echo "<img src='$flid_2[0]'>";
						} elseif ($length == 3) {
							echo "<img src='$flid_1[0]'>";
							echo "<img src='$flid_2[0]'>";
							echo "<img src='$flid_3[0]'>";
						} elseif ($length >= 4) {
							echo "<img src='$flid_1[0]'>";
							echo "<img src='$flid_2[0]'>";
							echo "<img src='$flid_3[0]'>";
							echo "<img src='$flid_4[0]'>";
						}
						//echo "<span class='zongshu'>总".$length."张照片</span>";

						?>

					</a>
				</div>
				<div class="time clearfix">
					<span><?= date('Y-m-d', $r[newstime]) ?></span>
				</div>
			</div>
			<!-- list右侧，内容区域结束······················ -->
		</li>
		<?
	}
}
?>