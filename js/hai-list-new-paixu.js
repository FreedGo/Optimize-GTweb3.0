// 封装海选点击不同分类的ajax
/**
 * [haiListType description]
 * @param  {[number]} classid [当前海选的id]
 * @param  {[type]} index   [index+1   1为全部，2为钢琴，3为提琴，4为吉他，5为其它]
 * @return {[string]}         [返回报名lists]
 */
function haiListType(classid,id,index){

	$.ajax({
		url: '/haixuan/pinpai/pinpai.saixuan.ajax.php',
		type: 'post',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {'classid': classid,'id':id,'typeid': index+1},
		beforeSend:function(){
			$('.liebiaoShow-con').eq(index).empty()
			$('.loaders').show();
		}
	})
	.done(function(msg) {
		$('.loaders').hide();
		console.log("success");
		if (msg != "" || msg != null) {
			$('.liebiaoShow-con').eq(index).append(msg);
		} else {
			$('.liebiaoShow-con').eq(index).append('没有数据，请筛选其它类型。');
		}
	})
	.fail(function() {
		console.log("error");
	});
	
}

function haiListSearch(classid,id,con){

	$.ajax({
		url: '/haixuan/pinpai/pinpai.name.ajax.php',
		type: 'post',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {'classid': classid,'id':id,'name': con},
		beforeSend:function(){
			$('.liebiaoShow-con').eq(5).empty()
			$('.loaders').show();
		}
	})
	.done(function(msg) {
		$('.loaders').hide();
		console.log("success");
		if (msg != "" || msg != null) {
			$('.liebiaoShow-con').eq(5).append(msg);
		} else {
			$('.liebiaoShow-con').eq(5).append('没有数据，请搜索其它内容。');
		}
	})
	.fail(function() {
		console.log("error");
	});
	
}


$(function() {
	$('.pinpaiSelect').click(function(event) {
		var iPiSeIdx = $(this).index();
		$(this).addClass('on').siblings().removeClass('on');
		$('.liebiaoShow-con').eq(iPiSeIdx).addClass('on').siblings().removeClass('on');
		if (iPiSeIdx == 0) {
			return false;
		} else {
			haiListType(actClassid,actid,iPiSeIdx);
		}
	});

	$('.pinpai-search .searchSub').click(function(event) {
		$('.liebiaoShow-con').eq(5).addClass('on').siblings().removeClass('on');
		var srhVal = $('.searchSelect').val();
		if (srhVal || srhVal == 0) {
			haiListSearch(actClassid,actid,srhVal);
		} else {
			alert('请输入内容再点击搜索');
		}
	});

});