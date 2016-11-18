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
    var actClassid = '<?=$classid?>';
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
                aSelect.empty().append('<option value="请选择">请选择</option>');
                  msg=eval("("+msg+")");
                  for (var i = 0 ;i < msg.length ; i++){
                      aSelect.append('<option value='+msg[i].name+'>'+msg[i].name+'</option>');
                      $('.leftWrap').append('<input type="hidden" class="tem-price" value='+msg[i].price+' />')
                  };
                  aSelect[0].selectedIndex = 1;//默认选择第一个项
                  $('.baomingfeinum').html(msg[0].price);//默认第一个价格
              })
              .fail(function() {
                console.log("error");
              });
            };
            aSelect.on('change',  function(event) {//海选报名分组，二级选择菜单，在一级选择之后向二级传参，并返回值

              c = $(this).val();
              if (c=='请选择') {
                
//                $("#hai_grouping option[value='请选择']").remove();
                  this.selectedIndex = 1;
                alert('请选择分组');
              }
              else {
                  var priceIndex = this.selectedIndex-1;
                  $('.baomingfeinum').html($('.tem-price').eq(priceIndex).val());//选择对应分组的价格
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
          <h2>海选报名表</h2>
        </div>
        <!--<div class="baomingSelect clearfix" >
          <div class="baomingchange change1 on f-l-l">上传视频报名</div>
          <div class="baomingchange change2 f-l-l">上传图片报名</div>
        </div>-->
        <!-- 1.视频上传报名框 -->
        <?php
        if($r[hai_baotype]=="|视频|"){
        ?>
        <form class="haixuanbaoming haixuanbaoming1 videobaoming" name="add" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'20');">
              <input type=hidden value=MAddInfo name=enews> <input type=hidden value=73 name=classid> 
              <input name=id type=hidden id="id" value=>
              <input name=bao_type type=hidden id="idd" value="3">
              <input type="hidden" name="dingdan" value="<?=$ddid?>" />
               <!----返回地址---->
              <input type="hidden" name="ecmsfrom" value="/e/template/incfile/haixuan/pay.php?ddid=<?=$ddid?>&did=<?=$id?>">
              <input name=mid type=hidden id="mid" value=20>
              <ul>
                <input type="hidden" name="hai_id" value="<?=$id?>">
                <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选手姓名：</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_name" type="text" id="hai_name" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>联系电话:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_phone" type="text" id="hai_phone" value="" size="" required>
                    </td>
                  </tr>
                  
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛赛区:</td>
                    <td bgcolor='ffffff'><select name="hai_division" id="hai_division">
                      <option value="<?=$r[title]?>" selected><?=$r[title]?></option>
                    </select></td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选择分组:</td>
                    <td bgcolor='ffffff'>
                      <select name="hai_grouping" class="hai_grouping" id="hai_grouping">
                        <option value="请选择" selected>请选择</option>
                      </select>
                      <select name="hai_grouping1" class="hai_grouping2" id="hai_grouping2">
                        <option value="请选择">请选择</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>详细地址:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_address" type="text" id="hai_address" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>年龄:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_age" type="text" id="hai_age" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>所推荐的琴行(老师):</td>
                    <td bgcolor='ffffff'>
                    	
                      <input name="hai_mend" type="text" id="hai_mend" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>琴行(老师)电话:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_piano" type="text" id="hai_piano" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>参赛曲目:</td>
                    <td bgcolor='ffffff'>
                    	<!-- <input type="hidden" name="title" id="title" value="[!--title--]"> -->
                      <input name="hai_petition" type="text" id="hai_petition" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>上传视频:</td>
                    <td bgcolor='ffffff'>
                      <div class="uploadmain" style="80%">
                         <div class="shangchuan_biaodan" id="chose0">
                              <div id="chosevideo">上传视频</div>
                              <div id="divFileProgressContainer"></div>
                         </div>
                      </div>
                     <input type="hidden" name="title"  id="title" value="" size="45">
                     <!-- 标题：--> 
                     <input type="hidden" name="hai_photo" id="titlepic" value="" size="45">
                     <!--缩略图：-->
                     <input type="hidden" name="odownpath1" id="odownpath1" value="" size="45"><!-- 视频地址： -->   
                     <input type="hidden" name="hai_video" id="downpath1" value="" size="45"><!-- 下载地址： -->       
                     <input type="hidden" name="share" id="share" value="" size="45"><!-- 分享地址： -->
                     <br><input type="hidden" name="videoid" id="videoid" value="" size="45"><!-- 视频ID： -->
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛费用<?=$r[price]?>:</td>
                    <td bgcolor='ffffff'>
                    	<?php
                        	if($r[bitype]=="人民币"){
								echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ <i class='baomingfeinum'>$r[price]</i>元</span>";
							}elseif($r[bitype]=="新台幣"){
								echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ <i class='baomingfeinum'>$r[price]</i>元</span>";
							}
						?>
                    </td>
                  </tr>
                </table>
                <li>
                  <label></label><input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
                </li>
              </ul>
            </form>


        <?
        }elseif($r[hai_baotype]=="|图片|"){
        ?>
            <form name="add" class="haixuanbaoming1 imgbaoming" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'35');">
              <input type=hidden value=MAddInfo name=enews>
                <input type=hidden value=104 name=classid>
              <input name=id type=hidden id="id" value=> 
              <input name=mid type=hidden id="mid" value=35>
              <input name="bao_type" type="hidden" value="3"> 
              <input type="hidden" name="dingdan" value="<?=$ddid?>" />
               <!----返回地址---->
              <input type="hidden" name="ecmsfrom" value="/e/template/incfile/haixuan/pay.php?ddid=<?=$ddid?>&did=<?=$id?>">
              <input name=mid type=hidden id="mid" value=20>
              <ul>
                <input type="hidden" name="hai_id" value="<?=$id?>" >
                <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选手姓名：</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_name" type="text" id="hai_name" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>联系电话:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_phone" type="text" id="hai_phone" value="" size="" required>
                    </td>
                  </tr>
                  
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛赛区:</td>
                    <td bgcolor='ffffff'><select name="hai_division" id="hai_division">
                      <option value="<?=$r[title]?>" selected><?=$r[title]?></option>
                      <!-- <option value="台北">台北</option> -->
                    </select></td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选择分组:</td>
                    <td bgcolor='ffffff'>
                      <select name="hai_grouping" class="hai_grouping" id="hai_grouping">
                        <option value="请选择" selected>请选择</option>
                      </select>
                      <select name="hai_grouping2" class="hai_grouping2" id="hai_grouping2">
                        <option value="请选择">请选择</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>详细地址:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_address" type="text" id="hai_address" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>年龄:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_age" type="text" id="hai_age" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>所推荐的琴行(老师):</td>
                    <td bgcolor='ffffff'>
                      <!-- <input type="hidden" name="title" id="title" value="标题"> -->
                      <input name="hai_mend" type="text" id="hai_mend" value="" size="" required>
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>琴行(老师)电话:</td>
                    <td bgcolor='ffffff'>
                      <input name="hai_piano" type="text" id="hai_piano" value="" size="" required>
                    </td>
                  </tr>
<!--                  <tr>-->
<!--                    <td width='16%' height=25 bgcolor='ffffff'>图片主题:</td>-->
<!--                    <td bgcolor='ffffff'>-->
<!--                      <input name="hai_petition" type="text" id="hai_petition" value="" size="" required>-->
<!--                    </td>-->
<!--                  </tr>-->
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>个人照片:</td>
                    <td bgcolor='ffffff'>
                    <script type="text/javascript" src="/e/extend/uploadify/jquery.uploadify.min.js"></script>
                    <script type="text/javascript">
                            var picIndex=1;
                            $.format = function (source, params) {
                                if (arguments.length == 1)
                                    return function () {
                                        var args = $.makeArray(arguments);
                                        args.unshift(source);
                                        return $.format.apply(this, args);
                                    };
                                if (arguments.length > 2 && params.constructor != Array) {
                                    params = $.makeArray(arguments).slice(1);
                                }
                                if (params.constructor != Array) {
                                    params = [params];
                                }
                                $.each(params, function (i, n) {
                                    source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
                                });
                                return source;
                            };
                            function fileError(file, errorCode, errorMsg){
                                switch(errorCode) {
                                    case -100:
                                        alert("上传的文件数量已经超出系统限制！");
                                        break;
                                    case -110:
                                        alert("文件 ["+file.name+"] 大小超出系统限制！");
                                        break;
                                    case -120:
                                        alert("文件 ["+file.name+"] 大小异常！");
                                        break;
                                    case -130:
                                        alert("文件 ["+file.name+"] 类型不正确！");
                                        break;
                                }
                            }
                            $(function() {
                                $('#img_upload').uploadify({
                                    'formData'      	: {
                                        'classid' : '104',
                                        'filepass':'1469080627',
                                        'username':'admin',
                                        'userid':'1'

                                    },
                                    'swf'      : '/e/extend/uploadify/uploadify.swf',
                                    'uploader' : '/e/extend/uploadify/uploadify.php',
                                    //在浏览窗口底部的文件类型下拉菜单中显示的文本
                                    'buttonCursor':'hand',
                                    'buttonImage':'../extend/uploadify/button_images.png','width':99,'height':25,
                                    'fileTypeExts':'*.jpg;*.png;*.gif',
                                    //上传文件的大小限制
                                    'fileSizeLimit':'10MB',
                                    //上传数量
                                    'multi':true,
                                    'queueSizeLimit' : 100,
                                    //文件较多，时间设大一些
                                    'successTimeout':120,
                                    //返回一个错误，选择文件的时候触发
                                    'onSelectError':fileError,
                                    //检测FLASH失败调用
                                    'onFallback':function(){
                                        alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
                                    },
                                    //上传到服务器，服务器返回相应信息到data里
                                    'onUploadSuccess':function(file, data, response){
                                        var obj=jQuery.parseJSON(data);
                                        if(obj.error){
                                            alert("上传出现错误！");
                                        }else{
                                            addPicLine(picIndex);
                                            $("#mbigpic"+picIndex).val('http://www.greattone.net'+obj.big);
                                            $("#mpicname"+picIndex).val(obj.name);
                                            if(obj.small){
                                                $("#msmallpic"+picIndex).val('http://www.greattone.net'+obj.small);
                                                $("#preImg"+picIndex).attr("src",obj.small);
                                            }else{
                                                $("#msmallpic"+picIndex).val('http://www.greattone.net'+obj.big);
                                                $("#preImg"+picIndex).attr("src",obj.big);
                                            }
                                            picIndex++;

                                        }

                                    },
                                    'onUploadStart': function (file) {
                                        $("#img_upload").uploadify("settings", "formData", {'mrnd':'',
                                            'addwater':$('#addwater').is(':checked'),
                                            'mcreatespic':$('#mcreatespic').is(':checked'),
                                            'mcreatespicwidth':$('#mcreatespicwidth').val(),
                                            'mcreatespicheight':$('#mcreatespicheight').val()});
                                        //在onUploadStart事件中，也就是上传之前，把参数写好传递到后台。
                                    }

                                });
                                picIndex=1;

                            });

                        </script>
                        <table  width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>

                            <td height="25" style="display:none">
                            <input type="checkbox" name="addwater" id="addwater" value="1">加水印&nbsp;
                              <input type="checkbox" name="mcreatespic" id="mcreatespic" value="1" onClick="if(this.checked){setmcreatespic.style.display='';}else{setmcreatespic.style.display='none';}" checked>生成缩图
                            <span id="setmcreatespic" style="display=none">：<input type=text name="mcreatespicwidth" id="mcreatespicwidth" size=4 value="200">*<input type=text name="mcreatespicheight" id="mcreatespicheight" size=4 value="200">(宽*高)</span> </td>
                          </tr>
                           <tr>
                            <!-- <td></td> -->
                            <td height="25">
                            <div class="upload_img_btn">上传图片文件
                            <input type="text" id="img_upload" name="img_upload" style="width:265px"/> </td></div>
                          </tr>
                          <tr>
                            <!-- <td></td> -->
                            <td>
                          <div id="picBefore" style="clear:both"></div>

                             <textarea id="picTable" style="display:none;">
                                <table class="tupianshangchuanWrap" id="picTable{0}" border="0" style="float:left;">
                                    <tr>
                                        <td>
                                            <div style="padding-top: 2px">&lt;textarea style="width:200px;height:60px;" name="mpicname[]" id="mpicname{0}" maxlength="255"&gt;&lt;/textarea&gt;</div>
                                          <div class="fatie_img_view" >
                                          <!-- 缩略： --><input type="text" style="display:none;" id="msmallpic{0}" name="msmallpic[]" style="width:160px" ondblclick="SpOpenChFile(1,'msmallpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#msmallpic{0}').val());"/>
                                          <!-- 大图： --><input type="text" style="display:none;" id="mbigpic{0}" class="vbiao1" name="mbigpic[]" style="width:160px"  ondblclick="SpOpenChFile(1,'mbigpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#mbigpic{0}').val());"/>
                                                <a class="fatie_img_delect" href="javascript:void(0);" onclick="$('#picTable{0}').remove();" class="pn-opt">删除</a></div>
                                            <div>
                                        </td>
                                        <td><img id="preImg{0}" class="PreImgGroup" alt="预览" noResize="true" style="width:110px;height:110px;background-color:#ccc;border:1px solid #333"/></td>
                                    </tr>
                                </table>
                            </textarea>
                            <script type="text/javascript">
                                var picTpl = $.format($("#picTable").val());
                                function addPicLine(picIndex) {
                                    $('#picBefore').before(picTpl(picIndex));
                                }
                                $(function() {
                                  // 把插件中缩略图的value获取到并传送到input
                                });
                            </script>
                            <input type="hidden" class="vbiao" name="hai_photo" ><!-- 获取最后一张图片-->
                            </td>
                          </tr>

                        </table>

                    </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>个人简历:</td>
                      <td><textarea name="smalltext" id="smalltext" cols="30" rows="10" required></textarea></td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛费用:</td>
                    <td bgcolor='ffffff'>
                     <?php
                        	if($r[bitype]=="人民币"){
								echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ <i class='baomingfeinum'>$r[price]</i>元</span>";
							}elseif($r[bitype]=="新台幣"){
								echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ <i class='baomingfeinum'>$r[price]</i>元</span>";
							}
					?>
                    </td>
                  </tr>
                </table>
                <li>
                  <label></label>
                  <input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
                  <script type="text/javascript">
                    $(function() {
                      // 限制上传图片之后才能提交，就是判断必须有预览图
                      $('.imgbaoming').submit(function(event) {
                        // alert(1);
                        var PreImgSrc = $('.PreImgGroup').eq(0).attr('src');
                            // alert(PreImgSrc);
                            // alert(typeof PreImgSrc); 
                        if (PreImgSrc) {
                            $('.vbiao').val('http://www.greattone.net'+PreImgSrc);
                          }else{
                            alert('请上传图片之后再提交报名！')
                            return false;
                          };
                      });
                    });
                  </script>
                </li>
              </ul>
            </form>
        <?
        }elseif($r[hai_baotype]=="|视频|图片|"){
        ?>
		<div class="baomingSelect clearfix" >
            <div class="baomingchange change2 on f-l-l">上传图片报名</div>
          <div class="baomingchange change1  f-l-l">上传视频报名</div>
        </div>
      <!--图片报名开始····················································-->
      <form name="add" class="haixuanbaoming1 imgbaoming" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'35');">
          <input type=hidden value=MAddInfo name=enews><input type=hidden value=104 name=classid>
          <input name=id type=hidden id="id" value=>
          <input name=mid type=hidden id="mid" value=35>
          <input name="bao_type" type="hidden" value="3">
          <input type="hidden" name="dingdan" value="<?=$ddid?>" />
          <!----返回地址---->
          <input type="hidden" name="ecmsfrom" value="/e/template/incfile/haixuan/pay.php?ddid=<?=$ddid?>&did=<?=$id?>">
          <input name=mid type=hidden id="mid" value=20>
          <ul>
              <input type="hidden" name="hai_id" value="<?=$id?>">
              <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>选手姓名：</td>
                      <td bgcolor='ffffff'>
                          <input name="hai_name" type="text" id="hai_name" value="" size="" required>
                      </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>联系电话:</td>
                      <td bgcolor='ffffff'>
                          <input name="hai_phone" type="text" id="hai_phone" value="" size="" required>
                      </td>
                  </tr>

                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>比赛赛区:</td>
                      <td bgcolor='ffffff'><select name="hai_division" id="hai_division">
                              <option value="<?=$r[title]?>" selected><?=$r[title]?></option>
                              <!-- <option value="台北">台北</option> -->
                          </select></td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>选择分组:</td>
                      <td bgcolor='ffffff'>
                          <select name="hai_grouping" class="hai_grouping" id="hai_grouping">
                              <option value="请选择" selected>请选择</option>
                          </select>
                          <select name="hai_grouping2" class="hai_grouping2" id="hai_grouping2">
                              <option value="请选择">请选择</option>
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>详细地址:</td>
                      <td bgcolor='ffffff'>
                          <input name="hai_address" type="text" id="hai_address" value="" size="" required>
                      </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>年龄:</td>
                      <td bgcolor='ffffff'>
                          <input name="hai_age" type="text" id="hai_age" value="" size="" required>
                      </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>所推荐的琴行(老师):</td>
                      <td bgcolor='ffffff'>
                          <!-- <input type="hidden" name="title" id="title" value="标题"> -->
                          <input name="hai_mend" type="text" id="hai_mend" value="" size="" required>
                      </td>
                  </tr>
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>琴行(老师)电话:</td>
                      <td bgcolor='ffffff'>
                          <input name="hai_piano" type="text" id="hai_piano" value="" size="" required>
                      </td>
                  </tr>
                  <!--                  <tr>-->
                  <!--                      <td width='16%' height=25 bgcolor='ffffff'>图片主题:</td>-->
                  <!--                      <td bgcolor='ffffff'>-->
                  <!--                          <input name="hai_petition" type="text" id="hai_petition" value="" size="" required>-->
                  <!--                      </td>-->
                  <!--                  </tr>-->
                  <tr>
                      <td width='16%' height=25 bgcolor='ffffff'>个人照片:</td>
                      <td bgcolor='ffffff'>
                          <script type="text/javascript" src="/e/extend/uploadify/jquery.uploadify.min.js"></script>
                          <script type="text/javascript">
                              var picIndex=1;
                              $.format = function (source, params) {
                                  if (arguments.length == 1)
                                      return function () {
                                          var args = $.makeArray(arguments);
                                          args.unshift(source);
                                          return $.format.apply(this, args);
                                      };
                                  if (arguments.length > 2 && params.constructor != Array) {
                                      params = $.makeArray(arguments).slice(1);
                                  }
                                  if (params.constructor != Array) {
                                      params = [params];
                                  }
                                  $.each(params, function (i, n) {
                                      source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
                                  });
                                  return source;
                              };
                              function fileError(file, errorCode, errorMsg){
                                  switch(errorCode) {
                                      case -100:
                                          alert("上传的文件数量已经超出系统限制！");
                                          break;
                                      case -110:
                                          alert("文件 ["+file.name+"] 大小超出系统限制！");
                                          break;
                                      case -120:
                                          alert("文件 ["+file.name+"] 大小异常！");
                                          break;
                                      case -130:
                                          alert("文件 ["+file.name+"] 类型不正确！");
                                          break;
                                  }
                              }
                              $(function() {
                                  $('#img_upload').uploadify({
                                      'formData'      	: {
                                          'classid' : '104',
                                          'filepass':'1469080627',
                                          'username':'admin',
                                          'userid':'1'

                                      },
                                      'swf'      : '/e/extend/uploadify/uploadify.swf',
                                      'uploader' : '/e/extend/uploadify/uploadify.php',
                                      //在浏览窗口底部的文件类型下拉菜单中显示的文本
                                      'buttonCursor':'hand',
                                      'buttonImage':'../extend/uploadify/button_images.png','width':99,'height':25,
                                      'fileTypeExts':'*.jpg;*.png;*.gif',
                                      //上传文件的大小限制
                                      'fileSizeLimit':'10MB',
                                      //上传数量
                                      'multi':true,
                                      'queueSizeLimit' : 100,
                                      //文件较多，时间设大一些
                                      'successTimeout':120,
                                      //返回一个错误，选择文件的时候触发
                                      'onSelectError':fileError,
                                      //检测FLASH失败调用
                                      'onFallback':function(){
                                          alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
                                      },
                                      //上传到服务器，服务器返回相应信息到data里
                                      'onUploadSuccess':function(file, data, response){
                                          var obj=jQuery.parseJSON(data);
                                          if(obj.error){
                                              alert("上传出现错误！");
                                          }else{
                                              addPicLine(picIndex);
                                              $("#mbigpic"+picIndex).val('http://www.greattone.net'+obj.big);
                                              $("#mpicname"+picIndex).val(obj.name);
                                              if(obj.small){
                                                  $("#msmallpic"+picIndex).val('http://www.greattone.net'+obj.small);
                                                  $("#preImg"+picIndex).attr("src",obj.small);
                                              }else{
                                                  $("#msmallpic"+picIndex).val('http://www.greattone.net'+obj.big);
                                                  $("#preImg"+picIndex).attr("src",obj.big);
                                              }
                                              picIndex++;

                                          }

                                      },
                                      'onUploadStart': function (file) {
                                          $("#img_upload").uploadify("settings", "formData", {'mrnd':'',
                                              'addwater':$('#addwater').is(':checked'),
                                              'mcreatespic':$('#mcreatespic').is(':checked'),
                                              'mcreatespicwidth':$('#mcreatespicwidth').val(),
                                              'mcreatespicheight':$('#mcreatespicheight').val()});
                                          //在onUploadStart事件中，也就是上传之前，把参数写好传递到后台。
                                      }

                                  });
                                  picIndex=1;

                              });

                          </script>
                          <table  width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>

                                  <td height="25" style="display:none">
                                      <input type="checkbox" name="addwater" id="addwater" value="1">加水印&nbsp;
                                      <input type="checkbox" name="mcreatespic" id="mcreatespic" value="1" onClick="if(this.checked){setmcreatespic.style.display='';}else{setmcreatespic.style.display='none';}" checked>生成缩图
                                      <span id="setmcreatespic" style="display=none">：<input type=text name="mcreatespicwidth" id="mcreatespicwidth" size=4 value="200">*<input type=text name="mcreatespicheight" id="mcreatespicheight" size=4 value="200">(宽*高)</span> </td>
                              </tr>
                              <tr>
                                  <!-- <td></td> -->
                                  <td height="25">
                                      <div class="upload_img_btn">上传图片文件
                                          <input type="text" id="img_upload" name="img_upload" style="width:265px"/> </td></div>
            </tr>
            <tr>
                <!-- <td></td> -->
                <td>
                    <div id="picBefore" style="clear:both"></div>

                    <textarea id="picTable" style="display:none;">
                                            <table class="tupianshangchuanWrap" id="picTable{0}" border="0" style="float:left;">
                                                <tr>
                                                    <td>
                                                        <div style="padding-top: 2px">&lt;textarea style="width:200px;height:60px;" name="mpicname[]" id="mpicname{0}" maxlength="255"&gt;&lt;/textarea&gt;</div>
                                                      <div class="fatie_img_view" >
                                                      <!-- 缩略： --><input type="text" style="display:none;" id="msmallpic{0}" name="msmallpic[]" style="width:160px" ondblclick="SpOpenChFile(1,'msmallpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#msmallpic{0}').val());"/>
                                                          <!-- 大图： --><input type="text" style="display:none;" id="mbigpic{0}" class="vbiao1" name="mbigpic[]" style="width:160px"  ondblclick="SpOpenChFile(1,'mbigpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#mbigpic{0}').val());"/>
                                                            <a class="fatie_img_delect" href="javascript:void(0);" onclick="$('#picTable{0}').remove();" class="pn-opt">删除</a></div>
                                                        <div>
                                                    </td>
                                                    <td><img id="preImg{0}" class="PreImgGroup" alt="预览" noResize="true" style="width:110px;height:110px;background-color:#ccc;border:1px solid #333"/></td>
                                                </tr>
                                            </table>
                                        </textarea>
                    <script type="text/javascript">
                        var picTpl = $.format($("#picTable").val());
                        function addPicLine(picIndex) {
                            $('#picBefore').before(picTpl(picIndex));
                        }
                        $(function() {
                            // 把插件中缩略图的value获取到并传送到input
                        });
                    </script>
                    <input type="hidden" class="vbiao" name="hai_photo" ><!-- 获取最后一张图片-->
                </td>
            </tr>

            </table>

            </td>
            </tr>
            <tr>
                <td width='16%' height=25 bgcolor='ffffff'>个人简历:</td>
                <td><textarea name="smalltext" id="smalltext" cols="30" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td width='16%' height=25 bgcolor='ffffff'>比赛费用:</td>
                <td bgcolor='ffffff'>
                    <?php
                    if($r[bitype]=="人民币"){
                        echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ <i class='baomingfeinum'>$r[price]</i>元</span>";
                    }elseif($r[bitype]=="新台幣"){
                        echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ <i class='baomingfeinum'>$r[price]</i>元</span>";
                    }
                    ?>
                </td>
            </tr>
            </table>
            <li>
                <label></label>
                <input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
                <script type="text/javascript">
                    $(function() {
                        // 限制上传图片之后才能提交，就是判断必须有预览图
                        $('.imgbaoming').submit(function(event) {
                            // alert(1);
                            var PreImgSrc = $('.PreImgGroup').eq(0).attr('src');
                            // alert(PreImgSrc);
                            // alert(typeof PreImgSrc);
                            if (PreImgSrc) {
                                $('.vbiao').val('http://www.greattone.net'+PreImgSrc);
                            }else{
                                alert('请上传图片之后再提交报名！')
                                return false;
                            };
                        });
                    });
                </script>
            </li>
            </ul>
        </form>
    <!--图片报名结束·1········································································-->
        <!--视频报名······················································-->
        <form class="haixuanbaoming haixuanbaoming1 videobaoming" name="add" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'20');">
        <input type=hidden value=MAddInfo name=enews> <input type=hidden value=73 name=classid>
        <input name=id type=hidden id="id" value=>
        <input name=bao_type type=hidden id="idd" value="3">
        <input type="hidden" name="dingdan" value="<?=$ddid?>" />
        <!----返回地址---->
        <input type="hidden" name="ecmsfrom" value="/e/template/incfile/haixuan/pay.php?ddid=<?=$ddid?>&did=<?=$id?>">
        <input name=mid type=hidden id="mid" value=20>
        <ul>
            <input type="hidden" name="hai_id" value="<?=$id?>">
            <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选手姓名：</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_name" type="text" id="hai_name" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>联系电话:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_phone" type="text" id="hai_phone" value="" size="" required>
                    </td>
                </tr>

                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛赛区:</td>
                    <td bgcolor='ffffff'><select name="hai_division" id="hai_division">
                            <option value="<?=$r[title]?>" selected><?=$r[title]?></option>
                        </select></td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>选择分组:</td>
                    <td bgcolor='ffffff'>
                        <select name="hai_grouping" class="hai_grouping" id="hai_grouping">
                            <option value="请选择" selected>请选择</option>
                        </select>
                        <select name="hai_grouping1" class="hai_grouping2" id="hai_grouping2">
                            <option value="请选择">请选择</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>详细地址:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_address" type="text" id="hai_address" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>年龄:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_age" type="text" id="hai_age" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>所推荐的琴行(老师):</td>
                    <td bgcolor='ffffff'>

                        <input name="hai_mend" type="text" id="hai_mend" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>琴行(老师)电话:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_piano" type="text" id="hai_piano" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>参赛曲目:</td>
                    <td bgcolor='ffffff'>
                        <!-- <input type="hidden" name="title" id="title" value="[!--title--]"> -->
                        <input name="hai_petition" type="text" id="hai_petition" value="" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>上传视频:</td>
                    <td bgcolor='ffffff'>
                        <div class="uploadmain" style="80%">
                                 <div class="shangchuan_biaodan" id="chose0">
                                          <div id="chosevideo">上传视频</div>
                                          <div id="divFileProgressContainer"></div>
                                     </div>
                        </div>
                        <input type="hidden" name="title"  id="title" value="" size="45">
                        <!-- 标题：-->
                        <input type="hidden" name="hai_photo" id="titlepic" value="" size="45">
                        <!--缩略图：-->
                        <input type="hidden" name="odownpath1" id="odownpath1" value="" size="45"><!-- 视频地址： -->
                        <input type="hidden" name="hai_video" id="downpath1" value="" size="45"><!-- 下载地址： -->
                        <input type="hidden" name="share" id="share" value="" size="45"><!-- 分享地址： -->
                        <br><input type="hidden" name="videoid" id="videoid" value="" size="45"><!-- 视频ID： -->
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛费用<?=$$r[price]?>:</td>
                    <td bgcolor='ffffff'>
                        <?php
                        if($r[bitype]=="人民币"){
                            echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ <i class='baomingfeinum'>$r[price]</i>元</span>";
                        }elseif($r[bitype]=="新台幣"){
                            echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ <i class='baomingfeinum'>$r[price]</i>元</span>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <li>
                <label></label><input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
            </li>
        </ul>
    </form>
        <!--视频报名结束······················································-->

    <?
    }
    ?>
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