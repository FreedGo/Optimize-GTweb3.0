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
            		<li><a href="/e/member/EditInfo/">完善资料</a></li>
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php">修改密码</a></li>
                    <li><a href="/e/member/EditInfo/EditShenfen.php">选择身份</a></li>
           		  <li><a href="/e/member/EditInfo/EditAvator.php" class="selected">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
<form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditInfo>
            	<ul>
					<li>
<div id="avator"></div>

                    </li>
            	</ul>
                </form>
            </div>
<script type="text/javascript" src="/e/extend/avator/scripts/swfobject.js"></script>
<script type="text/javascript" src="/e/extend/avator/scripts/fullAvatarEditor.js"></script>
<script type="text/javascript">
swfobject.addDomLoadEvent(function () {
				var swf = new fullAvatarEditor("/e/extend/avator/fullAvatarEditor.swf", "/e/extend/avator/expressInstall.swf", "avator", {
					   id : 'avator',
						upload_url : '/e/extend/avator/savepic.php',	//上传接口
						method : 'post',	//传递到上传接口中的查询参数的提交方式。更改该值时，请注意更改上传接口中的查询参数的接收方式
						src_upload : 0,		//是否上传原图片的选项，有以下值：0-不上传；1-上传；2-显示复选框由用户选择
						avatar_box_border_width : 0,
                        src_upload:0,
                        tab_visible:false,
                        // src_url:'<?=$userpic?>',
                        src_size:'5MB',
						browse_tip:'仅支持JPG、JPEG、GIF、PNG格式的图片文件\n文件不能大于5MB',
                        button_cancel_text:'重选图片',
						avatar_sizes : '200*200',
						avatar_scale : 2,
						avatar_sizes_desc : '400*400像素'
					}, function (msg) {
						switch(msg.code)
						{
							case 1 : break;//alert("页面成功加载了组件！");
							case 2 : 
								//alert("已成功加载图片到编辑面板。");
								//document.getElementById("upload").style.display = "inline";
								break;
							case 3 :
								if(msg.type == 0)
								{
									//alert("摄像头已准备就绪且用户已允许使用。");
								}
								else if(msg.type == 1)
								{
									//alert("摄像头已准备就绪但用户未允许使用！");
								}
								else
								{
									//alert("摄像头被占用！");
								}
							break;
							case 5 : 
								if(msg.type == 0)
								{
									if(msg.content.sourceUrl)
									{
										//alert("原图已成功保存至服务器，url为：\n" +　msg.content.sourceUrl+"\n\n" + "头像已成功保存至服务器，url为：\n" + msg.content.avatarUrls.join("\n\n")+"\n\n传递的userid="+msg.content.userid+"&username="+msg.content.username);
									}
									else
									{
										location.reload();
									}
								}
							break;
						}
					}
				);
            });
		</script>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>