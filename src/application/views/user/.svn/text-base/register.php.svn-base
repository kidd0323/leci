<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript" src="./js/jquery-register.js"></script>


<form action="<?php echo site_url("user/submit_register"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>注册新账号</span></div>
<div class="contentMiddle">
<br />
<fieldset>
<div class="control-group">
	<label class="control-label" for="email">邮箱：</label>
	<div class="controls">
		<input id="txtEmail" type="text" name="email" autofocus="autofocus" value="<?php echo set_value('email'); ?>"/>
		<span id="spnTip" class="help-inline"><?php echo form_error('email'); ?></span>
	</div>
</div>


<div class="control-group">
	<label class="control-label" for="nickname">昵称：</label>
	<div class="controls">
		<input  id="nickName" type="text" name="nickname" value="<?php echo set_value('nickname'); ?>" />
		<span id="spnName" class="help-inline"><?php echo form_error('nickname'); ?></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="password">创建密码：</label>
	<div class="controls">
		<input id="passWord" type="password" name="password" />
		<span id="spnPwd" class="help-inline"><?php echo form_error('password'); ?></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="password_conf">确认密码：</label>
	<div class="controls">
		<input id="repeatedWord" type="password" name="password_conf" />
		<span id="spnRwd" class="help-inline"><?php echo form_error('password_conf'); ?></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="vcode">验证码：</label>	
	<div class="controls">
		<input id="Vcode" type="text" name="vcode" />
		<span id="spnVcode" class="help-inline"><?php echo form_error('vcode'); ?></span>
	</div>
</div>

<div class="control-group">	
	<div class="controls">
		<img src="index.php/vcode/generate_vcode" alt="读取失败"></img>
	</div>
</div>

<div class="control-group">	
	<div class="controls">
		<label for="checkbox" class="checkbox">
			<input id="Protocal" type="checkbox" name="checkbox" checked /> 
				我已经同意<a target="_blank" href="<?php echo site_url('siteinfo/service_items'); ?>">《乐慈网服务条款》</a>
		</label>
		<span class="help-inline"><?php echo form_error('checkbox'); ?></span>
	</div>
</div>

<div class="form-actions">
	<input id="submit_register_button" class="btn btn-success" type="submit" value="注册新账号" />
</div>
</fieldset>
</div>
</form>