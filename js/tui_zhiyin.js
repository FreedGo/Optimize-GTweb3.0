$(function() {
    yechaInit();
});
function yechaInit() {
	$(".avator").mouseover(function(){$("a.editavator").show();}).mouseout(function(){$("a.editavator").hide();});
	$("abbr.time").timeago();
	$(".myavator").mouseover(function(){$(".myavator ul").show();$(".myavator > a").css("background-color","#036CB4");}).mouseout(function(){$(".myavator ul").hide();$(".myavator > a").css("background-color","");});

	$(window).scroll(function(){
		var scroH = $(this).scrollTop();
		if(scroH>=250){
			$("#header").css({"position":"fixed","top":0,"box-shadow":"0 0 25px #1962A2"});
			} else if(scroH<250){
				$("#header").css({"position":"","box-shadow":"none"});
				}
	});
}


//增加表情 要自己整合ajax表情插件
function addface(){
	$(".face").load("/e/extend/face/index.php");
	$(".plsub span .face").toggle()
}

//选择好友
function chosefri(){
	art.dialog.open('/e/member/friend/change/chosefri.php?fm=sendmsg&f=to_username',
    {title: '选择好友',lock: true,opacity: 0.5, width: 400, fixed:true})
}
//ajax登陆
function login(){
	art.dialog.open('/register/ajaxlogin.php',
    {title: '会员登陆',lock: true,opacity: 0.2, width: 690, height:305,fixed:true,close: function () {
		$(".login").load("/e/member/login/ajaxlogin.php");
    }
	})
}

//增加评论
function logincheck(){
	var username,password,ecmsfrom,lifetime;
	username=$("#username").val();
	password=$("#password").val();
	ecmsfrom=$("#ecmsfrom").val();
	lifetime=0;
	if ($("#autocheckbox").is(":checked")){
		lifetime=$("#autocheckbox").val();
		}
	if (username==""){
		jError("用户名不能为空哦!",{HorizontalPosition : 'center',VerticalPosition:'center'});document.getElementById("username").focus();return false;
		}
	if (password==""){
		jError("密码不能为空哦!",{HorizontalPosition : 'center',VerticalPosition:'center'});document.getElementById("password").focus();return false;
		}
	$.post("/e/member/doaction.php",
		{
			username:username,
			password:password,
			lifetime:lifetime,
			enews:"Ajaxlogin",
			tobind:"0"
		},
		function(data,status){
			 switch(data){
				 case"EmptyLogin":jError("用户名和密码不能为空",{HorizontalPosition : 'center',VerticalPosition:'center'});
				 break;
				 case"FailPassword":jError("您的用户名密码有误?",{HorizontalPosition : 'center',VerticalPosition:'center'});
				 break;
				 case"NotCheckedUser":jError("您的帐号还未通过审核!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				 break;
				 case"NotCookie":jError("登录不成功，请确认您的cookie是否已开启!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				 break;
				 case"LoginSuccess":jSuccess("登陆成功,页面跳转中..请稍后",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){art.dialog.close();}})
				 break;
			 }
			}
		)
}
//Feed相关
function follow(userid,userid1){
	if (userid1===0) {
		$('#loginBtn').trigger('click');
	} else {
		$.post("/e/extend/tui_zhiyin/index.php",
		{
			followid:userid
		},
		function(data,status){
			console.log({followid:userid});
			console.log(data);
			if (data==1) {
				$('body').append('<div class="toupiaotixing" style="background:#fff;padding:20px;z-index:10000;color:green;font-size:20px;position:fixed;top:30%;left:50%;margin:-15px 0 0 -20px;">投票成功！</div>')
				$('.toupiaotixing').stop(true).slideDown(600).fadeOut(3000, function() {
					$(this).remove();
				});
			} else {
				$('.toupiaotixing').remove();
				$('body').append('<div class="toupiaotixing" style="background:#fff;display:none;padding:20px;z-index:10000;color:red;font-size:20px;position:fixed;top:30%;left:50%;margin:-15px 0 0 -100px;">与前一次投票时间不到一小时，请稍后再投票</div>')
				$('.toupiaotixing').stop(true).slideDown(600).fadeOut(3000, function() {
					$(this).remove();
				});
			}
			 // switch(data){
				//  case"DelSuccess":jError("取消邀请成功!",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){
				// 	 $("#follow"+userid).text("邀请");
				// 	 $("#follow"+userid).removeClass("orange");
				// 	 }});
				//  break;
				//  case"unknowerror":jError("发生未知错误,请联系管理员!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				//  break;
				//  case"nofollowme":jError("不能邀请自己哦!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				//  break;
				//  case"AddSuccess":jSuccess("邀请成功!",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){
				// 	 $("#follow"+userid).text("取消邀请");
				// 	 $("#follow"+userid).addClass("orange");
				// 	 }})
				//  break;
				//  case"Pleaselogin":window.open('/e/member/login');
	// 			 case"Pleaselogin":art.dialog.open('/e/member/login',
 //    {title: '会员登陆',lock: true,opacity: 0.2, width: 690, height:305,fixed:true,close: function () {
	// 	$(".login").load("/e/member/login/ajaxlogin.php");
		
 //    }
	// });
			
			
			}
		)
		
	}
	
}
function xingyun(){
	$(".xingyun").toggleClass("yanshi");
	$(".hymain").toggleClass("hyindex");
}





// 页面加载的时候向后天发送数据
	// function ajaxTuiZhiYin(data){
	// 	$.ajax({
	// 		url: '/e/extend/tui_zhiyin/index.php',
	// 		type: 'post',
	// 		dataType: 'html',
	// 		data: {'titidData': data},
	// 	})
	// 	.done(function(msg) {
	// 		console.log("success");
	// 		console.log(data: {'titidData': data});
	// 		console.log(msg);
	// 	})
	// 	.fail(function(msg) {
	// 		console.log("error");
	// 		console.log(data: {'titidData': data});
	// 		console.log(msg);
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});
		
	// }