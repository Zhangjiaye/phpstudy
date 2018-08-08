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
	$ptitle=$_POST["title"];
	$ptext=$_POST["text"];
	$nodetotal=$_POST["nodetotal"];
	include("connect.php");
	$sql="insert into voteparent(puser,title,ptext,shenhe) values ('".$puser."','".$ptitle."','".$ptext."','否');";
	mysqli_query($conn,$sql);
	$sql="select id from voteparent where title='$ptitle'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$pid=$row["id"];


	$upfile = $_FILES["myfile"];
	$typelist = array("image/jpeg","image/jpg","image/png","image/gif"); //定义允许的类型
	$path="upload/";  //定义一个上传过后的目录




	//建立一个php数组，里面存放每一个子选项
	$optarr=array();
	$imgarr=array();
	//选项的多少决定了我们的循环次数
	$b=true;
	for($i=1;$i<$nodetotal+1;$i++){
	$filepath='';
		if ($upfile['error'][$i-1]>0) {		 
    		echo "Return Code: " . $upfile['error']  . "<br />";
		}

		if(!in_array($upfile['type'][$i-1],$typelist)){ 
	    	echo '文件类型错误！'.$upfile['type'][$i-1]; 
		}
		if($upfile['size'][$i-1]>2000000){ 
	    	echo '文件大小超过2000000';
		} 
		$fileinfo = pathinfo($upfile["name"][$i-1],PATHINFO_EXTENSION);//解析上传文件名字PATHINFO_EXTENSION - 只返回 extension
		  do{
		    $newfile = date("Y-m-d,H-i-s") . rand(1000, 9999) . "." . $fileinfo;
		  } while (file_exists($path . $newfile));

		if(is_uploaded_file($upfile['tmp_name'][$i-1])){ 	 
	        if(move_uploaded_file($upfile['tmp_name'][$i-1],$path.$newfile)){ 
	        	$filepath = $path.$newfile;
	        	
	            // echo '文件上传成功！'; 
	            }else{ 
	            echo '上传文件移动失败!'; 
	            } 
	    }else{ 
	        echo 'file is not uploaded via HTTP POST'; 
	        } 
	if ($filepath=='') {
		echo "<script>alert('异常');window.location.href='creatvote.html';</script>";
	}
	else{	
		$imgarr[$i-1]=$filepath;
	}	
}
	for($i=1;$i<$nodetotal+1;$i++){
		 $optarr[$i]=$_POST["opt${i}"];
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
<script>
	
</script>
</html>
