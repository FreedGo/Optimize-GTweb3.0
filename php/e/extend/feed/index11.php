<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../data/dbcache/class.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
	$userid=(int)getcvar('mluserid');
	$getuserid=(int)$_POST['followid'];
	if ($userid){
		if (empty($getuserid)){
		echo "unknowerror";
		exit();
		}
	if ($userid==$getuserid){
		echo "nofollowme";
	} else {
	$r=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if (empty($r['feeduserid'])){
		$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$getuserid::::::' where userid='$userid'");
		echo "AddSuccess"; //增加关注成功
		} else {
		$feeduserid=explode("::::::",$r['feeduserid']);
		if (in_array($getuserid,$feeduserid))
    	{
			$bfeeduserid=str_replace($getuserid."::::::","",$r['feeduserid']);
			$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$bfeeduserid' where userid='$userid'");
			echo "DelSuccess"; //取消关注成功
    	} else{
			$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$getuserid::::::$r[feeduserid]' where userid='$userid'");
			echo "AddSuccess"; //增加关注成功
		}
	}
}
	} else {
		echo "Pleaselogin";
}
	
	
db_close();
$empire=null;
?>