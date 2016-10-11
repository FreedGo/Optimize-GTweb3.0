//定义ajax数据请求函数
function newsTie(data1,data2){
	$.ajax({
		type:"post",
		url:"/e/ajax/yinyue.xinwen.ajax.php",
		dataType:"html",
		data:{"xinwentype":data1,"xinwennum":data2},//第一个参数是回来的新闻类型1是全部，2是音乐新闻，3是乐器新闻，第二个参数为当前请求次数,第三个是容器
		beforeSend:function(){
			$('.loadermsg').html('正在加载中...');
		},
		async:true
	})
	.done(function(msg){
		console.log({"xinwentype":data1,"xinwennum":data2});
//		console.log(msg);
		if (msg==""||msg==null) {
			$('.loadermsg').html('没有更多的新闻了！')
		} else{
//			console.log(msg);
			$('.loadermsg').remove();
//			console.log(data3);
			$('.videoNewsListFuck').append(msg);
			$('.videoNewsListFuck').append('<li class="loadermsg">下拉加载更多新闻！</li>');
		}
		scrollNum++;
		
	})
	.error(function(){
		console.log("error");
	});
}

	var scrollNum = 0;
	// 页面加载的时候就第一次请求
	$(document).ready(function() {
		$('.videoNewsListFuck').append('<li class="loadermsg">下拉加载更多新闻！</li>');
		newsTie(newsType,scrollNum);
		// scrollNum++;
	});

$(function() {
	var scrollTimer=null;
	$(window).scroll(function(event) {
//		console.log(scrollTimer);
		if(scrollTimer){//当定时器存在时,清除定时器，即达到替代效果，实现函数节流
			clearTimeout(scrollTimer);
		}
		if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
			//0.首先设置单次定时器
			scrollTimer = setTimeout(function(){
				newsTie(newsType,scrollNum);
				
			},500);//定时器设置结束
			
		};//判断滚动条件结束	
		
	});//设置滚动事件结束



});	