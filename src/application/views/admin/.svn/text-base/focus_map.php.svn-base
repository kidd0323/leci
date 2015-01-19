<form action="index.php/admin/submit_insert_focus_map" method="POST" enctype="multipart/form-data">
<div class="control-group">
    <label class="control-label" for="focus_map_upload">上传文件</label>
    <div class="controls">
        <input type="file" name="focus_map_upload" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="project_id">项目ID</label>
    <div class="controls">
        <input type="text" name="project_id" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <input class="btn-primary" type="submit" value="添加焦点图" />
    </div>
</div>
</form>

<hr>

<?php if ($focus_map): ?>
<table class="table">
<tr>
    <td>序号</td>
    <td>图片（大小不得超过1M，支持png，gif, jpg）</td>
    <td>项目ID</td>
    <td>创建者</td>
    <td>最后修改时间</td>
    <td>操作</td>
</tr>

<?php $focus_map_cnt = 1;?>
<?php foreach ($focus_map as $row): ?>
<tr>
    <form action="index.php/admin/submit_modify_focus_map" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="hpid" value="<?php echo $row->hpid; ?>" />
    <td><?php echo $focus_map_cnt ?></td>
    <td>
        <img src="<?php echo $row->pic_url ?>" height="20px" width="40px" />
        <input type="file" name="focus_map_upload" />
    </td>
    <td>
        <input type="text" name="project_id" style="width:40px;"  value="<?php echo $row->project_id; ?>" />
    </td>
    <td><?php echo $row->create_admin_name; ?></td>
    <td><?php echo $row->last_modify_time; ?></td>
    <td>
        <input type="submit" class="btn" value="修改" />
        <a type="button" class="btn" href="index.php/admin/submit_withdraw_focus_map/<?php echo $row->hpid ?>">撤销</a>
    </td>
    </form>
</tr>
<?php $focus_map_cnt ++; ?>
<?php endforeach; ?>
</table>
<?php endif; ?>

<p>
<?php echo $error_msg; ?>
</p>