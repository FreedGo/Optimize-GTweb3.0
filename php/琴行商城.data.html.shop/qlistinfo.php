
<?php
if (!defined('InEmpireCMS')) {
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query = "select * from phome_ecms_shop where " . $yhadd . "userid='$user[userid]' and ismember=1" . $add . " and classid=58 order by newstime desc limit $offset,$line";
$sql = $empire->query($query);
//返回头条和推荐级别名称
$ftnr = ReturnFirsttitleNameList(0, 0);
$ftnamer = $ftnr['ftr'];
$ignamer = $ftnr['igr'];
$public_diyr['pagetitle'] = '产品中心 — 好琴声';
$url = "<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid" . $addecmscheck . "'>管理信息</a>&nbsp;(" . $mr[qmname] . ")";
require(ECMS_PATH . 'e/template/incfile/header.php');
?>
<div class="singleMiddle">
	<div class="singleMiddle">
		<!-- 老师管理 -->
		<div class="laoshiguanli">
			<div class="www360buy" style="margin:0 auto">
				<div class="hd">
					<ul>
						<li>所有产品</li>
						<li>发布产品</li>
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
					<!-- 所有产品 -->
					<ul class="neibulaoshi">
						<li class="huise">
							<span class="short">发布日期</span>
							<span class="long">产品名称</span>
							<span class="short">产品型号</span>
							<span class="short">产品分类</span>
							<span class="short ">产品价格</span>
							<span class="short">操作</span>
						</li>
						<?
						$sql=$empire->query("select * from {$dbtbpre}ecms_brand where userid=$userid and classid=114 order by newstime desc");
						while($r=$empire->fetch($sql))
						{
							?>
							<li>
								<span class="short"><?=date('Y-m-d',$r[newstime])?></span>
								<span class="long"><a href="<?=$r[titleurl]?>"><?=$r[title]?></a></span>
								<span class="short">产品型号</span>
								<span class="short"><?=$r[type]?></p></span>
								<span class="short hongse">￥<?= $r[chan_money] ?></span>
								<span class="">
										<a class="chakanrenshu zulinrenshu" href="<?=$r[titleurl]?>">查看</a>
										<a href="ecms.php?enews=MDelInfo&classid=<?= $r[classid] ?>&id=<?= $r[id] ?>&mid=<?= $mid ?><?= $addecmscheck ?>"
										   onclick="return confirm('确认要删除?');" class="zulinrenshu">删除</a></span>
							</li>
							<?
						}
						?>
					</ul>
					<!--新增产品-->
					<form name="add" method="POST" class="lh" enctype="multipart/form-data" action="/e/DoInfo/ecms_1.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'38');">
						<ul class="lh dengdai fabukecheng">
								<input type=hidden value=MAddInfo name=enews>
								<input type=hidden value=114 name=classid>
								<input name=id type=hidden id="id" value=>
								<input name=mid type=hidden id="mid" value=38>
								<!----返回地址---->
								<input type="hidden" name="ecmsfrom" value="/e/pinpai/chanpin/ListInfo.php?mid=10">
							<li><span>产品名称：</span><input maxlength="40" required type="text" name="title"></li>
							<li><span>副标题：</span><input maxlength="40" required type="text" name="chan_smalltext"></li>
							<li><span>产品分类：</span>
								<select name="type" id="" class="shaixuankuang">
									<option value="钢琴">钢琴</option>
									<option value="提琴">提琴</option>
									<option value="吉他">吉他</option>
									<option value="管乐">管乐</option>
									<option value="打击乐器">打击乐器</option>
								</select>
							</li>
							<li><span>产品型号：</span><input maxlength="40" required type="text" name="chan_type"></li>
							<?php
							if($quan[cked]==1){
								echo '<li><span>产品价格：</span><input maxlength="20" required type="text" name="chan_money"></li>';
							}
							?>
							<li>
								<span>封面图：</span>
								<!-- <input type="file" name="titlepicfile" size="45"> -->
								<!-- 初始化百度编辑器外壳 -->
								<script type="text/javascript"
								        src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
								<script type="text/javascript"
								        src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
								<script id="upload_ue2" name="content" type="text/plain"></script>
								<!-- 储存图片路径 -->
								<input type="hidden" id="picture2" name="titlepic" value="">
								<!-- 显示预览图 -->
								<div class="imgPre" style="float: left;width:200px;height:200px;border-radius: 3px;overflow: hidden;background-image:url(/images/product_title.jpg);">
									<img id="preview2" src="" alt="" style="width: 100%;height: 100%"></div>
								<!-- 上传按钮 -->
								<a class="datepicker lookBtn2"
								   style="float: left;margin-left: 20px;cursor: pointer;"
								   onclick="upImage2()">上传图片</a>
								<!-- 百度插件参数 -->

								<script type="text/javascript">
									var _editorr = UE.getEditor('upload_ue2');
									_editorr.ready(function () {
										//设置编辑器不可用
										//_editor.setDisabled();  //这个地方要注意 一定要屏蔽
										//隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
										_editorr.hide();

										//侦听图片上传
										_editorr.addListener('beforeinsertimage', function (t, arg) {
											//将地址赋值给相应的input,只去第一张图片的路径
											var imgs;
											for (var a in arg) {
												imgs += arg[a].src + ',';
											}
											$("#picture2").attr("value", arg[0].src);
											console.log(arg[0].src);
											//图片预览
											$("#preview2").attr("src", arg[0].src);
										})
									});
									//弹出图片上传的对话框
									function upImage2() {
										var myImage = _editorr.getDialog("insertimage");
										myImage.open();
									}
								</script>
							</li>
							<li><span></span><p style="color: #999">封面图推荐分辨率为232像素*232像素，或宽高比为1:1图片，否则会产生变形。</p></li>
							<?php
							if($quan[cked]==1){
								?>
								<li><span>产品介绍：</span></li>
								<li>
									<div style='background-color:#D0D0D0'>
										<!-- <script type="text/javascript" src="/e/extend/UE/ueditor.config.js"></script>
										<script type="text/javascript" src="/e/extend/UE/ueditor.all.js"></script> -->
										<script id="UEditor" type="text/plain" name="newstext"></script>
										<script type=text/javascript>
											UE.getEditor("UEditor", {
												initialFrameHeight: 600,
												initialFrameWidth: "100%",
												Ext: '{"classid":"58","filepass":"1463366920"}'
											})
										</script>
									</div>
								</li>
								<?php
							}
							?>
							<li>
							<li><span></span><input class="zongse" type="submit"></li>
							</li>

						</ul>
					</form>
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
			<!-- 调用slide的js语句 -->
			<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
			<script type="text/javascript">jQuery(".www360buy").slide({delayTime: 0, trigger: 'click'});</script>
			<!-- 调用slide的js语句结束 -->
		</div>
		<!-- 知音动态区域·················································· -->
	</div>
		</div>
</div>
<div>
	<?php
	require(ECMS_PATH . 'e/template/incfile/footer.php');
	?>
