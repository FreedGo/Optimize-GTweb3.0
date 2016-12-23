<?php
	require("../../../../e/class/connect.php");
	require("../../../../e/class/db_sql.php");
	$link=db_connect();
	$empire=new mysqlquery();
	header("Content-lie_type: text/html; charset=utf-8"); 
	
	$userid=$_POST['userid'];
		if(empty($userid)){
			exit;
		}
		//钢琴
		$sql=$empire->query("select * from {$dbtbpre}ecms_brand where classid=117 and ddid=$userid order by newstime desc limit 20");
		while($r=$empire->fetch($sql))
		{	
		?>
                   					<dt class="show-messages-list-item clearfix">
                                            <!--左侧头像，名字，区域，身份，等级，链接，信息-->
                <?php
                    	$add=$empire->fetch1("select * from phome_enewsmember a left join phome_enewsmemberadd b on a.userid=b.userid where a.userid=$r[userid]");
				?>
                                            <div class="list-item-left listLeft f-l-l">
                                                    <a href="http://www.greattone.net/e/space/?userid=<?=$add[userid]?>">
                                                        <img src="<?=$add[userpic]?>">
                                                        <h3><?=$add[username]?></h3>
                                                        <p class="fromCity"><?=$add[address]?></p>
                                                        <p><em>
                                                        <?php
															if($add[groupid]==1){
																echo $add[putong_shenfen];//普通会员默认爱乐人
															}elseif($add[groupid]==2){
																echo $add[music_star];//音乐之星
															}elseif($add[groupid]==3){
																echo $addr[teacher_type];//音乐老师
															}elseif($add[groupid]==4){
																echo "音乐教室";
															}elseif($add[groupid]==5){
																echo "乐器品牌";
															}
														?>
                                                        </em><span>
                                                        <?php
															if($add[userfen]<=100){
																echo "一级";
															}elseif($add[userfen]<=300){
																 echo "二级";
															}elseif($add[userfen]<=800){
																 echo "三级";
															}elseif($add[userfen]<=2000){
																 echo "四级";
															}elseif($add[userfen]<=5000){
																 echo "五级";
															}elseif($add[userfen]<=15000){
																 echo "六级";
															}elseif($add[userfen]<=50000){
																 echo "七级";
															}elseif($add[userfen]>100000){
																 echo "八级";
															}else{
																echo "八级";
															}
                                                        ?>
                                                        </span></p>
                                                    </a>
                                            </div>
                                            
                                            <!--右侧留言及回复信息-->
                                            <div class="list-item-right f-l-l">
                                                <div class="cell-message-title clearfix">
                                                    <span class="commom-list-dec f-l-l">留言主题：</span>
                                                    <h3 class="commom-list-text f-l-l"><?=$r[title]?></h3>
                                                </div>
                                                <div class="cell-message-name clearfix">
                                                    <span class="commom-list-dec f-l-l">留言时间：</span>
                                                    <h3 class="commom-list-text f-l-l"><?=$r[newspath]?></h3>
                                                </div>
                                                <div class="cell-message-body clearfix">
                                                    <span class="commom-list-dec f-l-l">留言内容：</span>
                                                    <p class="commom-list-text f-l-l"><?=$r[text]?></p>
                                                </div>
                                                <div class="cell-message-reply clearfix">
                                                    <span class="commom-list-dec f-l-l"><?php if(!empty($r[reply])){echo "回复内容：";}?></span>
                                                    <p class="commom-list-text f-l-l"><?=$r[reply]?></p>
                                                </div>
                                            </div>
                                        </dt>
		<?	
		}
		?>