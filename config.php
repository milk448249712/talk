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
//error_reporting(0); //�ݴ����
$link_ID=mysql_connect("localhost","miracle");//����Mysql������
if ($link_ID) {
	echo 'connected';
}
if (mysql_select_db("test")) //ѡ�����ݿ�
{
	echo 'select db ok';
}
mysql_query("set names 'gbk'");//ѡ������ʽ
if (date_default_timezone_set("Asia/Hong_Kong")) //���÷���ʱ���ʽ
{
	echo 'set time ok!';
}
?>