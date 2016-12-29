<?php
	//欧付宝回调页面
	require("../../../../class/db_sql.php");
	require("../../../../class/connect.php");
	$link=db_connect();
	$empire=new mysqlquery();
	
	$ddid=$_GET['ddid'];
	//$ddid="2016080151101102";
	if(empty($ddid)){
		exit;
	}
	
$r=$empire->fetch1("select userid,money,shopzhuang from phome_enewsshopdd where ddno=$ddid");	
	
	if($r[shopzhuang]!="已付款"){
	
$empire->query("UPDATE phome_enewsshopdd SET shopzhuang = '已付款' WHERE ddno =$ddid LIMIT 1");
	
$b=$empire->fetch1("select money from phome_enewsmember where userid=$r[userid]");

$money=$r[money]+$b[money];

$empire->query("UPDATE phome_enewsmember SET money = $money WHERE userid=$r[userid] LIMIT 1");
	}	
?>
<meta http-equiv="refresh" content="1;url=/e/ShopSys/address/ListAddress.php">
<link rel="stylesheet" type="text/css" href="/css/pay.css">
<div class="zhifuMsg">
    		<div class="payInfoImg">
    			
    		</div>
    		<div class="payMsg">
    			<h2>支付成功</h2>
    			<div>如果页面没有自动跳转，你可以点击下面链接跳转</div>
    			<div class="lianjie">
    				<a href="/e/zhiyin/ListInfo.php?mid=10">个人中心</a>
    				<a href="/e/space/?userid=<?=$userid?>">我的空间</a>
    			</div>
    		</div>
    	</div>