<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
	
	$name=$_POST['name']; // ==1ȫ��  ==2����  ==3������  ==4����  ==5����  ==6����  ==7����  ==8����  ==9����
	$type=$_POST['type'];
	if($type==1){
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where title like '%$name%' or username like '%$name%' or zuozhe like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==2){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==3){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where zuozhe like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==4){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=38 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==5){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=105 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==6){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=39 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==7){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=107 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==8){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=106 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($type==9){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=108 and title like '%$name%' order by newstime desc");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	
			if(empty($r[titlepic])){
				//����ͼƬΪ�գ�����ͼ����һ��
				$flid_1=explode("::::::",$r[photo]);
				$photo=$flid_1[0];
			}else{
				//����ͼƬ��Ϊ��
				$photo=$r[titlepic];
			}
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[username], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}
?>