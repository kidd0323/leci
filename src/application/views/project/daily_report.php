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
	});
</script>

<div class="legend">
	<a href="<?php echo site_url("project/info/$pid"); ?>"><?php echo $project_info->title; ?></a> > 项目数据统计
</div>
<form class="well form-inline" method="GET" action="<?php echo site_url("project/daily_report/$pid/0/0/1"); ?>">
	开始日期: <input id="start" class="input-small" type="text" name="start_time" value="<?php echo $start_time;?>"/>
	结束日期: <input id="end" class="input-small" type="text" name="end_time" value="<?php echo $end_time;?>" />
	<button type="submit" class="btn btn-success">查询</button>
	<a class="btn btn-success" href="<?php echo site_url("export/download_daily_report/$pid"); ?>">导出所有数据</a>
</form>

<div class="row-fluid">
<div class="span12">
<?php if($donate_list != NULL): ?>
<table class="table table-bordered">
<tr>
	<th>捐助时间</th>
	<th>捐助人昵称</th>
	<th>捐助金额</th>
</tr>
<?php foreach( $donate_list as $donate ): ?>
<tr>
	<td><?php echo $donate->create_time;  ?></td>
	<td><?php echo $donate->nickname;  ?></td>
	<td><?php echo $donate->money;  ?></td>
</tr>
<?php endforeach;?>
</table>
</div>
<div id="pagePane" class="pagination" style="float:right; ">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php else: ?>
<p>目前还没有该项目此时间段的捐款数据.</p>
<?php endif; ?>
</div>

