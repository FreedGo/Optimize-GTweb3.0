<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../data/dbcache/class.php");
$link = db_connect();
$empire = new mysqlquery();
$editor = 1;

//function updateFeednum($userid, $feeduserid, $ecms = 0)
//{
//	global $empire, $dbtbpre;
//
//	if ($ecms) {//添加关注
//		$empire->query("update {$dbtbpre}enewsmemberadd set follownum=follownum+1 where userid='$feeduserid'");
//		$empire->query("update {$dbtbpre}enewsmemberadd set feednum=feednum+1 where userid='$userid'");
//
//	} else {//取消关注
//		$empire->query("update {$dbtbpre}enewsmemberadd set follownum=follownum-1 where userid='$feeduserid'");
//		$empire->query("update {$dbtbpre}enewsmemberadd set feednum=feednum-1 where userid='$userid'");
//
//	}
//}


$userid = (int)getcvar('mluserid');
$getuserid = (int)$_POST['followid'];

//关注通知
//$userid=getcvar('mluserid');

/**
 * 判断是否关注,并返回参数
 * 0 是没有关注,1是已经关注
 */
if ($userid) {
	if (empty($getuserid)) {
//		echo "unknowerror";
		echo 0;
		exit();
	}
	if ($userid == $getuserid) {
		echo 0;//自己看见自己
	} else {
		$r = $empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
		if (empty($r['feeduserid'])) {
			echo 0;//正常看见未关注的人,可以去关注
		} else {
			$feeduserid = explode("::::::", $r['feeduserid']);
			if (in_array($getuserid, $feeduserid)) {
				echo 1;//已经关注,这时候就不能在关注了
			} else {
				echo 0;//正常看见未关注的人,可以去关注
			}
		}
	}
} else {
	echo 0;//未登录,显示都是可以关注
}


db_close();
$empire = null;
?>