<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='我的私信列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;消息列表&nbsp;&nbsp;(<a href='AddMsg/?enews=AddMsg'>发送消息</a>)";
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
            		<li><a href="/e/member/msg/" class="selected">我的私信</a></li>
            		<li><a href="/e/member/msg/AddMsg/?enews=AddMsg">发送私信</a></li>
            	</ul>
            </div>
        	<div class="hytable yh">
            	<table class="common-table">
                <form name="listmsg" method="post" action="../doaction.php" onsubmit="return confirm('确认要删除?');">
							<thead><tr><th></th><th>标题</th><th class="center">发送者</th><th class="center">发送时间</th><th class="center">操作</th></tr></thead>
                             <?php
			while($r=$empire->fetch($sql))
			{
				$img="haveread";
				if(!$r[haveread])
				{$img="nohaveread";}
				//后台管理员
				if($r['isadmin'])
				{
					$from_username="<a title='后台管理员'><b>".$r[from_username]."</b></a>";
				}
				else
				{
					$from_username="<a href='../ShowInfo/?userid=".$r[from_userid]."' target='_blank'>".$r[from_username]."</a>";
				}
				//系统信息
				if($r['issys'])
				{
					$from_username="<b>系统消息</b>";
					$r[title]="<b>".$r[title]."</b>";
				}
			?>
			<tr bgcolor="#FFFFFF"> 
              <td class="center">
                  <input name="mid[]" type="checkbox" id="mid[]2" value="<?=$r[mid]?>">
              </td>
              <td><img src="../../data/images/<?=$img?>.gif" border=0 class="msgico">
                    <a href="ViewMsg/?mid=<?=$r[mid]?>"> 
                      <?=stripSlashes($r[title])?>
                      </a>
              </td>
              <td class="center">
                  <?=$from_username?>
              </td>
              <td class="center">
                  <?=$r[msgtime]?>
             </td>
              <td class="center del"><a href="../doaction.php?enews=DelMsg&mid=<?=$r[mid]?>" onclick="return confirm('确认要删除?');">删除</a></td>
            </tr>
            <?php
			}
			?>
            <tr> 
              <td class="center">
                  <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
              </td>
              <td colspan="4"><input type="submit" name="Submit2" value="删除选中" class="button green small"> 
                <input name="enews" type="hidden" value="DelMsg_all"></td>
            </tr>
            <tr> 
              <td colspan="5" class="center noborder"> 
                <?=$returnpage?>
              </td>
            </tr>
            <tr> 
              <td colspan="5" class="center noborder">说明：<img src="../../data/images/nohaveread.gif"> 
                  代表未阅读消息，<img src="../../data/images/haveread.gif"> 
                  代表已阅读消息.</td>
            </tr>
                </form>
				</table>
            </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>