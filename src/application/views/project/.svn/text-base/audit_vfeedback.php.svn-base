<link rel="stylesheet" href="./css/cishan.css" />

<script type="text/javascript">
	$(function() {
		$("a.fb_image").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'hideOnContentClick': true,
			'titlePosition' : 'outside',
		});

		$('.passVolfb').bind("click",pass);
		function pass() {
			var msg = "确认通过？";
			if (confirm(msg)){
				var projectid = <?php echo $pid; ?>;
				var btnObj = $(this);
				var volid = btnObj.attr('name');
				$.post(
					"index.php/project/verify_vfeedback",
					{pid:projectid,
					vfb_id:volid,
					action:3},
					function(data, textStatus){
						var json = jQuery.parseJSON(data);
						if(json.error_msg == 'OK') {
							alert("操作成功");
							var status="#status"+btnObj.attr('name');
							$(status).html("审核已通过");
						
							var action="#action"+btnObj.attr('name');
							$(action).html("取消");	
							
							$('.passVolfb').unbind().bind("click",fail);
							
							
							return;							
							
						}
						else{
							alert(json.error_msg);
						}
					}
				);
			}
		}
		
		$('.failVolfb').bind("click",fail);
		function fail() {
			var msg = "确认不通过？";
			if (confirm(msg)){
				var projectid = <?php echo $pid; ?>;
				var btnObj = $(this);
				var volid = btnObj.attr('name');
				$.post(
					"index.php/project/verify_vfeedback",
					{pid:projectid,
					vfb_id:volid,
					action:2},
					function(data, textStatus){
						var json = jQuery.parseJSON(data);
						if(json.error_msg == 'OK') {
							alert("操作成功");
							var status="#status"+btnObj.attr('name');
							$(status).html("审核未通过");
							var action="#action"+btnObj.attr('name');
							$(action).html("通过");	
							$('.failVolfb').unbind().bind("click",pass);
							
							
							return;
							
						}
						else{
							alert(json.error_msg);
						}
					}
				);
			}
		}
	});
</script>
<div class="legend">
	<a href="<?php echo site_url("project/info/$pid"); ?>"><?php echo $project_info->title; ?></a> > 审核志愿者反馈
</div>

<?php if($vfeedback_list): ?>
<table class="table table-bordered">
	<tr>
		<th>姓名</th>
		<th>反馈内容</th>
		<th>反馈时间</th>
		<th>状态</th>
		<th>动作</th>
	</tr>
	<?php foreach($vfeedback_list as $info): ?>
	<tr>
		<td class="span1"><?php echo $info->nickname; ?></td>
		<td class="span12">
			<?php echo $info->fb_content; ?>
			<br />
			<?php foreach( $info->pics as $pic): if($pic != ''): ?>
			<a class="fb_image" href="./uploads/feedback/<?php echo $pic;?>">
			<img src="./uploads/feedback/<?php echo $pic;?>" width=90 height=90/> 
			</a>
			<?php endif; endforeach; ?>
		</td>
		<td class="span2"><?php echo $info->create_time; ?></td>
		
		<?php if($info->status == 2): ?>
			<td class="span2" id="status<?php echo $info->vfb_id; ?>">审核未通过</td>
			<td class="span2">&nbsp;&nbsp;&nbsp;&nbsp;<button id="action<?php echo $info->vfb_id; ?>" class="btn btn-success passVolfb"  name="<?php echo $info->vfb_id ?>" value="<?php echo $info->vfb_id ?>">通过</button>
			</td>
		<?php elseif($info->status == 3): ?>
			<td class="span2" id="status<?php echo $info->vfb_id; ?>">审核已通过</td>
			<td class="span2">&nbsp;&nbsp;&nbsp;&nbsp;<button id="action<?php echo $info->vfb_id; ?>" class="btn btn-success failVolfb"  name="<?php echo $info->vfb_id ?>" value="<?php echo $info->vfb_id ?>">取消</button>
			</td>
		<?php endif ?>
		
	</tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
<p>暂时没有任何志愿者反馈信息需要审核。</p>
<?php endif; ?>

<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />