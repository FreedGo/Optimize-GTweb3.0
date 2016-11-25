<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<title>Title</title>
	<style>
		.f-l-l{
			float: left;
		}
		.qinhang-add{
			display: inline-block;
			margin-bottom: 20px;
		}
		.qh-look {
			width: 50px;
			display: inline-block;
		}
		.qh-delete{
			color: #f00;
			width: 50px;
			display: inline-block;
		}
		#address{
			display: block;
			width:100%;
		}
		.table{
			background-color: #f7f7f7;
		}
		.mainBrand .form-group{
			width:100%;
		}
		.sub-data{
			margin-bottom: 40px;
		}
		@media (min-width: 1200px){
			.container {
				width: 95%;
			}
		}
		@media (min-width: 768px){
			.form-inline .form-control{
				width: 100%;
			}
		}


		/*本例css 从这个地方开始复制*/
		/*reset*/
		#sjld html{ overflow:hidden; background:#fff; width:100%; height:100%;}
		#sjld html,
		#sjld body,
		#sjld div,
		#sjld dd,
		#sjld ul,
		#sjld ol,
		#sjld li,
		#sjld input,
		#sjld p,
		#sjld th,
		#sjld td {
			margin:0;padding:0;
			-webkit-box-sizing: content-box;
			-moz-box-sizing: content-box;
			box-sizing: content-box;}
		#sjld body{font-family: "微软雅黑"; font-size:12px; color:#000000; background:#fff;overflow:hidden; width:100%; height:100%;}
		#sjld button,input,select,textarea{ font:12px/1.5  Arial, "宋体", Helvetica,  Verdana, sans-serif; word-wrap:break-word; color:#565756;}
		#sjld ul,li{ list-style:none; margin:0; padding:0;}
		#sjld h1, h2, h3, h4, h5, h6{font-weight:normal; font-size:100%;}
		#sjld img{ border:none; border:0; vertical-align:middle;}
		#sjld a{ text-decoration:none; outline:none;}
		#sjld p{ margin:0; padding:0;
			text-align: center;}
		#sjld input,select,textarea{vertical-align:middle; *font-size:100%;}
		#sjld input{ margin:0;outline:none; padding:0;}
		#sjld input::-ms-clear{display:none;}
		.clearfix:after{
			content:".";
			display:block;
			height:0;
			clear:both;
			visibility:hidden;
		}
		.clearfix{*zoom:1}
		/*reset*/

		ul,li{ list-style:none; margin:0; padding:0;}
		#sjld{width:364px;position:relative;z-index:999;margin-left:20px;
			float: left;}
		#sjld .m_zlxg{ width:106px; height:38px; line-height:38px;cursor:pointer;float:left;margin:0 10px 0 0;display:inline;border:#cb7047 solid 1px;}
		#sjld .m_zlxg p{ width:71px; padding-left:10px; overflow:hidden; line-height:38px; color:#333333; font-size:12px; font-family:"微软雅黑";text-overflow:ellipsis; white-space:nowrap;}
		#sjld .m_zlxg2{ position:absolute;z-index:999; border:1px solid #cb7047;background:#fff; width:91px; display:none;  }
		#sjld .m_zlxg1{ border:1px solid #cb7047; width:227px;padding-left:70px; display:block; height:280px;background: url(http://www.greattone.net/images/sanjiliandong.png) 0 0 no-repeat;display: none; }
		#sjld .m_zlxg2 li{line-height:28px;white-space:nowrap; padding-left:10px;font-family:"微软雅黑";color:#333333; font-size:14px;}
		#sjld .m_zlxg2 li:hover{ color:#7a5a21;}
		#sjld .m_zlxg1>ul{position: relative;height:300px;width:227px;}
		#sjld .m_zlxg1>ul>li{position: absolute;}
		/*控制第三级县不至于过长无法选择*/
		#sjld .m_zlxg2>ul{
			max-height:400px;
			overflow-x: hidden;
		}
		.aa{top:0;}
		.bb{top:26px;}
		.a2,.a6,.h2,.h6,.s2,.s5,.t2,.t5{left:50px;}
		.a3,.a7,.h3,.h7,.s3,.s6,.t3,.t6{left:100px;}
		.a4,.a8,.h4,.h8,.s4,.s8,.t4,.t8{left:150px;}
		.hh{
			top:56px;
		}

		.ii{top:82px;}
		.jj{top:108px;}
		.ss{top:138px;}
		.ll{top:164px;}
		.tt{top:194px;}
		.zz{top:220px;}
		.yy{top:246px;}
		/*本例css 结束*/
		.qh-name,.qh-chaxun{
			height: 40px;
			display: inline-block;
		}
		.essential-info{
			min-height:600px;
		}

	</style>
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<script type="text/javascript" src="http://www.greattone.net/js/adress.js"></script>
</head>
<body>
<div class="container" id="qhMsg">
	<h1 class="pageName text-center">琴行注册查询</h1>
	<div class="table-warp essential-info table-responsive">
		<h2>一.基本信息</h2>
		<div class=" qinhang-add">
			<div id="sjld" class="clearfix" >
				<div class="m_zlxg" id="shenfen">
					<p  title="">选择地区</p>
					<div class="m_zlxg2 m_zlxg1">
						<ul>
							<li class="aa a1">北京</li>
							<li class="ss s1">上海</li>
							<li class="tt t1">天津</li>
							<li class="bb a8">重庆</li>
							<li class="tt t2">四川</li>
							<li class="aa a4">贵州</li>
							<li class="tt t3">云南</li>
							<li class="tt t4">西藏</li>
							<li class="hh hh1">河南</li>
							<li class="hh h4">湖北</li>
							<li class="hh h3">湖南</li>
							<li class="bb a5">广东</li>
							<li class="bb a6">广西</li>
							<li class="ll s8">陕西</li>
							<li class="bb a7">甘肃</li>
							<li class="ll s5">青海</li>
							<li class="ll s6">宁夏</li>
							<li class="zz t5">新疆</li>
							<li class="hh h2">河北</li>
							<li class="ss s3">山西</li>
							<li class="ss s4">内蒙古</li>
							<li class="ii h5">江苏</li>
							<li class="zz t6">浙江</li>
							<li class="aa a2">安徽</li>
							<li class="aa a3">福建</li>
							<li class="ii h8">江西</li>
							<li class="ss s2">山东</li>
							<li class="ll s7">辽宁</li>
							<li class="ii h7">吉林</li>
							<li class="ii h6">黑龙江</li>
							<li class="jj h9">海南</li>
							<li class="zz t7">台湾</li>
							<li class="zz t8">香港</li>
							<li class="yy t9">澳门</li>
						</ul>
					</div>
				</div>
				<div class="m_zlxg" id="chengshi">
					<p  title="">选择城市</p>
					<div class="m_zlxg2">
						<ul></ul>
					</div>
				</div>
				<div class="m_zlxg" id="quyu">
					<p  title="">选择区县</p>
					<div class="m_zlxg2">
						<ul></ul>
					</div>
				</div>
				<input id="sfdq_num" type="hidden"  />
				<input id="csdq_num" type="hidden"  />
				<input id="sfdq_tj" v-model="addresSheng" type="hidden"  />
				<input id="csdq_tj" v-model="addresShi" type="hidden" />
				<input id="qydq_tj" v-model="addresQu" type="hidden"  />
			</div>
			<script type="text/javascript">
				$(function(){
					$("#sjld").sjld("#shenfen","#chengshi","#quyu");
				});
			</script>
			<div class="col-sm-3">
				<div class="input-group">
					<input type="text"  class="form-control qh-name" placeholder="输入琴行名字">
					<span class="input-group-btn">
			        <button class="btn btn-warning qh-chaxun" type="button">点击查询</button>
			      </span>
				</div>
			</div>
		</div>

		<table class="table  table-bordered">
			<thead>
				<tr>
					<th>琴行名称</th>
					<th>电话</th>
					<th>地址</th>
					<th>注册时间</th>
					<th>注册推荐码</th>
					<th>管理</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="">佳音琴行</a></td>
					<td>XXXXXXXXXX</td>
					<td>地址地址地址地址</td>
					<td>2016-10-10</td>
					<td>推荐码XXXXXXXXXXXXX</td>
					<td>
						<a class="qh-look" href="">查看</a>
					</td>
				</tr>
				<tr>
					<td><a href="">佳音琴行</a></td>
					<td>XXXXXXXXXX</td>
					<td>地址地址地址地址</td>
					<td>2016-10-10</td>
					<td>推荐码XXXXXXXXXXXXX</td>
					<td>
						<a class="qh-look" href="">查看</a>
					</td>
				</tr>
			</tbody>

		</table>

	</div>
</div>
</body>
</html>