<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>登录页面</title>
	<link rel="stylesheet" href ="bootstrap.min.css" >
	<script type="text/javascript">
		function checkn(){
			if (myform.username.value=="") {
				alert("请输入用户名");
				myform.username.focus();
				return false;
			}
			else if (myform.userpwd.value=="") {
				alert("请输入密码");
				myform.username.focus();
				return false;
			}
			else if (myform.code.value=="") {
				alert("请输入验证码");
				myform.username.focus();
				return false;
			}
		}
	</script>
	
</head>
<body>
<form class="form-horizontal" action="logincheck.php" method="post" name="myform">
<div class="container">
	<div class="row">
		<h1 class="col-md-4 col-md-offset-3">用户登录</h1>
	</div>


	<div class="form-group">
		<label class="col-md-2 control-label">用户名</label> 
		<div class="col-md-4">
			<input class="form-control" type="text" name="username" id="username" placeholder="请输入用户名">
		</div>
	</div>


	<div class="form-group">
		<label class="col-md-2 control-label">密码</label> 
		<div class="col-md-4">
		<input class="form-control" type="password" name="userpwd" id="userpwd" placeholder="请输入密码">
		</div>
	</div>


	<div class="form-group">
		<label class="col-md-2 control-label">验证码</label> 
		<div class="col-md-4">
			<input class="form-control" type="text" name="code" id="code" placeholder="请输入验证码">
			<img title="看不清" src="img.php" onclick="this.src='img.php?'+Math.random()" style="cursor: pointer;">
		</div>
	</div>
	
	<div class="row">
		<button class="col-md-offset-2 btn btn-default" onclick="checkn()">立即登录</button>
		<a class="col-md-offset-1 btn btn-default" href="register.php">注册</a>
	</div>


	<div>
		<input type="hidden" name="hidden" value="hidden">
	</div>


</div>
</form>
</body>
</html>