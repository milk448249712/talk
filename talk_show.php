<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
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
                var response = new Object();
                response.name = xmlhttp.responseText;
                var word2 = splitByToken(response,"{","}");
                var word1 = response.name;
                //document.getElementById("clock").innerHTML=word1+word2;
                parseTheWordMain(word1,word2);
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
                //var response = new Object();
                //response.name = xmlhttp.responseText;
                //splitByToken(response,"{","}");
                document.getElementById("clock").innerHTML=response.name;
            }
        }
        var word = document.getElementById("input").value;
        // document.getElementById("tips").innerHTML=word;
        xmlhttp.open("GET","update_talk.php?w="+word,true);
        xmlhttp.send();
        clock();
        // document.getElementById("tips").innerHTML=word;
    }
    function splitByToken(obj,s_chr,e_chr) {
        var index = obj.name.indexOf(s_chr);
        var strParse = obj.name.substr(index+1);
        var strPos = strParse.indexOf(e_chr);
        var strA = strParse.substr(0,strPos);
        var strB = obj.name.substr(obj.name.indexOf(e_chr)+2);
        strB = strB.substr(0,strB.indexOf(e_chr))
        obj.name = strA;
        //obj.name = "123";
        return strB;
    }


function parseTheWordMain(str1,str2) {
    //var str1="[nihao*2017:02:06:10:15:13][nihaohuai*2017:02:06:15:15:20][你好*2017:02:06:14:15:20]";
    var wordArray1 = parseTheWord(str1,"[","\x03","]","i");
    //var str2="[wohao*2017:02:06:09:15:13][wohaohuai212342546*2017:02:06:18:15:20][wohaohao*2017:02:06:14:01:20]";
    var wordArray2 = parseTheWord(str2,"[","\x03","]","o");
    var wordArray = wordArray1.concat(wordArray2);
    // 合并之后一起排序
    // sort
    for(var i = 0; i < wordArray.length; i++) {
        for (var j = 0; j < wordArray.length - 1; j++){
            if (wordArray[j].time.localeCompare(wordArray[j + 1].time) == 1) {   // string a 大于string b
                var tempWord = wordArray[j];
                wordArray[j] = wordArray[j + 1];
                wordArray[j + 1] = tempWord;
            }
        }
    }
    var tab = "<table>";
    for(var i = 0; i < wordArray.length; i++) {
        if (wordArray[i].io == "i") {
            tab += "<tr bgcolor=#FFF8DC><td>"+wordArray[i].word+"</td><td>"+wordArray[i].time+"</td><td></td></tr>"
        } else {
            tab += "<tr bgcolor=#E0FFFF><td></td><td>"+wordArray[i].time+"</td><td align='right'>"+wordArray[i].word+"</td></tr>"
        }
    }
    tab += "</table>";
    document.body.innerHTML="";
    document.write(tab+wordArray.length);
    //return wordArray;
}

function parseTheWord(word,startStr,gapStr,endStr,io){
    var sentencesArray = word.split(endStr);
    var retWordFormat = new Array();
    for(var i = 0; i < sentencesArray.length; i++) {
        if (sentencesArray[i].length <= 0) {
            continue;
        }
        sentencesArray[i] = sentencesArray[i].substr(sentencesArray[i].indexOf(startStr)+1);
        var word = sentencesArray[i].substr(0,sentencesArray[i].indexOf(gapStr));
        var time = sentencesArray[i].substr(sentencesArray[i].indexOf(gapStr)+1);
        var tempWordObj = new WordObj(word,time,io);
        retWordFormat[i] = tempWordObj;
    }
    return retWordFormat;
}

function  WordObj(word,time,io){
    this.word = word;
    this.time= time;
    this.io = io;
}
</script>
