<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
        
  
        	<div class="hy_nav">
            	<ul>
                	<li><a href="/e/member/cp/">我的信息</a></li>
            		<li><a href="/e/member/EditInfo/" class="selected">完善资料</a></li>
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php">修改密码</a></li>
                        <li><a href="/e/member/EditInfo/EditShenfen.php">选择身份</a></li>
           		  <li><a href="/e/member/EditInfo/EditAvator.php">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
            <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditInfo>
            	<ul>
                    
   				<div class="wanshanziliao">
			
			<ol>
            	<li><label>用户名</label><?=$user[username]?></li>
				<li>
					<label for="guishudi">手机归属地：</label>
				    <select name="guishudi" id="select">
                      <option value="中国大陆" selected="<?=$user[guishudi]?>">中国大陆</option>
                      <option value="中国台湾" selected="<?=$user[guishudi]?>">中国台湾</option>
                    </select>
				</li>
				<li>
					<label for="shenfen">身份：</label>
					<select name="putong_shenfen" id="putong_shenfen">
						<option value="爱乐人" selected="<?=$user[shenfen]?>">爱乐人</option>
						<option value="家长" selected="<?=$user[shenfen]?>">家长</option>
						<option value="习乐人" selected="<?=$user[shenfen]?>">习乐人</option>
					</select>
				</li>
				<li>
					<label for="aiyueqi">爱好的乐器：</label>
					<select name="aihao" id="aihao">
						<option value="钢琴" selected="<?=$user[aihao]?>">钢琴</option>
						<option value="提琴" selected="<?=$user[aihao]?>">提琴</option>
						<option value="吉他" selected="<?=$user[aihao]?>">吉他</option>
						<option value="管乐" selected="<?=$user[aihao]?>">管乐</option>
						<option value="弦乐" selected="<?=$user[aihao]?>">弦乐</option>
					</select>
				</li>
				<li>
					<label for="xingbie">性别：</label>
					<input type="radio" name="sex" id="xingbie" checked="checked" value="男性">男性
					<input type="radio" name="sex" id="xingbie2" value="女性">女性				
                </li>
				<li>
					<label for="shengri">生日日期：<?=$user[chusheng]?></label>
					<div class="shengri2">
						<div class="choice">
						<div class="demo11">
							<input class="laydate-icon" id="demo11" name="chusheng" value="<?=$user[chusheng]?>"> 
						</div>
						<script type="text/javascript">
						!function(){
							laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
							laydate({elem: '#demo11'});//绑定元素
						}();

						//日期范围限制
						var start = {
						    elem: '#start',
						    format: 'YYYY-MM-DD',
						    min: laydate.now(), //设定最小日期为当前日期
						    max: '2099-06-16', //最大日期
						    istime: true,
						    istoday: false,
						    choose: function(datas){
						         end.min = datas; //开始日选好后，重置结束日的最小日期
						         end.start = datas //将结束日的初始值设定为开始日
						    }
						};

						var end = {
						    elem: '#end',
						    format: 'YYYY-MM-DD',
						    min: laydate.now(),
						    max: '2099-06-16',
						    istime: true,
						    istoday: false,
						    choose: function(datas){
						        start.max = datas; //结束日选好后，充值开始日的最大日期
						    }
						};
						laydate(start);
						laydate(end);

						//自定义日期格式
						laydate({
						    elem: '#test1',
						    format: 'YYYY年MM月DD日',
						    festival: true, //显示节日
						    choose: function(datas){ //选择日期完毕的回调
						        alert('得到：'+datas);
						    }
						});

						//日期范围限定在昨天到明天
						laydate({
						    elem: '#hello3',
						    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
						    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
						});
						</script>
						</div>
					</div>
				</li>
				<li >
					<label for="ziwojishao">自我介绍：</label>
					<textarea name="saytext" id="ziwojishao"  required onKeyUp="textLimitCheck(this, 500);"><?=$user[saytext]?></textarea>
					<div class="xianzhizishu">
						(限 500 个字符  已输入 <font color="#CC0000"><span id="messageCount">0</span></font> 个字)
						<script language=javascript>      
						String.prototype.getBytes = function() {     
						    var cArr = this.match(/[^\x00-\xff]/ig);     
						    return this.length + (cArr == null ? 0 : cArr.length);     
						}  
						function textLimitCheck(thisArea, maxLength){  
						    var len = thisArea.value.getBytes();  
						    if (len > maxLength)  
						    {  
						        alert(maxLength + ' 个字限制. \r超出的将自动去除.');  
						        var tempStr = "";  
						        var areaStr = thisArea.value.split("");  
						        var tempLen = 0;  
						        for(var i=0,j=areaStr.length;i<j;i++){  
						            tempLen += areaStr[i].getBytes();  
						            if(tempLen<=maxLength){  
						                tempStr += areaStr[i];  
						            }                 
						        }             
						        thisArea.value = tempStr  
						        thisArea.focus();  
						        }  
						        /*回写span的值，当前填写文字的数量*/  
						        messageCount.innerText = thisArea.value.length;  
						    }  
						</script>
					</div>
				</li>
				<li>
					
				</li>
			</ol>
		  
		</div>
<div style="display:none">
                    <li><label></label><input name="lockBgImg[]" type="checkbox" value=""<?=strstr($addr[lockBgImg],"||")?' checked':''?>> 锁定背景图位置</li>
                    <li><label></label><input name="bgsize[]" type="checkbox" value=""<?=strstr($addr[bgsize],"||")?' checked':''?>> 背景图缩放到100%</li>
                    <li><label>背景平铺</label><select name="repeatBg" id="repeatBg"><option value="repeat-x"<?=$addr[repeatBg]=="repeat-x"?' selected':''?>>横向平铺</option><option value="repeat-y"<?=$addr[repeatBg]=="repeat-y"?' selected':''?>>纵向平铺</option><option value="repeat"<?=$addr[repeatBg]=="repeat"?' selected':''?>>全部平铺</option><option value="no-repeat"<?=$addr[repeatBg]=="no-repeat"?' selected':''?>>不重复</option></select></li>
                    <li><label>背景对齐</label><input name="Bgalign" type="radio" value="left"<?=$addr[Bgalign]=="left"?' checked':''?>> 居左 <input name="Bgalign" type="radio" value="center"<?=$addr[Bgalign]=="center"?' checked':''?>> 居中 <input name="Bgalign" type="radio" value="right"<?=$addr[Bgalign]=="right"?' checked':''?>> 居右</li>
                    <li><label>背景颜色</label><input name="bgcolor" type="color" id="bgcolor" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[bgcolor]))?>" size=""></li>
</div>
            		<li><label></label>
                    <input type="submit" value="提交资料" name='Submit' class="tijiaoziliao">
                    </li>
            	</ul>
                </form>
            </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>