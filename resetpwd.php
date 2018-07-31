<?php
//点击忘记密码后，发送邮件
//在登录页面设计  忘记密码
//从数据库，根据 用户名  将id,密码,token挑出来
//如果找不到，未注册，否则已注册用户可以修改密码
//

header("Content-type:text/html;charset=utf-8");    //设置编码
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if (isset($_POST["hidden"])&&$_POST["hidden"]=="hidden") {	
$user=trim($_POST["username"]);
$email=trim($_POST["useremail"]);
if($user ==""||$email==""){
	echo "<script>history.go(-1);</script>";
}
else{
		$conn=mysqli_connect("127.0.0.1","zjwdb_6241794","Zjy805950770","zjwdb_6241794");// 创建连接
		//$conn=mysqli_connect("localhost","root","root","userdb");//连接数据库
		if (mysqli_connect_errno($conn)){
			echo "数据库连接失败: " . mysqli_connect_error();
			exit();
			}
			mysqli_set_charset($conn,"utf8");
			$query = mysqli_query($conn, "select token from user where username='".$user."' and email='".$email."' "); 
			$num=mysqli_num_rows($query);
			if($num){
				$row = mysqli_fetch_array($query); 
				// $id=$row['id'];
				//$userpwd=$row['userpwd'];
				$token=$row['token'];


							require_once("PHPMailer/class.phpmailer.php");
							require_once("PHPMailer/class.smtp.php");

							// 实例化PHPMailer核心类
							$mail = new PHPMailer();
							// 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
							$mail->SMTPDebug = 1;
							// 使用smtp鉴权方式发送邮件
							$mail->isSMTP();
							// smtp需要鉴权 这个必须是true
							$mail->SMTPAuth = true;
							// 链接qq域名邮箱的服务器地址
							$mail->Host = 'smtp.qq.com';
							// 设置使用ssl加密方式登录鉴权
							$mail->SMTPSecure = 'ssl';
							// 设置ssl连接smtp服务器的远程服务器端口号
							$mail->Port = 465;
							// 设置发送的邮件的编码
							$mail->CharSet = 'UTF-8';
							// 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
							$mail->FromName = 'Zhangjiaye';
							// smtp登录的账号 QQ邮箱即可
							$mail->Username = '805950770@qq.com';
							// smtp登录的密码 使用生成的授权码
							$mail->Password = 'cehxwhrravpcbejj';
							// 设置发件人邮箱地址 同登录账号
							$mail->From = '805950770@qq.com';
							// 邮件正文是否为html编码 注意此处是一个方法
							$mail->isHTML(true);
							// 设置收件人邮箱地址
							$mail->addAddress("$email");
							// // 添加多个收件人 则多次调用方法即可
							// $mail->addAddress('87654321@163.com');
							// 添加该邮件的主题
							$mail->Subject = '用户密码重置';
							// 添加邮件正文
						// 	$mail->Body ="Welcome!".$user."：请点击链接重置您的密码。<br/> 
						//     <a href='http://localhost:8081/myphp/chongzhi.php?v=".$token."' target= 
						// '_blank'>http://localhost:8081/myphp/chongzhi.php?v=".$token."</a><br/> 
						//     如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
						    $mail->Body ="Hello!".$user."：请点击链接重置您的密码。<br/> 
						    <a href='http://ftp6241794.host714.zhujiwu.me/chongzhi.php?v=".$token."' target= 
						'_blank'>http://ftp6241794.host714.zhujiwu.me/chongzhi.php?v=".$token."</a><br/> 
						    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
							// // 为该邮件添加附件
							// $mail->addAttachment('./example.pdf');
							// 发送邮件 返回状态
							$rs = $mail->send();

						    if($rs==1){
						        echo "恭喜您，提交成功！<br/>请登录到您的邮箱及时重置你的密码！";  
						        echo "<a href='login.php'>返回登录</a>"; 
						    }
						    else{ 
						        echo "发送失败";     
						    } 

			}
			else{
				echo "用户名或者邮箱输入错误";   
			}



	}		

}
else
	echo "<script>alert('未提交成功');history.go(-1);</script>";
?>