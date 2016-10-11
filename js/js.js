$(document).ready(function(){
	picScroll();
	function picScroll(){
		var aimgzoom = $("#imgzoom");
		var smallImgListWidth;
		var imgNum=$(".smallImgList li").length;
		var imgWidth=$(".smallImgList li").outerWidth();
		smallImgListWidth=imgNum*imgWidth;
		var sun=(smallImgListWidth-imgWidth*5)/376;
		var i=0;
		var timer;
		var popupLayer={
			showLayer:function(){
				var offset=$("#bigImgContent").offset();
				var offsetTop=offset.top;
				var popupHeight=$(".popup-layer").height();
				var bigHeight=$("#bigImgContent").height();
				$(".popup-layer").css("display","block").animate({
					  top:offsetTop+(bigHeight/2-popupHeight/2)+"px"
				},500);
			},
			hideLayer:function(){
				$(".popup-layer").css("display","none").animate({
					  top:"0"
				},500);
			}
		};
		$(".layer-close").click(function(){
			popupLayer.hideLayer();
		});
		//预加载第一张图片
		var f_picSrc=$(".smallImgList li").eq(0).find("a").attr("rel");
		var f_img="<img src="+f_picSrc+"  alt=\"\" />";
		$("#aimgcon").html(f_img);
		aimgzoom.attr("href",f_picSrc);
		//设置图片外框的宽度
		$(".smallImgList").css("width",smallImgListWidth+"px");
		
		//点击小图
		$(".smallImgList li").each(function(index){
			$(this).find("a").click(function(){
			   clearInterval(timer);
			   popupLayer.hideLayer();
			   $("#slideVideo").text("幻灯播放");
			   $(this).parent("div").parent("li").siblings('li').removeClass("thisimg").end().addClass("thisimg");
			   i=index;
			   loadPic();
			   smallPicBgRun();
				return false;
			});
			
		});
		//点击向左的按钮，下一张
		$(".nextPic,.img-next").click(function(){
			clearInterval(timer);
			$("#slideVideo").text("幻灯播放");
			if (!$(".smallPicBg,.smallImgList").is(":animated")) {
			  if(i>=0&&i<(imgNum-1)){
				  i++;
				  loadPic();
				  smallPicBgRun();
				  //i++;
			  }else if(i==(imgNum-1)){
				  popupLayer.showLayer();
				  return false;
			  }
			}
			return false;
		});
		//点击向右的按钮，上一张
		$(".prevPic,.img-prev").click(function(){
			popupLayer.hideLayer();
			clearInterval(timer);
			$("#slideVideo").text("幻灯播放");
			if (!$(".smallPicBg,.smallImgList").is(":animated")) {
			  if(i>0&&i<=(imgNum-1)){
				  i--;
				  loadPic();
				  smallPicBgRun();
			  }else if(i==0){
				  return false;
			  }
		   }
		   return false;
		});
		/*$("a.imgzoom").click(function(){
			$("#aimgcon").trigger('click');	
		});*/
		//点击幻灯片播放图像
		$("#slideVideo").click(function(){
			if($(this).text()=="幻灯播放"){
				if(i==(imgNum-1)){			
					popupLayer.showLayer();
					return false;
				}
				else{
					$(this).text("停止播放");
					timer = setInterval(function(){
					   i++;
					   loadPic();
					   smallPicBgRun();
					   //有个小BUG，暂时没解决，但是出现的概率很小
					   if(i>=(imgNum-1)){
						   clearInterval(timer);
						   setTimeout(function(){
							   popupLayer.showLayer();
						   },4000)			   
						   return false;
					   }
					} , 3000)
			   }
			}else{
				clearInterval(timer);
				popupLayer.hideLayer();
				$(this).text("幻灯播放");
			}			
		});
		scrollButton();
		
		//图片加载和切换函数
		function loadPic(){
			var picSrc=$(".smallImgList li").eq(i).find("a").attr("rel");
			var info=$(".smallImgList li").eq(i).find("a").attr("info");
			var pic="<img src="+picSrc+"  alt=\"\" />";
			var content=$(".imageDescription");		
			var loading="<span id=\"imgLoading\"><img src=\"images/loading.gif\" width=\"20\" height=\"21\" alt=\"图片加载中\" title=\"图片加载中\" /></span>";
			$("#aimgcon").html(pic);
			aimgzoom.attr("href",picSrc);
			var ld_pic=$("#aimgcon>img");
			ld_pic.hide();
			content.html(info);
			$("#imgLoading").remove();
			$("#imgContent").append(loading);
		   
			ld_pic.load(function() {
			   $("#imgLoading").remove();
			   $(this).fadeIn("slow");
			});
		}
		//小图背景的运动;
		function smallPicBgRun(){
			var bg=$(".smallPicBg");
			var ul=$(".smallImgList");
			bg.show();
			//当图片还在第一张和第二张的时候，背景移动
			if(i<=2){
				bg.animate({ left: (imgWidth*i+4)+ "px" }, 500);
				ul.animate({ left: 0}, 500);
				$("#scrollButton").animate({ left: 0 }, 500);
			}else if(i>=3&&i<=(imgNum-3)){//当图片在第三张与倒数第三张之间的时候，缩略图移动
				bg.css("left","228px");
				ul.animate({ left: -(imgWidth*(i-2))+ "px" }, 500);
				//当缩略图移动的时候，滚动条也移动
				$("#scrollButton").animate({ left: (imgWidth*(i-2))/sun+ "px" }, 500);
			}else if(i>(imgNum-3)&&i<imgNum){//当图片在倒数第三张之后的时候背景移动
				bg.animate({ left: (imgWidth*(i-(imgNum-5))+4)+ "px" }, 500);
				ul.css({ left: -(smallImgListWidth-5*imgWidth)+ "px" });
			}
		}
		
		//模拟滚动条
		function scrollButton(){
		   var button=$("#scrollButton");
		   var top,left,move=false;	
		   button.click(function(){
		   }).mousedown(function(e){
			  clearInterval(timer);
			  $("#slideVideo").text("幻灯播放");
			  left=e.pageX-parseInt(button.css("left"));
			  button.fadeTo(50, 0.5);
			  move=true;
		   }).mouseup(function(){
			  button.fadeTo(50, 1.0);
		   });
		   $(document).mousemove(function(e){
			  if(move){
			  var x= e.pageX-left;
			  var scrollLength=-x*sun;
			  if(x>=0&&x<=376&&imgNum>5){
				 button.css({"left":x+"px"});	
				 $(".smallPicBg").hide();
				 $(".smallImgList").animate({ left: scrollLength + "px" },0);		 
			  }
			  else{
				  return false;
			  }
			}
		   }).mouseup(function(){
			  move=false;
		   }).click(function(){
			  button.fadeTo(50, 1.0);
		   });
	   }
	   //键盘事件
	   $(document).keydown(function(event){
		  switch(event.keyCode) {
			  case 39:
				 clearInterval(timer);
				  $("#slideVideo").text("幻灯播放");
				  if (!$(".smallPicBg,.smallImgList").is(":animated")) {
					if(i>=0&&i<(imgNum-1)){
						i++;
						loadPic();
						smallPicBgRun();
					}else if(i==(imgNum-1)){
						popupLayer.showLayer();
						return false;
					}
				  }
				 break;
			  case 37:
				  clearInterval(timer);
				  popupLayer.hideLayer();
				  $("#slideVideo").text("幻灯播放");
				  if (!$(".smallPicBg,.smallImgList").is(":animated")) {
					if(i>0&&i<=(imgNum-1)){
						i--;
						loadPic();
						smallPicBgRun();
					}else if(i==0){
						return false;
					}
				 }
				 break;
			  default:
				 //return false;
		  }
	   }); 
}

});
