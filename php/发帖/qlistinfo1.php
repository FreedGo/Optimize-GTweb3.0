<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,isurl,titleurl,isqf,havehtml,istop,isgood,firsttitle,ismember,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlefont,titlepic,title from ".$infotb." where ".$yhadd."userid='$user[userid]' and ismember=1".$add." order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];



$public_diyr['pagetitle']='发布文章';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="singleMiddle">

<div class="fatieWrap">
			<h2>分享快乐，留住感动！</h2>
            
			<div class="fenfa clearfix">
				<ul class="clearfix">
					<li class="on"><i class="iconfont">&#xe62c;</i>视频</li>
					<li><i class="iconfont">&#xe667;</i>音乐</li>
					<li><i class="iconfont">&#xe668;</i>图片</li>
				</ul>

			</div>
			
			<!-- 视频发帖·················································· -->
			<div class="fatie1">
 <form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'14');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=11 name=classid> 
              <input name=id type=hidden id="id" value=> <input type=hidden value="1453179768" name=filepass>
              <input name=mid type=hidden id="mid" value=14>
                            <!----返回地址---->
              <input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang">
<!--临时视频随机图-->
<?
	$sui = rand(1, 5 );
	if($sui==1){
?>
		<input type="hidden" name="titlepic" value="/images/video1.jpg">
<?	
	}elseif($sui==2){
?>
		<input type="hidden" name="titlepic" value="/images/video2.jpg">	
<?
	}elseif($sui==3){
?>
		<input type="hidden" name="titlepic" value="/images/video3.jpg">	
<?
	}elseif($sui==4){
?>
		<input type="hidden" name="titlepic" value="/images/video4.jpg">
<?	
	}elseif($sui==5){
?>	
		<input type="hidden" name="titlepic" value="/images/video5.jpg">
<?
	}
?>
					<div class="biaoti">
                    <!--<input type=hidden name=ecmsfrom value="/e/DoInfo/ListInfo.php?mid=10">-->
                    <input name="title" type="text" size="42" placeholder="请输入视频标题" required>
					</div>
					
                    
					<div class="shangchuan">
                    	<span>上传视频文件：</span>
                        
						<input type="file" name="shipinfile" onChange="checkExt1(this)"/>
						<script > 
						var checkExt1=function(file) {
						    if(!(/(?:mp4)$/i.test(file.value))) {
						        alert("请上传MP4格式视频");
						        if(window.ActiveXObject) {//for IE
						            file.select();//select the file ,and clear selection
						            document.selection.clear();
						        } else if(window.opera) {//for opera
						            file.type="text";file.type="file";
						        } else file.value="";//for FF,Chrome,Safari
						    } else {
						        
						    }
						};
						</script>
					</div><div class="biaotitupian">
						<!--<span>上传标题图片:</span>-->
						
							<!--<input type="file" name="titlepicfile" size="45">-->
                            <input type="hidden" name="titlepicfile" value="" />
<!--                            <input type="text" name="titlepicfile" placeholder="请输入视频标题" required>
-->						

					</div>
				  <div class="wenzi">
					<textarea  id="test" name="smalltext" onKeyUp="textLimitCheck(this, 3000);"></textarea>  
				<br/>
				(限 3000 个字符)				</div>
                
					<div class="tijiaotiezi">
						<?
                        	if($aihao=="无" || $aihao=="null"){
								?>
                       	完善资料后才能发帖<input type="submit" name='Submit' value="发布">
                                <?
							}else{
						?>
                       <input type="submit" name='Submit' value="发布">
                        <?
                      	}
					    ?>
					   </div>

</form>
			
 <!--<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'14');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=11 name=classid> 
              <input name=id type=hidden id="id" value=> <input type=hidden value="1453179768" name=filepass> 
              <input name=mid type=hidden id="mid" value=14>
              <ul>
                <table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>标题</td>
                    <td bgcolor='ffffff'><input name="title" type="text" size="42" value="">
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>发布时间</td>
                    <td bgcolor='ffffff'>
                      <input name="newstime" type="text" value="2016-01-19 13:02:48">                      <input type=button name=button value="设为当前时间" onclick="document.add.newstime.value='2016-01-19 13:02:48'"></td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>视频上传</td>
                    <td bgcolor='ffffff'>
                      <input type="file" name="shipinfile" size="45">
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>标题图片</td>
                    <td bgcolor='ffffff'><input type="file" name="titlepicfile" size="45">
                    </td>
                  </tr>
                  <tr>
                    <td width='16%' height=25 bgcolor='ffffff'>视频简介</td>
                    <td bgcolor='ffffff'><textarea name="smalltext" cols="80" rows="10" id="smalltext"></textarea>
                    </td>
                  </tr>
                </table>
                <li><label></label><input type='submit' name='Submit' value='发布文章' class="button blue medium"></li>
            	</ul>
</form>-->           
            </div>
		<!-- 视频发帖结束·················································· -->


		<!-- 音乐发帖·················································· -->
			
            <div class="fatie1">
<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'11');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=13 name=classid> 
<input name=id type=hidden id="id" value=> <input type=hidden value="1453112578" name=filepass> 
<input name=mid type=hidden id="mid" value=11>
 <!----返回地址---->
              <input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang">
					<div class="biaoti">
						<input type="text" name="title" placeholder="请输入音乐标题" required>
					</div>
					
						<!--<span>上传标题图片</span>-->
						<!--<input type="file" name="titlepicfile" size="45">-->
                        <?
                        $r=$empire->fetch1("select userpic from {$dbtbpre}enewsmemberadd where userid='$userid'");
						?>
						<input type=hidden name="titlepic" value="<?=$r[userpic]?>">
					
                    
					<div class="shangchuan">
						
						<span>上传音乐文件：</span>
						<input type="file"  name="yinyuefile" onChange="checkExt2(this)"/>
						
						<script > 
						var checkExt2=function(file) {
						    if(!(/(?:mp3)$/i.test(file.value))) {
						        alert("请上传MP3格式音乐");
						        if(window.ActiveXObject) {//for IE
						            file.select();//select the file ,and clear selection
						            document.selection.clear();
						        } else if(window.opera) {//for opera
						            file.type="text";file.type="file";
						        } else file.value="";//for FF,Chrome,Safari
						    } else {
						        
						    }
						};
						</script>
					</div>
                    <div class="biaotitupian"></div>
				  <div class="wenzi">
					<textarea  id="test" name="smalltext" onKeyUp="textLimitCheck(this, 3000);"></textarea>  
				<br/>
				(限 3000 个字符)				</div>
					<div class="tijiaotiezi">
						<?
                        	if($aihao="无" || $aihao=" "){
								?>
                       	完善资料后才能发帖<input type="submit" name='Submit' value="发布">
                                <?
							}else{
						?>
                       <input type="submit" name='Submit' value="发布">
                        <?
                      	}
					    ?>
					</div>

				</form>
			</div>
           
		<!-- 音乐发帖结束·················································· -->
		<!-- 图片发帖·················································· -->
			<div class="fatie1">

<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'10');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=12 name=classid> 
 <!----返回地址---->
              <input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang">
              <input name=id type=hidden id="id" value=> 
              <input name=mid type=hidden id="mid" value=10>
              <ul>
                <table class='news-table tupianbianji' cellspacing='0'>
                  <tr>
                    <td nowrap='nowrap' width="80"><label>标题：</label></td>
                    <td><input name="title" type="text" size="42" value="">                    </td>
                  </tr>
                  <tr>
                    <td nowrap='nowrap'><label>图片集：</label></td>
                    <td>
                  </tr>
                </table>
                <table class='news-table' cellspacing='0'><tr><script type="text/javascript" src="../extend/uploadify/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../extend/uploadify/jquery.uploadify.min.js"></script>
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
			'classid' : '12',
			'filepass':'1454391448',
			'username':'admin',
			'userid':'1'			
			
			},
            'swf'      : '../extend/uploadify/uploadify.swf',
            'uploader' : '../extend/uploadify/uploadify.php',
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
                    $("#mbigpic"+picIndex).val(obj.big);
                    $("#mpicname"+picIndex).val(obj.name);
					if(obj.small){
						$("#msmallpic"+picIndex).val(obj.small);
						$("#preImg"+picIndex).attr("src",obj.small);
					}else{
						$("#msmallpic"+picIndex).val(obj.big);
						$("#preImg"+picIndex).attr("src",obj.big);
					}
                    picIndex++;
                    // 把插件中缩略图的value获取到并传送到input
                    $('.vbiao').val(obj.small);
                    console.log(obj.small);
                }
					
            }, 
			'onUploadStart': function (file) {
                    $("#img_upload").uploadify("settings", "formData", {'mrnd':'wiVMD3nQVqJvtcVheETC',
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
      <input type="checkbox" name="mcreatespic" id="mcreatespic" value="1" onclick="if(this.checked){setmcreatespic.style.display='';}else{setmcreatespic.style.display='none';}" checked>生成缩图
	  <span id="setmcreatespic" style="display=none">：<input type=text name="mcreatespicwidth" id="mcreatespicwidth" size=4 value="200">*<input type=text name="mcreatespicheight" id="mcreatespicheight" size=4 value="200">(宽*高)</span> </td>
  </tr>
   <tr>
   	<td></td>
    <td height="25">
	<input type="text" id="img_upload" name="img_upload" style="width:265px"/> </td>
  </tr>
  <tr> 
  	<td></td>
    <td>
	<div id="picBefore" style="clear:both"></div>

     <textarea id="picTable" style="display:none;">
                                <table class="tupianshangchuanWrap" id="picTable{0}" border="0" style="float:left;">
                                    <tr>
                                        <td>
                                            <div style="display:none;">
											缩略：<input type="text" id="msmallpic{0}" name="msmallpic[]" style="width:160px" ondblclick="SpOpenChFile(1,'msmallpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#msmallpic{0}').val());"/><br>
											大图：<input type="text" id="mbigpic{0}" class="vbiao1" name="mbigpic[]" style="width:160px"  ondblclick="SpOpenChFile(1,'mbigpic{0}');" onfocus="$('#preImg{0}').attr('src',$('#mbigpic{0}').val());"/>
                                                <a href="javascript:void(0);" onclick="$('#picTable{0}').remove();" class="pn-opt">删除</a></div>
                                            <div>
                                            <div style="padding-top: 2px">&lt;textarea style="width:200px;height:60px;" name="mpicname[]" id="mpicname{0}" maxlength="255"&gt;&lt;/textarea&gt;</div>
                                        </td>
                                        <td><img id="preImg{0}" alt="预览" noResize="true" style="width:110px;height:110px;background-color:#ccc;border:1px solid #333"/></td>
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

<input type="hidden" class="vbiao" name="titlepic" >


</td>
  </tr>
  <tr>
  	<td width="80">内容：</td>
  	<td><textarea name="" id="smalltext" cols="30" rows="10"></textarea></td>
  </tr>
</table></td></tr><tr><td nowrap='nowrap'></td></tr></table>    <li><label></label><input type='submit' name='Submit' value='发布文章' class="button blue medium"></li>
            	</ul>
</form>
			</div>
			<script type="text/javascript">
				// 点击视频音乐图片切换发帖面板
			var iVideo;
			$('.fatie1:gt(0)').hide();
			console.log('nihao');
			$('.fenfa li').click(function(event) {
				iVideo=$(this).index();
				$(this).addClass('on').siblings('li').removeClass('on').css('opacity', 1);
				$('.fatie1').eq(iVideo).stop(true).fadeIn('fast').siblings('.fatie1').hide();


			});






			// 点击视频音乐图片切换发帖面板
			</script>

		<!-- 图片发帖结束·················································· -->

		
      
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>