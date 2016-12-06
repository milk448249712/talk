<?php
    echo $_SESSION['user'];
    $response = "up_tset";
    echo $response;
    $from_who = '';
    $to_who = '';
    $up_handle=mysql_connect("localhost","unnkai","qwwqwwqww");// 链接Mysql服务器
    if (!$up_handle) {
        //echo 'connected<br>';
        die('Could not connect: '.mysql_error());
    }
    if (!mysql_select_db("test",$up_handle)) // 选择数据库
    {
        die('Could not select test database: '.mysql_error());
    }
    mysql_query("set names 'gbk'");
    if(!date_default_timezone_set("Asia/Hong_Kong")) {
        die('set time failed!');
    }
    $query_1 = "select word from talk where from_who='$from_who' and to_who='$to_who' order by talk_date dsc top 3";    // search
    $query_2 = "select word from talk where from_who='$to_who' and to_who='$from_who' order by talk_date dsc top 3";
    while($row = mysql_fetch_array($query_1)) {
        echo "<p>" . "say:" . $row['word'] . "</p>";
    }
?>
