<?php
if (!defined('InEmpireCMS')) {
    exit();
}
//会员信息
$tmgetuserid = $userid;    //用户ID
$tmgetusername = RepPostVar($username);    //用户名
$tmgetgroupid = $groupid;    //用户组ID
$getuserid = (int)getcvar('mluserid');//当前登陆会员ID
$getusername = getcvar('mlusername');//当前登陆会员名
//位置
$url = "$spacename &gt; 首页";
include("header.temp.php");
$registertime = eReturnMemberRegtime($ur['registertime'], "Y-m-d H:i:s");
//oicq
if ($addur['oicq']) {
    $addur['oicq'] = "<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=" . $addur['oicq'] . "&amp;Site=" . $public_r['sitename'] . "&amp;Menu=yes' target='_blank'><img src='http://wpa.qq.com/pa?p=1:" . $addur['oicq'] . ":4'  border='0' alt='QQ' />" . $addur['oicq'] . "</a>";
}
//简介
$usersay = $addur['saytext'] ? $addur['saytext'] : '暂无简介';
$usersay = RepFieldtextNbsp(stripSlashes($usersay));
?>

<?php
//微信分享相关
require_once "../weixin/jssdk.php";
$jssdk = new JSSDK("wx61344f87c60e6c9c", "0a00f48e715df119e22583b2c4ec9a43");
$signPackage = $jssdk->GetSignPackage();
?>



<?

//获取我的关注	
$feeduserid = $empire->fetch1("select feeduserid from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
$feeduser_result = explode("::::::", $feeduserid['feeduserid']);
$guanzhu = array();
if ($feeduser_result && !empty($feeduser_result)) {
    unset($feeduser_result[count($feeduser_result) - 1]);
    foreach ($feeduser_result as $key => $val) {
        $sql = "SELECT feeduserid FROM {$dbtbpre}enewsmemberadd WHERE userid=" . $val;
        $result = $empire->fetch1($sql);
        if (!empty($result)) {
            $friend_userid = explode("::::::", $result['feeduserid']);
            if (!empty($friend_userid)) {
                unset($friend_userid[count($friend_userid) - 1]);
                if (!empty($friend_userid)) {
                    foreach ($friend_userid as $k => $v) {
                        if ($v == $tmgetuserid) {
                            array_push($guanzhu, $val);

                        }
                    }
                }
            }
        }
    }
}

//获取老师和学生id
//$userid;//被访问的id
$dangid = getcvar('mluserid');     //当前id
$dangidfu = $dangid;
if (empty($dangid)) {
    $dangid = 0;
}
if ($dangid != 0) {

    $kb = $empire->fetch1("select yaoqing from phome_enewsmemberadd where userid=$userid limit 1");
    $frid = explode("::::::", $kb[yaoqing]);
    foreach ($frid as $key => $val) {
        //echo $frid[$key]."<br>";

        if ($frid[$key] == $dangidfu) { //该老师或教室邀请过我
            //查询我是否加入该老师或教室
            $feeb = $empire->fetch1("select yaoqing from phome_enewsmemberadd where userid=$dangidfu limit 1");
            $frid_w = explode("::::::", $feeb[yaoqing]);
            foreach ($frid_w as $key => $val) {
                if ($frid_w[$key] == $userid) {
                    $zjj = 11;
                }
            }

        }
    }
}
?>
    <script type="text/javascript">
        $(function () {
            // 教室多图展示
            jQuery(".focusBox").hover(function () {
                jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.2)
            }, function () {
                jQuery(this).find(".prev,.next").fadeOut()
            });
            /*SuperSlide图片切换*/
            jQuery(".focusBox").slide({
                mainCell: ".pic",
                effect: "fold",
                autoPlay: false,
                delayTime: 600,
                trigger: "click"
            });
//                隐藏图片
            $('.jiaoshi_shows_down').hide();
            $('.focusBox').hide();
//                控制相册显示与隐藏
            $('.jiaoshiImg').on('click', function (event) {
                // event.preventDefault();
                $('.jiaoshi_shows_down').show().css('opacity',1);
                $('.focusBox').show().css('opacity',1);
            });
            $('.shutUp').click(function (event) {
                $('.jiaoshi_shows_down').hide().css('opacity',0);
                $('.focusBox').hide().css('opacity',0);
            });
            $('.jiaoshi_shows_down').click(function (event) {
                $('.focusBox').click(function (event) {
                    return false;
                });
                $(this).hide().css('opacity',0);
                $('.focusBox').hide().css('opacity',0);
            });


        });
    </script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        var TimeStamp,
            NonceStr,
            Signature;
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: '<?php echo $signPackage["timestamp"];?>',
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: ['onMenuShareTimeline',"onMenuShareAppMessage","onMenuShareQQ","onMenuShareQZone",]
        });
        wx.ready(function() {
            // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
            wx.checkJsApi({
                jsApiList : ['onMenuShareTimeline','onMenuShareAppMessage',"onMenuShareQQ","onMenuShareQZone","hideMenuItems"],

            });
            var strTiele="<?= $username ?>的主页-好琴声";
            var strDesc="<?= $address ?><?= $address1 ?><?= $address2 ?><?= $addres ?>";
            // var strLink="URL";
            var strImgUrl="<?= $userpic ?>";
            //分享朋友圈
            wx.onMenuShareTimeline({
                title : strTiele, // 分享标题
                desc : strDesc,//分享描述
                // link : strLink, // 分享链接
                imgUrl: strImgUrl,// 分享图标

            });

            //分享给微信好友
            wx.onMenuShareAppMessage({
                title : strTiele, // 分享标题
                desc : strDesc,//分享描述
                // link : strLink, // 分享链接
                imgUrl: strImgUrl,// 分享图标
            });

            //分享到QQ
            wx.onMenuShareQQ({
                title : strTiele, // 分享标题
                desc : strDesc,//分享描述
                // link : strLink, // 分享链接
                imgUrl: strImgUrl,// 分享图标
            });

            //分享到QQ空间
            wx.onMenuShareQZone({
                title : strTiele, // 分享标题
                desc : strDesc,//分享描述
                // link : strLink, // 分享链接
                imgUrl: strImgUrl,// 分享图标
            });
        });
    </script>
    <div class="bodyWrap clearfix">
        <link rel="stylesheet" type="text/css" href="/css/xin_yinyueguangchang.css">
        <!-- 左边二级导航列···················································· -->
        <div class="leftWrap jiaoshiRight">
            <div class="login_Hou">
                <a href="<?= $public_r['newsurl'] ?>e/space/?userid=<?= $userid ?>">
                    <div class="touxiang"><img src="<?= $userpic ?>"></div>
                </a>
                <div class="uesrID">
                    <h2 class="username"><?= $username ?></h2>
                    <?
                    if ($cked == 1) {
                        echo "<i class='iconfont newRenZheng'></i>";
                    }
                    ?>
                </div>
                <div class="qianyue"><?= $jiaoshi ?></div>
                <div class="shenfen1"><em>类型：</em><span><?
                        if ($groupid == 1) {
                            echo $putong_shenfen;//普通会员默认爱乐人
                        } elseif ($groupid == 2) {
                            echo $music_star;//音乐之星
                        } elseif ($groupid == 3) {
                            echo $teacher_type;//音乐老师
                        } elseif ($groupid == 4) {
                            echo "音乐教室";
                        }
                        ?></span></div>
                <div class="dengji"><em>等级：</em><span>
                					<?
                                    if ($userfen <= 100) {
                                        echo "一级";
                                    } elseif ($userfen <= 300) {
                                        echo "二级";
                                    } elseif ($userfen <= 800) {
                                        echo "三级";
                                    } elseif ($userfen <= 2000) {
                                        echo "四级";
                                    } elseif ($userfen <= 5000) {
                                        echo "五级";
                                    } elseif ($userfen <= 15000) {
                                        echo "六级";
                                    } elseif ($userfen <= 50000) {
                                        echo "七级";
                                    } elseif ($userfen >= 100000) {
                                        echo "八级";
                                    }
                                    ?>
                </span></div>

                <div class="guanzhu clearfix">
                    <?
                    $s = $empire->fetch1("select follownum,feednum from {$dbtbpre}enewsmemberadd where userid='$userid'");
                    ?>
                    <div class="inguanzhu"><em>关注</em><span><?= $s[feednum] ?></span></div>
                    <div class="fensi"><em>粉丝</em><span><?= $s[follownum] ?></span></div>
                </div>
            </div>
        </div>
        <!-- 左边二级导航列结束················································ -->

        <!-- 中间内容部分······················································ -->
        <div class="rightWrap jiaoshiLeft clearfix">
            <div class="rightBan">
                <div class="mianbaoNav">
                </div>
                <div class="saishiMsg">
                    <img class="jiaoshiImg" src="<?= $userpic ?>">
                    <div class="inMsg">
                        <ul>
                            <li class="jiaoshiming clearfix">
                                <a class="jiacu" href="<?= $public_r['newsurl'] ?>e/space/?userid=<?= $userid ?>"><?= $username ?></a>
                                <?
                                if ($cked == 1) {
                                    echo "<img src='/images/yirenzheng.png'>";
                                } else {
                                    echo "<img src='/images/weirenzheng.png'>";
                                }
                                ?>

                            </li>
                            <li><i class="star"></i><i class="star"></i><i class="star"></i><i class="star"></i><i
                                    class="star"></i></li>
                            <li></li>
                            <li><span>粉丝数(<?= $s[follownum] ?>)</span>
                                <!-- <span>学生数(80)</span>-->
                                <span>发帖数(
                                    <?php
                                    $count = mysql_query("select count(*) from  phome_ecms_photo where userid='$userid'");
                                    while ($tmp = mysql_fetch_row($count)) {
                                        print $tmp[0];
                                    }
                                    ?>
                                    )</span>
                                <span>评论数(
                                    <?php
                                    $count = mysql_query("select count(*) from phome_enewspl_1 where userid='$userid'");
                                    while ($tmp = mysql_fetch_row($count)) {
                                        print $tmp[0];
                                    }
                                    ?>
                                    )</span></li>
                            <li><span><?
                                    if ($groupid == 3) {
                                        echo "老师类型：";
                                    } elseif ($groupid == 4) {
                                        echo "机构电话：";
                                    }
                                    ?>
                    </span><span>
						<?
                        if ($groupid == 1) {
                            echo $putong_shenfen;//普通会员默认爱乐人
                        } elseif ($groupid == 2) {
                            echo $music_star;//音乐之星
                        } elseif ($groupid == 3) {
                            echo $teacher_type;//音乐老师
                        } elseif ($groupid == 4) {
                            echo $telephone;
                        }
                        ?>
                        </span></li>
                            <li><span>地址：</span><i><?= $address ?><?= $address1 ?><?= $address2 ?><?= $addres ?></i>
                            </li>
                            <li><span>空间：</span><!-- <span><?= $userid ?></span> -->

                                <span><a class="tadekongjian" href="/e/space/template/kongjian/?userid=<?= $userid ?>"
                                         class="jiacu"><?= $username ?>的空间</a></span></li>
                        </ul>
                    </div>
                    <div class="canyu laojiao">
                        <ul><?= $r[feeduserid] ?>
                            <li class="baomingrenshu">

                                <?php
                                if ($getuserid != $userid) {
                                    $f = $empire->fetch1("select feeduserid from {$dbtbpre}enewsmemberadd where userid='$getuserid'");
                                    $fduserid = explode("::::::", $f['feeduserid']);
                                    if (in_array($userid, $fduserid)) {
                                        $follow = '<a href="javascript:void()" style="padding: 0" onclick="follow(' . $userid . ')" class="button blue small orange" id="follow' . $userid . '" title="取消关注">取消关注</a>';
                                    } else {
                                        $follow = '<a href="javascript:void()" style="padding: 0" onclick="follow(' . $userid . ')" class="button blue small" id="follow' . $userid . '">关注</a>';
                                    }

                                } else {
                                    $follow = '<a style="padding: 0" href="/e/member/EditInfo/" class="button blue small">修改资料</a>';
                                }
                                ?>
                                <?= $follow ?>

                                <a style="padding: 0" href="/e/QA/ListInfo.php?mid=10&username=<?= $username ?>&userid=<?= $userid ?>"
                                   class="button blue small ">提问</a>
                            <li class="clearfix">
                                <!-- <a href="javascript:;"><i class="iconfont">&#xe647;</i><span>收藏</span></a>-->
                                <span>分享：</span>
                                <!-- JiaThis Button BEGIN -->
                                <div class="jiathis_style_32x32">
                                    <a class="jiathis_button_weixin"></a>
                                    <a class="jiathis_button_tsina"></a>
                                    <a class="jiathis_button_qzone"></a>
                                    <a class="jiathis_button_tqq"></a>
                                    <a class="jiathis_button_fb"></a>
                                    </div>
                                <script type="text/javascript" >
                                    var jiathis_config={
                                        data_track_clickback:true,
                                       // summary:"摘要",//摘要
                                        title:"<?= $username ?>的空间——好琴声，音乐人的交流平台！",//标题
                                        pic:"<?= $userpic ?>",//图片
                                    //	url:"url",//url
                                        shortUrl:false,
                                        hideMore:false
                                    }
                                </script>
                                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2111445" charset="utf-8"></script>
                                <!-- JiaThis Button END -->
                            </li>
                        </ul>
                    </div>
                    <div id="qrcodeTable"></div>
                    <script type="text/javascript" src="/js/jquery.qrcode.min.js"></script>
                    <script>
                        //jQuery('#qrcode').qrcode("this plugin is great");
                        jQuery('#qrcodeTable').qrcode({
                            render	: "table",
                            width:164,
                            height:164,
                            text	: "<?= $public_r['newsurl'] ?>e/space/?userid=<?= $userid ?>"
                        });
                    </script>
                </div>
            </div>

            <!-- 第一.全站动态部分············································· -->
            <div class="rightMiddle ">


                <!-- 内容··························· -->
                <div class="qzdtContent">

                    <!-- 第一，当前海选部分····························· -->

                    <div class="yinyuemingren">
                        <!-- 分类行····································· -->
                        <div class="fenlei teacher-space borTop">
                            <?php
                            if ($zjj != 11) {
                                ?>
                                <!-- sweetalert2 need -->
                                <script>
                                    var ieType = document.getElementsByClassName('showAlert');
                                </script>
                                <link rel="stylesheet" href="/css/sweetalert2.min.css">
                                <script src="/js/es6-promise.min.js"></script> <!-- IE support -->
                                <script src="/js/sweetalert2.min.js"></script>
                                <script>
                                    $(function () {
                                        $('.showAlert').on('click', function () {
                                            swal('提示：', '你不是当前琴行内部成员，无法查看，请登录重试或者关注当前琴行后加入琴行!', 'error').done();
                                        });
                                    })
                                </script>
                                <!--.......................-->
                                <?
                                }
                            ?>
                            <ul class="clearfix fenleiFuck">
                                <li class="current"><a href="javascript:;" target="_self">琴行介绍</a><span></span></li>
                                <li><a href="javascript:;" target="_self">推荐视频</a><span></span></li>
                                <li><a href="javascript:;" target="_self">课程中心</a><span></span></li>
                                <li><a href="javascript:;" target="_self">琴房租赁</a><span></span></li>
                                <li class="showAlert"><a href="javascript:;" target="_self">音乐老师</a><span></span></li>
                                <li class="showAlert"><a href="javascript:;" target="_self">全部学员</a><span></span></li>
                                <li><a href="javascript:;" target="_self">琴行动态</a><span></span></li>
                                <li><a href="javascript:;" target="_self">在线直播</a><span></span></li>
                                <li class="discuss-area-btn showAlert"><a href="javascript:;" target="_self">讨论区</a><span></span></li>
                            </ul>
                        </div>
                        <!-- 分类行结束································· -->
                        <!-- 排序行····································· -->

                        <!-- 列表内容区域······························· -->
                        <div class="liebiao">
                            <!-- 介绍评论············································································· -->
                            <?= $id ?>
                            <ul style="display: block" class="liebiaoFuck liebiaoShow clearfix">
                                <div class="jiaoshijieshao">
                                    <?php
                                    $r = $empire->fetch1("select saytext from phome_enewsmemberadd where userid='$userid'");
                                    echo $r[saytext];
                                    ?>
                                </div>
                            </ul>

                            <!-- 推荐视频··············································································· -->
                            <ul class="liebiaoFuck liebiaoShow current jiaoshiVideo clearfix">

                                <?
                                //相互邀请
                                $yaoqing = $empire->fetch1("select yaoqing,tuijian_shi from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
                                $feeduser_result = explode("::::::", $yaoqing['yaoqing']);
                                $guanzhu = array();
                                if ($feeduser_result && !empty($feeduser_result)) {
                                    unset($feeduser_result[count($feeduser_result) - 1]);
                                    foreach ($feeduser_result as $key => $val) {
                                        $sql = "SELECT yaoqing FROM {$dbtbpre}enewsmemberadd WHERE userid=" . $val;
                                        $result = $empire->fetch1($sql);
                                        if (!empty($result)) {
                                            $friend_userid = explode("::::::", $result['yaoqing']);
                                            if (!empty($friend_userid)) {
                                                unset($friend_userid[count($friend_userid) - 1]);
                                                if (!empty($friend_userid)) {
                                                    foreach ($friend_userid as $k => $v) {
                                                        if ($v == $tmgetuserid) {
                                                            array_push($guanzhu, $val);
                                                            /*print_r($guanzhu);*/
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                                $whe = join(",", $guanzhu); //内部的老师
                                if (empty($whe)) {
                                    $whe = 0;
                                }

                                $newstrone = substr($yaoqing['tuijian_shi'], 0, strlen($yaoqing['tuijian_shi']) - 1);
                                $newstrone = explode("::::::", $yaoqing['tuijian_shi']); //打散为数组
                                $wheyao = join(",", $newstrone);
                                $tui = substr($wheyao, 0, strlen($wheyao) - 1);
                                if (empty($tui)) {
                                    $tui = 0;
                                }
                                $friend_sql = "select * from {$dbtbpre}ecms_photo a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid left join {$dbtbpre}enewsmember c on a.userid=c.userid  WHERE a.id IN ($tui) and a.classid=11  order by a.id desc";
                                $list = $empire->query($friend_sql);
                                while ($r = $empire->fetch($list)) {
                                    ?>
                                    <li>
                                        <a href="<?= $r['titleurl'] ?>">
                                            <i class="iconfont">&#xe63b;</i>
                                            <img src="<?= $r['titlepic'] ?>">
                                            <div class="xingming biaoti">
                                                <span><?= $r['title'] ?></span>
                                            </div>
                                        </a>

                                        <div class="guanzhu xingming clearfix">
                                            <span>点击:</span><em><?= $r[onclick] ?></em>

                                            <!-- <a href="/e/member/fava/add/?classid=<?= $r['classid'] ?>&amp;id=<?= $r['id'] ?>"><i class="iconfont po1">&#xe647;</i><span class="po4">收藏</span></a>
										<div class="bdsharebuttonbox po2"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
										<span class="po3">分享</span> -->
                                        </div>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>
                            <!-- 课程中心·············································································· -->
                            <ul class="liebiaoFuck liebiaoShow  jiaoshiVideo clearfix">
                                <?
                                $friend_sql = "select * from {$dbtbpre}ecms_shop a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid where a.classid=58 and a.userid='$userid' order by a.userid desc limit 50";
                                $list = $empire->query($friend_sql);
                                while ($r = $empire->fetch($list)) {
                                    ?>
                                    <li>
                                        <a href="<?= $r[titleurl] ?>">
                                            <img src="<?= $r[titlepic] ?>">
                                            <div class="xingming biaoti">
                                                <span><?= $r[title] ?></span>
                                            </div>
                                        </a>
                                        <div class="guanzhu xingming clearfix">
                                            <span class="hongse">¥:<?= $r[price] ?></span>
                                            <del>¥:<?= $r[tprice] ?></del>
                                        </div>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>
                            <!-- 琴房租赁```````````````````````````````````````````````````````````````````````````` -->
                            <ul class="liebiaoFuck liebiaoShow jiaoshiVideo clearfix">
                                    <?
                                    $friend_sql = "select * from {$dbtbpre}ecms_shop a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid where a.classid=59 and a.userid='$userid' order by a.userid desc limit 50";
                                    $list = $empire->query($friend_sql);
                                    while ($r = $empire->fetch($list)) {
                                        ?>
                                        <li>
                                            <a href="<?= $r[titleurl] ?>">
                                                <img src="<?= $r[titlepic] ?>">
                                                <div class="xingming">

                                                    <strong class="noname1"><?= $r[title] ?></strong>
                                                </div>
                                            </a>
                                            <div class="shenfen xingming">
                                                <span>价格：</span><span class="hongse">¥<?= $r[price] ?>元</span>
                                            </div>

                                            <div class="guanzhu xingming clearfix">
                                                <!-- <a href="/e/member/fava/add/?classid=<?= $classid ?>&amp;id=<?= $id ?>"><i class="iconfont ">&#xe647;</i><span >收藏</span></a> -->
                                            </div>
                                            <span class="dianjichakan irent"><a
                                                    href="<?= $r[titleurl] ?>">我要租</a></span>
                                        </li>
                                        <?
                                    }
                                    ?>
                                </ul>
                            <!-- 音乐老师············································································· -->
                            <?
//相互邀请
                            $yaoqing = $empire->fetch1("select yaoqing from {$dbtbpre}enewsmemberadd where userid='$tmgetuserid'");
                            $feeduser_result = explode("::::::", $yaoqing['yaoqing']);
                            $guanzhu = array();
                            if ($feeduser_result && !empty($feeduser_result)) {
                                unset($feeduser_result[count($feeduser_result) - 1]);
                                foreach ($feeduser_result as $key => $val) {
                                    $sql = "SELECT yaoqing FROM {$dbtbpre}enewsmemberadd WHERE userid=" . $val;
                                    $result = $empire->fetch1($sql);
                                    if (!empty($result)) {
                                        $friend_userid = explode("::::::", $result['yaoqing']);
                                        if (!empty($friend_userid)) {
                                            unset($friend_userid[count($friend_userid) - 1]);
                                            if (!empty($friend_userid)) {
                                                foreach ($friend_userid as $k => $v) {
                                                    if ($v == $tmgetuserid) {
                                                        array_push($guanzhu, $val);
                                                        /*print_r($guanzhu);*/
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            $whe = join(",", $guanzhu); //内部的老师
                            if (empty($whe)) {
                                $whe = 0;
                            }
                            ?>

                            <ul class="liebiaoFuck liebiaoShow jiaoshiVideo clearfix">
                                <?php
                                if ($zjj == 11) {
                                    ?>
                                    <?
                                    if (empty($whe)) {
                                        echo "您还没有内部老师";
                                    } else {
                                        $friend_sql = "select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($whe) and a.groupid=3 order by a.userid desc";
                                        $list = $empire->query($friend_sql);
                                        while ($r = $empire->fetch($list)) {
                                            ?>
                                            <li>
                                                <a href="/e/space/?userid=<?= $r[userid] ?>">
                                                    <img src="<?= $r[userpic] ?>">
                                                    <div class="xingming">
                                                        <strong class="noname1"><?= $r[username] ?></strong>
                                                    </div>
                                                </a>
                                                <div class="shenfen xingming">
                                                    <span>身份：</span><span><?= $r[teacher_type] ?></span>
                                                </div>
                                            </li>
                                            <?
                                        }
                                    }
                                    ?>
                                    <?
                                    }
                                    ?>
                                </ul>

                            <!-- 全部学员··············································································-->
                            <ul class="liebiaoFuck liebiaoShow jiaoshiVideo all-student clearfix">
                                <?php
                                if ($zjj == 11) {
                                ?>
                                    <?
                                    if (empty($whe)) {
                                        echo "您还没有内部学生";
                                    } else {
                                        $friend_sql = "select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.userid IN ($whe) and a.groupid in(1,2) order by a.userid desc";
                                        $list = $empire->query($friend_sql);
                                        while ($r = $empire->fetch($list)) {
                                            ?>
                                            <li>
                                                <a href="/e/space/?userid=<?= $r[userid] ?>">
                                                    <img src="<?= $r[userpic] ?>">
                                                    <div class="xingming">
                                                        <strong class="noname1"><?= $r[username] ?></strong>
                                                    </div>
                                                </a>
                                                <div class="shenfen xingming">
                                                    <span>身份：</span><span>
											 <?
                                             if ($r[groupid] == 1) {
                                                 echo $r[putong_shenfen];//普通会员默认爱乐人
                                             } elseif ($r[groupid] == 2) {
                                                 echo $r[music_star];//音乐之星
                                             }
                                             ?>
                                        </span>
                                                </div>
                                            </li>
                                            <?
                                        }
                                    }
                                    ?>
                                    <?
                                    }
                                ?>
                                </ul>

                            <!-- 活动公告·············································································· -->
                            <ul class="liebiaoFuck liebiaoShow notice clearfix">
                                <?
                                $friend_sql = "select * from {$dbtbpre}ecms_shop a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid where a.classid=62 and a.userid='$userid' order by a.truetime desc limit 10";
                                $list = $empire->query($friend_sql);
                                while ($r = $empire->fetch($list)) {
                                    ?>
                                    <li class="clearfix">
                                        <a href="<?= $r[titleurl] ?>">
                                            <span class="iconfont hongse">&#xe65e;</span>
                                            <?= $r[title] ?>

                                        </a>
                                        <span><?= date('Y-m-d', $r[newstime]) ?></span>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>
                            <!-- 在线直播·································································· -->
                            <ul class="liebiaoFuck liebiaoShow current jiaoshiVideo clearfix">
                                <li>
                                    <a href="<?= $r['titleurl'] ?>">
                                        <i class="iconfont">&#xe63b;</i>
                                        <img src="<?= $r['titlepic'] ?>">
                                        <div class="xingming biaoti">
                                            <span><?= $r['title'] ?></span>
                                        </div>
                                    </a>

                                    <div class="guanzhu xingming clearfix">
                                        <span>时间:</span><em>5-30 19:00-5-30 21:00</em>
                                    </div>
                                </li>
                            </ul>
                            <!-- 讨论区··············································································-->
                            <?php
                            if ($zjj == 11) {
                                ?>
                                <ul class="liebiaoFuck liebiaoShow discuss-area clearfix">
                                    <script>
                                        var currentUserid = "<?=$tmgetuserid?>";
                                            currentUserid = parseInt(currentUserid);//转为number类型
                                    </script>
                                    <script type="text/javascript" src="/js/space-dis-area-ajax.js"></script>
                                    <!-- 第一.全站动态部分············································· -->
                                    <div class="rightMiddle qzdtList">
                                        <!-- 搜索框························· -->
                                        <div class="searchWrap clearfix">
                                            <div class="search">
                                                <script type="text/javascript" src="/skin/default/js/tabs.js"></script>
                                                <form id="searchform">
                                                    <input type="hidden" name="show" value="title"/>
                                                    <input type="hidden" name="tempid" value="1"/>
                                                    <select name="tbname" id="xuanze">
                                                        <option value="0">全部</option>
                                                        <option value="1">会员名</option>
                                                        <option value="2">视频</option>
                                                        <option value="3">音乐</option>
                                                        <option value="4">图片</option>
                                                    </select>
                                                    <input type="input" id="searchValue">
                                                </form>
                                                <i class="iconfont searchInputSub">&#xe658;</i>
                                            </div>
                                            <div class="guangchangfatie">
                                                <a href="/e/fatie/ListInfo.php?mid=10">&nbsp;&nbsp;我要发帖</a>
                                            </div>
                                        </div>
                                        <!-- 搜索框结束····················· -->


                                        <!-- 内容··························· -->

                                        <div class="qzdtContent">

                                            <ul class="quanzhandontai dis-area-content"></ul>
                                            <!-- 加载动画框························· -->
                                            <div class="loaders" style="display: block">
                                                <div class="loader">
                                                    <div class="loader-inner line-scale">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 加载动画框结束······················ -->
                                        </div>


                                </ul>
                                <?
                            }
                            ?>
                            <!-- 讨论区结束··········································································· -->
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('.liebiaoFuck:gt(0)').hide();
                            })

                        </script>
                        <!-- 列表内容区域结束··························· -->
                    </div>
                </div>
            </div>
        </div>
        <!-- 教室多图片展示············································································· -->
        <div class="jiaoshi_shows_down"></div>
        <div class="focusBox" style="margin:0 auto">

            <ul class="pic">

                <?
                $pop = $empire->fetch1("select photo,userpic from phome_enewsmemberadd where userid='$userid'");
                echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$pop[userpic]'/></a></li>";
                $photo = explode("::::::", $pop['photo']);
                //print_r($photo);
                $length = count($photo) - 1;
                if ($length == 1) {
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[0]'/></a></li>";
                } elseif ($length == 2) {
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[0]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[1]'/></a></li>";
                } elseif ($length == 3) {
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[0]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[1]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[2]'/></a></li>";
                } elseif ($length == 4) {
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[0]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[1]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[2]'/></a></li>";
                    echo "<li><a target='_blank'><i class='shutUp'>×</i><img src='$photo[3]'/></a></li>";
                }

                ?>
            </ul>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
            <ul class="hd">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>


        <!-- 教室图片展示··················································································· -->
    </div>
<?php
include("footer.temp.php");
?>