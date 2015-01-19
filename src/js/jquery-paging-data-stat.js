$(document).ready(function(){
	/**
	 * the donation part
	 */
	var cur_page = 1;
	var total_page = 0;
	//alert($("#total_page").val());
	total_page = Math.ceil($("#total_page").val());
	
	
	show_page_idx();

	var	begin_date = $('#begin_date').val();
	var	end_date = $('#end_date').val();
	var	category = $('#category_hidden').val();
	var	user_type = $('#user_type_hidden').val()
	var	project_name = $('#project_name').val();

	$('#search').bind('click',function(){

		begin_date = $('#begin_date').val();
		end_date = $('#end_date').val();
		category = $('#category_hidden').val();
		user_type = $('#user_type_hidden').val();
		project_name = $('#project_name').val();
                                     
		//if(""==end_date)
			//end_date = -1;
		//if(""==begin_date)
			//begin_date = -1;
	});
	
	$('a[name="page_idx"]').live('click',function(){
		//alert(begin_date);
		//if(""==end_date)
			//end_date = -1;
		//if(""==begin_date)
			//begin_date = -1;
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
		var donate_count = 0;
		var donate_list;

		$.getJSON('index.php/admin/get_summary_per_page', {'begin_date':begin_date, 'end_date':end_date,
			'category':category, 'project_name':project_name, 'user_type':user_type, 'page':cur_page}, function(data){
            
		begin_date = data.begin_date;
		end_date =  data.end_date; 
		category = data.category; 
		user_type =data.type; 
		project_name = data.pname; 

                                     
			donate_list = data.donate_list;
			donate_count = donate_list.length;
			
			//加上表头
			str_content +='<table class="table"><tr><td>捐助时间</td><td>捐助项目类型</td><td>捐助项目名称</td>';
			str_content +='<td>捐助项目ID</td><td>捐助人昵称</td><td>捐助人类别</d><td>捐助金额</td>';
			str_content +='<td>捐助人联系方式</td></tr>';
			for(var i = 0; i < parseInt(donate_count); i ++){

				str_content+='<tr>';
				
				str_content+='<td>';
				str_content+=donate_list[i].create_time;
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].type;
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].project_name;
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].project_id;
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].nickname;
				str_content+='</td>';
				
				str_content+='<td>';
		        if(donate_list[i].user_type == 1)
		        	str_content+='个人用户';
		        else if(donate_list[i].user_type == 2)
			        str_content+='企业用户';
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].money;
				str_content+='</td>';
				
				str_content+='<td>';
				str_content+=donate_list[i].phone;
				str_content+='</td>';
				
				str_content+='</tr>';
			}
			$("#donate_list").html(" ");	
			$("#donate_list").html(str_content);	

		});

		show_page_idx();	


	});
	
	
	function show_page_idx() {
		//alert(cur_page + " " + total_page);
		//total_page = 10;
		if(cur_page > total_page)
			return false;
		
		var p_offset = 1;
		var p_end = total_page;
		var cur_index = 1;
		
		var str_content="";
		//$("#page_idx_div").html(str_content);

		if(cur_page <= 5){
			for(var i = 1; i <cur_page; i ++)
				//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
			//str_content += ('<font name="page_idx">'+cur_page+'</font>&nbsp;');
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			str_content += ('<li class="active"><a name="page_idx">'+cur_page+'</a></li>&nbsp;');
		}
		else{
			if(cur_page >= total_page - 4){
				for(var i = ((total_page - 6) < 1?1:(total_page - 6)); i <=cur_page - 3; i ++)
					//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				if(total_page > 9){
					//str_content = '<a name="page_idx">...</a>&nbsp;' + str_content;
					//str_content = '<a name="page_idx">1</a>&nbsp;' + str_content;
					str_content = '<li><a name="page_idx">...</a></li>&nbsp;' + str_content;
					str_content = '<li><a name="page_idx">1</a></li>&nbsp;' + str_content;
				}else{
					for(var i = total_page - 7; i >= 1; i --)
						//str_content = ('<a name="page_idx">'+i+'</a>&nbsp;') + str_content;
                        str_content = ('<li><a name="page_idx">'+i+'</a></li>&nbsp;') + str_content;
				}
					
			}else{
				//str_content += '<a name="page_idx">1</a>&nbsp;';
				//str_content += '<a name="page_idx">...</a>&nbsp;';
				str_content += '<li><a name="page_idx">1</a></li>&nbsp;';
				str_content += '<li><a name="page_idx">...</a></li>&nbsp;';
			}
			for(var i = cur_page - 2; i <cur_page; i ++)
				//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
			//str_content += ('<font name="page_idx">'+cur_page+'</font>&nbsp;');
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			str_content += ('<li class="active"><a name="page_idx">'+cur_page+'</a></li>&nbsp;');
		}
		
		if(cur_page >= total_page - 4){
			for(var i = cur_page + 1; i <= total_page; i ++)
				//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
		}
		else{
			for(var i = cur_page+1; i <= cur_page + 2; i ++)
				//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			if(cur_page <= 5){
				for(var i = cur_page + 3; i <=(7>total_page?total_page:7); i ++)
					//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
					str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				if(total_page>9){
					//str_content += ('<a name="page_idx">...</a>&nbsp;');
					//str_content += ('<a name="page_idx">'+total_page+'</a>&nbsp;');
					str_content += ('<li><a name="page_idx">...</a></li>&nbsp;');
					str_content += ('<li><a name="page_idx">'+total_page+'</a></li>&nbsp;');
				}else{
					for(var i = 8; i <=total_page; i ++)
						//str_content += ('<a name="page_idx">'+i+'</a>&nbsp;');
						str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				}
			}else{
				//str_content += ('<a name="page_idx">...</a>&nbsp;');
				//str_content += ('<a name="page_idx">'+total_page+'</a>&nbsp;');
				str_content += ('<li><a name="page_idx">...</a></li>&nbsp;');
				str_content += ('<li><a name="page_idx">'+total_page+'</a></li>&nbsp;');
			}
		}

		if(cur_page!=1)
			//str_content=('<a name="page_idx">上一页</a>&nbsp;')+str_content;
			str_content=('<li><a name="page_idx">上一页</a></li>&nbsp;')+str_content;
		if(cur_page!=total_page)
			//str_content+=('<a name="page_idx">下一页</a>&nbsp;');
			str_content+=('<li><a name="page_idx">下一页</a></li>&nbsp;');

		$("#page_idx_div").html(str_content);
		//alert(str_content);
	}
})
