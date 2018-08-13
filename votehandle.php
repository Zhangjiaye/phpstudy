<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>处理投票</title>
</head>
 
<body>
<?php
if(!isset($_SESSION["admin"]))
	echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
else{
   if (isset($_GET["opt"])) {
	$opt=$_GET["opt"];
	include("connect.php");
	$result=mysqli_query($conn,"update votechildren set count=count+1 where id=".$opt.";");
	
	if ($result) {
		$res=mysqli_query($conn,"select parentid from votechildren where id=".$opt.";");
		  $row =  mysqli_fetch_array($res);
		echo "<script>alert('投票成功');window.location.href='vote.php?id=".$row['parentid']."';</script>";
	}
	mysqli_close($conn);
   }
}
?>

</body>
</html>
