<?php
if (!defined('InEmpireCMS')) {
    exit();
}
?>
<?php
$public_diyr['pagetitle'] = '注册会员';
$url = "<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;注册会员";
require(ECMS_PATH . 'e/template/incfile/header_1.php');
?>
    <link rel="stylesheet" type="text/css" href="/css/zhuce.css">
    <style>
        .f-l-l{
            float: left;
        }
        .yifasong{
            font:12px/34px 微软雅黑;
            width:150px;
            height:34px;
        }
        .yanzheng-pre,.yanzhengBtn{
            float: left;
            margin-right: 0;
        }
        .yanzhengMarks{
            font:12px/34px 微软雅黑;
        }
    </style>
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/js/language.js"></script>
    <script type="text/javascript" src="/js/findpassword.yanzheng2.js"></script>
    <table class="mainForm" width='1200' border='0' align='center' cellpadding='3' cellspacing='0' class="tableborder">
        <form class="register-form" id="user_info_sub" name=userinfoform method=post enctype="multipart/form-data"
              action=../doaction.php class="newMember">
            <input type=hidden name=enews value=register>
            <tr class="header">
                <td colspan="3">找回密码</td>
            </tr>
            <input name="groupid" type="hidden" id="groupid" value="<?= $groupid ?>">
            <tr>
                <td width='15%' height="25" bgcolor="#FFFFFF">
                    <div align='left'>用户名:</div>
                </td>
                <td width='65%' height="25" bgcolor="#FFFFFF" class="chongfumima">
                    <input name='username' style="float:left;" type='text' id='username' class="yonghuming" maxlength='20' required>
                </td>
                <td width='20%' height="25" bgcolor="#FFFFFF">
                    <span class="tipMsg tipName"></span>
                </td>
            </tr>
            <tr>
                <td width='15%' height=25 bgcolor='ffffff'>手机:</td>
                <td width='65%' bgcolor='ffffff' class="chongfumima">
                    <select name="" id="" class="celltype">
                        <option value="+0" title="选择地区">选地区</option>
                        <option value="+86" title="中国">大陆</option>
                        <option value="+886" title="台湾">台湾</option>
                        <option value="+852" title="香港">香港</option>
                        <option value="+853" title="澳门">澳门</option>
                        <option value="+65" title="新加坡">新加坡</option>
                        <option value="+1" title="美国">美国</option>
                    </select><span class="receiveNum">+0</span>
                    <!-- 区号提交 -->
                    <input class="quxiao" type="hidden" value="+0">
                    <input name='phone' type='text' id='photo' style="float:left;" class="iphoneNum" phone="t" vali maxlength='11' required>
                </td>
                <td width='20%' height="25" bgcolor="#FFFFFF">
                    <span class="tipMsg tipPhone"></span>
                </td>
            </tr>
            <tr>
                <td width='15%' height=25 bgcolor='ffffff'>验证码：</td>
                <td width='65%' bgcolor='ffffff' class="clearfix">
                    <input type="text" class="yanzheng f-l-l" required/>
                    <span class="yifasong f-l-l"></span>
                    <input class="yanzheng-pre f-l-l" type="button" value="获取验证码"/>
                </td>
                <td width='20%' height="25" bgcolor="#FFFFFF">
                    <span class="tipMsg tipMark"></span>
                </td>
            </tr>
            <tr>
                <td height="25" bgcolor="#FFFFFF">
                    <div align='left'>密码：</div>
                </td>
                <td height="25" bgcolor="#FFFFFF" class="chongfumima">
                    <input name='password' style="float:left;" class="password1" type='password' id='password' maxlength='20' required>
                </td>
                <td  height="25" bgcolor="#FFFFFF">
                    <span class="tipMsg tipPassword1"></span>
                </td>
            </tr>
            <tr>
                <td height="25" bgcolor="#FFFFFF">
                    <div align='left'>重复密码：</div>
                </td>
                <td height="25" bgcolor="#FFFFFF" class="chongfumima">
                    <input name='repassword' style="float:left;" type='password' id='repassword' maxlength='20' required>
                </td>
                <td  height="25" bgcolor="#FFFFFF">
                    <span class="tipMsg tipPassword2"></span>
                </td>
            </tr>
            <tr>
                <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="25" bgcolor="#FFFFFF"><input class="tijiao" type='submit' name='Submit' value='确认修改'>
                    &nbsp;&nbsp;</td>
                <td  height="25" bgcolor="#FFFFFF">

                </td>
            </tr>
        </form>
    </table>
<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>