<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query="select id,classid,isurl,titleurl,isqf,havehtml,istop,isgood,firsttitle,ismember,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlefont,titlepic,title from ".$infotb." where ".$yhadd."userid='$user[userid]' and ismember=1".$add." order by newstime desc limit $offset,$line";
$sql=$empire->query($query);
//返回头条和推荐级别名称
$ftnr=ReturnFirsttitleNameList(0,0);
$ftnamer=$ftnr['ftr'];
$ignamer=$ftnr['igr'];

$public_diyr['pagetitle']='发布文章';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid".$addecmscheck."'>管理信息</a>&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/template/incfile/header.php');
?>



<form name="add" method="POST" enctype="multipart/form-data" action="/e/DoInfo/ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'16');">
<input type=hidden value=MAddInfo name=enews> <input type=hidden value=58 name=classid> 
              <input name=id type=hidden id="id" value=> 
              <input name=mid type=hidden id="mid" value=16>
            	<ul>
            		<li><label>选择的栏目</label><a href='http://hao.franzsandner.com/jiaoshi/' target=_blank>音乐教室</a>&nbsp;>&nbsp;<a href='http://hao.franzsandner.com/jiaoshi/kecheng/' target='_blank'>课程中心</a>&nbsp;[<a href='ChangeClass.php?mid=16'>重新选择</a>]</li>
  <table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5><tr><td width='16%' height=25 bgcolor='ffffff'>标题</td><td bgcolor='ffffff'><input name="title" type="text" size="42" value="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>发布时间</td><td bgcolor='ffffff'>

</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>活动描述</td><td bgcolor='ffffff'><textarea name="intro" cols="60" rows="10" id="intro"></textarea>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>活动费用</td><td bgcolor='ffffff'><input name="price" type="text" id="price" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>活动人数</td><td bgcolor='ffffff'>
<input name="pmaxnum" type="text" id="pmaxnum" value="" size="60">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>开始时间</td><td bgcolor='ffffff'><input name="huodong_1" type="text" id="huodong_1" value="" size="12" onclick="setday(this);">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>结束时间</td><td bgcolor='ffffff'><input name="huodong_2" type="text" id="huodong_2" value="" size="12" onclick="setday(this);">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>市场价格</td><td bgcolor='ffffff'>
<input name="tprice" type="text" id="tprice" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>活动地址</td><td bgcolor='ffffff'><input name="dizhi" type="text" id="dizhi" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>课程种类</td><td bgcolor='ffffff'><select name="ke_type" id="ke_type"><option value="大提琴" selected>大提琴</option><option value="小提琴">小提琴</option><option value="钢琴">钢琴</option><option value="吉他">吉他</option></select></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>课时</td><td bgcolor='ffffff'>
<input name="ke_hour" type="text" id="ke_hour" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>课程时间</td><td bgcolor='ffffff'><input name="ke_week[]" type="checkbox" value="周一">周一<input name="ke_week[]" type="checkbox" value="周二">周二<input name="ke_week[]" type="checkbox" value="周三">周三<input name="ke_week[]" type="checkbox" value="周四">周四<input name="ke_week[]" type="checkbox" value="周五">周五<input name="ke_week[]" type="checkbox" value="周六">周六<input name="ke_week[]" type="checkbox" value="周日">周日</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>省</td><td bgcolor='ffffff'>
<input name="ke_province" type="text" id="ke_province" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>市</td><td bgcolor='ffffff'>
<input name="ke_city" type="text" id="ke_city" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>区</td><td bgcolor='ffffff'>
<input name="ke_area" type="text" id="ke_area" value="" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>任课老师</td><td bgcolor='ffffff'><select name="ke_teacher" id="ke_teacher"><option value="老师1">老师1</option><option value="老师2">老师2</option><option value="老师3">老师3</option><option value="老师4">老师4</option><option value="老师5">老师5</option><option value="老师6">老师6</option></select></td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>活动图片</td><td bgcolor='ffffff'><input type="file" name="titlepicfile" size="45">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>报名人数</td><td bgcolor='ffffff'><input name="psalenum" type="text" id="psalenum" value="" size="60">
</td></tr></table>    <li><label></label><input type='submit' name='Submit' value='发布文章' class="button blue medium"></li>
            	</ul>
</form>





<div>
<div class="addnews clearfix">
  <div class="fr">
<form name="searchinfo" method="GET" action="ListInfo.php">
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>" class="input_text" placeholder="查找您投稿的文章...">
          <select name="show" class="input_select">
            <option value="0" selected="">标题</option>
          </select>
          <input type="submit" name="Submit2" value="搜索" class="button orange small">
		  <input name="sear" type="hidden" id="sear" value="1">
          <input name="mid" type="hidden" value="<?=$mid?>">
		  <input name="ecmscheck" type="hidden" id="ecmscheck" value="<?=$ecmscheck?>">
</form>

        		</div>
</div>
<div class="hy_nav tglist yh">
            	<ul>
                <li>当前信息所属分类:</li>
                <?php
			//输出可管理的模型
			$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
			while($tmodr=$empire->fetch($tmodsql))
			{
				$class="";
				if($tmodr['mid']==$tgetmid)
				{
					$class=" class='selected'";
				}
			?>
            		<li><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=<?=$tmodr['mid']?>"<?=$class?>><?=$tmodr[qmname]?></a></li>
            <?php
			}
			?>
            	</ul>
</div>
<div class="hy_nav hd">
            	<ul>
            		<li><a href="ListInfo.php?mid=<?=$mid?>"<? if($indexchecked==1){echo ' class="on"';}?>>已发布</a></li>
            		<li><a href="ListInfo.php?mid=<?=$mid?>&ecmscheck=1"<? if($indexchecked==0){echo ' class="on"';}?>>待审核</a></li>
            	</ul>
</div>
<div class="hytable">
            	<table class="common-table">
							<thead><tr><th>文章标题</th><th nowrap="nowrap">发布时间</th><th nowrap="nowrap">点击率</th><th nowrap="nowrap">评论</th><th nowrap="nowrap">审核</th><th nowrap="nowrap">操作</th></tr></thead>
 <?
	while($r=$empire->fetch($sql))
	{
		//状态
		$st='';
		if($r[istop])//置顶
		{
			$st.="<font color=red>[顶".$r[istop]."]</font>";
		}
		if($r[isgood])//推荐
		{
			$st.="<font color=red>[".$ignamer[$r[isgood]-1]."]</font>";
		}
		if($r[firsttitle])//头条
		{
			$st.="<font color=red>[".$ftnamer[$r[firsttitle]-1]."]</font>";
		}
		//时间
		$newstime=date("Y-m-d",$r[newstime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,50,false));
		$r[title]=DoTitleFont($r[titlefont],$r[title]);
		if($indexchecked==0)
		{
			$checked='<div class="nocheck"></div>';
			$titleurl='AddInfo.php?enews=MEditInfo&classid='.$r[classid].'&id='.$r[id].'&mid='.$mid.$addecmscheck;//链接
		}
		else
		{
			$checked='<div class="checked"></div>';
			$titleurl=sys_ReturnBqTitleLink($r);//链接
		}
		$plnum=$r[plnum];//评论个数
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='../data/images/showimg.gif' border=0></a>";}
		//栏目
		$classname=$class_r[$r[classid]][classname];
		$classurl=sys_ReturnBqClassname($r,9);
		$bclassid=$class_r[$r[classid]][bclassid];
		$br['classid']=$bclassid;
		$bclassurl=sys_ReturnBqClassname($br,9);
		$bclassname=$class_r[$bclassid][classname];
	?>
							<tr><td>
		<?=$st?>
		<?=$showtitlepic?>
        <a href="<?=$titleurl?>" target=_blank title="<?=$oldtitle?>" class="tgtitle"> 
        <?=$r[title]?></a> 
        <!--<span class="lanmu"><a href='<?=$classurl?>' target='_blank'><?=$classname?></a></span>-->
        </td>
			<td class="center"><?=$newstime?></td><td class="center"><a title="下载次数:<?=$r[totaldown]?>"><?=$r[onclick]?></a></td><td class="center"><a href="<?=$titleurl?>#saypl" title="查看评论" target=_blank><u><?=$plnum?></u></a></td><td class="center"><?=$checked?></td><td class="center"><a href="AddInfo.php?enews=MEditInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>">修改</a> | <a href="ecms.php?enews=MDelInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>" onclick="return confirm('确认要删除?');">删除</a> </td></tr>
  <?
	}
	?>
    <tr> 
    <td colspan="6" class="noborder"> 
    </td>
  	</tr>
				</table>
 </div>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>