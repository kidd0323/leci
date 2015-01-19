<style type="text/css">
	.selectDiv {
		background-color:white;
		border:1px solid #38a5aa;
		color:#2b589b;
		font-size:13px;
		font-weight:bold;
		width:40px;
		text-align:center;
		display:inline-block!important;
	}
	#reginDiv,#typeDiv,#statusDiv {
		font-size:13px;
	}

	a.active{
		font-weight:bold;
	}
	
	#sortWay {
		color:#2b589b;
	}

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
	.rightColumn{
		background-color:#e7f5f6;
		padding:5px 10px;
		color: #757575;
	}
</style>

<script src="./js/project.js" ></script>
<script type="text/javascript">
	$(function() {
		$('#reginMoreDiv').hide();
		$('#more').click(function(){
			$('#reginDiv').hide();
			$('#reginMoreDiv').show();
		})
	})
</script>

<div class="row-fluid">
	<div class="span2">
		<div class="rightColumn" style="padding: 8px 0;">
			<ul class="nav nav-pills nav-stacked">
			<li class="nav-header">类别</li>
			<?php if($url->cid == 0) $class="class=active"; else $class=""; ?>
			<li <?php echo $class; ?>>
				<a href="<?php echo site_url("project/help_list/0"); ?>">全部</a>
			</li>
			<?php foreach($category_list as $category): ?>
			<?php if($url->cid == $category->cid) $class="class=active"; else $class=""; ?>
			<li <?php echo $class; ?>>
				<a href="<?php echo site_url("project/help_list/$category->cid"); ?>"><?php echo $category->name; ?></a>
			</li>
			<?php endforeach;?>
			</ul>
		</div>
	</div>
	
	<div class="span10">
	<div class="well" style="padding: 8px 18px;">
		<div class="unit">
		<!-- 各种选择 -->
			<div id="reginDiv">
				<span class="selectDiv">地区</span>
				<span style="display:inline-block;">
				<?php $para = "$url->cid/0/$url->type/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">全部</a>
				<?php for($i=0;$i<6;$i++):?>
					<?php $para = "$url->cid/".($i+1)."/$url->type/$url->status/$url->order/1"; ?>
					<a class="a_province" href="<?php echo site_url("project/help_list/$para"); ?>"><?php echo $province_list[$i]; ?></a>
					<?php if($i % 17 == 16) echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
				<?php endfor;?>
				<a class="more" id="more">更多</a>
				</span>
			</div>
			<div id="reginMoreDiv">
				<span class="selectDiv">地区</span>
				<span><?php $para = "$url->cid/0/$url->type/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">全部</a>
				<?php for($i=0;$i<count($province_list);$i++):?>
					<?php $para = "$url->cid/".($i+1)."/$url->type/$url->status/$url->order/1"; ?>
					<a class="a_province" href="<?php echo site_url("project/help_list/$para"); ?>"><?php echo $province_list[$i]; ?></a>
					<?php if($i % 17 == 16) echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
				<?php endfor;?>
				</span>
			</div>
			<br />
			<div id="typeDiv">
				<span class="selectDiv">类别</span>
				<span>
				<?php $para = "$url->cid/$url->province/0/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">全部</a>
				<?php $para = "$url->cid/$url->province/1/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">捐款</a>
				<?php $para = "$url->cid/$url->province/2/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">捐物</a>
				<?php $para = "$url->cid/$url->province/3/$url->status/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">募集志愿者</a>
				</span>
			</div>
			<br />
			<div id="statusDiv">
				<span class="selectDiv">状态</span>
				<span>
				<?php $para = "$url->cid/$url->province/$url->type/0/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">全部</a>
				<?php $para = "$url->cid/$url->province/$url->type/3/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">进行中</a>
				<?php $para = "$url->cid/$url->province/$url->type/4/$url->order/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">已结束</a>
				</span>
			</div>
		</div>
		</div>
		
		<div id="orderDiv" class="legend">
				<span style="float:left; padding-left:15px;">求助信息</span>
				<span style="float:right; padding-right:15px" id="sortWay">排序方式&nbsp;
				<?php $para = "$url->cid/$url->province/$url->type/$url->status/start_time/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">发布时间</a>
				<?php $para = "$url->cid/$url->province/$url->type/$url->status/end_time/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">结束时间</a>
				<?php $para = "$url->cid/$url->province/$url->type/$url->status/support/1"; ?>
				<a href="<?php echo site_url("project/help_list/$para"); ?>">支持人数</a>
				</span>
		</div>
		<div class="contentMiddle">
		<!-- 项目列表 -->
		<?php if($help_list):?>
		<?php foreach ($help_list as $item):?>
			<div class="row-fluid">
				<div class="span3">
					<a class="thumbnail" href="<?php echo site_url("project/info/$item->pid"); ?>">
					<img style="width:180px; height:180px;" src="uploads/project_thumb/<?php echo $item->pics[0]; ?>"  alt="项目图片" width="180" height="180"/>
					</a>
				</div>		
				<div class="span7">
					<h3><a href="<?php echo site_url("project/info/$item->pid"); ?>"><?php echo $item->title;  echo " [" . $item->category . "]"; ?></a></h3>
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
					<p class="pSupport">
						<span class="prjLabel">支持人数: </span>
						<span class="prjInfo"><?php echo $item->support;?></span>
					</p>
					<p>
						<span class="prjLabel">审核状态: </span>
						<span class="prjInfo">
						<?php if($item->status==3) echo '进行中'; elseif($item->status==4) echo '已结束'; else echo '审核中'; ?>
						</span>
					</p>
					<a class="btn btn-success" href="<?php echo site_url("project/info/$item->pid"); ?>">我要捐助</a>
					<?php if(!$item->is_supporter): ?>
						<button class="btn btn-warning support" value="<?php echo $item->pid; ?>">支持+1</button>
					<?php else:?>
						<button class="btn btn-warning disabled support" disabled value="<?php echo $item->pid; ?>">已经支持</button>
					<?php endif; ?>
				</div>
			</div>
			<hr />
			<br />
		<?php endforeach; ?>
		<?php else: ?>
		<p>没有该类别的任何求助信息.</p>
		<?php endif;?>
		</div>
		<div id="pagePane" class="pagination" style="float:right;position:relative;">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
		
</div>