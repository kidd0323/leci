<link rel="stylesheet" href="./css/cishan.css" />
<script type="text/javascript">
	$(function() {
	    $('#submit_button').attr('disabled', 'true');
		var rw = false, rw2 = false;
		function isChecked(){
			if (rw && rw2){
				$('#submit_button').removeAttr('disabled');
			}
			else{
		    	$('#submit_button').attr('disabled', 'true');		
			}
		}
		$("#passWord").focus(function() {//文本框获取焦点事件
			$("#spnPwd").html("可输入6-16位，可支持半角英文数字符号组合");
		})

		$("#passWord").blur(function() {//文本框丢失焦点事件
			var vpw = $("#passWord").val();
			if (vpw.length == 0) {
				$("#spnPwd").html("密码不能为空！");
				rw = false;
				isChecked();
			}
			else {
				if (chkPwd(vpw) == "short") {
					$("#spnPwd").html("密码过短！");
					rw = false;
					isChecked();
				} 
				else if (chkPwd(vpw) == "long") {
					$("#spnPwd").html("密码过长！");
					rw = false;
					isChecked();
				} 
				else if (chkPwd(vpw) == "fail"){
					$("#spnPwd").html("密码输入不合法");
					rw = false;
					isChecked();
				}
				else {//如果正确
					$("#spnPwd").html("");
					rw = true;
					isChecked();
				}
			}
		})
		$("#passWord").keyup(function() {//文本框丢失焦点事件
			var vpw = $("#passWord").val();
			if (vpw.length == 0) {
				$("#spnPwd").html("密码不能为空！");
				rw = false;
				isChecked();
			}
			else {
				if (chkPwd(vpw) == "short") {
					$("#spnPwd").html("密码过短！");
					rw = false;
					isChecked();
				} 
				else if (chkPwd(vpw) == "long") {
					$("#spnPwd").html("密码过长！");
					rw = false;
					isChecked();
				} 
				else if (chkPwd(vpw) == "fail"){
					$("#spnPwd").html("密码输入不合法");
					rw = false;
					isChecked();
				}
				else {//如果正确
					$("#spnPwd").html("");
					rw = true;
					isChecked();
				}
			}
		})
		// 验证两次密码输入是否一致
		$("#repeatedWord").keyup(checkConsistent); // edit by qiangrw
		function checkConsistent() {
			var vpw = $("#passWord").val();
			var vrw = $("#repeatedWord").val();
			if (vrw.length == 0) {
				$("#spnRwd").html("密码不能为空！");
				rw2 = false;
				isChecked();
			} else {
				if (!verifyPwd(vpw,vrw)) {
					$("#spnRwd").html("两次密码输入不一致！");
					rw2 = false;
					isChecked();
				} else {//如果正确
					$("#spnRwd").html("");
					rw2 = true;
					isChecked();
				}
			}
		}
		
		
		function chkPwd(pwd) {			
			var para=/^([a-zA-Z0-9_]){6,16}$/;
			if (pwd.length > 16){
				return "long";
			}
			else if (pwd.length <6 ){
				return "short"
			}
			else if (!para.test(pwd)){
				return "fail";
			}
			else{
				return "success"
			}
		}
		
		
		function verifyPwd(pwd1,pwd2){
			if (pwd1 == pwd2){
				return true;
			}
			else{
				return false;
			}
		}
	})
</script>


<form action="<?php echo site_url("user/submit_reset_password"); ?>" method="POST" class="form-horizontal">
<div class="legend"><span>重发确认信</span></div>
<div class="contentMiddle">
<fieldset>
<br />
<div class="control-group">
	<label class="control-label" for="password">新密码：</label>
	<div class="controls">
		<input id="passWord" type="password" name="password" />
		<span id="spnPwd" class="spnInit help-inline"></span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="password_confirm">新密码确认：</label>
	<div class="controls">
		<input id="repeatedWord" type="password" name="password_confirm" /> 
		<span id="spnRwd" class="spnInit help-inline"></span>
	</div>
</div>

<input type="hidden" name="uid"  value="<?php echo $uid; ?>" />
<input type="hidden" name="token" value="<?php echo $token; ?>" />

<div class="form-actions">
	<input id="submit_button" class="btn btn-success" type="submit" value="确认重置密码" />
</div>
</fieldset>
</div>
</form>



