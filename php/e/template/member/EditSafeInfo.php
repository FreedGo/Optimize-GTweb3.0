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
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php" class="selected">修改密码</a></li>
                        <li><a href="/e/member/EditInfo/EditShenfen.php">选择身份</a></li>
           		  <li><a href="/e/member/EditInfo/EditAvator.php">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
    <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditSafeInfo>
            	<ul>
                    <?
                    	if($groupid!=4){
						?>
						<li class="a1"><label>用户名</label><?=$user[username]?></li>
						<?
						}else{
						?>
						<li class="a1"><label>机构名称</label><?=$user[username]?></li>
						<?
						}
					?>
                    <li><label>原密码</label><input name='oldpassword' type='password' id='oldpassword' size="38" maxlength='20' class="input_text"> (修改密码或邮箱时需要密码验证)</li>
                    <li><label>新密码</label><input name='password' type='password' id='password' size="38" maxlength='20' class="input_text"> (不想修改请留空)</li>
                    <li><label>确认新密码</label><input name='repassword' type='password' id='repassword' size="38" maxlength='20' class="input_text"> (不想修改请留空)</li>
                    <input name='email' type='hidden' id='email' value='123@qq.com' size="38" maxlength='50' class="input_text">
            		<li><label></label><input type='submit' name='Submit' value='保存信息' class="button blue medium"></li>
            	</ul>
                </form>
            </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>