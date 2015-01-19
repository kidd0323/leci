<style type="text/css">
	.summary{
		background-color:#7dccda;
		color:#1c5097;
	}
	
	.title{
		background-color:#7dccda;
		color:#1c5097;
		padding-left:15px;
		font-size:14px;
	}
	.rightColumn{
		background-color:#e7f5f6;
		padding:5px 10px;
		color: #757575;
	}
	#bdshare{
		background-color:white;
		width:auto;
		+width:204px;
		margin-left:8px;
	}

	#p_persons{
		margin-right:10px;
		margin-top:10px;
		float:right;
		font-size:14px;
		font-weight:bold;
		color:#1c5097;
	}

	#sum_people {
		color:#f44257;
	}

	#p_money {
		color:#1c5097;
		padding-left:5px;
		padding-top:10px;
		font-size:14px;
		font-weight:bold;
	}

	.legend {
		background-color:#7dccd9;
		height:20px;
		color:white;
		font-weight:bold;
		font-size:15px;
		padding-top: 10px;
	}
	.legend span {
		padding:10px 15px;
	}
	.contentMiddle{
		border:1px solid #7dccd9;
		padding: 10px 10px;
		background-color:#faffe1;
	}
	.proTitle {
		height: auto;
	}
	.proShortDes {
		height: 50px;
	}
	.friendOrg {
		margin-right:80px;
		width:80px;
	}
	.titleWord {
		color:#1c5097;
		font-size: 14px;
		+margin-left: 15px;
	}

	.num_box li.n0{background-position:0 0;}
	.num_box li.n1{background-position:0 -24px;}
	.num_box li.n2{background-position:0 -48px;}
	.num_box li.n3{background-position:0 -72px;}
	.num_box li.n4{background-position:0 -96px;}
	.num_box li.n5{background-position:0 -120px;}
	.num_box li.n6{background-position:0 -144px;}
	.num_box li.n7{background-position:0 -168px;}
	.num_box li.n8{background-position:0 -192px;}
	.num_box li.n9{background-position:0 -216px;}
	.num_box{
		height:28px;
		width:153px;
		margin:auto auto;
		background:url(./images/number_bg.png) no-repeat;
	}

	.num_box li{
		display:inline-block;
		width:10px;
		height:13px;
		background:url(./images/number.png) no-repeat;
		margin:7px 2px 0 3px;
		+margin: 7px 5px 0 4px;
		*display:inline;
		*zoom:1;
	}
</style>

<script src="./js/jquery-index.js"></script>
<script type="text/javascript">
$(function() {
	$('#myCarousel').carousel('cycle');
});
</script>

<div class="row-fluid">
<div class="span9 columns">

	<?php if($head_pics != NULL): ?>
	<div id="myCarousel" class="carousel slide">
	  <!-- Carousel items -->
	  <div class="carousel-inner">
	  <?php $i = 1 ?>
	  <?php foreach($head_pics as $pic_info): ?>
	  <?php if($i++ == 1): ?>
		<div class="active item">
	  <?php else : ?>
		<div class="item">
	  <?php endif; ?>
			<?php if($pic_info->pid != 0) : ?>
			<a href="<?php echo site_url("project/info/$pic_info->pid"); ?>">
			<?php else : ?>
			<a href="<?php echo site_url("project/help_list"); ?>">
			<?php endif; ?>
				<img style="width:715px; height:260px;" width=715 height=260 src="./uploads/admin/<?php echo $pic_info->pic_url; ?>" alt="">
			</a>
			<div class="carousel-caption">
			  <h4><?php echo $pic_info->title; ?></h4>
			  <p><?php echo $pic_info->short_description; ?></p>
			</div>
		</div>
		<?php endforeach; ?>
	  </div>
	  <!-- Carousel nav -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
	<?php endif; ?>
	
	<!-- $recmd_projects; -->
	<?php if($recmd_projects): ?>
	<div class="row-fluid">
		<div class="legend"><span>求助信息推荐</span></div>
		<div class="contentMiddle">
		<?php $i = 0; ?>
		<?php foreach ($recmd_projects as $item):?>
		<?php if($i % 2 == 0) echo '<div class="row-fluid">'; ?>
			<div class="span2">
				<a  style="width:90px; height:90px;"  class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
					<img style="width:90px; height:90px;"  src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="90" height="90"/>
				</a>
			</div>
			<div class="span4">
				<h4 class="proTitle">
					<a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title;?></a>
				</h4>
				<div class="proShortDes">
				<p><?php echo $item->short_description; ?> </p>
				</div>
				<a class="btn btn-success" href="<?php echo site_url("project/info/$item->pid"); ?>">我要捐助</a>
			</div>
		<?php if($i % 2 == 1) echo '</div><br />'; $i++?>
		<?php endforeach;?>
		<?php if($i % 2 == 1) echo '</div>'; ?>
		</div>
	</div>
	<?php endif;?>
	
	<?php if($support_projects): ?>
	<div class="row-fluids">
		<div class="legend"><span>我支持的项目</span></div>
		<div class="contentMiddle">
		<?php $i = 0; ?>
		<?php foreach ($support_projects as $item):?>
		<?php if($i % 2 == 0) echo '<div class="row-fluid">'; ?>
			<div class="span2">
				<a  class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
					<img src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="90" height="90"/>
				</a>
			</div>
			<div class="span4">
				<h4 class="proTitle">
					<a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title;?></a>
				</h4>
				<br />
				<div class="proShortDes">
					<p><?php echo $item->short_description; ?> </p>
				</div>
				<p>已有<?php echo $item->support;?>人支持</p>
				<a class="btn btn-success" href="<?php echo site_url("project/info/$item->pid");?>">我要捐助</a>
			</div>
		<?php if($i % 2 == 1) echo '</div><br /><br /><br />'; $i++?>
		<?php endforeach;?>
		<?php if($i % 2 == 1) echo '</div>'; ?>
		</div>
	</div>
	<?php endif;?>	
	
	<div class="row-fluids">
		<div class="legend"><span>合作伙伴(排名不分先后)</span></div>
		<div class="contentMiddle" style="padding-left:40px;">
			<div class="row">
				<a href="http://www.crcf.org.cn"  target="_blank"><img class="span3 friendOrg" src="./images/bokejijin.png"/></a>
				<a href="http://love.baidu.com"  target="_blank"><img class="span3 friendOrg" src="./images/unionlove.png"/></a>
				<a href="http://gongyi.weibo.com"  target="_blank"><img class="span3 friendOrg" src="./images/weigongyi.png"/></a>
			</div>
		</div>
	</div>
	
</div>

<div class="span3 columns" style="margin-right:-10px;">
	<div class="span3 columns">
	<div class="summary">
		<p id="p_money">本平台已经募款</p>
		<ul class="num_box">
			<li class="n<?php echo $arr_money[0];?>"></li>
			<li class="n<?php echo $arr_money[1];?>"></li>
			<li class="n<?php echo $arr_money[2];?>"></li>
			<li class="n<?php echo $arr_money[3];?>"></li>
			<li class="n<?php echo $arr_money[4];?>"></li>
			<li class="n<?php echo $arr_money[5];?>"></li>
			<li class="n<?php echo $arr_money[6];?>"></li>
			<b class="titleWord">&nbsp元</b>
		</ul>
		<p id="p_persons">已有<span id="sum_people"><?php echo $sum_info->people; ?></span>人参加</p>
		<br />
		<br />
		<!-- Baidu Button BEGIN -->
	    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
	        <span class="bds_more">分享到：</span>
	        <a class="bds_qzone"></a>
	        <a class="bds_tsina"></a>
	        <a class="bds_tqq"></a>
	        <a class="bds_renren"></a>
			<a class="bds_kaixin001 kxw"></a>
			<a class="bds_hi bdkj"></a>
	    </div>
		<!-- Baidu Button END -->
	
		<br />
		<br />
	</div>
		<br />
		<h3 class="title">捐赠指引</h3>
		<div class="rightColumn">
		<p>1.选定捐款项目</p>
		<p>2.登录并确认捐款方式和金额</p>
		<p>3.完成支付</p>
		<p>4.通过搜集短信收取捐款项目</p>
		</div>
	</div>
	<br />
	<div class="span3">
		<h3 class="title">乐慈官方微博</h3>
		<div class="textwidget">
			<iframe width="100%" height="130" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=130&fansRow=2&ptype=1&speed=0&skin=1&isTitle=0&noborder=0&isWeibo=0&isFans=0&uid=1815211730&verifier=d7633bec&colors=7dccd9,ffffff,666666,0082cb,ecfbfd&dpc=1"></iframe>
		</div>
	</div>
	<?php if($donation_news): ?>
	<div class="span3 columns" style="margin-top:-15px;">
			<h3 class="title">最新捐款动态</h3>
			<div id="donation_news_div" class="rightColumn">
				<?php foreach ($donation_news as $item):?>
				<div class="row-fluid" style="margin-bottom:5px;">
					<div class="span4">
						<img class="thumbnail" src="./uploads/user/<?php echo $item->photo; ?>" alt="用户头像" width="30" height="30"/>
					</div>
					<div class="span8" style="padding-top:10px;">
						<?php echo "  <a>". $item->nickname . "</a> &nbsp;" . $item->money . "元";?>
					</div>
				</div>
				<?php endforeach;?>
			</div>
	</div>
	
	<?php endif; ?>
	<div class="span3 columns">
		<h3  class="title">公益帮助</h3>
		<div class="rightColumn">
		<p><a href="<?php echo site_url("siteinfo/how_to_propose") ?>">如何发布求助信息？</a></p>
		<p><a href="<?php echo site_url("siteinfo/how_to_be_volunteer") ?>">如何成为公益志愿者？</a></p>
		<p><a href="<?php echo site_url("siteinfo/how_to_find_history") ?>">我的捐助历史能在哪里查到？</a></p>
		</div>
	</div>
</div>
</div>


<!-- 百度分享 -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=643410" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<!-- 头图 -->
<!--<script src="./js/bootstrap-alert.js"></script>
<script src="./js/bootstrap-modal.js"></script>
<script src="./js/bootstrap-dropdown.js"></script>
<script src="./js/bootstrap-scrollspy.js"></script>
<script src="./js/bootstrap-tab.js"></script>
<script src="./js/bootstrap-tooltip.js"></script>
<script src="./js/bootstrap-popover.js"></script>
<script src="./js/bootstrap-button.js"></script>
<script src="./js/bootstrap-collapse.js"></script>
<script src="./js/bootstrap-typeahead.js"></script>-->

<script src="./js/bootstrap-transition.js"></script>
<script src="./js/bootstrap-carousel.js?rand=3"></script>