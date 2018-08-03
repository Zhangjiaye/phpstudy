<?php
session_start();
//登录处理
header("Content-type:text/html;charset=utf-8");    //设置编码
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if (isset($_SESSION['type'])&&$_SESSION['type']=='管理员') {
	//加入用户名密码
	$pwd=trim($_POST["userpwd"]);//移除字符串两侧空格
	$newpwd=md5(trim($_POST["new"]));
	$code=trim($_POST["code"]);
	if ($pwd ==""||$newpwd==""||$code=="") {
		 echo "<script>history.go(-1);</script>";
	}
	else if($code!=$_SESSION["var_code"]){
		echo "<script>alert('验证码不正确');history.go(-1);</script>";
	}//当用户名密码验证码不为空，则可以连接数据库//判断输入是否与数据库内的相同
	else {
		include("connect.php");
		$sql="update admin set userpwd='$newpwd' ";
		$result=mysqli_query($conn,$sql);
		echo "<script>alert('修改成功');window.location.href='1-1.php';</script>";
		
			
		
	mysqli_close($conn);
	}
}
	else
		echo "<script>alert('提交未成功');window.location.href='login.php';</script>";
?>
