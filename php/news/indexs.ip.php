<?php
	require("../../e/class/connect.php");
	require("../../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
	$city_ip=$_POST['city_ip'];
$frie_sql="select * from {$dbtbpre}ecms_shop WHERE ke_province like '%$city_ip%' and classid=76 order by newspath desc";

$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{	
?>
	<li class="clearfix">
							<div class="listLeft">
								<a href="<?=$r['titleurl']?>">
								<img src="<?=$r['titlepic']?>">
								</a>
							</div>
							<div class="listRight">
								
								<div class="difang">
									<span class="left1">活动名称：</span><span class="bolder"><a href="<?=$r['titleurl']?>"><?=$r['title']?></a></span>
								</div>
								<div class="shijian">
									<span class="left1">活动时间：</span><span><?=$r[huodong_1]?>—<?=$r[huodong_2]?></span>
								</div>
                                 <div class="faburen">
									<span class="left1">活动地址 ：</span><span><?=$r['ke_province']?><?=$r['ke_city']?><?=$r['ke_area']?><?=$r['dizhi']?></span>
								</div>
								<div class="faburen">
									<span class="left1">发 布 人 ：</span><span><a href="/e/space/?userid=<?=$r['userid']?>"><?=$r['username']?></a></span>
								</div>
								
								
							</div>
							<div class="toupiao"><a href="<?=$r['titleurl']?>">点击查看</a></div>
							<!-- list右侧，内容区域结束······················ -->
						</li>
<?
}	


$frie_sql="select * from {$dbtbpre}ecms_shop WHERE ke_province != '$city_ip' and classid=76 order by newspath desc";

$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{	
?>
	<li class="clearfix">
							<div class="listLeft">
								<a href="<?=$r['titleurl']?>">
								<img src="<?=$r['titlepic']?>">
								</a>
							</div>
							<div class="listRight">
								
								<div class="difang">
									<span class="left1">活动名称：</span><span class="bolder"><a href="<?=$r['titleurl']?>"><?=$r['title']?></a></span>
								</div>
								<div class="shijian">
									<span class="left1">活动时间：</span><span><?=$r[huodong_1]?>—<?=$r[huodong_2]?></span>
								</div>
                                 <div class="faburen">
									<span class="left1">活动地址 ：</span><span><?=$r['ke_province']?><?=$r['ke_city']?><?=$r['ke_area']?><?=$r['dizhi']?></span>
								</div>
								<div class="faburen">
									<span class="left1">发 布 人 ：</span><span><a href="/e/space/?userid=<?=$r['userid']?>"><?=$r['username']?></a></span>
								</div>
								
								
							</div>
							<div class="toupiao"><a href="<?=$r['titleurl']?>">点击查看</a></div>
							<!-- list右侧，内容区域结束······················ -->
						</li>
<?
}	
?>