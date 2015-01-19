<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url();?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>管理员登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="慈善网">
</head>
<body>
    <h1>管理员登录页面</h1>
	<?php echo form_open("admin/submit_login"); ?>
	<p>
		<?php 
		echo form_label('Email Address', 'email_address');
        $input_data = array(
                        'name' => 'email_address',
                        'id' => 'email_address',
                        'value' => set_value('email_address')
                        );
		echo form_input($input_data); 
		?>
	</p>
	<p>
		<?php 
		echo form_label('Password', 'password');
		echo form_password('password', '', 'id="password"'); 
		?>
	</p>
	<p>
		<?php echo form_submit('submit', '登录'); ?>	
	</p>
	<?php echo form_close(); ?>
	
	<?php echo validation_errors(); ?>
</body>
</html>
