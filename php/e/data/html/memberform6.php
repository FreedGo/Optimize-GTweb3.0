<?php
if(!defined('InEmpireCMS'))
{exit();}
?>        <link rel="stylesheet" type="text/css" href="/css/xin_base.css">     
        <link rel="stylesheet" type="text/css" href="/css/laydate.css">
        <link rel="stylesheet" href="/css/wanshanziliao.css">
        <link rel="stylesheet" href="/css/stream-v1.css">
        <script type="text/javascript " src="/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="/js/adress.js"></script>
		<script type="text/javascript" src="/js/stream-v1.js"></script>
        <script type="text/javascript" src="/js/laydate.js"></script>
		<!-- 把这个div放到singleMiddle里面 -->
    	<div class="wanzhanjiaoshiMsg">
    	  	<ul>
    	  		<li>
    				<span class="dataLeft">创建国家：</span>
    				<input type="text" class="dataRight" name="company" required placeholder="请输入品牌创建的国家"  value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[company]))?>">
    			</li>
                <li>
    				<span class="dataLeft">咨询电话：</span>
    				<input type="text" class="dataRight" name="telephone" required placeholder="请输入品牌资讯的电话"  value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[telephone]))?>">
    			</li>
    			<li>
   				  	<span class="dataLeft">创建年份：</span>		
<!--					  <input type="text" class="laydate-icon dataLeftShort" required placeholder="请输入品牌创建的年份"  name="chusheng" id="demo9" value="--><?//=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[chusheng]))?><!--">-->
				  	<select class="dataLeftShort" name="chusheng">
					    <option value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[chusheng]))?>" selected><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[chusheng]))?></option>
				    </select>
				    <script type="text/javascript">
						$(function () {
							var yearSelect = $('.dataLeftShort'),
								curDate = new Date(),
							    year = curDate.getFullYear();
							if (yearSelect.val() == ''){
								yearSelect.empty();
							};
							for (var i = year;i >=1800 ; i-- ){
								yearSelect.append('<option value="'+i+'">'+i+'</option>');
							};
						})
					</script>
   			  	</li>
   			  	<li>
   				  	<span class="dataLeft">包含的乐器：</span>
   				 <input name="aihao[]" type="checkbox" value="钢琴"<?=strstr($addr[aihao],"|钢琴|")||$ecmsfirstpost==1?' checked':''?>>钢琴
                 <input name="aihao[]" type="checkbox" value="提琴"<?=strstr($addr[aihao],"|提琴|")?' checked':''?>>提琴
                 <input name="aihao[]" type="checkbox" value="吉他"<?=strstr($addr[aihao],"|吉他|")?' checked':''?>>吉他
                 <input name="aihao[]" type="checkbox" value="管乐"<?=strstr($addr[aihao],"|管乐|")?' checked':''?>>管乐
                 <input name="aihao[]" type="checkbox" value="打击乐"<?=strstr($addr[aihao],"|打击乐|")?' checked':''?>>打击乐
   			  	</li>
   			  <li>
   				  <span class="dataLeft">详细地址：</span>
   				  <input type="text" class="dataRight" name="addres" placeholder="准确到街道楼牌号" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[addres]))?>">
   			  </li>
   			  <!--<li>
   				  <span class="dataLeft">品牌简介：</span>
   				  <textarea placeholder="请输入您简单的自我评价，不超过100个字" maxlenth="100" name="saytext" class="jiaoshimiaoshu"><?=$saytext?></textarea>
   			  </li>-->
              <?php
              	$quan=$empire->fetch1("select cked from phome_enewsmember where userid=$userid limit 1");
					if($quan[cked]==1){
			  ?>
			  <li>
				  <span class="dataLeft">上传品牌照片：</span>	  
				  <div class="video-upload">
							<div id="i_select_files">
							</div>
							<div id="i_stream_files_queue">
							</div>
							<div id="i_stream_message_container" class="stream-main-upload-box" style="overflow: auto;height:200px;">
							</div>
							<input type="hidden" class="video_file_msg" name="shipin">
						<script type="text/javascript" src="/js/stream-v1.js"></script>
						<script type="text/javascript">
						/**
						 * 配置文件（如果没有默认字样，说明默认值就是注释下的值）
						 * 但是，on*（onSelect， onMaxSizeExceed...）等函数的默认行为
						 * 是在ID为i_stream_message_container的页面元素中写日志
						 */
							$(function() {
								$('.stream-cell-info:gt(1)').hide();
							});
							var iimgNum=0;
							var config = {
								browseFileId : "i_select_files", /** 选择文件的ID, 默认: i_select_files */
								browseFileBtn : "<div>请选择文件</div>", /** 显示选择文件的样式, 默认: `<div>请选择文件</div>` */
								// dragAndDropArea: "i_select_files", /** 拖拽上传区域，Id（字符类型"i_select_files"）或者DOM对象, 默认: `i_select_files` */
								// dragAndDropTips: "<span>把文件(文件夹)拖拽到这里</span>", /** 拖拽提示, 默认: `<span>把文件(文件夹)拖拽到这里</span>` */
								filesQueueId : "i_stream_files_queue", /** 文件上传容器的ID, 默认: i_stream_files_queue */
								// filesQueueHeight : 93, /** 文件上传容器的高度（px）, 默认: 450 */
								messagerId : "i_stream_message_container", /** 消息显示容器的ID, 默认: i_stream_message_container */
								multipleFiles: true, /** 多个文件一起上传, 默认: false */
								autoUploading: true, /** 选择文件后是否自动上传, 默认: true */
						//		autoRemoveCompleted : true, /** 是否自动删除容器中已上传完毕的文件, 默认: false */
								maxSize: 10485760, /** 单个文件的最大大小，默认:2G */
						//		retryCount : 5, /** HTML5上传失败的重试次数 */
						//		postVarsPerFile : { /** 上传文件时传入的参数，默认: {} */
						//			param1: "val1",
						//			param2: "val2"
						//		},
								swfURL : "/d/images/wanshanziliao/laoshi/FlashUploader.swf", /** SWF文件的位置 */
								tokenURL : "/d/images/wanshanziliao/laoshi/upload.php?action=tk", /** 根据文件名、大小等信息获取Token的URI（用于生成断点续传、跨域的令牌） */
								frmUploadURL : "/d/images/wanshanziliao/laoshi/upload.php?action=fd;", /** Flash上传的URI */
								uploadURL : "/d/images/wanshanziliao/laoshi/upload.php?action=up", /** HTML5上传的URI */
								simLimit:10, /** 单次最大上传文件个数 */
								extFilters: [".jpeg",".jpg",".png","gif"], /** 允许的文件扩展名, 默认: [] */
						//		onSelect: function(list) {alert('onSelect')}, /** 选择文件后的响应事件 */
								onMaxSizeExceed: function(size, limited, name) {alert('最大只能上传20MB图片')}, /** 文件大小超出的响应事件 */
								onFileCountExceed: function(selected, limit) {alert('只能上传10张照片')}, /** 文件数量超出的响应事件 */
								onExtNameMismatch: function(name, filters) {alert('请上传 jpg,png，gif格式图片')}, /** 文件的扩展名不匹配的响应事件 */
						//		onCancel : function(file) {alert('Canceled:  ' + file.name)}, /** 取消上传文件的响应事件 */
								onComplete: function(file) {
										var fileInfo2= eval("("+file.msg+")");
										var imgUrl='http://www.greattone.net/d/images/wanshanziliao/laoshi/'+fileInfo2.local;
									$('.video_file_msg').val(imgUrl);
									if (iimgNum==0) {
										$('.uploadImgShow').empty();
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl1" alt="" /></div>');
										$('.imgUrl1').attr('src',imgUrl);
										$('.uploadImgNum1').val(imgUrl);
										iimgNum++;
									} else if(iimgNum==1){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl2" alt="" /></div>');
										$('.imgUrl2').attr('src',imgUrl);
										$('.uploadImgNum2').val(imgUrl);
										iimgNum++;
									} else if(iimgNum==2){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl3" alt="" /></div>');
										$('.imgUrl3').attr('src',imgUrl);
										$('.uploadImgNum3').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==3){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl4" alt="" /></div>');
										$('.imgUrl4').attr('src',imgUrl);
										$('.uploadImgNum4').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==4){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl5" alt="" /></div>');
										$('.imgUrl5').attr('src',imgUrl);
										$('.uploadImgNum5').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==5){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl6" alt="" /></div>');
										$('.imgUrl6').attr('src',imgUrl);
										$('.uploadImgNum6').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==6){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl7" alt="" /></div>');
										$('.imgUrl7').attr('src',imgUrl);
										$('.uploadImgNum7').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==7){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl8" alt="" /></div>');
										$('.imgUrl8').attr('src',imgUrl);
										$('.uploadImgNum8').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==8){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl9" alt="" /></div>');
										$('.imgUrl9').attr('src',imgUrl);
										$('.uploadImgNum9').val(imgUrl);
										iimgNum++;
									}else if(iimgNum==9){
										$('.uploadImgShow').append('<div class="imgWarp"><img class="imgUrl10" alt="" /></div>');
										$('.imgUr10').attr('src',imgUrl);
										$('.uploadImgNum10').val(imgUrl);
										
										iimgNum++;
									}else{
										alert('最多只能上传10张图片');console.log(iimgNum);
									};
									console.log(imgUrl);
										}, /** 单个文件上传完毕的响应事件 */
								onQueueComplete: function(msg) {
									// var fileInfo= eval("("+msg+")");
								}, /** 所以文件上传完毕的响应事件 */
								onUploadError: function(status, msg) {alert('网络错误,上传失败!')} /** 文件上传出错的响应事件 */
							};
							var _t = new Stream(config);
						</script>
						</div>
			  </li>
              <?
              }if($quan[cked]==1){
			  ?>
			  <li>
				<span style="margin-left: 160px">最多上传10张图片</span>
			  <div class="uploadImgShow">
				<?

				$pp=$empire->fetch1("select photo from phome_enewsmemberadd where userid='$userid' limit 1"); 
					$photo=explode("::::::",$pp['photo']);
				    $num_photo=count($photo)-1;
				for($i=0;$i<$num_photo;$i++){
				?>
				<div class="imgWarp"><img class="imgUrl11" src="<?=$photo[$i]?>"></div>           
				<?
				}
				?>   
              </div>
               <input type="hidden" class="uploadImgNum1" name="poto1">
                <input type="hidden" class="uploadImgNum2" name="poto2">
                <input type="hidden" class="uploadImgNum3" name="poto3">
                <input type="hidden" class="uploadImgNum4" name="poto4">
                <input type="hidden" class="uploadImgNum5" name="poto5">
                <input type="hidden" class="uploadImgNum6" name="poto6">
                <input type="hidden" class="uploadImgNum7" name="poto7">
                <input type="hidden" class="uploadImgNum8" name="poto8">
                <input type="hidden" class="uploadImgNum9" name="poto9">
				<input type="hidden" class="uploadImgNum10" name="poto10">
                 <input type="hidden" name="userid" value="<?=$userid?>">
				</li>
                <?
                }
				?>
			  <li>
   				  <input type="radio" id="tili" required checked="checked">
   				  <label for="tili">我已经认真阅读<a href="javascript:;">《网站会员注册协议</a>，<a href="javascript:;">《在线签约机构条款》</a>， 并完全同意所有条款。</label>
   			  </li>
   			  <li>
   				  <span class="dataLeft"></span>
   				 
   			  </li>
    		</ul>
    		<script type="text/javascript">
    			window.onload = function(){
      				$('#shenfen>p').html($('#sfdq_tj').val());
      				$('#chengshi>p').html($('#csdq_tj').val());
      				$('#quyu>p').html($('#qydq_tj').val());
    			}
    		</script>
   	</div>