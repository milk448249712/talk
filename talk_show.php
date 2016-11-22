<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<body>
<p id="clock"><p>
<?php
    if($_GET["str_to"]!="") {
        echo $_SESSION['user']." talk to ".$_GET["str_to"];
        date_default_timezone_set("Asia/Shanghai");
        echo date("Y-m-d H:i:s");
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
<script language=javascript>
    // var int=self.setInterval("clock()",50)
    clock()
    function clock()
    {
        var t=new Date()
        document.getElementById("clock").innerHTML=t
        setTimeout("clock()",3000)
        // document.getElementById('txt').value=c
        //window.location.href="http://www.baidu.com"; 
        
    }
</script>
