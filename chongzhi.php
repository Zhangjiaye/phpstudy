<?php

if (!isset($_GET['v'])) {
	echo "<script>alert('无效页面');window.location.href='login.php';</script>";
}
$v = stripslashes(trim($_GET['v']));
?>
<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>密码重置页面</title>
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
		function checkz(){
			if (myform.userpwd.value=="") {
				alert("请输入新密码");
				myform.userpwd.focus();
				return false;
			}
			if (myform.new.value=="") {
				alert("请再次输入密码");
				myform.new.focus();
				return false;
			}
			if (myform.userpwd.value!=myform.new.value) {
				alert("密码不一致");
				return false;
			}

		}

	</script>

<body>
 <div class="container">
        <div class="row row-centered">
            <div class="col-xs-6 col-md-4 col-center-block">
                <h1 class="textcolor">密码重置</h1>
                <form action="chongzhicheck.php" method="post" name="myform">


                     <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon3">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="输入新密码"/>
                    </div>
                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon3">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="new" name="new" placeholder="输入新密码"/>
                    </div>
                                       
                    <br/>
                    <button class="btn btn-success btn-block" name="submit" onclick="checkz()" >确认重置</button>
				
                    <div>
						<input type="hidden" name="hidden" value="hidden">
					</div>

									
					<div>
						<input type="hidden" name="token" value="<?php echo $v; ?>">
					</div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>


