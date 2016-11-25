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
	<h1 class="pageName text-center">琴行注册标准</h1>
	<form action="" class="form-inline" role="form" method="post">
		<div class="table-warp essential-info table-responsive">
			<h2>一.基本信息</h2>
			<div class="row qinhang-add">
				<div id="sjld" class="clearfix" >
					<div class="m_zlxg" id="shenfen">
						<p  title="">{{addresSheng}}</p>
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
						<p  title="">{{addresShi}}</p>
						<div class="m_zlxg2">
							<ul></ul>
						</div>
					</div>
					<div class="m_zlxg" id="quyu">
						<p  title="">{{addresQu}}</p>
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
				<div class="col-sm-5">
					<div class="input-group">
						<input type="text" v-model="qhTitle" class="form-control">
						<span class="input-group-btn">
				        <button class="btn btn-default" type="button">琴行资料表</button>
				      </span>
					</div>
				</div>
			</div>

			<table class="table  table-bordered">
					<tr>
						<td>客户名称</td>
						<td colspan="2">
							<div class="form-group">
								<input type="text" class="form-control" v-model="adminName" id="adminName" required>
							</div>
						</td>
						<td>公司电话</td>
						<td colspan="2">
							<div class="form-group">
								<input type="text" class="form-control" v-model="phoneNumber" id="phoneNumber" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>琴行类型</td>
						<td colspan="5">
							<label class="radio-inline">
								<input type="radio" id="inlineCheckbox1" name="type" v-model="qhType" value="急功近利型">急功近利型
							</label>
							<label class="radio-inline">
								<input type="radio" id="inlineCheckbox2" name="type" v-model="qhType" value="传统销售型">传统销售型
							</label>
							<label class="radio-inline">
								<input type="radio" id="inlineCheckbox3" name="type" v-model="qhType" value="长远规划型">长远规划型
							</label>
							<label class="radio-inline">
								<input type="radio" id="inlineCheckbox3" name="type" v-model="qhType" value="行业新鲜人">行业新鲜人
							</label>
						</td>
					</tr>
					<tr>
						<td>公司地址</td>
						<td colspan="5">
							<div class="form-group col-sm-10">
								<input type="text" class="form-control" v-model="address" id="address" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>注册教室时间</td>
						<td colspan="2">
							<div class="form-group">
								<input type="text" class="form-control" v-model="registerTime" id="registerTime" required>
							</div>
						</td>
						<td>推荐码</td>
						<td colspan="2">
							<div class="form-group">
<!--								<input type="text" class="form-control" v-model="registerNum" id="registerNum" required>-->
								<select v-model="registerNum" class="form-control">
									<option v-for="option in options" v-bind:value="option.value">
										{{ option.text }}
									</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td rowspan="4">客户主要负责人</td>
						<td>姓名</td>
						<td>职位</td>
						<td>手机</td>
						<td>年龄</td>
						<td>性格描述</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin1Name" id="admin1Name" required>
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin1Work" id="admin1Work" required>
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin1Num" id="admin1Num" required>
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin1Age" id="admin1Age" required>
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin1Type" id="admin1Type" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin2Name" id="admin2Name" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin2Work" id="admin2Work" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin2Num" id="admin2Num" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin2Age" id="admin2Age" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin2Type" id="admin2Type" >
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin3Name" id="admin3Name" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin3Work" id="admin3Work" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin3Num" id="admin3Num" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin3Age" id="admin3Age" >
							</div>
						</td>
						<td>
							<div class="form-group">

								<input type="text" class="form-control" v-model="admin3Type" id="admin3Type" required>
							</div>
						</td>
					</tr>
				</table>

		</div>

		<div class="table-warp customer-statu table-responsive">
			<h2>二.客户状况</h2>
			<table class="table table-bordered">
				<tr>
					<td>开业年数</td>
					<td >
						<div class="form-group">

							<input type="text" class="form-control" v-model="qhAge" id="qhAge" required>
						</div>
					</td>
					<td>地理位置</td>
					<td >
						<label class="radio-inline">
							<input type="radio" id="inlineCheckbox1" name="qhArea" v-model="qhArea" value="商业区">商业区
						</label>
						<label class="radio-inline">
							<input type="radio" id="inlineCheckbox2" name="qhArea" v-model="qhArea" value="商场">商场
						</label>
						<label class="radio-inline">
							<input type="radio" id="inlineCheckbox3" name="qhArea" v-model="qhArea" value="社区">社区
						</label>
					</td>
				</tr>
				<tr>
					<td>店面数量</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="qhNums" id="qhNums" required>
						</div>
					</td>
					<td>琴房总数</td>
					<td >
						<div class="form-group">

							<input type="text" class="form-control" v-model="qfNums" id="qfNums" required>
						</div>
					</td>
				</tr>
				<tr>
					<td rowspan="5">主要品牌</td>
					<td>产品</td>
					<td>品牌</td>
					<td>年销量</td>
				</tr>
				<tr class="mainBrand">
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="product1" id="product1" required>
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="brand1" id="brand1" required>
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="sales1" id="sales1" required>
						</div>
					</td>
				</tr>
				<tr class="mainBrand">
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="product2" id="product2">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="brand2" id="brand2">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="sales2" id="sales2">
						</div>
					</td>
				</tr>
				<tr class="mainBrand">
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="product3" id="product3">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="brand3" id="brand3">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="sales3" id="sales3">
						</div>
					</td>
				</tr>
				<tr class="mainBrand">
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="product4" id="product4">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="brand4" id="brand4">
						</div>
					</td>
					<td>
						<div class="form-group">

							<input type="text" class="form-control" v-model="sales4" id="sales4">
						</div>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-primary btn-lg btn-block sub-data">确认并提交</button>
		</div>



	</form>
</div>
</body>
<script>
	var app = new Vue({
		el: '#qhMsg',
		data: {
			addresSheng:'选择省份',                        //琴行基本信息XX省
			addresShi: '选择城市',                       //琴行基本信息XX市
			addresQu: '选择区域',                        //琴行基本信息XX县
			qhTitle: '佳音琴行',                          //琴行基本信息琴行名称
			qhType:'急功近利型',                         //琴行类型
			adminName:'张三',                         //客户名称
			phoneNumber:'021-5888888',                  //公司电话
			address:'上海市松江区XXXXX',                  //公司地址
			registerTime:'2016-10-10',                  //注册教室时间
			registerNum:'5235448524',                   //推荐码
			options: [
				{ text: '5235448522', value: '5235448522' },
				{ text: '5235448524', value: '5235448524' },
				{ text: '5235448526', value: '5235448526' }
			],                                             //推荐码选择框内部的option,即所以的推荐码
			admin1Name:'负责人1',                          //主要负责人姓名1
			admin1Work:'经理',                            //主要负责人职位1
			admin1Num:'158XXXXX',                       //主要负责人手机号1
			admin1Age:'28',                             //主要负责人年龄1
			admin1Type:'稳重',                            //主要负责人性格1
			admin2Name:'负责人2',                          //主要负责人姓名2
			admin2Work:'经理',                            //主要负责人职位2
			admin2Num:'158XXXXX',                       //主要负责人手机号2
			admin2Age:'38',                             //主要负责人年龄2
			admin2Type:'稳重',                            //主要负责人性格2
			admin3Name:'负责人3',                          //主要负责人姓名3
			admin3Work:'经理',                            //主要负责人职位3
			admin3Num:'158XXXXX',                           //主要负责人手机号3
			admin3Age:'48',                                 //主要负责人年龄3
			admin3Type:'稳重',                            //主要负责人性格3
			qhAge:'10',                             //琴行开业年数
			qhArea:'社区',                            //琴行地理位置
			qhNums:'1',                             //琴行店面数量
			qfNums:'10',                            //琴行琴房数量
			product1:'钢琴',                          //主要品牌产品1
			brand1:'法兰山德',                       //主要品牌1
			sales1:'50台',                           //年销量1
			product2:'提琴',                          //主要品牌产品2
			brand2:'雅马哈',                       //主要品牌2
			sales2:'50台',                           //年销量2
			product3:'吉他',                          //主要品牌产品3
			brand3:'法兰山德',                       //主要品牌3
			sales3:'50台',                           //年销量3
			product4:'钢琴',                          //主要品牌产品4
			brand4:'法兰山德',                       //主要品牌4
			sales4:'50台'                           //年销量4

		}
	})
</script>
</html>