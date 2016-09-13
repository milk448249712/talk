<?php require_once('config.php'); ?>
<?php
if (isset($_SESSION['the_talk'])) {
	echo 'set session';
	echo $_SESSION['the_talk'];
}
if($_POST["words"]){
echo $_POST["words"];
$the_word = $_POST["words"];
$query="insert into talk values('$the_word',0,now())";//插入SQL语句
// echo '$query';
if (mysql_query($query,$link_ID)) {
	echo 'inserted!';
} else {
	echo 'insert error!';
}
// header("refresh:0; URL='show.php'"); 
}
?>
<html>
<head>
<title>夏日简单的php+mysql聊天室V.01--显示留言页</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- <meta http-equiv="refresh" content="5;url=show.php"> -->
</head>
<body>
<?php 
	//最新发言显示在最下面
	$sql="select * from talk order by num asc";
	$result=mysql_query($sql);
	$total=mysql_num_rows($result);
	$info=($total/15-1)*15;
	if($total<15){
	$str="select * from talk order by num asc;" ; //查询字符串
	}else{
	$str="select * from talk order by num asc limit $info,15;" ; //查询字符串
	}
 	$result=mysql_query($str,$link_ID); //送出查询
 	while($row=mysql_fetch_array($result)){
?>
<table width="700" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CBB486">
  
  <tr>
    <td width="33" align="left" bgcolor="#F5E6C1" class="font">昵称:</td>
    <td width="41" align="center" bgcolor="#F5E6C1" class="font"><?php if($row[nick] == ""){echo "游客";}else{echo $row[nick];}?></td>
    <td width="42" align="center" bgcolor="#F5E6C1" class="font"><img src="face/PIC<?php echo $row[face];?>.GIF" width="20" height="20"></td>
    <td width="56" align="left" bgcolor="#F5E6C1" class="font">发言内容:</td>
    <td width="160" align="left" bgcolor="#F5E6C1" class="font"><?php echo $row[word];?></td>
    <td width="56" align="left" bgcolor="#F5E6C1" class="font">发言时间:</td>
    <td width="244" align="left" bgcolor="#F5E6C1" class="font"><?php echo $row[talk_date];?></td>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<?php } ?>
</body>
</html>