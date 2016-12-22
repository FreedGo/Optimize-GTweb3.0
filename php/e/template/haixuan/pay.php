<?php
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接 
	$ddid=$_GET['ddid'];
	$did=$_GET['did'];
	//echo $ddid;
	
	if(empty($ddid)){
		echo '<meta http-equiv="refresh" content="0;url=http://www.greattone.net/404.html">';
		exit;
	}
	$r=$empire->fetch1("select * from phome_enewsshopdd where ddno='$ddid'"); 
		if($r[money]==0){
		echo '<meta http-equiv="refresh" content="0;url=http://www.greattone.net/e/ShopSys/address/ListAddress.php">';
		exit;
	}
	$o=$empire->fetch1("select bitype from phome_ecms_shop where id='$did'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>好琴声支付页面</title>
  <meta property="og:image" content="[!--titlepic--]"/>
<meta property="og:description" content="[!--pagetitle--] — 好琴声"/>
<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
<link rel="stylesheet" type="text/css" href="/css/haixuan.css">
<link rel="stylesheet" type="text/css" href="/css/pay.css">
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script language="javascript" src="/js/language.js"></script>
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/js/area.js"></script>
<!-- <script type="text/javascript" src="/js/pay2.js"></script> -->
</head>
 <style type="text/css">
  .rightWrap .payWrap,.rightWrap .payWrap2 {
    width: 950px;
    padding: 15px;
    border: none;
    background-color: #f2f2f2;
    display: block;
    position: relative;
    left: 0;
    top: 0;
    -webkit-transform: none;
    -ms-transform: none;
    -o-transform: none;
    transform: none;
    min-height: 552px;

  }
  .payImg4{
    background-position:0 -1619px ;
  }
  </style>
</head>
<body>
<?
include '../header_1.php';
?><!-- ······························头部结构····································· -->
  <!-- 视频弹出框······················································ -->
      <!-- 这里插视频 -->
    </div>
    <div class="shipinDown"></div>
  <!-- 视频弹出框结束······················································ -->
<!-- 头部结构结束·························································· -->
<!-- ····························中间结构·································· -->
<div class="bodyWrap clearfix">
  <!-- 左边二级导航列···················································· -->
  <div class="leftWrap">
    <ol>
      <li><a href="http://www.franzsandner.com/"><img src="/images/adLeft.jpg" alt=""></a></li>
      <li><a href="http://www.august-foerster.de/"><img src="/images/adLeft2.jpg" alt=""></a></li>
      <li><a href="https://falanshande.tmall.com/"><img src="/images/adLeft3.jpg" alt=""></a></li>
      <li><a href="http://www.oblanc.com.tw/"><img src="/images/adLeft4.jpg" alt=""></a></li>
    </ol>
  </div>
  <!-- 左边二级导航列结束················································ -->
  <!-- 中间内容部分······················································ -->
  <div class="rightWrap clearfix">
      
      <!-- 报名框 -->
      <div class="payWrap">
      <h2 class="payHead">支付</h2>
      <div class="payContent">
      <?php
      	if($o[bitype]=="人民币"){
			//此处为支付宝支付
			?>
			<form class="payInfo" action="demo/alipayapi.php" method="post"><!-- action的值写在js里面进行动态切换 -->
        <ul>
          <li class="clearfix">
            <span class="payLeft">订单编号：</span><span class="payRight1"><?=$r[ddno]?></span>
            <input type="hidden" name="dingdan" value="<?=$r[ddno]?>">
          </li>
          <li class="clearfix">
            <span class="payLeft">支付项目：</span><span class="payRight1"><?=$r[shoptitle]?></span>
          </li>
          <li class="clearfix">
            <span class="payLeft">支付方式：</span>
            <span class="payRight1"> 
              <ol class="clearfix">
                <li>
                  <label for="zhifubao" class="alipay">
                    <input type="radio" name="pay_way_select" id="zhifubao" class="payWay payWay1" checked>
                    <a class="payImg payImg1"></a>
                  </label>
                </li>
              </ol>
            </span>
          </li>

          <li class="clearfix">
            <span class="payLeft">支付金额：</span><span class="payRight1"><?=$r[money]?>元</span>
          </li>
          <li><input class="goPay" id="payBtn" type="submit" value="去支付"></li>
        </ul>
        </form>
			<?
		}elseif($o[bitype]=="新台幣"){
			//此处为欧付宝支付
			?>
			<form class="payInfo" action="oufubao/Allpay_AIO_CreateOrder.php?ddno=<?=$r[ddno]?>" method="post">
        <ul>
          <li class="clearfix">
            <span class="payLeft">订单编号：</span><span class="payRight1"><?=$r[ddno]?></span>
            <input type="hidden" name="dingdan" value="<?=$r[ddno]?>">
          </li>
          <li class="clearfix">
            <span class="payLeft">支付项目：</span><span class="payRight1"><?=$r[shoptitle]?></span>
          </li>
          <li class="clearfix">
            <span class="payLeft">支付方式：</span>
            <span class="payRight1"> 
              <ol class="clearfix">
                <li>
                  <label for="ofubao" class="twpay">
                    <input type="radio" name="pay_way_select" id="ofubao" class="payWay payWay4">
                    <a class="payImg payImg4"></a>
                  </label>
                </li>
              </ol>
            </span>
          </li>

          <li class="clearfix">
            <span class="payLeft">支付金额：</span><span class="payRight1"><?=$r[money]?>元</span>
          </li>
          <li><input class="goPay" id="payBtn" type="submit" value="去支付"></li>
        </ul>
        </form>
			<?
		}
	  ?>
      </div>
    </div>
    <!-- 报名框结束 -->
  </div>
  <!-- 中间内容部分结束·················································· -->
</div>
<!-- ····························中间结构结束·································· --> 
<!-- 底部结构开始································································ -->
<?
include '../footer.php';
?>
<!-- 底部结构开始································································ -->
</body>
</html>
<?php
$empire=null; //注消操作类变量
?>