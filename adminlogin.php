<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>管理员登录页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html{
            height: 100%;
        }
        body{
            /*background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1533045642754&di=857a645e8d5ac535ded332f8bcd23505&imgtype=0&src=http%3A%2F%2Fattachments.gfan.com%2Fforum%2Fattachments2%2Fday_110730%2F110730052762634909e8fb37d2.jpg);*/
            background: skyblue;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100%;
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
 <div class="container">
        <div class="row row-centered">
            <div class="col-xs-6 col-md-4 col-center-block">
                <h1 class="textcolor">管理员登录</h1>
                <form action="admincheck.php" method="post" name="myform" id="myform">


                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="请输入管理员用户名"/>
                    </div>

                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon2">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="请输入管理员密码"/>
                    </div>
                    
                    
                    <div class="edit input-group input-group-md">
                        <table><tr>
                        	<td><input type="text" class="form-control" id="code" name="code" placeholder="请输入验证码"/></td>
                        	<td><img class="col-md-offset-3" title="看不清" src="img.php" onclick="this.src='img.php?'+Math.random()" style="cursor: pointer;"></td>
                        </tr></table>
                    </div>
                    <br/>

                    <button class="btn btn-success btn-block" name="submit" onclick="checkn()" >管理员登录</button>

                    <div>
						<input type="hidden" name="hidden" value="hidden">
					</div>
                </form>
            </div>
        </div>
    </div>




</body>
</html>