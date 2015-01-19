$(document).ready(function(){	

	/*修改密码*/
	/********************/
	$('#submit_button').attr('disabled', 'true');
	var pw =false, rw = false, rw2 = false;
	var get_ow = $("#originalPW").val();
	var get_pw = $("#passWord").val();
	var get_rw = $("#repeatedWord").val();	
	if (null != get_ow && get_ow.length>0)
		pw=true;
	if (null != get_pw && get_pw.length>0)
		rw=true;
	if (null != get_rw && get_rw.length>0)
		rw2=true;



	function isChecked(){
		if (pw && rw && rw2){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	}
	/*
	 *验证原始密码是否正确
	*/	
	//$("#originalPW").trigger("focus");//默认时文本框获取焦点

	$("#originalPW").focus(function() {//文本框获取焦点事件
		$("#spnOpw").html("请输入原密码");
	})

	$("#originalPW").blur(function() {//文本框丢失焦点事件
		var vpw = $("#originalPW").val();
		if (vpw.length == 0) {
			$("#spnOpw").html("原密码不能为空！");
			pw = false;
			isChecked();
		}
		else {
				$("#spnOpw").html("");
				pw = true;
				isChecked();
		}
	})
	$("#originalPW").keyup(function() {//文本框丢失焦点事件
		var vpw = $("#originalPW").val();
		if (vpw.length == 0) {
			$("#spnOpw").html("原密码不能为空！");
			pw = false;
			isChecked();
		}
		else {
				$("#spnOpw").html("");
				pw = true;
				isChecked();
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
		var opw = $("#originalPW").val();
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
			else if (verifyPwd(vpw,opw)){
				$("#spnPwd").html("新密码不能与旧密码相同");
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
		var opw = $("#originalPW").val();
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
			else if (verifyPwd(vpw,opw)){
				$("#spnPwd").html("新密码不能与旧密码相同");
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
	/*
	 *验证两次密码输入是否一致
	*/	
	$("#repeatedWord").keyup(function() {//文本框丢失焦点事件
		var vpw = $("#passWord").val();
		var vrw = $("#repeatedWord").val();
		if (vrw.length == 0) {
			$("#spnRwd").html("密码不能为空！");
			rw2 = false;
			isChecked();

		}
		else {
			if (!verifyPwd(vpw,vrw)) {
				$("#spnRwd").html("两次密码输入不一致！");
				rw2 = false;
				isChecked();
			} 
			else {//如果正确
				$("#spnRwd").html("");
				rw2 = true;
				isChecked();

			}
		}
	})
	$("#repeatedWord").blur(function() {//文本框丢失焦点事件
		var vpw = $("#passWord").val();
		var vrw = $("#repeatedWord").val();
		if (vrw.length == 0) {
			$("#spnRwd").html("密码不能为空！");
			rw2 = false;
			isChecked();

		}
		else {
			if (!verifyPwd(vpw,vrw)) {
				$("#spnRwd").html("两次密码输入不一致！");
				rw2 = false;
				isChecked();
			} 
			else {//如果正确
				$("#spnRwd").html("");
				rw2 = true;
				isChecked();

			}
		}
	})		
	
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
	
	
	/*忘记密码*/
	/***************/
	//$('#submit_forget_button').attr('disabled', 'true');
	
	$('#submit_forget_button').attr('disabled', 'true');
	var email =false, vcode=false;
	function isforgetChecked(){
		if (email && vcode){
			$('#submit_forget_button').removeAttr('disabled');
		}
		else{
			$('#submit_forget_button').attr('disabled', 'true');		
		}
	}
	/*
	 *验证邮箱格式是否正确
	*/
	//$("#txtEmail").trigger("focus");//默认时文本框获取焦点

	$("#txtEmail").focus(function() {//文本框获取焦点事件
		$("#spnTip").html("请输入您的注册邮箱.");
	})

	$("#txtEmail").blur(function() {//文本框丢失焦点事件
		var vtxt = $("#txtEmail").val();
		if (vtxt.length == 0) {
			$("#spnTip").html("邮箱地址不能为空！");
			email = false;
			isforgetChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#spnTip").html("邮箱格式不正确！");
				email = false;
				isforgetChecked();
			} 
			else {//如果正确
				$("#spnTip").html("");
				email = true;
				isforgetChecked();

			}
		}
	})
	$("#txtEmail").keyup(function() {//文本框丢失焦点事件
		var vtxt = $("#txtEmail").val();
		if (vtxt.length == 0) {
			$("#spnTip").html("邮箱地址不能为空！");
			email = false;
			isforgetChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#spnTip").html("邮箱格式不正确！");
				email = false;
				isforgetChecked();
			} 
			else {//如果正确
				$("#spnTip").html("");
				email = true;
				isforgetChecked();

			}
		}
	})

	$("#vCode").focus(function() {//文本框获取焦点事件
		$("#spnVcode").html("请输入正确的验证码");
	})

	$("#vCode").blur(function() {//文本框丢失焦点事件
		var vtxt = $("#vCode").val();
		if (vtxt.length == 0) {
			$("#spnVcode").html("验证码不能为空！");
			vcode = false;
			isforgetChecked();
		}
		else {
			vcode=true;
			isforgetChecked();
			}
	})
	$("#vCode").keyup(function() {//文本框丢失焦点事件
		var vtxt = $("#vCode").val();
		if (vtxt.length == 0) {
			$("#spnVcode").html("验证码不能为空！");
			vcode = false;
			isforgetChecked();
		}
		else {
			vcode=true;
			$("#spnVcode").hide();
			isforgetChecked();
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
	
	
	/*修改个人资料*/
	var rn =true, tel = true, idcard = true;
	function isinfoChecked(){
		if (rn && tel && idcard){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	}
	
	
	/*
	 *验证联系人姓名是否正确
	*/		
	//$("#realName").trigger("focus");//默认时文本框获取焦点

	$("#realName").focus(function() {//文本框获取焦点事件
		$("#spnRealname").html("请填写真实姓名");
	})

	$("#realName").blur(function() {//文本框丢失焦点事件
		var vrealname = $("#realName").val();
		if (vrealname.length == 0) {
			$("#spnRealname").html("联系人姓名不能为空！");
			rn = false;
			isinfoChecked();
		}
		else {

			$("#spnRealname").html("");
			rn = true;
			isinfoChecked();
		}
	})
	
	/*
	 *验证电话号码是否正确
	*/		
	//$("#Tel").trigger("focus");//默认时文本框获取焦点

	$("#Tel").focus(function() {//文本框获取焦点事件
		$("#spnTel").html("请填写正确的联系方式(区号-电话号码 或者 11位手机号)");
	})

	$("#Tel").blur(function() {//文本框丢失焦点事件
		var vtel = $("#Tel").val();
		if (vtel.length == 0) {
			$("#spnTel").html("联系方式不能为空！");
			tel = false;
			isinfoChecked();
		}
		else {
			if (chkTel(vtel) == "short") {
				$("#spnTel").html("联系方式位数错误！");
				tel = false;
				isinfoChecked();
			} 
			else if (chkTel(vtel) == "long") {
				$("#spnTel").html("联系方式位数错误！");
				tel = false;
				isinfoChecked();

			} 
			else if (chkTel(vtel) == "fail"){
				$("#spnTel").html("联系方式格式输入有误！");
				tel = false;
				isinfoChecked();

			}
			else {//如果正确
				$("#spnTel").html("");
				tel = true;
				isinfoChecked();

			}
		}
	})
	/*
	 *验证联系人身份证号码是否正确
	*/		
	//$("#identityCard").trigger("focus");//默认时文本框获取焦点

	$("#identityCard").focus(function() {//文本框获取焦点事件
		$("#spnIdentitycard").html("请填写真实的身份证号码");
	})

	$("#identityCard").blur(function() {//文本框丢失焦点事件
		var vic = $("#identityCard").val();
		if (vic.length == 0) {
			$("#spnIdentitycard").html("身份证号码不能为空！");
			idcard = false;
			isinfoChecked();

		}
		else {
			if (chk_idcard(vic) == -1) {
				$("#spnIdentitycard").html("身份证号码输入错误！");
				idcard = false;
				isinfoChecked();

			} 
			else {//如果正确
				$("#spnIdentitycard").html("");
				idcard = true;
				isinfoChecked();

			}
		}
	})

	function chkTel(tel) {
		var para=/^(\(\d{3,4}\)|\d{3,4}-)?\d{7,11}$/;
		if (tel.length > 12){
			return "long";
		}
		else if (tel.length <11 ){
			return "short"
		}
		else if (!para.test(tel)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
	function chk_idcard(idcard) {
	//var idcard = $.trim($("#idcard").val());
	if(idcard!="")  
	{      
		var aCity = { 11: "北京", 12: "天津", 13: "河北", 14: "山西", 15: "内蒙古",
				21: "辽宁", 22: "吉林", 23: "黑龙江", 31: "上海", 32: "江苏", 33: "浙江",
				34: "安徽", 35: "福建", 36: "江西", 37: "山东", 41: "河南", 42: "湖北",
				43: "湖南", 44: "广东", 45: "广西", 46: "海南", 50: "重庆", 51: "四川",
				52: "贵州", 53: "云南", 54: "西藏", 61: "陕西", 62: "甘肃", 63: "青海",
				64: "宁夏", 65: "新疆", 71: "台湾", 81: "香港", 82: "澳门", 91: "国外" };  
		var person_id=idcard;
		var sum = 0;  
		var birthday;  
		var patten=new RegExp(/(^\d{15}$)|(^\d{17}(\d|x|X)$)/i);    
		if (patten.exec(person_id)) {  
			person_id = person_id.replace(/x$/i,"a");        
			patten=new RegExp(/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/);  
			if(patten.exec(person_id)) {      
				birthday = "19"+person_id.substring(6,8)+"-"+person_id.substring(8,10)+"-"+person_id.substring(10,12);                        
			}                             
			else   
			{                             
				birthday =person_id.substring(6,10)+"-"+person_id.substring(10,12)+"-"+person_id.substring(12,14);  
							 
				for (var i = 17; i >= 0; i--){  
					sum += (Math.pow(2, i) % 11) * parseInt(person_id.charAt(17 - i), 11);  
				}  
				if (sum % 11 != 1) {  
					//alert("你输入的身份证号非法"+(sum));  
					return -1;  
				}                         
			}  
			//检测证件地区的合法性                                                        
			if (aCity[parseInt(person_id.substring(0, 2))] == null){  
				//alert("身份证地区非法");  
				return -1;  
			}  
			var dateStr = new Date(birthday.replace(/-/g, "/"));                              
		   //为值添加0  
			function Append_zore(temp)  
			{  
				if(temp<10)   
				{  
				  return "0"+temp;  
				}  
			   else   
				{  
				   return temp;  
				}  
			}     
							
			if (birthday != (dateStr.getFullYear()+"-"+ Append_zore(dateStr.getMonth()+1)+"-"+ Append_zore(dateStr.getDate()))) {  
			   //alert("身份证的出生日期非法");  
				return -1;  
			}                                                   
		}  
		else{  
			//alert("输入的身份证号码的长度或格式错误");    
			return -1;  
		}                         
	}  
	else  
	{  
		return 0;
	}  
	return 1;

}  


	$("#submit_info_button").bind("click",function(){
		var vmsg = "确认修改资料？"; 
		if (confirm(vmsg)) {
			var userid = $("#get_uid").val();
			var u_name = $("#realName").val();
			var u_phone = $("#Tel").val();
			var u_idcard = $("#identityCard").val();
			var u_province=document.getElementById("province").value;
			var u_city=document.getElementById("city").value;
			var u_district=document.getElementById("district").value;
			
			$.post(
				"index.php/user/submit_edit_detail_info",
				{uid:userid,
				c_realname:u_name,
				c_phone:u_phone,
				c_idcard:u_idcard,
				c_province:u_province,
				c_city:u_city,
				c_district:u_district},
				function(data){
					var json = jQuery.parseJSON(data);
					if(json.error_msg == 'OK') {
						alert('修改成功!');
					} else  {
						alert(json.error_msg);
					}
				}
			);
		}

	});
	
	
	/*重发验证信*/
	$('#submit_confirm_button').attr('disabled', 'true');
	var vemail=$("#confirm_txtEmail").val();
	var vyz=$("#confirm_Vcode").val();
	var c_email =false, c_vvCode=false;
	if (null!=vemail&&vemail.length>0)
		c_email=true;
		
	if (null!=vyz&&vyz.length>0)
		vvCode=true;
	function isConfirmChecked(){
		if (c_email && c_vvCode){
			$('#submit_confirm_button').removeAttr('disabled');
		}
		else{
			$('#submit_confirm_button').attr('disabled', 'true');		
		}
	}

	$("#confirm_txtEmail").focus(function() {//文本框获取焦点事件
		$("#confirm_spnTip").html("请输入您常用邮箱地址！");
	})

	$("#confirm_txtEmail").blur(function() {//文本框丢失焦点事件
		var vtxt = $("#confirm_txtEmail").val();
		if (vtxt.length == 0) {
			$("#confirm_spnTip").html("邮箱地址不能为空！");
			c_email = false;
			isConfirmChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#confirm_spnTip").html("邮箱格式不正确！");
				c_email = false;
				isConfirmChecked();
			} 
			else {//如果正确
				$("#confirm_spnTip").html("");
				c_email = true;
				isConfirmChecked();
			}
		}
	})
	$("#confirm_txtEmail").keyup(function() {//文本框丢失焦点事件
		var vtxt = $("#confirm_txtEmail").val();
		if (vtxt.length == 0) {
			$("#confirm_spnTip").html("邮箱地址不能为空！");
			c_email = false;
			isConfirmChecked();
		}
		else {
			if (!chkEmail(vtxt)) {//检测邮箱格式是否正确
				$("#confirm_spnTip").html("邮箱格式不正确！");
				c_email = false;
				isConfirmChecked();
			} 
			else {//如果正确
				$("#confirm_spnTip").html("");
				c_email = true;
				isConfirmChecked();
			}
		}
	})
	
	$("#confirm_Vcode").focus(function() {//文本框获取焦点事件
		$("#confirm_spnVcode").html("请输入验证码");
	})

	$("#confirm_Vcode").keyup(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vvcode = $("#confirm_Vcode").val();
		if (vvcode.length == 0) {
			$("#confirm_spnVcode").html("验证码不能为空！");
			c_vvCode = false;
			isConfirmChecked();

		}
		else{
			$("#confirm_spnVcode").hide();
			c_vvCode=true;
			isConfirmChecked();
		}
	})
	$("#confirm_Vcode").blur(function() {	//文本框丢失焦点事件	changetokeyup edit by qiangrw
		var vvcode = $("#confirm_Vcode").val();
		if (vvcode.length == 0) {
			$("#confirm_spnVcode").html("验证码不能为空！");
			c_vvCode = false;
			isConfirmChecked();

		}
		else{
			$("#confirm_spnVcode").hide();
			c_vvCode=true;
			isConfirmChecked();
		}
	})	

		
})
