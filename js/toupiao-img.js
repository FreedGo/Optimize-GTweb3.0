function follow(userid,userid1){
	// 第一步,首先判断浏览器宽度来定义PC端还是移动端，960px
	var screenWidth,
		myHtml=document.documentElement;
	screenWidth=myHtml.clientWidth;

	if (screenWidth>= 960) {//pc端
		var getUserid1 = 0;
		$.get('/e/member/login/headjs_3.php?t='+Math.random(), function(data) {
			getUserid1 = parseInt(data);
			console.log(getUserid1);
			if (getUserid1 == 0 ) {//未登录
				$('#loginBtn').trigger('click');
			} else {
				$.post("/e/extend/toupiao/index.php",
					{
						followid:userid,
						toupiaoid:getUserid2
					},
					function(data,status){
						console.log(data);
						console.log(status);
						data = eval("data="+data);
						var touType1 = data.a,//状态，1成功，2失败
							touType2 = data.b,//当前排名
							touType3 = parseInt(data.c)+1;//当前票数
						if (touType1 == 1) {
							$('.pop-dec-num').html(touType3);
							$('.pop-list-num').html(touType2);
							$('.currentPiaoNum').html(touType3+'票');
						} else{
							$('.toupiao-web .pop-suc-fail').html('每10钟投票').addClass('pop-fail');
							$('.toupiao-web .pop-dec').hide();
							$('.toupiao-web .pop-list').hide();
							$('.toupiao-h5 .pop-dec').html('');
							$('.toupiao-h5 .pop-list').html('每10钟投票！');
							$('.toupiao-h5 .pop-suc-fail').html('');

						};
						$('.toupiao-web').fadeIn(100);
						$('.loginDown').show();

					})
			}
		});
	} else {//移动端
		if (getUserid2 == 0) {//表示没有采用第三方登录登陆
			$.get('/e/member/login/headjs_3.php?t='+Math.random(), function(data) {
				getUserid2 = parseInt(data);
			});
			if (getUserid2 == 0) {
					$('html,body').animate( 
					{ scrollTop: '0px' }, 1000);
					$('.new-lgn-reg').show();
				} else {
					$.post("/e/extend/toupiao/index.php",
						{
							followid:userid,
							toupiaoid:getUserid2
						},
						function(data,status){
							data = eval("data="+data);
							var touType1 = data.a,//状态，1成功，2失败
								touType2 = data.b,//当前排名
								touType3 = parseInt(data.c)+1;//当前票数
							if (touType1 == 1) {
								$('.pop-dec-num').html(touType3);
								$('.pop-list-num').html(touType2);
								$('.currentPiaoNum').html(touType3+'票');
							} else{
								$('.toupiao-web .pop-suc-fail').html('每10钟投票！').addClass('pop-fail');
								$('.toupiao-web .pop-dec').hide();
								$('.toupiao-web .pop-list').hide();
								$('.toupiao-h5 .pop-dec').html('');
								$('.toupiao-h5 .pop-list').html('每10钟投票！');
								$('.toupiao-h5 .pop-suc-fail').html('');

							};
							$('.toupiao-h5').fadeIn(200);
							$('.toupiao-pop-down').fadeIn(200);
					})
				};
		} else {//表示采用了第三方登录，并给其赋值
			$.post("/e/extend/toupiao/index.php",
				{
					followid:userid,
					toupiaoid:getUserid2
				},
				function(data,status){
					data = eval("data="+data);
					var touType1 = data.a,//状态，1成功，2失败
						touType2 = data.b,//当前排名
						touType3 = parseInt(data.c)+1;//当前票数
					if (touType1 == 1) {
						$('.pop-dec-num').html(touType3);
						$('.pop-list-num').html(touType2);
						$('.currentPiaoNum').html(touType3+'票');
					} else{
						$('.toupiao-web .pop-suc-fail').html('每10钟投票！').addClass('pop-fail');
						$('.toupiao-web .pop-dec').hide();
						$('.toupiao-web .pop-list').hide();
						$('.toupiao-h5 .pop-dec').html('');
						$('.toupiao-h5 .pop-list').html('每10钟投票！');
						$('.toupiao-h5 .pop-suc-fail').html('');

					};
					$('.toupiao-h5').fadeIn(200);
					$('.toupiao-pop-down').fadeIn(200);
			})
		};
		

	}









// 		if(!window.localStorage){
// 			alert("浏览器版本太低，请升级最新浏览器或使用Chorme,Firefox等现代浏览器");
// 		};
// 		var userData = JSON.parse(localStorage.getItem("cunData"));
// //			console.log(userData);
// 			var xList = ['q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m'];
// 			var xListCon1 = xList[parseInt(Math.random()*26)],xListCon2 = xList[parseInt(Math.random()*26)],xListCon3 = xList[parseInt(Math.random()*26)],xListCon4 = xList[parseInt(Math.random()*26)];
// 			if (userData == null|| userData == "") {
// 				userData = xListCon1+xListCon2+xListCon3+xListCon4+parseInt(Math.random()*10)+parseInt(Math.random()*10);//产生十位以内随机数,模拟openid，用来标记投票，防止刷票
// //				console.log(userData);
// 				var cunData = {'userRandomId':userData};
// 				localStorage.setItem("cunData",JSON.stringify(cunData));//将产生的随机数存储到本地
// 			}else{
// 				userData = userData.userRandomId;
// 			}
//			console.log(userData);

		
}

// 定义投票函数
function ajaxTouPiao(data1,data2) {
	$.post("/e/extend/toupiao/index.php",
		{
			followid:data1,
			toupiaoid:data2
		},
		function(data,status){
//			console.log(userid);
//			console.log(data);
			data = eval("data="+data);
//			console.log(data);
			var touType1 = data.a,//状态，1成功，2失败
				touType2 = data.b,//当前排名
				touType3 = parseInt(data.c)+1;//当前票数
			// console.log(typeof data);
//			console.log(touType1);console.log(touType2);console.log(touType3);
			if (touType1 == 1) {
				$('.pop-dec-num').html(touType3);
				$('.pop-list-num').html(touType2);
				$('.currentPiaoNum').html(touType3+'票');
			} else{
				$('.toupiao-web .pop-suc-fail').html('每10钟投票！').addClass('pop-fail');
				$('.toupiao-web .pop-dec').hide();
				$('.toupiao-web .pop-list').hide();
				$('.toupiao-h5 .pop-dec').html('');
				$('.toupiao-h5 .pop-list').html('每10钟投票！');
				$('.toupiao-h5 .pop-suc-fail').html('');

			};
//			返回值成功之后再弹框
			if (screenWidth<960) {//屏幕宽度小于960认为是手机
				$('.toupiao-h5').fadeIn(200);
				$('.toupiao-pop-down').fadeIn(200);
				$('.venvy_videos').hide();
			} else{
				$('.toupiao-web').fadeIn(200);

			}
			$('.venvy_videos')[0].pause();

		})
}






function xingyun(){
	$(".xingyun").toggleClass("yanshi");
	$(".hymain").toggleClass("hyindex");
}

$(function() {
	$('.toupiao-close,.toupiao-h5,.pop-suc-fail').on('click', function(event) {
		$('.toupiao-pop-down').fadeOut(200);
		$('.toupiao-pop').slideUp(200);
		$('.loginDown').hide();
		$('.venvy_videos').show();
	});
});