<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
//列表全部内容返回	
	
	$classid=$_POST['classid'];  // ==38钢琴谱  ==39吉他谱  ==105提琴谱  ==106管乐谱  ==107民乐谱  ==108综合谱
	$num=$_POST['num'];	//第几页
	$typeid=$_POST['typeid'];	//分类
	if(empty($classid)){
			exit;
		}
	if(empty($num)){
			$num=0;
		}
		
		if($typeid==1){
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}elseif($typeid==2){
			
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid and fengge='古典'"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid and fengge='古典' order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}elseif($typeid==3){
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid and fengge='流行'"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid and fengge='流行' order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}elseif($typeid==4){
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid and fengge='原创'"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid and fengge='原创' order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}elseif($typeid==5){
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid and fengge='伴奏'"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid and fengge='伴奏' order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}elseif($typeid==6){
			//查询一共多少页
	$yigong=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_music where classid=$classid and fengge='综合'"); //总计
	$yeshu=$yigong/20;
	
	$kaishi=$num*20;
/////返回列表所有乐谱	
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=$classid and fengge='综合' order by newstime desc limit $kaishi,20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//标题图片为空，调用图集第一张
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//标题图片不为空
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl], 'f' => round($yeshu));
		}
			echo json_encode($arr);
		}
		
		
		
		
		
	

			
			
?>