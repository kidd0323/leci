<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript" src="./js/jquery-user.js"></script>

<div class="subnav">
  <ul class="nav nav-pills rightColumn">
	<li><a href="<?php echo site_url("user/info"); ?>">用户资料</a></li>
	<li class="active"><a href="<?php echo site_url("user/change_password"); ?>">修改密码</a></li>
  </ul>
</div>

<form action="<?php echo site_url("user/submit_change_password"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>密码修改</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<div class="control-group">
	<label class="control-label" for="old_password">原密码:</label>
	<div class="controls">
		<input id="originalPW" type="password" name="old_password" autofocus="autofocus"/>
		<span id="spnOpw" class="spnInit help-inline"><?php echo form_error('old_password'); ?></span> 
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="new_password">新密码：</label>
	<div class="controls">
		<input id="passWord" type="password" name="new_password" />
		<span id="spnPwd" class="spnInit help-inline"><?php echo form_error('new_password'); ?></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="new_password">新密码确认：</label>
	<div class="controls">
		<input id="repeatedWord" type="password" name="new_password_confirm" />
		<span id="spnRwd" class="spnInit help-inline"><?php echo form_error('new_password_confirm'); ?></span>
	</div>
</div>

<div class="form-actions">
	<input id="submit_button" class="btn btn-success" type="submit" value="确认修改" />
</div>
</fieldset>
</div>
</form>



