$(function() {

	// 点击关注显示 隐藏
		// $(function() {
		// 	 $('.down').css('opacity', 0.3);
		// 	 $('.guanzhu span').click(function(event) {
        
  //       			$('.tianjiaguanzhu,.down').fadeIn();

  //     		});
		// 	 $('.guanzhu em').click(function(event) {
        
  //       			$('.tiwen,.down').fadeIn();

  //     		});
		// 	 //单击关闭按钮时，让模态对话框隐藏
		//       $('.btn2').click(function(event) {
		//         $('.tianjiaguanzhu,.down,.tiwen').fadeOut();
		//       }); 




		// });
		// // 点击关注显示 隐藏结束


	
	var iUl;
	var iList=8;
	// 点击分类显示不同分类里面的老师
	var ifenlei;
	$('.fenleiFuck li').click(function(event) {





		ifenlei=$(this).index();

		$(this).addClass('current').siblings('li').removeClass('current');
		$('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
		// 显示前N个开始-----------------------------------------------------------
		// 获取当前显示的那个ul列表的index值···························
	
		iList=8;
		$('.liebiaoShow').each(function(index, element) {
			if ($(element).is(':hidden')) {}else{
				iUl=index;
				;};
			
		});

	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个children('li:gt(20)').hide()
	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------







	});
	// 完成·····················································
	// 
	// 点击分类显示不同分类里面的音乐之星
	var ifenlei;
	$('.fenleiCa li').click(function(event) {


		ifenlei=$(this).index();
		
		$(this).addClass('current').siblings('li').removeClass('current');
		$('.liebiaoCa').eq(ifenlei).fadeIn('fast').siblings('ul').hide();

		// 显示前N个开始-----------------------------------------------------------
		// 获取当前显示的那个ul列表的index值···························
		
		iList=8;
		$('.liebiaoShow').each(function(index, element) {
			if ($(element).is(':hidden')) {}else{
				iUl=index;
				;};
			
		});
		
	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个children('li:gt(20)').hide()
	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------
	});
	// 完成·····················································

	// 左侧的二级菜单点击，右侧显示相应的内容·····················
	$('.mingrenPoint').click(function(event) {
		$('.mingrenPoint').addClass('current');
		$('.zhixingPoint').removeClass('current');
		$('.yinyuemingren').stop(true).show();
		$('.xinyuezhixing').stop(true).hide();
		$('.citySearch').stop(true).hide();
		$('.searchName').stop(true).hide();
		// 显示前N个开始-----------------------------------------------------------
	// 获取当前显示的那个ul列表的index值···························
	iList=8;
	var iContent;
	$('.qzdtContent>div').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iContent=index;
			};
	});
	$('.liebiaoShow').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iUl=index;
			;};
		
	});
	
	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个children('li:gt(20)').hide()
	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------
// 
	});
	$('.zhixingPoint').click(function(event) {
		$('.mingrenPoint').removeClass('current');
		$('.zhixingPoint').addClass('current');
		$('.yinyuemingren').stop(true).hide();
		$('.xinyuezhixing').stop(true).show();
		$('.citySearch').stop(true).hide();
		$('.searchName').stop(true).hide();
		// 显示前N个开始-----------------------------------------------------------
	// 获取当前显示的那个ul列表的index值···························
	iList=8;
	
	$('.qzdtContent>div').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iContent=index;
			};
	});
	$('.liebiaoShow').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iUl=index;
			;};
		
	});
	
	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个children('li:gt(20)').hide()
	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
// 显示前N个结束-----------------------------------------------------------

	


	});

	// 瀑布流下拉显示·············································
	// 
	

// 显示前N个开始-----------------------------------------------------------
	// 获取当前显示的那个ul列表的index值···························
	
	var iContent;
	$('.qzdtContent>div').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iContent=index;
			};
	});
	$('.liebiaoShow').each(function(index, element) {
		if ($(element).is(':hidden')) {}else{
			iUl=index;
			;};
		
	});
	
	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个c
	$('.liebiaoShow').eq(iUl).children('li:gt(3)').hide();
	

// 显示前N个结束-----------------------------------------------------------
	
	$(window).scroll(function(event) {
							if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
									 

									for (var i = iList; i < iList+4; i++) {
												
										$('.liebiaoShow').eq(iUl).children('li').eq(i).slideDown('');
										
										

									};

									iList=iList+4;
							};
						});


// ```````````````````````````````````````````````````````````````````````````````````````````````````````````
var infoDiffer;
$('.tijiao input').click(function(event) {

	// 如果此时显示的是音乐名人，infodifference值为m，如果显示的是音乐之星，值为x;
	if ($('.yinyuemingren').is(':hidden')) {
			infoDiffer='x';
		} else{
			infoDiffer="m";
		};
  		console.log(infoDiffer);


  	// 提交城市新信息切换列表内容····················································
				// subCity1代表省级值，subCity2代表市级值，subCity3代表县级值，
				var subCity1;
				var subCity2;
				var subCity3;
				var cityInfo;




					subCity1=$('#sfdq_tj').val();
					subCity2=$('#csdq_tj').val();
					subCity3=$('#qydq_tj').val();
					
					if (subCity1==""||subCity1=="选择省份") {
						alert("请选择省份再提交");
					} else{
						
						console.log({'city1': subCity1,'city2':subCity2,'city3':subCity3});
						$.ajax({
								url: '/mingren/indexs.php',
								type: 'post',
								dataType: 'text',
								// data:{'city1': subCity1,'city2':subCity2,'city3':subCity3},
								data:{'city1': subCity1,'city2':subCity2,'city3':subCity3,'mingren':infoDiffer},
								// data:city1,
								success:function(msg) {
									console.log(msg);
									console.log(typeof(msg));
									// 清空liebiaoShow并插入li
									if (infoDiffer=='m') {
										$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
										$('.yinyuemingren .liebiaoShow').eq(0).empty().append(msg);//插到音乐名人分类下的列表中
									} else{
										$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
										$('.xinyuezhixing .liebiaoCa').eq(0).empty().append(msg);//插到音乐之星分类下的列表中
									};
									
									

							}
					})
					.done(function() {
						console.log("success");
						
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
					};

					


  });
// ---------------------------------------------------------------------------------------------------------

// 教室输入名字查询
				var jiaoshiName;
					$('.searchSub').click(function(event) {
						// 如果此时显示的是音乐名人，infodifference值为m，如果显示的是音乐之星，值为x;
						if ($('.yinyuemingren').is(':hidden')) {
								infoDiffer='x';
							} else{
								infoDiffer="m";
							};
					  		console.log(infoDiffer);

						jiaoshiName=$('.searchSelect').val();
						// console.log(jiaoshiName);
						if (jiaoshiName=="") {
							alert('输入的教室名字不能为空');
						} else{
								console.log(jiaoshiName);
								$.ajax({
									url: '/mingren/index.name.php',
									type: 'post',
									dataType: 'text',
									data: {'jiaoshi1': jiaoshiName,'mingren':infoDiffer},
									beforeSend:function() {
										console.log({'jiaoshi1': jiaoshiName,'mingren':infoDiffer});
									},
									success:function(msg){
									// 清空liebiaoShow并插入li
										if (infoDiffer=='m') {
											$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
											$('.yinyuemingren .liebiaoShow').eq(0).empty().append(msg);//插到音乐名人分类下的列表中
										} else{
											$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
											$('.xinyuezhixing .liebiaoCa').eq(0).empty().append(msg);//插到音乐之星分类下的列表中
										};
									},
								})
								.done(function() {
									// console.log("success");
								})
								.fail(function() {
									// console.log("error");
								})
								.always(function() {
									// console.log("complete");
								});
						};
						
						
					});

// ---------------------------------------------------------------------------------------------------------

				// 教室输入排序类型查询
				var paixuName;
					$('#paixuSelect').change(function(event) {
						// 如果此时显示的是音乐名人，infodifference值为m，如果显示的是音乐之星，值为x;
						if ($('.yinyuemingren').is(':hidden')) {
								infoDiffer='x';
							} else{
								infoDiffer="m";
							};
					  		console.log(infoDiffer);

						paixuName=$('#paixuSelect').val();
						// console.log(paixuName);
						if (paixuName==0) {
							alert('请选择排序类型');
						} else{
								console.log(paixuName);
								$.ajax({
									url: '/mingren/index.type.php',
									type: 'post',
									dataType: 'text',
									data: {'num': paixuName,'mingren':infoDiffer},
									success:function(msg){
										console.log(msg);
										// 清空liebiaoShow并插入li
										if (infoDiffer=='m') {
											$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
											$('.yinyuemingren .liebiaoShow').eq(0).empty().append(msg);//插到音乐名人分类下的列表中
										} else{
											$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
											$('.xinyuezhixing .liebiaoCa').eq(0).empty().append(msg);//插到音乐之星分类下的列表中
										};
									}
								})
								.done(function() {
									// console.log("success");
								})
								.fail(function() {
									// console.log("error");
								})
								.always(function() {
									// console.log("complete");
								});
						};
						
						
					});

					// 音乐之行输入排序类型查询
								var paixuName;
									$('.xinyuezhixing #paixuSelect').change(function(event) {
										// 如果此时显示的是音乐名人，infodifference值为m，如果显示的是音乐之星，值为x;
										if ($('.yinyuemingren').is(':hidden')) {
												infoDiffer='x';
											} else{
												infoDiffer="m";
											};
									  		console.log(infoDiffer);

										paixuName=$('.xinyuezhixing #paixuSelect').val();
										// console.log(paixuName);
										if (paixuName==0) {
											alert('请选择排序类型');
										} else{
												console.log(paixuName);
												$.ajax({
													url: '/mingren/index.type.php',
													type: 'post',
													dataType: 'text',
													data: {'num': paixuName,'mingren':infoDiffer},
													success:function(msg){
														console.log(msg);
														// 清空liebiaoShow并插入li
														if (infoDiffer=='m') {
															$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
															$('.yinyuemingren .liebiaoShow').eq(0).empty().append(msg);//插到音乐名人分类下的列表中
														} else{
															$('.fenlei li').eq(0).trigger('click');//模拟点击了一下全部老师
															$('.xinyuezhixing .liebiaoCa').eq(0).empty().append(msg);//插到音乐之星分类下的列表中
														};
													}
												})
												.done(function() {
													// console.log("success");
												})
												.fail(function() {
													// console.log("error");
												})
												.always(function() {
													// console.log("complete");
												});
										};
										
										
									});

// 提交搜索信息切换列表内容结束····················································
















});



