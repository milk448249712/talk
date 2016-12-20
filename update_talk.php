<?php
    // echo $_SESSION['user'];
    session_start();
    $response = "";
    $getword = $_GET["w"];
    // echo $response;
    $from_who = $_SESSION["user"];
    $to_who = $_SESSION["to_who"];
    //$from_who = "unnkai";
    //$to_who = "amy";
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
    if ($getword != "") {
        // write to database
        $exc_sql = "insert talk (from_who,to_who,word) values ('$from_who','$to_who','$getword')";
        if (!mysql_query($exc_sql,$up_handle))
        { 
            //die('Error: ' . mysql_error());
        }
    }

    
    $result = mysql_query("select * from talk where from_who='$from_who' and to_who='$to_who' order by talk_date desc limit 8",$up_handle);    // search
    $query_2 = mysql_query("select * from talk where from_who='$to_who' and to_who='$from_who' order by talk_date desc limit 8",$up_handle);
    $wordArray = "$from_who>>>$to_who";
    while($row = mysql_fetch_array($result)) {
        // echo "<p>" . "say:" . $row['word'] . "</p>";
        $wordArray = $wordArray . '[word:'.$row['word']."\x03 date:".$row['talk_date']."]<br>";
    }
    $wordArray2 = "$to_who>$from_who";
    while($row = mysql_fetch_array($query_2)) {
        // echo "<p>" . "say:" . $row['word'] . "</p>";
        $wordArray2 = $wordArray2 . '[word:'.$row['word']."\x03 date:".$row['talk_date']."]<br>";
    }
    $response = $wordArray . $wordArray2;
    mysql_close($up_handle);
    echo $response.$getword;
?>
