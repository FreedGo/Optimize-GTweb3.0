<?php
/********注册VIP通道********/
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='注册会员';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;注册会员";
require(ECMS_PATH.'e/template/incfile/header_1.php');
?>
	<link rel="stylesheet" type="text/css" href="/css/laydate.css">
	<link rel="stylesheet" type="text/css" href="/css/zhuce.css">
	<link rel="stylesheet" type="text/css" href="/css/vali.css">
	<link href="/shang/newHeadPic/css/ShearPhoto.css" rel="stylesheet" type="text/css" media="all">
	<!--ShearPhotoCSS文件-->
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/laydate.js"></script> 
<!--    <script type="text/javascript" src="/scripts/swfobject.js"></script>-->
<!--    <script type="text/javascript" src="/scripts/fullAvatarEditor.js"></script>-->
    <script type="text/javascript" src="/js/adress.js"></script>
    <script type="text/javascript" src="/js/language.js"></script>
    <script type="text/javascript" src="/js/vali.min.js"></script>
    <!-- <script type="text/javascript" src="/js/register.yanzheng.js"></script> -->
	<script type="text/javascript" src="/shang/newHeadPic/js/ShearPhoto.js"></script>
	<!--ShearPhoto的核心文件 截取，拖拽，HTML5切图，数据交互等都是由这个文件处理，全部由明哥先生汗水交织而成-->
	<script type="text/javascript" src="/shang/newHeadPic/js/handle.js"></script>
	<!--设置和处理对象方法的JS文件，要修改设置，请进入这个文件-->
  
    
<table class="mainForm" width='1200' border='0' align='center' cellpadding='3' cellspacing='0' class="tableborder">
<form class="register-form" id="user_info_sub" name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php class="newMember">
    <input type=hidden name=enews value=register>
    <tr class="header"> 
      <td  colspan="2">好琴声 音乐人的交流平台！<?=$tobind?' (绑定账号)':''?></td>
    </tr>
    
        <input name="groupid" type="hidden" id="groupid" value="<?=$groupid?>">
    <tr> 
      <td width='15%' height="25" bgcolor="#FFFFFF"> <div align='left'>
      <?
      	if($groupid==4){
			echo "机构名称";
		}elseif($groupid==5){
	        echo "品牌名：";
        } elseif($groupid==1){
			echo "用户名：";
		}else{
			echo "真实姓名:";
		}
	  ?>
      </div></td>
      <td width='75%' height="25" bgcolor="#FFFFFF" class="chongfumima" > <input name='username' style="float:left;" type='text' id='username' class="yonghuming" maxlength='20' required>
        </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF" > <div align='left'>密码：</div></td>
      <td height="25" bgcolor="#FFFFFF" class="chongfumima"> <input name='password' style="float:left;" class="password1" type='password' id='password' maxlength='20' required>
        </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align='left'>重复密码：</div></td>
      <td height="25" bgcolor="#FFFFFF" class="chongfumima"> <input name='repassword' style="float:left;" type='password' id='repassword' maxlength='20' required>
        </td>
    </tr>
	<?php
		if (!$groupid = 5){

		?>
			<tr>
				<td width='15%' height=25 bgcolor='ffffff'>城市:</td>
				<td bgcolor='ffffff'>
					<div id="sjld" class="clearix" >

						<div class="m_zlxg" id="shenfen">

							<p title="">选择省份</p>

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

							<p title="">选择城市</p>

							<div class="m_zlxg2">

								<ul></ul>

							</div>

						</div>

						<div class="m_zlxg" id="quyu">

							<p title="">选择区域</p>

							<div class="m_zlxg2">

								<ul></ul>

							</div>

						</div>

						<input id="sfdq_num" type="hidden" value="" />

						<input id="csdq_num" type="hidden" value="" />

						<input id="sfdq_tj" type="hidden" value="" name="address" />

						<input id="csdq_tj" type="hidden" value="" name="address1"/>

						<input id="qydq_tj" type="hidden" value="" name="address2"/>

					</div>
					<script type="text/javascript">
						//4.调用城市三级连动插件
						$(function(){
							$("#sjld").sjld("#shenfen","#chengshi","#quyu");

						});
					</script>
				</td>
			</tr>
		<?php
		}
	?>
	<tr>
		<td height="25" bgcolor="#FFFFFF"> <div align='left'>手机号码：</div></td>
		<td height="25" bgcolor="#FFFFFF" class="chongfumima">
			<input class="quxiao" type="hidden" value="+86">
			<input name='phone' type='text' id='photo' style="float:left;"  phone="t"
			       vali maxlength='11' required>
		</td>

	</tr>

<tr>
	<td width='175' height=25 bgcolor='ffffff'>
		<?
	        if($groupid==1){
				echo "会员头像";
			}elseif($groupid==2){
				echo "名人头像";
			}elseif($groupid==3){
				echo "老师头像";
			}elseif($groupid==4){
				echo "机构照片";
			}elseif($groupid==5){
			    echo "品牌LOGO";
		    }
		?>
	</td>
	<td style="background-color: #fff">
		<!--主功能部份 主功能部份的标签请勿随意删除，除非你对shearphoto的原理了如指掌，否则JS找不到DOM对象，会给你抱出错误-->
		<input type="hidden" id="headImg" name="userpic" required>
		<span class="openShearPhoto">上传图片</span>
		<div id="shearphoto_loading">程序加载中......</div>
		<!--这是2.2版本加入的缓冲效果，JS方法加载前显示的等待效果-->
		<div id="shearphoto_main" style="display: none">
			<!--primary范围开始-->
			<div class="primary">
				<!--main范围开始-->
				<div id="main">
					<div class="point">
					</div>
					<!--选择加载图片方式开始-->
					<div id="SelectBox">

						<a href="javascript:;" id="selectImage">
							<input type="file" name="UpFile" autocomplete="off" />
						</a>

					</div>
					<!--选择加载图片方式结束--->
					<div id="relat">
						<div id="black">
						</div>
						<div id="movebox">
							<div id="smallbox">
								<img src="shearphoto_common/images/default.gif" class="MoveImg" />
								<!--截框上的小图-->
							</div>
							<!--动态边框开始-->
							<i id="borderTop">
							</i>

							<i id="borderLeft">
							</i>

							<i id="borderRight">
							</i>

							<i id="borderBottom">
							</i>
							<!--动态边框结束-->
							<i id="BottomRight">
							</i>
							<i id="TopRight">
							</i>
							<i id="Bottomleft">
							</i>
							<i id="Topleft">
							</i>
							<i id="Topmiddle">
							</i>
							<i id="leftmiddle">
							</i>
							<i id="Rightmiddle">
							</i>
							<i id="Bottommiddle">
							</i>
						</div>
						<img src="shearphoto_common/images/default.gif" class="BigImg" />
						<!--MAIN上的大图-->
					</div>
				</div>
				<!--main范围结束-->
				<div style="clear: both"></div>
				<!--工具条开始-->
				<div id="Shearbar">
					<a id="LeftRotate" href="javascript:;">
						<em>
						</em> 向左旋转
					</a>
					<em class="hint L">
					</em>
					<div class="ZoomDist" id="ZoomDist">
						<div id="Zoomcentre">
						</div>
						<div id="ZoomBar">
						</div>
						<span class="progress">
                        </span>
					</div>
					<em class="hint R">
					</em>
					<a id="RightRotate" href="javascript:;">
						向右旋转
						<em>
						</em>
					</a>
					<p class="Psava">
						<a id="againIMG" href="javascript:;">重新选择</a>
						<a id="saveShear" href="javascript:;">保存截图</a>
					</p>
				</div>
				<!--工具条结束-->
			</div>
			<!--primary范围结束-->
			<div style="clear: both"></div>
		</div>
		<!--shearphoto_main范围结束-->

		<!--主功能部份 主功能部份的标签请勿随意删除，除非你对shearphoto的原理了如指掌，否则JS找不到DOM对象，会给你抱出错误-->
	</td>
</tr>
<input name='aihao' type='hidden' id='aihao' maxlength='20' value="无">
<?
	if($groupid==4){
		?>
		<input name='classroom_type' type='hidden' id='classroom_type' maxlength='20' value="音乐教室">
		<?
	}elseif($groupid==5){
		?>
		<input name='pinpai_type' type='hidden' id='teacher_type' maxlength='20' value="乐器品牌">
		<?
	} elseif($groupid==3){
		?>
		<input name='teacher_type' type='hidden' id='teacher_type' maxlength='20' value="音乐老师">
		<?
	}elseif($groupid==2){
		?>
		<input name='music_star' type='hidden' id='music_star' maxlength='20' value="音乐之星">
		<?
	}else{
		?>
		<input name='putong_shenfen' type='hidden' id='putong_shenfen' maxlength='20' value="爱乐人">
		<?
	}
?>
	<?php /*?><?php
	@include($formfile);
	?><?php */?>
	<br>
    <tr>
    	<td></td>
    	<td>
    		<label class="user_agree_wrap" for="user_agreement">
    			<input class="user_agree" id="user_agreement" type="checkbox" checked>我已经认真阅读<a href="">《网站会员注册协议》</a>， 并完全同意所有条款。
    		</label>
    	</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF"> <input class="tijiao" type='submit' name='Submit' value='马上注册'> 
        &nbsp;&nbsp;</td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>