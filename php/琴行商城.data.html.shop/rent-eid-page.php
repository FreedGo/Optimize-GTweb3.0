<?php
require('../../../class/connect.php'); //引入数据库配置文件和公共函数文件 
require('../../../class/db_sql.php'); //引入数据库操作文件 
$link=db_connect(); //连接MYSQL 
$empire=new mysqlquery(); //声明数据库操作类</p> <p>db_close(); //关闭MYSQL链接 

$id=$_GET['id'];

$classid=$_GET['classid'];
$classid=59;
//$userid=$_GET['userid'];

$b=$empire->fetch1("select * from phome_ecms_shop where id='$id' and classid='$classid'");

$empire=null; //注消操作类变量 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>租赁修改</title>
	<link rel="stylesheet" type="text/css" href="/css/xin_base.css">
	<link rel="stylesheet" type="text/css" href="/css/xin_gerenzhongxin.css">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var fa = $(window.parent.document.getElementById("rent-edi-trigger")),
				fb = $('#rent-page-sub');
				fb.click(function(event) {

					fa.trigger('click');
					alert('修改成功');
				});
		});
	</script>
</head>
<body>
<div class="www360buy">
	<div class="bd">
		<form name="add" method="POST" class="xiu_ke" enctype="multipart/form-data" action="/e/zulin/ecms.php"><!--/e/xiu/kecheng.php-->
			<input type=hidden value=MEditInfo name=enews> <input type=hidden value= name=classid> 
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="classid" value="<?=$classid?>">
			<input type="hidden" name="userid" value="<?=$userid?>">
			<input type="hidden" name="ecmsfrom" value="/e/zulin/ListInfo.php?mid=10">
				<ul class="lh dengdai fabukecheng">
						<li><h2 style="text-align: center;">琴房租赁修改</h2></li>
						<li><span>琴房名称：</span><input required type="text" name="title" value="<?=$b[title]?>"></li>
						<li><span>联系电话：</span><input required type="text" name="pbrand" value="<?=$b[pbrand]?>"></li>
						<li><span>琴房价格：</span><input required type="text" name="price" placeholder="元/天" value="<?=$b[price]?>"></li>
						<li><span>人数上限：</span><input required type="text" name="pmaxnum" value="<?=$b[pmaxnum]?>"></li>
                        <li>
							<span>上传图片：</span>
                            <!--<input type="file" name="titlepicfile" size="45">-->
                            <!--<div class="xiu_photo"><img src="<?=$b[titlepic]?>"></div>-->
                            <script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
                  			<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
                            <!--<input type="file" name="titlepicfile" size="45">-->
                            <script id="upload_ue" name="content" type="text/plain">
						       
						    </script>
						    <input type="hidden" id="picture" name="titlepic" value="">
							<div class="imgPre" style="float: left;width:200px;border-radius: 3px;overflow: hidden; ">
								<img id="preview" src="<?=$b[titlepic]?>" alt=""></div>
							<a  class="datepicker lookBtn2" style="float: left;margin-left: 20px;cursor: pointer;color: #fff!important;padding: 5px 10px;background-color: #cb7047;border-radius: 3px;" onclick="upImage()">上传图片</a>
							<script type="text/javascript">
								var _editor = UE.getEditor('upload_ue');
				                _editor.ready(function () {
				                     //设置编辑器不可用
				                    //_editor.setDisabled();  这个地方要注意 一定要屏蔽
				                    //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
				                    _editor.hide();
				                       
				                    //侦听图片上传
				                    _editor.addListener('beforeinsertimage', function (t, arg) {
				                   
				                        //将地址赋值给相应的input,只去第一张图片的路径
				                       
				                        var imgs;
				                        for(var a in arg){
				                            imgs +=arg[a].src+',';
				                        }
				                   
				                         $("#picture").attr("value", arg[0].src);
				                        //图片预览
				                         $("#preview").attr("src", arg[0].src);
				                    })
				                   
				                 });
				                //弹出图片上传的对话框
				                function upImage() {
				                     var myImage = _editor.getDialog("insertimage");
				                     myImage.open();
				                }
							</script>
						</li>
						<li>
							<span>琴房描述：</span>
							<!-- 预留的地div -->
							<div style='background-color:#D0D0D0' class="qinmiao">
						<!--<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>  
								<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>  -->
								<link rel="stylesheet" href="/e/data/ecmseditor/ueditor/themes/default/ueditor.css">  
								<script type="text/plain" id="myEditor" name="newstext">  <?=$ecmsfirstpost==1?"":stripSlashes($b[newstext])?>  </script>  
								<script type="text/javascript">  var editor = new baidu.editor.ui.Editor();  editor.render("myEditor");  editor.classid = 59;  editor.filepass = <?=$id?>;  </script>
						</div>
							<!-- 预留的地div -->
						</li>
						<li>
							<li><span></span><input class="zongse" id="rent-page-sub" type="submit"></li>
						</li>
					</ul>
				</form>
			</div>
</div>
				
</body>
</html>