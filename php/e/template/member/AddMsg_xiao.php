<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='发送消息';
$url="<a href=../../../../>首页</a>&nbsp;>&nbsp;<a href=../../cp/>会员中心</a>&nbsp;>&nbsp;<a href=../../msg/>消息列表</a>&nbsp;>&nbsp;发送消息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="hy_nav">
            	<ul>
            		<li><a href="/e/member/xiaoxi/">我的私信</a></li>
            		<li><a href="/e/member/xiaoxi/AddMsg/?enews=AddMsg" class="selected">发送私信</a></li>
            	</ul>
            </div>
<div class="setting yh">
   <form action="../../doaction.php" method="post" name="sendmsg" id="sendmsg">
            	<ul>
                    <li><label>私信标题</label><input name="title" type="text" value="<?=ehtmlspecialchars(stripSlashes($title))?>" class="input_text w180"></li>
                    <li><label>发送给</label><input name="to_username" type="text" id="to_username2" value="<?=$username?>" class="input_text">
                    [<a href="#EmpireCMS" onclick="window.open('../../friend/change/?fm=sendmsg&f=to_username','','width=230,height=460');">选择好友</a>] </li>
                    <li><label>内容</label><textarea name="msgtext" cols="60" rows="12" class="input_area"><?=ehtmlspecialchars(stripSlashes($msgtext))?></textarea></li>
            		<li><label></label><input type='submit' name='Submit' value='发送' class="button blue medium"></li>
                    <input name="enews" type="hidden" id="enews" value="AddMsg">
            	</ul>
  </form>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>