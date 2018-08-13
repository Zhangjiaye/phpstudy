<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加投票处理中……</title>
</head>
 
<body>

<?php
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if(!isset($_SESSION["admin"]))
	echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
else{
	if (isset($_POST["nodetotal"])) {
	//首先取出刚才要添加投票的title与text，隐藏域中的选项数
	$puser=$_SESSION["admin"];
	$ptitle=htmlentities($_POST["title"],ENT_NOQUOTES,"utf-8");
	$ptext=htmlentities($_POST["text"],ENT_NOQUOTES,"utf-8");
	$nodetotal=$_POST["nodetotal"];
	

	//建立一个php数组，里面存放每一个子选项
	$optarr=array();
	$imgarr=array();
	//选项的多少决定了我们的循环次数
	$b=true;

	for($i=0;$i<$nodetotal;$i++){
		// include("upload.php");
		require_once("upload.php");
		$arr=array();
		$arr=Upload::start('myfile', $i);
		if ($arr['status']==0) {
			$imgarr[$i]=$arr['path'];
		}
		else{
			echo"<script>alert('".$arr['msg']."');window.location.href='creatvote.html';</script>";
			exit();
		}	
}


	include("connect.php");
	$sql="insert into voteparent(puser,title,ptext,shenhe) values ('".$puser."','".$ptitle."','".$ptext."','否');";
	mysqli_query($conn,$sql);
	$sql="select id from voteparent where title='$ptitle'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$pid=$row["id"];

	for($i=1;$i<$nodetotal+1;$i++){
		 $optarr[$i]=htmlentities($_POST["opt${i}"],ENT_NOQUOTES,"utf-8");
		//选项内容，投票数，属于哪个投票
		 $insert=mysqli_query($conn,"insert into votechildren(ctext,count,parentid,img) values ('".$optarr[$i]."',0,'".$pid."','".$imgarr[$i-1]."');");
	
		if(!$insert)  $b=false;
		 
		}
		 if ($b) {
		 	echo "<script>alert('发布成功，等待管理员审核');window.location.href='voteindex.php';</script>";
		 }
		mysqli_close($conn); 	
}

 else
 	echo "<script>alert('请重新发布');window.location.href='creatvote.html';</script>";
}
?>
</body>

</html>
