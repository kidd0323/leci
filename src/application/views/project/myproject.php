<style type="text/css">
	.legend {
		background-color:#7dccd9;
		height:20px;
		color:white;
		font-weight:bold;
		font-size:15px;
		padding-top: 10px;
	}
	.legend a{
		color:white;
		padding-left:15px;
	}
	.legend span{
		padding-left:5px;
	}
	.rightColumn{
		background-color:#e7f5f6;
		padding:5px 10px;
		color: #757575;
	}
	.contentMiddle{
		border:1px solid #7dccd9;
		padding: 10px 10px;
		background-color:#faffe1;
	}
	.prjLabel {
		color:#a4a4a4;
	}
	.prjInfo {
		color:#1a4683;
	}
</style>

<script src="./js/jquery-myproject.js"></script>
<script>
	$(function (){
	});
	function use(){
		var sd=$('#spandetails').html();
		if (sd == "收起"){
			$('#spandetails').html('展开');
			$('#details').hide();
		}
		else{
			$('#spandetails').html('收起');
			$('#details').show();
		}
		
	}
 </script>


<div class="row-fluid">
	<?php if($type != 0):?>
	<div class="span2 rightColumn">
		<div class="subnav">
		  <ul class="nav nav-pills nav-stacked">
			<li <?php if($type==0) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject'); ?>">我的公益主页</a></li>
			<li <?php if($type==1) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/1'); ?>">我捐助的求助</a></li>
			<li <?php if($type==2) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/2'); ?>">我支持的求助</a></li>
			<li <?php if($type==3) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/3'); ?>">我发起的求助</a></li>
		  </ul>
		</div>
	</div>
	<?php endif;?>


	<div class="span9">
		<?php if($type == 3):?>
		<div class="subnav">
		  <ul class="nav nav-pills">
			<li <?php if($status==0) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/3/0'); ?>">全部</a></li>
			<li <?php if($status==2) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/3/2'); ?>">待审核</a></li>
			<li <?php if($status==3) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/3/3'); ?>">进行中</a></li>
			<li <?php if($status==4) echo 'class="active"'; ?>><a href="<?php echo site_url('project/myproject/3/4'); ?>">已结束</a></li>
		  </ul>
		</div>
		<?php endif;?>

		
		<?php if($propose_projects): ?>	
		
			<div class="legend">
				<a href="<?php echo site_url("project/myproject/3"); ?>">我发起的求助</a>
			</div>
			<div class="contentMiddle">
			<?php foreach ($propose_projects as $item):?>
			<div class="row-fluid">
				<div class="span3">
				<a class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
					<img src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="180"  height="180"/>
				</a>
				</div>
				<div class="span8">
					<h3><a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title; ?></a><?php echo " [" . $item->category . "]"; ?></h3>
					<p><?php echo $item->short_description; ?> </p>
					<p>
						<span class="prjLabel">发起人: </span>
						<span class="prjInfo"><?php echo  $item->uname; ?></span>
						 &nbsp; 
						<span class="prjLabel">执行机构: </span>
						<span class="prjInfo"><?php echo $item->oname; ?></span>
						 &nbsp;
						 <span class="prjLabel">救助对象: </span>
						 <span class="prjInfo"><?php echo $item->assist_object;?> 
					</p>
					<?php if($item->poss_id != 0):?>
					<p>
						<span class="prjLabel">已捐款: </span>
						<span class="prjInfo"><?php echo  $item->now_money; ?></span>
						 &nbsp; 
						 <span class="prjLabel">目标金额: </span>
						<span class="prjInfo"><?php echo  $item->target_money; ?>元</span>
					</p>
					<?php endif; ?>
					<p>
						<span class="prjLabel">求助时间: </span>
						<span class="prjInfo"><?php echo $item->start_time . " ~ ". $item->end_time;?></span>
					</p>
					<?php if($item->status==3): ?>
						<p>
							<span class="prjLabel">支持人数: </span>
							<span class="prjInfo"><?php echo $item->support;?></span>
						</p>
					<?php endif; ?>
					<p>
						<span class="prjLabel">状态: </span>
						<span class="prjInfo">
						<?php if($item->status==3) echo '进行中'; elseif($item->status==4) echo '已结束'; else echo '审核中'; ?>
						</span>
					</p>
					<!-- 通过审核的项目可以发布进展等 -->
					<?php if($item->status==3 || $item->status==4):?>
					<a href="<?php echo site_url("project/post_feedback/$item->pid"); ?>">发布进展</a>|
					<a href="<?php echo site_url("project/daily_report/$item->pid"); ?>">数据统计</a>	|
					<a href="<?php echo site_url("project/volunteer_list/$item->pid"); ?>">志愿者名单</a>	|
					<a href="<?php echo site_url("project/invoice_list/$item->pid"); ?>">发票申请名单</a>	|
					<a href="<?php echo site_url("project/audit_vfeedback/$item->pid"); ?>">审核志愿者反馈</a>
					<?php endif; ?>
				</div>
			</div>
			<br />
			<br />
			<?php endforeach;?>
			</div>
		
		<?php endif;?>
		

		<?php if($donate_projects): ?>
			<div class="legend">
				<a href="<?php echo site_url("project/myproject/1"); ?>">我捐助的求助</a>
			</div>
			
			<div class="contentMiddle">
			<?php foreach ($donate_projects as $item):?>
			<div class="row-fluid">
				<div class="span3">
					<a class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
					<img src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="180"  height="180"/>
					</a>
				</div>		
				<div class="span8">
				<h3><a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title; ?></a><?php echo " [" . $item->category . "]"; ?></h3>
				<p><?php echo $item->short_description; ?> </p>
				<p>
					<span class="prjLabel">发起人: </span>
					<span class="prjInfo"><?php echo  $item->uname; ?></span>
					 &nbsp; 
					<span class="prjLabel">执行机构: </span>
					<span class="prjInfo"><?php echo $item->oname; ?></span>
					 &nbsp;
					 <span class="prjLabel">救助对象: </span>
					 <span class="prjInfo"><?php echo $item->assist_object;?> 
				</p>
				<?php if($item->poss_id != 0):?>
				<p>
					<span class="prjLabel">已捐款: </span>
					<span class="prjInfo"><?php echo  $item->now_money; ?></span>
					 &nbsp; 
					<span class="prjLabel">目标金额: </span>
					<span class="prjInfo"><?php echo  $item->target_money; ?>元</span>
				</p>
				<?php endif; ?>
				<p>
					<span class="prjLabel">支持人数: </span>
					<span class="prjInfo"><?php echo $item->support;?></span>
				</p>
				<p>
					<span class="prjLabel">求助时间: </span>
					<span class="prjInfo"><?php echo $item->start_time . " ~ ". $item->end_time;?></span>
				</p>
				<a class="btn btn-success" href="<?php echo site_url("project/info/$item->pid"); ?>">我要捐助</a>
				<?php if(!$item->is_supporter): ?>
				<span class="btn btn-warning" href="<?php echo site_url("project/support_project/$item->pid"); ?>">支持+1</span>
				<?php else:?>
					<button class="btn btn-warning disabled support" disabled>已经支持</button>
				<?php endif; ?>
				
				<p><a>捐助明细  </a><a  id="spandetails" href="javascript:use()">收起</a></p>
				<div>
				<ul id="details" class="rightColumn unstyled" style="padding-left:30px;">
					<?php foreach ($item->donate_action_array as $donation_item):?>
					<li><?php echo $donation_item->create_time . " 您在本次公益活动中已捐助" . ($donation_item->money/100) ?>元</li>
					<?php endforeach;?>
				</ul>
				</div>
				</div>
			</div>
			<br />
			<br />
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		
		
		<?php if($support_projects): ?>
			<div class="legend">
				<a href="<?php echo site_url("project/myproject/2"); ?>">我支持的求助</a>
			</div>
			<div class="contentMiddle">
			<?php foreach ($support_projects as $item):?>
				<div class="row-fluid">
					<div class="span3">
						<a class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
						<img src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="180" height="180"/>
						</a>
					</div>
					<div class="span8">
						<h3><a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title; ?></a><?php echo " [" . $item->category . "]"; ?></h3>
						<p><?php echo $item->short_description; ?> </p>
						<p>
							<span class="prjLabel">发起人: </span>
							<span class="prjInfo"><?php echo  $item->uname; ?></span>
							 &nbsp; 
							<span class="prjLabel">执行机构: </span>
							<span class="prjInfo"><?php echo $item->oname; ?></span>
							 &nbsp;
							 <span class="prjLabel">救助对象: </span>
							 <span class="prjInfo"><?php echo $item->assist_object;?> 
						</p>
						<?php if($item->poss_id != 0):?>
						<p>
							<span class="prjLabel">已捐款: </span>
							<span class="prjInfo"><?php echo  $item->now_money; ?></span>
							 &nbsp; 
							<span class="prjLabel">目标金额: </span>
							<span class="prjInfo"><?php echo  $item->target_money; ?>元</span>
						</p>
						<?php endif; ?>
						<p>
							<span class="prjLabel">支持人数: </span>
							<span class="prjInfo"><?php echo $item->support;?></span>
						</p>
						<p>
							<span class="prjLabel">求助时间: </span>
							<span class="prjInfo"><?php echo $item->start_time . " ~ ". $item->end_time;?></span>
						</p>
						<p>
							<span class="prjLabel">状态: </span>
							<span class="prjInfo">
							<?php if($item->status==3) echo '进行中'; elseif($item->status==4) echo '已结束'; else echo '审核中'; ?>
							</span>
						</p>
						<a class="btn btn-success" href="<?php echo site_url("project/info/$item->pid"); ?>">我要捐助</a>
					</div>
				</div>
			<br />
			<br />
			<?php endforeach;?>
			</div>
		<?php endif;?>

		<?php if(!$propose_projects && $type == 3): ?>	
			<p>您还没有任何该类别的求助信息,点击<a href="<?php echo site_url("project/propose_assist"); ?>">立即发布</a></p>
		<?php elseif(!$donate_projects && $type == 1): ?>
			<p>您还没有捐助过任何项目,点击<a href="<?php echo site_url("project/help_list"); ?>">这里</a>寻找感兴趣项目吧！</p>
		<?php elseif(!$support_projects && $type == 2):?>
			<p>您还没有支持过任何项目,点击<a href="<?php echo site_url("project/help_list"); ?>">这里</a>寻找感兴趣项目吧！</p>
		<?php else:?>
		<div id="pagePane" class="pagination" style="float:left;">
			<?php echo $this->pagination->create_links(); ?>
		</div>
		<?php endif; ?>
		
		<?php if($type==0 && !$propose_projects && !$donate_projects && !$support_projects): ?> 
		<p>您的公益中心无任何项目，您可以<a href="<?php echo site_url("project/propose_assist"); ?>">发布求助</a>，
		或者支持已有的<a href="<?php echo site_url("project/help_list"); ?>">公益项目</a>。</p>
		<?php endif;?>
		
	</div>	
		
		
		<?php if($type==0 && $donation_news): ?>
		<div class="span3 colums">
		
		
			<!--<?php foreach ($donation_news as $item):?>
				<div class="span3">	
					<p><?php echo "  ". $item->nickname . "," . $item->money . "元";?></p>	
				</div>
			<?php endforeach;?>-->
			
			<div class="legend"> <span>最新捐款动态</span> </div>
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
		
		
			<div class="legend"> <span>公益帮助</span> </div>
			<div  class="rightColumn">
			<p><a href="<?php echo site_url("siteinfo/how_to_propose") ?>">如何发布求助信息？</a></p>
			<p><a href="<?php echo site_url("siteinfo/how_to_be_volunteer") ?>">如何成为公益志愿者？</a></p>
			<p><a href="<?php echo site_url("siteinfo/how_to_find_history") ?>">我的捐助历史能在哪里查到？</a></p>
			</div>
		</div><!--/span-->
		<?php endif; ?>	
	
	
</div><!--row-->
