

$(function() {

	


	
	var iUl;
	var iList=6;
	// 点击分类显示不同分类里面的老师
	var ifenlei;
	$('.fenleiFuck li').click(function(event) {
			console.log('f');




		ifenlei=$(this).index();

		$(this).addClass('current').siblings('li').removeClass('current');
		$('.liebiaoFuck').eq(ifenlei).fadeIn('fast').siblings('ul').hide();
		// 显示前N个开始-----------------------------------------------------------
		// 获取当前显示的那个ul列表的index值···························
	
		iList=6;
		$('.liebiaoShow').each(function(index, element) {
			if ($(element).is(':hidden')) {}else{
				iUl=index;
				;};
			
		});

	// 获取当前显示的那个ul列表的index值结束·······················1
	// 首先显示前20个children('li:gt(20)').hide()
	// $('.liebiaoShow').eq(iUl).children('li:gt(5)').hide();
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
		
		iList=6;
		$('.liebiaoShow').each(function(index, element) {
			if ($(element).is(':hidden')) {}else{
				iUl=index;
				;};
			
		});
		
	// 获取当前显示的那个ul列表的index值结束·······················
	// 首先显示前20个children('li:gt(20)').hide()
	// $('.liebiaoShow').eq(iUl).children('li:gt(5)').hide();
// 显示前N个结束-----------------------------------------------------------
	});
	// 完成·····················································

	// 左侧的二级菜单点击，右侧显示相应的内容·····················
	$('.mingrenPoint').click(function(event) {
		$('.mingrenPoint').addClass('current');
		$('.zhixingPoint').removeClass('current');
		$('.yinyuemingren').stop(true).show();
		$('.xinyuezhixing').stop(true).hide();
		// 显示前N个开始-----------------------------------------------------------
	// 获取当前显示的那个ul列表的index值···························
	iList=6;
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
	// $('.liebiaoShow').eq(iUl).children('li:gt(5)').hide();
// 显示前N个结束-----------------------------------------------------------
// 
	});
	$('.zhixingPoint').click(function(event) {
		$('.mingrenPoint').removeClass('current');
		$('.zhixingPoint').addClass('current');
		$('.yinyuemingren').stop(true).hide();
		$('.xinyuezhixing').stop(true).show();
		// 显示前N个开始-----------------------------------------------------------
	// 获取当前显示的那个ul列表的index值···························
	iList=6;
	
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
	// $('.liebiaoShow').eq(iUl).children('li:gt(5)').hide();
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
	// $('.liebiaoShow').eq(iUl).children('li:gt(5)').hide();
	

// 显示前N个结束-----------------------------------------------------------
	
	$(window).scroll(function(event) {
							if ($(document).scrollTop() + $(window).height() > $(document).height() - 150) {
									 

									for (var i = iList; i < iList+3; i++) {
												console.log(i);
										$('.liebiaoShow').eq(iUl).children('li').eq(i).slideDown('');
										
										

									};

									iList=iList+3;
							};
						});

window.onload=function(){}
// 论坛发帖页面中的点击左侧切换版块发帖js
	// 点击左侧论坛版块 以在不同的板块发帖的js 

				$(document).ready(function() {
					var ion;
					
					$('.luntanBan').click(function(event) {
						ion=$(this).index();
						// 控制左侧的版块选择效果
						$(this).addClass('on').siblings().removeClass('on');
						// 每次点击都要把$('.fatieWrap')内部先清空
						$('.fatieWrap').empty();
						// 然后在其内部插入相应的html页面
						if (ion==0) {
							$('.fatieWrap').prepend('<iframe id="luntan01" src="luntan_bankuai01.html" frameborder="0"></iframe>')
						} else if(ion==1) {
							$('.fatieWrap').prepend('<iframe id="luntan02" src="luntan_bankuai02.html" frameborder="0"></iframe>')
						} else if (ion==2) {
							$('.fatieWrap').prepend('<iframe id="luntan03" src="luntan_bankuai03.html" frameborder="0"></iframe>')
						} else if (ion==3) {
							$('.fatieWrap').prepend('<iframe id="luntan04" src="luntan_bankuai04.html" frameborder="0"></iframe>')
						} else if (ion==4) {
							$('.fatieWrap').prepend('<iframe id="luntan05" src="luntan_bankuai05.html" frameborder="0"></iframe>')
						} else if (ion==5) {
							$('.fatieWrap').prepend('<iframe id="luntan06" src="luntan_bankuai06.html" frameborder="0"></iframe>')
						} else if (ion==6) {
							$('.fatieWrap').prepend('<iframe id="luntan07" src="luntan_bankuai07.html" frameborder="0"></iframe>')
						} else{
							$('.fatieWrap').prepend('<iframe id="luntan08" src="luntan_bankuai08.html" frameborder="0"></iframe>')
						}

						

					});





				});


		 // 点击左侧论坛版块 以在不同的板块发帖的js 
		 // var actid;
		 // function function_action(actidNum) {
		 // 	catid = actidNum;
		 // 	console.log(actid);
		 // }
		 // var actid;
		 console.log(actid);
		// $(".baomingTitle form").submit(function() {return false();}); // 禁用 form 提交，页面不会跳转
		//报名组别的二级联动查询
		// var aSelect = $('.hai_grouping'),
  //           b = $('.hai_grouping2'),
  //           c,
  //           d,
  //           e,
  //           f;
  //          	window.onload = function(){//海选报名分组，一级选择，在页面载入之后向后天请求数据
  //           	$.ajax({
  //           		url: '/e/ajax/haixuan.ajax.php',
  //           		type: 'post',
  //           		dataType: 'html',
  //           		data: {'titleid':actid}
  //           	})
  //           	.done(function(msg) {
  //           		// a.empty().append('<option value="0">请选择</option>');
  //           		aSelect.empty().append('<option value="请选择">请选择</option>'+msg);
  //           	})
  //           	.fail(function() {
  //           		console.log("error");
  //           	});
  //           };
  //           aSelect.on('change',  function(event) {//海选报名分组，二级选择菜单，在一级选择之后向二级传参，并返回值

  //           	c = $(this).val();
  //           	if (c=='请选择') {
            		
  //           		$("#hai_grouping option[value='请选择']").remove();
  //           		alert('请选择分组');
  //           	}
  //           	else {
  //           		$.ajax({
	 //            		url: '/e/ajax/haixuan.ajax.two.php',
	 //            		type: 'post',
	 //            		dataType: 'html',
	 //            		data: {'sitname': c},
	 //            	})
	 //            	.done(function(msg) {
	 //            		b.empty().append(msg);
	 //            	})
	 //            	.fail(function() {
	 //            		console.log("error");
	 //            	});
  //           	};
            	
            	
  //           });

            //海选报名条件限制，
            $('.haixuanbaoming').submit(function(event) {
            	var teamSelectVal = $(this).find('.hai_grouping option:checked').val();
				console.log(teamSelectVal);
            	if (teamSelectVal == "请选择") {
            		event.preventDefault();
            		alert('请选择分组！')
            	} else if ($('#downpath1').val()=='') {
					//视频未上传完成前不允许提交
					event.preventDefault();
					alert('请等待视频上传完成之后再提交！')
				}
            });
            //点击按钮切换图片或者视频海选报名
            var e = $('.baomingchange'),
            	g,
            	h = $('.haixuanbaoming1');
            	e.on('click', function(event) {
            		g = $(this).index();
            		console.log(g);
            		$(this).addClass('on').siblings('.baomingchange').removeClass('on');
            		h.eq(g).fadeIn(200).siblings('.haixuanbaoming1').fadeOut(200);
            	});
            //报名表中参数曲目输完之后，自动将内容添加到name=title,input中，zjk要求的，2016/7/22
            $('#hai_petition').blur(function(event) {
            	$('#NewTitle').val($(this).val());
            });

















});

