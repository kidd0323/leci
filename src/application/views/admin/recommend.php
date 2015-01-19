<form action="index.php/admin/submit_insert_help_recommend" method="POST">
<div class="control-group">
    <label class="control-label" for="project_id">项目ID</label>
    <div class="controls">
        <input type="text" name="project_id" />
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <input class="btn-primary" type="submit" value="添加求助推荐" />
    </div>
</div>
    <?php if ($insert_error_msg): ?>
    <?php echo $insert_error_msg; ?>
    <?php endif; ?>
</form>

<?php if ($recommend_list): ?>
<table class="table">
<tr>
    <td>序号</td>
    <td>项目</td>
    <td>项目简介</td>
    <td>项目ID</td>
    <td>创建者</td>
    <td>最后修改时间</td>
    <td>操作</td>
</tr>

<?php $recommend_cnt = 1; ?>
<?php foreach ($recommend_list as $row): ?>
<tr>
    <form action="index.php/admin/submit_modify_help_recommend" method="POST">
    <input type="hidden" name="rpid" value="<?php echo $row->rpid; ?>" />
    <td><?php echo $recommend_cnt; ?></td>
    <td><?php echo $row->title; ?></td>
    <td>
        <input type="text" name="description" style="width:240px;" value="<?php echo $row->description; ?>" />
    </td>
    <td>
        <input type="text" name="project_id" style="width:40px;" value="<?php echo $row->project_id; ?>" />
    </td>
    <td><?php echo $row->create_admin_name; ?></td>
    <td><?php echo $row->modify_time; ?></td>
    <td>
        <input type="submit" class="btn" value="修改" />
        <a type="button" class="btn" href="index.php/admin/submit_withdraw_help_recommend/<?php echo $row->rpid; ?>">撤销</a>
    </td>
    </form>
</tr>
<?php $recommend_cnt ++; ?>
<?php endforeach; ?>
</table>
<?php if ($modify_error_msg): ?>
<?php echo $modify_error_msg; ?>
<?php endif;endif; ?>