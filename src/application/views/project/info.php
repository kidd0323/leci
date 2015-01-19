<link rel="stylesheet" href="./css/cishan.css" />
<style type="text/css">
a:hover {
	cursor:pointer;
}

p {
	text-indent:2em;
}

.generalInfo {
	height: 250px;
}

.name {
	font-size:14px;
	font-weight:bold;
}

.contentPane{
	border:1px solid #7dccd9;
	border-top: 0px;
	padding-left: 10px;
	background-color:#faffe1;
	margin-top:-19px;
	padding-top: 20px;
}

#bdshare {
	margin-top:10px;
}

.subnav {
	border:1px solid #7dccd9 !important;

}
</style>

<script type="text/javascript" src="./js/city.js"></script>
<script type="text/javascript" src="./js/jquery-info.js"></script>
<script type="text/javascript" src="./js/paging-qiangrw.js"></script>
<script type="text/javascript" src="./js/project.js"></script>
<script type="text/javascript">
$(function() {
	$("a[rel=pic_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: 
		function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">图 ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
		}
	});

	$("a.fb_image").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'hideOnContentClick': true,
		'titlePosition' : 'outside'
	});
	
	$('#protocol_link').fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'hideOnContentClick': true,
		'titlePosition' : 'outside',
		'centerOnScroll'	:true,
		'type'				: 'iframe',
		'height'			: '90%',
		'width'				: '90%'
	});
	
		
	$('#province').bind('change',provinceChange);
	$('#city').bind('change',cityChange);
	
	//子导航控制
	$('#itemSubNav').click(function (){
		$('#itemPane').show();
		$('#donatePane').hide();
		$('#volunteerinfoPane').hide();
		
		$('#subNav1Ul li').removeClass('active');
		$('#itemSubNav').addClass('active');
		});
	$('#donateSubNav').click(function (){
		$('#itemPane').hide();
		$('#donatePane').show();
		$('#volunteerinfoPane').hide();
		
		$('#subNav1Ul li').removeClass('active');
		$('#donateSubNav').addClass('active');
		});
	$('#volunteerinfoSubNav').click(function (){
		$('#itemPane').hide();
		$('#donatePane').hide();
		$('#volunteerinfoPane').show();
		
		$('#subNav1Ul li').removeClass('active');
		$('#volunteerinfoSubNav').addClass('active');
		});
	
	//子导航2控制
	$('#sponsorFeedback').click(function (){
		$('#sponsorFeedbackPane').show();
		$('#volunteerFeedbackPane').hide();
		$('#donationRecordPane').hide();
		$('#messagePane').hide();
		
		$('#subNav2Ul li').removeClass('active');
		$('#sponsorFeedback').addClass('active');
		});
	$('#volunteerFeedback').click(function (){
		$('#sponsorFeedbackPane').hide();
		$('#volunteerFeedbackPane').show();
		$('#donationRecordPane').hide();
		$('#messagePane').hide();
		
		$('#subNav2Ul li').removeClass('active');
		$('#volunteerFeedback').addClass('active');
		});
	$('#donationRecord').click(function (){
		$('#sponsorFeedbackPane').hide();
		$('#volunteerFeedbackPane').hide();
		$('#donationRecordPane').show();
		$('#messagePane').hide();
		
		$('#subNav2Ul li').removeClass('active');
		$('#donationRecord').addClass('active');
		});
	$('#message').click(function (){
		$('#sponsorFeedbackPane').hide();
		$('#volunteerFeedbackPane').hide();
		$('#donationRecordPane').hide();
		$('#messagePane').show();
		
		$('#subNav2Ul li').removeClass('active');
		$('#message').addClass('active');
		});
		
	$(".delete_button").bind("click",function(){
		var msg = "确认删除？"; 
		if (confirm(msg)){	
		var button = $(this);
		var projectid = $("#get_pid").val();
		$.post(
				"index.php/project/del_feedback/",
				{ sfb_id:button.attr("value"),pid: projectid},
				function(data, textStatus){
							var json = jQuery.parseJSON(data);
							if(json.error_msg == 'OK') {
								//var feedback = button.parent().first().parent().first();
								//feedback.empty();
								var str1="#info"+button.attr("value");
								var str2="#content"+button.attr("value");
								$(str1).hide();
								$(str2).hide();
								alert("反馈已删除");
							}
							else if(json.error_msg == "Permission Denied")
								alert('无权操作');
							else
								alert(json.error_msg);
				}
			);
			}
	});
	$(".delete_vbutton").bind("click",function(){
		var vmsg = "确认删除？"; 
		if (confirm(vmsg)){	
		var button = $(this);
		var projectid = $("#get_pid").val();
		$.post(
				"index.php/project/del_vfeedback/",
				{ vfb_id:button.attr("value"),pid: projectid},
				function(data, textStatus){	
							var json = jQuery.parseJSON(data);
							if(json.error_msg == 'OK') {
							
								//var feedback = button.parent().first().parent().first();
								//feedback.empty();
								var str1="#vinfo"+button.attr("value");
								var str2="#vcontent"+button.attr("value");
								$(str1).hide();
								$(str2).hide();
								alert("反馈已删除");
							}
							else if(json.error_msg == "Permission Denied")
								alert('无权操作');
							else
								alert(json.error_msg);
				}
			);
			}
	});
	$("#btn_submit_message").bind("click",function(){
		var messageListObj = $('#msg_list');
		var messageList = $('#msg_list').html();			
		var button = $(this);
		var projectid = $("#get_pid").val();
		var ob = $("#msgContent");
		var message = $("#msgContent").val();
		if(message != ''){
			var now = new Date();
			$.post(
				"index.php/project/submit_message",
				{pid:projectid,content:message},
				function(data, textStatus){
					json = jQuery.parseJSON(data);
					if(json.error_msg == 'OK') {
						alert("留言成功!");
						window.location.reload();
					} else  {
						alert(json.error_msg);
					}
				}
			);
		}else{
			alert('请输入留言内容');
		}
	});
	$("#submit_vo").bind("click",function(){
		var vmsg = "确认申请志愿者？"; 
		if (confirm(vmsg)){	
		var projectid = $("#get_pid").val();
		var vo_name = $("#realname").val();
		var vo_phone = $("#phone").val();
		var vo_idcard = $("#idcard").val();
		var vo_province=document.getElementById("province").value;
		var vo_city=document.getElementById("city").value;
		var vo_district=document.getElementById("district").value;
		var vo_des = $("#description").val();
		
		$.post(
			"index.php/project/submit_apply_volunteer",
			{pid:projectid,
			realname:vo_name,
			phone:vo_phone,
			idcard:vo_idcard,
			province:vo_province,
			city:vo_city,
			district:vo_district,
			description:vo_des},
			function(data){
				var json = jQuery.parseJSON(data);
				if(json.error_msg == 'OK') {
					alert('申请已提交，请关注审核结果!');
				} else  {
					alert(json.error_msg);
				}
			}
		);
		}

	});
});
</script>

<div class="row-fluid">

<!-- 左侧部分 项目相关 -->
<div class="span9">
<div class="row-fluid">
	<div class="contentMiddle generalInfo">
	<!-- 项目图片 -->
	<div class="span2 columns">
		<div class="span2">
			<?php $i = 0; ?>
			<?php foreach( $project->pics as $pic): if($pic != ''): ?>
			<a class="thumbnail" <?php if($i++ != 0) echo 'style="display:none;" '; ?> rel="pic_group" title="<?php echo $project->title; ?>" href="./uploads/project/<?php echo $pic;?>">
				<img src="./uploads/project_thumb/<?php echo $pic;?>" width=150 height=150>
				<?php if($i == 1): ?> 
					<p>点击查看大图</p>
				<?php endif; ?>
			</a>
			<?php endif; endforeach; ?>
		</div>
		<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
			<span class="bds_more">分享到：</span>
			<a class="bds_tsina"></a>
			<a class="bds_tqq"></a>
			<a class="bds_renren"></a>
		</div>
	</div>
	<div class="span1">&nbsp;</div>
	<!-- 项目信息 -->
	<div class="span6">
		<h3><?php echo $project->title; ?></h3>
		<input id="get_pid" type="hidden" name="pid" value="<?php echo $pid; ?>" />
		<ul class="unstyled">
			<li>
				<span class="prjLabel">发起人: </span>
				<span class="prjInfo"><?php echo  $project->uname; ?></span>
			</li>
			<li>
				<span class="prjLabel">救助对象: </span>
				<span class="prjInfo"><?php echo $project->assist_object;?> 
			</li>
			<li>
				<span class="prjLabel">所在地: </span>
				<span class="prjInfo"><?php echo $project->address;?> 
			</li>
			<li>
				<span class="prjLabel">项目类别: </span>
				<span class="prjInfo"><?php echo $project->category;?> 
			</li>
			<li>
				<span class="prjLabel">执行机构: </span>
				<span class="prjInfo"><?php echo $project->oname."[".$project->parent_fund."]";?> 
			</li>
			<li>
				<span class="prjLabel">求助时间: </span>
				<span class="prjInfo"><?php echo $project->start_time. " ~ ". $project->end_time; ;?> 
			</li>
			<!-- 如果是捐款项目 -->
			<?php if($is_donate): ?>
			<?php $process = (int)($project->now_money/$project->target_money*100); if($process > 100) $process = 100; ?>
			<li>
				<span class="prjLabel">已捐款: </span>
				<span class="prjInfo"><?php echo $project->now_money;?> 元
				&nbsp;
				<span class="prjLabel">目标金额: </span>
				<span class="prjInfo"><?php echo $project->target_money;?> 元
				&nbsp;
				<span class="prjLabel">进度: </span>
				<span class="prjInfo"><?php echo (int)($project->now_money/$project->target_money*100); ?>% 
			</li>
			<li>&nbsp;</li>
			<li>
				<div class="progress progress-striped active">
					<div class="bar" style="width:<?php echo $process; ?>%;">
						<div style="color:green; position:relative; padding-left:190px; font-color:green;">
							<?php echo $process; ?>%
						</div>	<!-- 50% LINE -->
					</div>
					<span><?php echo $process ?>%</span>
				</div>
				</li>
			<?php endif; ?>
			<li>
				<a href="<?php echo site_url("project/info/$pid#donate"); ?>" class="btn btn-success">我要捐助</a>
				<?php if(!$is_supporter): ?>
					<button class="btn btn-warning support" value="<?php echo $pid; ?>">支持+1</button>
				<?php else:?>
					<button class="btn btn-warning disabled support" disabled value="<?php echo $pid; ?>">已经支持</button>
				<?php endif;?>
				<span class="pSupport">
					<span class="prjLabel">支持人数: </span>
					<span class="prjInfo"><?php echo $project->support;?></span>
				</span>
			</li>
		</ul>
	</div>
	</div>
	<div class="row-fluid">
	<div class="span12">
	<div class="contentMiddle">
		<h3>项目介绍</h3>
		<p style="word-break: break-all;line-height:26px;"><?php echo $project->description; ?></p>
	</div>
	</div>
	</div>
</div>

<!-- 对于进行中的项目 -->
<?php if($project->status == 3) : ?>	
<br />
<br />
<!-- 子菜单 -->
<div class="subnav">
  <ul id="subNav1Ul" class="nav nav-pills rightColumn">
	<li id="donateSubNav" class="active"><a>在线捐款</a></li>
	<li id="itemSubNav"><a>捐助物品</a></li>
	<li id="volunteerinfoSubNav"><a>报名志愿者</a></li>
  </ul>
</div>

<div id="donatePane" style="display:block">
<div class="contentPane">
<?php if($is_donate && $project->now_money < $project->target_money): ?>
<a name="donate" id="donate"></a>
<form action="<?php echo site_url("project/select_pay_gateway"); ?>" method="POST" class="form-horizontal">
<fieldset>
<input type="hidden" name="pid" value="<?php echo $pid;?>" />
<div class="control-group">
	<label class="control-label" for="money"><span style="color:red;">*</span>捐款金额</label>
	<div class="controls" id="moneyDiv">
		<label class="radio"> 
			<input type="radio" name="moneyRadio" id="moneyRadio1" value="10" checked> 10元
		</label>
		<label class="radio"> 
			<input type="radio" name="moneyRadio" id="moneyRadio2" value="50"> 50元
		</label>
		<label class="radio"> 
			<input type="radio" name="moneyRadio" id="moneyRadio3" value="100"> 100元
		</label>
		<label class="radio"> 
			<input type="radio" name="moneyRadio" id="moneyRadio4" value="200"> 200元
		</label>
		<label class="radio"> 
			<input type="radio" name="moneyRadio" id="moneyRadio5" value="0">
			<input class="span1" name="moneyText" type="text" id="money_txt"/>元
		</label>
		<span id="donation_money_msg"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="realname"><span style="color:red;">*</span>真实姓名</label>
	<div class="controls">
		<input  id="donation_realname" type="text" name="realname" />
		<span id="donation_realname_msg"></span>
		<span id="donation_realname_rule"></span>
	</div>
	<div class="controls">
		<label class="checkbox">
		<input type="checkbox" name="anonymous" id="ckb_anonymous" value='1'>匿名捐款</input>
		</label>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="phone"><span style="color:red;">*</span>手机号码</label>
	<div class="controls">
		<input type="text" id="donation_phone" name="phone" />
		<span id="donation_phone_msg"></span>
		<span id="donation_phone_rule"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="content"><span style="color:red;">*</span>我的祝福</label>
	<div class="controls">
		<textarea name="content" id="donation_content" cols="30" rows="5"></textarea>
		<span id="donation_content_msg"></span>
		<span id="donation_content_rule"></span>
	</div>
	<div class="controls">
	<label class="checkbox">
		<input type="checkbox" id="ckb_sync" name="msg_sync" value='1'>同步到留言板</input>
	</label>
	</div>
</div>
<div class="control-group">
	<label class="control-label"><span style="color:red;">*</span>同意协议</label>
	<div class="controls">
		<label class="checkbox">
		<input type="checkbox" name="aprove_protocol" id="ckb_protocol" value='1' checked disabled>
				我已阅读并接受
				<a id="protocol_link" target="_blank" href="<?php echo site_url('siteinfo/protocol'); ?>">《乐慈网用户协议》</a>
		</input>
		</label>
	</div>
</div>
<div class="control-group">
	<label class="control-label"><span style="color:red;">*</span>发票信息</label>
	<div class="controls">
		<label class="checkbox">
		<input type="checkbox" name="need_invoice" id="ckb_invoice" value='1'>需要发票</input>
		</label>
	</div>
</div>


<div class="control-group invoice_control">
	<label class="control-label" for="invoice_title_type"><span style="color:red;">*</span>抬头类型</label>
	<div class="controls">
		<input id="radio_invoice_person" type="radio" name="invoiceRadio" value="2" checked>个人</input>
		<input id="radio_invoice_company" type="radio" name="invoiceRadio" value="1">单位</input>
	</div>
</div>
<div id="div_invoice_title" class="control-group invoice_control">
	<label class="control-label" for="invoice_title"><span style="color:red;">*</span>单位名称</label>
	<div class="controls">
		<input type="text" id="invoice_title" name="title" />
		<span id="invoice_title_msg"></span>
		<span id="invoice_title_rule"></span>
	</div>
</div>
<div class="control-group invoice_control">
	<label class="control-label" for="invoice_phone"><span style="color:red;">*</span>联系方式</label>
	<div class="controls">
		<input type="text" id="invoice_phone" name="in_phone" />
		<span id="invoice_phone_msg"></span>
		<span id="invoice_phone_rule"></span>
	</div>
</div>
<div class="control-group invoice_control">
	<label class="control-label" for="invoice_address"><span style="color:red;">*</span>寄送地址</label>
	<div class="controls">
		<input type="text" id="invoice_address" name="address" />
		<span id="invoice_address_msg"></span>
		<span id="invoice_address_rule"></span>
	</div>
</div>
<div class="control-group invoice_control">
	<label class="control-label" for="invoice_receiver"><span style="color:red;">*</span>联系人</label>
	<div class="controls">
		<input type="text" id="invoice_receiver" name="receiver" />
		<span id="invoice_receiver_msg"></span>
		<span id="invoice_receiver_rule"></span>
	</div>
</div>

<div class="control-group invoice_control">
	<label class="control-label" for="invoice_postcode"><span style="color:red;">*</span>邮政编码</label>
	<div class="controls">
		<input type="text" id="invoice_postcode" name="postcode" />
		<span id="invoice_postcode_msg"></span>
		<span id="invoice_postcode_rule"></span>
	</div>
</div>

<div class="form-actions">
	<input class="btn btn-success" type="submit" id="submit_do" value="确认捐款" />
</div>
</fieldset>
</form>
<?php else: ?>
<p>该项目不需要在线捐款或者已经捐款结束.</p>
<?php endif; ?>
</div>
</div>

<div id="itemPane" class="contentPane" style="display:none">
<?php if($is_item): ?>
<ul>
<li>收件人: <?php echo $item->receiver; ?></li>
<li>地址:<?php echo $item->address; ?></li>
<li>邮政编码:<?php echo $item->zip_code; ?></li>
<li>联系电话:<?php echo $item->phone; ?></li>
</ul>
<hr />
<?php else: ?>
<p>没有和该项目相关的捐物信息</p>
<?php  endif;?>
</div>

<div id="volunteerinfoPane" class="contentPane" style="display:none">
<?php if($is_volunteerinfo): ?>
<?php if($is_volunteer == 3): ?>
	<p>您已经通过本项目的志愿者审核，期待您对项目的监督与反馈。</p>
<?php elseif($is_volunteer == 2): ?>
	<p>您已经申请了本项目的志愿者，请耐心等待工作人员的审核。</p>
<?php endif;?>
<ul>
<li>招募志愿者人数: <?php echo $volunteerinfo->number; ?></li>
<li>已审核通过人数: <?php echo $volunteerinfo->now_number; ?></li>
</ul>

<?php if($volunteerinfo->number > $volunteerinfo->now_number && $is_volunteer == 0 && !$is_sponsor): ?>
<form  method="POST" class="form-horizontal">
<fieldset>
<div class="control-group">
	<label class="control-label" for="realname">*真实姓名:</label>
	<div class="controls">
		<input  id="realname" type="text" name="realname" />
		<span id="realname_msg"></span>
		<span id="realname_rule"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="phone">*手机号:</label>
	<div class="controls">
		<input type="text" id="phone" name="phone" />
		<span id="phone_msg"></span>
		<span id="phone_rule"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="idcard">*身份证:</label>
	<div class="controls">
		<input type="text" id="idcard" name="idcard" />		
		<span id="idcard_msg"></span>
		<span id="idcard_rule"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="address">*联系地址:</label>
	<div class="controls">
		<select id="province" name="province" class="span2">
			<option value="1">北京</option>
			<option value="2">天津</option>
			<option value="3">河北</option>
			<option value="4">山西</option>
			<option value="5">内蒙古</option>
			<option value="6">辽宁</option>
			<option value="7">吉林</option>
			<option value="8">黑龙江</option>
			<option value="9">上海</option>
			<option value="10">江苏</option>
			<option value="11">浙江</option>
			<option value="12">安徽</option>
			<option value="13">福建</option>
			<option value="14">江西</option>
			<option value="15">山东</option>
			<option value="16">河南</option>
			<option value="17">湖北</option>
			<option value="18">湖南</option>
			<option value="19">广东</option>
			<option value="20">广西</option>
			<option value="21">海南</option>
			<option value="22">重庆</option>
			<option value="23">四川</option>
			<option value="24">贵州</option>
			<option value="25">云南</option>
			<option value="26">西藏</option>
			<option value="27">陕西</option>
			<option value="28">甘肃</option>
			<option value="29">青海</option>
			<option value="30">宁夏</option>
			<option value="31">新疆</option>
		</select>
		<select id="city" name="city" class="span2">
			<option value="1">北京</option>
		</select>
		<select id="district" name="district" class="span2">
			<option value="1">东城区</option><option value="2">西城区</option><option value="3">崇文区</option><option value="4">宣武区</option><option value="5">朝阳区</option><option value="6">丰台区</option><option value="7">石景山区</option><option value="8">海淀区</option><option value="9">门头沟区</option><option value="10">房山区</option><option value="11">通州区</option><option value="12">顺义区</option><option value="13">昌平区</option><option value="14">大兴区</option><option value="15">怀柔区</option><option value="16">平谷区</option><option value="17">密云县</option><option value="18">延庆县</option>
		</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="address">*申请描述:</label>
	<div class="controls">
		<textarea name="description" id="description" cols="30" rows="10"></textarea>
		<span id="description_msg"></span>
		<span id="description_rule"></span>
	</div>
</div>
<div class="form-actions">
	<input class="btn  btn-success" type="submit" id="submit_vo" disabled="disabled" value="确认申请志愿者" />
</div>
</fieldset>
</form>
<?php endif;?>
<?php else: ?>
<p>该项目未进行志愿者招募.</p>
<?php  endif;?>
</div>
<?php endif; ?>
<!-- END FOR 对于进行中的项目 -->


<br /><br />

<!-- 子菜单2 -->
<div class="subnav">
  <ul id="subNav2Ul" class="nav nav-pills rightColumn">
	<li id="sponsorFeedback" class="active"><a>发起人反馈</a></li>
	<li id="volunteerFeedback"><a>志愿者反馈</a></li>
	<li id="donationRecord"><a>捐助名单</a></li>
	<li id="message"><a>留言板</a></li>
  </ul>
</div>

<div id="sponsorFeedbackPane">
<div class="contentPane">
<?php if($sponsor_feedback_list): ?>
<?php foreach($sponsor_feedback_list as $item): ?>
	<div class="row-fluid" id="info<?php echo $item->sfb_id?>">
		<div class="span7 name">
			<?php echo $item->nickname; ?>
		</div>
		<div class="span3">
			<?php echo $item->create_time; ?>
		</div>
		<?php if($is_sponsor):?>
		<div class="span1" align="right">
			<a class="delete_button" style="margin-top:-8px;" name="delete_feedback" value="<?php echo $item->sfb_id?>">删除</a>
		</div>
		<?php endif;?>
	</div>
	<br />
	<div class="row-fluid" id="content<?php echo $item->sfb_id?>">
		<?php echo $item->fb_content; ?>
		<br />
		<?php foreach( $item->pics as $pic): if($pic != ''): ?>
			<a class="fb_image" href="./uploads/feedback/<?php echo $pic;?>">
			<img src="./uploads/feedback/<?php echo $pic;?>" width=90 height=90/>
			</a>
		<?php endif; endforeach; ?>
		<hr />
	</div>

<?php endforeach; ?>
<?php else: ?>
该项目发起者尚未写进展.
<?php endif; ?>
</div>
</div>



<div id="volunteerFeedbackPane" style="display:none">
	<div class="contentPane">

	<?php if($volunteer_feedback_list): ?>
	<?php foreach($volunteer_feedback_list as $item): ?>
		<div class="row-fluid" id="vinfo<?php echo $item->vfb_id?>">
			<div class="span7 name">
				<?php echo $item->nickname; ?>
			</div>
			<div class="span3">
				<?php echo $item->create_time; ?>
			</div>
			<?php if($is_sponsor):?>
				<div class="span1" align="right">
					<a class="delete_vbutton" name="delete_vfeedback" value="<?php echo $item->vfb_id?>">删除</a>
				</div>
			<?php endif;?>
		</div>
		<br />
		<div class="row-fluid" id="vcontent<?php echo $item->vfb_id?>">
				<?php echo $item->fb_content; ?>
			<br />
			<?php foreach( $item->pics as $pic): if($pic != ''): ?>
			<a class="fb_image" href="./uploads/feedback/<?php echo $pic;?>">
			<img src="./uploads/feedback/<?php echo $pic;?>" width=90 height=90/>
			</a>
			<?php endif; endforeach; ?>
		</div><hr />
		<br />
		
	<?php endforeach; ?>
	<?php else: ?>
	暂时没有志愿者反馈.
	<?php endif; ?>
	</div>
</div>



<div id="donationRecordPane" class="contentPane" style="display:none">
<?php if($donation_list): ?>
<fieldset>
	<table class="table table-striped table-bordered">
		<tr>
			<th>昵称</th>
			<th>捐款</th>
			<th>捐助时间</th>
		</tr>
		<tbody id="donation_list">
		<?php foreach($donation_list as $item): ?>
		<tr>
			<td><?php echo $item->nickname; ?></td>
			<td><?php echo $item->money; ?></td>
			<td><?php echo $item->create_time; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<input type="hidden" id="do_total_page" value="<?php echo $donation_page; ?>" />
	<div>
		<ul id="do_page_ul">
			<div id="do_page_idx_div" class="pagination" style="float:right;">
			</div>
		</ul>
	</div>
</fieldset>
<?php else: ?>
	<p>该项目尚无任何捐助信息.</p>
<?php endif; ?>
</div>

<div id="messagePane" class="contentPane" style="display:none">
<fieldset>
	<?php if($this->User_model->check_user_login() > 0): //用户已经登录 ?>
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>" />
	<span id="msg_content_tip"></span>
	<div class="control-group">
		<div class="controles">
			<textarea class="span8" id="msgContent" cols="9" rows="5"></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button class="btn btn-success" id="btn_submit_message" disabled="disabled">我要留言</button>
	</div>
	<?php endif; ?>
</fieldset>

<fieldset>
	<table id="msg_list" class="table table-striped">
		<?php if($message_list): ?>
		<?php foreach($message_list as $message ):?>
		<tr>
			<td class="span1">
				<?php echo $message->nickname; ?>
			</td>
			<td class="span6">
				<?php echo $message->content; ?>
			</td>
			<td class="span2">	
			<?php echo $message->create_time; ?>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>
	<input type="hidden" id="total_page" value="<?php echo $message_page; ?>" />
	<div>
		<ul id="page_ul">
			<div id="page_idx_div"  class="pagination" style="float:right; margin:auto auto;">
			</div>
		</ul>
	</div>
</fieldset>
</div>


</div> <!-- 左边部分结束 -->




<div class="span3">

<?php if($is_sponsor):?>
	<div class="legend"><span>发起人管理菜单</span></div>
	<div class="rightColumn" style="padding: 8px 0;">
	<ul class="nav nav-list">
		<li><a href="<?php echo site_url("project/daily_report/$pid"); ?>"><i class="icon-list-alt"></i>数据统计</a></li>
		<li><a href="<?php echo site_url("project/volunteer_list/$pid"); ?>"><i class="icon-list-alt"></i>志愿者名单</a></li>
		<li><a href="<?php echo site_url("project/invoice_list/$pid"); ?>"><i class="icon-list-alt"></i>发票申请名单</a></li>
		<li><a href="<?php echo site_url("project/post_feedback/$pid"); ?>"><i class="icon-pencil"></i>发布进展</a></li>
		<li><a href="<?php echo site_url("project/audit_vfeedback/$pid"); ?>"><i class=" icon-ok"></i>审核志愿者反馈</a></li>
	</ul>
	</div>
<?php endif;?>


<?php if($is_volunteer == 3): ?>
	<div class="legend"><span>志愿者管理菜单</span></div>
	<div class="rightColumn" style="padding: 8px 0;">
	<ul class="nav nav-list">
		<li>
			<a href="<?php echo site_url("project/post_vfeedback/$pid"); ?>"><i class="icon-pencil"></i>发布志愿者反馈</a>
		</li>
	</ul>
	</div>
<?php endif; ?>


<?php if($related_project_list != NULL): ?>
	<div class="legend"><span>相关项目推荐</span></div>
	<div class="rightColumn">
	<ul>
		<?php foreach( $related_project_list as $info): ?>
		<li>
			<a href="<?php echo site_url("project/info/$info->pid"); ?>"><?php echo $info->title; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	</div>
<?php endif;?>



<?php if($news != NULL): ?>
	<div class="legend"><span>最新捐款动态</span></div>
	<div id="donation_news_div" class="rightColumn">
		<!--<ul>-->
		<?php foreach( $news as $info): ?>
		<div class="row-fluid" style="margin-bottom:5px;">
			<div class="span4">
				<img class="thumbnail" src="./uploads/user/<?php echo $info->photo; ?>" alt="用户头像" width="30" height="30"/>
			</div>
			<div class="span8" style="padding-top:10px;">
				<?php echo "  <a>". $info->nickname . "</a>&nbsp;" . $info->money . "元";?>
			</div>
		</div>
		<?php endforeach; ?>
		<!--</ul>-->
	</div>
<?php endif;?>

</div> <!-- END FOR SPAN3 -->

</div>	<!-- END FOR ROW-FLUID -->

<script type="text/javascript" src="./js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!--Baidu share-->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=643410" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>

