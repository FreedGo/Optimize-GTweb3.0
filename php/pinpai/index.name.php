<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8");
	$name=$_POST['jiaoshi1'];
	
$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5 and a.checked=1 and a.username like '%$name%' order by a.registertime desc";
$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{
	$arr[] = array('userid' => $r[userid], 'username' => $r[username], 'userfen' => $r[userfen], 'userpic' => $r[userpic], 'cked' => $r[cked], 'telephone' => $r[telephone],'address' => $r[address],'address1' => $r[address1],'address2' => $r[address2], 'resever_1' => $r[resever_1],'follownum' => $r[follownum]);
}
echo json_encode($arr);
?>