<link type="text/css" href="./css/ui-lightness/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/cishan.css" />

<script type="text/javascript" src="./js/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="js/datepicker_zh.js"></script>
<script type="text/javascript">
	/* datepicker by qiangrw */
	$(function() {
		$( "#end" ).datepicker(
			{
				dateFormat: "yy-mm-dd",
				inline: true,
				minDate:$('#start').val()
			}
		);
		
		$( "#start" ).datepicker(
			{
				dateFormat: "yy-mm-dd",
				inline: true,
				onClose: function(start, inst) {
								$('.ui-datepicker-calendar a').attr('href','');
								var start = $('#start').val();
								var end = $('#end').val();
								$( "#end" ).datepicker( "option", "minDate", start );
								return;
						},
			}
		);
		
		
		
		//按钮事件 
		$('.passVol').bind("click",function() {
			var msg = "确认通过？";
			if (confirm(msg)){
				var projectid = <?php echo $pid; ?>;
				var btnObj = $(this);
				var volid = btnObj.attr('name');
				$.post(
					"index.php/project/verify_volunteer",
					{vid:volid,
					pid:projectid,
					action:0},
					function(data, textStatus){
						var json = jQuery.parseJSON(data);
						if(json.error_msg == 'OK') {
							alert("志愿者审核通过");
							var status="#status"+btnObj.attr('name');
							var passstatus="#pass"+btnObj.attr('name');
							var failstatus="#fail"+btnObj.attr('name');
							$(status).html('已通过');
							$(passstatus).hide();
							$(failstatus).hide();
							
						}
						else{
							alert(json.error_msg);
						}
					}
				);
			}
		});
		
		$('.failVol').bind("click",function() {
			var msg = "确认不通过？";
			if (confirm(msg)){
				var projectid = <?php echo $pid; ?>;
				var btnObj = $(this);
				var volid = btnObj.attr('name');
				$.post(
					"index.php/project/verify_volunteer",
					{vid:volid,
					pid:projectid,
					action:1},
					function(data, textStatus){
						var json = jQuery.parseJSON(data);
						if(json.error_msg == 'OK') {
							alert("志愿者审核不通过");
							var status="#vstatus"+btnObj.attr('name');
							$(status).hide();
						}
						else{
							alert(json.error_msg);
						}
					}
				);
			}
		});
	});
</script>

<div class="legend">
	<a href="<?php echo site_url("project/info/$pid"); ?>"><?php echo $project_info->title; ?></a> > 志愿者名单
</div>
<form class="well form-inline" method="GET" action="<?php echo site_url("project/volunteer_list/$pid/0/0/1"); ?>">
	开始日期: <input id="start" class="input-small" type="text" name="start_time" value="<?php echo $start_time;?>"/>
	结束日期: <input id="end" class="input-small" type="text" name="end_time" value="<?php echo $end_time;?>"/>
	<button type="submit" class="btn btn-success">查询</button>
	<a class="btn btn-success" href="<?php echo site_url("export/download_volunteer_list/$pid"); ?>">导出所有数据</a>
</form>

<div class="row-fluid">
<div class="span12">
<?php if($volunteer_list != NULL): ?>
<table class="table table-bordered">
<tr>
	<th>昵称</th>
	<th>真实姓名</th>
	<th>联系方式</th>
	<th>身份证号码</th>
	<th>所在城市</th>
	<th>报名时间</th>
	<th>申请理由</th>
	<th>审核状态</th>
	<th>操作</th>
</tr>
<?php foreach( $volunteer_list as $volunteer ): ?>
<tr id="vstatus<?php echo $volunteer->vid?>">
	<td><?php echo $volunteer->nickname;  ?></td>
	<td><?php echo $volunteer->realname;  ?></td>
	<td><?php echo $volunteer->phone;  ?></td>
	<td><?php echo $volunteer->idcard;  ?></td>
	<td><?php echo $volunteer->address;  ?></td>
	<td><?php echo $volunteer->create_time;  ?></td>
	<td><?php echo $volunteer->description;  ?></td>
	<td id="status<?php echo $volunteer->vid?>"><?php echo $volunteer->verify_status;  ?></td>
	<td> 
<?php if($volunteer->status == 2): ?>
		<button id="pass<?php echo $volunteer->vid?>" class="btn btn-success passVol"  name="<?php echo $volunteer->vid?>" value="<?php echo $volunteer->vid?>">通过</button>
		<button id="fail<?php echo $volunteer->vid?>" class="btn btn-success failVol"  name="<?php echo $volunteer->vid?>" value="<?php echo $volunteer->vid?>">取消</button>
<?php endif; ?>
	</td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div id="pagePane" class="pagination" style="float:right; ">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php else:?>
<p>目前还没有志愿者的信息.</p>
<?php endif; ?>
</div>

