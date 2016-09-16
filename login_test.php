<?php
	$name = $_POST["name"];
	$pwd = $_POST["pwd"];
	// echo "name:".$name."<br>";   
	// echo "pwd:".$pwd."<br>";
	$link_ID=mysql_connect("localhost","miracle");// 链接Mysql服务器
	if ($link_ID) {
		echo 'connected<br>';
	}
	if (mysql_select_db("test")) // 选择数据库
	{
		echo 'select db ok<br>';
	}
	mysql_query("set names 'gbk'");	// 选择编码格式
	if (date_default_timezone_set("Asia/Hong_Kong")) // 设置发言时间格式
	{
		echo 'set time ok!<br>';
	}
    $query="select * from who_talk where name='$name' and pwd='$pwd'";    // search
    $result = mysql_query($query,$link_ID);
    // echo 'result:'.$result;
    $b_isin = false;
	while($row = mysql_fetch_array($result))
    {
        if ($row['name']==$name and $row['pwd']==$pwd) {
            $b_isin = true;
        }
        else
            $b_isin = false;
    }
    if ($b_isin) {
		echo "authorization valid!<br>";
	    header("refresh:3; URL='chartroom.php'");
    }
    else {
        echo "authorization invalid!<br>";
    }
?>
