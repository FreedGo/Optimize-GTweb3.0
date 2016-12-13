<?php
if (!defined('InEmpireCMS')) {
    exit();
}
?>
<?php
//查询SQL，如果要显示自定义字段记得在SQL里增加查询字段
$query = "select * from phome_ecms_shop where " . $yhadd . "userid='$user[userid]' and ismember=1" . $add . " and classid=58 order by newstime desc limit $offset,$line";
$sql = $empire->query($query);
//返回头条和推荐级别名称
$ftnr = ReturnFirsttitleNameList(0, 0);
$ftnamer = $ftnr['ftr'];
$ignamer = $ftnr['igr'];
$public_diyr['pagetitle'] = '琴行签约 — 好琴声';
$url = "<a href='../../'>首页</a>&nbsp;>&nbsp;<a href='../member/cp/'>会员中心</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=$mid" . $addecmscheck . "'>管理信息</a>&nbsp;(" . $mr[qmname] . ")";
require(ECMS_PATH . 'e/template/incfile/header.php');
?>
	<link rel="stylesheet" href="/css/privilege_yc_v1.2.css">
    <link rel="stylesheet" href="/css/pay.css">
    <!-- sweetalert2 need -->
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    <script src="/js/es6-promise.min.js"></script> <!-- IE support -->
    <script src="/js/sweetalert2.min.js"></script>
    <!-- sweetalert2 need -->
    <div class="singleMiddle">

    <iframe src="/e/data/html/qinhang/qianyue/different-qinhang-h5.html" width="744px" height="992px" frameborder="0">

    </iframe>
    <div class="cont_two">
        <div class="division_title">充值并提交资料可成为认证琴行教室</div>

        <!--这个是已经充值VIP的人，显示了到期时间以及续费按钮-->
        <div class="sponsor_div1 clearfix">
        <?php
            $r=$empire->fetch1("select * from phome_zjk_pinpai_qianyue where userid=$userid and shopzhuang='已付款' order by id desc limit 1");
                if(!empty($r[userid]) && $r[shengyu]>0){
                    $ner=ceil($r[shengyu]/365);
        ?>
            <div class="sponor1">
                <p class="p1">认证琴行教室会员</p>
                <p class="p1">认证到期时间为：<i class="sponor-icon"></i></p>
                <p class="p2"><?=date('Y-m-d',strtotime('+'.$ner.' year',strtotime($r[ddtime])))?></p>
                <p class="p3"><a id="goBuyVipAgain" target="self" >续费</a></p>
            </div>
            <!--续费vip弹框-->
            <div class="payWrap" id="vipBuyAgain">
                <i class="shutUp iconfont" id="shutUpBtn1">&#xe62e;</i>
                <h2 class="payHead">支付</h2>
                <div class="payContent">
                    <form class="payInfo" method="POST" action="zhifubao/alipayapi.php">
                        <ul>
                            <li class="clearfix"><span class="payLeft">支付项目：</span><span class="payRight1">好琴声琴行教室认证</span></li>
                            <li class="clearfix"><span class="payLeft">收款对象：</span><span class="payRight1">好琴声（上海）网络科技有限公司</span></li>
                            <li class="clearfix"><span class=" epayLeft">支付方式：</span><span class="payRight1">
                                <ol class="clearfix">
                                    <li>
                                        <label for="zhifubao" class="alipay">
                                            <input type="radio" name="pay_way_select" id="zhifubao" checked="checked" class="payWay payWay1">
                                            <a class="payImg payImg1"></a>
                                        </label>
                                    </li>
                                    <li style="display: none">
                                        <label for="weixin" class="txpay">
                                            <input type="radio" name="pay_way_select" id="weixin" class="payWay payWay2">
                                            <a class="payImg payImg2"></a>
                                        </label>
                                    </li>
                                    <li style="display: none">
                                        <label for="ccb" class="ccbpay">
                                            <input type="radio" name="pay_way_select" id="ccb" class="payWay payWay3">
                                            <a class="payImg payImg3"></a>
                                        </label>
                                    </li>
                                    <li style="display: none">
                                      <label for="ofubao" class="twpay">
                                        <input type="radio" name="pay_way_select" id="ofubao" class="payWay payWay4">
                                        <a class="payImg payImg4"></a>
                                      </label>
                                    </li>
                                </ol>
                            </span>
                            </li>
                            <li class="clearfix">
                                <span class="payLeft">支付金额：</span><span class="payRight1">3000元</span></li>
                            <li><input class="goPay" id="payBtn" type="submit" value="去支付"></li>
                        </ul>
                    </form>
                </div>
            </div>
            <!--end -- 这个是已经充值VIP的人，显示了到期时间以及续费按钮-->
            <?
            }else{
            ?>
            <!--这个是首次要充值vip的人，显示了vip充值按钮-->
            <div class="sponor1">
                <p class="p1">立刻充值</p>
                <p class="p1">成为认证琴行教室会员<i class="sponor-icon2"></i></p>
                <p class="p2">享受会员10大权益</p>
                <p class="p5"><lebal><input id="readedAgreedment" type="radio">我已阅读<span id="readAgreement">《琴行教室认证协议》！</span></lebal></p>
                <p class="p3">
                    <a id="goBuyVipOne" class="showAlert" target="_self">立即认证</a></p>
            </div>
            <!--第一次购买vip的付款弹框-->
            <div class="payWrap " id="vipBuyOne">
                <i class="shutUp iconfont" id="shutUpBtn2">&#xe62e;</i>
                <h2 class="payHead">好琴声琴行认证</h2>
                <div class="payContent">
                    <form class="payInfo" method="POST" action="zhifubao/alipayapi.php">
                        <ul>
                            <li class="clearfix">
                                <span class="logo-bg"></span><span class="payRight1 payTitle">平台认证账号服务</span>
                            </li>
<!--                            <li class="clearfix"><span class="payLeft">支付项目：</span><span class="payRight1">好琴声琴行教室会员认证</span></li>-->
                            <!--<li class="clearfix"><span class="payLeft">收款对象：</span><span class="payRight1">好琴声（上海）网络科技有限公司</span></li>-->
                            <li class="clearfix"><span class="">套餐选择：</span><span class="payRight1">
                                <ol class="clearfix">
                                    <li>
                                        <label for="twoYears" class="years-two">
                                            <input type="radio" name="pay_way_select" id="twoYears" checked="checked" class="payTime payTime1">
                                            <a class="payTaoCan on">两年套餐</a>
                                        </label>
                                    </li>
                                    <li >
                                        <label for="oneYears" class="txpay">
                                            <input type="radio" name="pay_way_select" id="twoYears" class="payTime payTime2">
                                            <a class="payTaoCan">一年套餐</a>
                                        </label>
                                    </li>
                                    <li >
                                        <label for="halfYears" class="ccbpay">
                                            <input type="radio" name="pay_way_select" id="halfYears" class="payTime payTime3">
                                            <a class="payTaoCan">季度套餐</a>
                                        </label>
                                    </li>
                                </ol>
                            </span>
                            </li>
<!--                            <li class="clearfix"><span class=" epayLeft">支付方式：</span><span class="payRight1">-->
<!--                                <ol class="clearfix">-->
<!--                                    <li>-->
<!--                                        <label for="zhifubao" class="alipay">-->
<!--                                            <input type="radio" name="pay_way_select" id="zhifubao" checked="checked" class="payWay payWay1">-->
<!--                                            <a class="payImg payImg1"></a>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                    <li style="display: none">-->
<!--                                        <label for="weixin" class="txpay">-->
<!--                                            <input type="radio" name="pay_way_select" id="weixin" class="payWay payWay2">-->
<!--                                            <a class="payImg payImg2"></a>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                    <li style="display: none">-->
<!--                                        <label for="ccb" class="ccbpay">-->
<!--                                            <input type="radio" name="pay_way_select" id="ccb" class="payWay payWay3">-->
<!--                                            <a class="payImg payImg3"></a>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                    <li style="display: none">-->
<!--                                      <label for="ofubao" class="twpay">-->
<!--                                        <input type="radio" name="pay_way_select" id="ofubao" class="payWay payWay4">-->
<!--                                        <a class="payImg payImg4"></a>-->
<!--                                      </label>-->
<!--                                    </li>-->
<!--                                </ol>-->
<!--                            </span>-->
<!--                            </li>-->
                            <li class="clearfix taoCanIntroWarp">
                                <span class="payLeft">套餐内容：</span>
                                <span class="payRight1 taoCanIntroduce">
                                    1. 为期两年的平台认证账号使用权限;<br>
                                    2. 中华好琴声网站颁发的专属认证标志;<br>
                                    3. 中华好琴声网站为签约琴行音质的专属
                                        琴行名片;<br>
                                    4. 中华好琴声网站的各种推广活动的优先
                                        举办权.
                                </span>
                            </li>
                            <li class="clearfix taoCanIntroWarp">
                                <span class="payLeft">套餐内容：</span>
                                <span class="payRight1 taoCanIntroduce">
                                    1. 为期一年的平台认证账号使用权限;<br>
                                    2. 中华好琴声网站颁发的专属认证标志;<br>
                                    3. 中华好琴声网站为签约琴行音质的专属
                                        琴行名片;<br>
                                    4. 中华好琴声网站的各种推广活动的优先
                                        举办权.
                                </span>
                            </li>
                            <li class="clearfix taoCanIntroWarp">
                                <span class="payLeft">套餐内容：</span>
                                <span class="payRight1 taoCanIntroduce">
                                    1. 为期一季度的平台认证账号使用权限;<br>
                                    2. 中华好琴声网站颁发的专属认证标志;<br>
                                    3. 中华好琴声网站为签约琴行音质的专属
                                        琴行名片;<br>
                                    4. 中华好琴声网站的各种推广活动的优先
                                        举办权.
                                </span>
                            </li>
                            <li class="clearfix">
                                <span class="payLeft">套餐价格：</span><span class="payRight1 payPriceTao">3000元/年</span></li>
                            <li><input class="goPay" id="payBtn" type="submit" value="立即购买"></li>
                            <li class="remarks">备注：如认证琴行在签约一个月内,录入琴行学生30名，琴行老师5名。中华好琴声加赠两个解读的网站账号使用权限。
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            
            <?
            }
            ?>
            <!--协议-->
            <div class="payWrap " id="agreement1">
                <i class="shutUp iconfont" id="shutUpBtn3">&#xe62e;</i>
                <h2 class="payHead clearfix">签约认证琴行教室协议 <a class="getAgreement" href="/d/down/qinhang-agreement.pdf" target="_blank" class="downAgreement">点击下载琴行教师签约文档</a></h2>
                <div class="agreemengt-content">
                    <div class="contentIn">
                        <h2>好琴声网络教室合约书</h2>
                        <p>甲方： 好琴声（上海）网络科技有限公司</p>
                        <p>电话 ：021-67356400</p>
                        <p>传真 ：021-67356411</p>
                        <p>地址：上海市金山区枫泾镇枫湾路531号科创小</p>
                        <p>法人代表：陈德鹏</p>
                        <p>指定地区代理商：</p>
                        <p>乙方：</p>
                        <p>教室编号</p>
                        <p>营业执照证号 ：</p>
                        <p>电话：                                   传真 ：                  手机 :</p>
                        <p>法人代表：                               身份证号码：</p>
                        <p>地址：        市        区</p>
                        <p>合约内容 :</p>
                        <p>甲乙双方本着合法、公正、互惠互利的原则，在平等自愿的基础上签订此合同，具体事项如下：</p>
                        <p>一﹑ 签约时间：从     年    月    日  起至       年     月     日止</p>
                        <p>二﹑ 签约地点：¬¬¬___________________</p>
                        <p>三﹑ 网络教室年费：3000元，10月31日前优惠价：1500元 甲方提供网站与APP软件使用</p>
                        <p>四﹑ 网络教室合作方式与流程：</p>
                        <p>4.1  甲方提供网站与APP给签约教室使用 : 可上传教室资料.老师.学生.优秀视频推荐等</p>
                        <p>4.2  注册 : 乙方先于好琴声网站内注册教室</p>
                        <p>标准 : 五张以上照片（门头.前台,合影最好）,门头作为首页,琴行简介联系人名字,电话</p>
                        <p>五﹑网络教室权益</p>
                        <p>好琴声网站正式版和APP，使用一年,具体功能如下：</p>
                        <p>签约	未签约</p>
                        <p>标识	签约点亮标识	未认证标识</p>
                        <p>功能	推荐视频	不限	3个</p>
                        <p>课程中心	不限	3个</p>
                        <p>公告	不限	2个</p>
                        <p>老师	不限	5个</p>
                        <p>学生	不限	50个</p>
                        <p>相册	8张	1张</p>
                        <p>琴房租赁	不限	2个</p>
                        <p>音乐会发布	不限	不限</p>
                        <p>提问	有	没有</p>
                        <p>六﹑付款方式：以  电汇 方式结账；</p>
                        <p>公司名称：好琴声（上海）网络科技有限公司</p>
                        <p>帐    号：31001939342050014079</p>
                        <p>开 户 行：中国建设银行上海市枫泾支行</p>
                        <p>七. 网站发布管理</p>
                        <p>11.1．乙方于网络教室内发布与音乐不相关的文章.图片.视频等,甲方有权直接删除</p>
                        <p>11.2．乙方于网站上发有关政治.色情.暴力….,等内容,所有法律责任归属乙方,若因此造成甲方损失,乙方应全额赔偿甲方,并且承担法律责任.</p>
                        <p>11.3 备注条款：_____________________________________________________________________________</p>


                        <p>本合约书共二页，甲乙双方各执行一份，签名盖章后正式生效（含所有附件），同具法律效力，未来双方若有法律诉讼，一律在合同签订地的法院进行。</p>



                        <p>甲方： 好琴声（上海）网络科技有限公司</p>
                        <p>授权签约代表盖章：</p>
                        <p>签署日期：</p>
                        <p>授权签约代表盖章：</p>
                        <p>乙方：</p>
                        <p>签署日期：</p>
                    </div>

                </div>
            </div>
            <!-- end -- 这个是首次要充值vip的人，显示了vip充值按钮-->
            <script>
                /**
                 * 尝试简单封装getElementById,
                 * @param id {string}
                 * @returns {HTMLElement|Element}
                 */
                function getEleId(id){
                    return document.getElementById(id)|| 0;
                }
                window.onload = function () {
                    var goBuyVipAgainBtn = getEleId('goBuyVipAgain'),
                        goBuyVipOneBtn = getEleId('goBuyVipOne'),
                        buyVipAgainForm = getEleId('vipBuyAgain'),
                        buyVipOneForm = getEleId('vipBuyOne'),
                        closeBtn1 = getEleId('shutUpBtn1'),
                        closeBtn2 = getEleId('shutUpBtn2'),
                        closeBtn3 = getEleId('shutUpBtn3'),//关闭协议的按钮
                        readAgementBtn = getEleId('readAgreement'),//去阅读协议按钮
                        readedAgementBtn = getEleId('readedAgreedment'),//已阅读协议的单选框
                        agreeMent1 = getEleId('agreement1');//协议内容的外框


//                点击续费
                    goBuyVipAgainBtn.onclick = function () {
                        buyVipAgainForm.style.display = 'block';
                    };
//                点击第一次买
                    goBuyVipOneBtn.onclick = function () {
                        if(!readedAgementBtn.checked) {
                            $('.showAlert').click(function () {
//                                if (!swal()){
//                                    alert('请点击同意认证协议!');
//                                    return false;
//                                };
                                swal('请点击同意认证协议!', ' ', 'error').done();
                            });
                            return false;//检测是阅读按钮是否被选中，如果没有选择，不往下执行
                        };
                        $('.showAlert').off('click');
                        buyVipOneForm.style.display = 'block';
                    };
//                点击按钮跳出协议内容
                    readAgementBtn.onclick = function () {
                        agreeMent1.style.display = 'block';
                    };
                    //点击关闭按钮
                    closeBtn1.onclick = function () {
                        buyVipAgainForm.style.display = 'none';
                    };
                    closeBtn2.onclick = function () {
                        buyVipOneForm.style.display = 'none';
                    };
                    closeBtn3.onclick = function () {
                        agreeMent1.style.display = 'none';
                    };
                }
            </script>

        </div>
    </div>
</div>
    <div>
    </div>
<?php
require(ECMS_PATH . 'e/template/incfile/footer.php');
?>