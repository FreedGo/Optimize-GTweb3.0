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
        	<div class="hy_nav">
            	<ul>
                	<li><a href="/e/member/cp/" class="selected">我的信息</a></li>
            		<li><a href="/e/member/EditInfo/">完善资料</a></li>
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php">修改密码</a></li>
           		  <li><a href="/e/member/EditInfo/EditAvator.php">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
            	<ul>
            		<li><label>用户ID</label><?=$user[userid]?></li>
                    <?
                    	if($groupid!=4){
						?>
						<li><label>用户名</label><?=$user[username]?></li>
						<?
						}else{
						?>
						<li><label>机构名称</label><?=$user[username]?></li>
						<?
						}
					?>
            		<li><label>注册时间</label><?=$registertime?></li>
            		<li><label>会员等级</label>
					
                    <?php
            	if($userfen<=100){
                    echo "一级";
                }elseif($userfen<=300){
                	 echo "二级";
                }elseif($userfen<=800){
                	 echo "三级";
                }elseif($userfen<=2000){
                	 echo "四级";
                }elseif($userfen<=5000){
                	 echo "五级";
                }elseif($userfen<=15000){
                	 echo "六级";
                }elseif($userfen<=50000){
                	 echo "七级";
                }elseif($userfen>=100000){
                	 echo "八级";
                }
            ?>
                    </li>
            		<li><label>会员积分</label><?=$userfen?>分</li>
            		<li><label>帐户余额</label><?=$money?> 元</li>
                    <!--<li><label>新消息</label><?=$havemsg?></li>-->
            	</ul>
            </div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>