<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='收藏夹分类';
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function DelFavaClass(cid)
{
var ok;
ok=confirm("确认要删除?");
if(ok)
{
self.location.href='../../doaction.php?enews=DelFavaClass&cid='+cid;
}
}
</script>
<div class="addnews clearfix">
            	<span class="fl">增加收藏夹分类</span>
</div>
<div class="setting yh">
<form name="form1" method="post" action="../../doaction.php">
<input name="enews" type="hidden" id="enews" value="AddFavaClass">
            	<ul>
            		<li><label>增加分类</label><input name="cname" type="text" id="cname" class="input_text"><input type="submit" name="Submit" value="增加" class="button green small ml10"></li>
            	</ul>
</form>
            </div>
<div class="hytable">
            	<table class="common-table">
							<thead><tr><th>ID</th><th nowrap="nowrap">分类名称</th><th nowrap="nowrap">操作</th></tr></thead>
<?php
		while($r=$empire->fetch($sql))
		{
		?>
          <form name=form method=post action=../../doaction.php>
          <tr><td class="center"><?=$r[cid]?></td><td class="center">
				  <input name="enews" type="hidden" id="enews" value="EditFavaClass">
                  <input name="cid" type="hidden" value="<?=$r[cid]?>">
                  <input name="cname" type="text" id="cname" value="<?=$r[cname]?>" class="input_text"></td><td class="center"><input type="submit" name="Submit2" value="修改" class="button green small">
                  &nbsp; 
                  <input type="button" name="Submit3" value="删除" onclick="javascript:DelFavaClass(<?=$r[cid]?>);" class="button orange small"></td></tr>
          </form>
		<?php
		}
		?>
				</table>

 </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>