/**
 * Created by Freed on 2016/10/21.
 * flyxz@126.com
 * 课表功能自定义封装
 */

/**
 * 0.1用于老师个人中心课表的新增课程表单验证
 * @param num{number},用于定位是第几行出现的问题
 * @param str{string},提示信息
 */
function keTips(num,str) {
	var fatherDOM = $('.fabukebiao li').eq(num),
		comInput =  fatherDOM.children('input')||fatherDOM.children('textarea'),
		comTips = fatherDOM.children('.comTips');
	comInput.addClass('bd-r');
	comTips.empty().html(str).fadeIn(100);
}
/**
 * 0.2表单验证提示信息的关闭
 * @param num{number},用于定位是第几行
 */
function closeKeTips(num) {
	var fatherDOM = $('.fabukebiao li').eq(num),
		comInput =  fatherDOM.children('input')||fatherDOM.children('textarea'),
		comTips = fatherDOM.children('.comTips');
	comInput.removeClass('bd-r');
	comTips.empty().fadeOut(100);
}


$(function () {
	var getTime = new Date(),                                                   //定义时间的全局变量
		getYear = getTime.getFullYear(),                                        //年
		getMonth = getTime.getMonth() + 1,                                      //月
		getDay = getTime.getDate(),                                             //日
		getHour = getTime.getHours();                                           //小时


	// 1.1点击X关闭打开的单个课程详情
	$('.single-kecheng .shutUp').on('click',function () {
		$('.single-kecheng').hide();
	});

	//1.2页面加载之后填充默认日期,时间
	$('#datetimepicker3').val(getYear+'-'+getMonth+'-'+getDay);
	if (getHour<6){
		$('#datetimepicker1').val('6:00');
		$('#datetimepicker2').val('7:00');
	} else if(getHour>=6 && getHour<=22 ){
		$('#datetimepicker1').val(getHour+':00');
		$('#datetimepicker2').val(getHour+1+':00');
	} else {
		$('#datetimepicker1').val('22:00');
		$('#datetimepicker2').val('23:00');
	};


	//1.3当新增课表的表单,提交的时候
	$('#addLesson').submit(function () {
		var valTitle = $('.addKeTitle').val(),                                  //标题
			valAddress = $('.addKeAddress').val(),                              //地址
			valDate = $('#datetimepicker3').val(),                              //日期
			valStartTime = $('#datetimepicker1').val(),                         //开始时间
			valEndTime = $('#datetimepicker2').val(),                           //结束时间
			Rxpdata = new RegExp('^[1-2]\\d{3}-(0?[1-9]|1[0-2])-((0?[1-9])|((1|2)[0-9])|30|31)$$');         //匹配日期的正则
			if (valTitle.length>12){
				keTips(0,'最长不能超过12个字');
				return false;
			};
			if (valAddress.length>12){
				keTips(1,'最长不能超过12个字');
				return false;
			};
			if (!valDate.match(Rxpdata)){
				keTips(2,'日期格式不正确,请重新选择');
				$('#datetimepicker3').val(getYear+'-'+getMonth+'-'+getDay);
				return false;
			};












	});

});
