
//1. 音乐广场瀑布流动态加载
// $(function() {
// 	var iList=10;
// 	$('.quanzhandongtai>li:gt(9)').hide();					
// 	$(window).scroll(function(event) {
// 		if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
// 			for (var i = iList; i < iList+3; i++) {
// 				$('.quanzhandongtai>li').eq(i).fadeIn(1000);
// 			};
// 			iList=iList+3;
// 			};
// 	});
// });
// 0.增加下拉刷新提示
	$(function() {
		$('.quanzhandongtai').append('<li class="loaderMsg">下拉查看更多的帖子↓</li>')
	});
// 0.00音乐广场页面加载时就向后台发送请求，获得帖子
	jQuery(document).ready(function($) {
		$.ajax({
			url: '/guangchang/guangchang.ajax.php',
			type: 'post',
			dataType: 'html',
			data: {'number': 0}
		})
		.done(function(msg) {
			// console.log(msg);
			// console.log(typeof(msg));
			if (msg=="") {
				$('.loaderMsg').empty().html('网络错误，加载失败，请刷新网页。。。');
			} else {
				$('.loaderMsg').remove();
				$('.quanzhandongtai').append(msg);//服务器返回内容插到当前元素内部后面
				$('.quanzhandongtai').append('<li class="loaderMsg">下拉刷新帖子↓</li>');
				$('.leftWrap>ul').slideDown(1000);
			}
			
		})
		.fail(function() {
			console.log("error");
			$('.loaderMsg').empty().html('网络错误，加载失败...');
			$('.leftWrap>ul').slideDown(1000);
			// $('.leftWrap>ul').slideDown(1000);
		});
	});
// 1. 音乐广场瀑布流动态加载
$(function() {
	var iList=1,
		scrollTimer=null,
		iload=0,
		a=$('.rightMiddle').height(),
		b=$('.leftWrap');
		b.height(a);
	$(window).scroll(function(event) {
			if (scrollTimer) {
				clearTimeout(scrollTimer);//清除定时器
			}
			scrollTimer=setTimeout(function() {
				//如果离底部小于150像素，就发送请求
				if ($(document).scrollTop() + $(window).height() > $(document).height() -360) {
					$('.loaderMsg').empty().html('正在拼命加载中，请稍等...');
					$('.leftWrap>ul').slideUp(200);
					$.ajax({
						url: '/guangchang/guangchang.ajax.php',
						type: 'post',
						dataType: 'html',
						data: {'number': iList}
					})
					.done(function(msg) {
						// console.log(msg);
						// console.log(typeof(msg));
						if (msg=="") {
							
								iload++;
								if (iload===1) {
									$('.loaderMsg').empty().html('已经是最后一条了...');
								}
								else if(iload===2) {
									$('.loaderMsg').empty().html('别再下拉了，真的没有了，赶紧去个人中心发帖吧...');
								}
								else{
									$('.loaderMsg').empty().html('真的没有了，程序猿哥哥也不是万能的，赶紧去个人中心发帖吧...');
								}
								$('.leftWrap>ul').slideDown(1000);
						} else {
							$('.loaderMsg').remove();
							$('.quanzhandongtai').append(msg);//服务器返回内容插到当前元素内部后面
							$('.quanzhandongtai').append('<li class="loaderMsg">下拉刷新帖子↓</li>');
							$('.leftWrap>ul').slideDown(1000);
						}
						
					})
					.fail(function() {
						console.log("error");
						$('.loaderMsg').empty().html('网络错误，加载失败...');
						$('.leftWrap>ul').slideDown(1000);
						// $('.leftWrap>ul').slideDown(1000);
					});
					iList++;//每发送一次请求数字++
					b.height($('.rightMiddle').height());
				};
			}, 500);

			//左侧随页面滚动而东
			// console.log($('.leftWrap').offset().top);
			// console.log($(document).scrollTop());
			var e = $('.leftWrap'),
				f = e.offset().top,
				r = $(document).scrollTop();
				r-f>0?//大于0则fixed，小于0则relative
				e.children('ul').css({
					position: 'fixed',
					top: 10
				})
				:e.children('ul').css({
					position: 'relative',
					top: 0
				});

		
	});
});

// 2.控制热帖切换 点赞，评论的js
$(function() {
	$('.tie1').click(function(event) {
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.retieTop dt').fadeIn('fast');
		$('.dianzanTop').hide();
		$('.pinglunTop').hide();
	});
	$('.tie2').click(function(event) {
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.retieTop dt').hide();
		$('.dianzanTop').fadeIn('fast');
		$('.pinglunTop').hide();
	});
	$('.tie3').click(function(event) {
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.retieTop dt').hide();
		$('.dianzanTop').hide();
		$('.pinglunTop').fadeIn('fast');
	});
});

//3.音乐广场搜索ajax
$(function() {
	var searchV1;//大的搜索分类
	var searchV2;//搜索内容
	$('.searchInputSub').bind('click', function(event) {
		searchV1=$('#xuanze').val();
		searchV2=$('#searchValue').val();
		if (searchV2=='') {
			alert('搜索内容不能为空');
		}else{
			$.ajax({
				url: '/guangchang/index.name.php',
				type: 'post',
				dataType: 'html',
				data: {'leixing': searchV1,'neirong':searchV2}
			})
			.done(function(msg) {
				
				$('.quanzhandongtai').empty().stop(true).hide().fadeIn('normal').append(msg);
			})
			.fail(function() {
				console.log("error");
			});
		};
		
	});

});
// $('input').click(function(event) {
// 	/* Act on the event */
// });
//4.ajax获取知音动态条数
 $(function() {
 	var codeMsg;
 	$.ajax({
 		url: '/e/ajax/ti_zhiyin.ajax.php',
 		type: 'get',
 		dataType: 'html'
 	})
 	.done(function(msg) {
 		// console.log("success");
 		// console.log(msg);
 		if (msg!=0) {//如果返回值不等于0，即创建标签并填充数字
 			$('.leftMenu3').prepend('<i class="msg_num">'+msg+'</i>');
 		}
 		
 	})
 	.fail(function() {
 		console.log("error");
 	});
 	
 });
