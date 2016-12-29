<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<?
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
$company=$addr['company'];
$fuzeren=$addr['fuzeren'];
$telephone=$addr['telephone'];
$measure=$addr['measure'];
$classroom_type=$addr['classroom_type'];
$address=$addr['address'];
$address1=$addr['address1'];
$address2=$addr['address2'];
$shenfenzheng=$addr['shenfenzheng'];
$saytext=$addr['saytext'];

//-------------验证是否完善资料--------------
$ws=$empire->fetch1("select groupid from {$dbtbpre}enewsmember where userid='$userid'");
$ber=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if($ws['groupid']==1){
		if(!empty($ber[sex]) && !empty($ber[aihao]) && !empty($ber[putong_shenfen]) && !empty($ber[chusheng]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[sex]) || empty($ber[aihao]) || empty($ber[putong_shenfen]) || empty($ber[chusheng]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==2){
		if(!empty($ber[sex]) && !empty($ber[aihao]) && !empty($ber[music_star]) && !empty($ber[chusheng]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[sex]) || empty($ber[aihao]) || empty($ber[music_star]) || empty($ber[chusheng]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==3){
		if( !empty($ber[aihao]) && !empty($ber[teacher_type]) && !empty($ber[chusheng]) && !empty($ber[biye]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[addres])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[aihao]) || empty($ber[teacher_type]) || empty($ber[chusheng]) || empty($ber[biye]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[addres])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}elseif($ws['groupid']==4){
		if(!empty($ber[fuzeren]) && !empty($ber[telephone]) && !empty($ber[measure]) && !empty($ber[address]) && !empty($ber[address1]) && !empty($ber[address2]) && !empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '1' WHERE userid =$userid");
		}elseif(empty($ber[fuzeren]) || empty($ber[telephone]) || empty($ber[measure]) || empty($ber[address]) || empty($ber[address1]) || empty($ber[address2]) || empty($ber[saytext])){
		$empire->query("UPDATE phome_enewsmember SET sign = '0' WHERE userid =$userid");	
		}
	}
?>
        	<div class="hy_nav">
            	<ul>
                	<li><a href="/e/member/cp/">我的信息</a></li>
            		<li><a href="/e/member/EditInfo/" class="selected">完善资料</a></li>
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php">修改密码</a></li>
                    <li><a href="/e/member/EditInfo/EditShenfen.php">选择身份</a></li>
           		    <li><a href="/e/member/EditInfo/EditAvator.php">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
            <form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
			    <input type=hidden name=enews value=EditInfo>
			    <input type="hidden" name="ecmsfrom" value="/e/fatie/ListInfo.php?mid=10">
            	<ul>
                    <?
//                    	if($groupid!=4){
//							?>
<!--							<li class="a1"><label>用户名</label>--><?//=$user[username]?><!--</li>-->
<!--							--><?//
//						}elseif($groupid=5){
//							?>
<!--							<li class="a1"><label>品牌名</label>--><?//=$user[username]?><!--</li>-->
<!--							--><?//
//						} else{
//							?>
<!--							<li class="a1"><label>机构名称</label>--><?//=$user[username]?><!--</li>-->
<!--							--><?//
//						}
		                if($groupid ==1||$groupid ==2||$groupid ==3){
                            ?>
                            <li class="a1"><label>用户名：</label><?=$user[username]?></li>
                            <?
		                } elseif($groupid ==4){
			                ?>
			                <li class="a1"><label>琴行名称：</label><?=$user[username]?></li>
			                <?
		                } elseif($groupid ==5){
			                ?>
			                <li class="a1"><label>品牌名称：</label><?=$user[username]?></li>
			                <?
		                }



					?>
                    <input name="aihao" id="aihao" type="hidden" value="无"/>
				    <?php
						@include($formfile);
					?>
            		<li><label></label><input type='submit' name='Submit' value='保存信息' class="button blue medium"></li>
            	</ul>
            </form>
        </div>
		<?php
			require(ECMS_PATH.'e/template/incfile/footer.php');
		?>