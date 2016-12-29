<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='好友列表';
require(ECMS_PATH.'e/template/incfile/header.php');
?>

<?
//--------------- 界面参数 ---------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid=$userid limit 1");
$userpic=$addr['userpic']?$addr['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
$teacher_type=$addr['teacher_type'];
$putong_shenfen=$addr['putong_shenfen'];
$music_star=$addr['music_star'];
$jiaoshi=$addr['jiaoshi'];
$aihao=$addr['aihao'];
$renzheng=$addr['renzheng'];
$sex=$addr['sex'];
$chusheng=$addr['chusheng'];
$address=$addr['address'];
$address1=$addr['address1'];
$address2=$addr['address2'];
$phone=$addr['phone'];
$yaoqing=$addr['yaoqing'];
//---------------------------------------
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid=$userid limit 1");
$userfen=$addr['userfen'];
$groupid=$addr['groupid'];
$userid=$addr['userid'];
$email=$addr['email'];
//公告
$spacegg='';
if($addur['spacegg'])
{
	$spacegg=$addur['spacegg'];
}
//导航菜单
$wznum=0; //文章总数
$dhmenu='';
$modsql=$empire->query("select mid,qmname,tbname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
while($modr=$empire->fetch($modsql))
{
	$num=$empire->num("select id from {$dbtbpre}ecms_$modr[tbname] where userid='$userid'");
	$wznum=$wznum+$num;
	$dhmenu.='<li><a href="/e/space/list.php?userid='.$userid.'&mid='.$modr[mid].'">'.$modr[qmname].'</a></li>';
}
//会员信息
$tmgetuserid=$userid;	//用户ID
$tmgetusername=RepPostVar($username);	//用户名
$tmgetgroupid=$groupid;	//用户组ID
$getuserid=(int)getcvar('mluserid');//当前登陆会员ID
$getusername =getcvar('mlusername');//当前登陆会员名
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}
$follow=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid=$userid");
$feeduserid=explode("::::::",$follow['feeduserid']);
$Diybg=$follow['Diybg']?$follow['Diybg']:$public_r[newsurl].'yecha/blogbg.jpg';
if ($follow['lockBgImg']){
	$lockbg=" fixed";
}
if ($follow['bgsize']){
	$bgsize="background-size:100% 100%;";
}
$bgcolor=$follow['bgcolor']?$follow['bgcolor']:'#b7e3c1';
$Bgalign=$follow['Bgalign']?$follow['Bgalign']:'center';
$repeatBg=$follow['repeatBg']?$follow['repeatBg']:'repeat';
$feedusernum=count($feeduserid)-1; //该会员的关注数
$fsnum=0; //该会员的粉丝数
$fl=$empire->query("select feeduserid from {$dbtbpre}enewsmemberadd order by userid"); 
while($n=$empire->fetch($fl))
{
	$flid=explode("::::::",$n['feeduserid']);
	if (in_array($userid,$flid)){
		$fsnum=$fsnum+1;
	}
}
//增加会员访问记录
if ($getuserid && $getuserid<>$userid){
	$r=$empire->fetch1("select zuijin from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
	if (empty($r['zuijin'])){
		$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$getuserid::::::' where userid='$userid'");
		} else {
		$zuijin=explode("::::::",$r['zuijin']);
		if (in_array($getuserid,$zuijin))
    	{
			$newzuijin=$getuserid."::::::".str_replace($getuserid."::::::","",$r['zuijin']);
			$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$newzuijin' where userid='$userid'");
    	} else{
			$empire->query("update {$dbtbpre}enewsmemberadd set zuijin='$getuserid::::::$r[zuijin]' where userid='$userid'");
		}
	}
}

?>
<?
//相互关注	
$feeduserid=$empire->fetch1("select feeduserid from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
$feeduser_result=explode("::::::",$feeduserid['feeduserid']);
$guan=array();
if($feeduser_result && !empty($feeduser_result)){
	unset($feeduser_result[count($feeduser_result)-1]);
	foreach($feeduser_result as $key=>$val){
		$sql="SELECT feeduserid FROM {$dbtbpre}enewsmemberadd WHERE userid=".$val;
		$result=$empire->fetch1($sql);
		if(!empty($result)){
			$friend_userid=explode("::::::",$result['feeduserid']);
			if(!empty($friend_userid)){
				unset($friend_userid[count($friend_userid)-1]);
				if(!empty($friend_userid)){
					 foreach($friend_userid as $k=>$v){
					 	if($v==$tmgetuserid){
							array_push($guan,$val);
							/*print_r($guan);*/
						}
					 }
				}
			}
		}
	}
}

$guanwhe=join(",",$guan);	//相互关注的老师
if(empty($guanwhe)){
	$guanwhe=0;
}
//相互邀请
$yaoqing=$empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
$feeduser_result=explode("::::::",$yaoqing['yaoqing']);
$guanzhu=array();
if($feeduser_result && !empty($feeduser_result)){
	unset($feeduser_result[count($feeduser_result)-1]);
	foreach($feeduser_result as $key=>$val){
		$sql="SELECT yaoqing FROM {$dbtbpre}enewsmemberadd WHERE userid=".$val;
		$result=$empire->fetch1($sql);
		if(!empty($result)){
			$friend_userid=explode("::::::",$result['yaoqing']);
			if(!empty($friend_userid)){
				unset($friend_userid[count($friend_userid)-1]);
				if(!empty($friend_userid)){
					 foreach($friend_userid as $k=>$v){
					 	if($v==$tmgetuserid){
							array_push($guanzhu,$val);
							/*print_r($guanzhu);*/
						}
					 }
				}
			}
		}
	}
}

$whe=join(",",$guanzhu); //内部的老师
if(empty($whe)){
	$whe=0;
}
//我的关注
$newstrone = substr($feeduserid['feeduserid'],0,strlen($feeduserid['feeduserid'])-1);
$newstrone=explode("::::::",$feeduserid['feeduserid']); //打散为数组
$wheyao=join(",",$newstrone);
$yao = substr($wheyao,0,strlen($wheyao)-1);
if(empty($yao)){
	$yao=0;
}
//别人的申请
$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE feeduserid like '%$userid%' order by a.userid desc";
$list=$empire->query($frie_sql);
while($r=$empire->fetch($list))
{	
$shen=$r['userid'];
$str .= $shen.',';
}
$str = substr($str,0,strlen($str)-1);
if(empty($str)){
	$str=0;
}
?>


<div class="singleMiddle">
		<header class="fixed">
		<div class="header clearfix">
			<span class="selected">我的关注</span>
      <?
      $titi=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid=$userid"); 
	  ?>      
			<span>我的知音<? if($titi[ti_zhiyinfeed]!=0){?><b class="codeMsg listMsg"><?=$titi[ti_zhiyinfeed]?></b><? }?></span>
			<span>我的粉丝<? if($titi[ti_guanzhu]!=0){?><b class="codeMsg listMsg"><?=$titi[ti_guanzhu]?></b><? }?>
           </span>
			<!--<span>我的老师</span>
			<span>我的教室</span>-->
			<!-- 搜索框························· 
				<div class="searchWrap1">
					<div class="search1">
						
						<i class="iconfont">&#xe658;</i>
					</div>
				</div>
			 搜索框结束····················· -->

		</div>
	</header>

	<div id="letter" ></div>
	<!-- 我的关注····························· -->
	<div class="guanzhu1 biaoji sort_box ">
<?
if(empty($yao)){
		echo "您还没有关注好友";	
	}else{
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($yao) and b.userid not in($guanwhe) order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<div class=" xiaoBiaoji sort_list">
			<div class="num_logo">
				<a href="/e/space/?userid=<?=$r[userid]?>">
					<img src="<?=$r[userpic]?>">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
				<div class="name1">
					<a href="/e/space/?userid='.$feeduserid[$i].'">
						<em><?=$r[dengji]?></em>
						<i class="iconfont"><?=$r[renzheng]?></i>
					</a>
				</div>
				<div class="name2">
					<p><?=$r[shenfen]?></p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username=<?=$r[username]?>" class="sixin1">私信</a>
						<a href="/e/space/?userid=<?=$r[userid]?>">取消关注</a>
					</div>
				</div>
</div> 
<?
}
}
?>		

    
    	
	</div>
	<!-- 我的知音·························· -->
	<div class="zhiyin1 biaoji">
<?
if(empty($guanwhe)){
		echo "您还没有知音";	
	}else{
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($guanwhe) order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<div class=" xiaoBiaoji">
			<div class="num_logo">
				<a href="/e/space/?userid=<?=$r[userid]?>">
					<img src="<?=$r['userpic']?>">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r['username']?></a></div>
				<div class="name1">
					<a href="/e/space/?userid=<?=$r[userid]?>">
						<em><?=$r['dengji']?></em>
						<i class="iconfont"><?=$r['renzheng']?></i>
					</a>
				</div>
				<div class="name2">
					<p><?=$r['shenfen']?></p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username=<?=$r[username]?>" class="sixin1">私信</a>
						<a href="/e/space/?userid=<?=$r[userid]?>">取消关注</a>
					</div>
				</div>

			
		</div> 
<?
}
}
?>			
        
        
        
	</div>
	<!-- 我的粉丝························ -->
    <div class="fensi1 biaoji">
		<?php /*?><?php
$flsql=$empire->query("select feeduserid,userid from {$dbtbpre}enewsmemberadd order by userid"); 
$fansnum=0;
while($b=$empire->fetch($flsql))
{	
	$fansid=explode("::::::",$b['feeduserid']);
	$i=1;
	if ($i<=16){
		if (in_array($userid,$fansid)){
		$fans=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$b[userid]' limit 1");
		$fansxx=$empire->fetch1("select * from {$dbtbpre}enewsmember where userid='$b[userid]' limit 1");
		$fanspic=$fans['userpic']?$fans['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
		echo '
		<div class=" xiaoBiaoji">
			<div class="num_logo">
				<a href="/e/space/?userid='.$b[userid].'">
					<img src="'.$fanspic.'">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid='.$b[userid].'">'.$fansxx[username].'</a></div>
				<div class="name1">
					<a href="/e/space/?userid='.$b[userid].'">
						<em>'.$dengji.'</em>
						<i class="iconfont">'.$renzheng.'</i>
					</a>
				</div>
				<div class="name2">
					<p>'.$shenfen.'</p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username='.$fansxx[username].'" class="sixin1">私信</a>
						<a href="/e/space/?userid='.$fansxx[userid].'">取消关注</a>
					</div>
				</div>

			
		</div>
		';
		$i++;
		$fansnum=1;
		}
	} else {
	exit();	
	}
}
	if ($fansnum==0){
		echo '<div class="nogz">暂时还没有'.$me.'的Fans</div>';
		}
?><?php */?>
<?
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($str) and b.userid not in($guanwhe) order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>

<div class=" xiaoBiaoji">
			<div class="num_logo">
				<a href="/e/space/?userid=<?=$r[userid]?>">
					<img src="<?=$r[userpic]?>">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
				<div class="name1">
					<a href="/e/space/?userid=<?=$r[userid]?>">
						<em><?=$r[dengji]?></em>
						<i class="iconfont"><?=$r[renzheng]?></i>
					</a>
				</div>
				<div class="name2">
					<p><?=$r[shenfen]?></p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username=<?=$r[username]?>" class="sixin1">私信</a>
						<a href="/e/space/?userid=<?=$r[userid]?>">关注</a>					</div>
	  </div>
		</div>
<?
}
?>
	</div>
	<!-- 我的老师························ -->
	<!--<div class="zhiyin1 biaoji">
<?
if(empty($guanwhe)){

	}else{
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($guanwhe) and a.groupid=3 order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<div class=" xiaoBiaoji">
			<div class="num_logo">
				<a href="/e/space/?userid='.$feeduserid[$i].'">
					<img src="<?=$r['userpic']?>">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid='.$feeduserid[$i].'"><?=$r['username']?></a></div>
				<div class="name1">
					<a href="/e/space/?userid='.$feeduserid[$i].'">
						<em><?=$r['dengji']?></em>
						<i class="iconfont"><?=$r['renzheng']?></i>
					</a>
				</div>
				<div class="name2">
					<p><?=$r['shenfen']?></p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username=<?=$r[username]?>" class="sixin1">私信</a>
						<a href="/e/space/?userid=<?=$r[userid]?>">取消关注</a>
					</div>
				</div>

			
		</div> 
<?
}
}
?>			
        
        
        
	</div>
	<!-- 我的教室························ -->
	<div class="zhiyin1 biaoji">
<?
if(empty($guanwhe)){

	}else{
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($guanwhe) and a.groupid=4 order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<div class=" xiaoBiaoji">
			<div class="num_logo">
				<a href="/e/space/?userid='.$feeduserid[$i].'">
					<img src="<?=$r['userpic']?>">
				</a>
			</div>
			<div class="num_name"><a href="/e/space/?userid='.$feeduserid[$i].'"><?=$r['username']?></a></div>
				<div class="name1">
					<a href="/e/space/?userid='.$feeduserid[$i].'">
						<em><?=$r['dengji']?></em>
						<i class="iconfont"><?=$r['renzheng']?></i>
					</a>
				</div>
				<div class="name2">
					<p><?=$r['shenfen']?></p>
				</div>
				<div class="codeWrap">
					<div class="beizhu1"><a href="javscript:;"></a></div>
					<div class="sixin">
						<a href="/e/member/msg/AddMsg/?username=<?=$r[username]?>" class="sixin1">私信</a>
						<a href="/e/space/?userid=<?=$r[userid]?>">取消关注</a>
					</div>
				</div>

			
		</div> 
<?
}
}
?>			
        
        
        
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('.header>span').on('click', function(event) {
			$(this).children('.codeMsg').fadeOut(400);
		});
	});
</script>
 
<?php
//重置关注提醒数
$userid   =getcvar('mluserid');
	$zhi=$empire->fetch1("select ti_guanzhu,ti_zhiyinfeed from {$dbtbpre}enewsmember where userid=$userid"); 
	if($zhi[ti_guanzhu]!=0){
		$empire->query("UPDATE {$dbtbpre}enewsmember SET ti_guanzhu = 0 WHERE userid=$userid");
			}
	if($zhi[ti_zhiyinfeed]!=0){
		$empire->query("UPDATE {$dbtbpre}enewsmember SET ti_zhiyinfeed = 0 WHERE userid=$userid");
	}

require(ECMS_PATH.'e/template/incfile/footer.php');
?>