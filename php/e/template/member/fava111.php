<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='我的收藏夹';
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="addnews clearfix">
<form name="form1" method="post" action="">
            	<span class="fl">
                <select name="cid" id="select" class="input_select" onchange=window.location='../fava/?cid='+this.options[this.selectedIndex].value>
                  <option value="0">显示全部</option>
                  <?=$select?>
                </select></span>
                <div class="fr"><a href="FavaClass/" class="button green small">管理收藏夹分类</a></div>
</form>
</div>

<div class="hytable">
<form name=favaform method=post action="../doaction.php" onsubmit="return confirm('确认要操作?');">
 <input type=hidden value=DelFava_All name=enews>
            	<table class="common-table">
							<thead><tr><th></th><th>标题</th><th nowrap="nowrap">点击</th><th nowrap="nowrap">收藏时间</th><th nowrap="nowrap">选择</th></tr></thead>
<?php
			while($fr=$empire->fetch($sql))
			{
				if(empty($class_r[$fr[classid]][tbname]))
				{continue;}
				$r=$empire->fetch1("select title,isurl,titleurl,onclick,classid,id from {$dbtbpre}ecms_".$class_r[$fr[classid]][tbname]." where id='$fr[id]' limit 1");
				//标题链接
				$titlelink=sys_ReturnBqTitleLink($r);
				if(!$r['id'])
				{
					$r['title']="此信息已删除";
					$titlelink="#EmpireCMS";
				}
			?>
							<tr><td class="center"><img src="../../data/images/dir.gif" border=0></td><td><a href="<?=$titlelink?>" target=_blank><?=stripSlashes($r[title])?></a></td><td class="center"><?=$r[onclick]?></td><td class="center"><?=$fr[favatime]?></td><td class="center"><input name="favaid[]" type="checkbox" id="favaid[]2" value="<?=$fr[favaid]?>"></td></tr>
  <?
	}
  ?>
    <tr>
    <td colspan="5" class="noborder"> 
      <?=$returnpage?><select name="cid" class="input_select">
                  <option value="0">请选择要转移的目标分类</option>
                  <?=$select?>
                </select>&nbsp;<input type="submit" name="Submit" value="转移选中" onclick="document.favaform.enews.value='MoveFava_All'" class="button green small">&nbsp; <input type="submit" name="Submit" value="删除选中" onclick="document.favaform.enews.value='DelFava_All'" class="button orange small">
    </td>
  	</tr>
				</table>
</form>
 </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>