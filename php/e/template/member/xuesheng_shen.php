<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员中心';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>";
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
//我的邀请
$newstrone = substr($yaoqing['yaoqing'],0,strlen($yaoqing['yaoqing'])-1);
$newstrone=explode("::::::",$yaoqing['yaoqing']); //打散为数组
$wheyao=join(",",$newstrone);
$yao = substr($wheyao,0,strlen($wheyao)-1);
if(empty($yao)){
	$yao=0;
}
//别人的申请
$frie_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=3 and yaoqing like '%$userid%' order by a.userid desc";
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


<script type="text/javascript" src="/js/yaoqing.js"></script>

        	<div class="singleMiddle">
		<!-- 老师管理 -->
		<div class="laoshiguanli">
			<div class="www360buy" style="margin:0 auto">
		<div class="hd">
			<ul>
				<li>我的老师</li>
				<li>等待列表</li>
				<li>申请加入</li>
			</ul>
<div class="sousuokuang">
				<input type="text">
				<button class="iconfont sousuo1">&#xe658;</button>
			</div>
		</div>
<div class="bd">
				<!-- 内部老师 -->
                <ul class="lh dengdai">
				<!--<ul class="neibulaoshi">-->
						<!--<li class="huise">
							  <span>状态</span>
							  <span>名称</span>
							  <span>乐器项目</span>
							  <span>加入时间</span>
							  <span>评分</span>
							  <span>操作</span>
						</li>-->
						<!--<li >
							  <span ><a class="lookBtn" href="javascript:;">显示</a></span>
							  <span>
							  	<a href="javascript:;">
							  		<img class="littleImg" src="images/img.png"  alt="">赵钱孙
							  	</a>
							  </span>
							  <span>钢琴</span>
							  <span>2015-1-1</span>
							  <span>5分</span>
							  <span><a href="javascript:;">查看</a><a href="javascript:;">删除</a></span>
						</li>-->
						
				<?
if(empty($whe)){
		echo "您还没有内部老师";	
	}else{
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($whe) and a.groupid=3 order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<li>
		<div class="p-img ld"><a href="/e/space/?userid=<?=$r[userid]?>"><img src="<?=$r[userpic]?>" ></a>  </div>
		<div class="p-name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
	<div class="sixinWrap  p-price clearfix">
                	<?php				
                        	if ($getuserid!=$r[userid]){
								$f=$empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$r[getuserid]'");
								$fduserid=explode("::::::",$f['yaoqing']);
								if (in_array($r[userid],$fduserid)){
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small orange" id="follow'.$r[userid].'" title="取消申请">取消申请</a>';
								} else{
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small" id="follow'.$r[userid].'">删除</a>';	
								}
								
								} else {
								$follow='<a href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
							}
				?>
                <?=$follow?>
                
                <a href="javascript:;" class="sixinBtn">私信</a>
                </div>
	</li> 
<?
}
}
?>		
				</ul>
				<!-- 等待列表 -->
				<ul class="lh dengdai">
<!--我的邀请-->
<?
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($yao) and a.groupid=3 and b.userid not in($whe) order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<li>
		<div class="p-img ld"><a href="/e/space/?userid=<?=$r[userid]?>"><img src="<?=$r[userpic]?>" ></a>  </div>
		<div class="p-name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
	<div class="sixinWrap  p-price clearfix">
                	<?php				
                        	if ($getuserid!=$r[userid]){
								$f=$empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$r[getuserid]'");
								$fduserid=explode("::::::",$f['yaoqing']);
								if (in_array($r[userid],$fduserid)){
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small orange" id="follow'.$r[userid].'" title="取消邀请">取消申请</a>';
								} else{
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small" id="follow'.$r[userid].'">取消申请</a>';	
								}
								
								} else {
								$follow='<a href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
							}
				?>
                <?=$follow?>
                
                <a href="javascript:;" class="sixinBtn">私信</a>
                </div>
	</li>
<?
}
?>
<!--别人申请-->
<?
$userid=$userid."::::::";
$friend2_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=3 and b.yaoqing like '%$userid%' and b.userid not in($whe) and b.userid not in($yao) order by a.userid desc";

$list2=$empire->query($friend2_sql);
while($r=$empire->fetch($list2))
{	   	
?>
<li>
		<div class="p-img ld"><a href="/e/space/?userid=<?=$r[userid]?>"><img src="<?=$r[userpic]?>" ></a>  </div>
		<div class="p-name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
	<div class="sixinWrap  p-price clearfix">
                	<?php				
                        	if ($getuserid!=$r[userid]){
								$f=$empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$r[getuserid]'");
								$fduserid=explode("::::::",$f['yaoqing']);
								if (in_array($r[userid],$fduserid)){
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small orange" id="follow'.$r[userid].'" title="取消申请">取消申请</a>';
								} else{
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small" id="follow'.$r[userid].'">同意</a>';	
								}
								
								} else {
								$follow='<a href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
							}
				?>
                <?=$follow?>
                
                <a href="javascript:;" class="sixinBtn">私信</a>
                </div>
	</li>
<?
}
?>
					<div class="new-code" style="float: left;width: 100%;font: 14px/40px 微软雅黑;padding-left: 10px;">
						此处显示的是你已经发出的邀请或者别人的邀请，等待同意。
					</div>		
				</ul>
				<!-- 邀请老师列表 -->
				<ul class="lh dengdai">
<?
$friend_sql="select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($guanwhe) and a.groupid=3 and b.userid not in($yao) and b.userid not in($str) and b.userid not in($whe) order by a.userid desc";
$list=$empire->query($friend_sql);
while($r=$empire->fetch($list))
{	   	
?>
<li>
		<div class="p-img ld"><a href="/e/space/?userid=<?=$r[userid]?>"><img src="<?=$r[userpic]?>" ></a>  </div>
		<div class="p-name"><a href="/e/space/?userid=<?=$r[userid]?>"><?=$r[username]?></a></div>
	<div class="sixinWrap  p-price clearfix">
                	<?php				
                        	if ($getuserid!=$r[userid]){
								$f=$empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$r[getuserid]'");
								$fduserid=explode("::::::",$f['yaoqing']);
								if (in_array($r[userid],$fduserid)){
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small orange" id="follow'.$r[userid].'" title="取消邀请">取消邀请</a>';
								} else{
								$follow='<a href="javascript:void()" onclick="follow('.$r[userid].')" class="button yiyaoqingBtn blue small" id="follow'.$r[userid].'">申请</a>';	
								}
								
								} else {
								$follow='<a href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
							}
				?>
                <?=$follow?>
                
                <a href="javascript:;" class="sixinBtn">私信</a>
                </div>
	</li>
<?
}
?>
					<div class="new-code" style="float: left;width: 100%;font: 14px/40px 微软雅黑;padding-left: 10px;">
						您可以和他人互相关注成为知音，就可以申请成为他的学生。
					</div>
				</ul>			
		</div>
	</div>
		<!-- 调用slide的js语句 -->
		<script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
		<script type="text/javascript">jQuery(".www360buy").slide({delayTime:0 });</script>
		<!-- 调用slide的js语句结束 -->


		</div>
		<!-- 知音动态区域·················································· -->


	</div>

<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>