<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 
	
	
	$type=$_POST['type'];  //==1����  ==2�Ƽ�  ==3����
	// $type=2;
	if($type==1){
		$sql=$empire->query("select * from {$dbtbpre}ecms_music order by onclick desc limit 14");
$arr = array();
while($r=$empire->fetch($sql))
{
	$b=$empire->fetch1("select classname from {$dbtbpre}enewsclass where classid=$r[classid]");
	$arr[] =array('a' => $b[classname], 'b' => $r[title], 'c' => $r[titleurl]);
}
echo json_encode($arr);

	}elseif($type==2){
		//�Ƽ�
		$sql=$empire->query("select * from {$dbtbpre}ecms_music where isgood=1 order by newstime desc limit 14");
		$arr = array();
while($r=$empire->fetch($sql))
{
	$b=$empire->fetch1("select classname from {$dbtbpre}enewsclass where classid=$r[classid]");
	$arr[] =array('a' => $b[classname], 'b' => $r[title], 'c' => $r[titleurl]);
}
echo json_encode($arr);
	}elseif($type==3){
		//����
		$sql=$empire->query("select * from {$dbtbpre}ecms_music order by newstime desc limit 14");
		$arr = array();
while($r=$empire->fetch($sql))
{
	$b=$empire->fetch1("select classname from {$dbtbpre}enewsclass where classid=$r[classid]");
	$arr[] =array('a' => $b[classname], 'b' => $r[title], 'c' => $r[titleurl]);
}
echo json_encode($arr);
	}
?>