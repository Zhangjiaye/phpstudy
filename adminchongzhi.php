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
	<ul class="nav nav-tabs ">
    <li role="presentation" ><a href="admincheck.php">用户审核</a></li>
    <li role="presentation" class="active"><a href="#">密码重置</a></li>
   <!--  <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li>
    <li role="presentation"><a href="#">Messages</a></li> -->
    </ul>
<table class="table table-condensed" border='1'>
         <tr><th>编号</th><th>用户名</th><th>是否激活</th><th>注册时间</th><th>是否审核</th><th>密码重置</th><tr>
<?php
		if (isset($_SESSION['type'])&&$_SESSION['type']=='管理员') {//不是通过表单到达该页面，需要通过session
		$conn=mysqli_connect("127.0.0.1","zjwdb_6241794","Zjy805950770","zjwdb_6241794");// 创建连接
		//$conn=mysqli_connect("localhost","root","root","userdb");
		if (mysqli_connect_errno($conn)){
	    		echo "数据库连接失败: " . mysqli_connect_error();
	    		exit();
		}
		mysqli_set_charset($conn,"utf8");
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
                echo "<a href='adminreset.php?x=".$row['id']."'>重置</a></td><tr>";
            }
            mysqli_close($conn);
	}
?>
</table>

</body>
</html>