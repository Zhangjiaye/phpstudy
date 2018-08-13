<?php
	session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<!--以上为仅仅是为了查出voteparent表中投票标题title与投票描述ptext-->
<body>
<form action="votehandle.php" method="get" onsubmit="return check()">
<?php
if(!isset($_SESSION["admin"]))
	echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
else{
	$pid=$_GET['id'];
	include("connect.php");
	$sql="select * from voteparent where id=$pid";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$ptitle=$row["title"];
	$ptext=$row["ptext"];

	echo "<div><h1>$ptitle</h1></div><div><h3>$ptext</h3></div>";
	$result=mysqli_query($conn,"select * from votechildren where parentid='$pid'");
	$num=mysqli_num_rows($result);
	
	for ($i=0; $i <$num ; $i++) { 
		$row=mysqli_fetch_array($result);
		echo "<div><input type='radio' name='opt' value='".$row['id']."' >".$row['ctext']."</div><div><img src='http://localhost:8081/myphp/".$row['img']."' width=100 height=100/></div>";
		echo "投票数：".$row["count"]." ";
	}

	mysqli_close($conn);
}
?>
<div><input type="submit" value="投票" /></div>
<div><a href="voteindex.php">返回</a></div>
</form>


 
</body>
</html>
<script>
function check(){
	return confirm("确定投票？");
}
</script>
