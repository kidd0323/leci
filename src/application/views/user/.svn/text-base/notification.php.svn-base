<link rel="stylesheet" href="./css/cishan.css" />

<?php if($notification_list): ?>
<div class="row-fluid">
<div class="legend"> <span> 我的消息 </span></div>
<table class="table table-striped table-bordered">
	<tr>
		<th>发布人</th>
		<th>内容</th>
		<th>发布时间</th>
	</tr>
	<?php foreach($notification_list as $item): ?>
		<?php if($item->status == 3): ?>
		<tr>
			<td>系统管理员</td>
			<td><?php echo $item->content; ?></td>
			<td><?php echo $item->create_time; ?></td>
		</tr>
		<?php else: ?>
		<tr>
			<td><strong>系统管理员</strong></td>
			<td><strong><?php echo $item->content; ?></strong></td>
			<td><strong><?php echo $item->create_time; ?></strong></td>
		</tr>
		<?php endif; ?>
	<?php endforeach; ?>
</table>
<div id="pagePane" class="pagination" style="float:right; margin:auto auto;">
	<?php echo $this->pagination->create_links(); ?>
</div>
</div>
<?php else: ?>
<p>您还没有收到任何提醒.</p>
<?php endif; ?>