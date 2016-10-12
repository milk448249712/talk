<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<body>
<?php
    if($_GET["str_to"]!="") {
        echo $_SESSION['user']." talk to ".$_GET["str_to"];
    }
    else {
        echo 'nothing...';
        exit('relogin plz...');
    }
    if($_POST['input']!="") {
        // echo $_POST['input'];
        write_to($_POST['input']);
    }
?>
    <form method="post">
    <input type="text" name="input"></input>
    <input type="submit" name="submit" value="发送"></input>
    </form>
</body>
</html>
<?php
    function write_to($sentence){
        echo 'you say: '.$sentence;
    }
    function read_from(){
        // maybe callback function
        echo 'do some read thing.';
    }
?>
