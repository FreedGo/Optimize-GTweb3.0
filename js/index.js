$(function(){
	// 链接新页面打开
	$('a').attr('target', '_blank');
	// 头部鼠标悬停显示二级菜单
	// var iNav;
	// $('.oneNav li').hover(function(){
	// 	iNav=$(this).index();
	// 	if (iNav>0) {
	// 		if (iNav<8||iNav>9) {
	// 		$('.twoNavWrap').stop(true).slideDown('fast');
	// 		$('.twoNav').eq(iNav-1).stop(true).show().siblings().hide();
	// 		};
	// 	}
	// },function(){
	// 	$('.twoNavWrap').stop(true).slideUp('fast');
	//
	// });
	// $('.twoNav').hover(function(){
	// 	$('.twoNavWrap').stop();
	// 	$('.twoNav').stop();
	// },function () {
	// 	$('.twoNavWrap').stop(true).slideUp('fast');
	// 	$('.twoNav').stop(true).hide();
	//
	// })
	// 主页广告显示事件



			// var iAD;
            //
			// // 让每个li的left值都不一样
			// for (var i = 0; i <= 4; i++) {
			// 	if (i==0) {
			// 		$('.bigAdPic li').eq(i).css({
			// 		'left': 50
			//
			// 		});
			// 	} else{
			// 		$('.bigAdPic li').eq(i).css({
			// 		'left': i*150
			//
			// 		});
			// 	};
			//
			// };
			// // 鼠标以上事件
			// $('#littleAdvert li').mouseover(function() {
			// 	// 获得index
			// 	iAD=$(this).index()
			// 	console.log(iAD);
			// 	// 大框显示
			// 	$('.bigAdPic').stop(true).show();
			//
			// 	// 相应的li显示
			// 	$('.bigAdPic li').eq(iAD).stop(true).show().animate({
			// 		'width': 1000,
			// 		'left':0
			// 		},
			// 		400).siblings().hide();
			//
            //
			// });
            //
			// $('.bigAdPic li').mouseout(function() {
			// 	$('.bigAdPic').stop(true).hide();
            //
			// 	$(this).stop(true).animate({
			// 		'width': 50
			// 		 },
			// 		400);
            //
			// 	for (var i = 0; i <= 4; i++) {
			// 	if (i==0) {
			// 		$('.bigAdPic li').eq(i).css({
			// 		'left': 50
			//
			// 		});
			// 	} else{
			// 		$('.bigAdPic li').eq(i).css({
			// 		'left': i*150
			//
			// 		});
			// 	};
			//
			// };
			// });

			// $('.bigAdPic').mouseout(function(event) {
			// 	$('.bigAdPic').stop(true).slideUp(400);
			// 	$('.bigAdPic li').eq(iAD).stop(true).slideDown(400)
			// });

// 主页海选轮播图·································································
 		// 鼠标以上haixuanleft，i显示
 		$('.haixuanLeft').hover(function() {
 			$('.haixuanLeft>i').stop(true).fadeTo('100', 0.5);
 		}, function() {
 			$('.haixuanLeft>i').stop(true).fadeTo('100', 0);
 		});
        $('.haixuanLeft>i').hover(function() {
        	$(this).stop(true).fadeTo('100', 0.8);
        }, function() {
        	$(this).stop(true).fadeTo('100', 0.5);
        });

        // 轮播图自动变换
        var ihaixuan;
        var h=0;
        var timerHaiXuan;
        // 定时器函数
        function haiXuanTurn (argument) {
        	h++;
        	if (h>3) {h=0};
        	$('.haixuanLeft>ul>li').eq(h).stop(true).fadeTo('fast', 1).siblings('li').stop(true).fadeTo('fast',0);
        	$('.haixuanLeft>ol>li').eq(h).addClass('current').siblings('li').removeClass('current');
        }	
        	
        // 设定定时器
        timerHaiXuan=setInterval(haiXuanTurn, 3000);
        // 点击ol>li让轮播图切换
        $('.haixuanLeft>ol>li').click(function(event) {
        	clearInterval(timerHaiXuan);
        	h=$(this).index();
        	$('.haixuanLeft>ul>li').eq(h).stop(true).fadeTo('fast', 1).siblings('li').stop(true).fadeTo('fast',0);
        	$('.haixuanLeft>ol>li').eq(h).addClass('current').siblings('li').removeClass('current');
        	timerHaiXuan=setInterval(haiXuanTurn, 3000);

        });

        // 点击左右按钮切换图片
        $('.haixuanLeft .left').click(function(event) {
        	clearInterval(timerHaiXuan);
        	h--;
        	if (h<0) {h=3};
        	$('.haixuanLeft>ul>li').eq(h).stop(true).fadeTo('fast', 1).siblings('li').stop(true).fadeTo('fast',0);
        	$('.haixuanLeft>ol>li').eq(h).addClass('current').siblings('li').removeClass('current');
        	timerHaiXuan=setInterval(haiXuanTurn, 3000);
        });
        $('.haixuanLeft .right').click(function(event) {
        	clearInterval(timerHaiXuan);
        	h++;
        	if (h>3) {h=0};
        	$('.haixuanLeft>ul>li').eq(h).stop(true).fadeTo('fast', 1).siblings('li').stop(true).fadeTo('fast',0);
        	$('.haixuanLeft>ol>li').eq(h).addClass('current').siblings('li').removeClass('current');
        	timerHaiXuan=setInterval(haiXuanTurn, 3000);
        });

// 主页海选轮播图·································································
// 主页点击登陆····························································
		$('.login li').eq(0).click(function(event) {
			$('.loginUp').stop(true).fadeIn('400');
			$('.loginDown').stop(true).fadeIn('400');
		});
		$('.close').click(function(event) {
			$('.loginUp').stop(true).fadeOut('400');
			$('.loginDown').stop(true).fadeOut('400');
		});

		// append鼠标滑过显示二维码下载app
		$('.login li').eq(3).hover(function() {
			$('.appdown').stop(true).fadeIn('400');
		}, function() {
			$('.appdown').stop(true).fadeOut('400');
		});



	
// 主页点击登陆····························································
	// 主页广告显示事件
	// 列表页轮播图
	var iLi=0;
	var timer;
	var iPlint=0;
	var firstLi=$('.lunboNews li:first').clone(true)
		$('.lunboNews ul').append(firstLi);
	function liTurn () {
		
		iLi++;
		if (iLi>4) {
			iLi=1;
			$('.lunboNews ul').css('left', 0);
		};
		$('.lunboNews ul').animate({
			'left': -iLi*880},
			1000);
		iPlint++;
		if (iPlint>3) {
			iPlint=0;
		};
		// point自动走
		$('.point li').eq(iPlint).addClass('current').siblings('li').removeClass('current');
		// point点击事件

	}
	// 启动定时器
	timer=setInterval(liTurn, 4000);
	// point点击事件
	$('.point li').click(function(event) {
			clearInterval(timer);
			iPlint=$(this).index();
			$('.point li').eq(iPlint).addClass('current').siblings('li').removeClass('current');
			iLi=iPlint;
			$('.lunboNews ul').animate({
			'left': -iLi*880},
			1000);
			timer=setInterval(liTurn, 4000);
		});
	// 轮播图事件结束
// 列表页右侧最后一个排行榜下拉fixd
	// 这个排行榜的上一个底部距离document的y距离
	// 	var iHeight;
	// 	var iHeight2;
	// 	// document被浏览器卷取的高度
	// 	var dheight;
	// 	// 设的数组recommond的长度
	// 	var iRecom;
	// 	var w;
	// 	var fuck;
	// 	var footHe;
	// 	iRecom=$('.recommond').length;
	// 	w=$('.recommond').eq(iRecom-1).outerHeight(true);

	// 	iHeight=$('.recommond').eq(iRecom-1).offset().top;
	// 	// console.log(iHeight);
	// 	fuck=iHeight;
		
		
	// $(window).scroll(function(event) {
	// 	footHe=$('.footer').offset().top;
	// 	// document被浏览器卷取的高度
	// 	dheight=$(window).scrollTop();
	// 	// console.log(dheight);
	// 	// 这个排行榜的上一个底部距离document的y距离
	// 	// rbottom=$('.recommond').css('bottom');
	// 	iHeight2=$('.recommond').eq(iRecom-1).offset().top;
	// 	console.log(iHeight2);
	// 	console.log(footHe);
	// 	if (fuck<=dheight) {
			
	// 		$('.recommond:last').css({
	// 			'position': 'fixed',
	// 			'top': 0});


	// 	}else{
	// 		$('.recommond:last').css({
	// 			'position': 'relative'
				
	// 		});
	// 	};
	// 	if (footHe-iHeight2<=679) {
	// 		$('.recommond:last').stop(true).fadeTo('200', 0);
	// 	} else{
	// 		$('.recommond:last').stop(true).fadeTo('200', 1);
	// 	};
	// });
	// <!-- 瀑布流动态jq加载新闻列表页li········································ -->
				
					$(function() {
						var iList=10;

						$(window).scroll(function(event) {
							if ($(document).scrollTop() + $(window).height() > $(document).height() - 100) {

									for (var i = iList; i < iList+3; i++) {
										$('.videoNewsListFuck>li').eq(i).delay(1000).fadeIn(1000);


									};

									iList=iList+3;
							};
						});




					});


			
				// <!-- 瀑布流动态加载li········································ -->
				
				
				//动态加载分享
				
				
				
				 $('.shareBtn').click(function(event) {

				 	   $('.bdsharebuttonbox').remove();
                       $(this).append('<div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a><a href="#" class="bds_more" data-cmd="more"></a></div>');
                       window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

                       event.stopPropagation();
                                                $(window).click(function(event) {
                                                    $('.bdsharebuttonbox').stop(true).remove();
                                                });

                    });
					//动态加载结束
					$('.bdsharebuttonbox').click(function(event) {
						$(this).remove();
					});
	



	

})

