
$(document).ready(function(){
	
	/**
	 * the messge part
	 */
	var cur_page = 1;
	var total_page = 0;
	total_page = Math.ceil($("#total_page").val());
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
		var info_count = 0;
		var info_list;

		//alert(cur_page);

		$.getJSON('index.php/admin/get_user_info_list',{'page':cur_page}, function(data){

			info_count = data.user_list.length;
			//alert(info_count);
			
			info_list = data.user_list;

			//加上表头
			str_content += '<table class="table"><tr><td>序号</td><td>注册邮箱</td><td>注册时间</td>';
			str_content += '<td>姓名</td><td>用户身份</td><td>身份证号</td><td>联系电话</td><td>操作</td></tr>';

			for(var i = 0; i < parseInt(info_count); i ++){

				str_content += '<tr>';
				str_content += '<form action="index.php/admin/submit_modify_user" method="POST">';
				str_content += '<input type="hidden" name="uid" value="'+ info_list[i].uid + '" />';
				str_content += '<td>' + (i+1) + '</td>';
				str_content += '<td>' + info_list[i].email + '</td>';
				str_content += '<td>' + info_list[i].create_time + '</td>';
				str_content += '<td>' + info_list[i].nickname + '</td>';
				
				str_content += '<td>';
				str_content += '<select name="gid">';
				str_content += '<option value="1"';
				if(info_list[i].gid == 1)
					str_content += 'selected';
				str_content += '>管理员</option>';
					
				str_content += '<option value="2"';
				if(info_list[i].gid == 2)
					str_content += 'selected';
				str_content += '>普通用户</option>';
					
				str_content += '<option value="3"';
				if(info_list[i].gid == 3)
					str_content += 'selected';
				str_content += '>企业用户</option>';
					
				str_content += '</select></td>';

				str_content += '<td>' + info_list[i].idcard + '</td>';
				str_content += '<td>' + info_list[i].phone + '</td>';
				str_content += '<td>';
				str_content += '<input type="submit" class="btn" value="修改" />';
				str_content += '<a type="button" class="btn" ';
				str_content += 'href="index.php/admin/submit_del_user/' + info_list[i].uid;
				str_content += '">删除</a>';
				str_content += '</td>';
				
				str_content += '</form></tr>';
			}
			
			str_content += '</table>';
			
			$("#user_info_list").html(" ");
			$("#user_info_list").html(str_content);	
		});
		show_page_idx();	


	});
	
	
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
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			str_content += ('<li class="active"><a name="page_idx">'+cur_page+'</a></li>&nbsp;');
		}
		else{
			if(cur_page >= total_page - 4){
				for(var i = ((total_page - 6) < 1?1:(total_page - 6)); i <=cur_page - 3; i ++)
					str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				if(total_page > 9){
					str_content = '<li><a name="page_idx">...</a></li>&nbsp;' + str_content;
					str_content = '<li><a name="page_idx">1</a></li>&nbsp;' + str_content;
				}else{
					for(var i = total_page - 7; i >= 1; i --)
						str_content = ('<li><a name="page_idx">'+i+'</a></li>&nbsp;') + str_content;
				}
					
			}else{
				str_content += '<li><a name="page_idx">1</a></li>&nbsp;';
				str_content += '<li><a name="page_idx">...</a></li>&nbsp;';
			}
			for(var i = cur_page - 2; i <cur_page; i ++)
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			str_content += ('<li class="active"><a name="page_idx">'+cur_page+'</a></li>&nbsp;');
		}
		
		if(cur_page >= total_page - 4){
			for(var i = cur_page + 1; i <= total_page; i ++)
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
		}
		else{
			for(var i = cur_page+1; i <= cur_page + 2; i ++)
				str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
			if(cur_page <= 5){
				for(var i = cur_page + 3; i <=(7>total_page?total_page:7); i ++)
					str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				if(total_page>9){
					str_content += ('<li><a name="page_idx">...</a></li>&nbsp;');
					str_content += ('<li><a name="page_idx">'+total_page+'</a></li>&nbsp;');
				}else{
					for(var i = 8; i <=total_page; i ++)
						str_content += ('<li><a name="page_idx">'+i+'</a></li>&nbsp;');
				}
			}else{
				str_content += ('<li><a name="page_idx">...</a></li>&nbsp;');
				str_content += ('<li><a name="page_idx">'+total_page+'</a></li>&nbsp;');
			}
		}

		if(cur_page!=1)
			str_content=('<li><a name="page_idx">上一页</a></li>&nbsp;')+str_content;
		if(cur_page!=total_page)
			str_content+=('<li><a name="page_idx">下一页</a></li>&nbsp;');

		$("#page_idx_div").html(str_content);
		//alert(str_content);
	}
})
