var status=1;
var v_file=true;
$(document).ready(function(){	
	/*发起求助信息*/
	var mtitle=false, mobject=false, mb_des=false, mdes=false, mfile=false, mendtime=false;
	var vtitle = $("#projectTitle").val();
	var vname = $("#assistName").val();
	var vshortdes = $("#shortDes").val();
	var vdes = $("#Description").val();
	var vendtime = $("#finishDate").val(); 
	if (vtitle.length>0)
		mtitle=true;
	if (vname.length>0)
		mobject=true;
	if (vshortdes.length>0)
		mb_des=true;
	if (vdes.length>0)
		mdes=true;
	if (vendtime.length>0)
		mendtime=true;




	
   //isChecked();
	$('#submit_button').attr('disabled', 'true');		
	$('#volunteerNum').attr('disabled', 'true');			
	$('#targetMoney').attr('disabled', 'true');	
	$('#bankName').attr('disabled', 'true');
	$('#bankID').attr('disabled', 'true');	
	$('#bankID2').attr('disabled', 'true');
	$('#bankIDName').attr('disabled', 'true');	
	
	$('#Receiver').attr('disabled', 'true');	
	$('#Address').attr('disabled', 'true');
	$('#postCode').attr('disabled', 'true');	
	$('#Tel').attr('disabled', 'true');	
	
	
	$('#submit_button').click(function (){
		checkall();
		checkfile();
	})
	
	var mybox1 = $("#myBox1:checked");
	if (mybox1.length > 0){
		$('#targetMoney').removeAttr('disabled');
		$('#bankName').removeAttr('disabled');
		$('#bankID').removeAttr('disabled');
		$('#bankID2').removeAttr('disabled');
		$('#bankIDName').removeAttr('disabled');
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		

		}
	}
	else{
		$('#targetMoney').attr('disabled', 'true');	
		$('#bankName').attr('disabled', 'true');
		$('#bankID').attr('disabled', 'true');	
		$('#bankID2').attr('disabled', 'true');	
		$('#bankIDName').attr('disabled', 'true');	
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}		
	}	


	var mybox2 = $("#myBox2:checked");
	if (mybox2.length > 0){
		$('#Receiver').removeAttr('disabled');
		$('#Address').removeAttr('disabled');
		$('#postCode').removeAttr('disabled');
		$('#Tel').removeAttr('disabled');
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	}
	else{
		$('#Receiver').attr('disabled', 'true');	
		$('#Address').attr('disabled', 'true');
		$('#postCode').attr('disabled', 'true');	
		$('#Tel').attr('disabled', 'true');		
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}		
	}	

	var mybox3 = $("#myBox3:checked");
	if (mybox3.length > 0){
		$('#volunteerNum').removeAttr('disabled');

		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	}
	else{
		$('#volunteerNum').attr('disabled', 'true');	
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}		
	}	
	
	$('#myBox1').click(function () {  
		var mybox1 = $("#myBox1:checked");
		if (mybox1.length > 0){
			$('#targetMoney').removeAttr('disabled');
			$('#bankName').removeAttr('disabled');
			$('#bankID').removeAttr('disabled');
			$('#bankID2').removeAttr('disabled');
			$('#bankIDName').removeAttr('disabled');
		}
		else{
			$('#targetMoney').attr('disabled', 'true');	
			$('#bankName').attr('disabled', 'true');
			$('#bankID').attr('disabled', 'true');	
			$('#bankID2').attr('disabled', 'true');	
			$('#bankIDName').attr('disabled', 'true');				
		}	
	
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	 })		

	$('#myBox2').click(function () {  
		var mybox2 = $("#myBox2:checked");
		if (mybox2.length > 0){
			$('#Receiver').removeAttr('disabled');
			$('#Address').removeAttr('disabled');
			$('#postCode').removeAttr('disabled');
			$('#Tel').removeAttr('disabled');
		}
		else{
			$('#Receiver').attr('disabled', 'true');	
			$('#Address').attr('disabled', 'true');
			$('#postCode').attr('disabled', 'true');	
			$('#Tel').attr('disabled', 'true');				
		}	
	
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	 })	
	
	
	$('#myBox3').click(function () {  
		var mybox3 = $("#myBox3:checked");
		if (mybox3.length > 0){
			$('#volunteerNum').removeAttr('disabled');
		}
		else{
			$('#volunteerNum').attr('disabled', 'true');				
		}	
	
		if (isChecked()){
			$('#submit_button').removeAttr('disabled');
		}
		else{
			$('#submit_button').attr('disabled', 'true');		
		}
	 })
	 
	 /*
	   *验证至少上传一张照片
	 */
	 function checkfile(){
		var p1 = document.all('pic1').value; 
		var p2 = document.all('pic2').value; 
		var p3 = document.all('pic3').value;
		var p4 = document.all('pic4').value;
		var p5 = document.all('pic5').value;
		if (p1 == ""&&p2 == ""&& p3 == ""&&p4 == ""&&p5 == ""){
			return false;
		}
		else{
			return true;
		}
	 }
	
	/*
	 *验证项目名称是否正确
	*/		
	//$("#projectTitle").trigger("focus");//默认时文本框获取焦点

	$("#projectTitle").focus(function() {//文本框获取焦点事件
		$("#spnTitle").html("可输入6-64位，可支持中英文");
		mtitle=false;
	})

	$("#projectTitle").keyup(function() {//文本框丢失焦点事件
		var vtitle = $("#projectTitle").val();
		if (vtitle.length == 0) {
			$("#spnTitle").html("项目名称不能为空！");
			mtitle=false;
		}
		else {
			if (chkTitle(vtitle) == "short") {
				$("#spnTitle").html("项目名称过短！");
				mtitle=false;
			} 
			else if (chkTitle(vtitle) == "long") {
				$("#spnTitle").html("项目名称过长！");
				mtitle=false;
			} 
			else if (chkTitle(vtitle) == "fail"){
				$("#spnTitle").html("项目名称输入不合法");
				mtitle=false;
			}
			else {//如果正确
				$("#spnTitle").html("");
				mtitle=true;
			}
		}
	})
	$("#projectTitle").blur(function() {//文本框丢失焦点事件
		var vtitle = $("#projectTitle").val();
		if (vtitle.length == 0) {
			$("#spnTitle").html("项目名称不能为空！");
			mtitle=false;
		}
		else {
			if (chkTitle(vtitle) == "short") {
				$("#spnTitle").html("项目名称过短！");
				mtitle=false;
			} 
			else if (chkTitle(vtitle) == "long") {
				$("#spnTitle").html("项目名称过长！");
				mtitle=false;
			} 
			else if (chkTitle(vtitle) == "fail"){
				$("#spnTitle").html("项目名称输入不合法");
				mtitle=false;
			}
			else {//如果正确
				$("#spnTitle").html("");
				mtitle=true;
			}
		}
	})		
	/*
	 *验证救助对象名称是否正确
	*/		
	//$("#assistName").trigger("focus");//默认时文本框获取焦点

	$("#assistName").focus(function() {//文本框获取焦点事件
		$("#spnName").html("可输入2-32位，可支持中英文");
		mobject=false;
	})

	$("#assistName").keyup(function() {//文本框丢失焦点事件
		var vname = $("#assistName").val();
		if (vname.length == 0) {
			$("#spnName").html("救助对象名称不能为空！");
			mobject=false;
		}
		else {
			if (chkAssistname(vname) == "short") {
				$("#spnName").html("救助对象名称过短！");
				mobject=false;
			} 
			else if (chkAssistname(vname) == "long") {
				$("#spnName").html("救助对象名称过长！");
				mobject=false;
			} 
			else if (chkAssistname(vname) == "fail"){
				$("#spnName").html("救助对象名称输入不合法");
				mobject=false;
			}
			else {//如果正确
				$("#spnName").html("");
				mobject=true;
			}
		}
	})
	$("#assistName").blur(function() {//文本框丢失焦点事件
		var vname = $("#assistName").val();
		if (vname.length == 0) {
			$("#spnName").html("救助对象名称不能为空！");
			mobject=false;
		}
		else {
			if (chkAssistname(vname) == "short") {
				$("#spnName").html("救助对象名称过短！");
				mobject=false;
			} 
			else if (chkAssistname(vname) == "long") {
				$("#spnName").html("救助对象名称过长！");
				mobject=false;
			} 
			else if (chkAssistname(vname) == "fail"){
				$("#spnName").html("救助对象名称输入不合法");
				mobject=false;
			}
			else {//如果正确
				$("#spnName").html("");
				mobject=true;
			}
		}
	})
	/*
	 *验证推荐语是否正确
	*/		
	//$("#shortDes").trigger("focus");//默认时文本框获取焦点

	$("#shortDes").focus(function() {//文本框获取焦点事件
		$("#spnShortdes").html("可输入6-40位，可支持中英文");
		mb_des=false;
	})

	$("#shortDes").keyup(function() {//文本框丢失焦点事件
		var vshortdes = $("#shortDes").val();
		if (vshortdes.length == 0) {
			$("#spnShortdes").html("简要描述不能为空！");
			mb_des=false;
		}
		else {
			if (chkBrief(vshortdes) == "short") {
				$("#spnShortdes").html("简要描称过短！");
				mb_des=false;
			} 
			else if (chkBrief(vshortdes) == "long") {
				$("#spnShortdes").html("简要描述过长！");
				mb_des=false;
			} 
			else if (chkBrief(vshortdes) == "fail"){
				$("#spnShortdes").html("简要描述输入不合法");
				mb_des=false;
			}
			else {//如果正确
				$("#spnShortdes").html("");
				mb_des=true;
			}
		}
	})
	$("#shortDes").blur(function() {//文本框丢失焦点事件
		var vshortdes = $("#shortDes").val();
		if (vshortdes.length == 0) {
			$("#spnShortdes").html("简要描述不能为空！");
			mb_des=false;
		}
		else {
			if (chkBrief(vshortdes) == "short") {
				$("#spnShortdes").html("简要描称过短！");
				mb_des=false;
			} 
			else if (chkBrief(vshortdes) == "long") {
				$("#spnShortdes").html("简要描述过长！");
				mb_des=false;
			} 
			else if (chkBrief(vshortdes) == "fail"){
				$("#spnShortdes").html("简要描述输入不合法");
				mb_des=false;
			}
			else {//如果正确
				$("#spnShortdes").html("");
				mb_des=true;
			}
		}
	})

	/*
	 *验证项目描述是否正确
	*/		
	//$("#Description").trigger("focus");//默认时文本框获取焦点

	$("#Description").focus(function() {//文本框获取焦点事件
		$("#spnDes").html("可输入6-10000位，可支持中英文");
		mdes=false;
	})

	$("#Description").keyup(function() {//文本框丢失焦点事件
		var vdes = $("#Description").val();
		if (vdes.length == 0) {
			$("#spnDes").html("项目描述不能为空！");
			mdes=false;
		}
		else {
			if (chkDes(vdes) == "short") {
				$("#spnDes").html("项目描述过短！");
				mdes=false;
			} 
			else if (chkDes(vdes) == "long") {
				$("#spnDes").html("项目描述过长！");
				mdes=false;
			} 
			else {//如果正确
				$("#spnDes").html("");
				mdes=true;
			}
		}
	})
	$("#Description").blur(function() {//文本框丢失焦点事件
		var vdes = $("#Description").val();
		if (vdes.length == 0) {
			$("#spnDes").html("项目描述不能为空！");
			mdes=false;
		}
		else {
			if (chkDes(vdes) == "short") {
				$("#spnDes").html("项目描述过短！");
				mdes=false;
			} 
			else if (chkDes(vdes) == "long") {
				$("#spnDes").html("项目描述过长！");
				mdes=false;
			} 
			else {//如果正确
				$("#spnDes").html("");
				mdes=true;
			}
		}
	})
	/*
	 *验证目标金额是否正确
	*/		
	//$("#targetMoney").trigger("focus");//默认时文本框获取焦点

	$("#targetMoney").focus(function() {//文本框获取焦点事件
		$("#spnMoney").html("可输入10-100000之间的数字");
	})

	$("#targetMoney").keyup(function() {//文本框丢失焦点事件
		var vmoney = $("#targetMoney").val();
		if (vmoney.length == 0) {
			$("#spnMoney").html("目标金额不能为空！");
		}
		else {
			if (chkMoney(vmoney) == "short") {
				$("#spnMoney").html("目标金额过少！");
			} 
			else if (chkMoney(vmoney) == "long") {
				$("#spnMoney").html("目标金额过大！");
			} 
			else if (chkMoney(vmoney) == "fail"){
				$("#spnMoney").html("目标金额输入有误！");
			}
			else {//如果正确
				$("#spnMoney").html("");
			}
		}
	})
	$("#targetMoney").blur(function() {//文本框丢失焦点事件
		var vmoney = $("#targetMoney").val();
		if (vmoney.length == 0) {
			$("#spnMoney").html("目标金额不能为空！");
		}
		else {
			if (chkMoney(vmoney) == "short") {
				$("#spnMoney").html("目标金额过少！");
			} 
			else if (chkMoney(vmoney) == "long") {
				$("#spnMoney").html("目标金额过大！");
			} 
			else if (chkMoney(vmoney) == "fail"){
				$("#spnMoney").html("目标金额输入有误！");
			}
			else {//如果正确
				$("#spnMoney").html("");
			}
		}
	})		
	/*
	 *验证开户银行是否正确
	*/		
	//$("#bankName").trigger("focus");//默认时文本框获取焦点

	$("#bankName").focus(function() {//文本框获取焦点事件
		$("#spnBank").html("请填写正确的开户银行名称");
	})

	$("#bankName").keyup(function() {//文本框丢失焦点事件
		var vbank = $("#bankName").val();
		if (vbank.length == 0) {
			$("#spnBank").html("开户银行名称不能为空！");
		}
		else {

			$("#spnBank").html("");
		}
	})
	$("#bankName").blur(function() {//文本框丢失焦点事件
		var vbank = $("#bankName").val();
		if (vbank.length == 0) {
			$("#spnBank").html("开户银行名称不能为空！");
		}
		else {

			$("#spnBank").html("");
		}
	})
	/*
	 *验证银行卡号是否正确
	*/		
	//$("#bankID").trigger("focus");//默认时文本框获取焦点

	$("#bankID").focus(function() {//文本框获取焦点事件
		$("#spnBankid").html("请填写正确的银行卡号");
	})

	$("#bankID").keyup(function() {//文本框丢失焦点事件
		var vbank = $("#bankID").val();
		if (vbank.length == 0) {
			$("#spnBankid").html("银行卡号不能为空！");
		}
		else {
			if (chkBankid(vbank) == "short") {
				$("#spnBankid").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank) == "long") {
				$("#spnBankid").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank) == "fail"){
				$("#spnBankid").html("银行卡号格式输入有误！");
			}
			else {//如果正确
				$("#spnBankid").html("");
			}
		}
	})
	$("#bankID").blur(function() {//文本框丢失焦点事件
		var vbank = $("#bankID").val();
		if (vbank.length == 0) {
			$("#spnBankid").html("银行卡号不能为空！");
		}
		else {
			if (chkBankid(vbank) == "short") {
				$("#spnBankid").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank) == "long") {
				$("#spnBankid").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank) == "fail"){
				$("#spnBankid").html("银行卡号格式输入有误！");
			}
			else {//如果正确
				$("#spnBankid").html("");
			}
		}
	})

	/*
	 *验证两次银行卡账号输入是否一直
	*/		
	//$("#bankID").trigger("focus");//默认时文本框获取焦点

	$("#bankID2").focus(function() {//文本框获取焦点事件
		$("#spnBankid2").html("请再次填写正确的银行卡号");
	})

	$("#bankID2").keyup(function() {//文本框丢失焦点事件
		var vbank2 = $("#bankID2").val();
		var vbank = $('#bankID').val();
		if (vbank2.length == 0) {
			$("#spnBankid2").html("银行卡号不能为空！");
		}
		else {
			if (chkBankid(vbank2) == "short") {
				$("#spnBankid2").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank2) == "long") {
				$("#spnBankid2").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank2) == "fail"){
				$("#spnBankid2").html("银行卡号格式输入有误！");
			}
			else if (vbank2 != vbank){
				$("#spnBankid2").html("两次银行卡号输入不一致！");					
			}
			else {//如果正确
				$("#spnBankid2").html("");
			}
		}
	})
	$("#bankID2").blur(function() {//文本框丢失焦点事件
		var vbank2 = $("#bankID2").val();
		var vbank = $('#bankID').val();
		if (vbank2.length == 0) {
			$("#spnBankid2").html("银行卡号不能为空！");
		}
		else {
			if (chkBankid(vbank2) == "short") {
				$("#spnBankid2").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank2) == "long") {
				$("#spnBankid2").html("银行卡号位数错误！");
			} 
			else if (chkBankid(vbank2) == "fail"){
				$("#spnBankid2").html("银行卡号格式输入有误！");
			}
			else if (vbank2 != vbank){
				$("#spnBankid2").html("两次银行卡号输入不一致！");					
			}
			else {//如果正确
				$("#spnBankid2").html("");
			}
		}
	})

	/*
	 *验证银行账户名是否正确
	*/		
	//$("#bankIDName").trigger("focus");//默认时文本框获取焦点

	$("#bankIDName").focus(function() {//文本框获取焦点事件
		$("#spnBankidname").html("请填写正确的银行账户名名称");
	})

	$("#bankIDName").keyup(function() {//文本框丢失焦点事件
		var vbankidname = $("#bankIDName").val();
		if (vbankidname.length == 0) {
			$("#spnBankidname").html("银行账户名不能为空！");
		}
		else {

			$("#spnBankidname").html("");
		}
	})
	$("#bankIDName").blur(function() {//文本框丢失焦点事件
		var vbankidname = $("#bankIDName").val();
		if (vbankidname.length == 0) {
			$("#spnBankidname").html("银行账户名不能为空！");
		}
		else {

			$("#spnBankidname").html("");
		}
	})
	/*
	 *验证联系人姓名是否正确
	*/		
	//$("#realName").trigger("focus");//默认时文本框获取焦点

	$("#realName").focus(function() {//文本框获取焦点事件
		$("#spnRealname").html("请填写真实姓名");
	})

	$("#realName").keyup(function() {//文本框丢失焦点事件
		var vrealname = $("#realName").val();
		if (vrealname.length == 0) {
			$("#spnRealname").html("联系人姓名不能为空！");
		}
		else {

			$("#spnRealname").html("");
		}
	})
	$("#realName").blur(function() {//文本框丢失焦点事件
		var vrealname = $("#realName").val();
		if (vrealname.length == 0) {
			$("#spnRealname").html("联系人姓名不能为空！");
		}
		else {

			$("#spnRealname").html("");
		}
	})
	/*
	 *验证收件人姓名是否正确
	*/		
	//$("#Receiver").trigger("focus");//默认时文本框获取焦点

	$("#Receiver").focus(function() {//文本框获取焦点事件
		$("#spnReceiver").html("请填写正确的收件人姓名");
	})

	$("#Receiver").keyup(function() {//文本框丢失焦点事件
		var vreceiver = $("#Receiver").val();
		if (vreceiver.length == 0) {
			$("#spnReceiver").html("收件人姓名不能为空！");
		}
		else {

			$("#spnReceiver").html("");
		}
	})
	$("#Receiver").blur(function() {//文本框丢失焦点事件
		var vreceiver = $("#Receiver").val();
		if (vreceiver.length == 0) {
			$("#spnReceiver").html("收件人姓名不能为空！");
		}
		else {

			$("#spnReceiver").html("");
		}
	})
	/*
	 *验证收件人地址是否正确
	*/		
	//$("#Address").trigger("focus");//默认时文本框获取焦点

	$("#Address").focus(function() {//文本框获取焦点事件
		$("#spnAddress").html("请填写正确的收件人地址");
	})

	$("#Address").keyup(function() {//文本框丢失焦点事件
		var vaddress = $("#Address").val();
		if (vaddress.length == 0) {
			$("#spnAddress").html("收件人地址不能为空！");
		}
		else {

			$("#spnAddress").html("");
		}
	})
	$("#Address").blur(function() {//文本框丢失焦点事件
		var vaddress = $("#Address").val();
		if (vaddress.length == 0) {
			$("#spnAddress").html("收件人地址不能为空！");
		}
		else {

			$("#spnAddress").html("");
		}
	})
	/*
	 *验证邮政编码是否正确
	*/		
	//$("#postCode").trigger("focus");//默认时文本框获取焦点

	$("#postCode").focus(function() {//文本框获取焦点事件
		$("#spnPostcode").html("请填写正确的邮政编码");
	})

	$("#postCode").keyup(function() {//文本框丢失焦点事件
		var vpc = $("#postCode").val();
		if (vpc.length == 0) {
			$("#spnPostcode").html("邮政编码不能为空！");
		}
		else {
			if (chkPostcode(vpc) == "short") {
				$("#spnPostcode").html("邮政编码位数错误！");
			} 
			else if (chkPostcode(vpc) == "long") {
				$("#spnPostcode").html("邮政编码位数错误！");
			} 
			else if (chkPostcode(vpc) == "fail"){
				$("#spnPostcode").html("邮政编码格式输入有误！");
			}
			else {//如果正确
				$("#spnPostcode").html("");
			}
		}
	})
	$("#postCode").blur(function() {//文本框丢失焦点事件
		var vpc = $("#postCode").val();
		if (vpc.length == 0) {
			$("#spnPostcode").html("邮政编码不能为空！");
		}
		else {
			if (chkPostcode(vpc) == "short") {
				$("#spnPostcode").html("邮政编码位数错误！");
			} 
			else if (chkPostcode(vpc) == "long") {
				$("#spnPostcode").html("邮政编码位数错误！");
			} 
			else if (chkPostcode(vpc) == "fail"){
				$("#spnPostcode").html("邮政编码格式输入有误！");
			}
			else {//如果正确
				$("#spnPostcode").html("");
			}
		}
	})
	/*
	 *验证电话号码是否正确
	*/		
	//$("#Tel").trigger("focus");//默认时文本框获取焦点

	$("#Tel").focus(function() {//文本框获取焦点事件
		$("#spnTel").html("请填写正确的联系方式(区号-电话号码 或者 11位手机号)");
	})

	$("#Tel").keyup(function() {//文本框丢失焦点事件
		var vtel = $("#Tel").val();
		if (vtel.length == 0) {
			$("#spnTel").html("联系方式不能为空！");
		}
		else {
			if (chkTel(vtel) == "short") {
				$("#spnTel").html("联系方式位数错误！");
			} 
			else if (chkTel(vtel) == "long") {
				$("#spnTel").html("联系方式位数错误！");
			} 
			else if (chkTel(vtel) == "fail"){
				$("#spnTel").html("联系方式格式输入有误！");
			}
			else {//如果正确
				$("#spnTel").html("");
			}
		}
	})
	$("#Tel").blur(function() {//文本框丢失焦点事件
		var vtel = $("#Tel").val();
		if (vtel.length == 0) {
			$("#spnTel").html("联系方式不能为空！");
		}
		else {
			if (chkTel(vtel) == "short") {
				$("#spnTel").html("联系方式位数错误！");
			} 
			else if (chkTel(vtel) == "long") {
				$("#spnTel").html("联系方式位数错误！");
			} 
			else if (chkTel(vtel) == "fail"){
				$("#spnTel").html("联系方式格式输入有误！");
			}
			else {//如果正确
				$("#spnTel").html("");
			}
		}
	})
	/*
	 *验证募集志愿者是否正确
	*/		
	//$("#volunteerNum").trigger("focus");//默认时文本框获取焦点

	$("#volunteerNum").focus(function() {//文本框获取焦点事件
		$("#spnVolunteernum").html("请填写需要募集的志愿者人数");
	})

	$("#volunteerNum").keyup(function() {//文本框丢失焦点事件
		var vvol = $("#volunteerNum").val();
		if (vvol.length == 0) {
			$("#spnVolunteernum").html("志愿者人数不能为空！");
		}
		else {
			if (chkVolunteer(vvol) == "fail"){
				$("#spnVolunteernum").html("志愿者人数输入有误！");
			}
			else if (vvol>100000000){
				$("#spnVolunteernum").html("志愿者人数不得大于100000000！");			
			}
			else {//如果正确
				$("#spnVolunteernum").html("");
			}
		}
	})
	$("#volunteerNum").blur(function() {//文本框丢失焦点事件
		var vvol = $("#volunteerNum").val();
		if (vvol.length == 0) {
			$("#spnVolunteernum").html("志愿者人数不能为空！");
		}
		else {
			if (chkVolunteer(vvol) == "fail"){
				$("#spnVolunteernum").html("志愿者人数输入有误！");
			}
			else if (vvol>100000000){
				$("#spnVolunteernum").html("志愿者人数不得大于100000000！");			
			}
			else {//如果正确
				$("#spnVolunteernum").html("");
			}
		}
	})
	
	/*
	 *验证手机号码是否正确
	*/		
	//$("#cellPhone").trigger("focus");//默认时文本框获取焦点

	$("#cellPhone").focus(function() {//文本框获取焦点事件
		$("#spnCellphone").html("请填写正确的手机号码");
	})

	$("#cellPhone").keyup(function() {//文本框丢失焦点事件
		var vcp = $("#cellPhone").val();
		if (vcp.length == 0) {
			$("#spnCellphone").html("手机号码不能为空！");
		}
		else {
			if (chkCellphone(vcp) == "short") {
				$("#spnCellphone").html("手机号码位数错误！");
			} 
			else if (chkCellphone(vcp) == "long") {
				$("#spnCellphone").html("手机号码位数错误！");
			} 
			else if (chkCellphone(vcp) == "fail"){
				$("#spnCellphone").html("手机号码格式输入有误！");
			}
			else {//如果正确
				$("#spnCellphone").html("");
			}
		}
	})
	$("#cellPhone").blur(function() {//文本框丢失焦点事件
		var vcp = $("#cellPhone").val();
		if (vcp.length == 0) {
			$("#spnCellphone").html("手机号码不能为空！");
		}
		else {
			if (chkCellphone(vcp) == "short") {
				$("#spnCellphone").html("手机号码位数错误！");
			} 
			else if (chkCellphone(vcp) == "long") {
				$("#spnCellphone").html("手机号码位数错误！");
			} 
			else if (chkCellphone(vcp) == "fail"){
				$("#spnCellphone").html("手机号码格式输入有误！");
			}
			else {//如果正确
				$("#spnCellphone").html("");
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

	$("#identityCard").keyup(function() {//文本框丢失焦点事件
		var vic = $("#identityCard").val();
		if (vic.length == 0) {
			$("#spnIdentitycard").html("身份证号码不能为空！");
		}
		else {
			if (chk_idcard(vic) == -1) {
				$("#spnIdentitycard").html("身份证号码输入错误！");
			} 
			else {//如果正确
				$("#spnIdentitycard").html("");
			}
		}
	})
	$("#identityCard").blur(function() {//文本框丢失焦点事件
		var vic = $("#identityCard").val();
		if (vic.length == 0) {
			$("#spnIdentitycard").html("身份证号码不能为空！");
		}
		else {
			if (chk_idcard(vic) == -1) {
				$("#spnIdentitycard").html("身份证号码输入错误！");
			} 
			else {//如果正确
				$("#spnIdentitycard").html("");
			}
		}
	})
	
	function chkTitle(projecttitle) {
		var para=/^([\u4e00-\u9fa5]|[a-zA-Z0-9_]|[\u3002\uff1b\uff0c\uff1a\u201c\u201d\uff08\uff09\u3001\uff1f\u300a\u300b]){6,64}$/;
		if (projecttitle.length > 64){
			return "long";
		}
		else if (projecttitle.length <6 ){
			return "short"
		}
		else if (!para.test(projecttitle)){
			return "fail";
		}
		else{
			return "success"
		}
	}
	function chkAssistname(assistname) {
		var para=/^([\u4e00-\u9fa5]|[a-zA-Z0-9_]|[\u3002\uff1b\uff0c\uff1a\u201c\u201d\uff08\uff09\u3001\uff1f\u300a\u300b]){2,32}$/;
		if (assistname.length > 32){
			return "long";
		}
		else if (assistname.length <2 ){
			return "short"
		}
		else if (!para.test(assistname)){
			return "fail";
		}
		else{
			return "success"
		}
	}
	function chkBrief(content) {
		var para=/^([\u4e00-\u9fa5]|[a-zA-Z0-9_]|[\u3002\uff1b\uff0c\uff1a\u201c\u201d\uff08\uff09\u3001\uff1f\u300a\u300b]){6,40}$/;
		if (content.length > 40){
			return "long";
		}
		else if (content.length <6 ){
			return "short"
		}
		else if (!para.test(content)){
			return "fail";
		}
		else{
			return "success"
		}
	}
	function chkDes(des) {
		//var para=/^([\u4e00-\u9fa5]|[a-za-z0-9_]){6,10000}$/;
		if (des.length > 10000){
			return "long";
		}
		else if (des.length <6 ){
			return "short"
		}
		else{
			return "success"
		}
	}
	function chkMoney(money) {
		var para=/^[0-9]*[1-9][0-9]*$/;
		if (money > 100000){
			return "long";
		}
		else if (money <10 ){
			return "short"
		}
		else if (!para.test(money)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
	function chkBankid(bankid) {
		var para=/^[0-9]{16,19}$/;
		if (bankid.length > 19){
			return "long";
		}
		else if (bankid.length <16 ){
			return "short"
		}
		else if (!para.test(bankid)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
	function chkPostcode(pc) {
		var para=/^[1-9]\d{5}(?!\d)$/;
		if (pc.length > 6){
			return "long";
		}
		else if (pc.length <6 ){
			return "short"
		}
		else if (!para.test(pc)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
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
	function chkVolunteer(vol) {
		var para=/^[1-9][0-9]*$/;
		if (!para.test(vol)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
	function chkCellphone(cp) {
		var para=/^1[3,5,8]\d{9}$/;
		if (cp.length > 11){
			return "long";
		}
		else if (cp.length <11 ){
			return "short"
		}
		else if (!para.test(cp)){
			return "fail";
		}
		else  {
			return "success"
		}
	}

	function chkIdentitycard(ic) {
		var para=/^\d{17}[\dxX]|\d{15}$/;
		if (ic.length > 18){
			return "long";
		}
		else if (ic.length <18 ){
			return "short"
		}
		else if (!para.test(ic)){
			return "fail";
		}
		else  {
			return "success"
		}
	}
	//新版检验身份证
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
	
	
	function isChecked(){
		  var a = $(":checkbox:checked");
		  if ( a.length ==0 ) {
			return false;
			}
			else{
				return true;
			}
		}
	function checkall(){
		var pfile = document.all('application_file').value;
		if (pfile){
			mfile=true;
		}
		
		//mendtime = true;	// 用JQUERY-UI控件来判断 默认为正确
		/*var vendtime = $("#finishDate").val(); 

		var today=new Date();
		var t_str = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
		
		var com=true;
		if(Date.parse(t_str) <= Date.parse(vendtime)){ //今天日期 小于等于 结束时间 正确
			com=false;
		}
		else{
			com=true;
		}
		if (com){
			alert('结束日期必须在今天之后!');
			mendtime=false;
		}				
		else{
			mendtime=true;
		}*/
		if (!mtitle || !mobject || !mb_des || !mdes ||!mfile ||!checkfile()){
			if(!mtitle){
				alert('标题填写有误，请重新填写');
			}
			if(!mobject){
				alert('救助对象填写有误，请重新填写');
			}
			if(!mb_des){
				alert('简要描述填写有误，请重新填写');
			}
			if (!mdes){
				alert('项目介绍填写有误，请重新填写');
			}
			if(!mfile){
				alert('请上传相关证明');
			}
			if(!checkfile()){
				alert('请上传至少一张相关图片')
			}
			status=0;
		}
		else{
			status= 1;
		}
			
	}
})
function judge()
{
	if(status==1){
		return true;
	}
	else{
		return false;
	}
}

