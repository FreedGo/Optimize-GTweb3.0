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
	// 1.1点击X关闭打开的单个课程详情
	$('.single-kecheng .shutUp').on('click',function () {
		$('.single-kecheng').hide();
	});
	//当新增课表的表单,提交的时候
	$('#addLesson').submit(function () {
		var valTitle = $('.addKeTitle').val(),
			valAddress = $('.addKeAddress').val(),
			valDate = $('#datetimepicker3').val(),
			valStartTime = $('#datetimepicker1').val(),
			valEndTime = $('#datetimepicker2').val(),
			Rxpdata = new RegExp('^[1-2]\\d{3}-[1-2]\\d-[0-3]\\d$');
			if (valTitle.length>12){
				keTips(0,'最长不能超过12个字');
			};
			if (valAddress.length>12){
				keTips(1,'最长不能超过12个字');
			};
			if (!valDate.match(Rxg)){
				keTips(2,'日期格式不正确');
				$('#datetimepicker3').val(data)
			};












	});

});
