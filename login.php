<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html{
            height: 100%;
        }
        body{
            background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1533045642754&di=857a645e8d5ac535ded332f8bcd23505&imgtype=0&src=http%3A%2F%2Fattachments.gfan.com%2Fforum%2Fattachments2%2Fday_110730%2F110730052762634909e8fb37d2.jpg);
            background-repeat: no-repeat;
           /* background-size: 100% 100%;
            height: 100%;*/
        }
        input,img {vertical-align:middle;}
        .col-center-block {
            float: none;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20%;
            text-align: center;
            max-width: 333px;
        }
        .edit {
            margin-top: 10px;
        }
        .textcolor{
           color: white;
        }

    </style>
	<script type="text/javascript">
        function checkName(){
       //获取到了用户名的值
       var userName = document.getElementById("username").value;
       var userSpan = document.getElementById("userId");
       var reg = /^[a-z][a-z0-9|_]{3,7}$/i;
      if(document.myform.username.value=="") {
        userSpan.innerHTML="用户名不能为空".fontcolor("red");
        return false;
      }else{
          if(reg.test(userName)){
              //符合规则 
              userSpan.innerHTML="√".fontcolor("green");
              return true;
          }else{
              //不符合规则
              userSpan.innerHTML="你注册的时候是这样写的吗，啊？".fontcolor("red");
              return false;
           }
       } 
    }
    //校验密码 
    function checkPass(){
      var  password  = document.getElementById("userpwd").value;
      var passSPan = document.getElementById("passId");
      var reg = /^\w{4,8}$/;
      if (myform.userpwd.value=="") {
        passSPan.innerHTML="密码不能为空".fontcolor("red");
        return false;
      }else{       
           if(reg.test(password)){
              //符合规则 
              passSPan.innerHTML="√".fontcolor("green");
              return true;
           }else{
              //不符合规则
              passSPan.innerHTML="4到8位字母、数字或者下划线".fontcolor("red");
              return false;
           }
       }
      
    }


    //总体校验表单是否可以提交了 如果返回的true表单才可以提交。上面的表单项必须要每个都填写正确。
    function checkForm(){
       var userName = checkName();
       var pass  = checkPass();
       if(userName&&pass&&myform.code.value!=""){
           return true;
       }else{
           return false;
       }
      
    }
	</script>	
</head>
<body>
 <div class="container">
        <div class="row row-centered">
            <div class="col-xs-6 col-md-4 col-center-block">
                <h1 class="textcolor">欢迎登录</h1>
                <form action="logincheck.php" method="post" name="myform" id="myForm2" onsubmit="return checkForm()">
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名" onblur="checkName()"/>
                    </div>
                    <span id="userId" style="font-size: small;font-family: 黑体"></span>
                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon2">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="请输入密码" onblur="checkPass()"/>
                    </div>
                      <span id="passId" style="font-size: small;font-family: 黑体"></span>                                  
                    <div class="edit input-group input-group-md">
                        <table><tr>
                        	<td><input type="text" class="form-control" id="code" name="code" placeholder="请输入验证码"/></td>
                        	<td><img class="col-md-offset-3" title="看不清" src="img.php" onclick="this.src='img.php?'+Math.random()" style="cursor: pointer;"></td>
                        </tr></table>
                    </div>
                    <br/>
                    <!-- <button class="btn btn-success btn-block" name="submit" type="submit" >立即登录</button> -->
                    <input class="btn btn-success btn-block" type="submit" >
					<a class="" href="register.php">注册</a>
					<a class="col-md-offset-1 " href="checkuser.php">忘记密码</a>
					<a class="col-md-offset-1 " href="adminlogin.php">管理员登录</a>
                    <div>
						<input type="hidden" name="hidden" value="hidden">
					</div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>