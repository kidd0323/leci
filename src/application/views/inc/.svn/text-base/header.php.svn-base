<?php
if($this->User_model->check_user_login() > 0) {
	$uid = $this->session->userdata('uid');
	$nickname = $this->session->userdata('nickname');
	$notification_count = $this->Notification_model->get_unread_notification_count($uid);
} else {
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
	<meta name="description" content="乐慈">
	<!-- Le styles -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<!--<link href="./css/bootstrap-responsive.css" rel="stylesheet">-->
	<link href="./css/totop.css" rel="stylesheet">
	<style type="text/css">	
		.header {
			background-color:#E4F9FE;
			width:98%;
			margin:auto auto;
		}
		.logo {
			float: left;
			overflow: hidden;
		}
		.logo h1 {
			margin-top: 13px;
		}
		.logo h1 a {
			display: block;
			width: 240px;
			height: 57px;
			background: url(./images/logo.png?id=v1) no-repeat;
			text-indent: -999em;
		}
		.headAction {
			margin-top:30px;
			float:right;
		}
		.headActionBtn {
			width:55px;
			backgroud-color:#7dccda;
			color:white;
			display: inline-block;
			padding: 4px 10px 4px;
			font-size: 13px;
			line-height: 18px;
			text-align: center;
			background-color:#7dccda;
		}
		.headActionBtn:hover {
			color:white;
		}
		.navbar-inner{
			width:95%;
			margin:auto auto;
		}
		
		#userUl {
			float:right;
			margin-top: -40px;
			color:#7DCCD9;
		}
		#userUl li a {
			color:#2F8DB0
		}
		#userUl li a:hover {
			color:#1C5097
		}
		#mainNav  {
			border-top: 5px solid #2F8DB0;
		}
		.helpLi {
			color:white;
			font-size: 13px;
			background-color:#FFB515;!important;
			height: 30px;
			text-align: center;
			width: 75px;
		}
		.helpA,.helpA:hover {
			color:white!important;
		}
		a.helpA {
			margin-top: -3px;
		}
		
	</style>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="./js/jquery-totop.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.dropdown-toggle').dropdown();
		});
		
	</script>
</head>
<body>

<div class="header">
<div class="container">
	<div class="logo">
        <h1><a title="乐慈" href="<?php echo site_url('project'); ?>">乐慈</a></h1>
    </div>
	<div class="headAction">
		<?php if($uid <= 0): ?>
		<a class="headActionBtn" href="<?php echo site_url("user/login"); ?>">用户登录</a>
		<a class="headActionBtn" href="<?php echo site_url("user/register"); ?>">注册</a>
		<?php endif; ?>
	</div>
</div>
</div>
<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  
	  <div id="mainNav" class="nav-collapse">
		<ul class="nav">
		  <li class="<?php echo $active[0]; ?>"><a href="<?php echo site_url('project'); ?>">首页</a></li>
		  <li class="<?php echo $active[1]; ?>"><a href="<?php echo site_url('project/help_list'); ?>">公益项目</a></li>
		  <li class="dropdown <?php echo $active[2]; ?>">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" 
				href="<?php echo site_url("project/myproject"); ?>">
				我的公益<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
			  <li><a href="<?php echo site_url("project/myproject"); ?>">我的公益主页</a></li>
			  <li><a href="<?php echo site_url("project/myproject/1"); ?>">我捐助的求助</a></li>
			  <li><a href="<?php echo site_url("project/myproject/2"); ?>">我支持的求助</a></li>
			  <li><a href="<?php echo site_url("project/myproject/3"); ?>">我发起的求助</a></li>
			 </ul>
		  </li>
		</ul>
<?php if($uid > 0):?>
		<ul id="userUl" class="nav">
		    <li>
		  	<a href="<?php echo site_url("user/info"); ?>"><?php echo $nickname; ?></a>
           </li>
		   <li><a href="<?php echo site_url("user/notification"); ?>">提醒(<?php echo $notification_count; ?>)</a></li>
          <li><a href="<?php echo site_url("user/logout"); ?>">注销</a></li>
		</ul>
<?php endif;?>
		<ul class="nav" style="float:right;">
		   <li class="helpLi"><a class="helpA" href="<?php echo site_url("project/propose_assist"); ?>">求助</a></li>
		</ul>
	  </div><!--/.nav-collapse -->
	</div>
  </div>
</div>
<div class="container">
