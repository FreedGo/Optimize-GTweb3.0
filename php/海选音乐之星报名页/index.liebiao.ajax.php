<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-lie_type: text/html; charset=utf-8"); 
	
	
	$lie_type=$_POST['lie_type'];  //==1����  ==2����  ==3����  ==4����  ==5����  ==6�ۺ�
	if($lie_type==1){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=38 order by newstime desc limit 4");
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
			
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==2){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=105 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
			
	}elseif($lie_type==3){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=39 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==4){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=107 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==5){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=106 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}elseif($lie_type==6){
		//�ۺ�
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where classid=108 order by newstime desc limit 4");
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
			$arr[] = array('a' => $photo, 'b' => $r[title], 'c' => $r[zuozhe], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);
	}
?>