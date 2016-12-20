<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<body>
<!--<p id="clock"><p>-->
<?php
    if($_GET["str_to"]!="") {
        echo $_SESSION['user']." talk to ".$_GET["str_to"];
        $_SESSION['to_who'] = $_GET["str_to"];
        date_default_timezone_set("Asia/Shanghai");
        // echo date("Y-m-d H:i:s");

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
<p id="clock"><p>
    
    <input type="text" name="input" id="input"></input>
    <input type="submit" name="submit" value="发送" onclick="send_back()"></input>
<p id="tips"><p> 
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
        // document.write("<p>My First JavaScript</p>");
        var t=new Date()
        //document.getElementById("clock").innerHTML=t
        setTimeout("clock()",3000)     
        //document.getElementById('txt').value=c
        //window.location.href="update_talk.php?from=<?php$_SESSION['user']?>&to=<?php$_SESSION['to_who']?>>";
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("clock").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","update_talk.php",true);
        xmlhttp.send();
        // document.getElementById("tips").innerHTML="";
    }
    function send_back() {
        // document.write("send");
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("clock").innerHTML=xmlhttp.responseText;
            }
        }
        var word = document.getElementById("input").value;
        // document.getElementById("tips").innerHTML=word;
        xmlhttp.open("GET","update_talk.php?w="+word,true);
        xmlhttp.send();
        clock();
        // document.getElementById("tips").innerHTML=word;
    }
</script>
