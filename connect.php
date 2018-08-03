<?php
    //$conn=mysqli_connect("127.0.0.1","zjwdb_6241794","Zjy805950770","zjwdb_6241794");// 创建连接
	$conn=mysqli_connect("localhost","root","root","userdb");
	if (mysqli_connect_errno($conn)){
	    	echo "数据库连接失败: " . mysqli_connect_error();
	    	exit();
	}
	mysqli_set_charset($conn,"utf8");
?>