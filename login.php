<html>
<head>
<title>login</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="250" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="30" align="center" bgcolor="#F5E6C1">
	<?php 
	if($_GET["logout"] == "out"){
	$_COOKIE["nick"] = "";
	setcookie ("nick", "", time() - 3600);
	// header("refresh:1; URL='login.php'");
	}
	// echo '_POST:'.$_POST["submit"];
	if($_POST["nick"] or $_POST["nick"]==''){
                if ($_POST["nick"]=='') {
                        echo "Welcome guest!<br />";
                }
                else {
		        $_COOKIE["nick"] = $_POST["nick"];
		        setcookie("nick",$_POST["nick"], time() + 3600); //用cookie记录用户昵称,也可以用SESSION
		        if (!isset($_COOKIE["nick"]))
		                echo "Welcome guest!<br />";
                }
	}
	?>
	
	<?php 
		if($_COOKIE["nick"]){
			echo "欢迎您&nbsp;".$_COOKIE["nick"]."&nbsp;<a href=?logout=out>退出房间</a>";
		} else {
			echo "请输入您的昵称";}
	?></td>
  </tr>
  <tr>
    <td bgcolor="#F5E6C1">
<form action="login.php" method="post" target="rightFrame">
<input type="text" name="nick" cols="20">
<input type="submit" name="submit" value="登录">
</form></td>

  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="250" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  <tr>
    <td height="70" bgcolor="#F5E6C1" class="login">源码学习</td>
  </tr>
</table>
</body>
</html>
