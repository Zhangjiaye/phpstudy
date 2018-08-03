
<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
if(isset($_POST["token"])){
	$v=$_POST["token"];
	include("connect.php");

	$pwd=md5(trim($_POST["userpwd"]));
	$pwd_new=md5(trim($_POST["new"]));
	if ($pwd ==""||$pwd_new=="") {
		 echo "<script>history.go(-1);</script>";
	}
	else{
			if ($pwd==$pwd_new) {
				$query = mysqli_query($conn, "select id from user where token='$v'"); 
				$num=mysqli_num_rows($query);
				if($num){ 
					$row = mysqli_fetch_array($query); 

					
					// $sql="update user set token_time='$t' where id='".$row['id']."'  ";

					// if($nowtime>$row['token_time']){

					// }
				    mysqli_query($conn, "update user set userpwd='$pwd' where id=".$row['id']);       
				    echo "<script>alert('密码重置成功！');window.location.href='login.php';</script>";				
				}else{ 
				    echo "用户不存在";     
				} 
			}
			else{
				echo "<script>history.go(-1);</script>";
			}
		}

mysqli_close($conn);

}
?>
