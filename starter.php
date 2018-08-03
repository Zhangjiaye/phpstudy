<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理系统</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">server</span>
    </div>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/1.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>张三</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>首页</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>管理员管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="1-1.php">修改密码</a></li>
            <li><a href="#">。。。</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>用户管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="2-1.php">用户审核</a></li>
            <li><a href="2-2.php">密码重置</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>投票管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hello 
        <small>欢迎打开后台界面</small>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

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
        // echo "<script>alert(\"".$code."\");history.go(-1);</script>";
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

    }
    else
      echo "<script>alert('账号或密码错误');history.go(-1);</script>";
    }
}

  else if (isset($_SESSION['type'])&&$_SESSION['type']=='管理员') {//不是通过表单到达该页面，需要通过session
  
  }else{
    echo "<script>alert('请重新登陆');window.location.href='adminlogin.php';</script>";
  }


?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
   
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>



</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>