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
                            <li>
                                <span><?
                                    if ($groupid == 3) {
                                        echo "老师类型：";
                                    } elseif ($groupid == 4) {
                                        echo "机构电话：";
                                    }
                                    ?>
                                </span>
                                <span>
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
                                </span>
                            </li>
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
                                        $follow = '<a  style="padding: 0;cursor:point" onclick="follow(' . $userid . ')" class="button blue small orange" id="follow' . $userid . '" title="取消关注">取消关注</a>';
                                    } else {
                                        $follow = '<a  style="padding: 0;cursor:point" onclick="follow(' . $userid . ')" class="button blue small" id="follow' . $userid . '">关注</a>';
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
                                        title:"<?= $username ?>老师的主页——好琴声，音乐人的交流平台！",//标题
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
                            text	: "<?= $public_r['newsurl'] ?>e/space/?userid=<?= $userid ?>"
                        });
                    </script>
                    <style>
                        #qrcodeTable{
                            -webkit-transform: scale(0.7);
                            -moz-transform: scale(0.7);
                            -ms-transform: scale(0.7);
                            -o-transform: scale(0.7);
                            transform: scale(0.7);
                            transform-origin: right top;
                        }
                    </style>
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
                                            swal('提示：', '你不是当前老师下的学生，无法查看!', 'error').done();
                                        });
                                    })
                                </script>
                                <!--.......................-->
                                <?
                                }
                            ?>
                            <ul class="clearfix fenleiFuck">
                                <!--凡是加了showAlert类名的，点击之后会弹出提示框，js的加载由php来判断控制，不是这个老师下面的学生都会提示-->
                                <li class="current"><a href="javascript:;" target="_self" >老师介绍</a><span></span></li>
                                <li><a href="javascript:;" target="_self">推荐视频</a><span></span></li>
                                <li><a href="javascript:;" target="_self">课程中心</a><span></span></li>
                                <li><a href="javascript:;">老师动态</a><span></span></li>
                                <li><a href="javascript:;" target="_self">在线直播</a><span></span></li>
                                <li class="showAlert" style="display: none"><a href="javascript:;" target="_self">课程表</a><span></span></li>
                                <li class="showAlert"><a href="javascript:;" target="_self">全部学员</a><span></span></li>
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

                                        <div class="xingming clearfix">
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
                                        <div class=" xingming clearfix">
                                            <span class="hongse">¥:<?= $r[price] ?></span>
                                            <del>¥:<?= $r[tprice] ?></del>
                                        </div>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>
                            <!--活动公告···············································································-->
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
<!--                                <li>-->
<!--                                    <a href="--><?//= $r['titleurl'] ?><!--">-->
<!--                                        <i class="iconfont">&#xe63b;</i>-->
<!--                                        <img src="--><?//= $r['titlepic'] ?><!--">-->
<!--                                        <div class="xingming biaoti">-->
<!--                                            <span>--><?//= $r['title'] ?><!--</span>-->
<!--                                        </div>-->
<!--                                    </a>-->
<!---->
<!--                                    <div class="guanzhu xingming clearfix">-->
<!--                                        <span>时间:</span><em>5-30 19:00-5-30 21:00</em>-->
<!--                                    </div>-->
<!--                                </li>-->
                            </ul>
                            <!-- 课表·································································· -->
                            <?php
                            if ($zjj == 11) {
                                ?>
                                <ul class="liebiaoFuck liebiaoShow current kebiao  clearfix" style="display: none">
                                    <?php
                                    //课表数据处理
                                    $num=$empire->num("select id from phome_zjk_kebiao_tear where tearid=$userid");
                                    if($num>0){
                                        //本月课表数据
                                        $sql=$empire->query("select * from phome_zjk_kebiao_tear where tearid=$userid  and date_format(classtime,'%Y-%m')=date_format(now(),'%Y-%m')");
                                        while($r=$empire->fetch($sql))
                                        {
                                            $kebiao.="{id:'$r[id]',title: '$r[couname]',start: '$r[classtime] $r[starttime]',end:'$r[classtime] $r[stoptime]',addres:'$r[location]',student:'$r[stuname]',status:'$r[retype]',mark:'$r[couname]',allDay:false,backgroundColor:'#90F79B',borderColor:'#ff0',textColor:'#000'},";
                                        }
                                        //$biao=substr($kebiao, 0, -1);
                                        //echo $biao;
                                    }
                                    ?>

                                    <!--	课表依赖-->
                                    <link href='/e/data/html/kebiao/lib/fullcalendar.min.css' rel='stylesheet' />
                                    <script src='/e/data/html/kebiao/lib/moment.min.js'></script>
                                    <script src='/e/data/html/kebiao/lib/fullcalendar.min.js'></script>
                                    <script src="/e/data/html/kebiao/lib/zh-cn.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $('#calendar').fullCalendar({
                                                theme: false,
                                                header: {
                                                    left: 'prev,next today',
                                                    center: 'title',
                                                    right: 'month,agendaWeek,agendaDay'
                                                },
//					isRTL:true,//本来用这个参数来控制title与time显示顺序,但是会影响别的东西
                                                buttonText:{

                                                    today: '转到今日',
                                                    month: '月视图',
                                                    week: '周视图',
                                                    day: '日视图'
                                                },
//			defaultDate: '2016-09-12',
                                                navLinks: true, // can click day/week names to navigate views
                                                editable: true,
                                                //月视图下日历格子宽度和高度的比例
                                                aspectRatio: 1.35,
                                                //月视图的显示模式，fixed：固定显示6周高；liquid：高度随周数变化；variable: 高度固定
                                                weekMode: 'liquid',
                                                //初始化时的默认视图，month、agendaWeek、agendaDay
                                                defaultView: 'month',
                                                //agenda视图下是否显示all-day
                                                allDaySlot: true,
                                                //agenda视图下all-day的显示文本
                                                allDayText: '全天',
                                                //agenda视图下两个相邻时间之间的间隔
                                                slotMinutes: 30,
                                                //区分工作时间
                                                businessHours: true,
                                                //非all-day时，如果没有指定结束时间，默认执行120分钟
                                                defaultEventMinutes: 120,
                                                //设置为true时，如果数据过多超过日历格子显示的高度时，多出去的数据不会将格子挤开，而是显示为 +...more ，点击后才会完整显示所有的数据
                                                firstDay:0,
                                                eventLimit: true,
                                                dayClick: function(date, allDay, jsEvent, view) {
                                                    //单击日历中的某一天时
//						console.log(date);
//						console.log(allDay);
//						console.log(jsEvent);
//						console.log(view);
                                                },
                                                eventClick: function(calEvent, jsEvent, view) {
                                                    //日历中的某一日程（事件）时，触发此操作
//						console.log(calEvent);
//						console.log(jsEvent);
//						console.log(view);
                                                    $('.itemCon1').empty().html(calEvent.title);//标题
                                                    $('.itemCon2').empty().html(calEvent.title);//地址
                                                    $('.itemCon3').empty().html(calEvent.start._i);//开始
                                                    $('.itemCon4').empty().html(calEvent.end._i);//结束
                                                    $('.itemCon5').empty().html(calEvent.student);//学生
                                                    $('.itemCon6').empty().html(calEvent.status);//课程状态
                                                    $('.itemCon7').empty().html(calEvent.mark);//备注

                                                    $('.single-kecheng').show();


                                                },

                                                events: [<?=$kebiao?>],

                                            });

                                        });

                                    </script>
                                    <!--end   课表依赖-->
                                    <!--		日期控件依赖-->
                                    <link rel="stylesheet" type="text/css" href="/e/data/html/kebiao/lib/lq.datetimepick.css"/>
                                    <script src='/e/data/html/kebiao/lib/selectUi.js' type='text/javascript'></script>
                                    <script src='/e/data/html/kebiao/lib/lq.datetimepick.js' type='text/javascript'></script>
                                    <script src="/e/data/html/kebiao/lib/kebiao.js"></script>
                                    <script type="text/javascript">
                                        $(function () {
                                            $("#datetimepicker1").on("click",function(e){
                                                e.stopPropagation();
                                                $(this).lqdatetimepicker({
                                                    css : 'datetime-hour'
                                                });
                                            });
                                            $("#datetimepicker2").on("click",function(e){
                                                e.stopPropagation();
                                                $(this).lqdatetimepicker({
                                                    css : 'datetime-hour'
                                                });
                                            });
                                            $("#datetimepicker3").on("click",function(e){
                                                e.stopPropagation();
                                                $(this).lqdatetimepicker({
                                                    css : 'datetime-day',
                                                    dateType : 'D',
                                                    selectback : function(){
                                                    }
                                                });
                                            });
                                        });
                                        /*字数限制100个*/
                                        $(function () {
                                            $("#textInput").on("input propertychange", function() {
                                                var $this = $(this),
                                                    _val = $this.val(),
                                                    count = "";
                                                if (_val.length > 100) {
                                                    $this.val(_val.substring(0, 100));
                                                }
                                                count = 100 - $this.val().length;
                                                $("#text-count").text(count);
                                            });
                                        });
                                    </script>
                                    <!--end日期控件依赖-->
                                    <div id='calendar'></div>
                                    <div class="single-kecheng">
                                        <i class="shutUp">×</i>
                                        <div class="single-ke-con">
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">课程名称：</h4>
                                                <p class="ke-item-con itemCon1">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">上课地点：</h4>
                                                <p class="ke-item-con itemCon2">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">开始时间：</h4>
                                                <p class="ke-item-con itemCon3">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">结束时间：</h4>
                                                <p class="ke-item-con itemCon4">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">上课学生：</h4>
                                                <p class="ke-item-con itemCon5">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">课程状态：</h4>
                                                <p class="ke-item-con itemCon6">XXXXXXXXXXXX</p>
                                            </div>
                                            <div class="single-ke-item clearfix">
                                                <h4 class="ke-itme-tips">课程备注：</h4>
                                                <p class="ke-item-con itemCon7">XXXXXXXXXXXXXXXXXX
                                                    XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                                    XXXXX</p>
                                            </div>
                                            <!--<div class="single-ke-item clearfix">-->
                                            <!--<button class="single-ke-btn edi-kecheng">修改课程</button>-->
                                            <!--<button class="single-ke-btn del-kecheng">删除课程</button>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </ul>
                                <?
                                }
                            ?>
                            <!-- 全部学员··············································································-->
                            <?php
                                if ($zjj == 11) {
                                ?>
                                <ul class="liebiaoFuck liebiaoShow jiaoshiVideo all-student clearfix">

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

                                </ul>
                                <?
                            }
                            ?>

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

        <!-- 教室图片展示··················································································· -->
    </div>
<?php
include("footer.temp.php");
?>