<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- 整体背景 -->
    <style type="text/css">
        html{
            height: 100%;
        }
        body{
            background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1533045642754&di=857a645e8d5ac535ded332f8bcd23505&imgtype=0&src=http%3A%2F%2Fattachments.gfan.com%2Fforum%2Fattachments2%2Fday_110730%2F110730052762634909e8fb37d2.jpg);
            background-repeat: no-repeat;
            /*background-size: 100% 100%;*/
           /* height: 100%;*/
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
              userSpan.innerHTML="4到8位数字字母与下划线组成，且第一位是字母".fontcolor("red");
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
    //检验密码是否正确
    function ensurepass(){
       var  password1 = document.getElementById("userpwd").value; //第一次输入的密码
       var password2 = document.getElementById("confirm").value;
      var enSpan  = document.getElementById("ensure");
       if (myform.confirm.value=="") {
        enSpan.innerHTML="请再次输入密码".fontcolor("red");
        return false;
      }
       else{
           if(password1.valueOf()==password2.valueOf()){
              enSpan.innerHTML="√".fontcolor("green");
              return true;
           }else{
              enSpan.innerHTML="两次密码输入不一致".fontcolor("red");
              return false;
           }  
       }
    }
    //校验邮箱
    function checkEmail(){
       var  email  = document.getElementById("email").value;
       var reg = /^[a-z0-9]\w+@[a-z0-9]{2,3}(\.[a-z]{2,3}){1,2}$/i;  // .com .com.cn
       var emailspan = document.getElementById("emailspan");
       if (myform.useremail.value=="") {
        emailspan.innerHTML="邮箱不能为空".fontcolor("red");
        return false;
      }else{
         if(reg.test(email)){
             //符合规则 
             emailspan.innerHTML="√".fontcolor("green");
             return true;
         }else{
             //不符合规则
             emailspan.innerHTML="邮箱格式错误".fontcolor("red");
             return false;
         }  
      } 
    } 
    //校验验证码
    // function checkMa(){
    //    var  yan  = document.getElementById("code").value;
    //    var yanspan = document.getElementById("yanspan");
    //    if (myform.code.value=="") {
    //     yanspan.innerHTML="验证码不能为空".fontcolor("red");
    //     return false;
    //   }
    // }  
    //总体校验表单是否可以提交了 如果返回的true表单才可以提交。上面的表单项必须要每个都填写正确。
    function checkForm(){
       var userName = checkName();
       var pass  = checkPass();
       var ensure  = ensurepass();
       var email = checkEmail();
       // var yan =checkMa();
       if(userName&&pass&&ensure&&email&&myform.code.value!=""){
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
                <h1 class="textcolor">欢迎注册</h1>
                <form action="regcheck2.php" method="post" name="myform" onsubmit="return checkForm()">
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
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="请输入密码"/ onblur="checkPass()">
                    </div>
                     <span id="passId" style="font-size: small;font-family: 黑体"></span>
                     <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon3">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="请再输入一次密码" onblur="ensurepass()" />
                    </div>
                        <span id="ensure" style="font-size: small;font-family: 黑体"></span>

                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon4">
                            <i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="useremail" placeholder="请输入邮箱" onblur="checkEmail()"/>
                    </div>
                        <span id="emailspan" style="font-size: small;font-family: 黑体"></span>

                    <div class="edit input-group input-group-md">
                        <table><tr>
                        	<td><input type="text" class="form-control" id="code" name="code" placeholder="请输入验证码" onblur="checkMa()"/></td>

                        	<td><img class="col-md-offset-3" title="看不清" src="img.php" onclick="this.src='img.php?'+Math.random()" style="cursor: pointer;"></td>
                        </tr>

                        </table>
                            <span id="yanspan" style="font-size: small;font-family: 黑体"></span>

                    </div>
                    <br/>
                   <!--  <button class="btn btn-success btn-block" name="submit" >立即注册</button> -->
                   <input class="btn btn-success btn-block" type="submit" >
                    <div>
						<input type="hidden" name="hidden" value="hidden">
					</div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



