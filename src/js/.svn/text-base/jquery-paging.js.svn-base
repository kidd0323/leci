
$(document).ready(function(){

	
	/**
	 * 分页
	 */
	
	var pid = $("#pid").val();

	/**
	 * the messge part
	 */
	var cur_page = 1;
	var total_page = 0;
	total_page = $("#total_page").val();
	//alert(total_page);
	
	show_page_idx();
	
	//load_first_donation_page();
	
	$('a[name="page_idx"]').live('click',function(){
		var the_page = $(this).html();
		if(the_page=="..."){
			cur_page=0;
			return false;
		}
		else if(the_page=="上一页")
			cur_page = cur_page - 1;
		else if(the_page=="下一页")
			cur_page = cur_page + 1;
		else
			cur_page=parseInt(the_page);

		//alert(cur_page + " " + the_page);
		var str_content = "";
		var msg_count = 0;
		var msg_list;

		$.getJSON('index.php/project/get_message',{'pid':pid, 'page':cur_page}, function(data){
			msg_count = data.message_list.length;
			//alert(msg_count);
			//alert(pid + " " + data.total_count);
			
			msg_list = data.message_list;
			for(var i = 0; i < parseInt(msg_count); i ++){

				str_content+='<div class="row"><div class="span2">';
				str_content+=msg_list[i].nickname;
				str_content+='</div><div class="span6">';
				str_content+=msg_list[i].content;
				str_content+=msg_list[i].create_time;
				str_content+='</div></div>';
			}
			$("#msg_list").html(str_content);	
		});

		show_page_idx();	


	});
	
	/**
	 * the donation part
	 */
	var do_cur_page = 1;
	var do_total_page = 0;
	do_total_page = $("#do_total_page").val();
	//alert(do_total_page);

	do_show_page_idx();
	$('a[name="do_page_idx"]').live('click',function(){
		var the_page = $(this).html();
		if(the_page=="..."){
			do_cur_page=0;
			return false;
		}
		else if(the_page=="上一页")
			do_cur_page = do_cur_page - 1;
		else if(the_page=="下一页")
			do_cur_page = do_cur_page + 1;
		else
			do_cur_page=parseInt(the_page);

		//alert(do_cur_page);
		var str_content = "";
		var do_count = 0;
		var do_list;

		//alert(pid + " " + do_cur_page);
		$.getJSON('index.php/project/get_donation_records',{'pid':pid, 'page':do_cur_page}, function(data){
			do_count = data.donation_cur_count;

			//alert(do_count);
			do_list = data.donation_list;
			for(var i = 0; i < parseInt(do_count); i ++){
				str_content+='<div class="row"><div class="span2">';
				str_content+=do_list[i].nickname;
				//alert(do_list[i].nickname);
				str_content+='</div><div class="span6">';
				str_content+=do_list[i].money;
				str_content+='&nbsp;';
				str_content+=do_list[i].create_time;
				str_content+='</div></div>';
			}
			$("#donation_list").html(str_content);	
		});

		do_show_page_idx();	

	});
	
	function do_show_page_idx() {
		//alert(cur_page);
		//do_total_page = 10;
		if(do_cur_page > do_total_page)
			return false;
		
		var p_offset = 1;
		var p_end = do_total_page;
		
		var str_content="";
		$("#do_page_idx_div").html(str_content);
		
		if(do_cur_page <= 5){
			for(var i = 1; i < do_cur_page; i ++)
				str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
			str_content += ('<font name="do_page_idx">'+do_cur_page+'</font>&nbsp;');
		}
		else{
			if(do_cur_page >= do_total_page - 4){
				for(var i = ((do_total_page - 6) < 1?1:(do_total_page - 6)); i <=do_cur_page - 3; i ++)
					str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
				if(do_total_page > 9){
					str_content = '<a name="do_page_idx">...</a>&nbsp;' + str_content;
					str_content = '<a name="do_page_idx">1</a>&nbsp;' + str_content;
				}else{
					for(var i = do_total_page - 7; i >= 1; i --)
						str_content = ('<a name="do_page_idx">'+i+'</a>&nbsp;') + str_content;
				}
					
			}else{
				str_content += '<a name="do_page_idx">1</a>&nbsp;';
				str_content += '<a name="do_page_idx">...</a>&nbsp;';
			}
			for(var i = do_cur_page - 2; i < do_cur_page; i ++)
				str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
			str_content += ('<font name="do_page_idx">'+do_cur_page+'</font>&nbsp;');
		}
		
		if(do_cur_page >= do_total_page - 4){
			for(var i = do_cur_page + 1; i <= do_total_page; i ++)
				str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
		}
		else{
			for(var i = do_cur_page+1; i <= do_cur_page + 2; i ++)
				str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
			if(do_cur_page <= 5){
				for(var i = do_cur_page + 3; i <=(7>do_total_page?do_total_page:7); i ++)
					str_content += ('<a name="do_page_idx">'+i+'</a>&nbsp;');
				if(do_total_page>9){
					str_content += ('<a name="do_page_idx">...</a>&nbsp;');
					str_content += ('<a name="do_page_idx">'+do_total_page+'</a>&nbsp;');
				}else{
					for(var i = 8; i <=do_total_page; i ++)
						str_content += ('<a clanamess="do_page_idx">'+i+'</a>&nbsp;');
				}
			}else{
				str_content += ('<a name="do_page_idx">...</a>&nbsp;');
				str_content += ('<a name="do_page_idx">'+do_total_page+'</a>&nbsp;');
			}
		}

		if(do_cur_page!=1)
			str_content=('<a name="do_page_idx">上一页</a>&nbsp;')+str_content;
		if(do_cur_page!=do_total_page)
			str_content+=('<a name="do_page_idx">下一页</a>&nbsp;');
		
		$("#do_page_idx_div").html(str_content);
		//alert(str_content);
	}
	
	function show_page_idx() {
		//alert(cur_page);
		//total_page = 10;
		if(cur_page > total_page)
			return false;
		
		var p_offset = 1;
		var p_end = total_page;
		var cur_index = 1;
		
		var str_content="";
		$("#page_idx_div").html(str_content);

		
		if(cur_page <= 5){
			for(var i = 1; i <cur_page; i ++)
				str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
			str_content += ('<font name="page_idx">'+cur_page+'</font>&nbsp;');
		}
		else{
			if(cur_page >= total_page - 4){
				for(var i = ((total_page - 6) < 1?1:(total_page - 6)); i <=cur_page - 3; i ++)
					str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				if(total_page > 9){
					str_content = '<a name="page_idx">...</a>&nbsp;' + str_content;
					str_content = '<a name="page_idx">1</a>&nbsp;' + str_content;
				}else{
					for(var i = total_page - 7; i >= 1; i --)
						str_content = ('<a name="page_idx">'+i+'</a>&nbsp;') + str_content;
				}
					
			}else{
				str_content += '<a name="page_idx">1</a>&nbsp;';
				str_content += '<a name="page_idx">...</a>&nbsp;';
			}
			for(var i = cur_page - 2; i <cur_page; i ++)
				str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
			str_content += ('<font name="page_idx">'+cur_page+'</font>&nbsp;');
		}
		
		if(cur_page >= total_page - 4){
			for(var i = cur_page + 1; i <= total_page; i ++)
				str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
		}
		else{
			for(var i = cur_page+1; i <= cur_page + 2; i ++)
				str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
			if(cur_page <= 5){
				for(var i = cur_page + 3; i <=(7>total_page?total_page:7); i ++)
					str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				if(total_page>9){
					str_content += ('<a name="page_idx">...</a>&nbsp;');
					str_content += ('<a name="page_idx">'+total_page+'</a>&nbsp;');
				}else{
					for(var i = 8; i <=total_page; i ++)
						str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				}
			}else{
				str_content += ('<a name="page_idx">...</a>&nbsp;');
				str_content += ('<a name="page_idx">'+total_page+'</a>&nbsp;');
			}
		}

		if(cur_page!=1)
			str_content=('<a name="page_idx">上一页</a>&nbsp;')+str_content;
		if(cur_page!=total_page)
			str_content+=('<a name="page_idx">下一页</a>&nbsp;');

		$("#page_idx_div").html(str_content);
		//alert(str_content);
	}
})
