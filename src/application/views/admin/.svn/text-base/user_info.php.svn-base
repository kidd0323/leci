<script type="text/javascript" src="./js/jquery-paging-user-info.js"></script>
<div id="user_info_list">
<?php if ($user_list): ?>
<table class="table">
<tr>
    <td>序号</td>
    <td>注册邮箱</td>
    <td>注册时间</td>
    <td>姓名</td>
    <td>用户身份</td>
    <td>身份证号</td>
    <td>联系电话</td>
    <td>操作</td>
</tr>

<input type="hidden" name="total_user" id="total_page" value="<?php echo $total_user; ?>" />

<?php $user_cnt = 1; ?>
<?php foreach ($user_list as $row): ?>
<tr>
    <form action="index.php/admin/submit_modify_user" method="POST">
    <input type="hidden" name="uid" value="<?php echo $row->uid; ?>" />
    <td><?php echo $user_cnt; ?></td>
    <td><?php echo $row->email; ?></td>
    <td><?php echo $row->create_time; ?></td>
    <td><?php echo $row->nickname; ?></td>
    <td>
        <select name="gid">
        <option value="1" <?php if($row->gid==1) echo 'selected'; ?>>管理员</option>
        <option value="2" <?php if($row->gid==2) echo 'selected'; ?>>普通用户</option>
        <option value="3" <?php if($row->gid==3) echo 'selected'; ?>>企业用户</option>
        </select>
    </td>
    <td><?php echo $row->idcard; ?></td>
    <td><?php echo $row->phone; ?></td>
    <td>
        <input type="submit" class="btn" value="修改" />
        <a type="button" class="btn" href="index.php/admin/submit_del_user/<?php echo $row->uid; ?>">删除</a>
    </td>
    </form>
</tr>
<?php $user_cnt ++; ?>
<?php endforeach; ?>
</table>

<?php endif; ?>
</div>

<div>
	<ul id="page_ul">
		<div id="page_idx_div" class="pagination">
		</div>
	</ul>
</div>
