<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 

	$titid=$_POST['id_photo'];
	if(empty($titid)){
		$titid=0;
	}
$frie_sql="select morepic from {$dbtbpre}ecms_photo_data_1 where id='$titid'";
$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{
		$flid1=explode("\r\n",$r['morepic']); 
		$length = count($flid1);
	for($i=0;$i<$length;$i++){
		$flid_1=explode("::::::",$flid1[$i]);
		echo "<li><img src='$flid_1[1]'></li>";
	}
}
?>