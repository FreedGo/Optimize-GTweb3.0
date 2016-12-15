<?php
require("../e/class/connect.php");
require("../e/class/db_sql.php");
$link = db_connect();
$empire = new mysqlquery();
header("Content-type: text/html; charset=utf-8");
$typeNum = $_POST['pintype'];

	if($typeNum==1){
		$pintype="钢琴";
	}elseif($typeNum==2){
		$pintype="提琴";
	}elseif($typeNum==3){
		$pintype="吉他";
	}elseif($typeNum==4){
		$pintype="管乐";
	}elseif($typeNum==5){
		$pintype="打击乐";
	}		

$frie_sql = "select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5  and b.aihao like '%$pintype%' and a.cked=1 order by a.registertime desc";

$list = $empire->query($frie_sql);
while ($r = $empire->fetch($list)) {
    ?>
    <li>
        <a href="/e/space/?userid=<?= $r[userid] ?>">
            <img src="<?= $r[userpic] ?>">
            <div class="xingming">
                <span><?= $r[username] ?></span>
                <?php
                if ($r[cked] == 1) {
                ?>
                    <a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng1"></i></a>
                <?php
                }
                ?>
            </div>
        </a>
        <div class="shenfen">
            <p><span class="di_zhi"></span><?= $r[company] ?></p>
        </div>
        <div class="shenfen">
            <p><span class="nianfen"></span><?= $r[chusheng] ?></p>
        </div>
        <div class="guanzhu clearfix">
            <p><span class="telephone_one"></span><?= $r[telephone] ?> <?= $r[mycall] ?></p>
        </div>
        <?
        if ($r[resever_1] == 1) {
        ?>
            <span class="toutiao01"></span>
            <span class="toutiao02"></span>
        <?
        }
        ?>
    </li>
<?
}

$frie_sql = "select * from {$dbtbpre}enewsmember a left join {$dbtbpre}enewsmemberadd b on a.userid=b.userid WHERE a.groupid=5  and b.aihao like '%$pintype%' and a.cked!=1 order by a.registertime desc";

$list = $empire->query($frie_sql);
while ($r = $empire->fetch($list)) {
    ?>
    <li>
        <a href="/e/space/?userid=<?= $r[userid] ?>">
            <img src="<?= $r[userpic] ?>">
            <div class="xingming">
                <span><?= $r[username] ?></span>
                <?php
                if ($r[cked] == 1) {
                ?>
                    <a class="newRen" title="好琴声官方认证"><i class="iconfont newRenZheng newRenZheng1"></i></a>
                <?php
                }
                ?>
            </div>
        </a>
        <div class="shenfen">
            <p><span class="di_zhi"></span><?= $r[company] ?></p>
        </div>
        <div class="shenfen">
            <p><span class="nianfen"></span><?= $r[chusheng] ?></p>
        </div>
        <div class="guanzhu clearfix">
            <p><span class="telephone_one"></span><?= $r[telephone] ?> <?= $r[mycall] ?></p>
        </div>
        <?
        if ($r[resever_1] == 1) {
        ?>
            <span class="toutiao01"></span>
            <span class="toutiao02"></span>
        <?
        }
        ?>
    </li>
<?
}
?>