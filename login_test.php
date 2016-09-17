<?php
	$name = $_POST["name"];
	$pwd = $_POST["pwd"];
	echo "name:".$name."<br>";   
	echo "pwd:".$pwd."<br>";
	$link_ID=mysql_connect("localhost","miracle");// 链接Mysql服务器
	if ($link_ID) {
		echo 'connected';
	}
	if (mysql_select_db("test")) // 选择数据库
	{
		echo 'select db ok';
	}
	mysql_query("set names 'gbk'");	// 选择编码格式
	if (date_default_timezone_set("Asia/Hong_Kong")) // 设置发言时间格式
	{
		echo 'set time ok!';
	}
	if (1) {
		echo "authorization valid!<br>";
	}
	header("refresh:3; URL='chartroom.php'");
?>
