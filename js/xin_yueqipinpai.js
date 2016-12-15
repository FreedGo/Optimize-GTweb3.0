/**
 * Created by Administrator on 2016/9/12.
 * flyxz@126.com
 * 乐器品牌是由音乐老师模板修改而来，故主体js继承音乐老师的，此处为乐器品牌自有的js
 */

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

/**
 * 加载指定的数据进入指定的品牌分类
 * @param obj {object} 老师的数据;
 * @param type {num}  分类;
 */
function loadteacher(obj,type,iloadedNum) {
    $('.loaders').show();
    $.each(obj,function (index,val) {
//        if (index>=iloadedNum[type] && index < (iloadedNum[type] +20)){
            $('.liebiaoShow').eq(type).append(
                '<li><a href="/e/space/?userid='+ val.userid +
                '"><img src='+ val.userpic +
                '><div class="xingming"><a href="/e/space/?userid='+ val.userid +
                '"><span>' + val.username +
                '</span></a><a class="newRen" title="好琴声官方认证"><i class="newRenZheng newRenZheng' +val.cked +
                ' iconfont"></i></a>'+
                '</div></a>' +
                '<div class="shenfen"><p><span class="di_zhi">创立国家：</span>'+val.company + '</p></div>' +
                '<div class="shenfen"><p><span class="nianfen">创立年份：</span>'+val.chusheng + '</p></div>' +
                '<div class="guanzhu clearfix"><p><span class="telephone_one">咨询电话:</span>'+val.telephone+'</p></div></li>'
            );
//            console.log('成功');
//        } else if (index >= (iloadedNum[type] +20)){
//            console.log('条件不符');
//        }
    });
//    iloadedNum[type] = iloadedNum[type] +20 ;
    $('.loaders').hide();
}


// 重新写乐器品牌下的分类与下面列表显示
$(function(){
    $('.liebiaoShow').eq(0).show().siblings().hide();
//    $('.fenleiFuck li').click(function () {
//        var ifenlei = $(this).index();
//        $(this).addClass('current').siblings('li').removeClass('current');
//        $('.musical-instruments .liebiaoShow').eq(ifenlei).fadeIn(200).siblings('.liebiaoShow').hide();
//    });

    $('.loader-warp').show();
    // 点击分类显示不同分类里面的老师
    var ifenlei = 0,//标记当前为那种音乐老师类型
        iloadedNum = [0,0,0,0,0],//标记已经加载的品牌数量,
        pinpai00 = [],//全部品牌
        pinpai01 = [],//钢琴品牌
        pinpai02 = [],//提琴品牌
        pinpai03 = [],//吉他品牌
        pinpai04 = [],//管乐器品牌
        pinpai05 = [],//打击乐器品牌
        pinpai001 = [],//认证的品牌
        pinpai002 = [];//未认证的品牌
    /**
     * 1.给分类标题绑定事件
     * 1.1点击切换分类
     * 1.2点击分类数量跳动
     */
    $('.fenleiFuck li').click(function (event) {
        ifenlei = $(this).index();
        $(this).addClass('current').siblings('li').removeClass('current');
        $('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
//        $('.tuijianFuck').eq(ifenlei).fadeIn('fast').siblings('ol').hide();
        if (ifenlei <= 5){
            switch(ifenlei){
                case 0 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai00.length
                    });
                    break;
                case 1 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai01.length
                    });
                    break;
                case 2 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai02.length
                    });
                    break;
                case 3 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai03.length
                    });
                    break;
                case 4 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai04.length
                    });
                    break;
                case 3 :
                    $('.tongjiNum').numberRock({
                        speed:20,
                        count:pinpai05.length
                    });
                    break;
            }
        }
    });

    /**
     * 2.向后台请求数据,并做处理
     * 2.1拆分数组,把品牌拆分为不同的分类
     * 2.2给全部品牌加载20条数据
     */
    $.ajax({
        url:'/pinpai/index.josn.php',
        type:'get',
        datatype:'json'
    })
    .done(function (msg) {
        msg = eval('('+msg+')');
        pinpai00 = msg;
        // console.log(msg)
//         循环数组,根据类型不同拆分对象,再组成新的数组
        for (var i = 0 ; i < msg.length ; i++){
            var typeArray = msg[i].type.split('|');
                //生成的数组第一个元素和最后一个元素都为空,故要删除
                typeArray.shift();
                typeArray.pop();
            for (var x = 0;x < typeArray.length ; x ++ ){
                switch (typeArray[x]){
                    case '钢琴':
                        pinpai01.push(msg[i]);
                        break;
                    case '提琴':
                        pinpai02.push(msg[i]);
                        break;
                    case '吉他':
                        pinpai03.push(msg[i]);
                        break;
                    case '管乐':
                        pinpai04.push(msg[i]);
                        break;
                    case '打击乐':
                        pinpai04.push(msg[i]);
                        break;
                }
            }

//            // 根据是否认证，拆分所有老师的数组
//            msg[i].cked === '1'? pinpai001.push(msg[i]):pinpai002.push(msg[i]);
        }
        // 组成新所有老师数组
//        pinpai00 = pinpai001.concat(pinpai002);
        loadteacher(pinpai00,0,iloadedNum);
        //数字跳动
        $('.tongjiNum').numberRock({
            speed:20,
            count:pinpai00.length
        });
        loadteacher(pinpai01,1,iloadedNum);
        loadteacher(pinpai02,2,iloadedNum);
        loadteacher(pinpai03,3,iloadedNum);
        loadteacher(pinpai04,4,iloadedNum);
        loadteacher(pinpai05,5,iloadedNum);
//
    })
    .error(function (data) {
        console.log('error');
        console.log(data)
    });























});


































$(function() {
    var iList=8;
    // 瀑布流下拉显示·············································
    //

// 显示前N个结束-----------------------------------------------------------

    $(window).scroll(function(event) {
        if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {

            for (var i = iList; i < iList+4; i++) {
                $('.liebiaoShow').children('li').eq(i).show();
            };
            iList=iList+4;
        };
    });
// 阻止原form的默认提交
// -----------------------------------------------------------------------
    $('.citySelect').submit(function(event) {
        return false
    });
//------------------------------------------------------------
    $('.tijiao input').click(function(event) {
        // 提交城市新信息切换列表内容····················································
        // subCity1代表省级值，subCity2代表市级值，subCity3代表县级值，
        var subCity1;
        var subCity2;
        var subCity3;
        var cityInfo;
        var city1="2222";
        subCity1=$('#sfdq_tj').val();
        subCity2=$('#csdq_tj').val();
        subCity3=$('#qydq_tj').val();
        if (subCity1==""||subCity1=="选择省份") {
            alert("请选择省份再提交");
        } else{
            // 点下按钮之后加载css动画
            $('.liebiaoShow').empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.loaders').fadeIn(200);
            // console.log({'city1': subCity1,'city2':subCity2,'city3':subCity3});
            $.ajax({
                url: '/jiaoshi/indexs.php',
                type: 'post',
                dataType: 'text',
                // data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
                data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
                // data:city1,
                success:function(msg) {
                    // console.log(msg);
                    // console.log(typeof(msg));
                    // 清空liebiaoShow并插入li
                    if (msg=='') {
                        $('.liebiaoShow').empty().append('<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到琴行，快来加入好琴声吧！</p>');
                    } else {
                        $('.liebiaoFuck').eq(0).hide();
                        $('.liebiaoShow').empty().append(msg);
                        $('.toutiao01').append('推荐');
                        $('.di_zhi').append('地址：');
                        $('.telephone_one').append('咨询电话：');
                    }
                }
            })
                .done(function() {
                    // console.log("success");
                    // ````````````````````````````````````````````````````````````````````````````````````````````

                })
                .fail(function() {
                    // console.log("error");
                })
                .always(function() {
                    // console.log("complete");
                });
            // `````````````````````````````````````````````````````````````````````````````````````````````````````````
        };

    });
// ---------------------------------------------------------------------------------------------------------

    // 教室输入名字查询
    var jiaoshiName;
    $('.searchSub').click(function(event) {
        jiaoshiName=$('.searchSelect').val();
        // console.log(jiaoshiName);
        if (jiaoshiName=="") {
            alert('输入的品牌名字不能为空');
        } else{
            // 点下按钮之后加载css动画
            // $('.liebiaoShow').empty().append('' +
            //     '<div class="loaders">' +
            //     '<div class="loader">' +
            //     '<div class="loader-inner line-scale">' +
            //     '<div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.sousuo-pinpai').show().empty().append('' +
                '<div class="loaders">' +
                '<div class="loader">' +
                '<div class="loader-inner line-scale">' +
                '<div></div><div></div><div></div><div></div><div></div></div></div></div>').siblings().hide();
            // $('.loaders').fadeIn(200);
            // console.log(jiaoshiName);
            $.ajax({
                url: '/pinpai/index.name.php',
                type: 'post',
                dataType: 'text',
                data: {'jiaoshi1': jiaoshiName},
                success:function(msg){
                    // console.log(msg);
                    // 清空liebiaoShow并插入li
                    // console.log(msg);
                    if (msg=='') {
                        $('.sousuo-pinpai').empty().append('' +
                            '<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到与'+jiaoshiName+'相关的品牌，请重新搜索</p>'
                        );
                    } else {
                        $('.sousuo-pinpai').show().empty().append(msg);
                        $('.sousuo-pinpai .toutiao01').append('推荐');
                        $('.sousuo-pinpai .di_zhi').append('创立国家：');
                        $('.sousuo-pinpai .nianfen').append('创立年份：');
                        $('.sousuo-pinpai .telephone_one').append('咨询电话：');
                    }

                }
            })
                .done(function() {
                    // console.log("success");
                })
                .fail(function() {
                    // console.log("error");
                })
                .always(function() {
                    // console.log("complete");
                });
        };


    });

// ---------------------------------------------------------------------------------------------------------

    // 教室输入排序类型查询
    var paixuName;
    $('#paixuSelect').change(function(event) {
        paixuName=$('#paixuSelect').val();
        // console.log(paixuName);
        if (paixuName==0) {
            alert('请选择排序类型');
        } else{
            // 点下按钮之后加载css动画
            $('.liebiaoShow').empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.loaders').fadeIn(200);
            // console.log(paixuName);
            $.ajax({
                url: '/pinpai/index.type.php',
                type: 'post',
                dataType: 'text',
                data: {'num': paixuName},
                success:function(msg){
                    // console.log(msg);
                    // 清空liebiaoShow并插入li
                    // console.log(msg);
                    $('.liebiaoFuck').eq(0).hide();
                    $('.liebiaoShow').eq(0).empty().append(msg);
                    $('.liebiaoShow').eq(0).find('.toutiao01').append('推荐');
                    $('.liebiaoShow').eq(0).find('.di_zhi').append('创立国家：');
                    $('.liebiaoShow').eq(0).find('.nianfen').append('创立年份：');
                    $('.liebiaoShow').eq(0).find('.telephone_one').append('咨询电话：');
                }
            })
                .done(function() {
                    // console.log("success");
                })
                .fail(function() {
                    // console.log("error");
                })
                .always(function() {
                    // console.log("complete");
                });
        };


    });

// ``````````````````````````````````````````````````````````````````````````````````````
//首先封装页面加载获取当前所在城市信息的函数
    function getCurrentCity(){
        var subCity1;
        // 第一步,向高德API发送请求并获得访问者所在省份
        $.ajax({
            type: "get",
            //url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
            url:'http://restapi.amap.com/v3/ip?key=7a178998b6550b21f6a2fb88d3285fcd',
            dataType: 'text',
            // contentType:'application/x-www-form-urlencoded;charset=UTF-8',
            success: function(data) {
                //转换为JSON对象
                var jsonObj = eval("(" + data.replace('(','').replace(')','').replace(';','') + ")");
                //当前城市
                // $("#shenfen>p").html('当前:'+jsonObj.province);
                subCity1=jsonObj.province;
                subCity1=subCity1.substring(0,subCity1.length-1);//拼接字符串，减去最后一位子副
                console.log(subCity1);
                // 第二步，向好琴声后台发送当前地址并接受返回的信息
                $.ajax({
                    url: '/pinpai/indexs.ip.php',
                    type: 'post',
                    dataType: 'text',
                    data:{'city_ip': subCity1},
                    success:function(msg) {
                        // 清空liebiaoShow并插入li
                        $('.liebiaoFuck').eq(0).hide();
                        $('.liebiaoShow').eq(0).empty().append(msg);
                        $('.liebiaoShow').eq(0).find('.toutiao01').append('推荐');
                        $('.liebiaoShow').eq(0).find('.di_zhi').append('创立国家：');
                        $('.liebiaoShow').eq(0).find('.nianfen').append('创立年份：');
                        $('.liebiaoShow').eq(0).find('.telephone_one').append('咨询电话：');
                    }
                });
                // 第二步end，向好琴声后台发送当前地址并接受返回的信息
            }
        });
        // 自定义函数结束
    }
    //页面加载时调用自己封装的函数来获取当前所在城市信息
    // $(document).ready(function(){
    //     getCurrentCity();
    // });
    //页面加载完毕调用自己封装的函数来获取当前所在城市信息
    // window.onload=function(){
    //
    // }

    $(function () {
//        getCurrentCity();
//        $('.musical-instruments .fenleiFuck').children('li:first').click(function () {
////            getCurrentCity();
//        })
    })
    /**
     * 1.X 此函数为乐器品牌首页,点击其他分类的时候向后台调用数据
     * @param typeNum {number} :1为钢琴,2为提琴,3为吉他,4为管乐器,5为打击乐器
     */
    function newPinType(typeNum) {
        // var typeName;
        // switch (typeNum){
        //     case 1:typeName = '钢琴';
        //         break;
        //     case 2:typeName = '提琴';
        //         break;
        //     case 3:typeName = '吉他';
        //         break;
        //     case 4:typeName = '管乐';
        //         break;
        //     case 5:typeName = '打击乐';
        //         break;
        // };
        $.ajax({
            url: '/pinpai/index.type.ajax.php',
            type: 'post',
            dataType: 'text',
            data:{'pintype': typeNum},
            success:function(msg) {
                // 清空liebiaoShow并插入li
                $('.liebiaoFuck').eq(0).hide();
                if (!msg){
                    $('.liebiaoShow').eq(typeNum).empty().append('<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到相应品牌，快来加入好琴声吧！</p>');
                } else {
                    $('.liebiaoShow').eq(typeNum).empty().append(msg);
                    $('.liebiaoShow').eq(typeNum).find('.toutiao01').append('推荐');
                    $('.liebiaoShow').eq(typeNum).find('.di_zhi').append('创立国家：');
                    $('.liebiaoShow').eq(typeNum).find('.nianfen').append('创立年份：');
                    $('.liebiaoShow').eq(typeNum).find('.telephone_one').append('咨询电话：');
                }
            }
        });
    }

    $(function () {
        //点击乐器品牌首页,点击其他分类的时候向后台调用数据,只限点击一次
        $('.musical-instruments .fenleiFuck').children('li').one('click',function () {
            console.log(1);
            var iPinIdx;
            iPinIdx = $(this).index();
            if (iPinIdx >0 ){
                newPinType(iPinIdx);
            }
        });
    });




// ``````````````````````````````````````````````````````````````````````````````````````
    // 乐器品牌的前台显示主页部分js
    // 2.产品中心，点击切换列表
    $('.series-head-hd').click(function () {
        var ishd = $(this).index();
        // console.log(ishd);
        $(this).addClass('on').siblings().removeClass('on');
        $('.series-type-lists').eq(ishd).addClass('on').siblings().removeClass('on');
    })
    //3.公司新闻,点击公司新闻的时候，加载新闻
    var iNewsClk = 0;
    $('.pinpai-news').click(function () {
        if ( iNewsClk > 0 ) {
            return false;
        }
        $.ajax({
            url:'/e/space/template/pinpai/index.liebiao.ajax.php',
            type:'post',
            beforeSend:function () {
                $('.list3 .loaders').show();
            },
            data:{userid:curUserId}
        }).done(function (msg) {
            var msg = eval('('+msg+ ')');
            // console.log(msg);
            // console.log(typeof msg);
            // console.log(msg.length);

            if (msg == "" || msg.lengh ==0){
                $('.list3 .loaders').hide();
                $('.list3 .product-news ').append('<dt class="news-lists news-item">没有新闻了！</dt>');

            } else {
                // var msg = eval('('+msg+ ')');
                $('.list3 .loaders').hide();
                $.each(msg, function(index, val) {
                    // data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
                    $('.list3 .product-news').append('<dt class="news-lists news-item"><a class="clearfix" href="'+val.e+
                        '"><div class="news-item-img f-l-l"><img src="'+val.a+
                        '"/ alt="'+val.b+
                        '"></div><div class="news-item-body f-l-l "><div class="news-item-title">'+val.b+
                        '</div>'+
                        '<div class="news-item-smalltext"><p>'+val.c+'</p></div>'+
                        '<div class="news-item-time">'+val.d+'</div></div>'+
                        '</a></dt>');
                });

            }
        });
        iNewsClk++;//记录点击次数
    })
    //4.销售渠道,点击渠道
        var iSellClk = 0;
        $('.pinpai-seller').click(function () {
            if ( iSellClk > 0 ) {
                return false;
            };
            $.ajax({
                url:'/e/space/template/pinpai/xiaoshou.lie.ajax.php',
                type:'post',
                beforeSend:function () {
                    $('.list4 .loaders').show();
                },
                data:{userid:curUserId}
            }).done(function (msg) {
                $('.list4 .product-news ').empty();
                if (!msg){
                     $('.list4 .loaders').hide();
                    $('.list4 .product-news ').append('<dt class="news-lists news-item" style="min-height:100px;">该品牌没有销售渠道！</dt>')
                } else {
                    $('.list4 .loaders').hide();
                    // $('.list4 .product-news ').empty();
                    $('.list4 .product-news').append(msg);

                }
            });
            iSellClk++;
        });
       // 4.1 销售渠道地区搜素
            $('.list4 .chacity').children('input').on('click',function () {
                var area1 = $('#sfdq_tj').val(),
                    area2 = $('#csdq_tj').val(),
                    area3 = $('#qydq_tj').val();
                if (area1 == "" || area1 == "地区"){
                    alert('请选择地区之后再查询！');
                    return false;
                };
                $.ajax({
                    url:'/e/space/template/pinpai/xiaoshou.add.ajax.php',
                    type:'post',
                    data:{userid:curUserId,add_1:area1,add_2:area2,add_3:area3},
                    beforeSend:function () {
                        $('.list4 .loaders').show();
                        }
                    }).done(function (msg) {
                        console.log(msg);
                        $('.list4 .product-news ').empty();
                        if (!msg){
                            console.log(1);
                            $('.list4 .loaders').hide();
                            $('.list4 .product-news').append('<dt class="news-lists news-item" style="min-height:100px;">&nbsp;&nbsp;在'+area1+area2+area3+',没有查询到该品牌的销售渠道。</dt>');
                        } else {
                            $('.list4 .loaders').hide();
                            $('.list4 .product-news').append(msg);

                        }
                })
            });

        // 4.2 销售渠道地区搜素
            $('.list4 .chaSearch').on('click',function () {
                var searchVal = $('.list4 .searchSelect').val();
                if (!searchVal){
                    alert('请输入内容后再搜索！');
                    return false;
                };
                $.ajax({
                    url:'/e/space/template/pinpai/xiaoshou.name.ajax.php',
                    type:'post',
                    data:{userid:curUserId,'name':searchVal},
                    beforeSend:function () {
                        $('.list4 .loaders').show();
                        }
                    }).done(function (msg) {
                        // console.log(msg);
                        $('.list4 .product-news ').empty();
                        if (!msg){
                            // console.log(1);
                            $('.list4 .loaders').hide();
                            $('.list4 .product-news').append('<dt class="news-lists news-item" style="min-height:100px;">&nbsp;&nbsp;没有查询到与'+searchVal+'相关的销售渠道。</dt>');
                        } else {
                            $('.list4 .loaders').hide();
                            $('.list4 .product-news').append(msg);

                        }
                })
            });

    // 5.留言板js
        //4.1 点击我要留言按钮。弹出留言框
        $('.go-write-msg').on('click',function () {
            $.get('/e/member/login/headjs_3.php?t='+Math.random(), function(data) {
                getUserid1 = parseInt(data);
                // console.log(getUserid1);
                if (getUserid1 == 0 ) {//未登录
                    $('#loginBtn').trigger('click');
                } else {
                    $('.write-message-board').slideDown(100);
                }
            });
        });
        //4.2 点击留言板，加在所有留言
        $('.pinpai-word').click(function () {
            $.ajax({
                url:'/e/space/template/pinpai/xiaoshou.liuyan.ajax.php',
                type:'post',
                beforeSend:function () {
                    $('.list5 .loaders').show();
                },
                data:{userid:curUserId}
            }).done(function (msg) {
                $('.list5 .messages-board-lists ').empty();
                if (msg == "" || msg == null){
                    $('.list5 .loaders').hide();
                    $('.list5 .messages-board-lists').append('<dt class="news-lists news-item">没有数据！</dt>')
                } else {
                    $('.list5 .loaders').hide();
                    // $('.list4 .product-news ').empty();
                    $('.list5 .messages-board-lists').append(msg);

                };
            });
        });

        // 5.1 联系我们中的二维码，如果图片链接为空，隐藏掉它
        if (!$('.qrcode>img').attr('src')){
            // console.log($('.qrcode>img').attr('src'));
            $('.qrcode').hide();
        }



});


