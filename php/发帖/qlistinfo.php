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
			<!-- <h2>分享快乐，留住感动！</h2> -->
			<div class="fenfa clearfix">
				<ul class="clearfix">
					<li class="on"><i class="iconfont">&#xe62c;</i>视频</li>
					<li><i class="iconfont">&#xe667;</i>音乐</li>
					<li><i class="iconfont">&#xe668;</i>图片</li>
					<li><i class="iconfont">&#xe668;</i>乐谱</li>
				</ul>
			</div>
			<!-- 视频发帖·················································· -->
			<div class="fatie1">
				<form class="fatie-video" name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'14');">
					<input type=hidden value=MAddInfo name=enews> <input type=hidden value=11 name=classid> 
		            <input name=id type=hidden id="id" value=> <input type=hidden value="1453179768" name=filepass>
		            <input name=mid type=hidden id="mid" value=14>
		             <!----返回地址---->
		            <input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang/guang/">
					
					<div class="biaoti">
	                    <!--<input type=hidden name=ecmsfrom value="/e/DoInfo/ListInfo.php?mid=10">-->
	                    <input name="title" type="text" size="42" placeholder="请输入视频标题" required>
					</div>                  
					<div class="shangchuan">
                    	<span>上传视频文件：</span>
						<div class="video-upload">
							<link rel="stylesheet" type="text/css" href="http://171.11.231.70:2000/upload/css/upload.css" />
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
							<div class="uploadmain" style="80%">
	                			<div class="shangchuan_biaodan" id="chose0">
	                				<div id="chosevideo">上传视频</div>
	                				<div id="divFileProgressContainer"></div>
	                			</div>
	                      </div>
	                     <input type="hidden" id="title" value="" size="45"> <!-- 标题： -->
	                     <input type="hidden" name="titlepic" id="titlepic" value="" size="45"><!-- 缩略图： -->
	                     <input type="hidden" name="odownpath1" id="odownpath1" value="" size="45"><!-- 视频地址： -->   
	                     <input type="hidden" name="shipin" id="downpath1" value="" size="45"><!-- 下载地址： -->       
	                     <input type="hidden" name="share" id="share" value="" size="45"><!-- 分享地址： -->
	                     <br><input type="hidden" name="videoid" id="videoid" value="" size="45"><!-- 视频ID： -->
						</div>
					</div>
					<div class="biaotitupian">
						<!--<span>上传标题图片:</span>-->
							<!--<input type="file" name="titlepicfile" size="45">-->
                            <input type="hidden" name="titlepicfile" value="" />
                          <!-- <input type="text" name="titlepicfile" placeholder="请输入视频标题" required> -->
					</div>
					<div class="tips">
						<h4 class="tips-msg">温馨提示：音乐广场发帖时，上传视频最大限制为500MB，过大请把视频压缩变小之后再上传，推荐使用<a class="gsgc" rel="nofollow" target="_blank" href="http://www.pcfreetime.com/">格式工厂</a>软件来对视频进行压缩处理，点击<a class="gsgc" rel="nofollow" target="_blank" href="http://www.pcfreetime.com/">这里</a>下载。</h4>
					</div>
				  <div class="wenzi">
					<textarea  id="test" name="smalltext" onKeyUp="textLimitCheck(this, 3000);"></textarea>  
					<br/>
					(限 3000 个字符)				
				  </div>
					<div class="tijiaotiezi">
                    	<input type="submit" name="Submit" value="发布" class="fabushipinBtn button blue medium">
						<?php /*?><?
                        	if($sign=="1"){
								echo "<input type='submit' name='Submit' value='发布' class='fabutupianBtn button blue medium'>";
							}else{
								echo "完善资料后才能发帖[<a style='color:#f00;' href='/e/member/EditInfo/'>完善资料</a>]";
							}
						?><?php */?>
					    <select name="open" id="open" class="articleType">
                       		<option value="1">公开</option>
                       		<option value="2">私密</option>
                       	</select>
					   </div>

				</form>
				<script type="text/javascript">
					$(function() {
						//判断视频发帖必须发视频
						$('.fabushipinBtn').click(function(event) {
							if(!$('#downpath1').val()){
								alert('请上传视频之后再点击发布！');
								return false;
							};
						});
					});
				</script>
            </div>
		<!-- 视频发帖结束·················································· -->


		<!-- 音乐发帖·················································· -->
			
            <div class="fatie1">
				<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'11');">
				<input type=hidden value=MAddInfo name=enews> <input type=hidden value=13 name=classid> 
				<input name=id type=hidden id="id" value=> <input type=hidden value="1453112578" name=filepass> 
				<input name=mid type=hidden id="mid" value=11>
 				<!----返回地址---->
              	<input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang/guang/">
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
					<div class="music-upload">
						<div id="i_select_files_music">

						</div>

						<div id="i_stream_files_queue_music">
						</div>
						
						<div id="i_stream_message_container_music" class="stream-main-upload-box" style="overflow: auto;height:200px;">
						</div>
						<input type="hidden" class="music_file_msg" name="yinyue">
						<script type="text/javascript" src="/js/stream-v1.js"></script>
						<script type="text/javascript">
						/**
						 * 配置文件（如果没有默认字样，说明默认值就是注释下的值）
						 * 但是，on*（onSelect， onMaxSizeExceed...）等函数的默认行为
						 * 是在ID为i_stream_message_container的页面元素中写日志
						 */
							var config = {
								browseFileId : "i_select_files_music", /** 选择文件的ID, 默认: i_select_files */
								browseFileBtn : "<div>请选择文件</div>", /** 显示选择文件的样式, 默认: `<div>请选择文件</div>` */
								// dragAndDropArea: "i_select_files", /** 拖拽上传区域，Id（字符类型"i_select_files"）或者DOM对象, 默认: `i_select_files` */
								// dragAndDropTips: "<span>把文件(文件夹)拖拽到这里</span>", /** 拖拽提示, 默认: `<span>把文件(文件夹)拖拽到这里</span>` */
								filesQueueId : "i_stream_files_queue_music", /** 文件上传容器的ID, 默认: i_stream_files_queue */
								// filesQueueHeight : 93, /** 文件上传容器的高度（px）, 默认: 450 */
								messagerId : "i_stream_message_container_music", /** 消息显示容器的ID, 默认: i_stream_message_container */
								multipleFiles: false, /** 多个文件一起上传, 默认: false */
								autoUploading: true, /** 选择文件后是否自动上传, 默认: true */
						//		autoRemoveCompleted : true, /** 是否自动删除容器中已上传完毕的文件, 默认: false */
								maxSize: 20971520, /** 单个文件的最大大小，默认:2G */
						//		retryCount : 5, /** HTML5上传失败的重试次数 */
						//		postVarsPerFile : { /** 上传文件时传入的参数，默认: {} */
						//			param1: "val1",
						//			param2: "val2"
						//		},
								swfURL : "swf/FlashUploader.swf", /** SWF文件的位置 */
								tokenURL : "/d/music/upload.php?action=tk", /** 根据文件名、大小等信息获取Token的URI（用于生成断点续传、跨域的令牌） */
								frmUploadURL : "/d/music/upload.php?action=fd;", /** Flash上传的URI */
								uploadURL : "/d/music/upload.php?action=up", /** HTML5上传的URI */
								simLimit:1, /** 单次最大上传文件个数 */
								extFilters: [".mp3"], /** 允许的文件扩展名, 默认: [] */
						//		onSelect: function(list) {alert('onSelect')}, /** 选择文件后的响应事件 */
								onMaxSizeExceed: function(size, limited, name) {alert('最大只能上传20MB音乐')}, /** 文件大小超出的响应事件 */
								onFileCountExceed: function(selected, limit) {alert('只能上传一首音乐')}, /** 文件数量超出的响应事件 */
								onExtNameMismatch: function(name, filters) {alert('请上传mp3格式音乐')}, /** 文件的扩展名不匹配的响应事件 */
						//		onCancel : function(file) {alert('Canceled:  ' + file.name)}, /** 取消上传文件的响应事件 */
								// onComplete: function(file) {alert('onComplete')}, /** 单个文件上传完毕的响应事件 */
								onQueueComplete: function(msg) {
									var fileInfo= eval("("+msg+")");
									$('.music_file_msg').val('http://www.greattone.net/d/music/'+fileInfo.local);

								}, /** 所以文件上传完毕的响应事件 */
								onUploadError: function(status, msg) {alert('网络错误,上传失败!')} /** 文件上传出错的响应事件 */
							};
							var _t = new Stream(config);
						</script>
						</div>
					</div>
                    <div class="biaotitupian"></div>
				  	<div class="wenzi">
					<textarea  id="test" name="smalltext" onKeyUp="textLimitCheck(this, 3000);"></textarea>  
					<br/>
					(限 3000 个字符)				</div>
					<div class="tijiaotiezi">
                    	<input type='submit' name='Submit' value='发布' class='fabuyinyueBtn button blue medium'>
						<?php /*?><?
                        	if($sign=="1"){
								echo "<input type='submit' name='Submit' value='发布' class='fabutupianBtn button blue medium'>";
							}else{
								echo "完善资料后才能发帖[<a style='color:#f00;' href='/e/member/EditInfo/'>完善资料</a>]";
							}
						?><?php */?>
					     <select name="open" id="open" class="articleType">
                       		<option value="1">公开</option>
                       		<option value="2">私密</option>
                       	</select>
					</div>
				</form>
			</div>
		<!-- 音乐发帖结束·················································· -->
		<!-- 图片发帖·················································· -->
			<div class="fatie1">
				<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'10');">
				<input type=hidden value=MAddInfo name=enews> <input type=hidden value=12 name=classid> 
				 <!----返回地址---->
              	<input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/guangchang/guang/">
              	<input name=id type=hidden id="id" value=> 
              	<input name=mid type=hidden id="mid" value=10>
              	<ul>
                <table class='news-table tupianbianji' cellspacing='0'>
                  <tr>
                    <!-- <td nowrap='nowrap' width="80"><label>标题：</label></td> -->
                    <td><input name="title" type="text" style="height:34px;" size="42" value="" required placeholder="请输入图片标题">                    </td>
                  </tr>
                  <!-- <tr> -->
                    <!-- <td nowrap='nowrap'><label>图片集：</label></td> -->
                    <!-- <td> -->
                  <!-- </tr> -->
                </table>
                <table class='news-table' cellspacing='0'><tr>
                <!-- <script type="text/javascript" src="../extend/uploadify/jquery-1.10.2.min.js"></script> -->
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
								'filepass':'1468569183',
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
					            'uploadLimit' : 20,
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
					                    $("#img_upload").uploadify("settings", "formData", {'mrnd':'GEnd4H7HC3aDRDga3kPq',
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
					   	<!-- <td></td> -->
					    <td height="25">
					    <div class="upload_img_btn">上传图片文件：
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
					                                        <td><img id="preImg{0}" class="preImgArray" alt="预览" noResize="true" style="width:110px;height:110px;background-color:#ccc;border:1px solid #333"/></td>
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
					<input type="hidden" class="vbiao" name="titlepic" ><!-- 获取最后一张图片-->
					</td>
					  </tr>
					  <tr>
					  	<!-- <td width="80">内容：</td> -->
					  	<td><textarea name="smalltext" id="smalltext" cols="30" rows="10"></textarea></td>
					  </tr>
					</table></td></tr><tr><td nowrap='nowrap'></td></tr></table>    
					<li>
						<label></label>
					    	<input type='submit' name='Submit' value='发布' class='fabutupianBtn button blue medium'>
	    					<?php /*?><?
	                        	if($sign=="1"){
									echo "<input type='submit' name='Submit' value='发布' class='fabutupianBtn button blue medium'>";
								}else{
									echo "完善资料后才能发帖[<a style='color:#f00;' href='/e/member/EditInfo/'>完善资料</a>]";
								}
							?><?php */?>
							<select name="open" id="open" class="articleType">
	                       		<option value="1">公开</option>
	                       		<option value="2">私密</option>
	                       	</select>
					</li>
            	</ul>
				</form>
				<script type="text/javascript">
					$(function() {
						//判断图片发帖必须发视频
						$('.fabutupianBtn').click(function(event) {
							if(!$('.preImgArray').attr('src')){
								alert('请上传图片之后再点击发布！');
								return false;
							};
						});
					});
				</script>
			</div>
			<!-- 图片发帖结束·················································· -->
			
			<!-- 乐谱发帖·················································· -->
			<div class="fatie1">
                <form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'36');">
				<input type=hidden value=MAddInfo name=enews>
				<input type=hidden class="music-type" value=38 name=classid> 
              	<input name=id type=hidden id="id" value=> 
              	<input name=mid type=hidden id="mid" value=36>
 				<!----返回地址---->
                <input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/yuepu/">
				<div class="biaoti">
					<input type="text" name="title" placeholder="请输入乐谱标题" required>
				</div>
				<div class="select-music-type music-book-list">
					<span class="select-music-type-title">
						乐谱类型：
					</span>
					<select name="type" class="select-music-type-con">
						<option value="38">钢琴谱</option>
                        <option value="39">吉他谱</option>
						<option value="105">提琴谱</option>
						<option value="106">管乐谱</option>
						<option value="107">民乐谱</option>
						<option value="108">综合谱</option>
					</select>
				</div>
				<div class="select-music-style music-book-list">
					<span class="select-music-style-title">
						乐谱风格：
					</span>
					<select name="fengge" class="select-music-style-con">
						<option value="古典">古典</option>
						<option value="流行">流行</option>
						<option value="原创">原创</option>
						<option value="伴奏">伴奏</option>
                        <option value="综合">综合</option>
					</select>
				</div>
				<div class="music-book-auther music-book-list" >
					<span class="music-book-auther-tle">乐曲作者：</span>
					<input type="text" name="zuozhe" class="music-book-auther-con" value=""  required="required"/>
				</div>
	                <div class="shangchuan clearfix">
		                <span>上传乐谱封面：</span>
		                <style>
			                #upload_ue3{display: none}
		                </style>
		                <script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
		                <script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
		                <script id="upload_ue3" name="content" type="text/plain"></script>
		                <!-- 储存图片路径 -->
		                <input type="hidden" id="picture3" name="titlepic" value="">

		                <!-- 上传按钮 -->
		                <a  class="datepicker lookBtn2" style="float:left;margin-left: 20px;cursor: pointer;" onclick="upImage3()">上传封面</a>
		                <!-- 显示预览图 -->
		                <div class="imgPre3" style="float: left;width:688px;border-radius: 3px;overflow: hidden; ">
			                <!--<img class="music-book-view" id="preview2" src="" alt="">-->
			                <!--<input type="hidden" class="music-book-pic" name="music-book-pic" value="" />-->
		                </div>
		                <div class="img-src-warp2" style="display: none;">

		                </div>
		                <!-- 百度插件参数 -->
		                <script type="text/javascript">
			                var _editorr3 = UE.getEditor('upload_ue3');
			                _editorr3.ready(function () {
				                //设置编辑器不可用
				                //_editor.setDisabled();  //这个地方要注意 一定要屏蔽
				                //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
				                _editorr3.hide();

				                //侦听图片上传
				                _editorr3.addListener('beforeinsertimage', function (t, arg) {
					                //将地址赋值给相应的input,只去第一张图片的路径
					                var imgs,imgUrlAll = '';
					                for(var a in arg){
						                imgs +=arg[a].src+',';
						                console.log(arg[a].src);
						                $('.imgPre3').empty().append('<img class="music-book-view" id="preview2" src="'+arg[a].src+'">');
						                // $('.img-src-warp').append('<input type="hidden" class="music-book-pic" name="music-book-pic" value="'+arg[a].src+'" />');
						                imgUrlAll = arg[a].src;
					                }
					                $('#picture3').val(imgUrlAll);
//		                         $("#picture2").attr("value", arg[0].src);
//		                         console.log(arg[0].src);
					                //图片预览
//		                         $("#preview2").attr("src", arg[0].src);
				                })
			                });
			                //弹出图片上传的对话框
			                function upImage3() {
				                var myImage = _editorr3.getDialog("insertimage");
//		                     var myImage = _editorr.getDialog("simpleupload");
				                myImage.open();
			                }
		                </script>
	                </div>

	                <div class="shangchuan clearfix">
					<span>上传乐谱图片：</span>
					<script id="upload_ue2" name="content" type="text/plain"></script>
					<!-- 储存图片路径 -->
				    <input type="hidden" id="picture2" name="photo" value="">
				    
				    <!-- 上传按钮 -->
					<a  class="datepicker lookBtn2" style="float:left;margin-left: 20px;cursor: pointer;" onclick="upImage2()">上传图片</a>
					<!-- 显示预览图 -->
					<div class="imgPre" style="float: left;width:688px;border-radius: 3px;overflow: hidden; ">
						<!--<img class="music-book-view" id="preview2" src="" alt="">-->
						<!--<input type="hidden" class="music-book-pic" name="music-book-pic" value="" />-->
					</div>
					<div class="img-src-warp" style="display: none;">
						
					</div>
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
		                        var imgs,imgUrlAll = '';
		                        for(var a in arg){
		                            imgs +=arg[a].src+',';
		                            console.log(arg[a].src);
		                            $('.imgPre').append('<img class="music-book-view" id="preview2" src="'+arg[a].src+'">');
		                            // $('.img-src-warp').append('<input type="hidden" class="music-book-pic" name="music-book-pic" value="'+arg[a].src+'" />');
		                           imgUrlAll = imgUrlAll+arg[a].src+'::::::';
		                        }
		                        $('#picture2').val(imgUrlAll);
//		                         $("#picture2").attr("value", arg[0].src);
//		                         console.log(arg[0].src);
		                        //图片预览
//		                         $("#preview2").attr("src", arg[0].src);
		                    })
		                 });
		                //弹出图片上传的对话框
		                function upImage2() {
		                     var myImage = _editorr.getDialog("insertimage");
//		                     var myImage = _editorr.getDialog("simpleupload");
		                     myImage.open();
		                }
					</script>
				</div>
				  	<div class="wenzi">
					<textarea  id="test" name="smalltext" onKeyUp="textLimitCheck(this, 3000);"></textarea>  
					<br/>
					(限 3000 个字符)				</div>
					<div class="tijiaotiezi">
                    	<input type='submit' name='Submit' value='发布' class='fabuyuepuBtn button blue medium'>
					     <select name="open" id="open" class="articleType">
                       		<option value="1">公开</option>
                       		<option value="2">私密</option>
                       	</select>
                       	
					</div>
				</form>
				<script type="text/javascript">
					$(function() {
						//判断乐谱发帖必须发视频
						$('.fabuyuepuBtn').click(function(event) {
							if(!$('#picture2').val()){
								alert('请上传乐谱图片之后再点击发布！');
								return false;
							};
						});
					});
				</script>
			</div>
			<!-- 乐谱发帖结束·················································· -->
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

	<!--发帖框结束-->
</div>
<div class="fatie-ad">
		<script src="http://www.greattone.net/d/js/acmsd/thea66.js"></script>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>