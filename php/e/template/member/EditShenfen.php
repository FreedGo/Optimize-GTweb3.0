<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
$IDswap=$addr['IDswap'];

$public_diyr['pagetitle']='选择身份';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
  <link rel="stylesheet" type="text/css" href="/css/xin_base.css">
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/wanshanziliao.css">
    <script type="text/javascript">
        $(function() {
            $('.shenfenxuanzeWrap li:first').css('color', '#cb7047');
            $('.choujiang').click(function(event) {
                $(this).addClass('zhong').parent('li').css('color', '#cb7047').siblings('li').css('color', '#999').children('.choujiang').removeClass('zhong');
            });
            $('.tjsf').click(function(event) {
               
            });

        });

    </script>
        	<div class="hy_nav">
            	<ul>
                	<li><a href="/e/member/cp/">我的信息</a></li>
            		<li><a href="/e/member/EditInfo/">完善资料</a></li>
            		<li><a href="/e/member/EditInfo/EditSafeInfo.php" >修改密码</a></li>
                        <li><a href="/e/member/EditInfo/EditShenfen.php" class="selected">选择身份</a></li>
           		  <li><a href="/e/member/EditInfo/EditAvator.php">修改头像</a></li>
            	</ul>
            </div>
            <div class="setting yh">
    <!--<form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
    <input type=hidden name=enews value=EditSafeInfo>
            	<ul>
                    <li><label>用户名</label><?=$user[username]?></li>
                    <li><label>原密码</label><input name='oldpassword' type='password' id='oldpassword' size="38" maxlength='20' class="input_text"> (修改密码或邮箱时需要密码验证)</li>
                    <li><label>新密码</label><input name='password' type='password' id='password' size="38" maxlength='20' class="input_text"> (不想修改请留空)</li>
                    <li><label>确认新密码</label><input name='repassword' type='password' id='repassword' size="38" maxlength='20' class="input_text"> (不想修改请留空)</li>
                    <li><label>邮箱</label><input name='email' type='text' id='email' value='<?=$user[email]?>' size="38" maxlength='50' class="input_text"></li>
            		<li><label></label><input type='submit' name='Submit' value='保存信息' class="button blue medium"></li>
            	</ul>
                </form>-->
                <div class="shenfenxuanzeWrap">
<form name="ChRegForm" method="POST" action="shenfen.php">
	<input type="hidden" name="userid" value="<?=$userid?>">
            <ul class="clearfix">
                <li><b></b>
                    <div class="codePic"><i class="i_01"></i></div>
                    <h2>普通会员</h2>
                    <div class="miaoshu">适合学生，家长， 喜欢音乐的朋友申请。</div>
                    <input type="radio" name="groupid" id="pthy" value="1" >
                    <label class="choujiang zhong" for="pthy">立即选择</label>
                </li>
                <li><b></b>
                    <div class="codePic"><i class="i_02"></i></div>
                    <h2>音乐名人</h2>
                    <div class="miaoshu">适合各乐器项目表现优异或获奖选手。</div>
                    <input type="radio" id="yyzx" name="groupid" value="2">
                    <label class="choujiang" for="yyzx">立即选择</label>
                </li>
                <li><b></b>
                    <div class="codePic"><i class="i_03"></i></div>
                    <h2>音乐老师</h2>
                    <div class="miaoshu">适合全职或兼职的从事音乐教育的人士申请。</div>
                     <input type="radio" id="yyls" name="groupid" value="3">
                    <label class="choujiang" for="yyls">立即选择</label>
                </li>
                <li><b></b>
                    <div class="codePic"><i class="i_04"></i></div>
                    <h2>音乐教室</h2>
                    <div class="miaoshu">适合培训中心， 琴行申请。</div>
                    <input type="radio" id="yyjs" name="groupid" value="4">
                    <label class="choujiang" for="yyjs">立即选择</label>
                </li>
            </ul>
            <div class="tixing">
            	<?
                	if($IDswap!=0){
						echo "您剩余修改身份机会为：".$IDswap."次，请慎重操作！";
					}else{
						echo "您当前已无修改身份，如需增加修改机会请与客服联系！";
					}
				?>
            </div>
            	<?
            	if($IDswap!=0){
					echo "<button class='tjsf'>提交</button>";
				}
				?>
            </form>
        </div>
        
            </div>
            
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>