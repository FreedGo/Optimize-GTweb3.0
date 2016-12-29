/*
* @Author: Freed
* @Date:   2016-05-26 20:21:38
* @Last Modified by:   Freed
* @Last Modified time: 2016-05-29 12:09:41
*/
$(function() {
	//1.0直播内页superslide配置

	$('.fenleiFuck li').click(function (event) {
		ifenlei = $(this).index();
		$(this).addClass('current').siblings('li').removeClass('current');
		$('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
		$('.tuijianFuck').eq(ifenlei).fadeIn('fast').siblings('ol').hide();
	});
	/* 详简切换通过添加on类名和css控制 */
	$("#tabRank li").hover(function(){ $(this).addClass("on").siblings().removeClass("on")},function(){ });
	/* Tab切换 */
	$("#tabRank").slide({ titCell:"dt h3", mainCell:"dd",trigger:'click',autoPlay:false,effect:"left",delayTime:300 });

	// //1.1直播内页评论框获取焦点之后边框颜色改变
	// var b = $('.talk-msg-edi');//内容输入框
	// b.focus(function(event) {
	// 	$(this).css('borderColor', '#f70');
	// });
	// b.blur(function(event) {
	// 	$(this).css('borderColor', '#ccc');
	// });
	// // 1.3点击发送将评论发送至后台。并插入当前聊天框
	// var c = $('.talk-msg-edi-btn'),//发送按钮
	// 	d = $('.live-talk-content');//聊天外框
	// 	c.on('click', function(event) {
	// 		d.append('<li class="talk-msg local-msg  clearfix"><div class="talk-msg-head clearfix"><img class="f-l-r" src="./images/img.png"><h3 class="talk-msg-name f-l-r" >发言者</h3></div><div class="talk-msg-main"><p>'+b.val()+'</p></div></li>');
	// 		b.val('');
	// 		// console.log(b.scrollTop());
	// 	});
	// 1.4直播内页窄评论框去掉表情与插入图片功能
		$('.pl-tools li').eq(0).remove();
		$('.pl-tools li').eq(1).remove();
	// 2.0直播报名页小nav横栏点击切换
	$('.fenleiFuck li').on('click', function(event) {
		var e = $(this).index();
			$('.fenleiFuck li').removeClass('current');
			$(this).addClass('current');
			$('.liebiaoFuck').removeClass('current').eq(e).addClass('current');
	});
	// 2.1报名内页点击报名按钮跳出填写信息的页面
	$('.baomingBtn').on('click', function(event) {
		$('.rightBan').hide();
		$('.rightMiddle').hide();
		$('.baomingMsg').show();
	});
	//2.2视频遮罩5秒消失
	setTimeout(function () {
		$('.live-player-cover').hide();
	},5000)
});