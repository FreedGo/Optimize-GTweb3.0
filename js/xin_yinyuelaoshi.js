/**
 * 数字动态变化模块,摘自countjs,依赖jq
 */
(function($){
    $.fn.numberRock=function(options){
        var defaults={
            speed:24,
            count:100
        };
        var opts=$.extend({}, defaults, options);

        var div_by = 100,
            count=opts["count"],
            speed = Math.floor(count / div_by),
            sum=0,
            $display = this,
            run_count = 1,
            int_speed = opts["speed"];
        var int = setInterval(function () {
            if (run_count <= div_by&&speed!=0) {
                $display.text(sum=speed * run_count);
                run_count++;
            } else if (sum < count) {
                $display.text(++sum);
            } else {
                clearInterval(int);
            }
        }, int_speed);
    }

})(jQuery);


$(function () {

    // 点击分类显示不同分类里面的老师
    var ifenlei = 0,//标价当前为那种音乐老师类型
        iloadedNum = [20,0,0,0,0];//标记已经加载的老师数量,页面加载时就加载了20个全部老师
    $('.fenleiFuck li').click(function (event) {
        ifenlei = $(this).index();
        $(this).addClass('current').siblings('li').removeClass('current');
        $('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
        $('.tuijianFuck').eq(ifenlei).fadeIn('fast').siblings('ol').hide();
        if (ifenlei <= 4){
            switch(ifenlei){
                case 0 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:techer00.length
                    });
                    break;
                case 1 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:techer01.length
                    });
                    break;
                case 2 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:techer02.length
                    });
                    break;
                case 3 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:techer03.length
                    });
                    break;
                case 4 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:techer04.length
                    });
                    break;
            }
        }
    });

    // ``````````````````````````````````````````````````````````````````````````````````````
    /**
     * 向后台查询老师数据,并返回处理
     * @type {Array}
     */
    var techer00 = [],//全部老师
        techer01 = [],//钢琴老师
        techer02 = [],//吉他老师
        techer03 = [],//弦乐老师
        techer04 = [],//其他老师
        techer001 = [],
        techer002 = [];
    $.ajax({
        url:'/laoshi/tear.index.php',
        type:'get',
        datatype:'json'
    })
    .done(function (msg) {
        msg = eval('('+msg+')');
        // console.log(msg)
        // 循环数组,根据类型不同拆分对象,再组成新的数组
        for (var i = 0 ; i < msg.length ; i++){
            switch (msg[i].teacher_type){
                case '钢琴老师':
                    techer01.push(msg[i]);
                    break;
                case '吉他老师':
                    techer02.push(msg[i]);
                    break;
                case '弦乐老师':
                    techer03.push(msg[i]);
                    break;
                case '':
                    msg[i].teacher_type = '音乐老师';
                    techer04.push(msg[i]);
                    break;
                default :
                    techer04.push(msg[i]);
                    break;
            };
            // 根据是否认证，拆分所有老师的数组
            msg[i].cked === '1'? techer001.push(msg[i]):techer002.push(msg[i]);
        };
        // 组成新所有老师数组
        techer00 = techer001.concat(techer002);
        $.each(techer00, function(index, val) {
            if (index <= 20 ){
                $('.liebiaoShow').eq(0).append(
                    '<li><a href="/e/space/?userid='+ val.userid +
                    '"><img src='+ val.userpic +
                    '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                    '"><span>' + val.username +
                    '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                    ' iconfont"></i></a>'+
                    '</div></a><div class="shenfen"><span>身份：'+val.teacher_type +
                    '</span><span>粉丝数：'+val.follownum+
                    '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +val.userid +
                    '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + val.username +
                    '&userid=' +val.userid +
                    '"><em>提问</em></a></div></li>'
                )
            }
        });
        $('.loaders').hide();
        //数字跳动
        $('.tongjiNum').numberRock({
            speed:20,
            count:techer00.length
        });

        loadteacher(techer01,1);
        loadteacher(techer02,2);
        loadteacher(techer03,3);
        loadteacher(techer04,4);
    })
    .error(function (data) {
        console.log('error');
        console.log(data)
    });

    /**
     * 加载指定的数据进入指定的老师分类
     * @param obj {object} 老师的数据;
     * @param type {num}  分类;
     */
    function loadteacher(obj,type) {
        $('.loader-warp').show();
        $.each(obj,function (index,val) {
            if (index>=iloadedNum[type] && index < (iloadedNum[type] +10)){
                $('.liebiaoShow').eq(type).append(
                    '<li><a href="/e/space/?userid='+ val.userid +
                    '"><img src='+ val.userpic +
                    '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                    '"><span>' + val.username +
                    '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                    ' iconfont"></i></a>'+
                    '</div></a><div class="shenfen"><span>身份：'+val.teacher_type +
                    '</span><span>粉丝数：'+val.follownum+
                    '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +val.userid +
                    '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + val.username +
                    '&userid=' +val.userid +
                    '"><em>提问</em></a></div></li>'
                );

                console.log('成功');
            } else if (index >= (iloadedNum[type] +10)){
                console.log('条件不符');
            }
        });
        iloadedNum[type] = iloadedNum[type] +10 ;
        $('.loader-warp').hide();
    }

    $(function() {
        var iList=1,
            scrollTimer=null,
            iload=0;
        $(window).scroll(function(event) {
            if (scrollTimer) {
                clearTimeout(scrollTimer);//清除定时器
            }
            scrollTimer=setTimeout(function() {
                //如果离底部小于150像素，就发送请求
                if ($(document).scrollTop() + $(window).height() > $(document).height() -360) {
                    switch (ifenlei){
                        case 0:
                        loadteacher(techer00,ifenlei);
                        break;
                        case 1:
                            loadteacher(techer01,ifenlei);
                            break;
                        case 2:
                            loadteacher(techer02,ifenlei);
                            break;
                        case 3:
                            loadteacher(techer03,ifenlei);
                            break;
                        case 4:
                            loadteacher(techer04,ifenlei);
                            break;
                    }
                }
            }, 500);
        });
    });

// ```````````````````````````````````````````````````````````````````````````````````````````````````````````
    /**
     * 城市筛选搜索
     */
    $('.tijiao input').click(function (event) {
        // 提交城市新信息切换列表内容····················································
        // subCity1代表省级值，subCity2代表市级值，subCity3代表县级值，
        var subCity1;
        var subCity2;
        var subCity3;
        var cityInfo;
        subCity1 = $('#sfdq_tj').val();
        subCity2 = $('#csdq_tj').val();
        subCity3 = $('#qydq_tj').val();
        if (subCity1 == "" || subCity1 == "选择省份") {
            alert("请选择省份再提交");
        } else {
            // 点下按钮之后加载css动画
            $('.sousuoResult').show().children('a').trigger('click');
            $('.sousuo-warp').empty();
            $('.loader-warp').show();
            $.ajax({
                url: '/laoshi/indexs.php',
                type: 'post',
                // data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
                data: {'city1': subCity1, 'city2': subCity2, 'city3': subCity3},
                // data:city1,
                success: function (msg) {
                    if (msg == '') {
                        $('.tongjiNum').html('0');
                        $('.sousuo-warp').append('<li class="no-sousuo-more" style="text-align: center;font:14px/32px 微软雅黑;color: #cb7047;">没有搜索到数据!</li>');
                    } else {
                        msg = eval('('+msg+')');
                        //数字跳动
                        $('.tongjiNum').numberRock({
                            speed:20,
                            count:msg.length
                        });
                        $.each(msg, function(index, val) {
                            $('.sousuo-warp').append(
                                '<li><a href="/e/space/?userid='+ val.userid +
                                '"><img src='+ val.userpic +
                                '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                                '"><span>' + val.username +
                                '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                                ' iconfont"></i></a>'+
                                '</div></a><div class="shenfen"><span>身份：'+val.teacher_type +
                                '</span><span>粉丝数：'+val.follownum+
                                '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +val.userid +
                                '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + val.username +
                                '&userid=' +val.userid +
                                '"><em>提问</em></a></div></li>'
                            )
                        });
                    }

                }
            })
                .done(function () {
                    // console.log("success");

                })
                .fail(function () {
                    // console.log("error");
                })
                .always(function () {
                    // console.log("complete");
                });
        };
    });
// ---------------------------------------------------------------------------------------------------------

    /**
     * 教室输入名字搜索
     */
    var jiaoshiName;
    $('.searchSub').click(function (event) {
        jiaoshiName = $('.searchSelect').val();

        $('.sousuoResult').show().children('a').trigger('click');
        $('.sousuo-warp').empty();
        $('.loader-warp').show();
        // console.log(jiaoshiName);
        if (jiaoshiName == "") {
            alert('输入的老师名字不能为空');
        } else {
            $('.loaders').show();
            $.ajax({
                url:'/laoshi/index.name.php',
                type:'post',
                data:{'jiaoshi1':jiaoshiName}
            }).done(function (msg) {
                if (msg == null){
                    $('.tongjiNum').html('0');
                    $('.sousuo-warp').append('<li class="no-sousuo-more" style="text-align: center;font:14px/32px 微软雅黑;color: #cb7047;">没有搜索到数据!</li>');
                } else {
                    msg = eval('('+msg+')');
                    //数字跳动
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:msg.length
                    });
                    $.each(msg, function(index, val) {
                        $('.sousuo-warp').append(
                            '<li><a href="/e/space/?userid='+ val.userid +
                            '"><img src='+ val.userpic +
                            '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                            '"><span>' + val.username +
                            '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                            ' iconfont"></i></a>'+
                            '</div></a><div class="shenfen"><span>身份：'+val.teacher_type +
                            '</span><span>粉丝数：'+val.follownum+
                            '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +val.userid +
                            '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + val.username +
                            '&userid=' +val.userid +
                            '"><em>提问</em></a></div></li>'
                        )
                    });
                };
                $('.loaders').hide();
            }).error(function (data) {
                console.log(data);
            })
            // $('.sousuo-warp').append('<li class="no-sousuo-more" style="text-align: center;font:14px/32px 微软雅黑;color: #cb7047;">没有更多了!</li>');
        };
    });

// ---------------------------------------------------------------------------------------------------------
    /**
     * 按照不同类型排序
     */
    var paixuName;
    $('#paixuSelect').change(function (event) {
        paixuName = $('#paixuSelect').val();
        // console.log(paixuName);
        if (paixuName == 0) {
            alert('请选择排序类型');
        } else {
            // console.log(paixuName);
            // 点下按钮之后加载css动画
            $('.liebiaoShow').eq(0).empty();
            $('.loader-warp').show();
            $.ajax({
                url: '/laoshi/index.type.php',
                type: 'post',
                data: {'num': paixuName}
            })
            .done(function (msg) {
                msg = eval('('+msg+')');
                iloadedNum[0] = 20;
                techer00 = msg;
                //数字跳动
                $.each(msg, function(index, val) {
                    if (index < 20){
                        $('.liebiaoShow').eq(0).append(
                            '<li><a href="/e/space/?userid='+ val.userid +
                            '"><img src='+ val.userpic +
                            '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                            '"><span>' + val.username +
                            '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                            ' iconfont"></i></a>'+
                            '</div></a><div class="shenfen"><span>身份：'+val.teacher_type +
                            '</span><span>粉丝数：'+val.follownum+
                            '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +val.userid +
                            '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + val.username +
                            '&userid=' +val.userid +
                            '"><em>提问</em></a></div></li>'
                        )
                    }
                });
            })
            .fail(function () {
                // console.log("error");
            })
            .always(function () {
                // console.log("complete");
            });
        };


    });
// ``````````````````````````````````````````````````````````````````````````````````````
//首先封装页面加载获取当前所在城市信息的函数、
    function getCurrentCity() {
    var subCity1;
    // 第一步,向高德API发送请求并获得访问者所在省份
    $.ajax({
        type: "get",
        // url: "http://webapi.amap.com/maps/ipLocation?key=cf19db6adadd29933f75fd2095b92a3e",//自己申请的高德key，2000次每天
        url:'http://restapi.amap.com/v3/ip?key=7a178998b6550b21f6a2fb88d3285fcd',
        dataType: 'text',
        // contentType:'application/x-www-form-urlencoded;charset=UTF-8',
        success: function (data) {
            //转换为JSON对象
            var jsonObj = eval("(" + data.replace('(', '').replace(')', '').replace(';', '') + ")");
            //当前城市
            // $("#shenfen>p").html('当前:'+jsonObj.province);
            subCity1 = jsonObj.province;
            subCity1 = subCity1.substring(0, subCity1.length - 1);
            //增加加载页面师,三级联动加载一级城市
            //遍历第一级,找到之后模拟点击
            for (var i = 0 ; i < 34;i++){
                if ($('.m_zlxg1 ul li').eq(i).html() == subCity1){
                    $('.m_zlxg1 ul li').eq(i).trigger('click');
                    $('.m_zlxg1').hide();
                    break;
                }
            };
        }
    });

    // 自定义函数结束
}
// 页面加载时调用自己封装的函数来获取当前所在城市信息
    $(document).ready(function(){
        getCurrentCity();
    });
//页面加载完毕调用自己封装的函数来获取当前所在城市信息
// window.onload = function () {
//     getCurrentCity();
// }



});

//});



