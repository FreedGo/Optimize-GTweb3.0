<?php
	require("../../../../e/class/connect.php");
	require("../../../../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-lie_type: text/html; charset=utf-8"); 
	
	$userid=$_POST['userid'];
		if(empty($userid)){
			exit;
		}
		//钢琴
		$sql=$empire->query("select * from {$dbtbpre}ecms_brand where classid=116 and userid=$userid order by newstime desc");
		while($r=$empire->fetch($sql))
		{	
		?>
                   					<dt class="seller-lists seller-item">
                                        <div class="seller-title"><?=$r[title]?></div>
                                        <div class="seller-tellnumber">负责人：<?=$r[charge]?></div>
                                        <div class="seller-tellnumber">联系方式：<?=$r[phone]?></div>
                                        <div class="seller-address">地址：<?=$r[add_1]?> <?=$r[add_2]?> <?=$r[add_3]?> <?=$r[address]?></div>
                                        <div class="seller-products">经销产品：
                                        	<?php
												//产品处理
												if(!empty($r[product])){
												$arr=explode('|', $r[product], -1);	
													if(!empty($arr[1])){echo "<span class='licensed-product'>".$arr[1]."</span>";}
													if(!empty($arr[2])){echo "<span class='licensed-product'>".$arr[2]."</span>";}
													if(!empty($arr[3])){echo "<span class='licensed-product'>".$arr[3]."</span>";}
													if(!empty($arr[4])){echo "<span class='licensed-product'>".$arr[4]."</span>";}
													if(!empty($arr[5])){echo "<span class='licensed-product'>".$arr[5]."</span>";}
												}
											?>
                                        </div>
                                    </dt>
		<?	
		}
		?>