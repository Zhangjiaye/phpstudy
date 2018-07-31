<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>密码找回</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
		function checkk(){

			var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //正则表达式
    		var obj = document.getElementById("email"); //要验证的对象
			if (myform.username.value=="") {
				alert("请输入用户名");
				myform.username.focus();
				return false;
			}
			if (myform.email.value=="") {
				alert("请输入邮箱");
				myform.email.focus();
				return false;
			}else if(!reg.test(obj.value)){//test() 方法用于检测一个字符串是否匹配某个模式.
				alert('邮箱格式错误');
				return false;
			}
		}
	</script>
	 <style type="text/css">
        html{
            height: 100%;
        }
        body{
            background-image: url(https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1533045642754&di=857a645e8d5ac535ded332f8bcd23505&imgtype=0&src=http%3A%2F%2Fattachments.gfan.com%2Fforum%2Fattachments2%2Fday_110730%2F110730052762634909e8fb37d2.jpg);
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
</head>
<body>
 <div class="container">
        <div class="row row-centered">
            <div class="col-xs-6 col-md-4 col-center-block">
                <h1 class="textcolor">密码找回</h1>
                <form action="resetpwd.php" method="post" name="myform">


                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名"/>
                    </div>

                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon4">
                            <i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="useremail" placeholder="请输入邮箱"/>
                    </div>
                                       
                    <br/>
                    <button class="btn btn-success btn-block" name="submit" onclick="checkk()" >提交</button>
				
                    <div>
						<input type="hidden" name="hidden" value="hidden">
					</div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


