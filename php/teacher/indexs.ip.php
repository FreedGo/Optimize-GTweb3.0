<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
	$city_ip=$_POST['city_ip'];
	//临时
	$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=3 and a.resever_1=1 order by b.follownum  desc";
	$list=$empire->query($frie_sql);
	while($r=$empire->fetch($list))
	{
	?>
		<li>
			<a href="/e/space/?userid=<?=$r[userid]?>">
				<img src="<?=$r[userpic]?>">
				<div class="xingming">
					<span><?=$r[username]?></span>
                    <?php
					     if($r[cked]==1){
					        echo '<a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng"></i></a>';
				            }
                    ?>
				</div>
			</a>
			<div class="shenfen">
				<span>身份：<?=$r[teacher_type]?></span>
				<span>粉丝数：<?=$r[follownum]?></span>
			</div>
			<div class="guanzhu clearfix">
				<a href="/e/space/?userid=<?=$r[userid]?>"><span>＋关注</span></a>
				<a href="/e/QA/ListInfo.php?mid=10&username=<?=$r[username]?>&userid=<?=$r[userid]?>"><em>提问</em></a>
			</div>
			<?
	            if($r[resever_1]==1){
					?>
	               <!-- <span class="toutiao01">推广</span>
					<span class="toutiao02"></span>-->
	                <?
				}
			?>
		</li>
	<?
	}
	//临时结束
	$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=3 and a.checked=1 and b.address like '%$city_ip%' order by b.follownum  desc";
	$list=$empire->query($frie_sql);
	while($r=$empire->fetch($list))
	{
	?>
	<li>
		<a href="/e/space/?userid=<?=$r[userid]?>">
			<img src="<?=$r[userpic]?>">
			<div class="xingming">
				<span><?=$r[username]?></span>
               <?php
				 if($r[cked]==1){
				 echo '<a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng"></i></a>';
				    }
				 ?>
			</div>
		</a>
		<div class="shenfen"><span>身份：<?=$r[teacher_type]?></span><span>粉丝数：<?=$r[follownum]?></span></div>
		<div class="guanzhu clearfix">
			<a href="/e/space/?userid=<?=$r[userid]?>"><span>＋关注</span></a>
			<a href="/e/QA/ListInfo.php?mid=10&username=<?=$r[username]?>&userid=<?=$r[userid]?>"><em>提问</em></a>
		</div>
		<?
	        if($r[resever_1]==1){
				?>
	           <!-- <span class="toutiao01">推广</span>
				<span class="toutiao02"></span>-->
	            <?
			}
		?>
	</li>
	<?
	}


	$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=3 and a.checked=1 and b.address != '$city_ip' and resever_1 != 1 order by b.follownum desc";

	$list=$empire->query($frie_sql);
	while($r=$empire->fetch($list))
	{
	?>
	<li>
		<a href="/e/space/?userid=<?=$r[userid]?>">
			<img src="<?=$r[userpic]?>">
			<div class="xingming">
				<span><?=$r[username]?></span>
               <?php
				 if($r[cked]==1){
				    ?>
				     <a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng"></i></a>
				 <?php
				    }
				 ?>
			</div>
		</a>
		<div class="shenfen"><span>身份：<?=$r[teacher_type]?></span><span>粉丝数：<?=$r[follownum]?></span></div>
		<div class="guanzhu clearfix">
			<a href="/e/space/?userid=<?=$r[userid]?>"><span>＋关注</span></a>
			<a href="/e/QA/ListInfo.php?mid=10&username=<?=$r[username]?>&userid=<?=$r[userid]?>"><em>提问</em></a>
		</div>
		<?
	        if($r[tuijian]==1){
				?>
	           <!-- <span class="toutiao01">推广</span>
			<span class="toutiao02"></span>-->
	            <?
			}
		?>
	</li>
	<?
	}
?>