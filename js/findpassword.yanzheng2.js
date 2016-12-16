 $(document).ready(function() {

					var mi1;
					var mi2;

					//2. 判断两次密码是否一致
					$('#repassword').blur(function(event) {
						$('.yanzhengmima').remove();
						mi1=$('.password1').val();
						mi2=$('#repassword').val();
						
						if (mi1=="") {
							$('.password1').after('<span class="yanzhengmima" style="font-size:20px;color:red;float:right;font-weight:bold;">×</span>');
							$('#repassword1').after('<span class="yanzhengmima" style="font-size:20px;color:red;float:right;font-weight:bold;">×</span>')
						} else{
							if (mi1==mi2) {
								$('.password1').after('<span class="yanzhengmima" style="font-size:20px;color:green;float:right;font-weight:bold;">√</span>');
								$('#repassword').after('<span class="yanzhengmima" style="font-size:20px;color:green;float:right;font-weight:bold;">√</span>')
								
							} else{
								$('#repassword').after('<span class="yanzhengmima" style="font-size:12px;color:red;float:right;">两次密码不一致，请重新输入</span>')
							};
						};
						

						$('#password').focus(function(event) {
								$('.yanzhengmima').fadeOut('normal');});
						$('#repassword').focus(function(event) {
								$('.yanzhengmima').fadeOut('normal');});

					});
					// 判断两次密码是否一致结束
					//3. 验证码验证························
					var yanzhengNum,
						reYanzhengma;

					$('.yanzheng').blur(function(event) {
						yanzhengNum=$('.yanzheng').val();
						$.ajax({
							url: '/e/ajax/zhuce.code.ajax.php',
							type: 'post',
							dataType: 'html',
							data: {'code': yanzhengNum,'message':d.val()}
						})
						.done(function(msg) {
							console.log("success");
							reYanzhengma = msg;
							if (msg==2) {//若为2则后台对比成功
								$('.yanzhengCode').remove();
								$('.getRegCode').after('<span class="yanzhengCode" style="font-size:20px;color:green">&nbsp;√</span>');
							} else{//其他数值代表验证码输入错误
								$('.yanzhengCode').remove();
								$('.getRegCode').after('<span class="yanzhengCode" style="font-size:12px;color:red">&nbsp;验证码错误，请重输</span>');
//								$('.yanzheng').val('');//清空验证码输入框内容
							};
							$('.yanzheng').focus(function(event) {
								$('.yanzhengCode').fadeOut('normal');
							});
						})
						.fail(function() {
							console.log("error");
							return false;
						})
						.always(function() {
							// console.log("complete");
							console.log( {'code': yanzhengNum,'message':d.val()});
						});


					});



					// 验证码为12346结束·······················
					// 5.判断用户名输入字符长度以及是否重复
					$('.yonghuming').blur(function(event) {
						$('.yonghumingtishi').remove();
						var lUsername,h;
						// function calculate() {  
						//     String.prototype.lenB = function(){return this.replace(/[^\x00-\xff]/g,"**").length;}  
						//     //var str = "这是一个可以将汉字计算成两个字节的函数";  
						//     var str =document.getElementsByName('yonghuming').value;
						//     alert("老的算法 = " + str.length);  
						//     alert("新的算法 = " + str.lenB());  
						// } 
						lUsername=$(".yonghuming").val();
						h = lUsername;
						lUsername=lUsername.replace(/[^\x00-\xff]/g,"**").length;//把文字拆分成两个字节来计算
						if (lUsername>20) {
							$(this).after('<span class="yonghumingtishi" style="color:red;font-size:10px;float:left;">超过长度限制，汉字最多10个，字母最多20个</span>');
						} else if(
							$('.yonghuming').val()==""
							){
							$(this).after('<span class="yonghumingtishi" style="font-size:20px;line-height:34px; color:red;font-weight:bold;">×</span>');
							
						} else {
							// 如果格式正确则发后台验证
							$(this).after('<span class="yonghumingtishi" style="font-size:14px;line-height:34px; color:green;font-weight:bold;">验证中...</span>');
							var j = $('.yonghumingtishi');
							$.ajax({
								url: '/e/ajax/zhuce.name.ajax.php',
								type: 'post',
								dataType: 'html',
								data: {'name': h},
							})
							.done(function(msg) {
								if (msg==="1") {
									j.empty().html('√').css('fontSize', 20);
								}
								else{
									j.empty().html('此用户名已注册').css({'color':'red','fontWeight':'normal'});
								}
							})
							.fail(function() {
								console.log("error");
							});
							
							
						};

					});
					//6. 用户名的 input框得到焦点时清除提示
					$('.yonghuming').focus(function(event) {
						$('.yonghumingtishi').fadeOut('normal');
					});
					//7. 输入手机号框有内容输入就判断正确，因为有限制只输入数字
					var d = $('#photo'),
						k = $('.celltype').val();
						
					$('#photo').blur(function(event) {
						$('.iphoneNumKuang').remove();
						e = d.val();
						if (e=="") {
							d.after('<span class="iphoneNumKuang"  style="font-size:20px;line-height:34px;margin-left:5px; color:red;font-weight:bold;">×</span>');
							$('.yanzhengBtn').addClass('yanzheng-pre').removeClass('yanzhengBtn');
						} else{
							e = parseInt(d.val());
							d.after('<span class="iphoneNumKuang"  style="font-size:16px;line-height:34px;margin-left:5px; color:green;">验证中...</span>');
							var f = $('.iphoneNumKuang');
							$.ajax({
								url: '/e/ajax/zhuce.phone.ajax.php',
								type: 'post',
								dataType: 'html',
								data: {'phone': e},
							})
							.done(function(msg) {
								// console.log("success");
								// console.log(msg);
								// console.log(typeof(msg));
								if (msg==="1") {//等于0直接过
									// console.log(f);
									f.empty().html('√').css({
										fontSize: 20,
										fontWeight: 'blod'
									});
									// 此时验证码按钮处于能点状态，并且点击后可以向后台发送ajax
									$('.yanzheng-pre').addClass('yanzhengBtn').removeClass('yanzheng-pre');
									//点击之后先提示已发送，再ajax
									$('.yanzhengBtn').on('click', function(event) {
										$('.yifasong').html('&nbsp;验证码已发送，请查看');
										$('.yifasong').stop(true).delay(2000).fadeOut('fast');
										k = $('.celltype').val();
										$.ajax({
											url: '/e/ajax/sendSMS.php',
											type: 'post',
											dataType: 'html',
											data: {'message': e,'Area':k},
										})
										.done(function(msg) {
											console.log("success");
											// console.log(msg);
										})
										.fail(function() {
											console.log("error");
										})
										.always(function() {
											console.log({'message': e,'Area':k});
										});
										// 按钮先变灰色
										$('.yanzhengBtn').addClass('yanzheng-pre').removeClass('yanzhengBtn');
										// 5秒之后再变回去
										setTimeout(function(){
											$('.yanzheng-pre').addClass('yanzhengBtn').removeClass('yanzheng-pre');
										}, 5000);
									});

								}
								else if (msg==="2"){//等于1提示已注册
									f.empty().html('此手机号已注册').css({
										fontSize: 14,
										fontWeight: 'normal'
									});
									$('.yanzhengBtn').addClass('yanzheng-pre').removeClass('yanzhengBtn');
								}
							})
							.fail(function() {
								console.log("error");
							});
						};
					});
					//8. 手机国码选择自动切换
					$('.celltype').change(function(event) {
						var icelltype=$('.celltype').val();
						console.log(icelltype);
						$('.receiveNum').empty().html(icelltype);
						$('.quxiao').val(icelltype);
					});
					//9.提交时验证
					var a = $('#user_info_sub'),
						b = $('#user_agreement'),
						c;
						a.on('submit', function(event) {//当点击提交的时候
							if (reYanzhengma!=2) {
								yanzhengNum=$('.yanzheng').val();
								$.ajax({
									url: '/e/ajax/zhuce.code.ajax.php',
									type: 'post',
									dataType: 'html',
									data: {'code': yanzhengNum,'message':d.val()},
								})
								.done(function(msg) {
									console.log("success");
									reYanzhengma = msg;
									if (msg==2) {//若为2则后台对比成功
										$('.yanzhengCode').remove();
										$('.yanzheng').after('<span class="yanzhengCode" style="font-size:20px;color:green">&nbsp;√</span>');
									} else{//其他数值代表验证码输入错误
										$('.yanzhengCode').remove();
										$('.yanzheng').after('<span class="yanzhengCode" style="font-size:12px;color:red">&nbsp;验证码错误，请重输</span>');
										$('.yanzheng').val('');//清空验证码输入框内容
										console.log($('.yanzheng').val());
									};
									$('.yanzheng').focus(function(event) {
										$('.yanzhengCode').fadeOut('normal');
									});
								})
								.fail(function() {
									console.log("error");
								});
								return false;
							}
							
						});
					//10.验证手机号是否重复
						

	    });