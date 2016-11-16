<?php
require('../../e/class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../e/class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类

$titleid=$_POST['titleid'];
if(empty($titleid)){
	exit;
}

$sql=$empire->query("select sitename,renminbi from {$dbtbpre}enewsbe where titleid='$titleid'");
$arr = array();
while($r=$empire->fetch($sql))
	{
	$arr[] = array('name' => $r[sitename], 'price' => $r[renminbi]);
}
echo json_encode($arr);

?>