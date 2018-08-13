<!DOCTYPE html >
<html lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href ="bootstrap.min.css" >
<title>投票</title>
</head>
 
<body>
<h1>投票系统</h1>
<div class="container">

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
			echo "<h2>投票 '$i'：<a href='vote.php?id=".$row['id']."' >".$row['title']."</a></h2><br>";
		}
		mysqli_close($conn);
	// }
	?>

	<div>
		<br>
		<br>
		<br>
		<div><a class="btn btn-primary btn-lg" href="creatvote.html">创建你的投票</a></div>
	</div>
</div>	
</body>
</html>
