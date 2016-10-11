<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 

	$titid=$_POST['id_photo'];
	if(empty($titid)){
		exit;
	}
$r=$empire->fetch1("select photo from {$dbtbpre}ecms_music where id=$titid");
	
$newstr = substr($r[photo],0,strlen($r[photo])-6); 
    $flid_1=explode("::::::",$newstr);
		$aa=0;
	foreach ($flid_1 as $url){ 
		$b=$aa++;
      echo "<li><img src='$flid_1[$b]'></li>"; 
    } 
?>

