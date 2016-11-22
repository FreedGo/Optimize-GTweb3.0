<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-lie_type: text/html; charset=utf-8"); 
	
	
	$lie_type=$_POST['lie_type'];  //==1钢琴  ==2提琴  ==3吉他  ==4民乐  ==5管乐  ==6综合
	if($lie_type==1){
		//钢琴
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=38 order by newstime desc limit 4");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==2){
		//提琴
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=105 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
			
	}elseif($lie_type==3){
		//吉他
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=39 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==4){
		//民乐
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=107 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==5){
		//管乐
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=106 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==6){
		//综合
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=108 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}
?>