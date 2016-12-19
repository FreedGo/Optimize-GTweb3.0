<?php
	require("../../../../class/db_sql.php");
	require("../../../../class/connect.php");
	$link=db_connect();
	$empire=new mysqlquery();
	
	$dingdan = $_POST['dingdan'];

$r=$empire->fetch1("select * from phome_enewsshopdd where ddno=$dingdan"); 

	if(empty($r[ddno])){
		echo '<meta http-equiv="refresh" content="0;url=/e/ShopSys/address/ListAddress.php">';
		exit;
	}
$bk=$empire->fetch1("select * from phome_ecms_photo where dingdan=$dingdan"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欧付宝支付</title>
	<style type="text/css">
		form{display: none;}
		.msger{
			height: 100px;
			width: 500px;
			margin:100px auto;
		}
	</style>
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('form').hide();
		});
		window.onload = function(){
			$('.button04').trigger('click');

		}
	</script>
</head>
<body>
	<div class="msger">
		<h2>正在链接到欧付宝平台，请等待。。。</h2>
	</div>
	<?php
header("Content-type: text/html; charset=utf-8"); 

   //特殊字元置換
	function _replaceChar($value)
	{
		$search_list = array('%2d', '%5f', '%2e', '%21', '%2a', '%28', '%29');
		$replace_list = array('-', '_', '.', '!', '*', '(', ')');
		$value = str_replace($search_list, $replace_list ,$value);
		
		return $value;
	}
	//產生檢查碼
	function _getMacValue($hash_key, $hash_iv, $form_array)
	{
		$encode_str = "HashKey=" . $hash_key;
		foreach ($form_array as $key => $value)
		{
			$encode_str .= "&" . $key . "=" . $value;
		}
		$encode_str .= "&HashIV=" . $hash_iv;
		$encode_str = strtolower(urlencode($encode_str));
		$encode_str = _replaceChar($encode_str);
		return md5($encode_str);
	}
    //仿自然排序法
    function merchantSort($a,$b)
	{
		return strcasecmp($a, $b);
	}
//------------------------------------------交易輸入參數------------------------------------------------------
//訂單編號
//$trade_no = "StageTest".time();
//订单随机数生成8位
srand((double)microtime()*1000000);//create a random number feed.
$ychar="0,1,2,3,4,5,6,7,8,9";
$list=explode(",",$ychar);
for($i=0;$i<8;$i++){
$randnum=rand(0,9); 
$authnum.=$list[$randnum];
}
	$ding=$authnum.$r[ddno];
	
	
$trade_no = $ding;
//交易金額
$total_amt = $r[money];
//交易描述
$trade_desc = $r[laiyuan];
//如果商品名稱有多筆，需在金流選擇頁一行一行顯示商品名稱的話，商品名稱請以井號分隔(#)
$item_name = $r[shoptitle];
	$dingdan=$r[ddno];
//交易返回頁面
$return_url = "http://www.greattone.net/e/template/incfile/haixuan/oufubao/ou.class.php?ddid=$dingdan";
//交易通知網址
$client_back_url = "http://www.greattone.net/e/template/incfile/haixuan/oufubao/ou.class.php?ddid=$dingdan";
//選擇預設付款方式
$choose_payment = "ALL";
//是否需要額外的付款資訊
$needExtraPaidInfo = "Y";
//Alipay 必要參數
$alipay_item_name = $item_name;
$alipay_item_counts = 1;
$alipay_item_price = $total_amt;
/*$alipay_email = 'stage_test@allpay.com.tw';
$alipay_phone_no = '0911222333';
$alipay_user_name = 'Stage Test';*/
/***************以下為測試環境資訊(若轉換為正式環境,請修改以下參數值)**********************/
//交易網址(測試環境)
$gateway_url = "https://payment.allpay.com.tw/Cashier/AioCheckOut/V2";
//商店代號
$merchant_id = "1386047";
//HashKey
$hash_key = "JTB0KMbUPkn39rSB";
//HashIV
$hash_iv = "5qUqFIi8rFKhKmP5";
/********************************************************************************************/
$form_array = array(
    "MerchantID" => $merchant_id,
    "MerchantTradeNo" => $trade_no,
    "MerchantTradeDate" => date("Y/m/d H:i:s"),
    "PaymentType" => "aio",
    "TotalAmount" => $total_amt,
    "TradeDesc" => $trade_desc,
    "ItemName" => $item_name,
    "ReturnURL" => $return_url,
    "ChoosePayment" => $choose_payment,
   "ClientBackURL" => $client_back_url,
	"NeedExtraPaidInfo" => $needExtraPaidInfo,
  );
  
     # 調整ksort排序規則--依自然排序法(大小寫不敏感)
     uksort($form_array, 'merchantSort');
     # 取得 Mac Value
	$form_array['CheckMacValue'] = _getMacValue($hash_key, $hash_iv, $form_array);
	
$html_code = '<form  method=post action="' . $gateway_url . '">';
foreach ($form_array as $key => $val) {
    $html_code .= "<input type='text' name='" . $key . "' value='" . $val . "'><BR>";
}
$html_code .= "<input  class='button04' type='submit' value='送出'>";
$html_code .= "</form>";
echo $html_code;
?>
</body>
</html>

