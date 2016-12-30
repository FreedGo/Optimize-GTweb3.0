/*
*  By Freed
*  flyxz@126.com
*  2016-8-18 9:20;
*/

$.ajaxSetup({
	cache:true
});
//音乐乐谱的内容全部使用ajax从后台调用
/**
 * 1.0封装ajax函数,调用左侧的排行榜
 * @param data1{number},data1为栏目,1热门，2推荐，3最新，
 * @param data2{string},data2为不同排行榜的class名
 * @return msg{json} 返回乐曲信息
 */
function musicBook(data1,data2){
	$.ajax({
		url: '/yuepu/index.type.ajax.php',
		type: 'post',
		// dataType: 'json',
		data: {'type':data1},
		async:true
		// timeout:1000,
	})
	.done(function(msg) {
		data2.children('.recommend-list-content').children('.loaders').hide();
		if (msg == '[]' || msg == ''){
			data2.hide();
			return false;
		}
		// console.log(msg);
		msg = eval('('+msg+')');
		// console.log(msg);
		$.each(msg, function(index, val) {
			 data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
		});
	})
	.fail(function() {
//		console.log("error");
	})
	.always(function() {
//		console.log("complete");
	});
}

/**
 * 2.0 封装调用右侧每个分组的4条数据
 * @param data1{number},data1为栏目,==1钢琴  ==2提琴  ==3吉他  ==4民乐  ==5管乐  ==6综合
 * @param data2{string}，data2为不同列表的class名
 * @return msg{json} 返回乐曲信息
 */
function musicBookList(data1,data2){

	$.ajax({
		url: '/yuepu/index.liebiao.ajax.php',
		type: 'post',
		// dataType: 'json',
		async:true,
		data: {'lie_type':data1}
		// timeout:1000,
	})
	.done(function(msg) {
		var oType;
		if (data1 == 1){
			oType = '钢琴谱'
		} else if(data1 ==2){
			oType = '提琴谱'
		} else if(data1 ==3){
			oType = '吉他谱'
		}else if(data1 ==4){
			oType = '民乐谱'
		}else if(data1 ==5){
			oType = '管乐谱'
		}else if(data1 ==6){
			oType = '综合谱'
		};
		data2.children('ul').children('.loaders').hide();
		// console.log(msg);
		msg = eval('('+msg+')');
		console.log(msg);
		$.each(msg, function(index, val) {
			 // data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
			 data2.children('ul').append('<li class="lists-content-cell f-l-l"><a href="'+val.e+
			 							'"><div class="cell-img"><img src="'+val.a+
			 							'"/ alt="'+val.b+
			 							'"></div><div class="cell-title ">'+
										'<h2>'+val.b+'</h2>'+
										'</div>'+
										'<div class="cell-name"><h3>'+oType+'</h3></div>'+
										'<div class="cell-time">'+val.c+'</div>'+
										'</a></li>');
		});
	})
	.fail(function() {
//		console.log("error");
	})
	.always(function() {
//		console.log("complete");
	});


}
//3.0页面加载时调用
$(function(){
	musicBook(1,$('.recommend1'));//热门
	musicBook(2,$('.recommend2'));//推荐
	musicBook(3,$('.recommend3'));//最新


	musicBookList(1,$('.list-content-type1'));//钢琴谱
	musicBookList(2,$('.list-content-type2'));//提琴谱
	musicBookList(3,$('.list-content-type3'));//吉他谱
	musicBookList(4,$('.list-content-type4'));//民乐谱
	musicBookList(5,$('.list-content-type5'));//管乐谱
	musicBookList(6,$('.list-content-type6'));//综合谱
	
})

//4.0搜索功能的实现
//4.1搜索功能封装
function sousuo(data){//data为搜索框的类名
	var searchType,searchVal;
		searchType = data.find('.search-type option:selected').val();
		searchVal  = data.children(".search-content").val();
//		console.log(searchType);
//		console.log(searchVal);
		if(searchVal==""||searchVal ==null ){
			alert('搜索内容不能为空！');
		}
		else{
			$('.sousuo').show();
			$.ajax({
				url:'/yuepu/index.name.ajax.php',
				type:'post',
				data:{'type':searchType,'name':searchVal},
				beforeSend:function(){
//					$("html,body").animate({scrollTop:$(".sousuo").offset().top},300);
					$('.music-book-type-change>li:lt(6)').hide();
					$('.search2').hide();
					$('.list-content-type7').children('ul').empty().append('<div class="loader"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div>');
				}
			})
			.done(function(msg){
				$('.list-content-type7').children('ul').empty();
				msg = eval('('+msg+')');
//				console.log(msg);
//				console.log(typeof msg);
				if (msg ==""||msg == null) {
					$('.list-content-type7').children('ul').empty().append('没有搜索到相关乐谱，请重新搜索');
				} else if(msg.length == 0){
					$('.list-content-type7').children('ul').empty().append('没有搜索到相关乐谱，请重新搜索');
				} else {
					$.each(msg, function(index, val) {
						var oType;
						if (val.f == 38){
							oType = '钢琴谱'
						} else if(val.f ==39){
							oType = '提琴谱'
						} else if(val.f ==105){
							oType = '吉他谱'
						}else if(val.f ==106){
							oType = '民乐谱'
						}else if(val.f ==107){
							oType = '管乐谱'
						}else if(val.f ==108){
							oType = '综合谱'
						};
						 // data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
						 $('.list-content-type7').children('ul').append('<li class="lists-content-cell f-l-l"><a href="'+val.e+
                            '"><div class="cell-img"><img src="'+val.a+
                            '"/ alt="'+val.b+
                            '"></div><div class="cell-title ">'+
							'<h2>'+val.b+'</h2>'+
							'</div>'+
							'<div class="cell-name"><h3>'+oType+'</h3></div>'+
							'<div class="cell-time">'+val.c+'</div>'+
							'</a></li>');
					});
				}
				
			})
			.fail(function(){
				 $('.list-content-type7').children('ul').empty().append('加载失败！');
//				console.log('error');
			})
		}
}



$(function(){
	
	$('.search1 .search-sub').on('click',function(){
		var searchList1 = $('.search1');
		sousuo(searchList1);
	});
	$('.search1 .search-content').on('keypress',function(event){
		var searchList1 = $('.search1');
		if (event.keyCode == 13){
			sousuo(searchList1);
		}
	});
	$('.search2 .search-sub').on('click',function(){
		var searchList2 = $('.search2');
		sousuo(searchList2);
	});

	
})
