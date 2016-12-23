<?php
	require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
	require('../../../class/db_sql.php'); //引入数据库操作文件 
	$link=db_connect(); //连接MYSQL 
	$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链
	$userid=$_POST['userid'];	
	$cid=$_POST['cid'];
		if($cid==1){
			$classid="11,12,13";
		}elseif($cid==2){
			$classid="11";
		}elseif($cid==3){
			$classid="13";
		}elseif($cid==4){
			$classid="12";
		}elseif($cid==5){
			$classid="73,104";
		}elseif(empty($cid)){
			$classid="11,12,13";
		}
	$num=$_POST['num'];
	$num=$num*10;
	
		
if($cid==1){	//全部
	$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' and open=1 and classid in($classid) order by a.id  desc limit $num,10" );
		while($r=$empire->fetch($sql))
		{	
		?>
					<li class="clearfix" id="userImg<?=$r[id]?>">
						<script type="text/javascript">
							$(function() {
								var iclassid = '<?=$r[classid]?>';
								if (iclassid=='12') {//只有等于12的时候才是图片贴
									var imgUserMsg="<?=$r[id]?>";
								
									$.ajax({
										url: '/guangchang/index.photo.php',
										type: 'post',
										dataType: 'text',
										data: {'tit_id': imgUserMsg},
									})
									.done(function(msg) {
										console.log(msg);
										var UserImgInfo=msg;
										var userSelect="userImg"+imgUserMsg;
										
										// $('userSelect').children('chatu a').append('msg');
										$('#'+userSelect).find('.chatu a').empty().append(msg);
									})
									.fail(function() {
										console.log("error");
									});
								}
							});

					</script>
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="<?=$r['titleurl']?>"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
		<?
		}
}elseif($cid==2){	//视频
	$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' and open=1 and classid in($classid) order by a.id  desc limit $num,10" );
		while($r=$empire->fetch($sql))
		{	
		?>
        			<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="<?=$r['titleurl']?>"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
		<?
		}
}elseif($cid==3){	//音乐
	$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' and open=1 and classid in($classid) order by a.id  desc limit $num,10" );
		while($r=$empire->fetch($sql))
		{	
		?>
        			<li class="clearfix">
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="<?=$r['titleurl']?>"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
		<?
		}
}elseif($cid==4){	//图片
	$sql=$empire->query("select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' and open=1 and classid in($classid) order by a.id  desc limit $num,10" );
		while($r=$empire->fetch($sql))
		{	
		?>
        			<li class="clearfix" id="userImg<?=$r[id]?>0">
						<script type="text/javascript">
							$(function() {
								var iclassid = '<?=$r[classid]?>';
								if (iclassid=='12') {//只有等于12的时候才是图片贴
									var imgUserMsg="<?=$r[id]?>";
								
									$.ajax({
										url: '/guangchang/index.photo.php',
										type: 'post',
										dataType: 'text',
										data: {'tit_id': imgUserMsg},
									})
									.done(function(msg) {
										console.log(msg);
										var UserImgInfo=msg;
										var userSelect="userImg"+imgUserMsg+"0";
										
										// $('userSelect').children('chatu a').append('msg');
										$('#'+userSelect).find('.chatu a').empty().append(msg);
									})
									.fail(function() {
										console.log("error");
									});
								}
							});

					</script>	
							<a href="<?=$r['titleurl']?>"><h3><?=$r['title']?></h3></a>
							<a href="<?=$r['titleurl']?>"><p><?=$r['smalltext']?></p></a>
							<div class="chatu">
								<a href="<?=$r['titleurl']?>"><img src="<?=$r['titlepic']?>">
                               <?php
                	if($r[classid]==11){
                    	echo "<i class='iconfont'>&#xe63b;</i>";
                    }elseif($r[classid]==13){
                    	echo "<i class='iconfont'>&#xe63e;</i>";
                    }
           						 ?>		
							</div>
							<div class="time clearfix">
								<span><?=$r['newspath']?></span>
								<div class="timeRight">
									<ol class="clearfix">
										<li><a  title="点击量" href="javascript:;"><i class="iconfont">&#xe644;</i></a></li>
										<li><?=$r['onclick']?></li>
										<li><a title="点赞量" href="javascript:;"><i class="iconfont">&#xe629;</i></a></li>
										<li><?=$r['isgood']?></li>
										<li><a title="评论量" href="javascript:;"><i class="iconfont">&#xe64e;</i></a></li>
										<li><?=$r['plnum']?></li>
										<li><a title="点击分享" href="javascript:;"><i class="iconfont">&#xe64b;</i></a></li>
									</ol>
									<div class="bdsharebuttonbox">
										<a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
									</div>
									
								</div>

							</div>
					</li>
		<?
		}
}elseif($cid==5){	//活动
	$sql=$empire->query("select * from {$dbtbpre}ecms_shop a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid where a.userid='$userid' and a.classid in($classid) order by a.id  desc limit $num,20" );
		while($r=$empire->fetch($sql))
		{	
		?>
        			<li>
						  <div class="p-img ld">
						  	<a href="<?=$r[titleurl]?>"><img src="<?=$r[titlepic]?>"></a>
						  </div>
						  <div class="p-name"><a href="<?=$r[titleurl]?>"><?=$r[title]?></a></div>
						  <div class="p-price">活动时间：<strong><?=$r[huodong_2]?></strong></div>
						</li>
		<?
		}
}
?>