$(function() {

	//1.1 动态改变a的链接是老师还是教室
	var iTech;
	$('.musicTechHead h3').click(function(event) {
		iTech=$(this).index();
		console.log(iTech);
		$(this).addClass('current').siblings('h3').removeClass('current');
		$('.musicTechList ul').eq(iTech).fadeIn('400').siblings('ul').hide();
		if (iTech==0) {
			$(this).siblings('.more').children('a').attr('href', 'http://www.greattone.net/jiaoshi/');
		} else{
			$(this).siblings('.more').children('a').attr('href', 'http://www.greattone.net/laoshi/');
		};
	});

	//1.2 音乐执行点击切换
	var ixing;
	$('.xingName li').click(function(event) {
		ixing=$(this).index();
		$('.xingImg ul').eq(ixing).stop(true).fadeIn('fast').siblings('ul').hide();
	});
});