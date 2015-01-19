$(document).ready(function(){	

	/*注册*/
	/********************/
	$('#submit_register_button').attr('disabled', 'true');
	var email =false, nickName = false, passWord= false, repeatWord = false, vvCode=false, protocal=true;
	var vvtxt = $("#txtEmail").val();
	if (vvtxt.length >0) {
		email=true;
	}
	var vvname = $("#nickName").val();
	if (vvname.length >0) {
		nickName=true;
	}
	var vvpw = $("#passWord").val();
	if (vvpw.length >0) {
		passWord=true;
	}
	var vvrw = $("#repeatedWord").val();
	if (vvrw.length == 0) {
		repeatWord=true;
	}
	var vvvcode = $("#Vcode").val();
	if (vvvcode.length == 0) {
		vvCode=true;
	}
	
	
	function isChecked(){
		if (email && nickName && passWord && repeatWord && vvCode && protocal){
			$('#submit_register_button').removeAttr('disabled');
		}
		else{
			$('#submit_register_button').attr('disabled', 'true');		
		}
	}

	$("#txtEmail").focus(function() {//文本框获取焦点事件
		$("#spnTip").html("请输入您常用邮箱地址！");
	})

	$("#txtEmail").blur(function() {//文本框丢失焦点事件
		var vtxt = $("#txtEmail").val();
		if (vtxt.length == 0) {
			$("#spnTip").html("邮箱地址不能为空！");
			email = false;
			isChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#spnTip").html("邮箱格式不正确！");
				email = false;
				isChecked();
			} 
			else {//如果正确
				$("#spnTip").html("（提交后，验证信息有可能在您的垃圾邮箱中，请注意查收！）");
				email = true;
				isChecked();
			}
		}
	})
	$("#txtEmail").keyup(function() {//文本框丢失焦点事件
		var vtxt = $("#txtEmail").val();
		if (vtxt.length == 0) {
			$("#spnTip").html("邮箱地址不能为空！");
			email = false;
			isChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#spnTip").html("邮箱格式不正确！");
				email = false;
				isChecked();
			} 
			else {//如果正确
				$("#spnTip").html("");
				email = true;
				isChecked();
			}
		}
	})
	
	/*
	 *验证昵称是否正确
	*/		
	//$("#nickName").trigger("focus");//默认时文本框获取焦点

	$("#nickName").focus(function() {//文本框获取焦点事件
		$("#spnName").html("可输1-12位，可支持中英文");
	})

	$("#nickName").blur(function() {//文本框丢失焦点事件
		var vname = $("#nickName").val();
		if (vname.length == 0) {
			$("#spnName").html("昵称不能为空！");
			nickName = false;
			isChecked();
		}
		else {
			if (chkNickname(vname) == "short") {
				$("#spnName").html("昵称过短！");
				nickName = false;
				isChecked();
			} 
			else if (chkNickname(vname) == "long") {
				$("#spnName").html("昵称过长！");
				nickName = false;
				isChecked();
			} 
			else if (chkNickname(vname) == "fail"){
				$("#spnName").html("昵称输入不合法");
				nickName = false;
				isChecked();

			}
			else {//如果正确
				$("#spnName").html("");
				nickName = true;
				isChecked();

			}
		}
	})
	$("#nickName").keyup(function() {//文本框丢失焦点事件
		var vname = $("#nickName").val();
		if (vname.length == 0) {
			$("#spnName").html("昵称不能为空！");
			nickName = false;
			isChecked();
		}
		else {
			if (chkNickname(vname) == "short") {
				$("#spnName").html("昵称过短！");
				nickName = false;
				isChecked();
			} 
			else if (chkNickname(vname) == "long") {
				$("#spnName").html("昵称过长！");
				nickName = false;
				isChecked();
			} 
			else if (chkNickname(vname) == "fail"){
				$("#spnName").html("昵称输入不合法");
				nickName = false;
				isChecked();

			}
			else {//如果正确
				$("#spnName").html("");
				nickName = true;
				isChecked();

			}
		}
	})
	/*
	 *验证密码是否正确
	*/	
	//$("#passWord").trigger("focus");//默认时文本框获取焦点

	$("#passWord").focus(function() {//文本框获取焦点事件
		$("#spnPwd").html("可输入6-16位，可支持半角英文数字符号组合");
	})

	$("#passWord").blur(function() {//文本框丢失焦点事件
		var vpw = $("#passWord").val();
		if (vpw.length == 0) {
			$("#spnPwd").html("密码不能为空！");
			passWord = false;
			isChecked();

		}
		else {
			if (chkPwd(vpw) == "short") {
				$("#spnPwd").html("密码过短！");
				passWord = false;
				isChecked();

			} 
			else if (chkPwd(vpw) == "long") {
				$("#spnPwd").html("密码过长！");
				passWord = false;
				isChecked();

			} 
			else if (chkPwd(vpw) == "fail"){
				$("#spnPwd").html("密码输入不合法");
				passWord = false;
				isChecked();

			}
			else {//如果正确
				$("#spnPwd").html("");
				passWord = true;
				isChecked();

			}
		}
	})

	$("#passWord").keyup(function() {//文本框丢失焦点事件
		var vpw = $("#passWord").val();
		if (vpw.length == 0) {
			$("#spnPwd").html("密码不能为空！");
			passWord = false;
			isChecked();

		}
		else {
			if (chkPwd(vpw) == "short") {
				$("#spnPwd").html("密码过短！");
				passWord = false;
				isChecked();

			} 
			else if (chkPwd(vpw) == "long") {
				$("#spnPwd").html("密码过长！");
				passWord = false;
				isChecked();

			} 
			else if (chkPwd(vpw) == "fail"){
				$("#spnPwd").html("密码输入不合法");
				passWord = false;
				isChecked();

			}
			else {//如果正确
				$("#spnPwd").html("");
				passWord = true;
				isChecked();

			}
		}
	})
	/*
	 *验证两次密码输入是否一致
	*/	
	//$("#repeatedWord").trigger("focus");//默认时文本框获取焦点

	$("#repeatedWord").focus(function() {//文本框获取焦点事件
		$("#spnRwd").html("再次输入密码，两次输入要保持一致");
	})

	$("#repeatedWord").keyup(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vpw = $("#passWord").val();
		var vrw = $("#repeatedWord").val();
		if (vrw.length == 0) {
			$("#spnRwd").html("密码不能为空！");
			repeatWord = false;
			isChecked();

		}
		else {
			if (!verifyPwd(vpw,vrw)) {
				$("#spnRwd").html("两次密码输入不一致！");
				repeatWord = false;
				isChecked();

			} 
			else {//如果正确
				$("#spnRwd").html("");
				repeatWord = true;
				isChecked();

			}
		}
	})
	$("#repeatedWord").blur(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vpw = $("#passWord").val();
		var vrw = $("#repeatedWord").val();
		if (vrw.length == 0) {
			$("#spnRwd").html("密码不能为空！");
			repeatWord = false;
			isChecked();

		}
		else {
			if (!verifyPwd(vpw,vrw)) {
				$("#spnRwd").html("两次密码输入不一致！");
				repeatWord = false;
				isChecked();

			} 
			else {//如果正确
				$("#spnRwd").html("");
				repeatWord = true;
				isChecked();

			}
		}
	})
	
	$("#Vcode").focus(function() {//文本框获取焦点事件
		$("#spnVcode").html("请输入验证码");
	})

	$("#Vcode").keyup(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vvcode = $("#Vcode").val();
		if (vvcode.length == 0) {
			$("#spnVcode").html("验证码不能为空！");
			vvCode = false;
			isChecked();

		}
		else{
			$("#spnVcode").hide();
			vvCode=true;
			isChecked();
		}
	})
	$("#Vcode").blur(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vvcode = $("#Vcode").val();
		if (vvcode.length == 0) {
			$("#spnVcode").html("验证码不能为空！");
			vvCode = false;
			isChecked();

		}
		else{
			$("#spnVcode").hide();
			vvCode=true;
			isChecked();
		}
	})
	
	
	$('#Protocal').click(function () {  
		var mybox = $("#Protocal:checked");
		if (mybox.length > 0){
			protocal = true;	
			isChecked();
		}
		else{
			protocal = false;		
			isChecked();				
		}	

	 })	
	
	

	function chkEmail(strEmail) {
		if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(strEmail)) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function chkNickname(nickname) {
		var para=/^([\u4e00-\u9fa5]|[a-zA-Z0-9_]){1,12}$/;
		if (nickname.length > 12){
			return "long";
		}
		else if (nickname.length < 1){
			return "short"
		}
		else if (!para.test(nickname)){
			return "fail";
		}
		else{
			return "success"
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
