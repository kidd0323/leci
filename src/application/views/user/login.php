<link rel="stylesheet" href="./css/cishan.css" />
<form action="<?php echo site_url("user/submit_login"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>用户登录</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<input type="hidden" name="url" value="<?php echo $url; ?>" />
<div class="control-group">
	<label class="control-label" for="email">邮箱：</label>
	<div class="controls">
		<input tabindex=1 type="text" name="email" autofocus="autofocus" value="<?php echo set_value('email'); ?>"/>
		<span class="help-inline">
			<label class="error"><?php echo form_error('email'); ?></label>
		</span>
	</div>
	
</div>
<div class="control-group">
	<label class="control-label" for="password">密码：</label>
	<div class="controls">
		<input tabindex=2 type="password" name="password" />
		<span class="help-inline error"><?php echo form_error('password'); ?></span>
	</div>
</div>

<div class="control-group">
	<div class="controls">
		<div class="span2">&nbsp;</div>
		<span class="help-inline"><a href="<?php echo site_url("user/forget_password"); ?>" name="forget_password">忘记密码?</a></span>
	</div>
</div>

<div class="form-actions">
	<input tabindex=3 class="btn btn-success" type="submit" value="登录" />
	<a class="btn btn-success"  value="重发确认信" href="<?php echo site_url("user/resend_confirm_mail"); ?>">重发确认信</a>
	<a href="<?php echo site_url("user/register"); ?>">注册新用户</a>
</div>
</fieldset>
</div>
</form>