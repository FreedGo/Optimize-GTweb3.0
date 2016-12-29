<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='管理留言';
$url="<a href='../../../'>首页</a>&nbsp;>&nbsp;<a href='../cp/'>会员中心</a>&nbsp;>&nbsp;管理留言";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
<div class="hy_nav">
            	<ul>
            		<li><a href="/e/member/mspace/SetSpace.php">空间设置</a></li>
<li><a href="/e/member/mspace/SetDIY.php">个性化设置</a></li>
            		<li><a href="/e/member/mspace/ChangeStyle.php">模板选择</a></li>
                    <li><a href="/e/member/mspace/gbook.php" class="selected">空间留言</a></li>
            		<li><a href="/e/member/mspace/feedback.php">空间反馈</a></li>
                    <li><a href="<?=$public_r['newsurl']?>e/space/?userid=<?=$tmgetuserid?>" target="_blank">预览空间</a></li>
            	</ul>
</div>
<form name="gbookform" method="post" action="index.php" onsubmit="return confirm('确认要删除?');">
<div class="hylylist">
            	<ul>
        <?php 		
		while($r=$empire->fetch($sql))
		{
			$i++;
			$bgcolor=" class='tableborder'";
			if($i%2==0)
			{
				$bgcolor=" bgcolor='#ffffff'";
			}
			$private='';
			if($r['isprivate'])
			{
				$private='*悄悄话* / ';
			}
			$msg='';
			if($r['uid'])
			{
				$msg=" <a href='../msg/AddMsg/?username=$r[uname]' target='_blank' title='寄私信给他'>@</a>";
				$r['uname']="<b><a href='../../space/?userid=$r[uid]' target='_blank'>$r[uname]</a></b>";
			}
			$gbuname=$private.$r[uname].$msg." 留言于 ".$r[addtime];
		?>
                	<li>
                        <div class="hylymsg">
						<?=nl2br($r['gbtext'])?>
                        <?
					if($r['retext'])
					{
					?>
                        <div class="rehylymsg">回复内容:<?=nl2br($r['gbtext'])?></div>
                    <?
					}
					?>
                        </div>
                        <div class="hylyname"><div class="fr"><a href="ReGbook.php?gid=<?=$r[gid]?>" class="button green small" target="_blank">回复</a> <a href="index.php?enews=DelMemberGbook&gid=<?=$r[gid]?>" onclick="return confirm('确认要删除?');" class="button gray small">删除</a></div><input name="gid[]" type="checkbox" id="gid[]" value="<?=$r[gid]?>"> <?=$gbuname?></div>
                    </li>
		  <?
		  }
		  ?>
                </ul>
                <div class="plcz">
                <input type='checkbox' name='chkall' value='on' onClick='CheckAll(this.form)'> <?=$returnpage?> <input type="submit" name="submit" value="批量删除" class="button green small">
                </div>
            </div>
            <input name="enews" type="hidden" id="enews" value="DelMemberGbook_All">
</form>
        
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>