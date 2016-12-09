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
?>
	<li>
									<a href="/e/space/?userid=<?=$r[userid]?>">
										<img src="<?=$r[userpic]?>">
										<div class="xingming">
											<span><?=$r[username]?></span>
                                      <?php
                             	if($r[cked]==1){
                                ?>
                           <a href="javascript:;" title="��������֤����"><i class="iconfont">&#xe657;</i></a>

                             <?php
                                }
                                ?>
										</div>
									</a>
									<div class="shenfen">
							            <p><span class="di_zhi"></span><?= $r[company] ?></p>
							        </div>
							        <div class="shenfen">
							            <p><span class="nianfen"></span><?= $r[chusheng] ?></p>
							        </div>
							        <div class="guanzhu clearfix">
							            <p><span class="telephone_one"></span><?= $r[telephone] ?> <?= $r[mycall] ?></p>
							        </div>
									<?
                                    	if($r[resever_1]==1){
										?>
									<span class="toutiao01"></span>
                                    <span class="toutiao02"></span>
										<?
										}
										?>

								</li>
<?
}
?>