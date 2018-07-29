<?php
session_start();
//注册处理
header("Content-type:text/html;charset=utf-8");    //设置编码
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if (isset($_POST["hidden"])&&$_POST["hidden"]=="hidden") {
	$user=trim($_POST["username"]);//移除字符串两侧空格
	$pwd=md5(trim($_POST["userpwd"]));
	$pwd_confirm=md5(trim($_POST["confirm"]));
	$email=trim($_POST["useremail"]);
	$code=trim($_POST["code"]);
	if ($user==""||$pwd==""||$pwd_confirm==""||$code=="") {
		 echo "<script>history.go(-1);</script>";//可加载历史列表中的某个具体的页面,-1上一个页面
	}
	else if($code!=$_SESSION["var_code"]){
		echo "<script>alert('验证码不正确');history.go(-1);</script>";
		}
	else{
		if ($pwd==$pwd_confirm) {

			//$conn=mysqli_connect("127.0.0.1","zjwdb_6241794","Zjy805950770","zjwdb_6241794");// 创建连接
			$conn=mysqli_connect("localhost","root","root","userdb");//连接数据库
			if (mysqli_connect_errno($conn)){
	    		echo "数据库连接失败: " . mysqli_connect_error();
	    		exit();
			}
			mysqli_set_charset($conn,"utf8");
			$sql="select username from user where username='".$user."'";//判断用户名是否已经存在
			$result=mysqli_query($conn,$sql);
			$num=mysqli_num_rows($result);//统计执行结果影响行数
			if($num){//如果已经存在，非0
				echo "<script>alert('用户名已经存在');history.go(-1);</script>";
			}else{//不存在，注册存入数据库
				//
				$regtime=time();//unix时间戳			
				$token=md5($user.$pwd.$regtime);//创建用于激活码识别$token即构造好的激活识别码，它是由用户名、密码和当前时间组成并md5加密得来的。
				$token_time=time()+60*60*24;//激活码有效期24小时内激活有效
				
				$sql_insert="insert into user (username,userpwd,email,token,token_time,regtime) values('".$user."','".$pwd."','".$email."','".$token."','".$token_time."','".$regtime."')";
				$res_insert=mysqli_query($conn,$sql_insert);
				if($res_insert){
					//echo "<script>alert('注册成功');window.location.href='login.php'</script>";
					//数据库写入成功，要发邮件了
					// 引入PHPMailer的核心文件
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
					$mail->Subject = '用户帐号激活';
					// 添加邮件正文
					$mail->Body ="Welcome!".$user."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
				    <a href='http://localhost:8081/myphp/active.php?verify=".$token."' target= 
				'_blank'>http://localhost:8081/myphp/active.php?verify=".$token."</a><br/> 
				    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
				//     $mail->Body ="Welcome!".$user."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
				//     <a href='http://ftp6241794.host714.zhujiwu.me/active.php?verify=".$token."' target= 
				// '_blank'>http://ftp6241794.host714.zhujiwu.me/active.php?verify=".$token."</a><br/> 
				//     如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
					// // 为该邮件添加附件
					// $mail->addAttachment('./example.pdf');
					// 发送邮件 返回状态
					$rs = $mail->send();

				    if($rs==1){
				        echo "恭喜您，注册申请成功！<br/>请登录到您的邮箱及时激活您的帐号！";  
				        echo "<a href='login.php'>返回登录</a>"; 
				    }
				    else{ 
				        echo "发送失败";     
				    } 
				    			
				}
				else
					echo "<script>alert('注册失败,请稍后尝试');history.go(-1);</script>";
			}

		}
		else{
			echo "<script>alert('密码不一致');history.go(-1);</script>";
		}
	}
}
else{
	echo "<script>alert('未提交成功');history.go(-1);</script>";
}

?>