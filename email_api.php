<?php
	ini_set('date.timezone','Asia/Shanghai'); //设置时区
	$id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","root","userdb");
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql="select username,email,token from user where id='$id' ";
	$r=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($r);
	if($num){
		$row = mysqli_fetch_array($r); 
		include("sendemail.php");
		if(sendEmail($row['username'],$row['email'],$row['token'])){
			$t=time()+60*60*24;
			$sql="update user set token_time='$t' where id='$id' ";
			$r=mysqli_query($conn,$sql);
			 echo "邮件发送成功，请登录到您的邮箱及时激活您的帐号！";  
			 echo "<a href='login.php'>返回登录</a>"; 
		}else
			echo "发送失败"; 
	}else
		echo "用户不存在"; 
	
	
?>