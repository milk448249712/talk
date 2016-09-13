<html>
<head>
<title>夏日简单的php+mysql聊天室V.01--发言页</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="2"></td>
  </tr>
</table>
<form action="show.php" method="post" target="mainFrame"><!--  target="mainFrame"-->
&nbsp;&nbsp;发言表情：
<input type="radio" value="1" name="face" checked="checked" />
<img src="face/PIC1.GIF" width="20" height="20" border="0" />
<input type="radio" value="2" name="face" />
<img src="face/PIC2.GIF" width="20" height="20" border="0" />
<input type="radio" value="3" name="face" />
<img src="face/PIC3.GIF" width="20" height="20" border="0" />
<input type="radio" value="4" name="face" />
<img src="face/PIC4.GIF" width="20" height="20" border="0" />
<input type="radio" value="5" name="face" />
<img src="face/PIC5.GIF" width="20" height="20" border="0" />
<input type="radio" value="6" name="face" />
<img src="face/PIC6.GIF" width="20" height="20" border="0" />
<input type="radio" value="7" name="face" />
<img src="face/PIC7.GIF" width="20" height="20" border="0" />							　
<input type="text" name="words" cols="20">
<input type="submit" value="发言">
</form>
<!--<iframe name="iFrame1" style="display:none;">    
</iframe>-->
</body>
</html>