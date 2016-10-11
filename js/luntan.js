// 热帖点击之后ajax异步加载
// 热帖直为r,精华铁值为j;

var Tie;
$('.hotTie>a').click(function(event) {
	alert(1);
	Tie=r;
	// $.ajax({
	// 	url: '/path/to/file',
	// 	type: 'post',
	// 	dataType: 'text',
	// 	data: {'tieType': Tie},
	// })
	// .done(function(msg) {
	// 	console.log({'tieType': Tie});
	// 	console.log("success");
	// 	$('.inContent').empty().append('msg');

	// })
	// .fail(function() {
	// 	console.log("error");
	// })
	// .always(function() {
	// 	console.log("complete");
	// });
	


});

// 封装ajax函数,用于论坛首页最新发帖等的调用
function Lunhead(data,url,selector) {
	$.ajax({
		url: url,
		type: 'post',
		dataType: 'html',
		data: {'titleid': data},
	})
	.done(function(msg) {
		console.log('success');
		console.log(msg);
		selecter.empty().append(msg);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}
// 页面加载完毕就执行
window.onload = function () {
	//1.1最新发帖
	// $('.slideTxtBox .hd li').on('click',  function(event) {
	Lunhead(1,'/e/ajax/bbs.ajax.php','$(".slideTxtBox .bd ul").eq(0)');
	// });
	// 1.2置顶主题
	Lunhead(2,'/e/ajax/bbs.ajax.php','$(".slideTxtBox .bd ul").eq(1)');

}
