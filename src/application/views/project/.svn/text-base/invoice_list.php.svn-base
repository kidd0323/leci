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
	<a href="<?php echo site_url("project/info/$pid"); ?>"><?php echo $project_info->title; ?></a> > 发票申请名单
</div>

<form class="well form-inline" method="GET" action="<?php echo site_url("project/invoice_list/$pid/0/0/1"); ?>">
	开始日期: <input id="start" class="input-small" type="text" name="start_time" value="<?php echo $start_time;?>"/>
	结束日期: <input id="end" class="input-small" type="text" name="end_time" value="<?php echo $end_time;?>" />
	<button type="submit" class="btn btn-success">查询</button>
	<a class="btn btn-success" href="<?php echo site_url("export/download_invoice_list/$pid"); ?>">导出所有数据</a>
</form>

<div class="row-fluid">
<div class="span12">
<?php if($invoice_list != NULL): ?>
<table  class="table table-bordered">
<tr>
	<th>用户名</th>
	<th>发票抬头</th>
	<th>联系方式</th>
	<th>寄送地址</th>
	<th>邮编</th>
	<th>申请时间</th>
</tr>
<?php foreach( $invoice_list as $invoice ): ?>
<tr>
	<td><?php echo $invoice->nickname;  ?></td>
	<td><?php echo $invoice->title;  ?></td>
	<td><?php echo $invoice->phone;  ?></td>
	<td><?php echo $invoice->address;  ?></td>
	<td><?php echo $invoice->zip_code;  ?></td>
	<td><?php echo $invoice->create_time;  ?></td>
</tr>
<?php endforeach;?>
</table>
</div>
<div id="pagePane" class="pagination" style="float:right; ">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php else: ?>
<p>没有该时间段的发票申请.</p>
<?php endif; ?>
</div>