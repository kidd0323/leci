<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript" src="./js/jquery-user.js"></script>

<form action="<?php echo site_url("user/submit_resend_confirm_mail"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>重发确认信</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<div class="control-group">
	<label class="control-label" for="email">邮箱：</label>
	<div class="controls">
		<input id="confirm_txtEmail" type="text" name="email" value="<?php echo set_value('email'); ?>"/>  
		<span id="confirm_spnTip" class="spnInit help-inline"><?php echo form_error('email'); ?></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="vcode">验证码：</label>
	<div class="controls">
		<input id="confirm_Vcode" type="text" name="vcode" />
		<span id="confirm_spnVcode" class="spnInit help-inline"><?php echo form_error('vcode'); ?></span>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<img src="index.php/vcode/generate_vcode" alt="读取失败"></img>
	</div>
</div>
<div class="form-actions">
	<input id="submit_confirm_button" class="btn btn-success" type="submit" value="重发确认信" />
</div>
</fieldset>
</div>
</form>