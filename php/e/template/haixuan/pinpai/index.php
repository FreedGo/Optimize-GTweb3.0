<?php
require('../../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../../class/db_sql.php'); //引入数据库操作文件 
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
	if(empty($userid)){
		$user=$empire->fetch1("select * from phome_enewsmember a left join phome_enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5 order by b.userid desc limit 1");
	} 
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
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<!-- <script type="text/javascript" src="/js/webuploader.min.js" ></script> -->
<!--<script type="text/javascript" src="/js/upload.js" ></script>-->
</head>
<style type="text/css">
    .f-l-l{
        float: left;
    }
    .altConWarp{
        position: relative;
        left: 200px;
        display: none;
        border:#ccc solid 1px;
        overflow: hidden;
    }
    .openTlePicUp{
        width:136px;
        height:36px;
        background-color: #CD5D45;
        color: #fff;
        border-radius:3px;
        text-align: center;
        cursor: pointer;

    }
    .tlePicPre{
        width:200px;
        height: auto;
        border-radius: 3px;
        overflow: hidden;
        margin-left:20px;
        border:#ccc solid 1px;
        display: none;
    }
    .altConWarp{
        width:530px;
        height:400px;
        background-color: #eee;
    }

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
<script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.openTlePicUp').click(function () {
            $('.altConWarp').slideToggle(300);
        })
    });
    window.onload=function(){
        // xiuxiu.setLaunchVars("cropPresets", "5:4");
        xiuxiu.setLaunchVars("cropPresets", "311:230");//设定裁剪尺寸为310230
        xiuxiu.setLaunchVars("quality", "80");//设定图片质量为80
        xiuxiu.setLaunchVars("avatarPreview", {visible:false});  //设定右侧头像预览不可用
        xiuxiu.setLaunchVars("facialMenu", {visible:false});  //设定右侧头像预览不可用
        /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
        xiuxiu.embedSWF("altContent",5,"530","400","altContent");
        //修改为您自己的图片上传接口
        xiuxiu.setUploadURL("http://www.greattone.net/d/images/hai_pinpai/image_upload_form.php");
        xiuxiu.setUploadType(2);
        xiuxiu.setUploadDataFieldName("Filedata");
        xiuxiu.onInit = function ()
        {
            xiuxiu.loadPhoto("http://www.greattone.net/images/stand.jpg");
        }
        xiuxiu.onUploadResponse = function (data)
        {
            var reUrl = 'http://www.greattone.net/d/images/hai_pinpai'+data;
            console.log(data); //可以开启调试
            $('.tlePicPre').attr('src',reUrl).show();//预览图
            $('.tlePicVal').val(reUrl);       //存储图片路径
            $('.openTlePicUp').trigger('click');//模拟点击，让框消失
        }
    }
</script>
</head>
<body>
<?
include '../../header_1.php';
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
          <h2>十大乐器品牌报名表</h2>
          <p>说明：报名上传图片形式来报名，以下信息将直接录入比赛档案，关系到奖品发放，请务必填写真实信息</p>
        </div>
        <form name="add" class="haixuanbaoming1 imgbaoming" style="display:block" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onSubmit="return EmpireCMSQInfoPostFun(document.add,'35');">
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
                    <td width='16%' height=25 bgcolor='ffffff'>品牌名称:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_name" type="text" id="hai_name" value="<?=$user[username]?>" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>创立国家:</td>
                    <td bgcolor='ffffff'>
                        <input name="hai_address" type="text" id="hai_address" value="<?=$user[company]?>" size="" required>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>乐器分类:</td>
                    <td bgcolor='ffffff'>
                   <input class="pinpai-baoming-select" name="pintype[]" type="checkbox" checked value="钢琴">钢琴
                   <input class="pinpai-baoming-select" name="pintype[]" type="checkbox" value="提琴">提琴
                   <input class="pinpai-baoming-select" name="pintype[]" type="checkbox" value="吉他">吉他
                   <input class="pinpai-baoming-select" name="pintype[]" type="checkbox" value="其它">其它
                    </td>
                </tr>
                <tr >
                    <td width='16%' height=25 bgcolor='ffffff'>标题图片:</td>
                    <td bgcolor='ffffff' class="clearfix">
                        <span class="openTlePicUp f-l-l">点击上传</span>
                        <img class="tlePicPre f-l-l" src="" alt="">
                        <input name="hai_photo" class="tlePicVal" type="hidden">
                    </td>
                </tr>
            </table>
                  <div class="altConWarp">
                      <div id="altContent">
                      </div>
                      加载中。。。
                  </div>
            <table class="baomingMsgTable" width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>上传内容图片:</td>
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
                                    <div class="upload_img_btn">上传图片文件<input type="text" id="img_upload" name="img_upload" style="width:265px"/></div>
                                </td>
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
                                    <!--<input type="hidden" class="vbiao" name="hai_photo" >--> <!-- 获取最后一张图片-->
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>品牌描述:</td>
                    <td><textarea name="smalltext" id="smalltext" cols="30" rows="10" required></textarea></td>
                </tr>
                <?php
                    if($r[price]!=0){
                ?>
                <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>比赛费用<?=$$r[price]?>:</td>
                    <td bgcolor='ffffff'>
                        <?php
                        if($r[bitype]=="人民币"){
                            echo "<span class='baomingfei' style='font-weight: normal;'>人民币：¥ $r[price]元</span>";
                        }elseif($r[bitype]=="新台幣"){
                            echo "<span class='baomingfei' style='font-weight: normal;'>新台幣：$ $r[price]元</span>";
                        }
                        ?>
                    </td>
                </tr>
                <?
                    }
                ?>

            </table>
            <li>
              <label></label>
              <input type='submit' name='Submit' value='提交' class="baomingSubmit button blue medium">
              <script type="text/javascript">
                $(function() {
                  // 限制上传图片之后才能提交，就是判断必须有预览图
                  $('.imgbaoming').submit(function(event) {
                    // alert(1);
                    var PreImgSrc = $('.PreImgGroup').eq(0).attr('src'),//内容缩略图
                        PreTleVal = $('.tlePicVal').val();
                      if (!PreTleVal){
                          alert('请上传封面图片之后再提交报名！');
                          return false;
                      };
                        // alert(PreImgSrc);
                        // alert(typeof PreImgSrc);

                    if (PreImgSrc) {
                        //$('.vbiao').val('www.greattone.net'+PreImgSrc);
//                        $('.vbiao').val('http://www.greattone.net'+PreImgSrc);
                      }else{
                        alert('请上传内容图片之后再提交报名！')
                        return false;
                      };
                  });
                });
              </script>
            </li>

          </ul>

        </form>

     </div>
    <!-- 报名框结束 -->
  </div>
  <!-- 中间内容部分结束·················································· -->
</div>
<!-- ····························中间结构结束·································· --> 
<!-- 底部结构开始································································ -->
<?
include '../../footer.php';
?>
<!-- 底部结构开始································································ -->
</body>
</html>
<?php
$empire=null; //注消操作类变量
?>