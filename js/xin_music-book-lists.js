/**
 *  Freed  2016/9/17
 *  flyxz@126.com
 *  https://github.com/FreedGo
 *  本js主要是乐谱频道下面的各个列表页的数据调用，以及分页系统
 *  数据调用采用ajax，依赖于jquery
 */
//1.1乐谱列表页数据调用封装
var maxPageNum=[0,0,0,0,0,0];//各个分类的页码系统
// 1.2封装调用函数
/**
 * 此处为乐谱数据向调用及分页相关
 * @param data1 {number}为栏目,==38钢琴  ==39提琴  ==105吉他  ==106民乐  ==107管乐  ==108综合
 * @param data2 {number}为分类，1为全部 2为古典 3为流行 4为原创，5为伴奏，6为综合,
 * @param data3 {number}为各个分类请求次数，针对同时序列化多个页码系统
 * @param data4 {string}为div容器，放置请求回来的乐谱数据，针对同时序列化多个页码系统
 * @return msg  [json,json,json,...] 返回值为json组成的数组，需要拆解
 */
function musicBookLists(data1,data2,data3,data4){
	$.ajax({
		url: '/yuepu/lie.index.ajax.php',
		type: 'post',
		// dataType: 'json',
		async:false,
		data: {'classid':data1,'typeid':data2,'num':data3},
		timeout:1000,
		beforeSend:function(){
			data4.children('.loaders').show();
		}
	})
	.done(function(msg) {
		if(msg == [] || msg == ""){
			data4.children('ul').append('<div style="text-align: center">暂时没有相关乐谱,快来上传把。</div>');
			return;
		};
		var oType;
		if (data1 == 38){
			oType = '钢琴谱'
		} else if(data1 ==39){
			oType = '提琴谱'
		} else if(data1 ==105){
			oType = '吉他谱'
		}else if(data1 ==106){
			oType = '民乐谱'
		}else if(data1 ==107){
			oType = '管乐谱'
		}else if(data1 ==108){
			oType = '综合谱'
		};
//		第一步,隐藏loading动画，清空内容
		data4.children('.loaders').hide();
		data4.children('ul').empty();
//		第二部,格式化返回数据
		msg = eval('('+msg+')');
		//经过处理的返回值各个json中的键值意义为
		//1.msg.a为标题图片链接
		//2.msg.b为标题
		//3.msg.c为作者
		//4.msg.d为发表时间
		//5.msg.e为乐谱链接
		//6.msg.f为当前请求的列表最大页数
		//第三步.如果各个分类请求次数为0，则给页码赋值，创建页码系统
		if (parseInt(data3) == 0 ) { 
			maxPageNum[data2-1] = msg[0].f||0;//给相应分类赋值，最大分页数
        	//获取最大页码
			var maxPage = maxPageNum[0];
			// 首先给相应的分类的尾页按钮的page-data赋值
			$('.page-warp'+data2).find('.pageBtn:last').attr({"page-data": maxPage});
//			清空内容
			$('.pagination'+data2).empty();
			// 第一次生成页码按钮,判断页码是否大于10，最多渲染十个
			if (maxPage<11) {
				for (var i = 1; i < maxPage+1; i++) {
					$('.pagination'+data2).append('<li class="pageBtn f-l-l pageBtn'+i+'" page-data="'+i+'">'+i+'</li>');
				};
			}
			else {
				for (var i = 1; i < 11; i++) {
					$('.pagination'+data2).append('<li class="pageBtn f-l-l pageBtn'+i+'" page-data="'+i+'">'+i+'</li>');
				};
			}
			$('.pagination'+data2).children('.pageBtn:first').addClass('on');
		};
//		第四步,拆解数据
		$.each(msg, function(index, val) {
			 // data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
			 data4.children('ul').append('<li class="lists-content-cell f-l-l"><a href="'+val.e+
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
		console.log("error");
	});
};

$(function(){
	/**
	 * 分页按钮点击事件
	 * 分页按钮一行最多生成10个
	 * 配合ajax，数据从后台获得
	 */
	$('.page-warp').on('click','.pageBtn', function(event) {
			//获取未点击之前，当前页面的页码
		var beforePageNum = parseInt($(this).parent('.pagination').children('.on').attr('page-data')),
			//点击按钮所代表的页码，即用户想访问的页码
			clickPageNum  = parseInt($(this).attr('page-data')),
			//获取点击用户点击的按钮是哪个列表的（同时初始化多个页码系统是要用的）
			pageType = parseInt($(this).parents('.page-warp').attr('page-data-type'));//用来确认是哪个分类里的分页按钮
			//最大页码数
			maxPage = parseInt($(this).parents('.page-warp').find('.pageBtn:last').attr('page-data'));;
			// 第一步，当点击的按钮不是当前正在显示的按钮时,再次序列化按钮
			if (clickPageNum != beforePageNum) {
				// 清空原有的页码
				$(this).parents('.page-warp').find('.pagination').empty();
				// 判断页码，采取不同的序列化模式
				if ( clickPageNum >= 6 && clickPageNum <= maxPage - 5 ) {
					// 序列化新页码
					var maxPageNum  = clickPageNum + 5;//标记本次序列号生成的最大页码
						console.log(maxPageNum);
					for (var i = (clickPageNum - 4); i <= maxPageNum; i++) {
						console.log(i);
						$('.pagination'+pageType).append('<li class="pageBtn f-l-l pageBtn'+i+'" page-data="'+i+'">'+i+'</li>');
						// $(this).parents('.page-warp').find('.pagination').append('<li class="pageBtn f-l-l" page-data="'+i+'">'+i+'</li>');
					};
				} else if ( clickPageNum < 6 ){//小于6时固定序列化页码1-10
					for (var i = 1; i <= 10; i++) {
						$('.pagination'+pageType).append('<li class="pageBtn f-l-l pageBtn'+i+'" page-data="'+i+'">'+i+'</li>');
					};
				} else if (clickPageNum > maxPage - 5) {
					for (var i = maxPage-9; i <= maxPage; i++) {
						$('.pagination'+pageType).append('<li class="pageBtn f-l-l pageBtn'+i+'" page-data="'+i+'">'+i+'</li>');
					};
				} else { console.log('页码不用变')};
				//第二步，前台按钮颜色变化
				$('.pagination'+pageType).children('.pageBtn'+clickPageNum).addClass('on').siblings().removeClass('on');
				//第三步.调用函数，向后台请求数据
				//1.data1为栏目,==1钢琴  ==2提琴  ==3吉他  ==4民乐  ==5管乐  ==6综合，
				//2.data2为分类1为全部 2为古典 3为流行 4为原创，5为伴奏，6为综合,
				//3.data3为各个分类请求次数，
				//4.data4为div容器
				musicBookLists(MusicListType,pageType,clickPageNum-1,$('.list-content-type'+pageType));
			} else {
				console.log('页码不用变');
			}
	});
})

$(function(){
	// 1.5。乐谱列表页左侧按钮切换
	var listItemsIdx;
	$('.book-list-sidebar').on('click',function(){
		listItemsIdx = $(this).index();
		$(this).addClass('on').siblings('.book-list-sidebar').removeClass('on');
		$('.list-content-types').eq(listItemsIdx).fadeIn(200).siblings('.list-content-types').hide();
	})
	// 1.6
	var listTypeWarp = $('.list-content-type1');
	//加载调用全部
	musicBookLists(MusicListType,1,0,listTypeWarp);
	//加载调用古典
	var listTypeWarp = $('.list-content-type2');
	musicBookLists(MusicListType,2,0,listTypeWarp);
	//加载调用流行
	var listTypeWarp = $('.list-content-type3');
	musicBookLists(MusicListType,3,0,listTypeWarp);
	//加载调用原创
	var listTypeWarp = $('.list-content-type4');
	musicBookLists(MusicListType,4,0,listTypeWarp);
	//加载调用伴奏
	var listTypeWarp = $('.list-content-type5');
	musicBookLists(MusicListType,5,0,listTypeWarp);
	//加载调用综合
	var listTypeWarp = $('.list-content-type6');
	musicBookLists(MusicListType,6,0,listTypeWarp);


})

//乐谱列表页搜索功能封装
/**
 *
 * @param data
 */
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
			$('.list-content-typex').addClass('on').siblings('.list-content-types').removeClass('on');
			$.ajax({
				url:'/yuepu/index.name.ajax.php',
				type:'post',
				data:{'type':searchType,'name':searchVal},
				beforeSend:function(){
					
				}
			})
			.done(function(msg){
				var oType;
				if (data1 == 38){
					oType = '钢琴谱'
				} else if(data1 ==39){
					oType = '提琴谱'
				} else if(data1 ==105){
					oType = '吉他谱'
				}else if(data1 ==106){
					oType = '民乐谱'
				}else if(data1 ==107){
					oType = '管乐谱'
				}else if(data1 ==108){
					oType = '综合谱'
				};
				$('.list-content-typex').children('ul').empty();
				msg = eval('('+msg+')');
//				console.log(msg);
//				console.log(typeof msg);
				if (msg ==""||msg == null) {
					$('.list-content-typex').children('ul').empty().append('没有搜索到相关乐谱，请重新搜索');
				} else if(msg.length == 0){
					$('.list-content-typex').children('ul').empty().append('没有搜索到相关乐谱，请重新搜索');
				}
				else {
					
					$.each(msg, function(index, val) {
						 // data2.children('.recommend-list-content').append('<li class="f-l-l"><a href="'+val.c+'">'+'['+val.a+']'+val.b+'</a></li>');
						 $('.list-content-typex').children('ul').append('<li class="lists-content-cell f-l-l"><a href="'+val.e+
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
				 $('.list-content-typex').children('ul').empty().append('网络出错，加载失败！');
//				console.log('error');
			})
		}
}
//乐谱首页调用搜索
$(function(){
	
	$('.lists-search .search-sub').on('click',function(){
		var searchList1 = $('.lists-search');
		sousuo(searchList1);
	});


	
})
