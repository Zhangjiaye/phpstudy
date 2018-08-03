<?php
session_start();
ini_set('date.timezone','Asia/Shanghai'); //设置时区
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




        <script type="text/javascript">
        function checkk(){   
          if (myform.userpwd.value=="") {
            alert("请输入密码");
            myform.userpwd.focus();
            return false;
          }
          if (myform.new.value=="") {
            alert("请输入新密码");
            myform.new.focus();
            return false;
          }
          if (myform.code.value=="") {
            alert("请输入验证码");
            myform.code.focus();
            return false;
          }
       }
  </script>
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
        <li class="active"><a href="starter.php"><i class="fa fa-link"></i> <span>首页</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>管理员管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">修改密码</a></li>
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
       密码修改
        <!-- <small>欢迎打开后台界面</small> -->
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
         <div class="container">
           <div class="row row-centered ">
             <div class="col-xs-6 col-md-4 col-center-block">
             <form action="1-1check.php" method="post" name="myform">
                   
                    <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon2">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="userpwd" name="userpwd" placeholder="请输入旧密码"/>
                    </div>
                     <div class="edit input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon3">
                            <i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="new" name="new" placeholder="请输入新密码"/>
                    </div>
                   
                    <div class="edit input-group input-group-md">
                        <table><tr>
                          <td><input type="text" class="form-control" id="code" name="code" placeholder="请输入验证码"/></td>
                          <td><img class="col-md-offset-3" title="看不清" src="img.php" onclick="this.src='img.php?'+Math.random()" style="cursor: pointer;"></td>
                        </tr></table>
                    </div>
                    <br/>
                    <button class="btn btn-success btn-block" name="submit" onclick="checkk()" >密码修改</button>
                    <div>
                   <input type="hidden" name="hidden" value="hidden">
                 </div>
            </form>
         </div>
        </div>
    </div>

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