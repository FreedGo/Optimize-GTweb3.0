/**
 * Created by Freed on 2016/10/21.
 * flyxz@126.com
 * 课表功能自定义封装
 */

/**
 * 0.1用于老师个人中心课表的新增课程表单验证
 * @param num{number},用于定位是第几行出现的问题
 * @param str{string},提示信息
 * @do ,通过addClass('db-r'),使当前行下的input边框变色
 * @do,当前行下的提示框内容为参数str,并渐显
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
 * @do,通过removeClass('db-r'),使当前行下的input边框颜色恢复默认
 * @do,清除当前行下提示框内容,并渐隐
 */
function closeKeTips(num) {
	var fatherDOM = $('.fabukebiao li').eq(num),
		comInput =  fatherDOM.children('input')||fatherDOM.children('textarea'),
		comTips = fatherDOM.children('.comTips');
		comInput.removeClass('bd-r');
		comTips.empty().fadeOut(100);
}

/**
 * 比较课程的开始时间和结束时间,结束时间不得早于或等于开始时间
 * @param first{string} hh:mm,开始时间
 * @param second {string}hh:mm,结束时间
 * @returns {boolean},抛出布尔值,用于判断是否满足条件
 */
function compareHour(first,second) {
	var	firstHour = first.split(':'),
		hour1 = parseInt(firstHour[0]),
		min1 = parseInt(firstHour[1]),
		secondHour = second.split(':'),
		hour2 = parseInt(secondHour[0]),
		min2 = parseInt(secondHour[1]);
		if(hour2 < hour1){
			keTips(4,'结束时间早于开始时间,请重新选择');
			return false;
		} else if(hour2 == hour1){
			if (min2 <min1){
				keTips(4,'结束时间早于开始时间,请重新选择');
				return false;
			} else if (min2 == min1){
				keTips(4,'结束时间和开始时间相同,请重新选择');
				return false;
			} else{
				return true;
			};
		} else {
			return true;
		};
};


$(function () {
//执行函数
	var getTime = new Date(),                                                   //定义时间的全局变量
		getYear = getTime.getFullYear(),                                        //年
		getMonth = getTime.getMonth() + 1,                                      //月
		getDay = getTime.getDate(),                                             //日
		getHour = getTime.getHours(),                                           //小时
		Rxpdata = new RegExp('^[1-2]\\d{3}-(0?[1-9]|1[0-2])-((0?[1-9])|((1|2)[0-9])|30|31)$'),         //匹配日期的正则
		RxpHour = new RegExp('^(0?[1-9]|1[0-9]|2[0-4]):(0?[0-9]|[1-5][0-9])$');                        //匹配小时和分钟的的正则
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
			valEndTime = $('#datetimepicker2').val();                           //结束时间

			if (valTitle.length>12){
				keTips(0,'最长不能超过12个字');
				return false;
			};
			if (valAddress.length>12){
				keTips(1,'最长不能超过12个字');
				return false;
			};
			if (!valDate.match(Rxpdata)){
				keTips(2,'日期格式不正确,请按照XXXX-XX-XX格式');
				// $('#datetimepicker3').val(getYear+'-'+getMonth+'-'+getDay);
				return false;
			};
			if (!valStartTime.match(RxpHour)){
				keTips(3,'时间格式不正确,请按照HH:MM格式');
				return false;

			};
			if (!valEndTime.match(RxpHour)){
				keTips(4,'时间格式不正确,请按照HH:MM格式');
				return false;

			}else{
				return compareHour(valStartTime,valEndTime);
			}

	});

	//1.4日期输入框的获取焦点事件
	$('#datetimepicker3').focus(function () {
		closeKeTips(2);
	}).blur(function(){
		$(this).val().match(Rxpdata)? closeKeTips(2):keTips(2,'日期格式不正确,请按照XXXX-XX-XX格式');
	});
	$('#datetimepicker1').focus(function () {
		closeKeTips(3);
	});
	$('#datetimepicker2').focus(function () {
		closeKeTips(4);
	});










});
