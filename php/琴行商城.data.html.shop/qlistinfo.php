<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select * from phome_ecms_shop where ".$yhadd."userid='$user[userid]' and ismember=1".$add." and classid=59 order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];

$public_diyr['pagetitle']='琴房租赁 — 好琴声';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>


<div class="singleMiddle">
		<!-- 老师管理 -->
		<div class="laoshiguanli">
			<div class="www360buy" style="margin:0 auto">
		<div class="hd">
			<ul>
				<li id="rent-edi-trigger">全部订单</li>
				<li>已完成订单</li>
				<li >未完成订单</li>
			</ul>
			<div class="sousuokuang">
				<input type="text">
				<button class="iconfont sousuo1">&#xe658;</button>
			</div>
		</div>
		<style>
					.f-l-l{
						float: left;
					}
					.online-shop-all-orders,.orders-finished,.orders-unfinished{
						padding: 10px;
					}
					.order-tiem{
						border:#ccc solid 1px;
						margin-bottom:20px;
					}
					.order-head{
						height: 34px;
						background-color: #efefef;
					}
					.order-head-item{
						font:14px/34px 微软雅黑;
						color: #333;
						padding-left: 5px;
					}
					.order-number{
						width: 162px;
					}
					.roder-time{
						width: 160px;
					}
					.order-seller{
						width:150px;
					}
					.order-seller-telnumber{
						width:206px;
					}
					.order-body{
						height:55px;
						padding-top: 5px;
					}
					.order-body-item{
						height:48px;
						margin-bottom: 5px;
						font:14px/48px 微软雅黑;
					}
					.order-body-item.product-title{
						line-height: 24px;
					}
					.product-img {
						width: 48px;
						height:48px;
						border:#ccc solid 1px;
						margin-left: 5px;
					}
					.product-title{
						width:200px;
						margin-left: 10px;
						font:14px/48px 微软雅黑;

					}
					.product-title a{
						font:14px/24px 微软雅黑;

					}
					.product-title:hover a{
						color: #f00;
					}
					.product-nums{
						width:42px;
						text-align: center;
					}
					.product-total-price{
						width:120px;
						text-align: center;
					}
					.order-status,.order-Btn,.order-detaill{
						width:90px;
						text-align: center;
					}
					.order-com-button{
						padding: 5px 10px;
						background-color: #62AEFC;
						border-radius: 4px;
						color: #fff;
					}
					..order-com-button a{
						color: #fff;
					}
					.look-order-detaill{
						color: #cb7047;
						border-bottom:solid 1px #cb7047;
					}
			</style>
		<div class="bd">
			<!-- 我的琴房 -->

			<ul class="online-shop-all-orders" style="display: block">
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
						<div class="order-head-item roder-time f-l-l">2016-11-11 00:00:00</div>
						<div class="order-head-item order-seller f-l-l">佳音琴行XXXXXXX</div>
						<div class="order-head-item order-seller-telnumber f-l-l">商户电话:021-58888888</div>
					</div>
					<div class="order-body">
						<div class="order-body-item product-img f-l-l">
							<a href="">
								<img src="" alt="">
							</a>
						</div>
						<div class="order-body-item product-title f-l-l">
							<a href="">法兰山德Franzsandner(50周年纪念提琴)</a>
						</div>
						<div class="order-body-item product-nums f-l-l">
							1
						</div>
						<div class="order-body-item product-total-price f-l-l">
							¥24999.00
						</div>
						<div class="order-body-item order-status f-l-l">
							已付款
						</div>
						<div class="order-body-item order-Btn f-l-l">
							<span class="go-pay-order order-com-button">去付款</span>
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
						<div class="order-head-item roder-time f-l-l">2016-11-11 00:00:00</div>
						<div class="order-head-item order-seller f-l-l">佳音琴行XXXXXXX</div>
						<div class="order-head-item order-seller-telnumber f-l-l">商户电话:021-58888888</div>
					</div>
					<div class="order-body">
						<div class="order-body-item product-img f-l-l">
							<a href="">
								<img src="" alt="">
							</a>
						</div>
						<div class="order-body-item product-title f-l-l">
							<a href="">法兰山德Franzsandner(50周年纪念提琴)</a>
						</div>
						<div class="order-body-item product-nums f-l-l">
							1
						</div>
						<div class="order-body-item product-total-price f-l-l">
							¥24999.00
						</div>
						<div class="order-body-item order-status f-l-l">
							已付款
						</div>
						<div class="order-body-item order-Btn f-l-l">
							<span class="ensure-got order-com-button">确认收货</span>
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
						<div class="order-head-item roder-time f-l-l">2016-11-11 00:00:00</div>
						<div class="order-head-item order-seller f-l-l">佳音琴行XXXXXXX</div>
						<div class="order-head-item order-seller-telnumber f-l-l">商户电话:021-58888888</div>
					</div>
					<div class="order-body">
						<div class="order-body-item product-img f-l-l">
							<a href="">
								<img src="" alt="">
							</a>
						</div>
						<div class="order-body-item product-title f-l-l">
							<a href="">法兰山德Franzsandner(50周年纪念提琴)</a>
						</div>
						<div class="order-body-item product-nums f-l-l">
							1
						</div>
						<div class="order-body-item product-total-price f-l-l">
							¥24999.00
						</div>
						<div class="order-body-item order-status f-l-l">
							已付款
						</div>
						<div class="order-body-item order-Btn f-l-l">
							<span class="write-reviews order-com-button">评价</span>
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
			</ul>
			<ul class=" orders-finished ">
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
						<div class="order-head-item roder-time f-l-l">2016-11-11 00:00:00</div>
						<div class="order-head-item order-seller f-l-l">佳音琴行XXXXXXX</div>
						<div class="order-head-item order-seller-telnumber f-l-l">商户电话:021-58888888</div>
					</div>
					<div class="order-body">
						<div class="order-body-item product-img f-l-l">
							<a href="">
								<img src="" alt="">
							</a>
						</div>
						<div class="order-body-item product-title f-l-l">
							<a href="">法兰山德Franzsandner(50周年纪念提琴)</a>
						</div>
						<div class="order-body-item product-nums f-l-l">
							1
						</div>
						<div class="order-body-item product-total-price f-l-l">
							¥24999.00
						</div>
						<div class="order-body-item order-status f-l-l">
							已完成
						</div>
						<div class="order-body-item order-Btn f-l-l">
							<span class="reviews-finished order-com-button">已评价</span>
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
			</ul>
			<ul class=" orders-unfinished">
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
						<div class="order-head-item roder-time f-l-l">2016-11-11 00:00:00</div>
						<div class="order-head-item order-seller f-l-l">佳音琴行XXXXXXX</div>
						<div class="order-head-item order-seller-telnumber f-l-l">商户电话:021-58888888</div>
					</div>
					<div class="order-body">
						<div class="order-body-item product-img f-l-l">
							<a href="">
								<img src="" alt="">
							</a>
						</div>
						<div class="order-body-item product-title f-l-l">
							<a href="">法兰山德Franzsandner(50周年纪念提琴)</a>
						</div>
						<div class="order-body-item product-nums f-l-l">
							1
						</div>
						<div class="order-body-item product-total-price f-l-l">
							¥24999.00
						</div>
						<div class="order-body-item order-status f-l-l">
							未付款
						</div>
						<div class="order-body-item order-Btn f-l-l">
							<span class="go-pay-order order-com-button">去付款</span>
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
		<!-- 调用slide的js语句 -->
		<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
		<script type="text/javascript">jQuery(".www360buy").slide({delayTime:0,trigger:'click' });</script>
		<!-- 调用slide的js语句结束 -->
		<script type="text/javascript">
			$(function() {//点击弹出琴房租赁修改页面
				var fa = $('.rent-set-sei-btn'),
					fb = $('.rent-edi-wrap'),
					fc = $('.rent-edi-menu'),
					fd,
					fe = fa.siblings('.rent-userid').val(),
					ff = fa.siblings('.rent-classid').val(),
					fg = $('.hd li');
					// fh = $('#rent-page-insert').contents().find('#rent-page-sub');
					fa.on('click', function(event) {
						fc.trigger('click');
						fg.removeClass('on');
						fd=$(this).siblings('.rent-id').val(),
						fb.empty().append('<iframe id="rent-page-insert" name="rent-page-insert" src="/e/data/html/zulin/rent-eid-page.php?id='+fd+'" frameborder="0"  style="width:724px;min-height:960px;"></iframe>').show();
					});
					// fh.on('click', function(event) {
					// 	alert(1);
					// });
			});
		</script>
		</div>
		<!-- 知音动态区域·················································· -->
	</div>
    

<div>
<!--<div class="hy_nav hd">
            	<ul>
            		<li><a href="ListInfo.php?mid=<?=$mid?>"<? if($indexchecked==1){echo ' class="on"';}?>>已发布</a></li>
            		<li><a href="ListInfo.php?mid=<?=$mid?>&ecmscheck=1"<? if($indexchecked==0){echo ' class="on"';}?>>待审核</a></li>
            	</ul>
</div>-->

</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>