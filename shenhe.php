<?php
session_start();
header("Content-type:text/html;charset=utf-8");    //设置编码
if (isset($_SESSION['type'])&&$_SESSION['type']=='管理员') {
	include("connect.php");
	$id=$_GET['x'];
	$sql="select * from user where id='$id'";
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);//统计执行结果影响行数
	if($num){//匹配成功	
		$row = mysqli_fetch_array($result); 
		if($row['admit']==0){
			$sql="update user set admit=1 where id='$id' ";
			mysqli_query($conn,$sql);
			echo "<script>alert('审核成功！');window.location.href='2-1.php';</script>";
		}
		else
			echo "<script>alert('已审核，请勿重复操作！');window.location.href='2-1.php';</script>";

	}

}
else
	echo "<script>alert('无权限，重新登录！');window.location.href='login.php';</script>";
	
	
	
?>