<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//位置
$url="$spacename &gt; 留言";
include("header.temp.php");
$viewuid=(int)getcvar('mluserid');
$adminmenu='';
if($viewuid==$userid)
{
	$adminmenu="<a href='../member/mspace/gbook.php' target='_blank' class='button green small'>管理留言</a>";
}
?>
<div class="main">
<div class="hygbook yh">
<h3><?=$adminmenu?><?=$me?>的留言</h3>
	<div class="addgbook">
    	<form name="addgbook" method="post" action="../member/mspace/index.php">
      <input name="uname" type="hidden" id="uname" value="<?=getcvar('mlusername')?>">
	  <input type="hidden" name="userid" value="<?=$userid?>">
	  <input type="hidden" name="enews" value="AddMemberGbook">
      <textarea name="gbtext" cols="60" rows="5" id="saytext" class="input_area"></textarea>
      <div class="plsub"><span><a href="javascript:void()" onclick="addface()"><em class="ico_face"></em>添加表情</a><div class="face" style="display: none; "></div>&nbsp;&nbsp;<input name="isprivate" type="checkbox" id="isprivate" value="1"> 私密</span><input name="" type="submit" value="发表留言" class="button small green yh"></div>
      	</form>
    </div>
	<div class="hygbooklist">
    	<ul>
<?php
	if (empty($hylynum)){
		echo '<div class="nogz">暂时还没有给'.$me.'的留言!</div>';	
	} else {
			while($r=$empire->fetch($sql))
	{
		if($r['uid'])
		{
		}
		//管理菜单
		$adminlink='';
		$ip='';
		if($adminmenu)
		{
			$ip=' IP: '.$r[ip];
			$adminlink='<div class="fr"><a href="../member/mspace/ReGbook.php?gid='.$r[gid].'" class="c390 regbook">回复</a> / <a href="../member/mspace/?enews=DelMemberGbook&gid='.$r[gid].'" class="c390 delgbook" onclick="return confirm(\'确认要删除?\');">删除</a></div>';
		}
		$gbuname=$r[uname]." 留言于".$r[addtime].$ip;
		//私密
		if($r['isprivate'])
		{
			if($adminmenu||($r[uid]&&$viewuid==$r[uid]))
			{
				$r['gbtext']="<font color='blue'>[悄悄话::>_<::] ".RepPltextFace($r['gbtext'])."</font>";
			}
			else
			{
				$r['gbtext']='[悄悄话隐藏起来咯~~Y(^_^)Y]';
			}
		}
		echo $r[userid];
		$fans=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$r[uid]' limit 1");
		$fanspic=$fans['userpic']?$fans['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	?>
<li>
            <a href="/e/space/?userid=<?=$r[uid]?>" class="avator" target="_blank"><img src="<?=$fanspic?>"></a>
            <span>
            <h4><?=$adminlink?><a href="/e/space/?userid=<?=$r[uid]?>" class="c390" target="_blank"><?=$r[uname]?></a> <abbr class="time" title="<?=$r[addtime]?>"><?=$r[addtime]?></abbr> 发表</h4>
            <?=RepPltextFace(nl2br($r['gbtext']))?>
			<?
			if($r['retext'])
			{
			?>
            <div class="rethisgbook">
            	主人回复: <?=nl2br($r['retext'])?>
            </div>
            <?
			}
			?>
            </span>
            </li>
	<?php
	}}
?>
	

 
        </ul>
<div id="ecmspage"><?=$returnpage?></div>
    </div>
</div>
</div>
<?php
include("footer.temp.php");
?>
