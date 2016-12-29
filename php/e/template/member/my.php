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
            	<span class="fl">我的积分信息</span>
</div>
<div class="setting yh">
            	<ul>
                	<li><label>用户ID:</label><?=$user[userid]?></li>
            		<li><label>用户名:</label><?=$user[username]?></li>
            		<li><label>注册时间:</label><?=$registertime?></li>
            		<li><label>会员等级:</label><?=$level_r[$r[groupid]][groupname]?></li>
            		<li><label>剩余有效期:</label><?=$userdate?> 天</li>
                    <li><label>会员积分:</label><?=$r[userfen]?> 点</li>
                    <li><label>帐户余额:</label><?=$r[money]?> 元</li>
                    <li><label>新短消息:</label><?=$havemsg?></li>
            	</ul>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>