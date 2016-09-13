<?php
if(!isset($_COOKIE["nick"])) {
	echo "please login at first!<br>";
	exit;
}
session_start();
if (!isset($_SESSION['the_talk'])) {
	echo 'session no set' ;
	ob_start();
	// session_start();
	$_SESSION['the_talk'] = 1;
}
else {
	$_SESSION['the_talk'] = $_SESSION['the_talk'] + 1;
}
//error_reporting(0); //容错语句
$link_ID=mysql_connect("localhost","miracle");//链接Mysql服务器
if ($link_ID) {
	echo 'connected';
}
if (mysql_select_db("test")) //选择数据库
{
	echo 'select db ok';
}
mysql_query("set names 'gbk'");//选择编码格式
if (date_default_timezone_set("Asia/Hong_Kong")) //设置发言时间格式
{
	echo 'set time ok!';
}
?>