<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>注册页面</title>
	<link rel="stylesheet" href ="bootstrap.min.css" >
	<script type="text/javascript">
		function checkk(){

				var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //正则表达式
    			var obj = document.getElementById("email"); //要验证的对象


			if (myform.username.value=="") {
				alert("请输入用户名");
				myform.username.focus();
				return false;
			}
			if (myform.userpwd.value=="") {
				alert("请输入密码");
				myform.username.focus();
				return false;
			}
			if (myform.confirm.value=="") {
				alert("请再次输入密码");
				myform.username.focus();
				return false;
			}
			if (myform.email.value=="") {
				alert("请输入邮箱");
				myform.username.focus();
				return false;
			}else if(!reg.test(obj.value)){
				alert('邮箱格式错误');
				return false;
			}
			if (myform.code.value=="") {
				alert("请输入验证码");
				myform.username.focus();
				return false;
			}
			


		}


	</script>
	
</head>
<body>
<form class="form-horizontal" action="regcheck2.php" method="post" name="myform">
<div class="container">
		<div class="row">
		<h1 class="col-md-4 col-md-offset-3">用户注册</h1>
		</div>
		<br>
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
		<label class="col-md-2 control-label">确认密码</label> 
		<div class="col-md-4">
		<input class="form-control" type="password" name="confirm" id="confirm" placeholder="请再输入一次密码">
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label">邮箱</label> 
		<div class="col-md-4">
		<input class="form-control" type="email" name="useremail" id="email" placeholder="请输入邮箱">
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
		<br>
		<br>
		<button class="col-md-offset-2 btn btn-default" onclick="checkk()">立即注册</button>		
	</div>
	<div>
		<input type="hidden" name="hidden" value="hidden">
	</div>

</div>
</form>
</body>
</html>