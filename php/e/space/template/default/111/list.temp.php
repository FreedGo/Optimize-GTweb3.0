<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//位置
$url="$spacename &gt; $mr[qmname]";
include("header.temp.php");
?>
<div class="main">
<div class="tjbox yh">
<h3><a href="../DoInfo/ChangeClass.php?mid=<?=$mid?>" target="_blank" class="button green small">增加<?=$mr['qmname']?></a><?=$me?>的<?=$mr[qmname]?></h3>
            	<ul>
<?php
	if ($newnum=='0'){
		echo '<div class="nogz">暂时还没有发布'.$mr['qmname'].'!</div>';	
	}
	while($r=$empire->fetch($sql))
	{
		$c=$empire->fetch1("select classname,bclassid,classpath from {$dbtbpre}enewsclass where classid='$r[classid]' limit 1");
		$d=$empire->fetch1("select classname,classpath from {$dbtbpre}enewsclass where classid='$c[bclassid]' limit 1");
		$titleurl=sys_ReturnBqTitleLink($r);//链接
	?>
                	<li>
                    <a href="<?=$titleurl?>" class="newspic" target="_blank"><img src="<?=$r[titlepic]?$r[titlepic]:"/e/data/images/notimg.gif"?>" /></a>
                    <a href="<?=$titleurl?>" class="newstitle c666" target="_blank"><?=$r[title]?></a>
                    <div class="zpxx">
                    	<span class="zpfl"><a href="http://www.52img.cn/<?=$c[classpath]?>/" target="_blank"><?=$c[classname]?></a> - <a href="http://www.52img.cn/<?=$d[classpath]?>/" target="_blank"><?=$d[classname]?></a><br />
                    	<abbr class="time" title="<?=date("Y-m-d H:i:s",$r[newstime])?>"><?=date("Y-m-d H:i:s",$r[newstime])?></abbr>发布</span>
                        124566
                        <div class="renqi">
                    		<em class="cf30"><script src=http://www.52img.cn/e/public/ViewClick/?classid=<?=$r[classid]?>&id=<?=$r[id]?>></script></em> 热度 <span class="cf30"><script src=http://www.52img.cn/e/public/ViewClick/?classid=<?=$r[classid]?>&id=<?=$r[id]?>&down=2></script></span> 评论 <span class="cf30"><script src="http://www.52img.cn/e/public/ViewClick/?classid=<?=$r[classid]?>&id=<?=$r[id]?>&down=5"></script></span> 推荐
                    	</div>
                    </div>
                    </li>
	<?php
	}
	?>
                    <div class="clearfix"></div>
                </ul>
            </div>
</div>

<?php
include("footer.temp.php");
?>
