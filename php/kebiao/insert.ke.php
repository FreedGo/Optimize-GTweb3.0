<?php
	//插入课程
	require('../class/connect.php'); //引入数据库配置文件和公共函数文件 
	require('../class/db_sql.php'); //引入数据库操作文件 
	$link=db_connect(); //连接MYSQL 
	$empire=new mysqlquery(); 
	
	$userid=getcvar('mluserid');
	$username =getcvar('mlusername');
	$couname=$_POST['couname'];			//课程名称
	$location=$_POST['location'];		//上课地点
	$classtime=$_POST['classtime'];		//上课日期
	$starttime=$_POST['starttime'];		//开始时间
	$stoptime=$_POST['stoptime'];		//结束时间
	$repeat=$_POST['repeat'];			//循环次数
	$stuname=$_POST['stuname'];			//学生姓名
	$remarks=$_POST['remarks'];			//备注信息
	$timestamp=time();
	//时间
	//$classtime=date('Y-m-d h:i:s',time());
	//订单号
	function build_order_no(){
         return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }
		//exit;
	for($i=0;$i<$repeat;$i++){
	$ddid=build_order_no();
	$class=date("Y-m-d",strtotime("$classtime+$i week"));
		
		$empire->query("INSERT INTO phome_zjk_kebiao_tear (tearid,tearname,stuid,stuname,classtime,ddid,timestamp,location,money,couname,stare,starttime,stoptime,remarks,retype) VALUES ('$userid','$username','0','$stuname','$class','$ddid','$timestamp','$location','0','$couname','111','$starttime','$stoptime','$repeat','1')"); 
	}	
?>