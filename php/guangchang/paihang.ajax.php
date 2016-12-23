<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	
	/*************日 周 月 排 行************/
	$dateone=$_POST['dateone']; //1=日，2=周，3=月
	if(empty($dateone)){
		exit;
	}
	$shi=date('Y-m-d',time());
	if($dateone==1){
		
		//返回日排行
		$frie_sql="select * from {$dbtbpre}ecms_photo where newspath = '$shi' and classid in(11,12,13) order by onclick desc limit 6";
		$list=$empire->query($frie_sql);
		while($r=$empire->fetch($list))
		{
			if($r[classid]!=12){
			
			
?>
		<dt>
			<img src="<?=$r[titlepic]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>	
<?
		}else{
			$o=$empire->fetch1("select morepic from phome_ecms_photo_data_1 where id=$r[id]");
				$flid1=explode("\r\n",$o['morepic']);
				$flid_1=explode("::::::",$flid1[0]);
?>
		<dt>
			<img src="<?=$flid_1[0]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>
<?
		}
		}
	}elseif($dateone==2){
		//返回周排行DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(column_time); 
		$frie_sql="select * from {$dbtbpre}ecms_photo where newspath>DATE_SUB(CURDATE(), INTERVAL 1 WEEK) and classid in(11,13) order by onclick desc limit 6";
		$list=$empire->query($frie_sql);
		while($r=$empire->fetch($list))
		{
			if($r[classid]!=12){
		?>
		<dt>
			<img src="<?=$r[titlepic]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>	
		<?
		}else{
			$o=$empire->fetch1("select morepic from phome_ecms_photo_data_1 where id=$r[id]");
				$flid1=explode("\r\n",$o['morepic']);
				$flid_1=explode("::::::",$flid1[0]);
		?>
			<dt>
			<img src="<?=$flid_1[0]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>
		<?
		}
		}
	}elseif($dateone==3){
		//返回月排行
		$frie_sql="select * from {$dbtbpre}ecms_photo where newspath>DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and classid in(11,13) order by onclick desc limit 6";
		$list=$empire->query($frie_sql);
		while($r=$empire->fetch($list))
		{
			if($r[classid]!=12){
		?>
		<dt>
			<img src="<?=$r[titlepic]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>
        <?
		}else{
			$o=$empire->fetch1("select morepic from phome_ecms_photo_data_1 where id=$r[id]");
				$flid1=explode("\r\n",$o['morepic']);
				$flid_1=explode("::::::",$flid1[0]);
		?>
			<dt>
			<img src="<?=$flid_1[0]?>">
			<a href="<?=$r[titleurl]?>"><?=$r[title]?></a>
			<span class="zuo_1">作者：<?=$r[username]?></span><span class="zuo_2">
        	点击量：<?=$r[onclick]?></span>
		</dt>
		<?
		}
		}
	}
?>