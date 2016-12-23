<?php
	require("../../../../e/class/connect.php");
	require("../../../../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-lie_type: text/html; charset=utf-8"); 
	$userid=$_POST['userid'];
	
	if(empty($userid)){
		exit;
	}
		//¸ÖÇÙ
		$sql=$empire->query("select * from {$dbtbpre}ecms_brand where classid=115 and userid=$userid order by newstime desc limit 20");
		$arr = array();
		while($r=$empire->fetch($sql))
		{	

			$arr[] = array('a' => $r[titlepic], 'b' => $r[title], 'c' => $r[depict], 'd' => date('Y-m-d h:i',$r[newstime]), 'e' => $r[titleurl]);
		}
			echo json_encode($arr);

?>