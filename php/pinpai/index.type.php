<?php
	require("../e/class/connect.php");
	require("../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-type: text/html; charset=utf-8"); 


	$type=$_POST['num'];

if($type==1){ // 关注
	
$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5 order by b.follownum desc";
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
	                                <a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng"></i></a>
                              
                             <?php
                                }
                                ?> 
										</div>
									</a>
									<div class="shenfen">
										<p><span class="di_zhi"></span><?=$r[company]?></p>
									</div>
									<div class="shenfen">
							            <p><span class="nianfen"></span><?= $r[chusheng] ?></p>
							        </div>
									<div class="guanzhu clearfix">
										<p><span class="telephone_one"></span><?=$r[telephone]?> <?=$r[mycall]?></p>
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
}elseif($type==2){ // 认证

$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5 and a.cked=1 order by a.registertime  desc";
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
	                                <a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng"></i></a>
                              
                             <?php
                                }
                                ?> 
										</div>
									</a>
									<div class="shenfen">
										<p><span class="di_zhi"></span><?=$r[company]?></p>
									</div>
									<div class="shenfen">
							            <p><span class="nianfen"></span><?= $r[chusheng] ?></p>
							        </div>
									<div class="guanzhu clearfix">
										<p><span class="telephone_one"></span><?=$r[telephone]?> <?=$r[mycall]?></p>
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
}
?>
	
