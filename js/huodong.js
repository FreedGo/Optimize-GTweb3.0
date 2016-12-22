/* 
* @Author: Administrator
* @Date:   2016-02-17 09:33:50
* @Last Modified by:   付云龙
* @Last Modified time: 2016-04-01 14:36:24
*/

//首先封装页面加载获取当前所在城市信息的函数
function getCurrentCity(){
	var subCity1;
	// 第一步,向高德API发送请求并获得访问者所在省份
	$.ajax({
		type: "get",
		//url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
		url:'http://restapi.amap.com/v3/ip?key=7a178998b6550b21f6a2fb88d3285fcd',
		dataType: 'text',
		// contentType:'application/x-www-form-urlencoded;charset=UTF-8',
		success: function(data) {
			// console.log(data);
			//转换为JSON对象
			var jsonObj = eval("(" + data.replace('(','').replace(')','').replace(';','') + ")");
			//当前城市
			// $("#shenfen>p").html('当前:'+jsonObj.province);
			subCity1=jsonObj.province;
			subCity1=subCity1.substring(0,subCity1.length-1);
			// console.log(subCity1);
			// 第二步，向好琴声后台发送当前地址并接受返回的信息
			$.ajax({
				url: '/news/huodong/indexs.ip.php',
				type: 'post',
				dataType: 'text',
				data:{'city_ip': subCity1},
				success:function(msg) {
					// console.log({'city_ip': subCity1})
					// console.log(msg);
					// 清空liebiaoShow并插入li
					$('.quanzhandongtai').empty().append(msg);
				}
			});
			//遍历第一级,找到之后模拟点击
			for (var i = 0 ; i < 34;i++){
				if ($('.m_zlxg1 ul li').eq(i).html() == subCity1){
					$('.m_zlxg1 ul li').eq(i).trigger('click');
					$('.m_zlxg1').hide();
					break;
				}
			}

		}
	})
}


$(function() {
	//页面加载时调用自己封装的函数来获取当前所在城市信息
	$(document).ready(function(){
		getCurrentCity();
	});
	$('.tijiao input').click(function(event) {
	// 提交城市新信息切换列表内容····················································
	// subCity1代表省级值，subCity2代表市级值，subCity3代表县级值，
		var subCity1,
			 subCity2,
			 subCity3,
			 cityInfo;
		subCity1=$('#sfdq_tj').val();
		subCity2=$('#csdq_tj').val();
		subCity3=$('#qydq_tj').val();
		if (subCity1==""||subCity1=="选择省份") {
			alert("请选择省份再提交");
		} else{
			$.ajax({
				url: '/news/huodong/indexs.php',
				type: 'post',
				dataType: 'text',
				// data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
				data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
				// data:city1,
				success:function(msg) {
					$('.quanzhandongtai').empty().append(msg);
					}
				})
			}
    });
// ---------------------------------------------------------------------------------------------------------

	// 活动输入名字查询
	var jiaoshiName;
	$('.search-sub').click(function(event) {
		jiaoshiName=$('.searchSelect').val();
		// console.log(jiaoshiName);
		if (jiaoshiName=="") {
			alert('输入的内容不能为空');
		} else{
			// console.log(jiaoshiName);
			$.ajax({
				url: '/news/huodong/index.name.php',
				type: 'post',
				dataType: 'text',
				data: {'jiaoshi1': jiaoshiName},
				success:function(msg){
					$('.quanzhandongtai').empty().append(msg);
					}
			})
		}
		 event.preventDefault();
	});

// ``````````````````````````````````````````````````````````````````````````````````````			
	// 双月日历插件调用
	var dateRange = new pickerDateRange('date_demo3', {
					// aRecent7Days : 'aRecent7DaysDemo3', //最近7天
					isTodayValid : true,
					//startDate : '2013-04-14',
					//endDate : '2013-04-21',
					// needCompare : true,
					// singleCompare : true,
					// 
					isSingleDay : true,
					autoCommit : true,
					stopToday:false,
					noCalendar : false,
					//shortOpr : true,
					autoSubmit : true,
					// defaultText : ' 至 ',
					inputTrigger : 'input_trigger_demo3',
					theme : 'ta',
					success : function(obj) {
						$("#date_demo3").html('时间 : ' + obj.startDate );
						$.ajax({
							url: '/news/huodong/index.type.php',
							type: 'post',
							dataType: 'text',
							data: {'dateSelect': obj.startDate},
							success:function(msg){
									$('.quanzhandongtai').empty().append(msg);
									}
							})
							.done(function() {
								// console.log( {'dateSelect': obj.startDate})
							})
							.fail(function() {
								// console.log("error");
							})
							.always(function() {
								// console.log("complete");
							});
								

					}
				});

		$('#date_demo3').trigger('click');




});



 // 瀑布流动态加载li········································ 