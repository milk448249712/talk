<?php
    $up_handle=mysql_connect("localhost","unnkai","qwwqwwqww");// 链接Mysql服务器
    if (!$up_handle) {
        //echo 'connected<br>';
        die('Could not connect: '.mysql_error());
    }
    if (mysql_select_db("test",$up_handle)) // 选择数据库
    {
        die('Could not select test database: '.mysql_error());
    }
    mysql_query("set names 'gbk'");

?>
