<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投票</title>
</head>
 
<body>
<h1>投票系统</h1>
<?php
// if(!isset($_SESSION["admin"]))
// 	echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
// else{
	include("connect.php");
	$sql="select * from voteparent where shenhe='是' ";
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);
	


	for($i=1;$i<$num+1;$i++){
		$row=mysqli_fetch_array($result);
		echo "投票 '$i'：<a href='vote.php?id=".$row['id']."' >".$row['title']."</a><br>";
	}
	mysqli_close($conn);
// }
?>

<div>
	<div><a href="creatvote.html">创建你的投票</a></div>
</div>
</body>
</html>
