
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
	/*$(function() {
		$('.quanzhandongtai').append('<li class="loaderMsg">下拉查看更多的帖子↓</li>')
	});*/
// 1. 音乐广场瀑布流动态加载
/*$(function() {
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
						data: {'number': iList},
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
});*/

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
	/**
	 * 广场搜索
	 * @param type,分类
	 * @param ele,搜索的内容
	 */
	function sousuo(type,ele) {
		if (ele=='') {
			alert('搜索内容不能为空');
		}else{
			$.ajax({
				url: '/guangchang/index.name.php',
				type: 'post',
				dataType: 'html',
				data: {'leixing': type,'neirong':ele}
			})
				.done(function(msg) {
					$('.quanzhandongtai').empty().stop(true).hide().fadeIn('normal').append(msg);
				})
				.fail(function() {
					console.log("error");
				});
		}
	}
	var searchV1;//大的搜索分类
	var searchV2;//搜索内容
	//点击搜索按钮
	$('.searchInputSub').on('click', function(event) {
		searchV1=$('#xuanze').val();
		searchV2=$('#searchValue').val();
		sousuo(searchV1,searchV2)
	});
//	输入内容按回车
	$('#searchValue').keypress(function (event) {
		if (event.keyCode == 13){
			searchV1=$('#xuanze').val();
			searchV2=$('#searchValue').val();
			sousuo(searchV1,searchV2);
		}
	})

});
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


//5.控制日周月排行榜
//5.1封装ajax
function HotBang(data) {
	//首先检测排行榜的内部是否有内容，再决定是否向后台请求
	var BangCon = $('.hotbang dl').eq(data).children('dt').html();
	if (BangCon==undefined) {
		// console.log('没有内容');
		// console.log(BangCon);
		$.ajax({
			url: '/guangchang/paihang.ajax.php',
			type: 'post',
			dataType: 'html',
			data: {'dateone': data+1}//1=日，2=周，3=月
		})
		.done(function(msg) {
			// console.log("success");
			$('.hotbang dl').eq(data).append(msg);
			// console.log(msg);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	} else {
		console.log('有内容');
		// console.log(BangCon);
	}
	
}

//5.2控制点击显示并调用内容
$(function() {
	$('.pai1').click(function(event) {
		HotBang(0);
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.dayTop dt').fadeIn('fast');
		$('.weekTop').hide();
		$('.monthTop').hide();
	});
	$('.pai2').click(function(event) {
		HotBang(1);
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.dayTop dt').hide();
		$('.weekTop').fadeIn('fast');
		$('.pinglunTop').hide();
	});
	$('.pai3').click(function(event) {
		HotBang(2);
		$(this).addClass('on').removeClass('out').siblings('span').removeClass('on').addClass('out');
		$('.dayTop dt').hide();
		$('.weekTop').hide();
		$('.monthTop').fadeIn('fast');
	});
});
//5.3页面加载的时候就先把日榜请求出来
$(document).ready(function() {
	HotBang(0);
});


/**
 * //5.4 调用提示框
 * @param {string} str,提示框显示的内容,必须
 * @param {string} title,提示框标题,默认为空
 * @param {number} time ,提示框消失时间,默认500毫秒
 */
function gtAleryt(str,title,time) {
	var bgDom = $('.common-bg'),
		msgWarp = $('.common-msg-warp'),
		msgTitle = $('.common-msg-title'),
		msgCon = $('.common-msg-con');
	bgDom.stop(true).show();
	msgWarp.stop(true).fadeIn(100);
	msgCon.html(str);
	msgTitle.html(title||"");
	setTimeout(function () {
		bgDom.stop(true).fadeOut(100);
		msgWarp.stop(true).fadeOut(100);
	},time||1500);
}
//5.5 每个人的旁边都要加关注
/**
 * 关注
 * @param userid,{string}
 * @constructor
 */

function GuanZhu(userid){
	$.post("/e/extend/feed/index.php",
		{
			followid:userid
		},
		function(data,status){
			switch(data){
				case"DelSuccess":gtAleryt("<img src='/yecha/error.png'><span style='color: red'>取消关注成功!</span>");
					$('.guanzhu'+userid).html('关注');
					break;
				case"unknowerror":gtAleryt("发生未知错误,请联系管理员!");
					break;
				case"nofollowme":gtAleryt("不能关注自己哦!");
					break;
				case"AddSuccess":gtAleryt("<img src='/yecha/success.png'>关注成功!");
					$('.guanzhu'+userid).html('已关注');
					break;
				case"Pleaselogin":$('#loginBtn').trigger('click');
					break;
			}
		}
	);
}