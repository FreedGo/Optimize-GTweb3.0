<?php
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接 
 
$userid   =getcvar('mluserid');
if($userid==0){
	echo '<meta http-equiv="refresh" content="0;url=/e/member/login/">';
	exit;
}
//订单号
    function build_order_no(){
         return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }
	$ddid=build_order_no();
//接收报名活动信息
	$id=$_GET['id'];
	$classid=$_GET['classid'];
	if(empty($id) || empty($classid)){
		echo '<meta http-equiv="refresh" content="0;url=http://www.greattone.net/404.html">';
		exit;
	}
	$r=$empire->fetch1("select * from phome_ecms_shop where id='$id' and classid='$classid'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>好琴声报名页面</title>
<meta property="og:image" content="[!--titlepic--]"/>
<meta property="og:description" content="[!--pagetitle--] — 好琴声"/>
<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
<link rel="stylesheet" type="text/css" href="/css/haixuan.css">
<link rel="stylesheet" type="text/css" href="/shang/haixuan.img/style.css">
<link rel="stylesheet" type="text/css" href="http://171.11.231.70:2000/upload/css/upload.css" />
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script language="javascript" src="/js/language.js"></script>
<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
    var actid = '<?=$id?>';
    console.log(actid);
    var actClassid = '<?=$classid?>';
    console.log(actClassid);

  </script>
<script type="text/javascript" src="/js/xin_haixuan.js" ></script>
<script type="text/javascript">
  $(function() {
    var aSelect = $('.hai_grouping'),
            b = $('.hai_grouping2'),
            c;
            window.onload = function(){//海选报名分组，一级选择，在页面载入之后向后天请求数据
              $.ajax({
                url: '/e/ajax/haixuan.ajax.php',
                type: 'post',
                dataType: 'html',
                data: {'titleid':actid}
              })
              .done(function(msg) {
                // a.empty().append('<option value="0">请选择</option>');
                aSelect.empty().append('<option value="请选择">请选择</option>'+msg);
                console.log(msg);
              })
              .fail(function() {
                console.log("error");
              });
            };
            aSelect.on('change',  function(event) {//海选报名分组，二级选择菜单，在一级选择之后向二级传参，并返回值

              c = $(this).val();
              if (c=='请选择') {
                
                $("#hai_grouping option[value='请选择']").remove();
                alert('请选择分组');
              }
              else {
                $.ajax({
                  url: '/e/ajax/haixuan.ajax.two.php',
                  type: 'post',
                  dataType: 'html',
                  data: {'sitname': c},
                })
                .done(function(msg) {
                  b.empty().append(msg);
                  console.log(msg);
                })
                .fail(function() {
                  console.log("error");
                });
              };
              
              
            });
  });
</script>
<script type="text/javascript" src="/js/area.js"></script>
<script src="http://171.11.231.70:2000/js/jquery-1.11.2.min.js"></script>
<script language="javascript">
       var ServerUrl = "http://171.11.231.70:2000/uploads/";
        $(document).ready(function(){
              //$('[data-toggle="tooltip"]').tooltip()
              var hostname = window.location.hostname
              var port = window.location.port || '80';
              ServerUrl = "http://171.11.231.70:2000/uploads";          
                   })      
</script>
<script type="text/javascript" src="http://171.11.231.70:2000/upload/js/webuploader.js"></script>
<script type="text/javascript" src="http://171.11.231.70:2000/upload/js/md5.js"></script>
<script type="text/javascript" src="http://171.11.231.70:2000/upload/js/adminup.js"></script>
<!-- <script type="text/javascript" src="/js/webuploader.min.js" ></script> -->
<!--<script type="text/javascript" src="/js/upload.js" ></script>-->
</head>
  <script>
    // 百度分享代码 ·········································
    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"[!--title--]","bdMini":"2","bdMiniList":false,"bdPic":"[!--titlepic--]","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
    // 百度分享代码 ·········································
    </script>
 <style type="text/css">
    a.player_control_bar_logo{
    display:none !important;
  }
  .upload_img_btn{
    width: 140px;
    height: 36px;
    line-height: 36px;
    color: #fff;
    font-size:14px;
    position: relative;
    text-align: center;
    background-color: #E29564;
    border-radius: 3px;
  }
  #img_upload{
    width: 140px!important;
    height: 36px!important;
    position: absolute;
    top: 0;
    left: 0;

  }
  #img_upload object{
    width: 140px!important;
    height: 36px!important;
    position: absolute;
    top: 0;
    left: 0;
  }
  #img_upload-queue{
    height: 0;
    display: none;
  }
  .baomingMsgTable .tupianshangchuanWrap textarea{
    width: 153px!important;
  }
  </style>
    <script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva.js"></script>
    <script type="text/javascript" src="http://7xjfim.com2.z0.glb.qiniucdn.com/Iva_Compatible.js"></script>
</head>
<body>
<?
include '../header_1.php';
?>
<!-- ······························头部结构····································· -->
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
      <div class="baomingMsg baomingMsg2">
        <div class="baomingTitle">
        </div>
<form name="add" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'20');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=78 name=classid> 
              <input name=id type=hidden id="id" value=> 
              <input name=mid type=hidden id="mid" value=20>
              <input type="hidden" name="dingdan" value="<?=$ddid?>" />
              <!----返回地址---->
           <input type="hidden" name="ecmsfrom" value="/e/template/incfile/huodong/pay.php?ddid=<?=$ddid?>&did=<?=$id?>">
              <ul>
                <div class="baomingTitle">
                          <h2>活动报名表</h2>
                  <p>请务必填写真实信息</p>
                  
                  <input type="hidden" name="bao_type" value="4">
					<!--<input type="hidden" name="title" value="[!--title--]">-->
					<!--<input type="hidden" name="hai_id" value="<%=date%>">-->
                </div>
                <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>姓名：</td>
                    <td bgcolor='ffffff'>
                      <input placeholder="真实姓名" name="hai_name" type="text" id="hai_name" required>                     </td>
                  </tr>
                    <tr>
                        <td width='16%' height=25 bgcolor='ffffff'>参赛曲目：</td>
                        <td bgcolor='ffffff'>
                            <input placeholder="参赛准备演奏的曲目" name="title" type="text" id="title" required>                     </td>
                    </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>电话:</td>
                    <td bgcolor='ffffff'>
                      <input placeholder="请填写国码+电话/手机，大陆国码为+86，台湾为+886" name="hai_phone" type="text" id="hai_phone" required>
                   </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>费用:</td>
                    <td bgcolor='ffffff'>
                      <span class="baomingfei">
					  
					  <?php
                        	if($r[money_type]=="人民币"){
								echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ $r[price]</span>";
							}elseif($r[money_type]=="新台币"){
								echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ $r[price]</span>";
							}
						?></span>                    </td>
                  </tr>
                  <input type="hidden" name="hai_id" id="hai_id" value="<?=$id?>">
                  <input type="hidden" name="hai_cost" value="<?=$r[price]?>">
                </table>
                <li><label></label><input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium"></li>
            	</ul>
</form>
          </div>
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