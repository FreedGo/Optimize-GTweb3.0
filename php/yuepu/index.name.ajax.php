<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
	
	$name=$_POST['name']; // ==1全部  ==2曲名  ==3作曲名  ==4钢琴  ==5提琴  ==6吉他  ==7民乐  ==8管乐  ==9其他
	$type=$_POST['type'];
	if($type==1){
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where title like '%$name%' or username like '%$name%' or zuozhe like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==2){
		//曲名
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==3){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where zuozhe like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==4){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=38 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==5){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=105 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==6){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=39 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==7){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=107 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==8){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=106 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==9){
		//最新
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=108 and title like '%$name%' order by newstime desc");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}
?>