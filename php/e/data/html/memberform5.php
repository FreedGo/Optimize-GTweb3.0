<?php
if(!defined('InEmpireCMS'))
{exit();}
?><link rel="stylesheet" type="text/css" href="/css/xin_base.css">
<link rel="stylesheet" href="/css/wanshanziliao.css">
<link rel="stylesheet" href="/css/stream-v1.css">
<script type="text/javascript " src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/adress.js"></script>
<script type="text/javascript" src="/js/stream-v1.js"></script>
<div class="wanzhanjiaoshiMsg">
	<ul>
		<input type="hidden" name="groupid" value="4">
		<li>
			<span class="dataLeft">负责人姓名：</span>
			<input type="text" class="dataRight" name="fuzeren" id="fuzeren" value="<?=$fuzeren?>" required>
		</li>
		<li>
			<span class="dataLeft">营业电话：</span>
			<input type="text" class="dataRight" name="telephone" value="<?=$telephone?>" required>
		</li>
		<li>
			<span class="dataLeft">营业面积：</span>
			<input type="text" class="dataRight" name="measure" value="<?=$measure?>">
		</li>
		<li>
			<span class="dataLeft">类型：</span>
			<select class="dataLeftShort" name="classroom_type" id="classroom_type">
				<option value="钢琴教室"<?=$classroom_type=="钢琴教室"?' selected':''?>>钢琴教室</option>
				<option value="提琴教室"<?=$classroom_type=="提琴教室"?' selected':''?>>提琴教室</option>
				<option value="吉他教室"<?=$classroom_type=="吉他教室"?' selected':''?>>吉他教室</option>
			</select>
		</li>
		<li>
			<span class="dataLeft">城市：</span>
			<div id="sjld" class="clearix" >
				<div class="m_zlxg" id="shenfen">
					<!--<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address]))?></p>-->
					<p title="" ><?=$address?></p>
					<div class="m_zlxg2 m_zlxg1">
						<ul>
							<li class="aa a1">北京</li>
							<li class="ss s1">上海</li>
							<li class="tt t1">天津</li>
							<li class="bb a8">重庆</li>
							<li class="tt t2">四川</li>
							<li class="aa a4">贵州</li>
							<li class="tt t3">云南</li>
							<li class="tt t4">西藏</li>
							<li class="hh hh1">河南</li>
							<li class="hh h4">湖北</li>
							<li class="hh h3">湖南</li>
							<li class="bb a5">广东</li>
							<li class="bb a6">广西</li>
							<li class="ll s8">陕西</li>
							<li class="bb a7">甘肃</li>
							<li class="ll s5">青海</li>
							<li class="ll s6">宁夏</li>
							<li class="zz t5">新疆</li>
							<li class="hh h2">河北</li>
							<li class="ss s3">山西</li>
							<li class="ss s4">内蒙古</li>
							<li class="ii h5">江苏</li>
							<li class="zz t6">浙江</li>
							<li class="aa a2">安徽</li>
							<li class="aa a3">福建</li>
							<li class="ii h8">江西</li>
							<li class="ss s2">山东</li>
							<li class="ll s7">辽宁</li>
							<li class="ii h7">吉林</li>
							<li class="ii h6">黑龙江</li>
							<li class="jj h9">海南</li>
							<li class="zz t7">台湾</li>
							<li class="zz t8">香港</li>
							<li class="yy t9">澳门</li>
						</ul>
					</div>
				</div>
				<div class="m_zlxg" id="chengshi">
					<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address1]))?></p>
					<div class="m_zlxg2">
						<ul></ul>
					</div>
				</div>
				<div class="m_zlxg" id="quyu">
					<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address2]))?></p>
					<div class="m_zlxg2">
						<ul></ul>
					</div>
				</div>
				<input id="sfdq_num" type="hidden" value="" />
				<input id="csdq_num" type="hidden" value="" />
				<input id="sfdq_tj" type="hidden" name="address" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address]))?>" />
				<input id="csdq_tj" type="hidden" name="address1" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address1]))?>" />
				<input id="qydq_tj" type="hidden" name="address2" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address2]))?>" />
			</div>
			<script type="text/javascript">
				$(function(){
					$("#sjld").sjld("#shenfen","#chengshi","#quyu");
				});
			</script>
			<!-- 地址三级联动js -->
		</li>
		<li>
			<span class="dataLeft">详细地址：</span>
			<input type="text" class="dataRight" name="addres" placeholder="准确到街道楼牌号" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[addres]))?>">
		</li>
		<!--<li>
			<span class="dataLeft">证件号码：</span>
			<input type="text" class="dataRight" name="shenfenzheng" value="<?=$shenfenzheng?>">
		</li>-->
		<li>
			<span class="dataLeft">教室描述：</span>
			<textarea class="jiaoshimiaoshu" name="saytext" id="saytext" cols="30" rows="10"><?=$saytext?></textarea>
		</li>
		<?php
			$quan=$empire->fetch1("select cked from phome_enewsmember where userid=$userid limit 1");
			if($quan[cked]==1 || true){//修改为不管有没有认证,先把上传
			?>
			<li>
				<span class="dataLeft">上传琴行照片：</span>
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
							maxSize: 5242880, /** 单个文件的最大大小，默认:2G */
							//		retryCount : 5, /** HTML5上传失败的重试次数 */
							//		postVarsPerFile : { /** 上传文件时传入的参数，默认: {} */
							//			param1: "val1",
							//			param2: "val2"
							//		},
							swfURL : "/d/images/wanshanziliao/jiaoshi/FlashUploader.swf", /** SWF文件的位置 */
							tokenURL : "/d/images/wanshanziliao/jiaoshi/upload.php?action=tk", /** 根据文件名、大小等信息获取Token的URI（用于生成断点续传、跨域的令牌） */
							frmUploadURL : "/d/images/wanshanziliao/jiaoshi/upload.php?action=fd;", /** Flash上传的URI */
							uploadURL : "/d/images/wanshanziliao/jiaoshi/upload.php?action=up", /** HTML5上传的URI */
							simLimit:8, /** 单次最大上传文件个数 */
							extFilters: [".jpeg",".jpg",".png","gif"], /** 允许的文件扩展名, 默认: [] */
							//		onSelect: function(list) {alert('onSelect')}, /** 选择文件后的响应事件 */
							onMaxSizeExceed: function(size, limited, name) {alert('最大只能上传5MB图片')}, /** 文件大小超出的响应事件 */
							onFileCountExceed: function(selected, limit) {alert('只能上传8张图片')}, /** 文件数量超出的响应事件 */
							onExtNameMismatch: function(name, filters) {alert('请上传jpg,png,gif格式图片')}, /** 文件的扩展名不匹配的响应事件 */
							//		onCancel : function(file) {alert('Canceled:  ' + file.name)}, /** 取消上传文件的响应事件 */
							onComplete: function(file) {

								var fileInfo2= eval("("+file.msg+")");
								var imgUrl='http://www.greattone.net/d/images/wanshanziliao/jiaoshi/'+fileInfo2.local;
								$('.video_file_msg').val(imgUrl);
								if (iimgNum==0) {
									$('.uploadImgShow').empty();
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl1" alt="" /></div>');
									$('.imgUrl1').attr('src',imgUrl);
									$('.uploadImgNum1').val(imgUrl);
									iimgNum++;console.log(iimgNum);
								} else if(iimgNum==1){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl2" alt="" /></div>');
									$('.imgUrl2').attr('src',imgUrl);
									$('.uploadImgNum2').val(imgUrl);
									iimgNum++;
								} else if(iimgNum==2){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl3" alt="" /></div>');
									$('.imgUrl3').attr('src',imgUrl);
									$('.uploadImgNum3').val(imgUrl);
									iimgNum++;
								}else if(iimgNum==3){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl4" alt="" /></div>');
									$('.imgUrl4').attr('src',imgUrl);
									$('.uploadImgNum4').val(imgUrl);

									iimgNum++;
								}else if(iimgNum==4){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl5" alt="" /></div>');
									$('.imgUrl5').attr('src',imgUrl);
									$('.uploadImgNum5').val(imgUrl);

									iimgNum++;
								}else if(iimgNum==5){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl6" alt="" /></div>');
									$('.imgUrl6').attr('src',imgUrl);
									$('.uploadImgNum6').val(imgUrl);

									iimgNum++;
								}else if(iimgNum==6){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl7" alt="" /></div>');
									$('.imgUrl7').attr('src',imgUrl);
									$('.uploadImgNum7').val(imgUrl);

									iimgNum++;
								}else if(iimgNum==7){
									$('.uploadImgShow').prepend('<div class="imgWarp"><img class="imgUrl8" alt="" /></div>');
									$('.imgUrl8').attr('src',imgUrl);
									$('.uploadImgNum8').val(imgUrl);
									i++;
								}else{
									alert('网络出错，请刷新页面');console.log(iimgNum);
								};
								console.log(imgUrl);
							}, /** 单个文件上传完毕的响应事件 */
							onQueueComplete: function(msg) {}, /** 所以文件上传完毕的响应事件 */
							onUploadError: function(status, msg) {alert('网络错误,上传失败!')} /** 文件上传出错的响应事件 */
						};
						var _t = new Stream(config);
					</script>
				</div>


			</li>
			<li><div class="uploadImgShow">
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
				<input type="hidden" name="userid" value="<?=$userid?>">
			</li>
			<li><span >&nbsp;&nbsp;请提交琴行照片（如门口，接待区，内饰，最多4张），支持.jpg .gif .png格式照片，大小不超过5M</span></li>
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