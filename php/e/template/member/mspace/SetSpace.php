<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='空间设置';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;设置空间";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
        	<div class="hy_nav">
            	<ul>
            		<li><a href="/e/member/mspace/SetSpace.php" class="selected">空间设置</a></li>
<li><a href="/e/member/mspace/SetDIY.php">个性化设置</a></li>
            		<li><a href="/e/member/mspace/ChangeStyle.php">模板选择</a></li>
                    <li><a href="/e/member/mspace/gbook.php">空间留言</a></li>
            		<li><a href="/e/member/mspace/feedback.php">空间反馈</a></li>
                    <li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>" target="_blank">预览空间</a></li>
            	</ul>
            </div>
            <form name="setspace" method="post" action="index.php">
            <div class="setting yh">
            	<ul>
            		<li><label>空间名称</label><input name="spacename" type="text" id="spacename" value="<?=$addr[spacename]?>" class="input_text"></li>
                    <li><label>空间公告</label><textarea name="spacegg" cols="60" rows="6" class="input_area"><?=$addr[spacegg]?></textarea></li>
                    <li><label></label><input type='submit' name='Submit' value='保存' class="button blue medium"></li>
            	</ul>
            </div>
            <input name="enews" type="hidden" id="enews" value="DoSetSpace">
            </form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>