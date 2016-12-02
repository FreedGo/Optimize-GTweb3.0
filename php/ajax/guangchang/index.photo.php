<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 

	$titid=$_POST['tit_id'];
	if(empty($titid)){
		$titid=0;
	}
$frie_sql="select morepic from {$dbtbpre}ecms_photo_data_1 where id='$titid'";
$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{
		$flid1=explode("\r\n",$r['morepic']);
		$length = count($flid1);
			
			$flid_1=explode("::::::",$flid1[0]);
			$flid_2=explode("::::::",$flid1[1]);
			$flid_3=explode("::::::",$flid1[2]);
			$flid_4=explode("::::::",$flid1[3]);
			
		
		if($length==1){
			echo "<img src='$flid_1[0]'>";
		}elseif($length==2){
			echo "<img src='$flid_1[0]'>";
			echo "<img src='$flid_2[0]'>";
		}elseif($length == 3){
			echo "<img src='$flid_1[0]'>";
			echo "<img src='$flid_2[0]'>";
			echo "<img src='$flid_3[0]'>";
		}elseif($length >= 4){
			echo "<img src='$flid_1[0]'>";
			echo "<img src='$flid_2[0]'>";
			echo "<img src='$flid_3[0]'>";
			echo "<img src='$flid_4[0]'>";
		}
		echo "<span class='zongshu'>总".$length."张照片</span>";
}
?>