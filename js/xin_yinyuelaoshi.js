$(function () {

    $('.liebiaoFuck img').error(function () {
        $(this).attr('src','/d/photo/5789/big.jpg');
    });
//	var iUl;
//	var iList=8;
    // 点击分类显示不同分类里面的老师
    var ifenlei;
    $('.fenleiFuck li').click(function (event) {

        ifenlei = $(this).index();

        $(this).addClass('current').siblings('li').removeClass('current');
        $('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
        $('.tuijianFuck').eq(ifenlei).fadeIn('fast').siblings('ol').hide();
        // 显示前N个开始-----------------------------------------------------------
        // 获取当前显示的那个ul列表的index值···························
//	
//		iList=8;
//		$('.liebiaoShow').each(function(index, element) {
//			if ($(element).is(':hidden')) {}else{
//				iUl=index;
//				;};
//			
//		});

        // 获取当前显示的那个ul列表的index值结束·······················
        // 首先显示前20个children('li:gt(20)').hide()
        // $('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------


    });
    // 完成·····················································
    //
//	// 点击分类显示不同分类里面的音乐之星
//	var ifenlei;
//	$('.fenleiCa li').click(function(event) {
//
//
//		ifenlei=$(this).index();
//		
//		$(this).addClass('current').siblings('li').removeClass('current');
//		$('.liebiaoCa').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
//
//		// 显示前N个开始-----------------------------------------------------------
//		// 获取当前显示的那个ul列表的index值···························
//		
//		iList=8;
//		$('.liebiaoShow').each(function(index, element) {
//			if ($(element).is(':hidden')) {}else{
//				iUl=index;
//				;};
//			
//		});
//		
    // 获取当前显示的那个ul列表的index值结束·······················
    // 首先显示前20个children('li:gt(20)').hide()
//	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------
});
// 完成·····················································

//	// 左侧的二级菜单点击，右侧显示相应的内容·····················
//	$('.mingrenPoint').click(function(event) {
//		$('.mingrenPoint').addClass('current');
//		$('.zhixingPoint').removeClass('current');
//		$('.yinyuemingren').stop(true).show();
//		$('.xinyuezhixing').stop(true).hide();
//		// 显示前N个开始-----------------------------------------------------------
//	// 获取当前显示的那个ul列表的index值···························
//	iList=8;
//	var iContent;
//	$('.qzdtContent>div').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iContent=index;
//			};
//	});
//	$('.liebiaoShow').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iUl=index;
//			;};
//		
//	});

// 获取当前显示的那个ul列表的index值结束·······················
// 首先显示前20个children('li:gt(20)').hide()
//	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------
// 
//	});
//	$('.zhixingPoint').click(function(event) {
//		$('.mingrenPoint').removeClass('current');
//		$('.zhixingPoint').addClass('current');
//		$('.yinyuemingren').stop(true).hide();
//		$('.xinyuezhixing').stop(true).show();
//		// 显示前N个开始-----------------------------------------------------------
//	// 获取当前显示的那个ul列表的index值···························
//	iList=8;
//	
//	$('.qzdtContent>div').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iContent=index;
//			};
//	});
//	$('.liebiaoShow').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iUl=index;
//			;};
//		
//	});

// 获取当前显示的那个ul列表的index值结束·······················
// 首先显示前20个children('li:gt(20)').hide()
//	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------


//	});

// 瀑布流下拉显示·············································
//


// 显示前N个开始-----------------------------------------------------------
// 获取当前显示的那个ul列表的index值···························

//	var iContent;
//	$('.qzdtContent>div').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iContent=index;
//			};
//	});
//	$('.liebiaoShow').each(function(index, element) {
//		if ($(element).is(':hidden')) {}else{
//			iUl=index;
//			;};
//		
//	});

// 获取当前显示的那个ul列表的index值结束·······················
// 首先显示前20个c
// $('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();


// 显示前N个结束-----------------------------------------------------------
//	
//	$(window).scroll(function(event) {
//							if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
//									
//									for (var i = iList; i < iList+4; i++) {
//										$('.liebiaoShow').eq(iUl).children('li').eq(i).show();
//										console.log(i);
//										
//
//									};
//
//									iList=iList+4;
//							};
//						});
//

// ```````````````````````````````````````````````````````````````````````````````````````````````````````````
$(function () {


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
                    // console.log(msg);
                    // console.log(typeof(msg));
                    // 清空liebiaoShow并插入li
                    // $('.liebiaoFuck').eq(0).hide();
                    if (msg == '') {
                        $('.liebiaoShow').eq(0).empty().append('<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到老师，快来加入好琴声吧！</p>');
                    } else {
                        $('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
                        $('.liebiaoShow').eq(0).empty().append(msg);
                    }

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
// ---------------------------------------------------------------------------------------------------------

// 教室输入名字查询
    var jiaoshiName;
    $('.searchSub').click(function (event) {
        jiaoshiName = $('.searchSelect').val();
        // console.log(jiaoshiName);
        if (jiaoshiName == "") {
            alert('输入的老师名字不能为空');
        } else {
            // 点下按钮之后加载css动画
            $('.liebiaoShow').empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
            $('.loaders').fadeIn(200);
            // console.log(jiaoshiName);
            $.ajax({
                url: '/laoshi/index.name.php',
                type: 'post',
                dataType: 'text',
                data: {'jiaoshi1': jiaoshiName},
                success: function (msg) {
                    // console.log(msg);
                    // 清空liebiaoShow并插入li
                    // console.log(msg);
                    // $('.liebiaoFuck').eq(0).hide();
                    if (msg == '') {
                        $('.liebiaoShow').eq(0).empty().append('<p style="font-size:16px;color:#cb7047;text-algin:center;">没有找到老师，快来加入好琴声吧！</p>');
                    } else {
                        $('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
                        $('.liebiaoShow').eq(0).empty().append(msg);
                    }

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

// ---------------------------------------------------------------------------------------------------------

    // 教室输入排序类型查询
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
})
// ``````````````````````````````````````````````````````````````````````````````````````
//首先封装页面加载获取当前所在城市信息的函数、
function getCurrentCity() {
    // 点下按钮之后加载css动画
    $('.liebiaoShow').eq(0).empty().append('<div class="loaders"><div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>');
    $('.loaders').fadeIn(200);
    var subCity1;
    // 第一步,向高德API发送请求并获得访问者所在省份
    $.ajax({
        type: "get",
        url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
        dataType: 'text',
        // contentType:'application/x-www-form-urlencoded;charset=UTF-8',
        success: function (data) {

            // console.log(data);
            //转换为JSON对象
            var jsonObj = eval("(" + data.replace('(', '').replace(')', '').replace(';', '') + ")");
            //当前城市
            // $("#shenfen>p").html('当前:'+jsonObj.province);
            subCity1 = jsonObj.province;
            subCity1 = subCity1.substring(0, subCity1.length - 1);
            // console.log(subCity1);
            // 第二步，向好琴声后台发送当前地址并接受返回的信息
            $.ajax({
                url: '/laoshi/indexs.ip.php',
                type: 'post',
                dataType: 'text',
                data: {'city_ip': subCity1},
                success: function (msg) {
                    // console.log({'city_ip': subCity1})
                    // console.log(msg);
                    // 清空liebiaoShow并插入li
                    $('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
                    $('.liebiaoShow').eq(0).empty().append(msg);
                }
            });
            // 第二步end，向好琴声后台发送当前地址并接受返回的信息

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


// ``````````````````````````````````````````````````````````````````````````````````````
$(function () {


    //点击全部老师
    $('.teacher-all').on('click', function (event) {
        getCurrentCity();
    });

})
// 点击音乐老师下面的，音乐名人，加载名人数据
$(function () {
    $('.YinYueMingRen').on('click', function () {
        var subCity1;
        // 第一步,向高德API发送请求并获得访问者所在省份
        $.ajax({
            type: "get",
            url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
            dataType: 'text',
            success: function (data) {
                //转换为JSON对象
                var jsonObj = eval("(" + data.replace('(', '').replace(')', '').replace(';', '') + ")");
                //当前城市
                subCity1 = jsonObj.province;
                subCity1 = subCity1.substring(0, subCity1.length - 1);
                // console.log(subCity1);
                // 第二步，向好琴声后台发送当前地址并接受返回的信息
                $.ajax({
                    url: '/mingren/indexs.ip.php',
                    type: 'post',
                    dataType: 'text',
                    data: {'city_ip': subCity1,'mingren':'m'},
                    success: function (msg) {
                        // console.log({'city_ip': subCity1})
                        // console.log(msg);
                        // 清空liebiaoShow并插入li
                        $('.MingRenLists').empty().prepend(msg);
                    }
                });
                // 第二步end，向好琴声后台发送当前地址并接受返回的信息
            }
        });
    })
})


//});



