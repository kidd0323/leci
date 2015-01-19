$(document).ready(function(){
	$(".invoice_control").hide();
	$("button.support").bind("click",function(){
		var button = $(this);
		$.post(
				"index.php/project/support_project/",
				{ pid: button.attr("value")},
				function(data, textStatus){
							json = jQuery.parseJSON(data);
							if(json.error_msg == 'OK') {
								support = button.parent().find(".pSupport").find(".prjInfo");
								support.html(parseInt(support.html()) + 1);
								button.addClass("disabled");
								button.attr('disabled', 'true');
								button.html('已经支持');
								alert('感谢您的支持！');
							}
							else
								alert(json.error_msg);
				}
			);
	});
	$("#ckb_invoice").bind("click",function(){
		if($(this).attr('checked'))	{
			$(this).attr('value',1);
			$(".invoice_control").show();
			if($("#radio_invoice_person").attr("checked")){
				$("#div_invoice_title").hide();
			}else{
				$("#div_invoice_title").show();
			}
		}else{
			$(this).attr('value',0);
			$(".invoice_control").hide();
		}
	});
	
	
	$("#radio_invoice_person").live("click",function(){
		$("#radio_invoice_compony").attr("checked", false);
		$("#radio_invoice_person").attr("checked", true);
		$("#div_invoice_title").hide();
	});
	
	$("#radio_invoice_company").live("click",function(){
		$("#radio_invoice_person").attr("checked", false);
		$("#radio_invoice_company").attr("checked", true);
		$("#div_invoice_title").show();
	});
})