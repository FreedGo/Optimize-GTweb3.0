/**
 * 数字动态变化模块,摘自countjs,依赖jq
 */
(function($){
	$.fn.numberRock=function(options){
		var defaults={
			speed:24,
			count:100
		};
		var opts=$.extend({}, defaults, options);

		var div_by = 100,
			count=opts["count"],
			speed = Math.floor(count / div_by),
			sum=0,
			$display = this,
			run_count = 1,
			int_speed = opts["speed"];
		var int = setInterval(function () {
			if (run_count <= div_by&&speed!=0) {
				$display.text(sum=speed * run_count);
				run_count++;
			} else if (sum < count) {
				$display.text(++sum);
			} else {
				clearInterval(int);
			}
		}, int_speed);
	}

})(jQuery);

$(function() {
	/**
	 * 除了第一个后面都隐藏
	 */
	$('.liebiaoshow:gt(0)').hide();

	var classroome00,
		iloadedNum = [0,0,0,0,0];//标记已经加载的老师数量,页面加载时就加载了20个全部老师

	/**
	 * 加载指定的数据进入指定的老师分类
	 * @param obj {object} 老师的数据;
	 * @param type {num}  分类;
	 */
	function loadClassrome(obj,type) {
		if (obj.length == iloadedNum[type]){
				$('.liebiaoShow').eq(1).stop(true).empty().fadeIn(200).html('<p style="text-align: center;color: #cb7047;">没有更多数据了</p>');
		} else {
			$('.liebiaoShow').eq(1).hide();
			$.each(obj,function (index,val) {
				if (index>=iloadedNum[type] && index < (iloadedNum[type] +10)) {
					$('.liebiaoShow').eq(0).append(
						'<li><a href="/e/space/?userid=' + val.userid +
						'"><img src="' + val.userpic +
						'"></a><div class="xingming"><a href="/e/space/?userid=' + val.userid +
						'"><span>' + val.username +
						'</span></a><a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng' + val.cked +
						'"></i></a></div><div class="shenfen"><p><span class="di_zhi">地址：</span>' + val.address + val.address1 + val.address2 +
						'</p></div><div class="guanzhu clearfix"><p><span class="telephone_one">咨询电话：</span>' + val.telephone +
						'</p></div> <span class="toutiao0' + val.resever_1 +
						'"></span></li>'
					)
				}
			});
			iloadedNum[type] = iloadedNum[type] +10 ;
		}
	}

	/**
	 * 页面加载的时候,1.三级联动加载到地区,2.按排序加载琴行
	 */
	function getCurrentCity(){
		var subCity1,//省
		    subCity2;//市
		// 第一步,向高德API发送请求并获得访问者所在省份
		$.ajax({
			type: "get",
			//url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
			url:'http://restapi.amap.com/v3/ip?key=7a178998b6550b21f6a2fb88d3285fcd',
			dataType: 'text',
			// contentType:'application/x-www-form-urlencoded;charset=UTF-8',
			success: function(data) {
				//转换为JSON对象
				var jsonObj = eval("(" + data.replace('(','').replace(')','').replace(';','') + ")");
				//当前城市
				// $("#shenfen>p").html('当前:'+jsonObj.province);
				subCity1=jsonObj.province;
				subCity2 = jsonObj.city;
				subCity1=subCity1.substring(0,subCity1.length-1);//拼接字符串，减去最后一位子副
				subCity2=subCity2.substring(0,subCity2.length-1);//拼接字符串，减去最后一位子副
				// console.log(subCity1);
				//增加加载页面师,三级联动加载一级城市
				//遍历第一级,找到之后模拟点击
				for (var i = 0 ; i < 34;i++){
					if ($('.m_zlxg1 ul li').eq(i).html() == subCity1){
						$('.m_zlxg1 ul li').eq(i).trigger('click');
						$('.m_zlxg1').hide();
						break;
					}
				};
				// 第二步，向好琴声后台发送当前地址并接受返回的信息
				$.ajax({
					url: '/jiaoshi/index-ajax/index.ajax.php',
					type: 'post',
					data:{'addres': subCity2},
					success:function(msg) {
						// classroome00 = eval('('+msg+')');
						$('.loaders').hide();
						if (msg == 'null'||msg == null){
							msg = [];
							classroome00 = msg;
							$('.tongjiNum').numberRock({
								speed:20,
								count:0
							});
							$('.liebiaoShow').eq(1).stop(true).empty().fadeIn(200).html('<p style="text-align: center;color: #cb7047;">没有更多数据了</p>');
						}else {
							msg = eval( '(' +msg+')');
							classroome00 = msg ;
							//数字跳动
							$('.tongjiNum').numberRock({
								speed:20,
								count:classroome00.length
							});
							loadClassrome(classroome00,0);
						};
						iloadedNum[0] = 0;
					}
				});
				// 第二步end，向好琴声后台发送当前地址并接受返回的信息
			}
		});

		// 自定义函数结束
	}

	// 页面加载时调用自己封装的函数来获取当前所在城市信息
	getCurrentCity();
	/**
	 * 瀑布流下拉刷新
	 * @type {number}
	 */
	var scrollTimer=null;
	$(window).scroll(function(event) {
		if (scrollTimer) {
			clearTimeout(scrollTimer);//清除定时器
		}
		scrollTimer=setTimeout(function() {
			//如果离底部小于150像素，就发送请求
			if ($(document).scrollTop() + $(window).height() > $(document).height() -360) {
				loadClassrome(classroome00,0);
			}
		}, 500);
	});




// ajax提交表但，使用jq-form.js
// -----------------------------------------------------------------------
  $('.citySelect').submit(function(event) {
  	return false
  });
	/**
	 * 城市筛选
	 */
	$('.tijiao input').click(function(event) {

  	// 提交城市新信息切换列表内容····················································
	// subCity1代表省级值，subCity2代表市级值，subCity3代表县级值，
	var subCity1;
	var subCity2;
	var subCity3;
		subCity1=$('#sfdq_tj').val();
		subCity2=$('#csdq_tj').val();
		subCity3=$('#qydq_tj').val();
		if (subCity1==""||subCity1=="选择省份") {
			alert("请选择省份再提交");
		} else{
			// 点下按钮之后加载css动画
			$('.loaders').show();
			$.ajax({
				url: '/jiaoshi/index-ajax/index.address.php',
				type: 'post',
				// data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
				data:{'addres': subCity1,'addres1':subCity2,'addres2':subCity3},
				// data:city1,
				success:function(msg){
					$('.liebiaoShow').empty();
					$('.loaders').hide();
					if (msg=='null'||msg==null) {
						msg = [];
						classroome00 = msg;
						$('.tongjiNum').numberRock({
							speed:20,
							count:0
						});
						$('.liebiaoShow').eq(1).stop(true).empty().fadeIn(200).html('<p style="text-align: center;color: #cb7047;">没有更多数据了</p>');
					} else {
						msg = eval('('+msg+')');
						iloadedNum[0] = 0;
						classroome00 = msg;
						$('.tongjiNum').numberRock({
							speed:20,
							count:msg.length
						});
//						$.each(msg,function (index,val) {
//							$('.liebiaoShow').append(
//								'<li><a href="/e/space/?userid=' +val.userid+
//								'"><img src="' +val.userpic+
//								'"></a><div class="xingming"><a href="/e/space/?userid=' +val.userid+
//								'"><span>' +val.username+
//								'</span></a><a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng' +val.cked+
//								'"></i></a></div><div class="shenfen"><p><span class="di_zhi">地址：</span>' +val.address+val.address1+val.address2+
//								'</p></div><div class="guanzhu clearfix"><p><span class="telephone_one">咨询电话：</span>' +val.telephone+
//								'</p></div> <span class="toutiao0' +val.resever_1+
//								'"></span></li>'
//							)
//						})
						loadClassrome(msg,0);
//						iloadedNum[0] = msg.length ;
					}
				}
		})
		.done(function() {
			// console.log("success");
			 // ````````````````````````````````````````````````````````````````````````````````````````````

		});
		// `````````````````````````````````````````````````````````````````````````````````````````````````````````
		};

					


  });
// ---------------------------------------------------------------------------------------------------------
	/**
	 * 教室输入名字搜索函数
	 */
	function startSearch() {
		var jiaoshiName;
		jiaoshiName=$('.searchSelect').val();
		if (jiaoshiName=="") {
			alert('输入的教室名字不能为空');
		} else{
			$('.liebiaoShow').empty();
			$('.loaders').show();
			$.ajax({
				url: '/jiaoshi/index.name.php',
				type: 'post',
				data: {'jiaoshi1': jiaoshiName},
				success:function(msg){
					$('.loaders').hide();
					if (msg==''||msg==null) {
						classroome00 = msg = [];
						$('.tongjiNum').numberRock({
							speed:20,
							count:0
						});
						$('.liebiaoShow').append('<p style="font-size:16px;color:#cb7047;text-align:center;">没有找到琴行，请重新搜索</p>');
					} else {
						msg = eval('('+msg+')');
						$('.tongjiNum').numberRock({
							speed:20,
							count:msg.length
						});
						classroome00 = msg;//把搜索结果赋值给全局的加载变量
						$.each(msg,function (index,val) {
							$('.liebiaoShow').eq(0).append(
								'<li><a href="/e/space/?userid=' +val.userid+
								'"><img src="' +val.userpic+
								'"></a><div class="xingming"><a href="/e/space/?userid=' +val.userid+
								'"><span>' +val.username+
								'</span></a><a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng' +val.cked+
								'"></i></a></div><div class="shenfen"><p><span class="di_zhi">地址：</span>' +val.address+val.address1+val.address2+
								'</p></div><div class="guanzhu clearfix"><p><span class="telephone_one">咨询电话：</span>' +val.telephone+
								'</p></div> <span class="toutiao0' +val.resever_1+
								'"></span></li>'
							)
						});
						iloadedNum[0] = msg.length;//重置下拉显示的li为0
					}
				}
			});
		}
	}

	/**
	 * 搜索按钮点击
	 */
	$('.searchSub').click(function(event) {
		startSearch();
	});
	/**
	 * 搜索框按下回车键
	 */
	$('.searchSelect').keypress(function (event) {
		if (event.keyCode == 13){
			startSearch();
		}
	});
// ---------------------------------------------------------------------------------------------------------

	// 教室输入排序类型查询
	/**
	 * 琴行教室选择不同类型进行排序
	 * 2016-12-22 要求进行联动筛选(地区+类型)
	 */
	var paixuName,
	    addres,//省
	    addres1,//市
	    addres2;//县
	$('#paixuSelect').change(function(event) {
		paixuName=$('#paixuSelect').val();
		addres = $('#sfdq_tj').val();
		addres1 = $('#csdq_tj').val();
		addres2 = $('#qydq_tj').val();
			// console.log(paixuName);
			if (paixuName==0) {
				alert('请选择排序类型');
			}else if(paixuName==1||paixuName=='1'){
				// 点下按钮之后加载css动画
				$('.liebiaoShow').empty();
				$('.loaders').show();
				// console.log(paixuName);
				$.ajax({
					url: '/jiaoshi/index-ajax/index.type.php',
					type: 'post',
					dataType: 'text',
					data: {
						'type': paixuName,
						'addres':addres,
						'addres1':addres1,
						'addres2':addres2
					},
					success:function(msg){
						iloadedNum[0] = 0;
						if (msg == 'null'||msg == null){
							msg = [];
							classroome00 = msg;
							$('.tongjiNum').numberRock({
								speed:20,
								count:0
							});
							$('.liebiaoShow').eq(1).stop(true).empty().fadeIn(200).html('<p style="text-align: center;color: #cb7047;">没有更多数据了</p>');
						}else{
							msg = eval('('+msg+')');
							classroome00 = msg;
							iloadedNum[0] = 0;
//						$.each(msg,function (index,val) {
//							$('.liebiaoShow').append(
//								'<li><a href="/e/space/?userid=' + val.userid +
//								'"><img src="' + val.userpic +
//								'"></a><div class="xingming"><a href="/e/space/?userid=' + val.userid +
//								'"><span>' + val.username +
//								'</span></a><a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng' + val.cked +
//								'"></i></a></div><div class="shenfen fensi_num"><p><span class="di_zhi ">粉丝数：</span>' + val.follownum +
//								'</p></div><div class="shenfen"><p><span class="di_zhi">地址：</span>' + val.address + val.address1 + val.address2 +
//								'</p></div><div class="guanzhu clearfix"><p><span class="telephone_one">咨询电话：</span>' + val.telephone +
//								'</p></div> <span class="toutiao0' + val.resever_1 +
//								'"></span></li>'
//							)
//						});
//						iloadedNum[0] = msg.length ;
							loadClassrome(msg,0);
							$('.tongjiNum').numberRock({
								speed:20,
								count:msg.length
							});
						}

						$('.loaders').hide();
					}
				});
			} else{
					// 点下按钮之后加载css动画
					$('.liebiaoShow').empty();
					$('.loaders').show();
				// console.log(paixuName);
					$.ajax({
						url: '/jiaoshi/index-ajax/index.type.php',
						type: 'post',
						dataType: 'text',
						data: {
							'type': paixuName,
							'addres':addres,
							'addres1':addres1,
							'addres2':addres2
						},
						success:function(msg){
							iloadedNum[0] = 0;
							if (msg == 'null'||msg == null){
								msg = [];
								classroome00 = msg;
								$('.tongjiNum').numberRock({
									speed:20,
									count:0
								});
								$('.liebiaoShow').eq(1).stop(true).empty().fadeIn(200).html('<p style="text-align: center;color: #cb7047;">没有更多数据了</p>');
							}else{
								msg = eval('('+msg+')');
								classroome00 = msg;
								loadClassrome(msg,0);
								$('.tongjiNum').numberRock({
									speed:20,
									count:msg.length
								});
							};
							$('.loaders').hide();
						}
					});
			}


		});

// ``````````````````````````````````````````````````````````````````````````````````````
	$('.fenleiFuck li').on('click', function(event) {
		getCurrentCity();
	});



});



