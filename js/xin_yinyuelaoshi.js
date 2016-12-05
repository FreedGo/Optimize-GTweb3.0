$(function () {

    // 点击分类显示不同分类里面的老师
    var ifenlei = 0,//标价当前为那种音乐老师类型
        iloadedNum = [20,0,0,0,0];//标记已经加载的老师数量,页面加载时就加载了20个全部老师
    $('.fenleiFuck li').click(function (event) {
        ifenlei = $(this).index();
        $(this).addClass('current').siblings('li').removeClass('current');
        $('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
        $('.tuijianFuck').eq(ifenlei).fadeIn('fast').siblings('ol').hide();
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
        techer04 = [];//其他老师
    $.ajax({
        url:'/laoshi/tear.index.php',
        type:'get',
        datatype:'json'
    })
    .done(function (msg) {
        msg = eval('('+msg+')');
        // console.log(msg)
        techer00 = msg;
        $('.loaders').hide();
        $.each(msg, function(index, val) {
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
            }
        };
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
     * 总计数字动态变化
     * @type {Number}
     */
    var totalNum = techer00.length;
    for (var i = 0 ;i <= totalNum ;i ++){
        $('.tongjiNum').html(i);
    };
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
            $('.liebiaoShow').empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.loaders').fadeIn(200);
            // console.log({'city1': subCity1,'city2':subCity2,'city3':subCity3});
            $.ajax({
                url: '/laoshi/indexs.php',
                type: 'post',
                dataType: 'text',
                // data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
                data: {'city1': subCity1, 'city2': subCity2, 'city3': subCity3},
                // data:city1,
                success: function (msg) {
                    if (msg == '') {
                        $('.liebiaoShow').eq(0).empty().append('<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到老师，快来加入好琴声吧！</p>');
                    } else {
                        $('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
                        $('.liebiaoShow').eq(0).empty().append(msg);
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
        $('.sousuoResult').show().children('a').trigger('click');
        jiaoshiName = $('.searchSelect').val();
        $('.loader-warp').show();
        // console.log(jiaoshiName);
        if (jiaoshiName == "") {
            alert('输入的老师名字不能为空');
        } else {
            for (var i = 0; i < techer00.length; i++){
                if (techer00[i].username == jiaoshiName ){
                    $('.sousuo-warp').empty().append(
                        '<li><a href="/e/space/?userid='+ techer00[i].userid +
                        '"><img src='+ techer00[i].userpic +
                        '><div class="xingming"><a href="/e/space/?userid='+ techer00[i].userid +
                        '"><span>' + techer00[i].username +
                        '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +techer00[i].cked +
                        ' iconfont"></i></a>'+
                        '</div></a><div class="shenfen"><span>身份：'+techer00[i].teacher_type +
                        '</span><span>粉丝数：'+techer00[i].follownum+
                        '</span></div><div class="guanzhu clearfix"><a href="/e/space/?userid=' +techer00[i].userid +
                        '"><span>＋关注</span></a><a href="/e/QA/ListInfo.php?mid=10&username=' + techer00[i].username +
                        '&userid=' +techer00[i].userid +
                        '"><em>提问</em></a></div></li>'
                    );
                }
            }
            $('.no-sousuo-more').remove();
            $('.sousuo-warp').append('<li class="no-sousuo-more" style="text-align: center;font:14px/32px 微软雅黑;color: #cb7047;">没有更多了!</li>');
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
            $('.liebiaoShow').empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.loaders').fadeIn(200);
            $.ajax({
                url: '/laoshi/index.type.php',
                type: 'post',
                dataType: 'text',
                data: {'num': paixuName},
                success: function (msg) {
                    // console.log(msg);
                    // 清空liebiaoShow并插入li
                    // console.log(msg);
                    // $('.liebiaoFuck').eq(0).hide();
                    $('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
                    $('.liebiaoShow').eq(0).empty().append(msg);
                    // $('.toutiao01').append('推荐');
                    // $('.di_zhi').append('地址：');
                    // $('.phone_one').append('咨询电话：');
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
        }
        ;


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



