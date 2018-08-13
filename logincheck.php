<?php
session_start();
//登录处理
header("Content-type:text/html;charset=utf-8");    //设置编码
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if(isset($_POST["hidden"])&&$_POST["hidden"]=="hidden"){
include("connect.php");
	//加入用户名密码
	$user=mysqli_real_escape_string($conn,trim($_POST["username"]));//移除字符串两侧空格
	$pwd=md5(trim($_POST["userpwd"]));
	$code=trim($_POST["code"]);
	if ($user ==""||$pwd==""||$code=="") {
		 echo "<script>history.go(-1);</script>";
	}
	else if($code!=$_SESSION["var_code"]){
		echo "<script>alert('验证码不正确');history.go(-1);</script>";
	}//当用户名密码验证码不为空，则可以连接数据库//判断输入是否与数据库内的相同
	else {
		// session_unset($_SESSION);
		unset($_SESSION["admin"]);
		unset($_SESSION["type"]);
		unset($_SESSION["id"]);
		
		//$sql="select username,userpwd from user where username='".$user."' and userpwd='".$pwd."'";
		$sql="select * from user where username='$user' and userpwd='$pwd' ";

		$result=mysqli_query($conn,$sql);
		$num=mysqli_num_rows($result);//统计执行结果影响行数
		if($num){//用户名密码匹配成功	
			$row=mysqli_fetch_array($result);
			if ($row['status']=='是') {//状态码为1，已经激活成功	
				if($row['admit']=='是'){//admit为1，表示审核通过
					$_SESSION["admin"]=$user;//登录成功时把用户名放到session中
					echo "<script>alert('登陆成功');window.location.href='voteindex.php';</script>";
				}
				else
					echo "<script>alert('管理员未审核');window.location.href='login.php';</script>";
			}
			else{//状态码为0，还未激活
				$result= mysqli_query($conn, "select id,token_time from user where status='否' and username='$user' ");
				$row = mysqli_fetch_array($result); 
				$nowtime=time();
				// echo "<script>alert('$nowtime:".$row['token_time']."');</script>";	
				// echo "<script>alert('".$row['token_time']."');</script>";	
				if($nowtime>$row['token_time']){//如果未激活时间超过24小时
					// mysqli_query($conn, "delete from user where id=".$row['id']); 
					// echo "<script>alert('账号不存在,请重新注册');history.go(-1);</script>";
					// 需要重新发送邮件
					echo "<a href='email_api.php?id=".$row['id']."' >您还未激活，点击重新激活</a>";
								
				}else
					echo "<script>alert('未激活成功，请前往邮箱激活，24小时有效');history.go(-1);</script>";					
			}


		}else
			echo "<script>alert('用户名或者密码错误');history.go(-1);</script>";
	mysqli_close($conn);
	}
}
	else
		echo "<script>alert('提交未成功');window.location.href='login.php';</script>";
?>
