<?php
require('../../../../e/class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../../e/class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery();


$quality=$_POST['techStar2'];
$ambient=$_POST['soundStar2'];
$service=$_POST['serverStar2'];
$content=$_POST['stuDisContent'];

$uid=$_POST['uid'];
$uname=$_POST['uname'];
$mid=$_POST['mid'];
$mname=$_POST['mname'];

$score=($quality+$ambient+$service)/3;
$score=round($score);

//开始插入数据库
$shi=date('Y-m-d H:i:s',time()); //时间

$count=mysql_query("select count(*) from phome_enews_feed where uid='$uid' and mid='$mid'");
      while($tmp=mysql_fetch_row($count)){
     $num=$num.$tmp[0];
}
if($num<3){ //一个用户只可以评论一个用户三次

	$empire->query("insert into phome_enews_feed
	(time,uid,uname,mid,mname,quality,ambient,service,content) 	values('$shi','$uid','$uname','$mid','$mname','$quality','$ambient','$service','$content')");
	
	//总评分
$numpi=$empire->fetch1("select num_score,num_quality,num_ambient,num_service from phome_enewsmemberadd where userid='$uid'"); 
	if (empty($numpi['num_score']) && empty($numpi['num_quality']) && empty($numpi['num_ambient']) && empty($numpi['num_service'])){
		//第一个
			$score=($quality+$ambient+$service)/3;
			$score=round($score);
		$empire->query("update phome_enewsmemberadd set num_score='$score::::::' where userid='$uid'"); //总
		$empire->query("update phome_enewsmemberadd set num_quality='$quality::::::' where userid='$uid'"); //质量
		$empire->query("update phome_enewsmemberadd set num_ambient='$ambient::::::' where userid='$uid'"); //环境
		$empire->query("update phome_enewsmemberadd set num_service='$service::::::' where userid='$uid'"); //服务
		
	}else{
		//追加
		$score=($quality+$ambient+$service)/3;
			$score=round($score);
$empire->query("update phome_enewsmemberadd set num_score='$score::::::$numpi[num_score]' where userid='$uid'"); //总
$empire->query("update phome_enewsmemberadd set num_quality='$quality::::::$numpi[num_quality]' where userid='$uid'"); //质量
$empire->query("update phome_enewsmemberadd set num_ambient='$ambient::::::$numpi[num_ambient]' where userid='$uid'"); //环境
$empire->query("update phome_enewsmemberadd set num_service='$service::::::$numpi[num_service]' where userid='$uid'"); //服务
		
		
	}
	
	?>
	<meta http-equiv="refresh" content="2;url=/e/space/?userid=<?=$uid?>">
	<div style="width:500px;height:150px;border:#cb7047 solid 1px;text-align:center;margin:10px auto;" class="tijiaoSuccess">
    		<h2 style="background:#cb7047;margin:0;height:40px;line-height:40px;color:#fff;font-size:16px;" class="Success1">信息提示</h2><br />
    		<h3 class="Success2" style="font-size:12px;" >评论成功</h3><br />
			<a href="" class="Success3" style="font-size:12px;" >如果你的网页没有自动跳转，请点击这里</a>
    	</div>
	<?
	
}else{
?>
	<meta http-equiv="refresh" content="2;url=/e/space/?userid=<?=$uid?>">
	<div style="width:500px;height:150px;border:#cb7047 solid 1px;text-align:center;margin:10px auto;" class="tijiaoSuccess">
    		<h2 style="background:#cb7047;margin:0;height:40px;line-height:40px;color:#fff;font-size:16px;" class="Success1">信息提示</h2><br />
    		<h3 class="Success2" style="font-size:12px;" >只能评论三次</h3><br />
			<a href="" class="Success3" style="font-size:12px;" >如果你的网页没有自动跳转，请点击这里</a>
    	</div>
<?
}
?>