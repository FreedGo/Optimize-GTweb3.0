<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../data/dbcache/class.php");
$link = db_connect();
$empire = new mysqlquery();
$editor = 1;

function updateFeednum($userid, $feeduserid, $ecms = 0)
{
	global $empire, $dbtbpre;

	if ($ecms) {//添加关注
		$empire->query("update {$dbtbpre}enewsmemberadd set follownum=follownum+1 where userid='$feeduserid'");
		$empire->query("update {$dbtbpre}enewsmemberadd set feednum=feednum+1 where userid='$userid'");

	} else {//取消关注
		$empire->query("update {$dbtbpre}enewsmemberadd set follownum=follownum-1 where userid='$feeduserid'");
		$empire->query("update {$dbtbpre}enewsmemberadd set feednum=feednum-1 where userid='$userid'");

	}
}


$userid = (int)getcvar('mluserid');
$getuserid = (int)$_POST['followid'];

//关注通知
//$userid=getcvar('mluserid');


if ($userid) {
	if (empty($getuserid)) {
		echo "unknowerror";
		exit();
	}
	if ($userid == $getuserid) {
		echo "nofollowme";
	} else {
		$r = $empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
		if (empty($r['feeduserid'])) {
			$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$getuserid::::::' where userid='$userid'");
			$empire->query("UPDATE {$dbtbpre}enewsmember SET ti_guanzhu = ti_guanzhu+1 WHERE userid='$getuserid'");
			echo "AddSuccess"; //增加关注成功
			$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$getuserid::::::' where userid='$userid'");
			updateFeednum($userid, $getuserid, 1);//更新关注数量
		} else {
			$feeduserid = explode("::::::", $r['feeduserid']);
			if (in_array($getuserid, $feeduserid)) {
				$bfeeduserid = str_replace($getuserid . "::::::", "", $r['feeduserid']);
				$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$bfeeduserid' where userid='$userid'");
				echo "DelSuccess"; //取消关注成功
				updateFeednum($userid, $getuserid, 0);//更新关注数量
			} else {
				$empire->query("update {$dbtbpre}enewsmemberadd set feeduserid='$getuserid::::::$r[feeduserid]' where userid='$userid'");
				$empire->query("UPDATE {$dbtbpre}enewsmember SET ti_guanzhu = ti_guanzhu+1 WHERE userid='$getuserid'");
				echo "AddSuccess"; //增加关注成功
				updateFeednum($userid, $getuserid, 1);//更新关注数量
			}
		}
	}
} else {
	echo "Pleaselogin";
}


db_close();
$empire = null;
?>