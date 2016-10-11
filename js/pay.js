// 这个是点击支付按钮关闭当前窗的js
// window.onload=function(){
//         			// 关闭窗口函数
//         			function CloseWebPage(){
// 					 if (navigator.userAgent.indexOf("MSIE") > 0) {
// 					  if (navigator.userAgent.indexOf("MSIE 6.0") > 0) {
// 					   window.opener = null;
// 					   window.close();
// 					  } else {
// 					   window.open('', '_top');
// 					   window.top.close();
// 					  }
// 					 }
// 					 else if (navigator.userAgent.indexOf("Firefox") > 0) {
// 					  window.location.href = 'about:blank ';
// 					 } else {
// 					  window.opener = null;
// 					  window.open('', '_self', '');
// 					  window.close();
// 					 }
// 					}
// 					// 调用关闭函数
//         			var payBtn1=document.getElementById("payBtn");
//         			payBtn1.onclick=function(){
//         				CloseWebPage();
//         			}

//         		}
//                         
        window.onload=function(){
                // 申请体现的ss调用
                jQuery(".www360buy1").slide({delayTime:0,trigger:'click',effect:"fade",delayTime:300 });
        }
// ·············································································
		// 选择不同收款方式
                // 封装切换form的action值的函数
                        // function ActionChange(data) {
                        //        $('.payInfo').attr('action', data); 
                        // }
                        // 选择不同的支付方式
        	       $(function() {
        			
        			// 支付宝支付点击事件
        			$('.alipay').click(function(event) {

        				$('.payImg').css('borderColor', '#ccc');
        				$('.payImg1').css('borderColor', '#cb7047');
        				// 填写支付宝表单提交url
        				$('.payInfo').attr('action', 'demo/alipayapi.php');

        			});
        			// 微信支付点击事件
        			$('.txpay').click(function(event) {

        				$('.payImg').css('borderColor', '#ccc');
        				$('.payImg2').css('borderColor', '#cb7047');
        				// 填写微信表单提交url
        				$('.payInfo').attr('action', '2.php');

        			});
        			// 网银支付点击事件
        			$('.ccbpay').click(function(event) {

        				$('.payImg').css('borderColor', '#ccc');
        				$('.payImg3').css('borderColor', '#cb7047');
        				// 填写建行表单提交url
        				$('.payInfo').attr('action', '3.php');

        			});
                    //台湾欧支付点击事件
                    $('.twpay').click(function(event) {

                            $('.payImg').css('borderColor', '#ccc');
                            $('.payImg4').css('borderColor', '#cb7047');
                            // 填写建行表单提交url
                            $('.payInfo').attr('action', 'oufubao/Allpay_AIO_CreateOrder.php');

                    });
// .............................................................................
				// 点击lookBtn1,，弹出选择不同付款方式的弹窗
					$('.seeBtn1').click(function(event) {
						$('.payWrap').hide();
						$(this).siblings('.payWrap').show();
					});
				// 点击X关闭窗口
				$('.shutUp').click(function(event) {
					$('.payWrap').hide();
				});

                                // 点击seeBtn2,弹出选择不同付款方式的弹窗
                                        $('.seeBtn2').click(function(event) {
                                                
                                                $('.payWrap2').show();
                                        });
                                // 点击X关闭窗口
                                $('.shutUp').click(function(event) {
                                        $('.payWrap2').hide();
                                });








 });


