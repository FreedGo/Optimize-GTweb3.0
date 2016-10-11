function yufa(){
art.dialog.open('template/EnewsBq.php',
    {title: '好琴声cms标签语法',lock: true,opacity: 0.5, width: 600, height: 450,cancelVal: '关闭',cancel: true});
}
function biaoqian(){
art.dialog.open('template/MakeBq.php',
    {title: '自动生成标签',lock: true,opacity: 0.5, width: 600, height: 540,cancelVal: '关闭',cancel: true});
}
function admindl(){
art.dialog.open('template/MakeBq.php',
    {title: '自动生成标签',lock: true,opacity: 0.5, width: 600, height: 540,cancelVal: '关闭',cancel: true});
}
//修改网站标题
function peizhi(){
art.dialog.open('SetEnews.php',
    {title: '系统参数设置',lock: true,opacity: 0.2, width: 1000, height: 450});
}
//增加信息
function addnews(){
art.dialog.open('AddInfoChClass.php',
    {title: '增加信息',lock: true,opacity: 0.5, width: 800, height: 540});
}
//单页管理
function danye(){
art.dialog.open('template/ListPage.php',
    {title: '修改单页面',lock: true,opacity: 0.5, width: 800, height: 540});
}
//留言管理
function lygl(){
art.dialog.open('tool/gbook.php',
    {title: '管理留言信息',lock: true,opacity: 0.5, width: 800, height: 540});
}
//反馈管理
function fkgl(){
art.dialog.open('tool/feedback.php',
    {title: '管理反馈信息',lock: true,opacity: 0.5, width: 800, height: 540});
}
//友情链接管理
function flinkgl(){
art.dialog.open('tool/ListLink.php',
    {title: '管理友情链接',lock: true,opacity: 0.5, width: 800, height: 540});
}

//简繁转换
$(function(){
	$.getScript("/js/ecmsshop_fanyi.js");
})