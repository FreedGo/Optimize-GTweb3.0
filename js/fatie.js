/*
* @Author: 付云龙 flyxz@126.com
* @Date:   2016-04-03 20:24:20
* @Last Modified by:   付云龙
* @Last Modified time: 2016-04-03 20:25:59
*/

		$(function() {
			if ($('.luntanBan1 h2').html()=='乐迷互动') {
				var idenglu=$('#loginBtn a').html();
				console.log(idenglu);
				if ( idenglu=='登录') {
					$('.loginQian').show();
					$('.loginDown').show();
					$('.close').hide();
				};

			} else{

			};
		});