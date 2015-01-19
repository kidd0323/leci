<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript" src="./js/jquery-user.js"></script>

<form action="<?php echo site_url("user/submit_forget_password"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>忘记密码</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<div class="control-group">
	<label class="control-label" for="email">邮箱：</label>
	<div class="controls">
		<input tabindex=1 id="txtEmail" type="text" name="email"/>
		<span id="spnTip" class="spnInit help-inline"><?php echo form_error('email'); ?></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="vcode">验证码：</label>
	<div class="controls">
		<input tabindex=2 id="vCode" type="text" name="vcode" />
		<span id="spnVcode" class="help-inline"><?php echo form_error('vcode'); ?></span>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<img src="index.php/vcode/generate_vcode" alt="读取失败"></img>
	</div>
</div>
<div class="form-actions">
	<input tabindex=3 id="submit_forget_button" class="btn btn-success" type="submit" value="重置密码" />
</div>
</fieldset>
</div>
</form>