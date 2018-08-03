<?php
session_start();
//登录处理
header("Content-type:text/html;charset=utf-8");    //设置编码
ini_set('date.timezone','Asia/Shanghai'); //设置时区
?>

<!DOCTYPE html>
<html lang="en" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>管理员管理页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">用户审核</a></li>
    <li role="presentation"><a href="adminchongzhi.php">密码重置</a></li>
   <!--  <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li> -->
    </ul>
<table class="table table-condensed" border='1'>
         <tr><th>编号</th><th>用户名</th><th>是否激活</th><th>注册时间</th><th>是否审核</th><th>点击审核</th><tr>
<?php
if(isset($_POST["hidden"])&&$_POST["hidden"]=="hidden"){
    //加入用户名密码
    $user=trim($_POST["username"]);//移除字符串两侧空格
    $pwd=md5(trim($_POST["userpwd"]));
    $code=trim($_POST["code"]);
    if ($user ==""||$pwd==""||$code=="") {
         echo "<script>history.go(-1);</script>";
    }
    else if($code!=$_SESSION["var_code"]){
        echo "<script>alert('验证码不正确');history.go(-1);</script>";
    }//当用户名密码验证码不为空，则可以连接数据库//判断输入是否与数据库内的相同
    else {
       include("connect.php");
		// echo "<script>alert('$pwd');</script>";
    	$sql="select * from admin where username='".$user."' and userpwd='".$pwd."' ";
		$result=mysqli_query($conn,$sql);
		$num=mysqli_num_rows($result);//统计执行结果影响行数
		if($num){//匹配成功	
			$rowx =  mysqli_fetch_array($result);
			$_SESSION['id']=$rowx['id'];
			$_SESSION['type']='管理员';
			$sql="select * from user ";
         	$result=mysqli_query($conn,$sql);
         	$num=mysqli_num_rows($result);
            //循环遍历出数据表中的数据
            for($i=0;$i<$num;$i++){
                $row =  mysqli_fetch_array($result);
                $id = $row['id'];
                $name = $row['username'];
                $status=$row['status'];
                $time=date('Y-m-d',$row['regtime']);
                $admit = $row['admit'];
                echo "<tr><td>$id</td><td>$name</td><td>$status</td><td>$time</td><td>$admit</td><td>";            
                echo "<a href='shenhe.php?x=".$row['id']."'>审核</a></td><tr>";
            }
			
		}
		else
			echo "<script>alert('您不是管理员');history.go(-1);</script>";
    }
}

	else 
		if (isset($_SESSION['type'])&&$_SESSION['type']=='管理员') {//不是通过表单到达该页面，需要通过session
		include("connect.php");
			$sql="select * from user ";
         	$result=mysqli_query($conn,$sql);
         	$num=mysqli_num_rows($result);
            //循环遍历出数据表中的数据
            for($i=0;$i<$num;$i++){
                $row =  mysqli_fetch_array($result);
                $id = $row['id'];
                $name = $row['username'];
                $status=$row['status'];
                $time=date('Y-m-d',$row['regtime']);
                $admit = $row['admit'];
                echo "<tr><td>$id</td><td>$name</td><td>$status</td><td>$time</td><td>$admit</td><td>";            
                echo "<a href='shenhe.php?x=".$row['id']."'>审核</a></td><tr>";
            }
	}

?>
</table>

</body>
</html>