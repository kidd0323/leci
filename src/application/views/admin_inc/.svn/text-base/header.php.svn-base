<?php
    if($this->admin_model->check_admin_login() == TRUE){
        $uid = $this->session->userdata('uid');
        $nickname = $this->session->userdata('nickname');
    }else{
        $uid = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url();?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="乐慈网">
	<!-- Le styles -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<link href="./css/bootstrap-responsive.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-top: 60px;
		padding-bottom: 40px;
	  }
	</style>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/bootstrap-dropdown.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  <a class="brand" href="<?php echo site_url('admin');?>">乐慈网</a>
	  <div class="nav-collapse">
		<ul class="nav">
		  <li class="<?php echo $active[0]; ?>"><a href="index.php/admin/">企业捐款</a></li>
          <li class="dropdown <?php echo $active[1]; ?>">
            <a class="dropdown-toggle" data-toggle="dropdown" href="index.php/admin/recommend_project">推荐管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="index.php/admin/focus_map">焦点图</a></li>
                <li><a href="index.php/admin/recommend">求助推荐</a></li>
            </ul>
          </li>
		  <li class="<?php echo $active[2]; ?>"><a href="index.php/admin/data_stat">数据统计</a></li>
		  <li class="<?php echo $active[3]; ?>"><a href="index.php/admin/user_info">用户信息管理</a></li>
		  <li class="<?php echo $active[4]; ?>"><a href="index.php/admin/project_info">项目审核</a></li>
		  <li class="<?php echo $active[5]; ?>"><a href="index.php/admin/invoice">发票申请</a></li>
		</ul>
		<ul class="nav" style="float:right;">
        <?php if($uid > 0):?>
            <li><a><?php echo $nickname;?></a></li>
		    <li><a href="index.php/admin/submit_logout">退出登录</a></li>
        <?php else:?>
		    <li><a href="index.php/admin/login">管理员登录</a></li>
        <?php endif;?>
		</ul>
	  </div><!--/.nav-collapse -->
	</div>
  </div>
</div>
<div class="container">
