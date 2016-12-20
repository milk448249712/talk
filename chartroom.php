<?php
    session_start();
    //echo "<embed src="brack_russia.mp3" autostart="true" loop="true" hidden="true"></embed>";
    echo "Talk page!<br>";
    // load friend interface
    // echo $_SESSION['user'];
    require_once("friends.php");
    echo "lei hou ~<br>";
    echo 'get:'.$_GET["str_to"];
?>
<html>
<head>

</head>
<body>
<?php
    $str_to = $_GET["str_to"];
?>
<?php
    echo "<iframe src=\"talk_show.php?str_to=$str_to\" width=\"400\" height=\"200\">";
    echo "</iframe>";
?>
<!--<p>某些老式的浏览器不支持内联框架。</p>
<p>如果不支持，则 iframe 是不可见的。</p>
-->
<embed src="brack_russia.mp3" autostart="true" loop="true" hidden="true"></embed>
</body>
</html>
