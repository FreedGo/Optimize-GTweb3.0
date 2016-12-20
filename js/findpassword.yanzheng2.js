 $(document).ready(function() {
	    			// 1.点击发送验证码，出现提示
			    	// $('.yanzhengBtn').click(function(event) {
					 /**
					  * 快速显示notices信息
					  * @param {string} ele,dom元素
					  * @param {string} desc,要显示的信息
					  * @param {string} pigment,要显示的颜色
					  */
					 function showNotice(ele,desc,pigment){
							ele.html(desc).css('color',pigment);
						}
			    		
			    	// });
					var mi1,
					    mi2,
					    tipPassword1 = $('.tipPassword1'),
					    tipPassword2 = $('.tipPassword2');

					//2. 判断两次密码是否一致
					$('#repassword').blur(function(event) {
						$('.yanzhengmima').remove();
						mi1=$('.password1').val();
						mi2=$('#repassword').val();
						
						if (mi1=="") {
							showNotice(tipPassword1,'密码不能为空','red');
						} else if ( mi1.length < 6){
//							tipPassword1.html('密码长度不能低于6位');
							showNotice(tipPassword1,'密码长度不能低于6位','red');

						} else{
							if (mi1==mi2) {
								showNotice(tipPassword1,'√','green');
								showNotice(tipPassword2,'√','green');
							} else{
								showNotice(tipPassword1,'两次密码不一致,请重新输入','red');
							}
						}
						$('#password').focus(function(event) { tipPassword1.html('')});
						$('#repassword').focus(function(event) { tipPassword2.html('')});
					});
					// 判断两次密码是否一致结束
					//3. 验证码验证························
					var yanzhengNum,
						reYanzhengma,
						tipMark = $('.tipMark');
					$('.yanzheng').blur(function(event) {
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
//								tipMark.html('√');
								showNotice(tipMark,'√','green');
							} else{//其他数值代表验证码输入错误
								$('.yanzhengCode').remove();
//								tipMark.html('验证码错误，请重输');
								showNotice(tipMark,'验证码错误，请重输','green');

//								$('.yanzheng').val('');//清空验证码输入框内容
							};
							$('.yanzheng').focus(function(event) {
								tipMark.html('');
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

					// 5.判断用户名输入字符长度以及是否重复
					$('.yonghuming').blur(function(event) {

						var lUsername,h,
						    tipNam = $('.tipName');
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
//							tipNam.html('名字长度大于20个字节')
							showNotice(tipNam,'名字长度大于20个字节','red');

						} else if($('.yonghuming').val()==""){
//							tipNam.html('×');
							showNotice(tipNam,'用户名不能为空','red');
						} else {
							// 如果格式正确则发后台验证
//							tipNam.html('验证中...');
							showNotice(tipNam,'验证中...','green');
							$.ajax({
								url: '/e/ajax/zhuce.name.ajax.php',
								type: 'post',
								dataType: 'html',
								data: {'name': h}
							})
							.done(function(msg) {
								if (msg==="1") {
//									tipNam.html('未查询到用户').css('fontSize', 20);
									showNotice(tipNam,'未查询到用户','green');
								}
								else{
									showNotice(tipNam,'√','red');
								}
							})
							.fail(function() {
								console.log("error");
							});
						}

					});
					//6. 用户名的 input框得到焦点时清除提示
					$('.yonghuming').focus(function(event) {
						$('.tipNam').html('');
					});
					//7. 输入手机号框有内容输入就判断正确，因为有限制只输入数字
					



					var d = $('#photo'),
						k = $('.celltype').val(),
						tipPhone = $('.tipPhone');
						
					$('#photo').blur(function(event) {
						e = d.val();
						if (e=="") {
							tipPhone.html('');
							$('.yanzhengBtn').addClass('yanzheng-pre').removeClass('yanzhengBtn');
						} else{
							e = parseInt(d.val());
//							tipPhone.html('验证中');
							showNotice(tipPhone,'验证中','green');
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
								if (msg==="2") {//等于0直接过
									// console.log(f);
									showNotice(tipPhone,'√','green');
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
											data: {'message': e,'Area':k}
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
										}, 10000);
									});

								}
								else if (msg==="1"){//等于1提示已注册
									showNotice(tipPhone,'此手机号已注册','red');
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
	                //8.1 2016-10-14 修改 地区默认为空，用户必选，不选的时候跳出提示
	                    $('.iphoneNum').focus(function () {
	                    	// console.log($('.celltype').val());
		                    if ($('.celltype').val() == '+0'){
//			                    $('.tipPhone').html('请先选择地区');
			                    showNotice($('.tipPhone'),'请先选择地区','red');
		                    }
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
//										$('.tipMark').html('√');
										showNotice($('.tipMark'),'√','green');

									} else{//其他数值代表验证码输入错误
										$('.yanzhengCode').remove();
										showNotice($('.tipMark'),'验证码错误','red');
										$('.yanzheng').val('');//清空验证码输入框内容
									};
									$('.yanzheng').focus(function(event) {
										$('.tipMark').html('');
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