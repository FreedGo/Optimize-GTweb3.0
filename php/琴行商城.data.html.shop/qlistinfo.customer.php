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
				<li >订单详情</li>
			</ul>
			<div class="sousuokuang">
				<input type="text">
				<button class="iconfont sousuo1">&#xe658;</button>
			</div>
		</div>
		<div class="bd">
			<!-- 全部订单 -->
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
			<!-- 已完成订单 -->

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
			<!-- 未完成订单 -->
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
			<!-- 订单详情 -->
			<ul class="order-detaill-warp">
				<li class="order-tiem">
					<div class="order-head clearfix">
						<div class="order-head-item order-number f-l-l">订单号:XXXXXXXXXXXX</div>
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
							黑色
						</div>
						<div class="order-body-item order-Btn f-l-l">
							已付款
						</div>
						<div class="order-body-item order-detaill f-l-l">
							<a class="look-order-detaill" href="">订单详情</a>
						</div>
					</div>
				</li>
				<li class="order-detaill-item detaill-msg">
					<h2 class="order-detaill-item-title">卖家信息</h2>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">店铺名称:</span>
						<span class="detaill-msg-mon-val f-l-l">XXXXXXX琴行</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">售后电话:</span>
						<span class="detaill-msg-mon-val f-l-l">021-8888888888</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">发货地址:</span>
						<span class="detaill-msg-mon-val f-l-l">上海市松江区XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</span>
					</div>
				</li>
				<li class="order-detaill-item detaill-msg">
					<h2 class="order-detaill-item-title">物流信息</h2>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">物流公司:</span>
						<span class="detaill-msg-mon-val f-l-l">百世汇通</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">货运单号:</span>
						<span class="detaill-msg-mon-val f-l-l">XXXXXXXXXXXXXXXXXXXXXXXXXX</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">物流跟踪:</span>
						<span class="detaill-msg-mon-val f-l-l"><a class="get-wuliu-msg">点击查询</a></span>
					</div>
					<div class="wuliu-msg-warp">
						<div class="loaders">
							<div class="loader">
								<div class="loader-inner line-scale">
									<div></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li class="order-detaill-item detaill-msg">
					<h2 class="order-detaill-item-title">收货信息</h2>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">联系人:</span>
						<span class="detaill-msg-mon-val f-l-l">张XXXX</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">联系电话:</span>
						<span class="detaill-msg-mon-val f-l-l">1858888888888</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">收货地址:</span>
						<span class="detaill-msg-mon-val f-l-l">上海市松江区XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</span>
					</div>
				</li>
				<li class="order-detaill-item detaill-msg">
					<h2 class="order-detaill-item-title">支付及发票</h2>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">支付状态:</span>
						<span class="detaill-msg-mon-val f-l-l">已支付</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">支付方式:</span>
						<span class="detaill-msg-mon-val f-l-l">支付宝在线支付</span>
					</div>
					<div class="detaill-msg-mon clearfix">
						<span class="detaill-msg-mon-name f-l-l">发票信息:</span>
						<span class="detaill-msg-mon-val f-l-l">不要发票</span>
					</div>
				</li>
				<li class=" last-total-price">
					<dl >
						<dt class="clearfix">
							<span class="last-total-price-name f-l-l">商品总价:</span>
							<span class="last-total-price-val f-l-l">2499元</span>
						</dt>
						<dt class="clearfix">
							<span class="last-total-price-name f-l-l">运费:</span>
							<span class="last-total-price-val f-l-l">0元</span>
						</dt>
						<dt class="clearfix">
							<span class="last-total-price-name f-l-l">订单总额:</span>
							<span class="last-total-price-val f-l-l">2499元</span>
						</dt>
						<dd class="lastest-pay clearfix">
							<span class="last-total-price-name f-l-l">实际付款:</span>
							<span class="last-total-price-val f-l-l">2499元</span>
						</dd>
					</dl>
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
						fd=$(this).siblings('.rent-id').val();
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