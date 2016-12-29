<?php
if(!defined('InEmpireCMS'))
{exit();}
?><link rel="stylesheet" type="text/css" href="/css/xin_base.css">     
        <link rel="stylesheet" type="text/css" href="/css/laydate.css">
        <link rel="stylesheet" href="/css/wanshanziliao.css">
        <script type="text/javascript " src="/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/js/adress.js"></script>
        <script type="text/javascript" src="/js/laydate.js"></script>

<div class="wanzhanjiaoshiMsg">
    		
    		<ul>
    			<!--<li>
    				<span class="dataLeft">昵称：</span>
    				<input class="dataRight" type="text" required placeholder="请输入昵称">
    			</li>-->
    			<!--<li>
    				<span class="dataLeft">真实姓名：</span>
    				<input type="text" class="dataRight" placeholder="请输入您的真实姓名">
    			</li>-->
    			<li>
    				<span class="dataLeft">性别：</span>
    				<select class="dataLeftShort" name="sex" id="sex">
    					<option value="男性"<?=$addr[sex]=="男性"||$ecmsfirstpost==1?' selected':''?>>男性</option>
                  		<option value="女性"<?=$addr[sex]=="女性"?' selected':''?>>女性</option>
    				</select>
    			</li>
    			<li>
    				<span class="dataLeft">爱好的乐器：</span>
    				<select class="dataLeftShort" name="aihao" id="aihao">
    					<option value="钢琴"<?=$aihao=="钢琴"?' selected':''?>>钢琴</option>
                        <option value="提琴"<?=$aihao=="提琴"?' selected':''?>>提琴</option>
                        <option value="吉他"<?=$aihao=="吉他"?' selected':''?>>吉他</option>
                        <option value="管乐"<?=$aihao=="管乐"?' selected':''?>>管乐</option>
                        <option value="打击乐"<?=$aihao=="打击乐"?' selected':''?>>打击乐</option>
    				</select>
    			</li>
    			<li>
    				<span class="dataLeft">身份：</span>
    				<select class="dataLeftShort" name="putong_shenfen" id="music_star">
    					<option value="爱乐人"<?=$addr[putong_shenfen]=="爱乐人"||$ecmsfirstpost==1?' selected':''?>>爱乐人</option>
                        <option value="家长"<?=$addr[putong_shenfen]=="家长"?' selected':''?>>家长</option>
                        <option value="习乐人"<?=$addr[putong_shenfen]=="习乐人"?' selected':''?>>习乐人</option>
    				</select>
    			</li>
    			<li>
    				<span class="dataLeft">出生日期：</span>
    				
						
						<input class="laydate-icon dataLeftShort" name="chusheng" id="demo9" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[chusheng]))?>"> 
					
					<script type="text/javascript">
						!function(){
							laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
							laydate({elem: '#demo9'});//绑定元素
						}();
						</script>
    			</li>
    			
    			<li>
    				<span class="dataLeft">城市：</span>
    				<div id="sjld"  class=" clearfix">

						<div class="m_zlxg" id="shenfen">

							<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address]))?></p>
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
							<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address1]))?></p>
							<div class="m_zlxg2">
								<ul></ul>
							</div>
						</div>
						<div class="m_zlxg" id="quyu">
							<p title=""><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[address2]))?></p>
							<div class="m_zlxg2">
								<ul></ul>
							</div>
						</div>

						<input id="sfdq_num" type="hidden" value="" />

						<input id="csdq_num" type="hidden" value="" />

						<input id="sfdq_tj" type="hidden" name="address" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address]))?>" />

						<input id="csdq_tj" type="hidden" name="address1" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address1]))?>" />

						<input id="qydq_tj" type="hidden" name="address2" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[address2]))?>" />

					</div>





					<script type="text/javascript">

					$(function(){
						
						$("#sjld").sjld("#shenfen","#chengshi","#quyu");

					});

					</script>
    			</li>
    			<li>
    				<span class="dataLeft">详细地址：</span>
    				<input type="text" class="dataRight" name="addres" placeholder="准确到街道楼牌号" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[addres]))?>">
    			</li>
    			<li>
    				<span class="dataLeft">自我介绍：</span>
    				<textarea placeholder="请输入您简单的自我评价，不超过100个字" maxlenth="100" name="saytext" class="jiaoshimiaoshu"><?=$saytext?></textarea>
    			</li>
				
    				<input type="radio" id="tili" required checked="checked">
    				<label for="tili">我已经认真阅读<a href="javascript:;">《网站会员注册协议</a>，<a href="javascript:;">《在线签约机构条款》</a>， 并完全同意所有条款。</label>
    			</li>
    			<li>
    				<span class="dataLeft"></span>
    			</li>
    		</ul>
<script type="text/javascript">
    			window.onload = function(){
    				$('#shenfen>p').html($('#sfdq_tj').val());
    				$('#chengshi>p').html($('#csdq_tj').val());
    				$('#quyu>p').html($('#qydq_tj').val());
    			}
    		</script>
    		
    	</div>