<?php
	
	require("../class/db_sql.php");
	require("../class/connect.php");
	$link=db_connect();
	$empire=new mysqlquery();
	
	$out_trade_no = $_POST['out_trade_no'];
	//支付宝交易号
	$trade_no = $_POST['trade_no'];
	//交易状态
	$trade_status = $_POST['trade_status'];
	echo $out_trade_no.$trade_no.$trade_status;
	echo 11111;
	exit;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- 自动跳转 -->
        <meta http-equiv="refresh" content="2;url=/e/ShopSys/address/ListAddress.php">
        <link rel="stylesheet" type="text/css" href="/css/pay.css">
    </head>
    <body>
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
    </body>
</html>