$(document).ready(function(){	
	
	/**
	 * 志愿者检验函数
	 */
	var realname_ok=false;
	var phone_ok=false;
	var idcard_ok=false;
	var description_ok=false;

	function chk_realname() {
		 var realname = $.trim($("#realname").val());
		 realname_ok = false;
		 if(realname=="") {
		  return 0;
		 }
		 else if(realname.length<2 || realname.length>32 ){
		  return -2;
		 }
		 else if(/^[\u4e00-\u9fa5]+$/.test(realname)){
			 realname_ok = true;
			  return 1;
		 }
		 return -1;
	} 
	
	function chk_phone() {
		phone_ok = false;
		 var phone = $.trim($("#phone").val());
		 if(phone=="")
			 return 0;
		 var pattern=/^(1+\d{10})$/;
		 if(phone.length == 11 && pattern.test(phone)) {
			phone_ok = true;
			 return 1;
		 }
		 return -1;
	} 
	
	function chk_idcard() {
		idcard_ok = false;
		var idcard = $.trim($("#idcard").val());
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
		idcard_ok = true;
		return 1;
	
	}  
	
	function chk_description() {
		description_ok = false;
		 var description = $.trim($("#description").val());
		 if(description=="")
			 return 0;
		 if(description.length>200)
			 return -1;

		description_ok = true;
		 return 1;
	} 
	

	/**
	 * 捐款检验函数
	 */

	var do_realname_ok=false;
	var do_phone_ok=false;
	var do_money_ok=true;
	var do_content_ok=false;
	var frealname = $.trim($("#donation_realname").val());

	if (frealname.length>0)
		do_realname_ok=true;
	var fphone = $.trim($("#donation_phone").val());
	if (fphone.length>0)
		do_phone_ok=true;
	var fdescription = $.trim($("#donation_content").val());
	if (fdescription.length>0)
		do_content_ok=true;	
	
	check_do_submit();
	
	function chk_do_realname() {
		do_realname_ok = false;
		 var realname = $.trim($("#donation_realname").val());
		 if(realname=="") {
		  return 0;
		 }
		 else if(realname.length<2 || realname.length>32 ){
		  return -2;
		 }
		 else if(/^[\u4e00-\u9fa5]+$/.test(realname)){
			 do_realname_ok = true;
			  return 1;
		}
		 return -1;
	} 
	
	/*
	*检查发票
	*/
	var do_invoice_box=false;
	var do_invoicephone_ok=false;
	var do_invoiceaddress_ok=false;	
	var do_invoicetitle_ok=false;
	var do_invoicepostcode_ok=false;
	var do_invoice_person=true;
	var do_invoice_company=true;
	var do_invoicereceiver_ok=false;
	
	var invoicetitle = $.trim($("#invoice_title").val());
	if (invoicetitle.length>0)
		do_invoicetitle_ok=true;
	var invoicephone = $.trim($("#invoice_phone").val());
	if (invoicephone.length>0)
		do_invoicephone_ok=true;
	var invoicereceiver = $.trim($("#invoice_receiver").val());
	if (invoicereceiver.length>0)
		do_invoicereceiver_ok=true;	
	var invoiceaddress = $.trim($("#invoice_address").val());
	if (invoiceaddress.length>0)
		do_invoiceaddress_ok=true;		
	var invoicepostcode = $.trim($("#invoice_postcode").val());
	if (invoicepostcode.length>0)
		do_invoicepostcode_ok=true;
	var mybox = $("#ckb_invoice:checked");
	if (mybox.length > 0){
		do_invoice_box=true;
	}
	check_do_submit();
		
		
	function chk_do_invoicetitle() {
		do_invoicetitle_ok = false;
		 var invoicetitle = $.trim($("#invoice_title").val());
		 if(invoicetitle=="") {
		  return 0;
		 }
		 else if(invoicetitle.length<2 || invoicetitle.length>32 ){
		  return -2;
		 }
		 else if(/^([\u4e00-\u9fa5]|[a-zA-Z0-9_])+$/.test(invoicetitle)){
			 do_invoicetitle_ok = true;
			  return 1;
		}
		 return -1;
	} 
	function chk_do_invoicephone() {
		do_invoicephone_ok = false;
		 var invoicephone = $.trim($("#invoice_phone").val());
		 if(invoicephone=="") {
		  return 0;
		 }
		 else if(invoicephone.length<7 || invoicephone.length>11 ){
		  return -1;
		 }
		 else if(/^(\(\d{3,4}\)|\d{3,4}-)?\d{7,11}$/.test(invoicephone)){
			 do_invoicephone_ok = true;
			  return 1;
		}
		 return -1;
	}
	function chk_do_invoiceaddress() {
		do_invoiceaddress_ok = false;
		 var invoiceaddress = $.trim($("#invoice_address").val());
		 if(invoiceaddress=="") {
		  return 0;
		 }
		 else if(invoiceaddress.length>50){
		  return -1;
		 }
		 else{
			do_invoiceaddress_ok = true;
			return 1;
		}
		return -1;
	} 
	function chk_do_invoicereceiver() {
		do_invoicereceiver_ok = false;
		 var invoicereceiver = $.trim($("#invoice_receiver").val());
		 if(invoicereceiver=="") {
		  return 0;
		 }
		 else if(invoicereceiver.length<2 || invoicereceiver.length>32 ){
		  return -2;
		 }
		 else if(/^[\u4e00-\u9fa5]+$/.test(invoicereceiver)){
			 do_invoicereceiver_ok = true;
			  return 1;
		}
		 return -1;
	} 
	
	function chk_do_invoicepostcode() {
		do_invoicepostcode_ok = false;
		 var invoicepostcode = $.trim($("#invoice_postcode").val());
		 if(invoicepostcode=="") {
		  return 0;
		 }
		 else if(invoicepostcode.length<6 || invoicepostcode.length>6 ){
		  return -1;
		 }
		 else if(/^[1-9]\d{5}(?!\d)$/.test(invoicepostcode)){
			 do_invoicepostcode_ok = true;
			  return 1;
		}
		 return -1;
	}	
	
	function chk_do_phone() {
		do_phone_ok = false;
		 var phone = $.trim($("#donation_phone").val());
		 if(phone=="")
			 return 0;
		 var pattern=/^1[3,5,8]\d{9}$/;
		 if(phone.length == 11 && pattern.test(phone)) {
			 do_phone_ok = true;
			 return 1;
		 }
		 return -1;
	} 
	function chk_do_content() {
		do_content_ok = false;
		 var description = $.trim($("#donation_content").val());
		 if(description=="")
			 return 0;
		 if(description.length>200)
			 return -1;
		 do_content_ok = true;
		 return 1;
	} 

	$("#msgContent").bind("focus",function(){
		$("#msg_content_tip").html(" ").show();
		$("#btn_submit_message").attr("disabled",false);

	});
	
	$("#msgContent").bind("keyup", function(){
		if($(this).val() == ''){
			$("#msg_content_tip").html("请输入留言内容").show();
			$("#btn_submit_message").attr("disabled",true);
		}else{
			$("#btn_submit_message").attr("disabled",false);
		}
	});
	
	$("#msgContent").bind("blur", function(){
		if($(this).val() == ''){
			$("#msg_content_tip").html("请输入留言内容").show();
			$("#btn_submit_message").attr("disabled",true);
		}else{
			$("#btn_submit_message").attr("disabled",false);
		}
	});

	function check_vo_submit(){
		if(realname_ok && phone_ok && idcard_ok && description_ok)
		   $("#submit_vo").attr("disabled",false);
		else
		   $("#submit_vo").attr("disabled",true);
	}

	function check_do_submit(){
		if(do_realname_ok && do_phone_ok && do_money_ok && do_content_ok){
			if (!do_invoice_box){
				$("#submit_do").attr("disabled",false);
			}
			else {
				if (do_invoice_person){
					if (do_invoicephone_ok && do_invoiceaddress_ok && do_invoicepostcode_ok && do_invoicereceiver_ok){
						$("#submit_do").attr("disabled",false);
					}
					else{
						$("#submit_do").attr("disabled",true);
					}
				}
				else if(do_invoice_company){
					if (do_invoicetitle_ok && do_invoicephone_ok && do_invoiceaddress_ok && do_invoicepostcode_ok && do_invoicereceiver_ok){
						$("#submit_do").attr("disabled",false);
					}
					else{
						$("#submit_do").attr("disabled",true);
					}
				}
				else{
					$("#submit_do").attr("disabled",true);
				}
			}
////////////////////////////////////////////////////////////////////////////////////////////////
		 }
		else
		   $("#submit_do").attr("disabled",true);
	}
	


	/**
	 * 志愿者绑定
	 */
	$("#realname").bind("focus", function(){
		var ret=chk_realname();
		if(ret==0){
			$("#realname_msg").hide();
			$("#realname_rule").html("请输入真实姓名").show();
		}
		return false;
	});

	  $("#realname").bind("keyup", function(){
		  
		   var ret=chk_realname();
		   check_vo_submit();
		   $("#realname_rule").hide();
		   if (ret>0){
			   $("#realname_msg").hide();
		   }
		   else if(ret==0){
			   $("#realname_msg").html("真实姓名不能为空！").show();  
		   } 
		   else
		   {
			   if(ret == -1){
				   	$("#realname_msg").html("请输入合法的中文姓名！").show();
			   }
			   else if(ret == -2){
				   $("#realname_msg").html("姓名长度不能小于2个汉字！").show();
			   }
		  }
		
		   return false;
	  });
	  
	  $("#realname").bind("blur", function(){
		  
		   var ret=chk_realname();
		   check_vo_submit();
		   $("#realname_rule").hide();
		   if (ret>0){
			   $("#realname_msg").hide();
		   }
		   else if(ret==0){
			   $("#realname_msg").html("真实姓名不能为空！").show();  
		   } 
		   else
		   {
			   if(ret == -1){
				   	$("#realname_msg").html("请输入合法的中文姓名！").show();
			   }
			   else if(ret == -2){
				   $("#realname_msg").html("姓名长度不能小于2个汉字！").show();
			   }
		  }
		
		   return false;
	  }); 

		$("#phone").bind("focus", function(){
			var ret=chk_phone();
			if(ret==0){
				$("#phone_msg").hide();
				$("#phone_rule").html("请输入常用的手机号码").show();
			}
			return false;
		}); 

	  $("#phone").bind("keyup", function(){
		  
		   var ret=chk_phone();
		   check_vo_submit();
		   
		   $("#phone_rule").hide();
		   if (ret>0){
			   $("#phone_msg").hide();
		   }
		   else if(ret==0){
			   $("#phone_msg").html("手机号码不能为空！").show();  
		   } 
		   else
		   {
			   $("#phone_msg").html("请输入正确的手机号！").show();
		   }
		
		   return false;
	  }); 
	  
	  $("#phone").bind("blur", function(){
		  
		   var ret=chk_phone();
		   check_vo_submit();
		   
		   $("#phone_rule").hide();
		   if (ret>0){
			   $("#phone_msg").hide();
		   }
		   else if(ret==0){
			   $("#phone_msg").html("手机号码不能为空！").show();  
		   } 
		   else
		   {
			   $("#phone_msg").html("请输入正确的手机号！").show();
		   }
		
		   return false;
	  }); 

		$("#idcard").bind("focus", function(){
			var ret=chk_idcard();
			if(ret==0){
				$("#idcard_msg").hide();
				$("#idcard_rule").html("请输入您的身份证号").show();
			}
			return false;
		});

		  $("#idcard").bind("keyup", function(){

			   var ret=chk_idcard();
			   check_vo_submit();
			   $("#idcard_rule").hide();
			   if (ret>0){
				   $("#idcard_msg").hide();
			   }
			   else if(ret==0){
				   $("#idcard_msg").html("身份证号码不能为空！").show();  
			   } 
			   else
			   {
				   $("#idcard_msg").html("请输入正确的身份证号！").show();
			   }
			
			   return false;
		  });
		  
		  $("#idcard").bind("blur", function(){

			   var ret=chk_idcard();
			   check_vo_submit();
			   $("#idcard_rule").hide();
			   if (ret>0){
				   $("#idcard_msg").hide();
			   }
			   else if(ret==0){
				   $("#idcard_msg").html("身份证号码不能为空！").show();  
			   } 
			   else
			   {
				   $("#idcard_msg").html("请输入正确的身份证号！").show();
			   }
			
			   return false;
		  }); 
		  

			$("#description").bind("focus", function(){
				var ret=chk_description();

				if(ret==0){
					$("#description_msg").hide();
					$("#description_rule").html("请输入您的申请说明").show();
				}
				return false;
			});

		  $("#description").bind("keyup", function(){
			  
			   var ret=chk_description();
			   check_vo_submit();
			   $("#description_rule").hide();
			   if (ret>0){
				   $("#description_msg").hide();
			   }
			   else if(ret==0){
				   $("#description_msg").html("申请说明不能为空！").show();  
			   } 
			   else
			   {
				   $("#description_msg").html("申请说明的长度不能超过200字！").show();
			   }
			
			   return false;
		  });
		  
		  $("#description").bind("blur", function(){
			  
			   var ret=chk_description();
			   check_vo_submit();
			   $("#description_rule").hide();
			   if (ret>0){
				   $("#description_msg").hide();
			   }
			   else if(ret==0){
				   $("#description_msg").html("申请说明不能为空！").show();  
			   } 
			   else
			   {
				   $("#description_msg").html("申请说明的长度不能超过200字！").show();
			   }
			
			   return false;
		  }); 
			  
			$("#donation_realname").bind("focus", function(){
				var ret=chk_do_realname();
				if(ret==0){
					$("#donation_realname_msg").hide();
					$("#donation_realname_rule").html("请输入真实姓名").show();
				}
				return false;
			});

			  $("#donation_realname").bind("keyup", function(){

				   var ret=chk_do_realname();
				   check_do_submit();
				   $("#donation_realname_rule").hide();
				   if (ret>0){
					   $("#donation_realname_msg").hide();
				   }
				   else if(ret==0){
				    $("#donation_realname_msg").html("真实姓名不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
						   	$("#donation_realname_msg").html("请输入合法的中文姓名！").show();
					   }
					   else if(ret == -2){
						   $("#donation_realname_msg").html("姓名长度不能小于2个汉字！").show();
					   }
				  }
				
				   return false;
			  }); 
			  
			  $("#donation_realname").bind("blur", function(){

				   var ret=chk_do_realname();
				   check_do_submit();
				   $("#donation_realname_rule").hide();
				   if (ret>0){
					   $("#donation_realname_msg").hide();
				   }
				   else if(ret==0){
				    $("#donation_realname_msg").html("真实姓名不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
						   	$("#donation_realname_msg").html("请输入合法的中文姓名！").show();
					   }
					   else if(ret == -2){
						   $("#donation_realname_msg").html("姓名长度不能小于2个汉字！").show();
					   }
				  }
				
				   return false;
			  }); 

			$("#donation_phone").bind("focus", function(){
				var ret=chk_do_phone();
				if(ret==0){
					$("#donation_phone_msg").hide();
					$("#donation_phone_rule").html("请输入常用的手机号码").show();
				}
				return false;
			});

			  $("#donation_phone").bind("keyup", function(){

				   var ret=chk_do_phone();
				   check_do_submit();
				   $("#donation_phone_rule").hide();
				   if (ret>0){
					   $("#donation_phone_msg").hide();
				   }
				   else if(ret==0){
					   $("#donation_phone_msg").html("手机号码不能为空！").show();  
				   } 
				   else
				   {
					   $("#donation_phone_msg").html("请输入正确的手机号！").show();
				   }
				
				   return false;
			  }); 
			  $("#donation_phone").bind("blur", function(){

				   var ret=chk_do_phone();
				   check_do_submit();
				   $("#donation_phone_rule").hide();
				   if (ret>0){
					   $("#donation_phone_msg").hide();
				   }
				   else if(ret==0){
					   $("#donation_phone_msg").html("手机号码不能为空！").show();  
				   } 
				   else
				   {
					   $("#donation_phone_msg").html("请输入正确的手机号！").show();
				   }
				
				   return false;
			  });

				$("#donation_content").bind("focus", function(){
					var ret=chk_do_content();
					
					if(ret==0){
						$("#donation_content_msg").hide();
						$("#donation_content_rule").html("请输入您的申请说明").show();
					}
					return false;
				});

			  $("#donation_content").bind("keyup", function(){
				  
				   var ret=chk_do_content();
				   check_do_submit();
				   $("#donation_content_rule").hide();
				   if (ret>0){
					   $("#donation_content_msg").hide();
				   }
				   else if(ret==0){
					   $("#donation_content_msg").html("申请说明不能为空！").show();  
				   } 
				   else
				   {
					   $("#donation_content_msg").html("申请说明的长度不能超过200字！").show();
				   }
				
				   return false;
			  });
			  
			  $("#donation_content").bind("blur", function(){
				  
				   var ret=chk_do_content();
				   check_do_submit();
				   $("#donation_content_rule").hide();
				   if (ret>0){
					   $("#donation_content_msg").hide();
				   }
				   else if(ret==0){
					   $("#donation_content_msg").html("申请说明不能为空！").show();  
				   } 
				   else
				   {
					   $("#donation_content_msg").html("申请说明的长度不能超过200字！").show();
				   }
				
				   return false;
			  }); 

			$('input:radio[name="moneyRadio"]').bind("change", function(){

				do_money_ok=false;
				var money_txt;
				money = this.value;
				
				if(this.id=="moneyRadio5"){
					money_txt = $("#money_txt").val();
					if(parseInt(money_txt)>0)
						do_money_ok=true;
					else
						$("#donation_money_msg").html("请输入合法的整数金额！").show();
				}else{
					do_money_ok=true;
				}
			    check_do_submit();
				   
			});
			$('input:radio[name="invoiceRadio"]').bind("change", function(){
				if (this.id=="radio_invoice_person"){
					do_invoice_person=true;
					do_invoice_company=false;
				}
				else{
					do_invoice_company=true;
					do_invoice_person=false;
				}
				check_do_submit();
				   
			});	
	
			$('#ckb_invoice').click(function () {  
				var mybox = $("#ckb_invoice:checked");
				if (mybox.length > 0){
					do_invoice_box=true;
				}
				else{
					do_invoice_box=false;		
				}				
			    check_do_submit();
			 });			
			

			$('#money_txt').bind("keyup", function(){
				var money;
				var money_txt;

				money_txt = $("#money_txt").val();

				if(!parseInt(money_txt)||parseInt(money_txt)<=0){
					$("#money_txt").val("");
					$("#donation_money_msg").html("请输入合法的整数金额！").show();
					if($("#moneyRadio5").attr("checked")){
						do_money_ok=false;
					}
				}else{
					do_money_ok=true;
					$("#donation_money_msg").hide();
				}
			    check_do_submit();
			});
			
			$("#invoice_title").bind("focus", function(){
				var ret=chk_do_invoicetitle();
				check_do_submit();
				if(ret==0){
					$("#invoice_title_msg").hide();
					$("#invoice_title_rule").html("请输入单位名称").show();
				}
				return false;
			});

			  $("#invoice_title").bind("keyup", function(){

				   var ret=chk_do_invoicetitle();
				   check_do_submit();
				   $("#invoice_title_rule").hide();
				   if (ret>0){
					   $("#invoice_title_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_title_msg").html("单位名称不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_title_msg").html("请输入合法的单位名称！").show();
					   }
					   else if(ret == -2){
						   $("#invoice_title_rule").html("单位名称不能小于2个汉字！").show();
					   }
				  }
				
				   return false;
			  });
			  
			  $("#invoice_title").bind("blur", function(){

				   var ret=chk_do_invoicetitle();
				   check_do_submit();
				   $("#invoice_title_rule").hide();
				   if (ret>0){
					   $("#invoice_title_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_title_msg").html("单位名称不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_title_msg").html("请输入合法的单位名称！").show();
					   }
					   else if(ret == -2){
						   $("#invoice_title_rule").html("单位名称不能小于2个汉字！").show();
					   }
				  }
				
				   return false;
			  }); 

			$("#invoice_phone").bind("focus", function(){
				var ret=chk_do_invoicephone();
				check_do_submit();
				if(ret==0){
					$("#invoice_phone_msg").hide();
					$("#invoice_phone_rule").html("请输入联系方式").show();
				}
				return false;
			});
			
			  $("#invoice_phone").bind("keyup", function(){

				   var ret=chk_do_invoicephone();
				   check_do_submit();
				   $("#invoice_phone_rule").hide();
				   if (ret>0){
					   $("#invoice_phone_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_phone_msg").html("联系方式不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_phone_msg").html("请输入合法的联系方式！").show();
					   }
				  }
				
				   return false;
			  }); 
			  
			  $("#invoice_phone").bind("blur", function(){

				   var ret=chk_do_invoicephone();
				   check_do_submit();
				   $("#invoice_phone_rule").hide();
				   if (ret>0){
					   $("#invoice_phone_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_phone_msg").html("联系方式不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_phone_msg").html("请输入合法的联系方式！").show();
					   }
				  }
				
				   return false;
			  }); 


			$("#invoice_address").bind("focus", function(){
				var ret=chk_do_invoiceaddress();
				check_do_submit();
				if(ret==0){
					$("#invoice_address_msg").hide();
					$("#invoice_address_rule").html("请输入寄送地址").show();
				}
				return false;
			});
			
			  $("#invoice_address").bind("keyup", function(){

				   var ret=chk_do_invoiceaddress();
				   check_do_submit();
				   $("#invoice_address_rule").hide();
				   if (ret>0){
					   $("#invoice_address_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_address_msg").html("寄送地址不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_address_msg").html("寄送地址过长！").show();
					   }
				  }
				
				   return false;
			  }); 
			  
			  $("#invoice_address").bind("blur", function(){

				   var ret=chk_do_invoiceaddress();
				   check_do_submit();
				   $("#invoice_address_rule").hide();
				   if (ret>0){
					   $("#invoice_address_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_address_msg").html("寄送地址不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_address_msg").html("寄送地址过长！").show();
					   }
				  }
				
				   return false;
			  }); 
	$("#invoice_receiver").bind("focus", function(){
		var ret=chk_do_invoicereceiver();
		if(ret==0){
			$("#invoice_receiver_msg").hide();
			$("#invoice_receiver_rule").html("请输入联系人姓名").show();
		}
		return false;
	});

	  $("#invoice_receiver").bind("keyup", function(){
		  
		   var ret=chk_do_invoicereceiver();
		   check_vo_submit();
		   $("#invoice_receiver_rule").hide();
		   if (ret>0){
			   $("#invoice_receiver_msg").hide();
		   }
		   else if(ret==0){
			   $("#invoice_receiver_msg").html("联系人姓名不能为空！").show();  
		   } 
		   else
		   {
			   if(ret == -1){
				   	$("#invoice_receiver_msg").html("请输入合法的联系人姓名！").show();
			   }
			   else if(ret == -2){
				   $("#invoice_receiver_msg").html("联系人姓名姓名长度不能小于2个汉字！").show();
			   }
		  }
		
		   return false;
	  }); 
	  
	  $("#invoice_receiver").bind("blur", function(){
		  
		   var ret=chk_do_invoicereceiver();
		   check_vo_submit();
		   $("#invoice_receiver_rule").hide();
		   if (ret>0){
			   $("#invoice_receiver_msg").hide();
		   }
		   else if(ret==0){
			   $("#invoice_receiver_msg").html("联系人姓名不能为空！").show();  
		   } 
		   else
		   {
			   if(ret == -1){
				   	$("#invoice_receiver_msg").html("请输入合法的联系人姓名！").show();
			   }
			   else if(ret == -2){
				   $("#invoice_receiver_msg").html("联系人姓名姓名长度不能小于2个汉字！").show();
			   }
		  }
		
		   return false;
	  }); 

			$("#invoice_postcode").bind("focus", function(){
				var ret=chk_do_invoicepostcode();
				check_do_submit();
				if(ret==0){
					$("#invoice_postcode_msg").hide();

					$("#invoice_postcode_rule").html("请输入邮政编码").show();
				}
				return false;
			});

			  $("#invoice_postcode").bind("keyup", function(){

				   var ret=chk_do_invoicepostcode();
				   check_do_submit();
				   $("#invoice_postcode_rule").hide();
				   if (ret>0){
					   $("#invoice_postcode_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_postcode_msg").html("邮政编码不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_postcode_msg").html("请输入合法的邮政编码！").show();
					   }
				  }
				
				   return false;
			  }); 
			  
			  $("#invoice_postcode").bind("blur", function(){

				   var ret=chk_do_invoicepostcode();
				   check_do_submit();
				   $("#invoice_postcode_rule").hide();
				   if (ret>0){
					   $("#invoice_postcode_msg").hide();
				   }
				   else if(ret==0){
					$("#invoice_postcode_msg").html("邮政编码不能为空！").show();  
				   } 
				   else
				   {
					   if(ret == -1){
							$("#invoice_postcode_msg").html("请输入合法的邮政编码！").show();
					   }
				  }
				
				   return false;
			  });
			  

		/**
		 * 捐款动态
		 */

		var donation_news_lower = 0;
		var donation_news_upper = 6;
		var donation_news_size = 0;
		var donation_per_page = 6;

		$('#donation_news_div .row-fluid:not(:lt('+donation_per_page+'))').css("display", "none");
		setInterval(roll_latest_donation, 5000);

		function roll_latest_donation(){
			
			donation_news_size = $("#donation_news_div div[class=row-fluid]").length;
			//alert(donation_news_size);
			
			donation_news_lower += donation_per_page;
			donation_news_upper += donation_per_page;
			if(donation_news_lower >= donation_news_size){
				donation_news_lower = 0;
				donation_news_upper = donation_per_page;
			}
			if(donation_news_upper > donation_news_size){
				donation_news_upper = donation_news_size;
			}

			$("#donation_news_div div[class=row-fluid]").css("display", "none");

			$('#donation_news_div div[class=row-fluid]:lt('+donation_news_upper+'):not(:lt('+donation_news_lower+'))').css("display","block");

		}
		
								
})
