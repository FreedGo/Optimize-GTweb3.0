<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']=$word;
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../friend/?cid=".$fcid.">好友列表</a>&nbsp;>&nbsp;".$word;
require(ECMS_PATH.'e/template/incfile/header.php');
?> 
<div class="addnews clearfix">
            	<span class="fl"><?=$word?></span>
</div>
<form name="form1" method="post" action="../../doaction.php">
<div class="setting yh">
            	<ul>
            		<li><label>用户名:</label><input name="fname" type="text" id="fname" value="<?=$fname?>" class="input_text"></li>
            		<li><label>所属分类</label><select name="cid" class="input_select">
                  <option value="0">不设置</option>
                  <?=$select?>
                </select>
                <a href="../FriendClass/" target="_blank" class="button green small">管理分类</a></li>
            		<li><label>备注</label><input name="fsay" type="text" id="fname3" value="<?=stripSlashes($r[fsay])?>" size="38" class="input_text"></li>
            		<li><label></label><input type='submit' name='Submit' value='提交' class="button blue medium"></li>
            	</ul>
</div>
<input name="enews" type="hidden" id="enews" value="<?=$enews?>">
                <input name="fid" type="hidden" id="fid" value="<?=$fid?>">
                <input name="fcid" type="hidden" id="fcid" value="<?=$fcid?>">
                <input name="oldfname" type="hidden" id="oldfname" value="<?=$r[fname]?>">
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>