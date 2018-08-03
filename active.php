<?php
	 header("Content-type:text/html;charset=utf-8");    //设置编码
	include("connect.php");
	$verify = stripslashes(trim($_GET['verify'])); //stripslashes() 函数删除由 addslashes() 函数添加的反斜杠。get获取参数
	$nowtime = time(); 
	 
	$query = mysqli_query($conn, "select id,token_time from user where status='否' and token='$verify'"); 
	$num=mysqli_num_rows($query);
	if($num){ 
		$row = mysqli_fetch_array($query); 
	    if($nowtime>$row['token_time']){ //激活码有效期24小时内激活有效，重新发送邮件时记得修改
	        echo "您的激活有效期已过，请登录您的帐号重新发送激活邮件."; 
	    }else{ 
	        mysqli_query($conn, "update user set status='是' where id=".$row['id']);       
	        echo "<script>alert('激活成功！');window.location.href='login.php';</script>";
	    } 
	}else{ 
	    echo "验证失败，已失效";     
	} 
mysqli_close($conn);
?>